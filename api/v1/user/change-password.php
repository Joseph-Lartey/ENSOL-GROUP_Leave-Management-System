<?php
// api/v1/user/change-password.php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../../config/database.php';
require_once '../../middleware/AuthMiddleware.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Authenticate
    $userData = AuthMiddleware::authenticate();
    $userId = $userData['user_id'];
    
    $data = json_decode(file_get_contents("php://input"));
    
    $currentPassword = $data->currentPassword ?? '';
    $newPassword = $data->newPassword ?? '';
    $confirmPassword = $data->confirmPassword ?? '';
    
    if (empty($currentPassword) || empty($newPassword)) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "Current and New passwords are required."]);
        exit;
    }
    
    if ($newPassword !== $confirmPassword) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "New passwords do not match."]);
        exit;
    }
    
    // Minimum length check (e.g., 8 chars)
    if (strlen($newPassword) < 8) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "Password must be at least 8 characters long."]);
        exit;
    }

    $db = getDBConnection();
    
    try {
        // Fetch current hash
        $stmt = $db->prepare("SELECT password_hash FROM users WHERE id = :id");
        $stmt->bindParam(":id", $userId);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$user) {
            http_response_code(404);
            echo json_encode(["status" => "error", "message" => "User not found."]);
            exit;
        }
        
        // Verify Current Password
        if (!password_verify($currentPassword, $user['password_hash'])) {
            http_response_code(401);
            echo json_encode(["status" => "error", "message" => "Incorrect current password."]);
            exit;
        }
        
        // Update to New Password
        $newHash = password_hash($newPassword, PASSWORD_DEFAULT);
        $updateStmt = $db->prepare("UPDATE users SET password_hash = :hash WHERE id = :id");
        $updateStmt->bindParam(":hash", $newHash);
        $updateStmt->bindParam(":id", $userId);
        
        if ($updateStmt->execute()) {
            http_response_code(200);
            echo json_encode(["status" => "success", "message" => "Password changed successfully."]);
        } else {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Failed to update password."]);
        }
        
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
    exit;
}
?>
