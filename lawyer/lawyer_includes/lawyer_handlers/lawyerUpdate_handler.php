<?php
// Connecting Database
$connection = mysqli_connect("localhost", "root", "", "LexLink");

// Messeges
$error = "";
$success = "";


$lawyerID = $_SESSION['lawyerID'];
// Fetch old profile image
$getLawyerImage = "SELECT `lawyer_picture` FROM `lawyers` WHERE `lawyer_id` = '$lawyerID'";
$imageResult = mysqli_query($connection, $getLawyerImage);
$row = mysqli_fetch_assoc($imageResult);
$oldImageName = $row['lawyer_picture'];

// Proceed only if form submitted
if (isset($_POST['btnUpdateLawyer']) && $_SERVER["REQUEST_METHOD"] == "POST") {

    // Form data
    $updateName = $_POST['lawyername'];
    $updateEmail = $_POST['lawyeremail'];
    $updatePassword = $_POST['lawyerpassword'];
    $updateConfirmPassword = $_POST['lawyerconfirmpassword'];
    $updateCategory = $_POST['lawyercategory'];
    $updateCity = $_POST['lawyercity'];

    // Profile picture
    $updateImage = $_FILES['lawyerpic'];
    $updateImageName = $updateImage['name'];
    $updateImagePath = $updateImage['tmp_name'];
    $updateImageUploadPath = "../lawyer_assets/uploads/profilepic";
    $allowedPicExtensions = ["png", "jpg", "jpeg", "webp", "avif"];

    // If selected new picture
    if (!empty($updateImageName)) {

        // Extract extension
        $extension = pathinfo($updateImageName, PATHINFO_EXTENSION);

        // Rename picture with email format
        $updateImageName = $updateEmail . '.' . $extension;

        // Check validation
        if (in_array(strtolower($extension), $allowedPicExtensions)) {

            // Replacing and moving picture
            $uploadPath = $updateImageUploadPath . '/' . $updateImageName;
            if (!move_uploaded_file($updateImagePath, $uploadPath)) {
                $_SESSION['error'] = "❌ Profile picture upload failed!";
            }
        } else {
            $_SESSION['error'] = "❌ Invalid profile picture format! Allowed: png, jpg, jpeg, webp, avif";
        }
    } else {
        // Use old picture if no new picture uploaded
        $updateImageName = $oldImageName;
    }

    // Email check for other lawyers
    if (empty($error)) {
        $checkQuery = "SELECT * FROM `lawyers` WHERE lawyer_email = '$updateEmail' AND lawyer_id != '$lawyerID'";

        // Runing query
        $checkResult = mysqli_query($connection, $checkQuery);


        if (mysqli_num_rows($checkResult) > 0) {
            $_SESSION['error'] = "⚠️ Email already exists!";
        } elseif ($updatePassword !== $updateConfirmPassword) {
            $_SESSION['error'] = "❌ Passwords do not match!";
        }

        // Hashing password
        else {
            $hashedPassword = password_hash($updatePassword, PASSWORD_DEFAULT);

            // Update lawyer query
            $updateQuery = "UPDATE lawyers SET 
            lawyer_name='$updateName', lawyer_email='$updateEmail', lawyer_password='$hashedPassword',lawyer_category='$updateCategory', lawyer_city='$updateCity', lawyer_picture='$updateImageName'
            WHERE lawyer_id='$lawyerID'";

            // Runing query
            $updateResult = mysqli_query($connection, $updateQuery);

            if ($updateResult) {
                // Success message stored in session
                $_SESSION['success'] = "✅ Profile updated successfully!";

                echo "<script>window.location.href='page/update-profile.php';</script>";
                exit();
            } else {
                $_SESSION['error'] = "❌ Something went wrong during updation!";
                echo "<script>window.location.href='page/update-profile.php';</script>";
                exit();
            }
        }
    }
}
