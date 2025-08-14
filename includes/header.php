<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LexLink</title>
  <link rel="stylesheet" href="assets/css/remixicon.css">
  <link rel="icon" href="assets/images/Logos/logoWhite.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap-grid.min.css"
    integrity="sha512-79vX0oXpL1ee3k+V7jJxmmT+xdb7UrE7Fce5RYu3/l1oO/EWaMGEjDDObLXe2JSrDZtoRntVv0Iolv6i4TDWKw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" integrity="sha512-kJlvECunwXftkPwyvHbclArO8wszgBGisiLeuDFwNM8ws+wKIw0sv1os3ClWZOcrEB2eRXULYUsm8OVRGJKwGA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="assets/css/responsive.css">


  <style>
    .swiper-pagination-bullet-active {
      background-color: #0A2342;
      /* Active dot color */
    }



    /* -------------------- Mobile Nav -------------------- */
  </style>


</head>


<body>

  <div class="header">
    <nav>
      <div class="logo">
        <a href="index.php"><img src="assets/images/Logos/logoNavy.png" alt="" width="100px" height="100px"></a>
      </div>

      <!-- NEW WRAPPER for nav + icons -->
      <div class="nav-right">
        <ul class="nav-links">
          <li><a href="index.php#Home">Home</a></li>
          <li><a href="index.php#Practice-Areas">Practice Areas</a></li>
          <li><a href="index.php#Top-Lawyers">Top Lawyers</a></li>
          <li><a href="index.php#Case-Studies">Case Studies</a></li>
          <li><a href="index.php#How-It-Works">How It Works</a></li>
        </ul>

        <div class="right-icons">
          <div class="login-container" onclick="toggleDropdown(event)">
            <i class="ri-user-3-line login-icon"></i>
            <div class="login-dropdown" id="loginDropdown">

              <!-- Checking Roles -->
              <?php if (isset($_SESSION['username']) && isset($_SESSION['role'])): ?>

                <!-- If Role Is User -->
                <?php if ($_SESSION['role'] === 'user'): ?>
                  <a href="user-profile.php">View Profile</a>
                  <a href="user-appointments.php">My Appointments</a>

                  <!-- If Role Is Lawyer -->
                <?php elseif ($_SESSION['role'] === 'lawyer'): ?>
                  <a href="lawyer-dashboard.php">Dashboard</a>
                  <a href="lawyer-appointments.php">Appointments</a>

                  <!-- If Role Is Admin -->
                <?php elseif ($_SESSION['role'] === 'admin'): ?>
                  <a href="admin-dashboard.php">Admin Panel</a>
                  <a href="manage-users.php">Manage Users</a>
                <?php endif; ?>
                <a href="logout.php">Logout</a>

                <!-- Default Values -->
              <?php else: ?>
                <a href="#" class="userLogin">Login as User</a>
                <a href="lawyer/login.php" class="lawyerLogin">Login as Lawyer</a>
              <?php endif; ?>
            </div>
          </div>
        </div>


        <div class="hamburger">
          <i class="ri-menu-line"></i>
        </div>
      </div>
  </div>
  </nav>


  <!-- ==========Mobile Nav Start========== -->
  <div class="mobile-container">
    <div class="mobile-nav">
      <!-- Nav Links -->
      <div class="tabs">
        <div class="m-nav-link"><a href="index.php">Home</a></div>
        <div class="m-nav-link"><a href="index.php#Practice-Areas">Practice Areas</a></div>
        <div class="m-nav-link"><a href="index.php#Top-Lawyers">Top Lawyers</a></div>
        <div class="m-nav-link"><a href="index.php#Case-Studies">Case Studies</a></div>
        <div class="m-nav-link"><a href="index.php#How-It-Works">How It Works</a></div>
      </div>

      <!-- Social Links -->
      <div class="socials">
        <div class="social-icon">
          <a href="https://facebook.com"><i class="fa-brands fa-facebook"></i></a>
        </div>
        <div class="social-icon">
          <a href="https://X.com"><i class="fa-brands fa-twitter"></i></a>
        </div>
        <div class="social-icon">
          <a href="https://instagram.com"><i class="fa-brands fa-instagram"></i></a>
        </div>
        <div class="social-icon">
          <a href="https://linkedin.com"><i class="fa-brands fa-linkedin"></i></a>
        </div>
      </div>

      <!-- Cross Button -->
      <div class="cross-nav">
        <i class="fa-solid fa-xmark"></i>
      </div>
    </div>
  </div>
  <!-- ==========Mobile Nav END========== -->
  </div>