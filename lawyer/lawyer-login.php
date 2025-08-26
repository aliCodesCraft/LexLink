<?php
// Include init (session and databse) & form hanlder
include_once("lawyer_includes/lawyer_utils/init.php");
include_once("lawyer_includes/lawyer_handlers/lawyerLogin_handler.php");
?>


<!-- Form Html -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lawyer-Login</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="lawyer_assets/css/form.css">
  <link rel="icon" href="lawyer_assets/img/logoWhite.png">
</head>

<body>
  <div class="container">

    <div class="right-panel">
      <h2>Lawyer Login</h2>
      <form method="POST">

        <!-- Error Messege -->
        <?php if (!empty($error)): ?>
          <div id="errorMsg" style="color: #df1717; text-align:center; margin-bottom: 10px; background: #ffa0a0; padding:6px; border-radius:6px;">
            <?php echo $error ?>
          </div>
        <?php endif; ?>

        <!-- Success Message -->
        <?php if (isset($_SESSION['account-success'])): ?>
          <div id="successMsg" style="color:green; background:lightgreen; padding:6px; border-radius:6px; text-align:center; margin-bottom:10px;">
            <?php echo htmlspecialchars($_SESSION['account-success']) ?>
          </div>
          <?php unset($_SESSION['account-success']); ?>
        <?php endif; ?>


        <div>
          <label for="email"><i class="ri-mail-line"></i></label>
          <input type="email" id="email" placeholder="Email" name="loginemail" value="<?php echo $_POST['loginemail']?>">
        </div>
        <div>
          <label for="password"><i class="ri-lock-line"></i></label>
          <input type="password" id="password" placeholder="Password" name="loginpassword" required>
        </div>
        <input type="submit" value="Login" name="btnLogin">
      </form>
    </div>
    <div class="left-panel">
      <img src="lawyer_assets/img/left.png" alt="">
      <h2>New to LexLink?</h2>
      <p>Create your account to connect with clients and manage your legal services efficiently.</p>
      <a href="lawyer-register.php" class="ghost">Register</a>
    </div>
  </div>
</body>

<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script src="lawyer_assets/js/formSubmiosn.js"></script>
<script src="lawyer_assets/js/script.js"></script>

</html>