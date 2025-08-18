<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    echo "
    <script src='assets/js/sweetalert2.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Login Required',
                text: 'Kindly login to view this page',
                confirmButtonColor: '#d33',
                background: '#0A2342',
                color: '#ffffff'
            }).then(function() {
                window.location.href = 'index.php';
            });
        });
    </script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>
    
</body>
</html>