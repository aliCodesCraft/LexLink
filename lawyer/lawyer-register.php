<?php
// Include form hanlder
include_once("lawyer_includes/lawyer_handlers/lawyerRegister_handler.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lawyer-Register</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="lawyer_assets/css/form.css">
  <link rel="icon" href="lawyer_assets/img/logoWhite.png">
  <style>
    body {
      background: linear-gradient(to right, #0a2342da, rgba(218, 165, 32, 0.500));
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="left-panel">
      <img src="lawyer_assets/img/right.png" alt="" width="200px">
      <h2>Welcome Back!</h2>
      <p>
        Already registered? Use the login button below to quickly sign in and manage your appointments with ease.
      </p>
      <a href="lawyer-login.php" class="ghost">Login</a>

    </div>


    <div class="right-panel">
      <h2>Create Account</h2>
      <form method="POST" enctype="multipart/form-data">


        <!-- Error Messege -->
        <?php if (!empty($error)): ?>
          <div id="errorMsg" style="color: #df1717; text-align:center; margin-bottom: 10px; background: #ffa0a0; padding:6px; border-radius:6px;">
            <?php echo $error ?>
          </div>
        <?php endif; ?>

        <!-- Lawyer name -->
        <div>
          <label for="name"><i class="ri-user-line"></i></label>
          <input type="text" id="name" placeholder="Name" required name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
        </div>

        <!-- Lawyer email -->
        <div>
          <label for="email"><i class="ri-mail-line"></i></label>
          <input type="email" id="email" placeholder="Email" required name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
        </div>

        <!-- Lawyer password -->
        <div>
          <label for="password"><i class="ri-lock-line"></i></label>
          <input type="password" id="password" placeholder="Password" required name="password">
        </div>

        <!-- Lawyer confirm password -->
        <div>
          <label for="confirmpassword"><i class="ri-lock-line"></i></label>
          <input type="password" id="confrimpassword" placeholder="Confirm Password" required name="confirmpassword">
        </div>

        <!-- Lawyer picture -->
        <div>
          <label for="pic"><i class="ri-image-line"></i></label>
          <input type="file" id="pic" accept="image/*" required name="pic">
        </div>

        <!-- Lawyer document -->
        <div>
          <label for="document"><i class="ri-file-upload-line"></i></label>
          <input type="file" id="document" accept=".pdf,.doc,.docx" required name="document">
        </div>

        <!-- Lawyer category -->
        <div>
          <label for="category"><i class="ri-list-check-2"></i></label>
          <select id="category" required name="category">

            <option selected disabled>Select Category</option>
            <?php foreach ($categoryData as $category) { ?>
              <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>

            <?php } ?>
          </select>
        </div>

        <!-- Lawyer city -->
        <div>
          <label for="city"><i class="ri-list-check-2"></i></label>
          <select id="city" required name="cities">

            <option selected disabled>Select City</option>
            <?php foreach ($cityData as $city) { ?>
              <option value="<?php echo $city['city_id']; ?>"><?php echo $city['city_name']; ?></option>

            <?php } ?>
          </select>
        </div>

        <!-- Register btn -->
        <input type="submit" value="Register" name="btnRegister">
      </form>
    </div>
  </div>
  <script src="lawyer_assets/js/formSubmiosn.js"></script>
  <script src="lawyer_assets/js/script.js"></script>
</body>

</html>