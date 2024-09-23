<?php
// Start the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Clear all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to the home page or login page
header('Location: http://localhost/codefest_stem/login'); // Change this to your desired redirect page
exit();
