<?php
// api/v1/superadmin/user.php
// PUT: Update single user (role, status, department)
// DELETE: Deactivate user (soft delete)

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once '../../config/database.php';
require_once '../../middleware/AuthMiddleware.php';

// Authenticate Request
$userData = AuthMiddleware::authenticate();
$role = $userData['role'];
$actorId = $userData['user_id'];

// Check role - must be superadmin
if ($role !== 'superadmin') {
    http_response_code(403);
    echo json_encode(["status" => "error", "message" => "Access denied. SuperAdmin role required."]);
    exit;
}

$db = getDBConnection();
$input = json_decode(file_get_contents("php://input"), true);

// ============ PUT: Update User ============
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    if (empty($input['id'])) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "User ID is required."]);
        exit;
    }

    $userId = (int)$input['id'];

    try {
        // Fetch current user data for logging
        $stmt = $db->prepare("SELECT full_name, role, is_active, department FROM users WHERE id = :id");
        $stmt->bindParam(":id", $userId);
        $stmt->execute();
        $currentUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$currentUser) {
            http_response_code(404);
            echo json_encode(["status" => "error", "message" => "User not found."]);
            exit;
        }

        // Build dynamic update query
        $updates = [];
        $params = [':id' => $userId];
        $logDetails = [];

        if (isset($input['role']) && $input['role'] !== $currentUser['role']) {
            $updates[] = "role = :role";
            $params[':role'] = $input['role'];
            $logDetails[] = "Role: {$currentUser['role']} → {$input['role']}";
        }

        if (isset($input['is_active'])) {
            $newStatus = (int)$input['is_active'];
            if ($newStatus !== (int)$currentUser['is_active']) {
                $updates[] = "is_active = :is_active";
                $params[':is_active'] = $newStatus;
                $statusText = $newStatus ? 'Activated' : 'Deactivated';
                $logDetails[] = $statusText;
            }
        }

        if (isset($input['department']) && $input['department'] !== $currentUser['department']) {
            $updates[] = "department = :department";
            $params[':department'] = $input['department'];
            $logDetails[] = "Department: {$currentUser['department']} → {$input['department']}";
        }

        if (empty($updates)) {
            http_response_code(200);
            echo json_encode(["status" => "success", "message" => "No changes detected."]);
            exit;
        }

        // Execute update
        $query = "UPDATE users SET " . implode(", ", $updates) . " WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->execute($params);

        // Log activity
        $actionType = isset($input['role']) ? 'role_change' : 'user_update';
        $details = "Updated {$currentUser['full_name']}: " . implode(", ", $logDetails);
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';

        $stmt = $db->prepare("INSERT INTO activity_logs (actor_id, action_type, target_id, target_type, details, ip_address) 
                              VALUES (:actor, :action, :target, 'user', :details, :ip)");
        $stmt->execute([':actor' => $actorId, ':action' => $actionType, ':target' => $userId, ':details' => $details, ':ip' => $ip]);

        http_response_code(200);
        echo json_encode([
            "status" => "success",
            "message" => "User updated successfully.",
            "changes" => $logDetails
        ]);

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
    exit;
}

// ============ DELETE: Deactivate User ============
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $userId = $input['id'] ?? $_GET['id'] ?? null;
    
    if (empty($userId)) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "User ID is required."]);
        exit;
    }

    $userId = (int)$userId;

    try {
        // Fetch user for logging
        $stmt = $db->prepare("SELECT full_name FROM users WHERE id = :id");
        $stmt->bindParam(":id", $userId);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            http_response_code(404);
            echo json_encode(["status" => "error", "message" => "User not found."]);
            exit;
        }

        // Soft delete (deactivate)
        $stmt = $db->prepare("UPDATE users SET is_active = 0 WHERE id = :id");
        $stmt->bindParam(":id", $userId);
        $stmt->execute();

        // Log activity
        $details = "Deactivated user: " . $user['full_name'];
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $stmt = $db->prepare("INSERT INTO activity_logs (actor_id, action_type, target_id, target_type, details, ip_address) 
                              VALUES (:actor, 'user_remove', :target, 'user', :details, :ip)");
        $stmt->execute([':actor' => $actorId, ':target' => $userId, ':details' => $details, ':ip' => $ip]);

        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "User deactivated successfully."]);

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
    exit;
}

http_response_code(405);
echo json_encode(["status" => "error", "message" => "Method not allowed."]);
?>
