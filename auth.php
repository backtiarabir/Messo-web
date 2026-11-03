<?php
<?php
// auth.php - simple middleware to protect pages
declare(strict_types=1);
session_start();

if (empty($_SESSION['logged_in']) || empty($_SESSION['user_id'])) {
    // optional: store intended URL to redirect after login
    $_SESSION['after_login'] = $_SERVER['REQUEST_URI'] ?? '/';
    header('Location: Login.html');
    exit;
}
?>