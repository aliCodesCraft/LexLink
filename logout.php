<?php
// Initialize session
include_once("includes/utils/session.php");
session_unset();
session_destroy();
echo "<script>window.location.href = '/LexLink/index.php';</script>";
exit;
?>

