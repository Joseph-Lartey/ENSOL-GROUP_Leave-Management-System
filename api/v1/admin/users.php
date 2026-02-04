<?php
// api/v1/admin/users.php
// List all users - for admin/HR management

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../../config/database.php';
require_once '../../middleware/AuthMiddleware.php';

// Authenticate Request
$userData = AuthMiddleware::authenticate();
$role = $userData['role'];
$companyId = $userData['company_id'];

// Check role - must be admin or higher
if (!in_array($role, ['admin', 'hr', 'superadmin'])) {
    http_response_code(403);
    echo json_encode(["status" => "error", "message" => "Access denied. Admin role required."]);
    exit;
}

$db = getDBConnection();

// Query parameters for filtering
$filterRole = $_GET['role'] ?? null;
$filterCompany = $_GET['company_id'] ?? $companyId; // Default to own company
$page = max(1, (int)($_GET['page'] ?? 1));
$limit = min(100, max(10, (int)($_GET['limit'] ?? 20)));
$offset = ($page - 1) * $limit;

try {
    // Build query with optional filters
    $query = "SELECT 
                u.id,
                u.full_name,
                u.email,
                u.role,
                u.position,
                u.phone,
                u.profile_image,
                u.is_verified,
                c.name as company_name,
                u.company_id,
                u.created_at
              FROM users u
              LEFT JOIN companies c ON u.company_id = c.id
              WHERE 1=1";
    
    $params = [];
    
    // Superadmin can see all companies, others see only their company
    if ($role !== 'superadmin') {
        $query .= " AND u.company_id = :company_id";
        $params[':company_id'] = $companyId;
    } elseif ($filterCompany) {
        $query .= " AND u.company_id = :company_id";
        $params[':company_id'] = $filterCompany;
    }
    
    if ($filterRole) {
        $query .= " AND u.role = :role";
        $params[':role'] = $filterRole;
    }
    
    $query .= " ORDER BY u.full_name ASC LIMIT :limit OFFSET :offset";

    $stmt = $db->prepare($query);
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Get total count for pagination
    $countQuery = "SELECT COUNT(*) FROM users u WHERE 1=1";
    if ($role !== 'superadmin') {
        $countQuery .= " AND company_id = :company_id";
    }
    $countStmt = $db->prepare($countQuery);
    if ($role !== 'superadmin') {
        $countStmt->bindParam(':company_id', $companyId);
    }
    $countStmt->execute();
    $totalUsers = $countStmt->fetchColumn();

    http_response_code(200);
    echo json_encode([
        "status" => "success",
        "data" => $users,
        "pagination" => [
            "page" => $page,
            "limit" => $limit,
            "total" => (int)$totalUsers,
            "total_pages" => ceil($totalUsers / $limit)
        ]
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
