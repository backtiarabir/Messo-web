<?php
<?php
// user_profile.php - protected loader (middleman) that requires auth and includes the static profile HTML
require_once 'auth.php';

// you can load user data here using $_SESSION['user_id'] if needed
// e.g. fetch latest profile info from DB and inject into template

// Serve existing static HTML (keeps original markup intact)
readfile(__DIR__ . '/user_profile.html');
?>