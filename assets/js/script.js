// ----- Login Dropdown Toggle -----
const loginContainer = document.querySelector('.login-container');
const loginDropdown = document.getElementById('loginDropdown');

// Toggle login dropdown on click
loginContainer.addEventListener('click', function (e) {
  e.stopPropagation();
  loginDropdown.style.display =
    loginDropdown.style.display === 'flex' ? 'none' : 'flex';
});

// Close dropdown when clicking outside
document.addEventListener('click', function () {
  loginDropdown.style.display = 'none';
});

// Close dropdown when pressing Escape key
document.addEventListener('keydown', function (e) {
  if (e.key === 'Escape') {
    loginDropdown.style.display = 'none';
    document.querySelector('.mobile-nav')?.classList.remove('active');
  }
});


// ----- Mobile Navigation -----
const hamburger = document.querySelector('.hamburger');
const mobileNav = document.querySelector('.mobile-container');
const crossBtn = document.querySelector('.cross-nav');

// Show mobile nav
hamburger.addEventListener('click', () => {
  mobileNav.style.display = 'block';
});

// Hide mobile nav
crossBtn.addEventListener('click', () => {
  mobileNav.style.display = 'none';
});


// ----- Hero Image Slider -----
const imageElement = document.getElementById("slider-image");
const imageUrls = [
  "assets/images//hero-banner/hero-1.png",
  "assets/images//hero-banner/hero-2.png",
  "assets/images//hero-banner/hero-3.png",
  "assets/images//hero-banner/hero-4.png",
];

let current = 0;
const fadeDuration = 700; // transition duration
const delayBetweenSlides = 3000; // delay between slides

setInterval(() => {
  imageElement.style.transition = `opacity ${fadeDuration}ms ease-in-out`;
  imageElement.style.opacity = 0;

  setTimeout(() => {
    current = (current + 1) % imageUrls.length;
    imageElement.src = imageUrls[current];
    void imageElement.offsetWidth;
    imageElement.style.transition = `opacity ${fadeDuration}ms ease-in-out`;
    imageElement.style.opacity = 1;
  }, fadeDuration);
}, delayBetweenSlides);


// ----- Hero Text Slider -----
const headingElement = document.getElementById("hero-heading");
const subheadingElement = document.getElementById("hero-subheading");

const heroTexts = [
  {
    heading: "Book Verified Lawyers in Minutes — No Hassle, No Delay",
    sub: "Get quick legal help from trusted professionals for criminal, family, civil, and business matters."
  },
  {
    heading: "Stuck in a Legal Issue? Find the Right Lawyer Now",
    sub: "Explore top-rated lawyers near you and book direct appointments — online or in-person."
  },
  {
    heading: "Transparent Legal Services You Can Trust",
    sub: "View lawyer profiles, check reviews, and choose the expert that fits your case and budget."
  },
  {
    heading: "Your Case Deserves the Best Legal Support",
    sub: "From bail to property disputes — find lawyers who care and act fast, only a few clicks away."
  }
];

let textIndex = 0;
const fadeDuration2 = 700;
const delay = 3000;

setInterval(() => {
  headingElement.style.transition = subheadingElement.style.transition =
    `opacity ${fadeDuration2}ms ease-in-out`;
  headingElement.style.opacity = subheadingElement.style.opacity = 0;

  setTimeout(() => {
    textIndex = (textIndex + 1) % heroTexts.length;
    headingElement.textContent = heroTexts[textIndex].heading;
    subheadingElement.textContent = heroTexts[textIndex].sub;
    void headingElement.offsetWidth;
    headingElement.style.opacity = subheadingElement.style.opacity = 1;
  }, fadeDuration2);
}, delay);


// ----- Animated Counters -----
const counters = document.querySelectorAll('.counter');

counters.forEach(counter => {
  counter.innerText = '0';
  const updateCounter = () => {
    const target = +counter.getAttribute('data-target');
    const current = +counter.innerText;
    const increment = target / 200;

    if (current < target) {
      counter.innerText = `${Math.ceil(current + increment)}`;
      setTimeout(updateCounter, 10);
    } else {
      counter.innerText = target;
    }
  };
  updateCounter();
});


// ----- Case Card Hover Simulation -----
const cards = document.querySelectorAll('.case-card');
let index = 0;

function simulateHover() {
  cards.forEach(card => card.classList.remove('hovered'));
  cards[index].classList.add('hovered');
  index++;
  if (index >= cards.length) index = 0;
}

