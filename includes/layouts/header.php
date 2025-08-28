<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LexLink | <?php echo $title; ?></title>

  <link rel="stylesheet" href="/LexLink/assets/css/remixicon.css">
  <link rel="icon" href="/LexLink/assets/images/logos/logoWhite.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap-grid.min.css"
    integrity="sha512-79vX0oXpL1ee3k+V7jJxmmT+xdb7UrE7Fce5RYu3/l1oO/EWaMGEjDDObLXe2JSrDZtoRntVv0Iolv6i4TDWKw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" integrity="sha512-kJlvECunwXftkPwyvHbclArO8wszgBGisiLeuDFwNM8ws+wKIw0sv1os3ClWZOcrEB2eRXULYUsm8OVRGJKwGA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/LexLink/assets/css/style.css">
  <link rel="stylesheet" href="/LexLink/assets/css/custom.css">
  <link rel="stylesheet" href="/LexLink/assets/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="/LexLink/assets/css/responsive.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


  <style>
    .swiper-pagination-bullet-active {
      background-color: #0A2342;
      /* Active dot color */
    }



    /* -------------------- Mobile Nav -------------------- */
  </style>


</head>


<body>

  <!-- Header / Navigation -->
  <div class="header">
    <nav>
      <!-- Logo -->
      <div class="logo">
        <a href="/LexLink/index.php">
          <img src="/LexLink/assets/images/logos/logoNavy.png" alt="" width="100px" height="100px">
        </a>
      </div>

      <!-- Navigation links + icons -->
      <div class="nav-right">
        <!-- Desktop Nav Links -->
        <ul class="nav-links">
          <li><a href="/LexLink/index.php#Home">Home</a></li>
          <li><a href="/LexLink/index.php#Practice-Areas">Practice Areas</a></li>
          <li><a href="/LexLink/index.php#Top-Lawyers">Top Lawyers</a></li>
          <li><a href="/LexLink/index.php#Case-Studies">Case Studies</a></li>
          <li><a href="/LexLink/index.php#How-It-Works">How It Works</a></li>
        </ul>

        <!-- Login/User Dropdown -->
        <div class="right-icons">
          <div class="login-container" onclick="toggleDropdown(event)">
            <i class="ri-user-3-line login-icon"></i>
            <div class="login-dropdown" id="loginDropdown">

              <!-- Check user role -->
              <?php if (isset($_SESSION['role'])): ?>

                <!-- User Role -->
                <?php if ($_SESSION['role'] === 'user'): ?>
                  <a href="/LexLink/user/profile.php"><?php echo $_SESSION['username']; ?></a>
                  <a href="/LexLink/user/appointments.php">Appointments</a>

                  <!-- Lawyer Role -->
                <?php elseif (strtolower($_SESSION['role']) === 'lawyer'): ?>
                  <a href="/LexLink/lawyer/page/view-profile.php"><i class="fas fa-user-tie"></i> Lawyer <?php echo $_SESSION['lawyerName']; ?></a>
                  <a href="/LexLink/lawyer"><i class="fas fa-fw fa-tachometer-alt"></i>  Dashboard</a>

                  <!-- Admin Role -->
                <?php elseif ($_SESSION['role'] === 'admin'): ?>
                  <a href="/LexLink/admin">Admin Panel</a>
                <?php endif; ?>

                <!-- Logout Button (will trigger SweetAlert) -->
                <a href="#" id="logoutBtn"> <i class="fas fa-sign-out-alt"></i> Logout</a>

                <!-- Default login links -->
              <?php else: ?>
                <a href="#" class="userLogin">Login as User</a>
                <a href="/LexLink/lawyer/lawyer-login.php" class="lawyerLogin">Login as Lawyer</a>
              <?php endif; ?>

            </div>
          </div>
        </div>

        <!-- Hamburger for mobile nav -->
        <div class="hamburger">
          <i class="ri-menu-line"></i>
        </div>
      </div>
    </nav>

    <!-- Mobile Nav -->
    <div class="mobile-container">
      <div class="mobile-nav">
        <!-- Mobile links -->
        <div class="tabs">
          <div class="m-nav-link"><a href="/LexLink/index.php">Home</a></div>
          <div class="m-nav-link"><a href="/LexLink/index.php#Practice-Areas">Practice Areas</a></div>
          <div class="m-nav-link"><a href="/LexLink/index.php#Top-Lawyers">Top Lawyers</a></div>
          <div class="m-nav-link"><a href="/LexLink/index.php#Case-Studies">Case Studies</a></div>
          <div class="m-nav-link"><a href="/LexLink/index.php#How-It-Works">How It Works</a></div>
        </div>

        <!-- Social Links -->
        <div class="socials">
          <div class="social-icon"><a href="https://facebook.com"><i class="fa-brands fa-facebook"></i></a></div>
          <div class="social-icon"><a href="https://X.com"><i class="fa-brands fa-twitter"></i></a></div>
          <div class="social-icon"><a href="https://instagram.com"><i class="fa-brands fa-instagram"></i></a></div>
          <div class="social-icon"><a href="https://linkedin.com"><i class="fa-brands fa-linkedin"></i></a></div>
        </div>

        <!-- Mobile nav close button -->
        <div class="cross-nav">
          <i class="fa-solid fa-xmark"></i>
        </div>
      </div>
    </div>
  </div>