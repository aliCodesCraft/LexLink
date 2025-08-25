<?php
// Start session if not already started
include_once("init.php");

// Redirect to login pgae if session role !== lawyer
if (!isset($_SESSION['lawyerID']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'lawyer') {
    echo "<script>window.location.href='/LexLink/lawyer/lawyer-login.php?error=unauthorized'</script>";
    exit();
}

$lawyerID = $_SESSION['lawyerID'];

// Lawyer fetch
$getLawyer = "SELECT * FROM `lawyers` WHERE `lawyer_id` = '$lawyerID'";
$lawyerResults = mysqli_query($connection, $getLawyer);
$lawyer = mysqli_fetch_assoc($lawyerResults);

// Agar lawyer account inactive hai
if ($lawyer && $lawyer['lawyer_status'] !== 'active') {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account Pending</title>
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <body class="bg-gradient-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-5">
                            <div class="text-center">
                                <i class="fas fa-hourglass-half fa-3x text-warning mb-3"></i>
                                <h1 class="h4 text-gray-900 mb-2">Your Account is Pending</h1>
                                <p class="mb-4">
                                    Please wait until an administrator approves your account.<br>
                                    You’ll get access once your status becomes <b>Active</b>.
                                </p>
                                <a href="logOut.php" class="btn btn-danger btn-user mt-3">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
    exit();
}
?>
