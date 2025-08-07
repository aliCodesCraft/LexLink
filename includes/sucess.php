<?php
session_start();
if (isset($_SESSION['login_success']) && $_SESSION['login_success'] === true): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: 'Login Successful!',
                text: 'Welcome <?= $_SESSION['username'] ?> 🎉',
                icon: 'success',
                confirmButtonText: 'Continue',
                background: '#0A2342',
                color: '#ffffff',
                confirmButtonColor: 'goldenrod'
            }).then(() => {
                location.reload();
            });
        });
    </script>
<?php
    unset($_SESSION['login_success']); // Unseting Session So it doesn't repeat on reload
endif;
?>
