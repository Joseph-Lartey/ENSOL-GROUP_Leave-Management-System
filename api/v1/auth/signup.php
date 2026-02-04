<?php
// api/v1/auth/signup.php

// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Method not allowed"]);
    exit;
}

require_once '../../config/database.php';
require_once '../../utils/EmailValidator.php';

// Check if using FormData (multipart) or JSON
if (!empty($_POST)) {
    $data = (object) $_POST;
} else {
    $data = json_decode(file_get_contents("php://input"));
}

// 1. Basic Validation
if (
    empty($data->firstName) ||
    empty($data->lastName) ||
    empty($data->email) ||
    empty($data->password) ||
    empty($data->subsidiary)
) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "All fields are required."]);
    exit;
}

// 2. Email Domain Validation
if (!EmailValidator::isAllowed($data->email)) {
    http_response_code(403);
    echo json_encode([
        "status" => "error", 
        "message" => "Registration restricted. Please use your official company email."
    ]);
    exit;
}

try {
    $db = getDBConnection();
    
    // 3. Check if email already exists
    $checkQuery = "SELECT id FROM users WHERE email = :email LIMIT 1";
    $stmt = $db->prepare($checkQuery);
    $stmt->bindParam(":email", $data->email);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        http_response_code(409); // Conflict
        echo json_encode(["status" => "error", "message" => "Email already exists."]);
        exit;
    }

    // 4. Resolve Company ID from Slug
    // Map frontend values to DB Names
    $companyMap = [
        'southey-contracting' => 'Southey Contracting',
        'ensol-engineering' => 'Ensol Engineering',
        'ensol-energy' => 'Ensol Energy'
    ];
    
    $companyName = isset($companyMap[$data->subsidiary]) ? $companyMap[$data->subsidiary] : 'Ensol Group';
    
    // Fetch ID
    $compStmt = $db->prepare("SELECT id FROM companies WHERE name LIKE :name LIMIT 1");
    // Use wildcard or exact match
    $paramName = $companyName . '%'; 
    $compStmt->bindParam(":name", $paramName);
    $compStmt->execute();
    $companyRow = $compStmt->fetch(PDO::FETCH_ASSOC);
    $companyId = $companyRow ? $companyRow['id'] : 1; // Default to Group if not found

    // 4.5 Handle Profile Image Upload
    $profileImagePath = null;
    if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../../frontend/uploads/profiles/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        $fileExt = strtolower(pathinfo($_FILES['profileImage']['name'], PATHINFO_EXTENSION));
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
        
        if (in_array($fileExt, $allowedExts)) {
            // Generate unique name: user_TIMESTAMP_RANDOM.ext
            $fileName = 'user_' . time() . '_' . rand(1000, 9999) . '.' . $fileExt;
            $targetPath = $uploadDir . $fileName;
            
            if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $targetPath)) {
                // Store relative path for frontend access
                $profileImagePath = 'uploads/profiles/' . $fileName;
            }
        }
    }

    // 5. Insert User (With Transaction)
    try {
        $db->beginTransaction();

        $fullName = trim($data->firstName) . ' ' . trim($data->lastName);
        $passwordHash = password_hash($data->password, PASSWORD_DEFAULT);
        $department = $data->department ?? 'General';
        
        // Generate OTP
        $otp = sprintf("%04d", rand(0, 9999));
        $otpExpiry = date('Y-m-d H:i:s', strtotime('+10 minutes'));
        
        $insertQuery = "INSERT INTO users (company_id, full_name, email, password_hash, department, role, is_active, profile_image, otp_code, otp_expires_at) 
                        VALUES (:company_id, :full_name, :email, :password_hash, :department, 'employee', 0, :profile_image, :otp, :expiry)";
        
        $insertStmt = $db->prepare($insertQuery);
        $insertStmt->bindParam(":company_id", $companyId);
        $insertStmt->bindParam(":full_name", $fullName);
        $insertStmt->bindParam(":email", $data->email);
        $insertStmt->bindParam(":password_hash", $passwordHash);
        $insertStmt->bindParam(":department", $department);
        $insertStmt->bindParam(":profile_image", $profileImagePath);
        $insertStmt->bindParam(":otp", $otp);
        $insertStmt->bindParam(":expiry", $otpExpiry);
        
        if (!$insertStmt->execute()) {
            throw new Exception("Database insert failed");
        }
        
        // Send Email
        require_once '../../utils/MailService.php';
        $mailSent = MailService::sendOTP($data->email, $otp);
        
        if (!$mailSent) {
            // Rollback if email fails
            $db->rollBack();
            
            // Delete uploaded file if exists to clean up
            if ($profileImagePath && file_exists('../../../frontend/' . $profileImagePath)) {
                unlink('../../../frontend/' . $profileImagePath);
            }
            
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Failed to send verification email. Please try again."]);
            exit;
        }

        // Commit if both succeed
        $db->commit();
        
        http_response_code(201);
        echo json_encode([
            "status" => "success", 
            "message" => "Account created! Please check your email for the verification code.",
            "email" => $data->email
        ]);

    } catch (Exception $e) {
        if ($db->inTransaction()) {
            $db->rollBack();
        }
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "System Error: " . $e->getMessage()]);
    }

} catch (PDOException $e) {
    http_response_code(503);
    echo json_encode(["status" => "error", "message" => "Service unavailable."]);
}
?>
