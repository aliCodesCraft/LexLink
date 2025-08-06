<!-- FOOTER HTML -->
<footer class="main-footer">
  <div class="footer-container">
    <div class="footer-row">

      <div class="footer-col">
        <img src="assets/images/Logos/logoWhite.png" alt="" width="120px" height="120px">
        <p>A modern solution for legal services — trusted, fast, and efficient.</p>
      </div>

      <div class="footer-col">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#Practice-Areas">Practice Areas</a></li>
          <li><a href="#Top-Lawyers">Top Lawyers</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>More</h4>
        <ul>
          <li><a href="#Case-Studies">Case Study</a></li>
          <li><a href="#How-It-Works">How It Works</a></li>
          <li><a href="#Contact">Contact</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Follow Us</h4>
        <div class="footer-socials">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>

    </div>
  </div>
</footer>
<div class="footer-bottom">
  <p>&copy; 2025 LexLink. All Rights Reserved.</p>
</div>






<script src="assets/js/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>


<!-- Swiper Activation -->
<script>
  const profileCardSwiper = new Swiper(".profile-card-slider", {
    slidesPerView: 4,
    spaceBetween: 0,
    loop: true,
    autoplay: {
      delay: 2000, // 2 seconds
      disableOnInteraction: false,
    },
    pagination: {
      el: ".profile-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".profile-button-next",
      prevEl: ".profile-button-prev",
    },
    breakpoints: {
      1300: {
        slidesPerView: 4
      },
      992: {
        slidesPerView: 3
      },
      668: {
        slidesPerView: 2
      },
      320: {
        slidesPerView: 1
      }
    }
  });
</script>



<!-- Testimonials -->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 10,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      320: { // For small screens (mobile)
        slidesPerView: 1,
      },
      480: { // Slightly larger screens
        slidesPerView: 1,
      },
      668: { // Tablets
        slidesPerView: 2,
      },
      1024: { // Laptops
        slidesPerView: 3,
      },
      1200: { // Large screens
        slidesPerView: 4,
      }
    }
  });
</script>


<script src="assets/js/formSubmiosn.js"></script>
<script src="assets/js/script.js"></script>
</body>

</html>