<?php
// api/v1/hr/stats.php
// Get HR dashboard statistics for leave requests in the company

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
    // 1. Total Leave Applications (all requests from company employees)
    $totalQuery = "SELECT COUNT(*) as total FROM leave_requests lr
                   JOIN users u ON lr.user_id = u.id
                   WHERE u.company_id = :company_id";
    $stmt = $db->prepare($totalQuery);
    $stmt->bindParam(":company_id", $companyId);
    $stmt->execute();
    $totalApplications = (int)$stmt->fetchColumn();

    // 2. Approved Count (status = 'approved_hr')
    $approvedQuery = "SELECT COUNT(*) as approved FROM leave_requests lr
                      JOIN users u ON lr.user_id = u.id
                      WHERE u.company_id = :company_id AND lr.status = 'approved_hr'";
    $stmt = $db->prepare($approvedQuery);
    $stmt->bindParam(":company_id", $companyId);
    $stmt->execute();
    $totalApproved = (int)$stmt->fetchColumn();

    // 3. Denied/Rejected Count
    $deniedQuery = "SELECT COUNT(*) as denied FROM leave_requests lr
                    JOIN users u ON lr.user_id = u.id
                    WHERE u.company_id = :company_id AND lr.status = 'rejected'";
    $stmt = $db->prepare($deniedQuery);
    $stmt->bindParam(":company_id", $companyId);
    $stmt->execute();
    $totalDenied = (int)$stmt->fetchColumn();

    // 4. Pending (awaiting HR approval)
    $pendingQuery = "SELECT COUNT(*) as pending FROM leave_requests lr
                     JOIN users u ON lr.user_id = u.id
                     WHERE u.company_id = :company_id AND lr.status = 'approved_supervisor'";
    $stmt = $db->prepare($pendingQuery);
    $stmt->bindParam(":company_id", $companyId);
    $stmt->execute();
    $pendingCount = (int)$stmt->fetchColumn();

    // 5. Currently On Leave (approved_hr and dates overlap today)
    $today = date('Y-m-d');
    $onLeaveQuery = "SELECT COUNT(*) as on_leave FROM leave_requests lr
                     JOIN users u ON lr.user_id = u.id
                     WHERE u.company_id = :company_id 
                       AND lr.status = 'approved_hr'
                       AND lr.start_date <= :today
                       AND lr.end_date >= :today";
    $stmt = $db->prepare($onLeaveQuery);
    $stmt->bindParam(":company_id", $companyId);
    $stmt->bindParam(":today", $today);
    $stmt->execute();
    $onLeaveCount = (int)$stmt->fetchColumn();

    // 6. Total Employees in company
    $employeeQuery = "SELECT COUNT(*) as total FROM users WHERE company_id = :company_id";
    $stmt = $db->prepare($employeeQuery);
    $stmt->bindParam(":company_id", $companyId);
    $stmt->execute();
    $totalEmployees = (int)$stmt->fetchColumn();

    // Present = Total Employees - On Leave
    $presentCount = $totalEmployees - $onLeaveCount;

    http_response_code(200);
    echo json_encode([
        "status" => "success",
        "data" => [
            "total_applications" => $totalApplications,
            "total_approved" => $totalApproved,
            "total_denied" => $totalDenied,
            "pending_count" => $pendingCount,
            "on_leave" => $onLeaveCount,
            "present" => $presentCount,
            "total_employees" => $totalEmployees
        ]
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
