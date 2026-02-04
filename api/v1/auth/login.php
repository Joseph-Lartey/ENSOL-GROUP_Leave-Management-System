<?php
// api/v1/auth/login.php

// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Check method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Method not allowed"]);
    exit;
}

// Include database setup
require_once '../../config/database.php';

// Get posted data
$data = json_decode(file_get_contents("php://input"));

if (!empty($data->email) && !empty($data->password)) {
    try {
        $db = getDBConnection();
        
        // Prepare query
        $query = "SELECT id, full_name, email, password_hash, role, company_id, is_active FROM users WHERE email = :email LIMIT 1";
        $stmt = $db->prepare($query);
        
        $email = htmlspecialchars(strip_tags($data->email));
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Verify password
            // Note: In a real app, use password_verify($data->password, $row['password_hash'])
            // For now, assuming plain text or simple hash as per previous discussions/setup? 
            // WAIT - schema said password_hash. I should use password_verify. 
            // But I don't know how user seeded the DB manually. 
            // I'll stick to password_verify but if they manually inserted plain text, it will fail.
            // Let's assume standard PHP password_hash was used or will be used.
            
            if (password_verify($data->password, $row['password_hash'])) {
                
                if (!$row['is_active']) {
                    http_response_code(401);
                    echo json_encode(["status" => "error", "message" => "Account is inactive. Contact Admin."]);
                    exit;
                }

                // Generate JWT
                require_once '../../utils/JWT.php';
                
                $tokenPayload = [
                    "user_id" => $row['id'],
                    "email" => $row['email'],
                    "role" => $row['role'],
                    "company_id" => $row['company_id']
                ];
                
                $jwt = JWT::encode($tokenPayload);
                
                $response = array(
                    "status" => "success",
                    "message" => "Login successful",
                    "token" => $jwt,
                    "data" => array(
                        "id" => $row['id'],
                        "full_name" => $row['full_name'],
                        "email" => $row['email'],
                        "role" => $row['role'],
                        "company_id" => $row['company_id']
                    )
                );
                
                http_response_code(200);
                echo json_encode($response);
                
            } else {
                http_response_code(401);
                echo json_encode(["status" => "error", "message" => "Invalid password"]);
            }
        } else {
            http_response_code(401);
            echo json_encode(["status" => "error", "message" => "Invalid email"]);
        }
        
    } catch (PDOException $e) {
        http_response_code(503);
        echo json_encode(["status" => "error", "message" => "Service unavailable: " . $e->getMessage()]);
    }
} else {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Incomplete data. Email and password required."]);
}
?>
