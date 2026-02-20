<?php
// api/v1/supervisor/activity.php
// Get recent activity for supervisor's dashboard (requests from team)

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../../config/database.php';
require_once '../../middleware/AuthMiddleware.php';

// Authenticate Request
$userData = AuthMiddleware::authenticate();
$userId = $userData['user_id'];
$companyId = $userData['company_id'];
$role = $userData['role'];

if (!in_array($role, ['supervisor', 'hr', 'admin', 'superadmin'])) {
    http_response_code(403);
    echo json_encode(["status" => "error", "message" => "Access denied."]);
    exit;
}

$db = getDBConnection();

try {
    // Fetch recent 5 requests from team members
    $query = "SELECT 
                lr.id,
                u.full_name as employee_name,
                lt.name as leave_type,
                lr.status,
                lr.created_at,
                lr.start_date
              FROM leave_requests lr
              JOIN users u ON lr.user_id = u.id
              JOIN leave_types lt ON lr.leave_type_id = lt.id
              WHERE u.company_id = :company_id 
                AND lr.user_id != :user_id
              ORDER BY lr.created_at DESC
              LIMIT 5";

    $stmt = $db->prepare($query);
    $stmt->bindParam(":company_id", $companyId);
    $stmt->bindParam(":user_id", $userId);
    $stmt->execute();
    
    $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Format dates and status for easier frontend consumption if needed
    foreach ($activities as &$activity) {
        $activity['formatted_date'] = date('d.m.Y', strtotime($activity['created_at']));
    }

    http_response_code(200);
    echo json_encode([
        "status" => "success",
        "data" => $activities
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
