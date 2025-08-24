<?php
// Start session
session_start();

// Connecting Database
$connection = mysqli_connect("localhost", "root", "", "LexLink");


// Messages
$error = "";
$success = "";

// If redirected after registration, get success message
if (isset($_GET['error']) && $_GET['error'] === 'unauthorized') {
  echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
      document.addEventListener('DOMContentLoaded', function(){
        Swal.fire({
            icon: 'error',
            title: 'Unauthorized Access',
            text: 'Kindly login with a lawyer account to continue!',
            background: '#0A2342',
            color: '#ffffff',
            confirmButtonColor: '#e43b4d'
        });
      });
    </script>
    ";
}



// Login form submit check
if (isset($_POST["btnLogin"])) {

  // Get email & password from form
  $loginemail = $_POST["loginemail"];
  $loginpassword = $_POST["loginpassword"];

  // Query to find lawyer by email
  $query = "SELECT * FROM lawyers WHERE lawyer_email = '$loginemail'";
  $result = mysqli_query($connection, $query);

  // Check if email exists
  if (mysqli_num_rows($result) == 1) {

    // Fetch lawyer record
    $userpass = mysqli_fetch_assoc($result);

    // Verify password (entered vs hashed)
    $passverify = password_verify($loginpassword, $userpass['lawyer_password']);

    if ($passverify) {
      // Store lawyer details in session
      $_SESSION["lawyerID"] = $userpass['lawyer_id'];
      $_SESSION["lawyerName"] = $userpass['lawyer_name'];
      $_SESSION["lawyerEmail"] = $userpass['lawyer_email'];
      $_SESSION["role"] = $userpass['role'];
      $_SESSION['status'] = $userpass['lawyer_status'];
      $_SESSION["login_success"] = true;  // SweetAlert trigger flag
      session_write_close();

      // Redirect to dashboard
      echo "<script>window.location.href='index.php';</script>";
    } else {
      $error = "Password is incorrect";
    }
  } else {
    $error = "Email not found";
  }
}
