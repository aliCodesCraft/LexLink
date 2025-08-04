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
      1300: { slidesPerView: 4 },
      992: { slidesPerView: 3 },
      668: { slidesPerView: 2 },
      480: { slidesPerView: 1 }
    }
  });