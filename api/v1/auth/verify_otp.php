<?php
// api/v1/auth/verify_otp.php

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

$data = json_decode(file_get_contents("php://input"));

if (empty($data->email) || empty($data->otp)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Email and OTP code are required."]);
    exit;
}

try {
    $db = getDBConnection();
    
    // Check credentials and OTP
    $query = "SELECT id, otp_code, otp_expires_at, is_active FROM users WHERE email = :email";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":email", $data->email);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row['is_active']) {
            http_response_code(200);
            echo json_encode(["status" => "success", "message" => "Account already verified. Please login."]);
            exit;
        }

        if ($data->otp === $row['otp_code']) {
            // Check expiry
            if (strtotime($row['otp_expires_at']) < time()) {
                http_response_code(400);
                echo json_encode(["status" => "error", "message" => "OTP code has expired. Please request a new one."]);
                exit;
            }

            // ACTIVATE ACCOUNT
            $update = "UPDATE users SET is_active = 1, otp_code = NULL, otp_expires_at = NULL WHERE id = :id";
            $upStmt = $db->prepare($update);
            $upStmt->bindParam(":id", $row['id']);
            
            if ($upStmt->execute()) {
                http_response_code(200);
                echo json_encode(["status" => "success", "message" => "Account verifed successully!"]);
            } else {
                http_response_code(500);
                echo json_encode(["status" => "error", "message" => "Activation failed."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "Invalid OTP code."]);
        }
    } else {
        http_response_code(404);
        echo json_encode(["status" => "error", "message" => "User not found."]);
    }
} catch (PDOException $e) {
    http_response_code(503);
    echo json_encode(["status" => "error", "message" => "Service unavailable."]);
}
?>
