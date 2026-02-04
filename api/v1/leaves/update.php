<?php
// api/v1/leaves/update.php

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
    if ($request['status'] !== 'pending') {
        http_response_code(403);
        echo json_encode(["status" => "error", "message" => "Only pending requests can be edited."]);
        exit;
    }

    // 2. Prepare Update Data
    // We allow updating: start_date, end_date, reason, vacation_address, emergency_contact...
    // Also recalculate days if dates change.

    $startDate = $input->startDate;
    $endDate = $input->endDate;
    $reason = $input->reason;
    // ... validation similar to apply.php ...

    // Recalculate days
    try {
        $start = new DateTime($startDate);
        $end = new DateTime($endDate);
        if ($end < $start) throw new Exception("End date must be after start date");
        $diff = $start->diff($end);
        $daysRequested = $diff->days + 1;
    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "Invalid dates."]);
        exit;
    }

    // Simple mapping for leave type? If allowing type change, need logic. 
    // Usually editing type might be complex if it affects approval. But for 'pending' it's fine.
    // Let's re-query leave type ID if reason provided is a string name
    $leaveTypeId = 1; // Default
    if (!empty($reason)) {
        // ... (Similar lookup as apply.php) ...
        $leaveTypeSlug = strtolower($reason);
        $typeQuery = "SELECT id FROM leave_types WHERE LOWER(name) LIKE :name LIMIT 1";
        $stmtType = $db->prepare($typeQuery);
        $searchName = $leaveTypeSlug . '%';
        $stmtType->bindParam(":name", $searchName);
        $stmtType->execute();
        if ($stmtType->rowCount() > 0) {
            $leaveTypeId = $stmtType->fetchColumn();
        }
    }

    $updateQuery = "UPDATE leave_requests SET 
                    leave_type_id = :type,
                    start_date = :start,
                    end_date = :end,
                    days_requested = :days,
                    reason = :reason,
                    vacation_address = :addr,
                    emergency_contact_name = :ename,
                    emergency_contact_phone = :ephone,
                    covered_by = :covered
                    WHERE id = :id";
    
    $stmt = $db->prepare($updateQuery);
    $stmt->bindParam(":type", $leaveTypeId);
    $stmt->bindParam(":start", $startDate);
    $stmt->bindParam(":end", $endDate);
    $stmt->bindParam(":days", $daysRequested);
    $stmt->bindParam(":reason", $input->reason);
    $stmt->bindParam(":addr", $input->vacationAddress);
    $stmt->bindParam(":ename", $input->emergencyName);
    $stmt->bindParam(":ephone", $input->emergencyPhone);
    $stmt->bindParam(":covered", $input->coveredBy);
    $stmt->bindParam(":id", $input->request_id);

    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Request updated successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Update failed."]);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
