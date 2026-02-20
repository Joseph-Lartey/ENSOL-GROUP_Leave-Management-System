<?php
// api/v1/superadmin/logs.php
// GET: Fetch activity logs with filters

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../../config/database.php';
require_once '../../middleware/AuthMiddleware.php';

// Authenticate Request
$userData = AuthMiddleware::authenticate();
$role = $userData['role'];

// Check role - must be superadmin
if ($role !== 'superadmin') {
    http_response_code(403);
    echo json_encode(["status" => "error", "message" => "Access denied. SuperAdmin role required."]);
    exit;
}

$db = getDBConnection();

try {
    $query = "SELECT al.id, al.action_type, al.target_id, al.target_type, al.details, al.ip_address, al.created_at,
                     u.full_name as actor_name, u.role as actor_role, u.profile_image as actor_image
              FROM activity_logs al
              JOIN users u ON al.actor_id = u.id
              WHERE 1=1";
    $params = [];

    // Filter by user (actor)
    if (!empty($_GET['user'])) {
        $query .= " AND u.full_name LIKE :user";
        $params[':user'] = '%' . $_GET['user'] . '%';
    }

    // Filter by action type
    if (!empty($_GET['action'])) {
        $query .= " AND al.action_type = :action";
        $params[':action'] = $_GET['action'];
    }

    // Filter by date
    if (!empty($_GET['date'])) {
        $query .= " AND DATE(al.created_at) = :date";
        $params[':date'] = $_GET['date'];
    }

    // Order and limit
    $query .= " ORDER BY al.created_at DESC";
    
    $limit = isset($_GET['limit']) ? min((int)$_GET['limit'], 100) : 50;
    $query .= " LIMIT " . $limit;

    $stmt = $db->prepare($query);
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }
    $stmt->execute();
    $logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Format response with relative time
    $formattedLogs = array_map(function($log) {
        $createdAt = new DateTime($log['created_at']);
        $now = new DateTime();
        $diff = $now->diff($createdAt);
        
        if ($diff->days == 0) {
            if ($diff->h == 0) {
                $relativeTime = $diff->i . ' minutes ago';
            } else {
                $relativeTime = $diff->h . ' hours ago';
            }
        } elseif ($diff->days == 1) {
            $relativeTime = '1 day ago';
        } else {
            $relativeTime = $diff->days . ' days ago';
        }

        return [
            'id' => (int)$log['id'],
            'action_type' => $log['action_type'],
            'target_id' => $log['target_id'],
            'target_type' => $log['target_type'],
            'details' => $log['details'],
            'ip_address' => $log['ip_address'],
            'created_at' => $log['created_at'],
            'relative_time' => $relativeTime,
            'actor' => [
                'name' => $log['actor_name'],
                'role' => $log['actor_role'],
                'image' => $log['actor_image']
            ]
        ];
    }, $logs);

    http_response_code(200);
    echo json_encode([
        "status" => "success",
        "data" => $formattedLogs,
        "count" => count($formattedLogs)
    ]);

} catch (PDOException $e) {
    // If table doesn't exist, return empty array gracefully
    if (strpos($e->getMessage(), "doesn't exist") !== false) {
        http_response_code(200);
        echo json_encode([
            "status" => "success",
            "data" => [],
            "count" => 0,
            "note" => "Activity logs table not yet created."
        ]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
}
?>