setInterval(simulateHover, 1500);


// ----- Scroll Reveal Animation -----
function handleReveal() {
  const reveals = document.querySelectorAll('.reveal');
  reveals.forEach((el) => {
    const windowHeight = window.innerHeight;
    const elementTop = el.getBoundingClientRect().top;
    const elementBottom = el.getBoundingClientRect().bottom;
    const revealPoint = 120;
    if (elementTop < windowHeight - revealPoint && elementBottom > 0) {
      el.classList.add('active');
    } else {
      el.classList.remove('active');
    }
  });
}

window.addEventListener('scroll', handleReveal);
window.addEventListener('load', handleReveal);


// ----- User Login/Register Toggle -----
document.querySelectorAll('.userLogin').forEach((btn) => {
  btn.addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('user-login-form').style.display = 'block';
    document.getElementById('user-register-form').style.display = 'none';
  });
});

document.querySelectorAll('.userRegister').forEach((btn) => {
  btn.addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('user-register-form').style.display = 'block';
    document.getElementById('user-login-form').style.display = 'none';
  });
});

document.querySelectorAll('.blur-close-btn').forEach((closeBtn) => {
  closeBtn.addEventListener('click', function() {
    document.getElementById('user-login-form').style.display = 'none';
    document.getElementById('user-register-form').style.display = 'none';
  });
});


// ----- jQuery Booking Actions -----
$(function() {
  // Replace with Book Appointment button
  $(document).on("click", "#bookAgainBtn", function(e) {
    e.preventDefault();
    $(".action-buttons").html(`
      <a href="#" id="bookBtn" class="btn-primary bookAppoitment">
        <i class="fas fa-calendar-check"></i> Book Appointment
      </a>
      <span class="status-available"><i class="fas fa-circle"></i> Available</span>
    `);
  });

  // Show booking form modal
  $(document).on("click", "#bookBtn, .bookAppoitment", function(e) {
    e.preventDefault();
    $("#booking-form").show();
  });

  // Close booking form modal
  $(document).on("click", ".blur-close-btn", function() {
    $("#booking-form").hide();
  });
});


// ----- SweetAlert cancel confirmation -----
function confirmCancel(url) {
  Swal.fire({
    title: 'Are you sure?',              
    text: "You want to cancel this appointment?",
    icon: 'warning',                     
    showCancelButton: true,              
    confirmButtonColor: '#a00000',       
    cancelButtonColor: '#6c757d',        
    confirmButtonText: 'Yes, Cancel it!',
    background: '#0A2342',               
    color: '#fff'                        
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = url;        // Redirect on confirm
    }
  });
}

// ----- Initialize sliders after page load -----
document.addEventListener("DOMContentLoaded", function () {

  // Profile cards slider
  const profileCardSwiper = new Swiper(".profile-card-slider", {
    slidesPerView: 4,
    spaceBetween: 0,
    loop: true,
    autoplay: {
      delay: 2000,
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
      1300: { slidesPerView: 4 },
      992:  { slidesPerView: 3 },
      668:  { slidesPerView: 2 },
      320:  { slidesPerView: 1 }
    }
  });

  // Testimonials slider
  var testimonialSwiper = new Swiper(".mySwiper", {
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
      320:  { slidesPerView: 1 },
      480:  { slidesPerView: 1 },
      668:  { slidesPerView: 2 },
      1024: { slidesPerView: 3 },
      1200: { slidesPerView: 4 },
    }
  });

});

// Logout confirmation modal
document.addEventListener("DOMContentLoaded", function() {
  const logoutBtn = document.getElementById("logoutBtn");
  if (logoutBtn) {
    logoutBtn.addEventListener("click", function(e) {
      e.preventDefault(); // prevent default link action

      Swal.fire({
        title: 'Are you sure?',
        text: "You will be logged out from your account!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#a00000',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, Logout!',
        background: '#0A2342',
        color: '#fff'
      }).then((result) => {
        if (result.isConfirmed) {
          // Redirect to logout.php only if confirmed
          window.location.href = "logout.php";
        }
      });
    });
  }
});


// Hide error and success messages automatically after 2 seconds
  setTimeout(() => {
    const error = document.getElementById("errorMsg");
    const success = document.getElementById("successMsg");
    if (error) error.style.display = "none";
    if (success) success.style.display = "none";
  }, 2000);
