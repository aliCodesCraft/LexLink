<?php
// Start session if not already started
include_once("session.php");

// Redirect to login pgae if session role !== lawyer
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "<script>window.location.href='/LexLink/?error=unauthorized'</script>";
    exit();
}
