<?php
// api/v1/dashboard/stats.php
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
$currentYear = date('Y');

try {
    // 1. Get Leave Balances
    // We want the total days remaining across all allocated leave types for the current year
    $balanceQuery = "SELECT SUM(days_remaining) as total_remaining, SUM(days_allocated) as total_allocated 
                     FROM leave_balances 
                     WHERE user_id = :user_id AND year = :year";
    
    $stmt = $db->prepare($balanceQuery);
    $stmt->bindParam(":user_id", $userId);
    $stmt->bindParam(":year", $currentYear);
    $stmt->execute();
    $balanceData = $stmt->fetch(PDO::FETCH_ASSOC);

    // If no balance record exists (new user), we might want to return 0 or default
    // Ideally, balances are seeded upon user creation. 
    $totalRemaining = $balanceData['total_remaining'] ?? 0;
    $totalAllocated = $balanceData['total_allocated'] ?? 0; // Or default 20 if we want to show policy max

    // 2. Get Pending Requests Count
    $pendingQuery = "SELECT COUNT(*) as pending_count 
                     FROM leave_requests 
                     WHERE user_id = :user_id AND status = 'pending'";
    
    $stmt = $db->prepare($pendingQuery);
    $stmt->bindParam(":user_id", $userId);
    $stmt->execute();
    $pendingData = $stmt->fetch(PDO::FETCH_ASSOC);
    $pendingCount = $pendingData['pending_count'];

    // 3. Get Approved Requests Count (Optional but useful)
    $approvedQuery = "SELECT COUNT(*) as approved_count 
                      FROM leave_requests 
                      WHERE user_id = :user_id AND (status = 'approved_supervisor' OR status = 'approved_hr')"; // Simplified check
    
    // Actually status might just be one final 'approved' or checking flow. 
    // Schema says: approved_supervisor, approved_hr. 
    // Usually 'approved_hr' is final. Let's count 'approved_hr' as fully approved for now, or both.
    // Dashboard usually shows "Approved Leaves" or "Used Leaves". 
    // "Used" is better calculated from days_used in balance table.
    
    // Let's stick to the UI requirements: 
    // Usually: Balance, Pending Requests.
    
    // 4. Get Sick Leave Balance specifically
    // Need to JOIN with leave_types table since leave_balances uses leave_type_id FK
    $sickQuery = "SELECT lb.days_remaining 
                  FROM leave_balances lb
                  JOIN leave_types lt ON lb.leave_type_id = lt.id
                  WHERE lb.user_id = :user_id AND lb.year = :year AND lt.name = 'sick'";
    
    $stmt = $db->prepare($sickQuery);
    $stmt->bindParam(":user_id", $userId);
    $stmt->bindParam(":year", $currentYear);
    $stmt->execute();
    $sickData = $stmt->fetch(PDO::FETCH_ASSOC);
    $sickBalance = $sickData['days_remaining'] ?? 0;
    
    $response = [
        "leave_balance" => (int)$totalRemaining,
        "total_allowed" => (int)$totalAllocated,
        "pending_requests" => (int)$pendingCount,
        "sick_balance" => (int)$sickBalance
    ];

    http_response_code(200);
    echo json_encode(["status" => "success", "data" => $response]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
