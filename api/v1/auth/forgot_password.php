<?php
// api/v1/auth/forgot_password.php

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
require_once '../../utils/MailService.php';

$data = json_decode(file_get_contents("php://input"));

if (empty($data->email)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Email address is required."]);
    exit;
}

try {
    $db = getDBConnection();

    // Check if email exists
    $query = "SELECT id, full_name, is_active FROM users WHERE email = :email LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":email", $data->email);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        // Return 200 to prevent email enumeration, but with a generic message
        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "If an account with that email exists, a reset code has been sent."]);
        exit;
    }

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user['is_active']) {
        http_response_code(403);
        echo json_encode(["status" => "error", "message" => "Account is inactive. Contact Admin."]);
        exit;
    }

    // Generate OTP
    $otp = sprintf("%04d", rand(0, 9999));
    $otpExpiry = date('Y-m-d H:i:s', strtotime('+15 minutes'));

    // Update DB with OTP
    $updateStmt = $db->prepare("UPDATE users SET otp_code = :otp, otp_expires_at = :expiry WHERE id = :id");
    $updateStmt->bindParam(":otp", $otp);
    $updateStmt->bindParam(":expiry", $otpExpiry);
    $updateStmt->bindParam(":id", $user['id']);

    if ($updateStmt->execute()) {
        // Send Email
        $mailSent = MailService::sendOTP($data->email, $otp);

        if ($mailSent) {
            http_response_code(200);
            echo json_encode(["status" => "success", "message" => "Password reset code sent successfully.", "email" => $data->email]);
        } else {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Failed to send reset email. Please try again."]);
        }
    } else {
        throw new Exception("Failed to update OTP in database");
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Service unavailable: " . $e->getMessage()]);
}
