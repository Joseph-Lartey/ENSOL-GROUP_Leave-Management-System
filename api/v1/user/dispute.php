<?php
// api/v1/user/dispute.php
// User submits a leave balance dispute

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' && $_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Method not allowed"]);
    exit;
}

require_once '../../config/database.php';
require_once '../../middleware/AuthMiddleware.php';

// Authenticate
$userData = AuthMiddleware::authenticate();
$userId = $userData['user_id'];

$db = getDBConnection();

// GET Method: Fetch User's Disputes
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $query = "SELECT id, leave_type, current_stat, correct_stat, status, created_at, updated_at, admin_comments FROM leave_disputes WHERE user_id = :uid ORDER BY created_at DESC";
        $stmt = $db->prepare($query);
        $stmt->execute([':uid' => $userId]);
        $disputes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        http_response_code(200);
        echo json_encode(["status" => "success", "data" => $disputes]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Database error"]);
    }
    exit;
}

// POST Method: Submit a new dispute
$input = json_decode(file_get_contents("php://input"));

if (empty($input->leave_type) || !isset($input->current_stat) || !isset($input->correct_stat)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Please fill all required fields."]);
    exit;
}

try {
    $db = getDBConnection();

    $query = "INSERT INTO leave_disputes (user_id, leave_type, current_stat, correct_stat, comments, status) 
              VALUES (:user_id, :leave_type, :current_stat, :correct_stat, :comments, 'pending')";
              
    $stmt = $db->prepare($query);
    $stmt->bindParam(":user_id", $userId);
    $stmt->bindParam(":leave_type", $input->leave_type);
    $stmt->bindParam(":current_stat", $input->current_stat);
    $stmt->bindParam(":correct_stat", $input->correct_stat);
    $stmt->bindParam(":comments", $input->comments);

    if ($stmt->execute()) {
        // Fetch user's company_id and full_name
        $uQuery = "SELECT full_name, company_id FROM users WHERE id = :uid";
        $uStmt = $db->prepare($uQuery);
        $uStmt->bindParam(":uid", $userId);
        $uStmt->execute();
        $employee = $uStmt->fetch(PDO::FETCH_ASSOC);

        if ($employee) {
            $empName = $employee['full_name'];
            $empCompany = $employee['company_id'];

            // Find HR users in the same company
            $hrQuery = "SELECT id FROM users WHERE role IN ('hr', 'admin') AND company_id = :cid";
            $hrStmt = $db->prepare($hrQuery);
            $hrStmt->bindParam(":cid", $empCompany);
            $hrStmt->execute();
            $hrUsers = $hrStmt->fetchAll(PDO::FETCH_COLUMN);

            // Notify HR users
            foreach ($hrUsers as $hrId) {
                $nQuery = "INSERT INTO notifications (user_id, title, message, type) VALUES (:uid, :title, :msg, 'warning')";
                $nStmt = $db->prepare($nQuery);
                $nTitle = "New Leave Dispute";
                $nMsg = "$empName has submitted a new leave balance dispute requiring HR review.";
                $nStmt->bindParam(":uid", $hrId);
                $nStmt->bindParam(":title", $nTitle);
                $nStmt->bindParam(":msg", $nMsg);
                $nStmt->execute();
            }
        }

        http_response_code(201);
        echo json_encode(["status" => "success", "message" => "Leave contest submitted successfully. HR will review it."]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Failed to submit contest."]);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
