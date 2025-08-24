<?php
if (session_status() === PHP_SESSION_NONE) {
     ini_set("session.cookie_path", "/");
    session_start();
}
?>