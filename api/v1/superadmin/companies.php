<?php
// api/v1/superadmin/companies.php
// GET: List all companies/subsidiaries

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once '../../config/database.php';
require_once '../../middleware/AuthMiddleware.php';

$userData = AuthMiddleware::authenticate();
$role = $userData['role'];

if ($role !== 'superadmin') {
    http_response_code(403);
    echo json_encode(["status" => "error", "message" => "Access denied. SuperAdmin role required."]);
    exit;
}

$db = getDBConnection();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $stmt = $db->query("SELECT c.id, c.name, c.prefix, c.created_at,
                                   COUNT(u.id) as user_count
                            FROM companies c
                            LEFT JOIN users u ON u.company_id = c.id AND u.is_active = 1
                            GROUP BY c.id
                            ORDER BY c.name ASC");
        $companies = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $formatted = array_map(function($c) {
            return [
                'id' => (int)$c['id'],
                'name' => $c['name'],
                'prefix' => $c['prefix'],
                'user_count' => (int)$c['user_count'],
                'created_at' => $c['created_at']
            ];
        }, $companies);

        http_response_code(200);
        echo json_encode([
            "status" => "success",
            "data" => $formatted,
            "count" => count($formatted)
        ]);

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
    exit;
}

http_response_code(405);
echo json_encode(["status" => "error", "message" => "Method not allowed."]);
?>
