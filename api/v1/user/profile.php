<?php
// api/v1/user/profile.php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// EARLY DEBUG - Log every request to this endpoint
$debugLogPath = '/opt/homebrew/var/www/ENSOL-GROUP_Leave-Management-System/debug_profile_update.txt';
file_put_contents($debugLogPath, date('[Y-m-d H:i:s] ') . "Request Method: " . $_SERVER['REQUEST_METHOD'] . "\n", FILE_APPEND);
file_put_contents($debugLogPath, date('[Y-m-d H:i:s] ') . "Headers: " . json_encode(getallheaders()) . "\n", FILE_APPEND);

require_once '../../config/database.php';
require_once '../../middleware/AuthMiddleware.php';

// Authenticate Request
$userData = AuthMiddleware::authenticate();
$userId = $userData['user_id'];
$db = getDBConnection();

file_put_contents($debugLogPath, date('[Y-m-d H:i:s] ') . "Auth passed. User ID: $userId\n", FILE_APPEND);

// === GET REQUEST: FETCH PROFILE ===
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        // Explicitly select columns and JOIN companies for subsidiary name
        $query = "SELECT 
                    u.id, 
                    u.full_name, 
                    u.email, 
                    u.department, 
                    u.role, 
                    u.profile_image, 
                    u.created_at, 
                    u.phone as phone_number, 
                    u.position, 
                    c.name as subsidiary 
                  FROM users u
                  LEFT JOIN companies c ON u.company_id = c.id
                  WHERE u.id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $userId);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            unset($user['password_hash']); // Security
            http_response_code(200);
            echo json_encode(["status" => "success", "data" => $user]);
        } else {
            error_log("User Not Found for ID: " . $userId);
            http_response_code(404);
            echo json_encode(["status" => "error", "message" => "User not found"]);
        }
    } catch (PDOException $e) {
        error_log("Database Error in Profile API: " . $e->getMessage());
        http_response_code(500);
        // DEBUG: Returning actual error to frontend
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
    exit;
}

// === POST REQUEST: UPDATE PROFILE ===
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // DEBUG: Log received data
    error_log("Profile Update POST Data: " . print_r($_POST, true));
    error_log("Profile Update FILES Data: " . print_r($_FILES, true));

    // Check if we are handling file upload (Multipart) or JSON
    // Start with basic fields
    $firstName = $_POST['firstName'] ?? '';
    $lastName  = $_POST['lastName'] ?? '';
    $phone     = $_POST['phone'] ?? '';
    $position  = $_POST['position'] ?? '';
    
    // Check for password change
    $password = $_POST['newPassword'] ?? '';
    
    // File Upload logic
    $profileImage = '';
    
    try {
        $db->beginTransaction();

        // 1. Update Basic Info
        if ($firstName) {
            $fullName = trim($firstName . ' ' . $lastName);
            
            // Debug Log to file
            file_put_contents($debugLogPath, date('[Y-m-d H:i:s] ') . "Updating User $userId: Name='$fullName', Phone='$phone'\n", FILE_APPEND);

            // FIX: 'phone_number' -> 'phone'
            // REMOVED: 'position' update (restricted to Admin)
            $query = "UPDATE users SET full_name = :name, phone = :phone WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(":name", $fullName);
            $stmt->bindParam(":phone", $phone);
            // $stmt->bindParam(":pos", $position); // Removed
            $stmt->bindParam(":id", $userId);
            
            if ($stmt->execute()) {
                file_put_contents($debugLogPath, date('[Y-m-d H:i:s] ') . "Update Success. Rows: " . $stmt->rowCount() . "\n", FILE_APPEND);
            } else {
                file_put_contents($debugLogPath, date('[Y-m-d H:i:s] ') . "Update Failed: " . print_r($stmt->errorInfo(), true) . "\n", FILE_APPEND);
            }
        } else {
            file_put_contents($debugLogPath, date('[Y-m-d H:i:s] ') . "Update SKIPPED. FirstName missing.\n", FILE_APPEND);
        }

        // 2. Password Update MOVED to dedicated endpoint (api/v1/user/change-password.php)
        // This block is removed to enforce "Old Password" verification workflow.

        // 3. Handle File Upload
        if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
            // Use existing legacy folder structure: frontend/uploads/profiles/
            $uploadDir = '../../../frontend/uploads/profiles/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
            
            $fileExt = strtolower(pathinfo($_FILES['profileImage']['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            
            if (in_array($fileExt, $allowed)) {
                // Generate unique name
                $newFileName = 'user_' . time() . '_' . rand(1000, 9999) . '.' . $fileExt;
                $destPath = $uploadDir . $newFileName;
                
                if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $destPath)) {
                    // Store path relative to frontend root (legacy format)
                    $dbPath = 'uploads/profiles/' . $newFileName;
                    
                    // Update DB
                    $stmt = $db->prepare("UPDATE users SET profile_image = :img WHERE id = :id");
                    $stmt->bindParam(":img", $dbPath);
                    $stmt->bindParam(":id", $userId);
                    $stmt->execute();
                    
                    file_put_contents($debugLogPath, date('[Y-m-d H:i:s] ') . "Image uploaded: $dbPath\n", FILE_APPEND);
                }
            }
        }

        $db->commit();
        
        // Fetch updated user WITH subsidiary via JOIN (same as GET)
        $stmt = $db->prepare("SELECT 
                                u.id, 
                                u.full_name, 
                                u.email, 
                                u.department, 
                                u.role, 
                                u.profile_image, 
                                u.created_at, 
                                u.phone as phone_number, 
                                u.position, 
                                c.name as subsidiary 
                              FROM users u
                              LEFT JOIN companies c ON u.company_id = c.id
                              WHERE u.id = :id");
        $stmt->execute([':id' => $userId]);
        $updatedUser = $stmt->fetch(PDO::FETCH_ASSOC);
        
        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Profile updated successfully", "data" => $updatedUser]);

    } catch (Exception $e) {
        $db->rollBack();
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Update failed: " . $e->getMessage()]);
    }
    exit;
}
?>
