<?php
require_once 'api/config/database.php';

try {
    $host = '127.0.0.1';
    $port = 3306;
    $username = 'root';
    $password = '';

    $dsn = "mysql:host=$host;port=$port;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $sql = file_get_contents('database/schema.sql');
    $pdo->exec($sql);
    echo "Schema imported successfully!\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
