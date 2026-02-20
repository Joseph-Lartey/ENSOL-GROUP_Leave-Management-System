<?php
// api/v1/leaves/contest.php
// Submit a leave balance contest

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../../config/database.php';
require_once '../../middleware/AuthMiddleware.php';

// Authenticate Request
$userData = AuthMiddleware::authenticate();
$userId = $userData['user_id'];

$db = getDBConnection();

$data = json_decode(file_get_contents("php://input"), true);

// Validation
if (empty($data['leaveType']) || empty($data['comments'])) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Leave type and comments are required."]);
    exit;
}

try {
    // 1. Find Leave Balance ID for the given type
    // We need to map 'annual', 'sick' etc to leave_type_id
    // But leave_types name is "Annual Leave", etc.
    // The form sends 'annual', 'sick', 'personal'.
    // Let's map them or search by LIKE.
    
    $leaveTypeSlug = $data['leaveType'];
    $searchTerm = $leaveTypeSlug . '%'; // 'annual%' matches 'Annual Leave'

    $typeQuery = "SELECT id FROM leave_types WHERE name LIKE :name LIMIT 1";
    $stmt = $db->prepare($typeQuery);
    $stmt->bindParam(":name", $searchTerm);
    $stmt->execute();
    $typeId = $stmt->fetchColumn();

    if (!$typeId) {
        // Fallback: try direct match if front-end updates
        $stmt->bindParam(":name", $leaveTypeSlug);
        $stmt->execute();
        $typeId = $stmt->fetchColumn();
    }

    if (!$typeId) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "Invalid leave type specified."]);
        exit;
    }

    // 2. Get Leave Balance ID
    // Check if balance exists for this year (default to current year)
    $year = date('Y');
    $balQuery = "SELECT id FROM leave_balances WHERE user_id = :uid AND leave_type_id = :tid AND year = :year";
    $stmt = $db->prepare($balQuery);
    $stmt->bindParam(":uid", $userId);
    $stmt->bindParam(":tid", $typeId);
    $stmt->bindParam(":year", $year);
    $stmt->execute();
    $balanceId = $stmt->fetchColumn();

    if (!$balanceId) {
        // Create if not exists? Or just error. 
        // For contest log, maybe we need the balance to exist.
        // Let's error for now.
        http_response_code(404);
        echo json_encode(["status" => "error", "message" => "No leave balance found for this type to contest."]);
        exit;
    }

    // 3. Format Reason
    // Combine currentStat, correctStat and comments
    $fullReason = "Contest: " . $data['comments'];
    if (isset($data['currentStat'])) $fullReason .= " [Current: " . $data['currentStat'] . "]";
    if (isset($data['correctStat'])) $fullReason .= " [Claimed: " . $data['correctStat'] . "]";

    // 4. Insert Dispute
    $query = "INSERT INTO leave_disputes (user_id, leave_balance_id, reason, status) VALUES (:uid, :bid, :reason, 'pending')";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":uid", $userId);
    $stmt->bindParam(":bid", $balanceId);
    $stmt->bindParam(":reason", $fullReason);
    
    if ($stmt->execute()) {
        http_response_code(201);
        echo json_encode(["status" => "success", "message" => "Contest submitted successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Failed to submit contest."]);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
