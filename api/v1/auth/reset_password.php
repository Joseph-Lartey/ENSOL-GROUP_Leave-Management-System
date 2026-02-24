<?php
// api/v1/auth/reset_password.php

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

if (empty($data->email) || empty($data->newPassword)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Email and new password are required."]);
    exit;
}

if (strlen($data->newPassword) < 8) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Password must be at least 8 characters long."]);
    exit;
}

try {
    $db = getDBConnection();

    // Check if email exists
    $query = "SELECT id, is_active FROM users WHERE email = :email LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":email", $data->email);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        http_response_code(404);
        echo json_encode(["status" => "error", "message" => "User not found."]);
        exit;
    }

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user['is_active']) {
        http_response_code(403);
        echo json_encode(["status" => "error", "message" => "Account is inactive. Contact Admin."]);
        exit;
    }

    // Hash the new password
    $passwordHash = password_hash($data->newPassword, PASSWORD_DEFAULT);

    // Update DB
    // Clear OTP logic also to prevent reuse
    $updateStmt = $db->prepare("UPDATE users SET password_hash = :hash, otp_code = NULL, otp_expires_at = NULL WHERE id = :id");
    $updateStmt->bindParam(":hash", $passwordHash);
    $updateStmt->bindParam(":id", $user['id']);

    if ($updateStmt->execute()) {
        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Password changed successfully."]);
    } else {
        throw new Exception("Failed to update password in database");
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Service unavailable: " . $e->getMessage()]);
}
