<?php
// api/v1/hr/resolve_dispute.php
// HR resolves or rejects an employee's leave dispute

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Method not allowed"]);
    exit;
}

require_once '../../config/database.php';
require_once '../../middleware/AuthMiddleware.php';

// Authenticate
$userData = AuthMiddleware::authenticate();
$userId = $userData['user_id'];
$role = $userData['role'];
$companyId = $userData['company_id'];

if (!in_array($role, ['hr', 'admin', 'superadmin'])) {
    http_response_code(403);
    echo json_encode(["status" => "error", "message" => "Access denied. HR role required."]);
    exit;
}

// Get Input
$input = json_decode(file_get_contents("php://input"));

if (empty($input->dispute_id) || empty($input->status)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Dispute ID and Status are required."]);
    exit;
}

if (!in_array($input->status, ['resolved', 'rejected'])) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Invalid status. Use 'resolved' or 'rejected'."]);
    exit;
}

try {
    $db = getDBConnection();

    // Verify dispute exists and is accessible
    $checkQuery = "SELECT d.id, u.company_id, u.full_name, u.email 
                   FROM leave_disputes d
                   JOIN users u ON d.user_id = u.id
                   WHERE d.id = :id";
    $stmt = $db->prepare($checkQuery);
    $stmt->bindParam(":id", $input->dispute_id);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        http_response_code(404);
        echo json_encode(["status" => "error", "message" => "Dispute not found."]);
        exit;
    }

    $dispute = $stmt->fetch(PDO::FETCH_ASSOC);

    // Subsidiary HR can only resolve disputes from their company
    $isGroupHR = ($companyId == 1 && $role == 'hr') || in_array($role, ['admin', 'superadmin']);
    if (!$isGroupHR && $dispute['company_id'] != $companyId) {
        http_response_code(403);
        echo json_encode(["status" => "error", "message" => "You can only resolve disputes for your own company."]);
        exit;
    }

    // Update the dispute status and add HR comments
    $updateQuery = "UPDATE leave_disputes 
                    SET status = :status, admin_comments = :admin_comments, updated_at = CURRENT_TIMESTAMP
                    WHERE id = :id";
    $stmt = $db->prepare($updateQuery);
    $stmt->bindParam(":id", $input->dispute_id);
    $stmt->bindParam(":status", $input->status);
    $adminComments = $input->admin_comments ?? '';
    $stmt->bindParam(":admin_comments", $adminComments);

    if ($stmt->execute()) {
        // Automatically add a notification for the user about the resolution
        $title = $input->status === 'resolved' ? "Leave Dispute Resolved" : "Leave Dispute Rejected";
        $type = $input->status === 'resolved' ? "success" : "error";
        $msg = $input->status === 'resolved' 
            ? "Your leave balance dispute has been reviewed and resolved. Comment: " . $adminComments
            : "Your leave balance dispute was rejected. Reason: " . $adminComments;
            
        $notifQuery = "INSERT INTO notifications (user_id, title, message, type) VALUES (:uid, :title, :msg, :type)";
        $notifStmt = $db->prepare($notifQuery);
        // We know user_id is in the DB but we didn't SELECT it earlier, so let's get it another way,
        // Wait, yes we did. We need to select user_id in the check query! Let's update check query locally.
        
        // Actually I forgot to select d.user_id. Let me run an update now.
        $uidQuery = "SELECT user_id FROM leave_disputes WHERE id = ?";
        $uidStmt = $db->prepare($uidQuery);
        $uidStmt->execute([$input->dispute_id]);
        $targetUserId = $uidStmt->fetchColumn();

        $notifStmt->bindParam(":uid", $targetUserId);
        $notifStmt->bindParam(":title", $title);
        $notifStmt->bindParam(":msg", $msg);
        $notifStmt->bindParam(":type", $type);
        $notifStmt->execute();

        // Handle leave balance adjustment if override_days_used was provided
        $balanceUpdated = false;
        if ($input->status === 'resolved' && isset($input->override_days_used) && is_numeric($input->override_days_used)) {
            // Get the leave_type string from the dispute
            $dtQuery = "SELECT leave_type FROM leave_disputes WHERE id = ?";
            $dtStmt = $db->prepare($dtQuery);
            $dtStmt->execute([$input->dispute_id]);
            $leaveTypeName = $dtStmt->fetchColumn();

            if ($leaveTypeName) {
                // Map leave_type name to leave_type_id
                $ltQuery = "SELECT id FROM leave_types WHERE LOWER(name) LIKE :name LIMIT 1";
                $ltStmt = $db->prepare($ltQuery);
                $searchName = strtolower($leaveTypeName) . '%';
                $ltStmt->bindParam(":name", $searchName);
                $ltStmt->execute();
                $leaveTypeId = $ltStmt->fetchColumn();

                if ($leaveTypeId) {
                    $currentYear = date('Y');
                    $overrideDays = (int) $input->override_days_used;

                    // Check if balance record exists
                    $checkBal = "SELECT id FROM leave_balances WHERE user_id = :uid AND leave_type_id = :ltid AND year = :yr";
                    $cbStmt = $db->prepare($checkBal);
                    $cbStmt->execute([':uid' => $targetUserId, ':ltid' => $leaveTypeId, ':yr' => $currentYear]);

                    if ($cbStmt->rowCount() > 0) {
                        $updateBal = "UPDATE leave_balances SET days_used = :days WHERE user_id = :uid AND leave_type_id = :ltid AND year = :yr";
                        $ubStmt = $db->prepare($updateBal);
                        $ubStmt->execute([':days' => $overrideDays, ':uid' => $targetUserId, ':ltid' => $leaveTypeId, ':yr' => $currentYear]);
                        $balanceUpdated = true;
                    }
                }
            }
        }

        $successMsg = "Dispute marked as " . $input->status;
        if ($balanceUpdated) {
            $successMsg .= ". Employee's leave balance has been updated.";
        }

        http_response_code(200);
        echo json_encode(["status" => "success", "message" => $successMsg]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Failed to update dispute."]);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
