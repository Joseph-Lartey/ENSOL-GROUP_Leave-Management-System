<?php
// api/v1/leaves/apply.php

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
$user = AuthMiddleware::authenticate();
$userId = $user['user_id'];

// Get Input
$input = json_decode(file_get_contents("php://input"));

// Validation
if (
    empty($input->reason) ||
    empty($input->startDate) ||
    empty($input->endDate)
) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Missing required fields."]);
    exit;
}

try {
    $db = getDBConnection();

    // Map Reason String to ID (e.g., 'annual' -> 1)
    // In a real app, strict mapping or lookup. 
    // Mappings from schema seed:
    // 1: Annual, 2: Sick, 3: Casual, 4: Maternity, 5: Paternity
    // We can query table or hardcode for performance if static. Let's query.
    
    // Simple Mapping based on name match (approximate)
    $leaveTypeSlug = strtolower($input->reason);
    $typeQuery = "SELECT id FROM leave_types WHERE LOWER(name) LIKE :name LIMIT 1";
    $stmt = $db->prepare($typeQuery);
    $searchName = $leaveTypeSlug . '%'; // Match 'annual' with 'Annual Leave'
    $stmt->bindParam(":name", $searchName);
    $stmt->execute();
    
    $leaveTypeId = 0;
    if ($stmt->rowCount() > 0) {
        $leaveTypeId = $stmt->fetchColumn();
    } else {
        // Fallback or Error
        // Let's assume 'other' maps to Casual or create Other?
        // Default to 1 (Annual) if not found for safety in this MVP
        $leaveTypeId = 1; 
    }
    
    // Calculate Days
    $start = new DateTime($input->startDate);
    $end = new DateTime($input->endDate);
    $diff = $start->diff($end);
    $daysRequested = $diff->days + 1; // Inclusive

    if ($daysRequested <= 0) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "End date must be after start date."]);
        exit;
    }

    // Insert Request
    $query = "INSERT INTO leave_requests 
              (user_id, leave_type_id, start_date, end_date, days_requested, reason, 
               vacation_address, emergency_contact_name, emergency_contact_phone, covered_by) 
              VALUES 
              (:user, :type, :start, :end, :days, :reason, 
               :addr, :ename, :ephone, :covered)";
               
    $stmt = $db->prepare($query);
    $stmt->bindParam(":user", $userId);
    $stmt->bindParam(":type", $leaveTypeId);
    $stmt->bindParam(":start", $input->startDate);
    $stmt->bindParam(":end", $input->endDate);
    $stmt->bindParam(":days", $daysRequested);
    $stmt->bindParam(":reason", $input->reason); // Or descriptive text? The format sends slug.
    $stmt->bindParam(":addr", $input->vacationAddress);
    $stmt->bindParam(":ename", $input->emergencyName);
    $stmt->bindParam(":ephone", $input->emergencyPhone);
    $stmt->bindParam(":covered", $input->coveredBy);
    
    if ($stmt->execute()) {
        http_response_code(201);
        echo json_encode(["status" => "success", "message" => "Leave request submitted successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Failed to submit request."]);
    }

} catch (PDOException $e) {
    http_response_code(503);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
