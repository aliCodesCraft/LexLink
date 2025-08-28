<?php
include_once("includes/config/config.php");
include_once("includes/handlers/loginForm_handler.php");

// agar unauthorized error query string me aaya
if (isset($_GET['error']) && $_GET['error'] === 'unauthorized') {
    $loginError = "Kindly login with an admin account";
}
?>

<div class="blur-form-background" id="user-login-form">

    <div class="blur-close-btn">
        <i class="ri-close-line" style="background-color: #0A2342; padding:5px; border-radius:50%;"></i>
    </div>

    <div class="blur-wrapper">
        <form class="blur-form-container" method="POST">
            <h2>Login</h2>

            <!-- Error Message -->
            <?php if (!empty($loginError)): ?>
                <div style="color: red; text-align:center; margin-bottom: 10px;">
                    <?php echo $loginError ?>
                </div>
            <?php endif; ?>

            <div class="blur-input-group">
                <i class="ri-mail-line"></i>
                <input type="email" placeholder="Your Email" name="loginemail"
                       required value="<?php echo $_POST['loginemail'] ?? ''; ?>" />
            </div>

            <div class="blur-input-group">
                <i class="ri-lock-2-line"></i>
                <input type="password" placeholder="Your Password" name="loginpassword" required />
            </div>

            <input type="submit" value="Login" class="blur-btn" name="btnUserLogin" />

            <p style="text-align: center; margin-top: 15px; font-size: 0.95rem;">
                Don't have an account?
                <a href="#" style="color: gold; text-decoration: underline; font-weight: 500;" class="userRegister">Register Now</a>
            </p>
        </form>
    </div>
</div>

<!-- Show Form Modal On Error -->
<?php if (!empty($loginError)): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('user-login-form').style.display = 'block';
        });
    </script>
<?php endif; ?>
