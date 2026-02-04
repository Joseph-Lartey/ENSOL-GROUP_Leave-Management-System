<?php
// seed_users.php
require_once 'api/config/database.php';

try {
    $db = getDBConnection();
    
    // Clear existing data to prevent duplicates (for dev environment)
    $db->exec("SET FOREIGN_KEY_CHECKS = 0");
    $db->exec("TRUNCATE TABLE users");
    $db->exec("TRUNCATE TABLE companies");
    $db->exec("SET FOREIGN_KEY_CHECKS = 1");

    // Seed Authorized Companies
    // 1. Ensol Group (Parent)
    // 2. Southey Contracting
    // 3. Ensol Engineering
    // 4. Ensol Energy
    $db->exec("INSERT INTO companies (id, name, prefix) VALUES (1, 'Ensol Group', 'EG')");
    $db->exec("INSERT INTO companies (id, name, prefix) VALUES (2, 'Southey Contracting', 'SC')");
    $db->exec("INSERT INTO companies (id, name, prefix) VALUES (3, 'Ensol Engineering', 'EE')");
    $db->exec("INSERT INTO companies (id, name, prefix) VALUES (4, 'Ensol Energy', 'EN')");

    // Insert Admin User
    $password = "password123"; // Test password
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $email = "admin@ensolgroup.com.gh";
    
    $sql = "INSERT INTO users (company_id, full_name, email, password_hash, role) VALUES 
            (1, 'System Admin', :email, :hash, 'superadmin')";
            
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":hash", $hash);
    
    if($stmt->execute()) {
        echo "User created successfully.\nEmail: $email\nPassword: $password\n";
    } else {
        echo "Failed to create user.\n";
    }
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
