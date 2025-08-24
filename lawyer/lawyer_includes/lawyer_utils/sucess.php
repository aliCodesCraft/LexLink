<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    ini_set("session.cookie_path", "/");
    session_start();
}

if (isset($_SESSION['login_success']) && $_SESSION['login_success'] === true): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: 'Login Successful!',
                text: 'Welcome <?php echo $_SESSION['lawyerName'] ?> 🎉',
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
