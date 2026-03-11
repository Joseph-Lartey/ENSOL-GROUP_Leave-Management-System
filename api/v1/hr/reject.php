<?php
// api/v1/hr/reject.php
// HR rejects a leave request (even after supervisor approval)

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
$role = $userData['role'];
$companyId = $userData['company_id'];

// Check role - must be HR or higher
if (!in_array($role, ['hr', 'admin', 'superadmin'])) {
    http_response_code(403);
    echo json_encode(["status" => "error", "message" => "Access denied. HR role required."]);
    exit;
}

// Get Input
$input = json_decode(file_get_contents("php://input"));

if (empty($input->request_id)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Request ID is required."]);
    exit;
}

$rejectionReason = $input->reason ?? 'Rejected by HR';

try {
    $db = getDBConnection();

    // Group HR (company_id = 1) can reject requests from any company
    $isGroupHR = ($companyId == 1);

    // 1. Verify the request exists and belongs to company
    $checkQuery = "SELECT lr.id, lr.status, lr.user_id, u.company_id, u.full_name
                   FROM leave_requests lr
                   JOIN users u ON lr.user_id = u.id
                   WHERE lr.id = :id";
    if (!$isGroupHR) {
        $checkQuery .= " AND u.company_id = :company_id";
    }
    $stmt = $db->prepare($checkQuery);
    $stmt->bindParam(":id", $input->request_id);
    if (!$isGroupHR) {
        $stmt->bindParam(":company_id", $companyId);
    }
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        http_response_code(404);
        echo json_encode(["status" => "error", "message" => "Request not found or access denied."]);
        exit;
    }

    $request = $stmt->fetch(PDO::FETCH_ASSOC);

    // HR can reject pending or approved_supervisor requests
    if (!in_array($request['status'], ['pending', 'approved_supervisor'])) {
        http_response_code(403);
        echo json_encode(["status" => "error", "message" => "This request cannot be rejected in its current status."]);
        exit;
    }

    // 2. Update status to rejected with reason
    $updateQuery = "UPDATE leave_requests SET status = 'rejected', rejection_reason = :reason WHERE id = :id";
    $stmt = $db->prepare($updateQuery);
    $stmt->bindParam(":id", $input->request_id);
    $stmt->bindParam(":reason", $rejectionReason);

    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode([
            "status" => "success",
            "message" => "Leave request rejected by HR.",
            "employee_name" => $request['full_name']
        ]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Failed to reject request."]);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
