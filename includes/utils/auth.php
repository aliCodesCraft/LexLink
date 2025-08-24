<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Guest check
if (!isset($_SESSION['role'])) {
    echo "
    <!-- Google Font Rubic -->
    <link href='https://fonts.googleapis.com/css2?family=Rubic:wght@400;500;700&display=swap' rel='stylesheet'>

    <style>
    .swal-font {
        font-family: 'Rubic', sans-serif;
    }
    </style>

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
                color: '#ffffff',
                customClass: { popup: 'swal-font' }
            }).then(function() {
                window.location.href = 'index.php';
            });
        });
    </script>
    ";
    exit;

// Lawyer access check
} elseif (strtolower($_SESSION['role']) === 'lawyer') {
    echo "
    <!-- Google Font Rubic -->
    <link href='https://fonts.googleapis.com/css2?family=Rubic:wght@400;500;700&display=swap' rel='stylesheet'>

    <style>
    .swal-font {
        font-family: 'Rubic', sans-serif;
    }
    </style>

    <script src='assets/js/sweetalert2.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'warning',
                title: 'Access Denied',
                text: 'This feature is only available for users',
                confirmButtonColor: '#d33',
                background: '#0A2342',
                color: '#ffffff',
                customClass: { popup: 'swal-font' }
            }).then(function() {
                window.location.href = 'index.php';
            });
        });
    </script>
    ";
    exit;
}
?>
