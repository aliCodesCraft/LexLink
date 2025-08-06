<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$loginError = "";
$loginSuccess = "";
$showLogin = false;

if (isset($_POST['btnUserLogin']) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $userLoginEmail = $_POST['loginemail'];
    $userLoginPassword = $_POST['loginpassword'];

    $checkLoginEmail = "SELECT * FROM users WHERE `user_email` = '$userLoginEmail'";
    $checkLoginResult = mysqli_query($connection, $checkLoginEmail);

    if (mysqli_num_rows($checkLoginResult) == 1) {
        $user = mysqli_fetch_assoc($checkLoginResult);

        $hashedPassword = $user['user_password'];
        $isPasswordCorrect = password_verify($userLoginPassword, $hashedPassword);

        if ($isPasswordCorrect) {
            $_SESSION["username"] = $user['user_name'];
            $_SESSION["useremail"] = $user['user_email'];
            session_write_close();

            echo "<script>window.location.href = 'ali.php';</script>";
        } else {
            $loginError = "⚠️ Email or Password is Incorrect";
            $showLogin = true;
        }
    } else {
        $loginError = "❌ Email Not Found";
        $showLogin = true;
    }
}
