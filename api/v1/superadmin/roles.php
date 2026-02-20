<?php
// api/v1/superadmin/roles.php
// GET: Return role definitions with user counts

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
        // Get user counts by role
        $stmt = $db->query("SELECT role, COUNT(*) as count FROM users WHERE is_active = 1 GROUP BY role");
        $roleCounts = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

        // Define role metadata
        $roles = [
            [
                'key' => 'superadmin',
                'name' => 'SuperAdmin',
                'description' => 'Full system access with complete control over all users, roles, and permissions.',
                'color' => '#7c3aed',
                'user_count' => (int)($roleCounts['superadmin'] ?? 0),
                'permissions' => [
                    'Manage all users and roles',
                    'System configuration access',
                    'View all activity logs',
                    'Manage subsidiaries'
                ]
            ],
            [
                'key' => 'hr',
                'name' => 'HR Administrator',
                'description' => 'Administrative access to manage employees, approvals, and department settings.',
                'color' => '#dc2626',
                'user_count' => (int)($roleCounts['hr'] ?? 0),
                'permissions' => [
                    'Final leave approval/rejection',
                    'Manage employee records',
                    'View leave reports',
                    'Handle leave disputes'
                ]
            ],
            [
                'key' => 'supervisor',
                'name' => 'Supervisor',
                'description' => 'First-level approval authority for team leave requests with department oversight.',
                'color' => '#d97706',
                'user_count' => (int)($roleCounts['supervisor'] ?? 0),
                'permissions' => [
                    'Approve/reject team leave requests',
                    'View team leave balances',
                    'Submit own leave requests',
                    'View team calendar'
                ]
            ],
            [
                'key' => 'employee',
                'name' => 'Employee',
                'description' => 'Standard user access for submitting and tracking leave requests.',
                'color' => '#2563eb',
                'user_count' => (int)($roleCounts['employee'] ?? 0),
                'permissions' => [
                    'Submit leave requests',
                    'View own leave balance',
                    'Track request status',
                    'Update profile'
                ]
            ]
        ];

        http_response_code(200);
        echo json_encode([
            "status" => "success",
            "data" => $roles,
            "total_users" => array_sum(array_column($roles, 'user_count'))
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
