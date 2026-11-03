<?php
// login_proses.php
declare(strict_types=1);

// secure session cookie settings (set before session_start)
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
    header('Location: Login.html');
    exit;
}

$usernameOrEmail = trim((string)($_POST['username'] ?? ''));
$password = (string)($_POST['password'] ?? '');

// Basic server-side validation
if ($usernameOrEmail === '' || $password === '') {
    $_SESSION['flash_error'] = 'Please enter both username (or email) and password.';
    header('Location: Login.html');
    exit;
}

// simple rate limiting per session
$maxAttempts = 6;
$blockTime = 300; // seconds
if (!isset($_SESSION['login_attempts'])) $_SESSION['login_attempts'] = 0;
if (!isset($_SESSION['last_login_attempt'])) $_SESSION['last_login_attempt'] = 0;
if ($_SESSION['login_attempts'] >= $maxAttempts && (time() - (int)$_SESSION['last_login_attempt']) < $blockTime) {
    $_SESSION['flash_error'] = 'Too many login attempts. Please try again later.';
    header('Location: Login.html');
    exit;
}

try {
    $stmt = $pdo->prepare('SELECT id, username, email, password FROM users WHERE username = :u OR email = :u LIMIT 1');
    $stmt->execute([':u' => $usernameOrEmail]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($password, (string)$user['password'])) {
        $_SESSION['login_attempts']++;
        $_SESSION['last_login_attempt'] = time();
        $_SESSION['flash_error'] = 'Invalid credentials.';
        header('Location: Login.html');
        exit;
    }

    // Successful login
    $_SESSION['login_attempts'] = 0;
    session_regenerate_id(true);

    $_SESSION['user_id'] = (int)$user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['logged_in'] = true;

    // Redirect to protected profile loader (middleman)
    header('Location: user_profile.php');
    exit;

} catch (PDOException $e) {
    error_log('Login error: ' . $e->getMessage());
    $_SESSION['flash_error'] = 'Server error. Please try again later.';
    header('Location: Login.html');
    exit;
}
?>
