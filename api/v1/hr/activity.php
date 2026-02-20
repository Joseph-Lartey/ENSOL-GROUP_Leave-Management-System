<?php
// api/v1/hr/activity.php
// Get recent leave activity for HR dashboard

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

$limit = isset($_GET['limit']) ? min((int)$_GET['limit'], 20) : 5;

$db = getDBConnection();

try {
    // Get recent leave requests with their status
    $query = "SELECT 
                lr.id,
                u.full_name as employee_name,
                lt.name as leave_type,
                lr.status,
                lr.start_date,
                lr.end_date,
                lr.days_requested,
                lr.created_at,
                lr.updated_at
              FROM leave_requests lr
              JOIN users u ON lr.user_id = u.id
              JOIN leave_types lt ON lr.leave_type_id = lt.id
              WHERE u.company_id = :company_id
              ORDER BY lr.updated_at DESC
              LIMIT :limit";

    $stmt = $db->prepare($query);
    $stmt->bindParam(":company_id", $companyId);
    $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
    $stmt->execute();
    $activity = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Format the activity for frontend display
    $formattedActivity = array_map(function($item) {
        // Determine activity type based on status
        $activityType = 'request';
        if ($item['status'] === 'approved_hr' || $item['status'] === 'approved_supervisor') {
            $activityType = 'approved';
        } else if ($item['status'] === 'rejected') {
            $activityType = 'denied';
        }
        
        return [
            'id' => $item['id'],
            'employee_name' => $item['employee_name'],
            'leave_type' => $item['leave_type'],
            'status' => $item['status'],
            'activity_type' => $activityType,
            'start_date' => $item['start_date'],
            'end_date' => $item['end_date'],
            'days' => $item['days_requested'],
            'date' => date('d.m.Y', strtotime($item['updated_at']))
        ];
    }, $activity);

    http_response_code(200);
    echo json_encode([
        "status" => "success",
        "data" => $formattedActivity,
        "count" => count($formattedActivity)
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
