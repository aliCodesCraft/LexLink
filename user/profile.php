<?php
// Initialize session, auth, config, header, and form handler
include_once("../includes/utils/session.php");
include_once("../includes/config/config.php");
include_once("../includes/utils/auth.php");
include_once("../includes/layouts/header.php");
include_once("../includes/handlers/updateForm_handler.php");

// Get current user data from session
$userID = $_SESSION['userID'];
$userName = $_SESSION['username'];
$userEmail = $_SESSION['useremail'];

// Handle form submission
if (isset($_POST['btnUserUpdate']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];
    $userConfirmPassword = $_POST['confirmpassword'];

    // Check if email already exists for other users
    $checkQuery = "SELECT * FROM `users` 
    WHERE user_email = '$userEmail' AND user_id != '$userID'";

    // Running query
    $checkResult = mysqli_query($connection, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $error = "⚠️ Email already exists!";
    } elseif ($userPassword !== $userConfirmPassword) {
        $error = "❌ Passwords do not match!";
    } else {
        // Hash password and update user data
        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

        $updateQuery = "UPDATE users 
                        SET user_name='$userName', user_email='$userEmail', user_password='$hashedPassword' 
                        WHERE user_id='$userID'";

        $updateResult = mysqli_query($connection, $updateQuery);

        if ($updateResult) {
            $success = "✅ Updation successful!";
            $_SESSION['username'] = $userName;
            $_SESSION['useremail'] = $userEmail;
        } else {
            $error = "❌ Something went wrong during updation!";
        }
    }
}
?>

<!-- Update Profile Form Modal -->
<div class="blur-form-background" id="user-register-form" style="display: block;">
    <div class="blur-close-btn">
        <a href="/LexLink/index.php" style="color: goldenrod;">
            <i class="ri-close-line" style="background-color: #0A2342; padding:5px; border-radius:50%;"></i>
        </a>
    </div>

    <div class="blur-wrapper">
        <form class="blur-form-container" method="POST">
            <h2>Update Profile</h2>

            <!-- Error message -->
            <?php if (!empty($error)): ?>
                <div style="color: red; text-align:center; margin-bottom: 10px;">
                    <?php echo $error ?>
                </div>
            <?php endif; ?>

            <!-- Success message -->
            <?php if (!empty($success)): ?>
                <div style="color: green; text-align:center; margin-bottom: 10px;">
                    <?php echo $success ?>
                </div>
            <?php endif; ?>

            <!-- Name field -->
            <div class="blur-input-group">
                <i class="ri-user-line"></i>
                <input type="text" placeholder="Your Name"  name="name" value="<?php echo $userName; ?>" />
            </div>

            <!-- Email field -->
            <div class="blur-input-group">
                <i class="ri-mail-line"></i>
                <input type="email" placeholder="Your Email"  name="email" value="<?php echo $userEmail; ?>" />
            </div>

            <!-- Password field -->
            <div class="blur-input-group">
                <i class="ri-lock-2-line"></i>
                <input type="password" placeholder="Your Password"  name="password" />
            </div>

            <!-- Confirm Password field -->
            <div class="blur-input-group">
                <i class="ri-lock-2-line"></i>
                <input type="password" placeholder="Confirm Password"  name="confirmpassword" />
            </div>

            <!-- Submit button -->
            <input type="submit" value="Update" class="blur-btn" name="btnUserUpdate" />
        </form>
    </div>
</div>

<?php
// Include footer
include_once("../includes/layouts/footer.php");
?>
