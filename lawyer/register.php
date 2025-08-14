<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Form</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="form-assets/css/style.css">
  <style>
          body{ background: linear-gradient(to right,#0a2342da, rgba(218, 165, 32, 0.500)) ;}
  </style>
</head>
<body>
  <div class="container">
<div class="left-panel">
  <img src="form-assets/images/right.png" alt="" width="200px">
  <h2>Welcome Back!</h2>
  <p>Access your dashboard to manage appointments, clients, and case updates with ease.</p>
  <a href="login.php" class="ghost">Login</a>
</div>


    <div class="right-panel">
      <h2>Create Account</h2>
      <form>
        <div>
          <label for="name"><i class="ri-user-line"></i></label>
          <input type="text" id="name" placeholder="Name" name="name">
        </div>
        <div>
          <label for="email"><i class="ri-mail-line"></i></label>
          <input type="email" id="email" placeholder="Email" name="email">
        </div>
        <div>
          <label for="password"><i class="ri-lock-line"></i></label>
          <input type="password" id="password" placeholder="Password" name="password">
        </div>
        <div>
          <label for="password"><i class="ri-lock-line"></i></label>
          <input type="password" id="password" placeholder="Confirm Password" name="confirmpassword">
        </div>        
        <div>
          <label for="profile"><i class="ri-image-line"></i></label>
          <input type="file" id="profile" accept="image/*" required name="profilepic">
        </div>
        <div>
          <label for="document"><i class="ri-file-upload-line"></i></label>
          <input type="file" id="document" accept=".pdf,.doc,.docx" required name="document">
        </div>
        <div>
          <label for="category"><i class="ri-list-check-2"></i></label>
          <select id="category" required>
            <option value="">Select Category</option>
            <option value="lawyer">Lawyer</option>
            <option value="consultant">Consultant</option>
            <option value="advisor">Advisor</option>
          </select>
        </div>
        <input type="submit" value="Register" name="btnRegister">
      </form>
    </div>
  </div>
</body>
</html>
