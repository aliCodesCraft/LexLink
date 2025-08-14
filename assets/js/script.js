// ----- Login Dropdown Toggle -----
  const loginContainer = document.querySelector('.login-container');
  const loginDropdown = document.getElementById('loginDropdown');

  loginContainer.addEventListener('click', function (e) {
    e.stopPropagation();
    loginDropdown.style.display =
      loginDropdown.style.display === 'flex' ? 'none' : 'flex';
  });

  // Close dropdown when clicking outside
  document.addEventListener('click', function () {
    loginDropdown.style.display = 'none';
  });

  // Escape key closes dropdown
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      loginDropdown.style.display = 'none';
      document.querySelector('.mobile-nav')?.classList.remove('active');
    }
  });



// Select the hamburger and cross button
const hamburger = document.querySelector('.hamburger');
const mobileNav = document.querySelector('.mobile-container');
const crossBtn = document.querySelector('.cross-nav');

// Show the mobile nav when hamburger is clicked
hamburger.addEventListener('click', () => {
  mobileNav.style.display = 'block';
});

// Hide the mobile nav when cross icon is clicked
crossBtn.addEventListener('click', () => {
  mobileNav.style.display = 'none';
});


 
 const imageElement = document.getElementById("slider-image");
  const imageUrls = [
    "assets/images/Hero-Baner/hero-1.png",
    "assets/images/Hero-Baner/hero-2.png",
    "assets/images/Hero-Baner/hero-3.png",
    "assets/images/Hero-Baner/hero-4.png",
  ];

  let current = 0;
  const fadeDuration = 700; // ms
  const delayBetweenSlides = 3000;

  setInterval(() => {
    // Step 1: Fade out
    imageElement.style.transition = `opacity ${fadeDuration}ms ease-in-out`;
    imageElement.style.opacity = 0;

    // Step 2: Wait for fade out to complete, then change image and fade in
    setTimeout(() => {
      current = (current + 1) % imageUrls.length;
      imageElement.src = imageUrls[current];

      // Force reflow before fade-in to ensure transition happens
      void imageElement.offsetWidth;

      // Step 3: Fade in
      imageElement.style.transition = `opacity ${fadeDuration}ms ease-in-out`;
      imageElement.style.opacity = 1;
    }, fadeDuration); // delay for fade-out complete
  }, delayBetweenSlides);

  
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
  const buttonsElement = document.getElementById("hero-buttons");


  setInterval(() => {
    headingElement.style.transition = subheadingElement.style.transition = `opacity ${fadeDuration2}ms ease-in-out`;
    headingElement.style.opacity = subheadingElement.style.opacity = 0;

    setTimeout(() => {
      textIndex = (textIndex + 1) % heroTexts.length;
      headingElement.textContent = heroTexts[textIndex].heading;
      subheadingElement.textContent = heroTexts[textIndex].sub;
      void headingElement.offsetWidth;
      headingElement.style.opacity = subheadingElement.style.opacity = 1;
    }, fadeDuration2);
  }, delay);




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


    const cards = document.querySelectorAll('.case-card');
  let index = 0;

  function simulateHover() {
    // Remove previous hovered class from all cards
    cards.forEach(card => card.classList.remove('hovered'));

    // Add hovered to current index
    cards[index].classList.add('hovered');

    // Move to next index
    index++;

    // Reset to first card if end is reached
    if (index >= cards.length) {
      index = 0;
    }
  }

  // Run the hover simulation every 1.5 seconds
  setInterval(simulateHover, 1500)


  
 function handleReveal() {
    const reveals = document.querySelectorAll('.reveal');

    reveals.forEach((el) => {
      const windowHeight = window.innerHeight;
      const elementTop = el.getBoundingClientRect().top;
      const elementBottom = el.getBoundingClientRect().bottom;
      const revealPoint = 120; // how early to start animation

      if (elementTop < windowHeight - revealPoint && elementBottom > 0) {
        el.classList.add('active');
      } else {
        el.classList.remove('active'); // hide when scroll up
      }
    });
  }

  window.addEventListener('scroll', handleReveal);
  window.addEventListener('load', handleReveal);  




  // Show User Login Form
document.querySelectorAll('.userLogin').forEach((btn) => {
    btn.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent anchor refresh
        document.getElementById('user-login-form').style.display = 'block';
        document.getElementById('user-register-form').style.display = 'none';
    });
});

// Show User Register Form
document.querySelectorAll('.userRegister').forEach((btn) => {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('user-register-form').style.display = 'block';
        document.getElementById('user-login-form').style.display = 'none';
    });
});

// Close Buttons for both forms
document.querySelectorAll('.blur-close-btn').forEach((closeBtn) => {
    closeBtn.addEventListener('click', function() {
        document.getElementById('user-login-form').style.display = 'none';
        document.getElementById('user-register-form').style.display = 'none';
    });
});

// Show Booking Form
document.querySelectorAll('.bookAppoitment').forEach((btn) => {
    btn.addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('booking-form').style.display = 'block';
    });
});

// Hide Booking Form when clicking close button
document.querySelector('.blur-close-btn').addEventListener('click', function () {
    document.getElementById('booking-form').style.display = 'none';
});
