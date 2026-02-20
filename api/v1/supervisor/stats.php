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
    // 1. Pending Requests (same as pending.php count)
    // Pending status for supervisor is just 'pending'
    $pendingQuery = "SELECT COUNT(*) as pending FROM leave_requests lr
                     JOIN users u ON lr.user_id = u.id
                     WHERE u.company_id = :company_id 
                       AND lr.user_id != :user_id
                       AND lr.status = 'pending'";
    
    $stmt = $db->prepare($pendingQuery);
    $stmt->bindParam(":company_id", $companyId);
    $stmt->bindParam(":user_id", $userId);
    $stmt->execute();
    $pendingCount = (int)$stmt->fetchColumn();

    // 2. Approved Requests (by supervisor)
    // Status 'approved_supervisor' means supervisor approved it (and it's now with HR)
    // Status 'approved_hr' means it's fully approved (supervisor also approved it implicitly or explicitly)
    // But strictly speaking, the supervisor action was to 'approve'.
    // We can check if it was approved by this user? Or just status based.
    // Let's stick to status based for simpler stats first.
    // 'approved_supervisor' + requests that went on to be 'approved_hr' (if filtered by dept/company)
    
    // For simplicity, let's count 'approved_supervisor' AND 'approved_hr' as "Approved" in the context of the team.
    $approvedQuery = "SELECT COUNT(*) as approved FROM leave_requests lr
                      JOIN users u ON lr.user_id = u.id
                      WHERE u.company_id = :company_id 
                        AND lr.user_id != :user_id
                        AND (lr.status = 'approved_supervisor' OR lr.status = 'approved_hr')";
    
    $stmt = $db->prepare($approvedQuery);
    $stmt->bindParam(":company_id", $companyId);
    $stmt->bindParam(":user_id", $userId);
    $stmt->execute();
    $approvedCount = (int)$stmt->fetchColumn();

    // 3. Rejected Requests
    $rejectedQuery = "SELECT COUNT(*) as rejected FROM leave_requests lr
                      JOIN users u ON lr.user_id = u.id
                      WHERE u.company_id = :company_id 
                        AND lr.user_id != :user_id
                        AND lr.status = 'rejected'";
    
    $stmt = $db->prepare($rejectedQuery);
    $stmt->bindParam(":company_id", $companyId);
    $stmt->bindParam(":user_id", $userId);
    $stmt->execute();
    $rejectedCount = (int)$stmt->fetchColumn();

    // 4. Total Requests (sum of all interaction)
    $totalQuery = "SELECT COUNT(*) as total FROM leave_requests lr
                   JOIN users u ON lr.user_id = u.id
                   WHERE u.company_id = :company_id 
                     AND lr.user_id != :user_id";
    $stmt = $db->prepare($totalQuery);
    $stmt->bindParam(":company_id", $companyId);
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
?>
