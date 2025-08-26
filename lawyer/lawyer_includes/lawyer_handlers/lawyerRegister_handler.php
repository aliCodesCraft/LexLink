<?php
// Include initialization (session + database connection)
include_once("lawyer_includes/lawyer_utils/init.php");

// Error messgae
$error = "";

// Get all categories from DB
$categoryQuery = "SELECT * FROM categories";
$categoryData = mysqli_query($connection, $categoryQuery);

// Get all cities from DB
$cityQuery = "SELECT * FROM cities";
$cityData = mysqli_query($connection, $cityQuery);

// Proceed only if form submitted
if (isset($_POST['btnRegister']) && $_SERVER["REQUEST_METHOD"] == "POST") {

  // File Uploads
  $profileName = $_FILES['pic']['name'];       // profile picture name
  $profileTemp = $_FILES['pic']['tmp_name'];   // temporary location

  $documentName = $_FILES["document"]["name"]; // document name
  $documentTemp = $_FILES["document"]["tmp_name"]; // temporary location

  // Extract extensions
  $picExtension = pathinfo($profileName, PATHINFO_EXTENSION);
  $docExtension = pathinfo($documentName, PATHINFO_EXTENSION);

  // Final filenames (email based)
  $picFileName = $_POST['email'] . '.' . $picExtension;
  $docFileName = $_POST['email'] . '.' . $docExtension;

  // Allowed extensions for images & docs
  $allowedPicExtensions = ["png", "jpg", "jpeg", "webp", "avif"];
  $imgValidation = in_array(strtolower($picExtension), $allowedPicExtensions);

  $allowedDocExtensions = ["pdf", "doc", "docx"];
  $docValidation = in_array(strtolower($docExtension), $allowedDocExtensions);


  // Profile Upload
  if ($imgValidation) {
    if (!move_uploaded_file($profileTemp, "lawyer_assets/uploads/profilepic/" . $picFileName)) {
      $error = "Profile picture upload failed! Error: " . $_FILES['pic']['error'];
    }
  }

  // Document Upload
  if ($docValidation) {
    if (!move_uploaded_file($documentTemp, "lawyer_assets/uploads/document/" . $docFileName)) {
      $error = "Document upload failed! Error: " . $_FILES['document']['error'];
    }
  }

  // User Data
  $lawyerName = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];
  $categoryId = $_POST['category'];
  $cityId = $_POST['cities'];

  // Check if email already exists
  $emailCheckQuery = mysqli_query($connection, "SELECT * FROM lawyers WHERE lawyer_email ='$email'");

  // Validations
  if ($confirmpassword != $password) {
    $error = "Passwords do not match";
  } else if (mysqli_num_rows($emailCheckQuery) > 0) {
    $error = "Email already exists";
  } else if ($imgValidation && $docValidation) { 

    // Insert only if files uploaded
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //  Query to insert into DB
    $insertQuery = "INSERT INTO `lawyers`
        (`lawyer_name`, `lawyer_email`, `lawyer_password`, `lawyer_picture`, `lawyer_document`, `lawyer_category`, `lawyer_city`) 
        VALUES ('$lawyerName','$email','$hashedPassword','$picFileName','$docFileName','$categoryId','$cityId')";

    // Running query
    $result = mysqli_query($connection, $insertQuery);

    if ($result) {

       $_SESSION['account-success'] = "Account registered! Login to continue.";
       // redirect after success
      header("Location: lawyer-login.php");
      exit;
      
    } else {
      $error = "Database insert failed: " . mysqli_error($connection);
    }
  }
}
?>
