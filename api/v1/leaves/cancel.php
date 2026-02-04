<?php
// api/v1/leaves/cancel.php
// Cancel a pending leave request

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
require_once '../../middleware/AuthMiddleware.php';

// Authenticate
$userData = AuthMiddleware::authenticate();
$userId = $userData['user_id'];

// Get Input
$input = json_decode(file_get_contents("php://input"));

if (empty($input->request_id)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Request ID is required."]);
    exit;
}

try {
    $db = getDBConnection();

    // 1. Verify Request Ownership and Status
    $checkQuery = "SELECT id, status FROM leave_requests WHERE id = :id AND user_id = :user_id";
    $stmt = $db->prepare($checkQuery);
    $stmt->bindParam(":id", $input->request_id);
    $stmt->bindParam(":user_id", $userId);
    $stmt->execute();
    
    if ($stmt->rowCount() === 0) {
        http_response_code(404);
        echo json_encode(["status" => "error", "message" => "Request not found or permission denied."]);
        exit;
    }

    $request = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Only pending or supervisor-approved requests can be cancelled
    if (!in_array($request['status'], ['pending', 'approved_supervisor'])) {
        http_response_code(403);
        echo json_encode(["status" => "error", "message" => "Only pending requests can be cancelled."]);
        exit;
    }

    // 2. Update status to cancelled
    $updateQuery = "UPDATE leave_requests SET status = 'cancelled' WHERE id = :id";
    $stmt = $db->prepare($updateQuery);
    $stmt->bindParam(":id", $input->request_id);

    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Leave request cancelled successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Failed to cancel request."]);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
