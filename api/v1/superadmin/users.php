<?php
// api/v1/superadmin/users.php
// GET: List all users with filters
// POST: Create new user

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
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

// ============ GET: List Users ============
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $query = "SELECT u.id, u.full_name, u.email, u.department, u.role, u.is_active, u.profile_image, u.created_at, c.name as company_name
                  FROM users u
                  LEFT JOIN companies c ON u.company_id = c.id
                  WHERE 1=1";
        $params = [];

        // Filter by role
        if (!empty($_GET['role'])) {
            $query .= " AND u.role = :role";
            $params[':role'] = $_GET['role'];
        }

        // Filter by status
        if (isset($_GET['status']) && $_GET['status'] !== '') {
            $isActive = $_GET['status'] === 'active' ? 1 : 0;
            $query .= " AND u.is_active = :is_active";
            $params[':is_active'] = $isActive;
        }

        // Search by name or email
        if (!empty($_GET['search'])) {
            $searchTerm = '%' . $_GET['search'] . '%';
            $query .= " AND (u.full_name LIKE :search OR u.email LIKE :search2)";
            $params[':search'] = $searchTerm;
            $params[':search2'] = $searchTerm;
        }

        $query .= " ORDER BY u.created_at DESC";

        $stmt = $db->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Format response
        $formattedUsers = array_map(function($user) {
            return [
                'id' => (int)$user['id'],
                'full_name' => $user['full_name'],
                'email' => $user['email'],
                'department' => $user['department'] ?? 'Not Set',
                'role' => $user['role'],
                'is_active' => (bool)$user['is_active'],
                'profile_image' => $user['profile_image'],
                'company' => $user['company_name'] ?? 'Unknown',
                'created_at' => $user['created_at']
            ];
        }, $users);

        http_response_code(200);
        echo json_encode([
            "status" => "success",
            "data" => $formattedUsers,
            "count" => count($formattedUsers)
        ]);

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
    exit;
}

// ============ POST: Create User ============
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);

    // Validation
    if (empty($input['full_name']) || empty($input['email'])) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "Full name and email are required."]);
        exit;
    }

    try {
        // Check if email exists
        $stmt = $db->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->bindParam(":email", $input['email']);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            http_response_code(409);
            echo json_encode(["status" => "error", "message" => "Email already exists."]);
            exit;
        }

        // Generate temporary password
        $tempPassword = bin2hex(random_bytes(4)); // 8 character password
        $passwordHash = password_hash($tempPassword, PASSWORD_DEFAULT);

        // Default values
        $companyId = $input['company_id'] ?? 1;
        $department = $input['department'] ?? null;
        $newRole = $input['role'] ?? 'employee';
        $isActive = isset($input['is_active']) ? (int)$input['is_active'] : 1;

        // Insert user
        $stmt = $db->prepare("INSERT INTO users (company_id, full_name, email, password_hash, department, role, is_active) 
                              VALUES (:company_id, :full_name, :email, :password, :department, :role, :is_active)");
        $stmt->bindParam(":company_id", $companyId);
        $stmt->bindParam(":full_name", $input['full_name']);
        $stmt->bindParam(":email", $input['email']);
        $stmt->bindParam(":password", $passwordHash);
        $stmt->bindParam(":department", $department);
        $stmt->bindParam(":role", $newRole);
        $stmt->bindParam(":is_active", $isActive);
        $stmt->execute();

        $newUserId = $db->lastInsertId();

        // Seed leave balances for new user
        $currentYear = date('Y');
        $leaveTypes = $db->query("SELECT id, days_allowed FROM leave_types")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($leaveTypes as $lt) {
            $stmt = $db->prepare("INSERT INTO leave_balances (user_id, leave_type_id, days_allocated, year) VALUES (:uid, :ltid, :days, :year)");
            $stmt->execute([':uid' => $newUserId, ':ltid' => $lt['id'], ':days' => $lt['days_allowed'], ':year' => $currentYear]);
        }

        // Log activity
        $stmt = $db->prepare("INSERT INTO activity_logs (actor_id, action_type, target_id, target_type, details, ip_address) 
                              VALUES (:actor, 'user_add', :target, 'user', :details, :ip)");
        $details = "Created user: " . $input['full_name'] . " (" . $input['email'] . ")";
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $stmt->execute([':actor' => $actorId, ':target' => $newUserId, ':details' => $details, ':ip' => $ip]);

        http_response_code(201);
        echo json_encode([
            "status" => "success",
            "message" => "User created successfully.",
            "data" => [
                "id" => (int)$newUserId,
                "temp_password" => $tempPassword // In production, send via email
            ]
        ]);

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
    exit;
}

http_response_code(405);
echo json_encode(["status" => "error", "message" => "Method not allowed."]);
?>
