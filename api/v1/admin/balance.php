<?php
// api/v1/admin/balance.php
// Allocate or adjust leave balance for a user

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../../config/database.php';
require_once '../../middleware/AuthMiddleware.php';

// Authenticate Request
$userData = AuthMiddleware::authenticate();
$role = $userData['role'];
$companyId = $userData['company_id'];

// Check role - must be admin/HR or higher
if (!in_array($role, ['admin', 'hr', 'superadmin'])) {
    http_response_code(403);
    echo json_encode(["status" => "error", "message" => "Access denied. Admin/HR role required."]);
    exit;
}

$db = getDBConnection();

// ====== GET - View user's leave balances ======
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $targetUserId = $_GET['user_id'] ?? null;
    $year = $_GET['year'] ?? date('Y');
    
    if (!$targetUserId) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "user_id is required."]);
        exit;
    }

    try {
        // Verify user belongs to same company (unless superadmin)
        if ($role !== 'superadmin') {
            $checkUser = "SELECT id FROM users WHERE id = :id AND company_id = :company_id";
            $stmt = $db->prepare($checkUser);
            $stmt->bindParam(":id", $targetUserId);
            $stmt->bindParam(":company_id", $companyId);
            $stmt->execute();
            if ($stmt->rowCount() === 0) {
                http_response_code(403);
                echo json_encode(["status" => "error", "message" => "Access denied to this user."]);
                exit;
            }
        }

        $query = "SELECT 
                    lb.id,
                    lb.leave_type_id,
                    lt.name as leave_type,
                    lb.days_allocated,
                    lb.days_used,
                    lb.days_remaining,
                    lb.year
                  FROM leave_balances lb
                  JOIN leave_types lt ON lb.leave_type_id = lt.id
                  WHERE lb.user_id = :user_id AND lb.year = :year
                  ORDER BY lt.id";
        
        $stmt = $db->prepare($query);
        $stmt->bindParam(":user_id", $targetUserId);
        $stmt->bindParam(":year", $year);
        $stmt->execute();
        $balances = $stmt->fetchAll(PDO::FETCH_ASSOC);

        http_response_code(200);
        echo json_encode([
            "status" => "success",
            "data" => $balances,
            "user_id" => (int)$targetUserId,
            "year" => $year
        ]);

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
    exit;
}

// ====== POST - Create or Update leave balance ======
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents("php://input"));
    
    if (empty($input->user_id) || empty($input->leave_type_id) || !isset($input->days_allocated)) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "user_id, leave_type_id, and days_allocated are required."]);
        exit;
    }
    
    $targetUserId = $input->user_id;
    $leaveTypeId = $input->leave_type_id;
    $daysAllocated = (int)$input->days_allocated;
    $year = $input->year ?? date('Y');
    $daysUsed = $input->days_used ?? 0;

    try {
        // Verify user belongs to same company (unless superadmin)
        if ($role !== 'superadmin') {
            $checkUser = "SELECT id FROM users WHERE id = :id AND company_id = :company_id";
            $stmt = $db->prepare($checkUser);
            $stmt->bindParam(":id", $targetUserId);
            $stmt->bindParam(":company_id", $companyId);
            $stmt->execute();
            if ($stmt->rowCount() === 0) {
                http_response_code(403);
                echo json_encode(["status" => "error", "message" => "Access denied to this user."]);
                exit;
            }
        }

        // Check if balance record exists
        $checkBalance = "SELECT id FROM leave_balances 
                         WHERE user_id = :user_id AND leave_type_id = :leave_type_id AND year = :year";
        $stmt = $db->prepare($checkBalance);
        $stmt->bindParam(":user_id", $targetUserId);
        $stmt->bindParam(":leave_type_id", $leaveTypeId);
        $stmt->bindParam(":year", $year);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            // Update existing
            $updateQuery = "UPDATE leave_balances 
                            SET days_allocated = :days_allocated, days_used = :days_used
                            WHERE user_id = :user_id AND leave_type_id = :leave_type_id AND year = :year";
            $stmt = $db->prepare($updateQuery);
            $stmt->bindParam(":days_allocated", $daysAllocated);
            $stmt->bindParam(":days_used", $daysUsed);
            $stmt->bindParam(":user_id", $targetUserId);
            $stmt->bindParam(":leave_type_id", $leaveTypeId);
            $stmt->bindParam(":year", $year);
            $stmt->execute();
            $message = "Leave balance updated successfully.";
        } else {
            // Insert new
            $insertQuery = "INSERT INTO leave_balances (user_id, leave_type_id, days_allocated, days_used, year) 
                            VALUES (:user_id, :leave_type_id, :days_allocated, :days_used, :year)";
            $stmt = $db->prepare($insertQuery);
            $stmt->bindParam(":user_id", $targetUserId);
            $stmt->bindParam(":leave_type_id", $leaveTypeId);
            $stmt->bindParam(":days_allocated", $daysAllocated);
            $stmt->bindParam(":days_used", $daysUsed);
            $stmt->bindParam(":year", $year);
            $stmt->execute();
            $message = "Leave balance created successfully.";
        }

        http_response_code(200);
        echo json_encode([
            "status" => "success",
            "message" => $message
        ]);

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
    exit;
}

// Invalid method
http_response_code(405);
echo json_encode(["status" => "error", "message" => "Method not allowed"]);
?>
