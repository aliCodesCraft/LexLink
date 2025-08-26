<?php

// Messeges
$error = "";
$success = "";


$lawyerID = $_SESSION['lawyerID'];
// Fetch old profile image
$getLawyerImage = "SELECT `lawyer_picture` 
FROM `lawyers` WHERE `lawyer_id` = '$lawyerID'";

// Runing query
$imageResult = mysqli_query($connection, $getLawyerImage);

// Converting in assoc
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

    // If a new picture is selected
    if (!empty($updateImage['name'])) {

        // Extract extension
        $extension = pathinfo($updateImage['name'], PATHINFO_EXTENSION);

        // Rename picture using NEW email
        $newImageName = $updateEmail . '.' . $extension;

        // Validate allowed extensions
        if (in_array(strtolower($extension), $allowedPicExtensions)) {

            $uploadPath = $updateImageUploadPath . '/' . $newImageName;

            // DELETE OLD IMAGE
            $oldImagePath = $updateImageUploadPath . '/' . $oldImageName;
            if (!empty($oldImageName) && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // MOVE NEW IMAGE
            if (!move_uploaded_file($updateImage['tmp_name'], $uploadPath)) {
                $_SESSION['error'] = "❌ Profile picture upload failed!";
            }

            $updateImageName = $newImageName; // new file for DB

        } else {
            $_SESSION['error'] = "❌ Invalid profile picture format! Allowed: png, jpg, jpeg, webp, avif";
        }
    } else {
        // If no new picture uploaded → keep old one
        $updateImageName = $oldImageName;
    }



    // Email check for other lawyers
    if (empty($error)) {
        $checkQuery = "SELECT * FROM `lawyers` 
        WHERE lawyer_email = '$updateEmail' AND lawyer_id != '$lawyerID'";

        // Runing query
        $checkResult = mysqli_query($connection, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            $_SESSION['error'] = "⚠️ Email already exists!";
        } else {

            // Change password only if new password entered
            if (!empty($updatePassword) && !empty($updateConfirmPassword)) {
                if ($updatePassword === $updateConfirmPassword) {
                    $hashedPassword = password_hash($updatePassword, PASSWORD_DEFAULT);
                } else {
                    $_SESSION['error'] = "❌ Passwords do not match!";
                    echo "<script>window.location.href='page/update-profile.php';</script>";
                    exit();
                }
            } else {
                // Keep old password if no new password entered
                $getOldPassword = "SELECT lawyer_password FROM lawyers WHERE lawyer_id='$lawyerID'";
                $passResult = mysqli_query($connection, $getOldPassword);
                $passRow = mysqli_fetch_assoc($passResult);
                $hashedPassword = $passRow['lawyer_password'];
            }

            // Update lawyer query
            $updateQuery = "UPDATE lawyers SET 
            lawyer_name='$updateName', lawyer_email='$updateEmail', lawyer_password='$hashedPassword',lawyer_category='$updateCategory', lawyer_city='$updateCity', lawyer_picture='$updateImageName'
            WHERE lawyer_id='$lawyerID'";

            // Runing query
            $updateResult = mysqli_query($connection, $updateQuery);

            if ($updateResult) {
                // Success message stored in session
                $_SESSION['success'] = "✅ Profile updated successfully!";
                $_SESSION['lawyerName'] = $updateName;

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
