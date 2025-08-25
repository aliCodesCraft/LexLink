
<?php
// Starting session
if (session_status() === PHP_SESSION_NONE) {
    ini_set("session.cookie_path", "/");
    session_start();
}

// Connecting Database
$connection = mysqli_connect("localhost", "root", "", "LexLink");

?>