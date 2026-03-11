<?php
// api/v1/leaves/expire_leaves.php
// Expires leave requests whose start_date has passed without full approval.
// Run via cron or manually: php expire_leaves.php
//
// Cron example (run daily at midnight):
// 0 0 * * * /usr/bin/php /path/to/api/v1/leaves/expire_leaves.php

header("Content-Type: application/json; charset=UTF-8");

require_once '../../config/database.php';

$db = getDBConnection();

try {
    $today = date('Y-m-d');

    // Find requests that are still pending or only supervisor-approved
    // but the leave start_date has already passed
    $query = "SELECT lr.id, lr.user_id, lr.start_date, lr.status, lt.name as leave_type
              FROM leave_requests lr
              JOIN leave_types lt ON lr.leave_type_id = lt.id
              WHERE lr.status IN ('pending', 'approved_supervisor')
                AND lr.start_date < :today";

    $stmt = $db->prepare($query);
    $stmt->bindParam(":today", $today);
    $stmt->execute();
    $expiredRequests = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($expiredRequests) === 0) {
        echo json_encode([
            "status" => "success",
            "message" => "No expired requests found.",
            "count" => 0
        ]);
        exit;
    }

    // Update status to 'expired'
    $updateQuery = "UPDATE leave_requests SET status = 'expired' 
                    WHERE status IN ('pending', 'approved_supervisor')
                      AND start_date < :today";
    $updateStmt = $db->prepare($updateQuery);
    $updateStmt->bindParam(":today", $today);
    $updateStmt->execute();
    $expiredCount = $updateStmt->rowCount();

    // Notify each affected employee
    $notifQuery = "INSERT INTO notifications (user_id, title, message, type) 
                   VALUES (:user_id, :title, :message, 'warning')";
    $notifStmt = $db->prepare($notifQuery);

    foreach ($expiredRequests as $req) {
        $title = "Leave Request Expired";
        $message = "Your {$req['leave_type']} request (starting {$req['start_date']}) has expired because it was not fully approved before the start date. Please submit a new request if needed.";

        $notifStmt->bindParam(":user_id", $req['user_id']);
        $notifStmt->bindParam(":title", $title);
        $notifStmt->bindParam(":message", $message);
        $notifStmt->execute();
    }

    echo json_encode([
        "status" => "success",
        "message" => "$expiredCount request(s) expired and users notified.",
        "count" => $expiredCount
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
