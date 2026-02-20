<?php
// api/v1/superadmin/stats.php
// Get dashboard statistics for SuperAdmin

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
    // 1. Total Active Users
    $stmt = $db->query("SELECT COUNT(*) FROM users WHERE is_active = 1");
    $totalUsers = (int)$stmt->fetchColumn();

    // 2. Count by Role
    $stmt = $db->query("SELECT role, COUNT(*) as count FROM users WHERE is_active = 1 GROUP BY role");
    $roleCounts = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

    $superadminCount = (int)($roleCounts['superadmin'] ?? 0);
    $hrCount = (int)($roleCounts['hr'] ?? 0);
    $supervisorCount = (int)($roleCounts['supervisor'] ?? 0);
    $employeeCount = (int)($roleCounts['employee'] ?? 0);

    // 3. Pending Disputes (as proxy for "pending requests" in dashboard)
    $stmt = $db->query("SELECT COUNT(*) FROM leave_disputes WHERE status = 'pending'");
    $pendingDisputes = (int)$stmt->fetchColumn();

    // 4. Inactive Users (for reference)
    $stmt = $db->query("SELECT COUNT(*) FROM users WHERE is_active = 0");
    $inactiveUsers = (int)$stmt->fetchColumn();

    http_response_code(200);
    echo json_encode([
        "status" => "success",
        "data" => [
            "total_users" => $totalUsers,
            "superadmin_count" => $superadminCount,
            "hr_count" => $hrCount,
            "supervisor_count" => $supervisorCount,
            "employee_count" => $employeeCount,
            "pending_requests" => $pendingDisputes,
            "inactive_users" => $inactiveUsers
        ]
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
