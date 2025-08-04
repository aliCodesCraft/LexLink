<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LexLink</title>
  <link rel="icon" href="assets/images/Logos/logoWhite.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap-grid.min.css"
    integrity="sha512-79vX0oXpL1ee3k+V7jJxmmT+xdb7UrE7Fce5RYu3/l1oO/EWaMGEjDDObLXe2JSrDZtoRntVv0Iolv6i4TDWKw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" integrity="sha512-kJlvECunwXftkPwyvHbclArO8wszgBGisiLeuDFwNM8ws+wKIw0sv1os3ClWZOcrEB2eRXULYUsm8OVRGJKwGA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="assets/css/dummy.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />


  <style>
    .swiper-pagination-bullet-active {
      background-color: #0A2342;
      /* Active dot color */
    }



/* -------------------- Mobile Nav -------------------- */


  </style>


</head>


<body>

  <header>
      <nav>
  <div class="logo">
    <img src="assets/images/Logos/logoNavy.png" alt="" width="100px" height="100px">
  </div>

  <!-- NEW WRAPPER for nav + icons -->
  <div class="nav-right">
    <ul class="nav-links">
      <li><a href="#Home">Home</a></li>
      <li><a href="#Practice-Areas">Practice Areas</a></li>
      <li><a href="#Top-Lawyers">Top Lawyers</a></li>
      <li><a href="#Case-Studies">Case Studies</a></li>
      <li><a href="#How-It-Works">How It Works</a></li>
    </ul>

    <div class="right-icons">
      <div class="login-container" onclick="toggleDropdown(event)">
        <i class="ri-user-3-line login-icon"></i>
        <div class="login-dropdown" id="loginDropdown">
          <a href="#" class="userLogin">Login as User</a>
          <a href="#" class="lawyerLogin">Login as Lawyer</a>
          <a href="register.php">Register</a>
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
        <!-- Logo -->
        <div class="logo">
            <img src="assets/images/logos/logo1.png" alt="">
        </div>

        <!-- Nav Links -->
        <div class="tabs">
            <div class="m-nav-link"><a href="index.html">Home</a></div>
            <div class="m-nav-link"><a href="pages/Product-Pages/Product-Page-1.html">Products</a></div>
            <div class="m-nav-link"><a href="pages/Gallery-Page.html">Gallery</a></div>
            <div class="m-nav-link"><a href="pages/About-Page.html">About Us</a></div>
            <div class="m-nav-link"><a href="pages/Contact-Page.html">Contact Us</a></div>
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


  </header>