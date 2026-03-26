<?php
// api/v1/hr/disputes.php
// Fetches leave disputes for HR to review. (Group HR sees all, Subsidiary HR sees only theirs)

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Method not allowed"]);
    exit;
}

require_once '../../config/database.php';
require_once '../../middleware/AuthMiddleware.php';

// Authenticate -> must be hr or admin/superadmin
$userData = AuthMiddleware::authenticate();
$role = $userData['role'];
$companyId = $userData['company_id'];

if (!in_array($role, ['hr', 'admin', 'superadmin'])) {
    http_response_code(403);
    echo json_encode(["status" => "error", "message" => "Access denied. HR role required."]);
    exit;
}

// Check if Group HR (assuming company_id 1 is Group)
$isGroupHR = ($companyId == 1 && $role == 'hr') || in_array($role, ['admin', 'superadmin']);

try {
    $db = getDBConnection();
    
    $query = "SELECT d.id, d.user_id, u.full_name as employee_name, u.email as employee_email, 
                     d.leave_type, d.current_stat, d.correct_stat, d.comments, d.status, 
                     d.admin_comments, d.created_at, d.updated_at, c.name as company_name
              FROM leave_disputes d
              JOIN users u ON d.user_id = u.id
              LEFT JOIN companies c ON u.company_id = c.id
              WHERE 1=1";
    
    $params = [];
    
    // Group HR sees all, Subsidiary HR sees only their company
    if (!$isGroupHR) {
        $query .= " AND u.company_id = :company_id";
        $params[':company_id'] = $companyId;
    }
    
    // Optional status filter
    if (isset($_GET['status']) && !empty($_GET['status'])) {
        $query .= " AND d.status = :status";
        $params[':status'] = $_GET['status'];
    }
    
    $query .= " ORDER BY d.created_at DESC";
    
    $stmt = $db->prepare($query);
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }
    
    $stmt->execute();
    $disputes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    http_response_code(200);
    echo json_encode([
        "status" => "success", 
        "data" => $disputes
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
