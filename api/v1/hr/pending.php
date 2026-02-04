<?php
// api/v1/hr/pending.php
// Get all leave requests awaiting HR approval (already approved by supervisor)

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../../config/database.php';
require_once '../../middleware/AuthMiddleware.php';

// Authenticate Request
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

$db = getDBConnection();

try {
    // Get requests that have been approved by supervisor, awaiting HR approval
    // HR can see requests from their company
    $query = "SELECT 
                lr.id,
                lr.user_id,
                u.full_name as employee_name,
                u.email as employee_email,
                u.position,
                c.name as company_name,
                lt.name as leave_type,
                lr.leave_type_id,
                lr.start_date,
                lr.end_date,
                lr.days_requested,
                lr.reason,
                lr.vacation_address,
                lr.emergency_contact_name,
                lr.emergency_contact_phone,
                lr.covered_by,
                lr.status,
                lr.created_at
              FROM leave_requests lr
              JOIN users u ON lr.user_id = u.id
              JOIN leave_types lt ON lr.leave_type_id = lt.id
              LEFT JOIN companies c ON u.company_id = c.id
              WHERE u.company_id = :company_id 
                AND lr.status = 'approved_supervisor'
              ORDER BY lr.created_at ASC";

    $stmt = $db->prepare($query);
    $stmt->bindParam(":company_id", $companyId);
    $stmt->execute();
    $requests = $stmt->fetchAll(PDO::FETCH_ASSOC);

    http_response_code(200);
    echo json_encode([
        "status" => "success",
        "data" => $requests,
        "count" => count($requests)
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
