<?php

// Start the session if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user session variable is set
if (!isset($_SESSION['user'])) {
    // Redirect to home page if the user is not logged in
    header('Location: http://localhost/codefest_stem/'); // Change to your home page URL
    exit();
}
