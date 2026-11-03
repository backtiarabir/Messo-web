<?php
// signup_proses.php
declare(strict_types=1);

session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'] ?? '',
    'secure' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
    'httponly' => true,
    'samesite' => 'Lax'
]);
session_start();

require_once 'db_connect.php'; // must provide $pdo (PDO)

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: Signup.html');
    exit;
}

$username = trim((string)($_POST['username'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$password = (string)($_POST['password'] ?? '');
$confirm = (string)($_POST['confirm_password'] ?? '');

// Basic validation
if ($username === '' || $email === '' || $password === '' || $confirm === '') {
    $_SESSION['flash_error'] = 'Please fill all required fields.';
    header('Location: Signup.html');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['flash_error'] = 'Please provide a valid email address.';
    header('Location: Signup.html');
    exit;
}

if ($password !== $confirm) {
    $_SESSION['flash_error'] = 'Passwords do not match.';
    header('Location: Signup.html');
    exit;
}

if (strlen($password) < 8) {
    $_SESSION['flash_error'] = 'Password must be at least 8 characters.';
    header('Location: Signup.html');
    exit;
}

try {
    // Check uniqueness
    $stmt = $pdo->prepare('SELECT id FROM users WHERE username = :u OR email = :e LIMIT 1');
    $stmt->execute([':u' => $username, ':e' => $email]);
    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['flash_error'] = 'Username or email already in use.';
        header('Location: Signup.html');
        exit;
    }

    // Insert user (hash password)
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $insert = $pdo->prepare('INSERT INTO users (username, email, password) VALUES (:u, :e, :p)');
    $insert->execute([':u' => $username, ':e' => $email, ':p' => $hash]);

    $userId = (int)$pdo->lastInsertId();

    // Auto-login the new user
    session_regenerate_id(true);
    $_SESSION['user_id'] = $userId;
    $_SESSION['username'] = $username;
    $_SESSION['logged_in'] = true;

    header('Location: user_profile.php');
    exit;

} catch (PDOException $e) {
    error_log('Signup error: ' . $e->getMessage());
    $_SESSION['flash_error'] = 'Server error. Please try again later.';
    header('Location: Signup.html');
    exit;
}
?>
