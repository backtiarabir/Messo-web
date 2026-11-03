<?php
session_start();
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['admin-username'] ?? '');
    $password = $_POST['admin-password'] ?? '';

    if (empty($username) || empty($password)) {
        die('Please fill all fields.');
    }

    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin'] = $admin['username'];
        header('Location: admin_dashboard.php'); // Create admin dashboard later
        exit();
    } else {
        die('Invalid admin username or password.');
    }
} else {
    header('Location: Admin.html');
    exit();
}
?>
