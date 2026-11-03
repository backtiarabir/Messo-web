<?php
// logout.php
declare(strict_types=1);

session_start();

// Unset all session variables
$_SESSION = [];

// Delete session cookie
$params = session_get_cookie_params();
setcookie(session_name(), '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

// Destroy session
session_destroy();

// Redirect to login
header('Location: Login.html');
exit;
?>
