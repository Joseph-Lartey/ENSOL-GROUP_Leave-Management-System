<?php
// api/v1/supervisor/reject.php
// Supervisor rejects a leave request

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

// Check role
if (!in_array($role, ['supervisor', 'hr', 'admin', 'superadmin'])) {
    http_response_code(403);
    echo json_encode(["status" => "error", "message" => "Access denied. Supervisor role required."]);
    exit;
}

// Get Input
$input = json_decode(file_get_contents("php://input"));

if (empty($input->request_id)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Request ID is required."]);
    exit;
}

$rejectionReason = $input->reason ?? 'No reason provided';

try {
    $db = getDBConnection();

    // 1. Verify the request exists and belongs to someone in the supervisor's company
    $checkQuery = "SELECT lr.id, lr.status, lr.user_id, u.company_id, u.full_name
                   FROM leave_requests lr
                   JOIN users u ON lr.user_id = u.id
                   WHERE lr.id = :id AND u.company_id = :company_id";
    $stmt = $db->prepare($checkQuery);
    $stmt->bindParam(":id", $input->request_id);
    $stmt->bindParam(":company_id", $companyId);
    $stmt->execute();
    
    if ($stmt->rowCount() === 0) {
        http_response_code(404);
        echo json_encode(["status" => "error", "message" => "Request not found or access denied."]);
        exit;
    }

    $request = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Cannot reject own request (use cancel instead)
    if ($request['user_id'] == $userId) {
        http_response_code(403);
        echo json_encode(["status" => "error", "message" => "You cannot reject your own request. Use cancel instead."]);
        exit;
    }
    
    // Can only reject pending or approved_supervisor requests
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
        // Insert audit trail record
        $auditQuery = "INSERT INTO approvals (leave_request_id, approver_id, action, stage, comments) 
                       VALUES (:request_id, :approver_id, 'reject', 'supervisor', :comments)";
        $auditStmt = $db->prepare($auditQuery);
        $auditStmt->bindParam(":request_id", $input->request_id);
        $auditStmt->bindParam(":approver_id", $userId);
        $auditStmt->bindParam(":comments", $rejectionReason);
        $auditStmt->execute();

        // Notify Employee
        $nQuery = "INSERT INTO notifications (user_id, title, message, type) VALUES (:uid, :title, :msg, 'error')";
        $nStmt = $db->prepare($nQuery);
        $nTitle = "Leave Request Rejected";
        $nMsg = "Your leave request was rejected by your supervisor. Reason: " . $rejectionReason;
        $nStmt->bindParam(":uid", $request['user_id']);
        $nStmt->bindParam(":title", $nTitle);
        $nStmt->bindParam(":msg", $nMsg);
        $nStmt->execute();

        http_response_code(200);
        echo json_encode([
            "status" => "success", 
            "message" => "Leave request rejected.",
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
?>
