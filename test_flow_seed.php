<?php
// test_flow_seed.php
require_once 'api/config/database.php';

try {
    $db = getDBConnection();

    // Clear existing data to prevent duplicates
    $db->exec("SET FOREIGN_KEY_CHECKS = 0");
    $db->exec("TRUNCATE TABLE users");
    $db->exec("TRUNCATE TABLE companies");
    $db->exec("TRUNCATE TABLE leave_balances");
    $db->exec("TRUNCATE TABLE leave_requests");
    $db->exec("TRUNCATE TABLE approvals");
    $db->exec("SET FOREIGN_KEY_CHECKS = 1");

    // Seed Authorized Companies
    $db->exec("INSERT INTO companies (id, name, prefix) VALUES (1, 'Ensol Group', 'EG')");
    $db->exec("INSERT INTO companies (id, name, prefix) VALUES (2, 'Southey Contracting', 'SC')");

    $password = "password123";
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // 1. Super Admin
    $sql = "INSERT INTO users (id, company_id, full_name, email, password_hash, role, department, position) VALUES 
            (1, 1, 'System Admin', 'admin@ensolgroup.com.gh', :hash, 'superadmin', 'Management', 'CEO')";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":hash", $hash);
    $stmt->execute();

    // 2. Group HR Admin (Ensol Group - sees ALL subsidiaries)
    $sql = "INSERT INTO users (id, company_id, full_name, email, password_hash, role, department, position) VALUES 
            (2, 1, 'Group HR Manager', 'hr@ensolgroup.com.gh', :hash, 'hr', 'Human Resources', 'Group HR Manager')";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":hash", $hash);
    $stmt->execute();

    // 3. Southey HR (subsidiary HR - sees only Southey)
    $sql = "INSERT INTO users (id, company_id, full_name, email, password_hash, role, department, position) VALUES 
            (3, 2, 'Southey HR Officer', 'hr@southey.com.gh', :hash, 'hr', 'Human Resources', 'HR Officer')";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":hash", $hash);
    $stmt->execute();

    // 4. Department Head (Supervisor)
    $sql = "INSERT INTO users (id, company_id, full_name, email, password_hash, role, department, position) VALUES 
            (4, 2, 'Tech Lead', 'techlead@southey.com.gh', :hash, 'supervisor', 'IT Department', 'Head of IT')";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":hash", $hash);
    $stmt->execute();

    // 5-8. Normal Employees assigned to the Department Head (supervisor_id = 4)
    $employees = [
        [5, 'Alice Smith', 'alice@southey.com.gh', 'Software Engineer'],
        [6, 'Bob Jones', 'bob@southey.com.gh', 'QA Engineer'],
        [7, 'Charlie Brown', 'charlie@southey.com.gh', 'DevOps Engineer'],
        [8, 'Diana Prince', 'diana@southey.com.gh', 'UI/UX Designer']
    ];

    $sql = "INSERT INTO users (id, company_id, full_name, email, password_hash, role, department, position, supervisor_id) VALUES 
            (:id, 2, :name, :email, :hash, 'employee', 'IT Department', :position, 4)";
    $stmt = $db->prepare($sql);

    foreach ($employees as $emp) {
        $stmt->bindParam(":id", $emp[0]);
        $stmt->bindParam(":name", $emp[1]);
        $stmt->bindParam(":email", $emp[2]);
        $stmt->bindParam(":hash", $hash);
        $stmt->bindParam(":position", $emp[3]);
        $stmt->execute();
    }

    // Seed Leave Balances for all users
    $leave_types = $db->query("SELECT id, days_allowed FROM leave_types")->fetchAll(PDO::FETCH_ASSOC);
    $current_year = date('Y');

    $sql = "INSERT INTO leave_balances (user_id, leave_type_id, days_allocated, year) VALUES (:user_id, :type_id, :days, :year)";
    $stmt = $db->prepare($sql);

    for ($i = 1; $i <= 8; $i++) {
        foreach ($leave_types as $type) {
            $stmt->bindParam(":user_id", $i);
            $stmt->bindParam(":type_id", $type['id']);
            $stmt->bindParam(":days", $type['days_allowed']);
            $stmt->bindParam(":year", $current_year);
            $stmt->execute();
        }
    }

    echo "Test users created successfully!\n";
    echo "--------------------------------------\n";
    echo "1. Super Admin:   admin@ensolgroup.com.gh     (Ensol Group)\n";
    echo "2. Group HR:      hr@ensolgroup.com.gh        (Ensol Group - sees ALL)\n";
    echo "3. Southey HR:    hr@southey.com.gh           (Southey only)\n";
    echo "4. Supervisor:    techlead@southey.com.gh     (IT Dept Head)\n";
    echo "5. Employee:      alice@southey.com.gh\n";
    echo "6. Employee:      bob@southey.com.gh\n";
    echo "7. Employee:      charlie@southey.com.gh\n";
    echo "8. Employee:      diana@southey.com.gh\n";
    echo "--------------------------------------\n";
    echo "Password for all users: password123\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
