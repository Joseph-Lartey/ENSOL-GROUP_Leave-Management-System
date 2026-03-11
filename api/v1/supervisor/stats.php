<?php
// api/v1/supervisor/stats.php
// Get statistics for the supervisor's dashboard/approvals page
// Scoped to the supervisor's department/company (same logic as pending.php)

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

// Check role - must be supervisor or higher
if (!in_array($role, ['supervisor', 'hr', 'admin', 'superadmin'])) {
    http_response_code(403);
    echo json_encode(["status" => "error", "message" => "Access denied. Supervisor role required."]);
    exit;
}

$db = getDBConnection();

try {
    // Get supervisor's department to scope stats
    $deptQuery = "SELECT department FROM users WHERE id = :id";
    $stmt = $db->prepare($deptQuery);
    $stmt->bindParam(":id", $userId);
    $stmt->execute();
    $supervisor = $stmt->fetch(PDO::FETCH_ASSOC);
    $department = $supervisor ? $supervisor['department'] : '';

    // Base filter: same company, same department, not own requests
    $baseFilter = "JOIN users u ON lr.user_id = u.id
                   WHERE u.company_id = :company_id 
                     AND u.department = :department
                     AND lr.user_id != :user_id";

    // 1. Pending Requests
    $stmt = $db->prepare("SELECT COUNT(*) FROM leave_requests lr $baseFilter AND lr.status = 'pending'");
    $stmt->bindParam(":company_id", $companyId);
    $stmt->bindParam(":department", $department);
    $stmt->bindParam(":user_id", $userId);
    $stmt->execute();
    $pendingCount = (int)$stmt->fetchColumn();

    // 2. Approved Requests (approved_supervisor or approved_hr)
    $stmt = $db->prepare("SELECT COUNT(*) FROM leave_requests lr $baseFilter AND (lr.status = 'approved_supervisor' OR lr.status = 'approved_hr')");
    $stmt->bindParam(":company_id", $companyId);
    $stmt->bindParam(":department", $department);
    $stmt->bindParam(":user_id", $userId);
    $stmt->execute();
    $approvedCount = (int)$stmt->fetchColumn();

    // 3. Rejected Requests
    $stmt = $db->prepare("SELECT COUNT(*) FROM leave_requests lr $baseFilter AND lr.status = 'rejected'");
    $stmt->bindParam(":company_id", $companyId);
    $stmt->bindParam(":department", $department);
    $stmt->bindParam(":user_id", $userId);
    $stmt->execute();
    $rejectedCount = (int)$stmt->fetchColumn();

    // 4. Total Requests
    $stmt = $db->prepare("SELECT COUNT(*) FROM leave_requests lr $baseFilter");
    $stmt->bindParam(":company_id", $companyId);
    $stmt->bindParam(":department", $department);
    $stmt->bindParam(":user_id", $userId);
    $stmt->execute();
    $totalCount = (int)$stmt->fetchColumn();

    http_response_code(200);
    echo json_encode([
        "status" => "success",
        "data" => [
            "pending_count" => $pendingCount,
            "approved_count" => $approvedCount,
            "rejected_count" => $rejectedCount,
            "total_count" => $totalCount
        ]
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
