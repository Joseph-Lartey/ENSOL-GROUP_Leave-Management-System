<?php
// api/v1/hr/employees.php
// Get all employees for HR view (excludes superadmin)

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

// Check role - must be HR or higher (but not superadmin data)
if (!in_array($role, ['hr', 'admin', 'superadmin'])) {
    http_response_code(403);
    echo json_encode(["status" => "error", "message" => "Access denied. HR role required."]);
    exit;
}

$db = getDBConnection();

try {
    // Get all employees except superadmin
    // HR can see employees from their company
    $query = "SELECT 
                u.id,
                u.full_name,
                u.email,
                u.position,
                u.role,
                u.phone,
                u.profile_image,
                c.name as company_name,
                d.name as department_name,
                u.created_at
              FROM users u
              LEFT JOIN companies c ON u.company_id = c.id
              LEFT JOIN departments d ON u.department_id = d.id
              WHERE u.company_id = :company_id 
                AND u.role != 'superadmin'
              ORDER BY u.full_name ASC";

    $stmt = $db->prepare($query);
    $stmt->bindParam(":company_id", $companyId);
    $stmt->execute();
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Get unique departments and companies for filters
    $deptQuery = "SELECT DISTINCT d.name FROM departments d 
                  JOIN users u ON u.department_id = d.id 
                  WHERE u.company_id = :company_id AND d.name IS NOT NULL";
    $deptStmt = $db->prepare($deptQuery);
    $deptStmt->bindParam(":company_id", $companyId);
    $deptStmt->execute();
    $departments = $deptStmt->fetchAll(PDO::FETCH_COLUMN);

    $compQuery = "SELECT DISTINCT c.name FROM companies c WHERE c.id = :company_id";
    $compStmt = $db->prepare($compQuery);
    $compStmt->bindParam(":company_id", $companyId);
    $compStmt->execute();
    $companies = $compStmt->fetchAll(PDO::FETCH_COLUMN);

    http_response_code(200);
    echo json_encode([
        "status" => "success",
        "data" => $employees,
        "count" => count($employees),
        "filters" => [
            "departments" => $departments,
            "companies" => $companies
        ]
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
