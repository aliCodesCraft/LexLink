<?php
// Initialize session & logout
include_once("includes/utils/session.php");

// Clear all session data
session_unset();
session_destroy();

// Clear cookies (optional, if you use any)
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time() - 3600, '/');
        setcookie($name, '', time() - 3600, '/', '', true, true);
    }
}

// Prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Redirect to homepage
echo "<script>window.location.href = '/LexLink/index.php';</script>";
exit;
?>
