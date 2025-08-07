<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Login Required',
                text: 'Kindly login bete 😅',
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
