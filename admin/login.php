<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="/LexLink/admin/form-assets/css/style.css">
</head>

<body>
  <div class="container">

    <div class="right-panel">
      <h2>Admin Login</h2>
      <form method="POST">
        <div>
          <label for="email"><i class="ri-mail-line"></i></label>
          <input type="email" id="email" placeholder="Email" name="loginemail" required>
        </div>
        <div>
          <label for="password"><i class="ri-lock-line"></i></label>
          <input type="password" id="password" placeholder="Password" name="loginpassword" required>
        </div>
        <input type="submit" value="Login" name="btnLogin">
      </form>
    </div>
    <div class="left-panel">
      <img src="/LexLink/admin/form-assets/images/left.png" alt="">
      <h2>New to LexLink?</h2>
      <p>Create your account to manage legal professionals and streamline your legal journey.</p>
      <a href="/LexLink/admin/register.php" class="ghost">Register</a>
    </div>
  </div>
</body>

</html>