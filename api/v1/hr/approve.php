<?php
// api/v1/hr/approve.php
// HR final approval - updates status and deducts from leave balance

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

try {
    $db = getDBConnection();
    $db->beginTransaction();

    // Group HR (company_id = 1) can approve requests from any company
    $isGroupHR = ($companyId == 1);

    // 1. Verify the request exists and is approved by supervisor
    $checkQuery = "SELECT lr.id, lr.status, lr.user_id, lr.leave_type_id, lr.days_requested, 
                          u.company_id, u.full_name
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
        $db->rollBack();
        http_response_code(404);
        echo json_encode(["status" => "error", "message" => "Request not found or access denied."]);
        exit;
    }

    $request = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($request['status'] !== 'approved_supervisor') {
        $db->rollBack();
        http_response_code(403);
        echo json_encode(["status" => "error", "message" => "Only supervisor-approved requests can receive HR approval."]);
        exit;
    }

    // 2. Update leave request status to approved_hr
    $updateQuery = "UPDATE leave_requests SET status = 'approved_hr' WHERE id = :id";
    $stmt = $db->prepare($updateQuery);
    $stmt->bindParam(":id", $input->request_id);
    $stmt->execute();

    // 3. Deduct from leave balance
    $currentYear = date('Y');
    $daysRequested = $request['days_requested'];
    $leaveTypeId = $request['leave_type_id'];
    $employeeId = $request['user_id'];

    // Check if balance record exists
    $balanceCheck = "SELECT id, days_used FROM leave_balances 
                     WHERE user_id = :user_id AND leave_type_id = :leave_type_id AND year = :year";
    $stmt = $db->prepare($balanceCheck);
    $stmt->bindParam(":user_id", $employeeId);
    $stmt->bindParam(":leave_type_id", $leaveTypeId);
    $stmt->bindParam(":year", $currentYear);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Update existing balance
        $balanceUpdate = "UPDATE leave_balances 
                          SET days_used = days_used + :days 
                          WHERE user_id = :user_id AND leave_type_id = :leave_type_id AND year = :year";
        $stmt = $db->prepare($balanceUpdate);
        $stmt->bindParam(":days", $daysRequested);
        $stmt->bindParam(":user_id", $employeeId);
        $stmt->bindParam(":leave_type_id", $leaveTypeId);
        $stmt->bindParam(":year", $currentYear);
        $stmt->execute();
    }
    // If no balance record exists, we don't create one here - that's an admin function

    // 4. Insert audit trail record
    $auditQuery = "INSERT INTO approvals (leave_request_id, approver_id, action, stage, comments) 
                   VALUES (:request_id, :approver_id, 'approve', 'hr', :comments)";
    $stmt = $db->prepare($auditQuery);
    $stmt->bindParam(":request_id", $input->request_id);
    $stmt->bindParam(":approver_id", $userId);
    $approveComment = "Approved by HR";
    $stmt->bindParam(":comments", $approveComment);
    $stmt->execute();

    // NOTIFICATIONS
    // Notify the Employee
    $nQuery = "INSERT INTO notifications (user_id, title, message, type) VALUES (:uid, :title, :msg, 'success')";
    $nStmt = $db->prepare($nQuery);
    $nTitle = "Leave Request Approved";
    $nMsg = "Your leave request has been fully approved by HR!";
    $nStmt->bindParam(":uid", $employeeId);
    $nStmt->bindParam(":title", $nTitle);
    $nStmt->bindParam(":msg", $nMsg);
    $nStmt->execute();

    $db->commit();

    http_response_code(200);
    echo json_encode([
        "status" => "success",
        "message" => "Leave request approved. Leave balance updated.",
        "employee_name" => $request['full_name'],
        "days_deducted" => $daysRequested
    ]);
} catch (PDOException $e) {
    $db->rollBack();
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
