<?php
// Usage: php create_admin.php username email password
if ($argc < 4) {
    echo "Usage: php create_admin.php <username> <email> <password>\n";
    exit(1);
}
require_once __DIR__ . '/../db_connect.php';

$username = $argv[1];
$email = $argv[2];
$password = $argv[3];

// Validate minimal
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 8) {
    echo "Invalid email or password too short (min 8 chars).\n";
    exit(1);
}

$hash = password_hash($password, PASSWORD_DEFAULT);

try {
    // create user with role 'admin'
    $stmt = $pdo->prepare('INSERT INTO users (username, email, password, role, is_active) VALUES (:u,:e,:p,"admin",1)');
    $stmt->execute([':u'=>$username, ':e'=>$email, ':p'=>$hash]);
    echo "Admin user created, id: " . $pdo->lastInsertId() . "\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}