<?php
// api/v1/user/notifications.php
// GET: List notifications for the authenticated user (any role)
// PUT: Mark notification(s) as read

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, PUT, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once '../../config/database.php';
require_once '../../middleware/AuthMiddleware.php';

$userData = AuthMiddleware::authenticate();
$userId = $userData['user_id'];

$db = getDBConnection();

// ============ GET: List Notifications ============
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $query = "SELECT id, title, message, type, is_read, created_at FROM notifications WHERE user_id = :uid";
        $params = [':uid' => $userId];

        if (isset($_GET['is_read']) && $_GET['is_read'] !== '') {
            $query .= " AND is_read = :is_read";
            $params[':is_read'] = (int)$_GET['is_read'];
        }

        if (!empty($_GET['type'])) {
            $query .= " AND type = :type";
            $params[':type'] = $_GET['type'];
        }

        $query .= " ORDER BY created_at DESC";

        $limit = isset($_GET['limit']) ? min((int)$_GET['limit'], 100) : 50;
        $query .= " LIMIT " . $limit;

        $stmt = $db->prepare($query);
        $stmt->execute($params);
        $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Get unread count
        $countStmt = $db->prepare("SELECT COUNT(*) FROM notifications WHERE user_id = :uid AND is_read = 0");
        $countStmt->execute([':uid' => $userId]);
        $unreadCount = (int)$countStmt->fetchColumn();

        // Format with relative time
        $formatted = array_map(function($n) {
            $createdAt = new DateTime($n['created_at']);
            $now = new DateTime();
            $diff = $now->diff($createdAt);

            if ($diff->days == 0) {
                if ($diff->h == 0) {
                    $relativeTime = max($diff->i, 1) . ' minutes ago';
                } else {
                    $relativeTime = $diff->h . ' hours ago';
                }
            } elseif ($diff->days == 1) {
                $relativeTime = '1 day ago';
            } else {
                $relativeTime = $diff->days . ' days ago';
            }

            return [
                'id' => (int)$n['id'],
                'title' => $n['title'],
                'message' => $n['message'],
                'type' => $n['type'],
                'is_read' => (bool)$n['is_read'],
                'created_at' => $n['created_at'],
                'relative_time' => $relativeTime
            ];
        }, $notifications);

        http_response_code(200);
        echo json_encode([
            "status" => "success",
            "data" => $formatted,
            "unread_count" => $unreadCount,
            "count" => count($formatted)
        ]);

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
    exit;
}

// ============ PUT: Mark as Read ============
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $input = json_decode(file_get_contents("php://input"), true);

    try {
        if (!empty($input['mark_all'])) {
            $stmt = $db->prepare("UPDATE notifications SET is_read = 1 WHERE user_id = :uid AND is_read = 0");
            $stmt->execute([':uid' => $userId]);
            $affected = $stmt->rowCount();

            http_response_code(200);
            echo json_encode(["status" => "success", "message" => "$affected notifications marked as read."]);
        } elseif (!empty($input['id'])) {
            $stmt = $db->prepare("UPDATE notifications SET is_read = 1 WHERE id = :id AND user_id = :uid");
            $stmt->execute([':id' => (int)$input['id'], ':uid' => $userId]);

            http_response_code(200);
            echo json_encode(["status" => "success", "message" => "Notification marked as read."]);
        } else {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "Provide 'id' or 'mark_all' parameter."]);
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
    exit;
}

http_response_code(405);
echo json_encode(["status" => "error", "message" => "Method not allowed."]);
?>
