<?php
// api/v1/user/requests.php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../../config/database.php';
require_once '../../middleware/AuthMiddleware.php';

// Authenticate Request
$userData = AuthMiddleware::authenticate();
$userId = $userData['user_id'];
$db = getDBConnection();

// Check for limits (e.g. for dashboard widget)
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 0;

try {
    $query = "SELECT lr.*, lt.name as leave_type 
              FROM leave_requests lr
              JOIN leave_types lt ON lr.leave_type_id = lt.id
              WHERE lr.user_id = :user_id 
              ORDER BY lr.created_at DESC";
    
    if ($limit > 0) {
        $query .= " LIMIT :limit";
    }

    $stmt = $db->prepare($query);
    $stmt->bindParam(":user_id", $userId);
    
    if ($limit > 0) {
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
    }
    
    $stmt->execute();
    $requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Calculate duration for each request
    foreach ($requests as &$req) {
        $start = new DateTime($req['start_date']);
        $end = new DateTime($req['end_date']);
        $req['duration'] = $start->diff($end)->days + 1; // Inclusive
    }

    http_response_code(200);
    echo json_encode(["status" => "success", "data" => $requests]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
