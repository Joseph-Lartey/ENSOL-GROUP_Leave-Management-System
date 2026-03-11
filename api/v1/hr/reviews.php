<?php
// api/v1/hr/reviews.php
// Get all leave requests for HR reviews page with optional filters

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

// Get filter parameters
$status = isset($_GET['status']) ? $_GET['status'] : null;
$department = isset($_GET['department']) ? $_GET['department'] : null;
$leaveType = isset($_GET['leave_type']) ? $_GET['leave_type'] : null;

$db = getDBConnection();

try {
    // Group HR (company_id = 1) sees all companies
    $isGroupHR = ($companyId == 1);

    // Build query with optional filters
    $query = "SELECT 
                lr.id,
                lr.user_id,
                u.full_name as employee_name,
                u.email as employee_email,
                u.department,
                u.position,
                c.name as company_name,
                lt.name as leave_type,
                lr.leave_type_id,
                lr.start_date,
                lr.end_date,
                lr.days_requested,
                lr.reason,
                lr.vacation_address,
                lr.emergency_contact_name,
                lr.emergency_contact_phone,
                lr.covered_by,
                lr.status,
                lr.rejection_reason,
                lr.created_at,
                lr.updated_at
              FROM leave_requests lr
              JOIN users u ON lr.user_id = u.id
              JOIN leave_types lt ON lr.leave_type_id = lt.id
              LEFT JOIN companies c ON u.company_id = c.id
              WHERE 1=1";

    $params = [];

    if (!$isGroupHR) {
        $query .= " AND u.company_id = :company_id";
        $params[':company_id'] = $companyId;
    }

    // Apply filters
    if ($status && $status !== '') {
        $query .= " AND lr.status = :status";
        $params[':status'] = $status;
    }

    if ($department && $department !== '') {
        $query .= " AND u.department = :department";
        $params[':department'] = $department;
    }

    if ($leaveType && $leaveType !== '') {
        $query .= " AND lt.name = :leave_type";
        $params[':leave_type'] = $leaveType;
    }

    $query .= " ORDER BY lr.created_at DESC";

    $stmt = $db->prepare($query);
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }
    $stmt->execute();
    $requests = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Get unique departments and leave types for filter dropdowns
    $deptQuery = "SELECT DISTINCT department FROM users WHERE department IS NOT NULL";
    if (!$isGroupHR) {
        $deptQuery .= " AND company_id = :company_id";
    }
    $stmt = $db->prepare($deptQuery);
    if (!$isGroupHR) {
        $stmt->bindParam(":company_id", $companyId);
    }
    $stmt->execute();
    $departments = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $typeQuery = "SELECT DISTINCT name FROM leave_types";
    $stmt = $db->prepare($typeQuery);
    $stmt->execute();
    $leaveTypes = $stmt->fetchAll(PDO::FETCH_COLUMN);

    http_response_code(200);
    echo json_encode([
        "status" => "success",
        "data" => $requests,
        "count" => count($requests),
        "filters" => [
            "departments" => $departments,
            "leave_types" => $leaveTypes
        ]
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
