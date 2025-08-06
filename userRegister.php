<?php
include_once("includes/config.php");


// Alert Messeges
$error = "";
$success = "";

    // Fetching Form Data Post Method
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnUserRegister'])) {
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];
    $userConfirmPassword = $_POST['confirmpassword'];

    // Escape String (security)
    $userEmail = mysqli_real_escape_string($connection, $userEmail);
    $userName = mysqli_real_escape_string($connection, $userName);

    // Check if email exists
    $checkQuery = "SELECT * FROM users WHERE user_email = '$userEmail'";
    $checkResult = mysqli_query($connection, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $error = "⚠️ Email already exists!";

        // Match Passwrod And Confirm Password
    } elseif ($userPassword !== $userConfirmPassword) {
        $error = "❌ Passwords do not match!";

        // Securing Password Through Hash
    } else {
        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

        // Inserting Data
        $insertQuery = "INSERT INTO users (user_name, user_email, user_password) VALUES ('$userName', '$userEmail', '$hashedPassword')";
        $insertResult = mysqli_query($connection, $insertQuery);

        // Sucess for Data Insertion
        if ($insertResult) {
            $success = "✅ Registration successful! Please login now.";
            $showLogin = true;

            // Error for Data Insertion
        } else {
            $error = "❌ Something went wrong during registration!";
        }
    }
}
?>

<div class="blur-form-background" id="user-register-form">
    <div class="blur-close-btn">
        <i class="ri-close-line" style="background-color: #0A2342; padding:5px; border-radius:50%;"></i>
    </div>

    <div class="blur-wrapper">



        <form class="blur-form-container" method="POST">
            <h2>Register</h2>

            <!-- 🛑 Show Error or Success -->
            <?php if (!empty($error)): ?>
                <div style="color: red; text-align:center; margin-bottom: 10px;">
                    <?= $error ?>
                </div>
            <?php elseif (!empty($success)): ?>
                <div style="color: green; text-align:center; margin-bottom: 10px;">
                    <?= $success ?>
                </div>
            <?php endif; ?>

            <div class="blur-input-group">
                <i class="ri-user-line"></i>
                <input type="text" placeholder="Your Name" required name="name" />
            </div>

            <div class="blur-input-group">
                <i class="ri-mail-line"></i>
                <input type="email" placeholder="Your Email" required name="email" />
            </div>

            <div class="blur-input-group">
                <i class="ri-lock-2-line"></i>
                <input type="password" placeholder="Your Password" required name="password" />
            </div>

            <div class="blur-input-group">
                <i class="ri-lock-2-line"></i>
                <input type="password" placeholder="Confirm Password" required name="confirmpassword" />
            </div>

            <input type="submit" value="Register" class="blur-btn" name="btnUserRegister" />

             <p style="text-align: center; margin-top: 15px; font-size: 0.95rem;">
                Already have an account?
                <a href="#" style="color: gold; text-decoration: underline; font-weight: 500;" id="" class="userLogin">Login Now</a>
        </form>
    </div>
</div>

<?php if (isset($showLogin) && $showLogin === true): ?>
    <script>
        document.getElementById('user-register-form').style.display = 'none';
        document.getElementById('user-login-form').style.display = 'block';
    </script>
<?php endif; ?>
