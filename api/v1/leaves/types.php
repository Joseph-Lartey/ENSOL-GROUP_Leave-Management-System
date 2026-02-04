<?php
// api/v1/leaves/types.php
// Returns list of available leave types

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../../config/database.php';
require_once '../../middleware/AuthMiddleware.php';

// Authenticate Request
AuthMiddleware::authenticate();
$db = getDBConnection();

try {
    $query = "SELECT id, name, description, days_allowed, requires_proof FROM leave_types ORDER BY id";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $leaveTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    http_response_code(200);
    echo json_encode([
        "status" => "success",
        "data" => $leaveTypes
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
