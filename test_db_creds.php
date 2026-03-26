<?php
$passwords_to_try = [
    'Freshboy8!',
    '"Freshboy8!"',
    '',
    'root',
    'password'
];

$hosts = ['127.0.0.1', 'localhost'];

echo "Testing connections...\n";
foreach ($hosts as $host) {
    foreach ($passwords_to_try as $pass) {
        try {
            $dsn = "mysql:host=$host;dbname=ensol_lms;charset=utf8mb4";
            $pdo = new PDO($dsn, 'root', $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            echo "SUCCESS: host=$host, pass=$pass\n";
            exit(0);
        } catch (PDOException $e) {
            echo "FAIL: host=$host, pass=$pass - " . $e->getMessage() . "\n";
        }
    }
}
echo "All failed.\n";
