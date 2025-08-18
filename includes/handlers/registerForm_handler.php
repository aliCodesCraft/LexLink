<?php
// Messages
$error = "";
$success = "";
$showLogin = false;
$showRegister = false;


// Form Handling Logic
if (isset($_POST['btnUserRegister']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];
    $userConfirmPassword = $_POST['confirmpassword'];

    // Escape inputs
    $userEmail = mysqli_real_escape_string($connection, $userEmail);
    $userName = mysqli_real_escape_string($connection, $userName);

    // Check if email already exists
    $checkQuery = "SELECT * FROM users WHERE user_email = '$userEmail'";
    $checkResult = mysqli_query($connection, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $error = "⚠️ Email already exists!";
        $showRegister = true;
    } elseif ($userPassword !== $userConfirmPassword) {
        $error = "❌ Passwords do not match!";
        $showRegister = true;
    } else {
        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
        $insertQuery = "INSERT INTO users (user_name, user_email, user_password) 
                        VALUES ('$userName', '$userEmail', '$hashedPassword')";
        $insertResult = mysqli_query($connection, $insertQuery);

        if ($insertResult) {
            $success = "✅ Registration successful! Please login now.";
            $showLogin = true;
        } else {
            $error = "❌ Something went wrong during registration!";
        }
    }
}
?>
