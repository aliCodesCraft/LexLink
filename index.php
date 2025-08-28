<?php
// Page title
$title = "Homepage";

// Include header, conection & success
include_once("includes/utils/sucess.php");
include_once("includes/layouts/header.php");
include_once("includes/config/config.php");

?>


<?php
// Fetching promoted lawyers with category and city
$getLawyers = "SELECT * FROM `lawyers` 
INNER JOIN `categories` ON lawyers.lawyer_category = categories.category_id 
INNER JOIN `cities` on lawyers.lawyer_city = cities.city_id
WHERE `lawyer_status` = 'active' AND `is_lawyer_promoted` = 1";

// Runing query
$lawyerData = mysqli_query($connection, $getLawyers);
$lawyer = mysqli_fetch_all($lawyerData, MYSQLI_ASSOC);
?>


<?php
// Include register & login forms
include_once("includes/forms/userLogin.php");
include_once("includes/forms/userRegister.php");
?>

<!-- ==========Hero Section Start========= -->
<div class="hero-container" id="Home">
    <div class="hero">

        <!-- Text area -->
        <div class="left">

            <h1 id="hero-heading">
                Book Verified Lawyers in Minutes — No Hassle, No Delay
            </h1>
            <p class="sub-heading" id="hero-subheading">
                Get quick legal help from trusted professionals for criminal, family, civil, and business matters.
            </p>

            <!-- Buttons -->
            <div class="buttons" id="hero-buttons">
                <a href="#" class="btn">Learn More</a>
                <a href="#" class="btn outlined">Contact Us</a>
            </div>
        </div>

        <!-- Images -->
        <div class="right">
            <img id="slider-image" src="assets/images//hero-banner/hero-1.png" alt="Slider Image" />
        </div>

        <div class="bg-color"></div>
    </div>
</div>

<!-- Featured counter -->
<div class="featured reveal">
    <div class="hero-container">
        <div class="counter-grid">

            <div class="counter-box">
                <i class="fas fa-user-tie"></i>
                <h2 class="counter" data-target="150">0</h2>
                <p>Registered Lawyers</p>
            </div>

            <div class="counter-box">
                <i class="fas fa-balance-scale"></i>
                <h2 class="counter" data-target="978">0</h2>
                <p>Cases Successfully Handled</p>
            </div>

            <div class="counter-box">
                <i class="fas fa-smile-beam"></i>
                <h2><span class="counter" data-target="98">0</span>%</h2>
                <p>Satisfied Clients (%)</p>
            </div>

            <div class="counter-box">
                <i class="fas fa-award"></i>
                <h2 class="counter" data-target="10">0</h2>
                <p>Years of Legal Excellence</p>
            </div>

        </div>
    </div>
</div>
<!-- ==========Hero Section End========== -->


<!-- ==========Services Start========== -->
<section class="services reveal" id="Practice-Areas">
    <div class="contained">
        <div class="hiw-heading-v2">
            <h2>Practice Areas</h2>
            <p>Expert legal services across every field.</p>
        </div>

        <div class="line">
            <div class="cl-12">
                <ul class="services-cards no-disc">

                    <!-- Criminal Law -->
                    <li class="sc-item">
                        <a href="#">
                            <img loading="lazy" alt="Criminal Law" src="assets/images/law/criminal.png" height="69" width="69">
                            <p>Criminal Law</p>
                        </a>
                    </li>

                    <!-- Family Law -->
                    <li class="sc-item">
                        <a href="#">
                            <img loading="lazy" alt="Family Law" src="assets/images/law/Divorce.png" height="69" width="69">
                            <p>Divorse Law</p>
                        </a>
                    </li>

                    <!-- Property Law -->
                    <li class="sc-item">
                        <a href="#">
                            <img loading="lazy" alt="Property Law" src="assets/images/law/property.png" height="69" width="69">
                            <p>Property Law</p>
                        </a>
                    </li>

                    <!-- Education Law -->
                    <li class="sc-item">
                        <a href="#">
                            <img loading="lazy" alt="Education Law" src="assets/images/law/education.png" height="69" width="69">
                            <p>Education Law</p>
                        </a>
                    </li>

                    <!-- Cyber Law -->
                    <li class="sc-item">
                        <a href="#">
                            <img loading="lazy" alt="Cyber Law" src="assets/images/law/cyber.png" height="69" width="69">
                            <p>Cyber Law</p>
                        </a>
                    </li>

                    <!-- Traffic Law -->
                    <li class="sc-item">
                        <a href="#">
                            <img loading="lazy" alt="Traffic Law" src="assets/images/law/traffic.png" height="69" width="69">
                            <p>Traffic Law</p>
                        </a>
                    </li>

                    <!-- Employment Law -->
                    <li class="sc-item">
                        <a href="#">
                            <img loading="lazy" alt="Employment Law" src="assets/images/law/employment.png" height="69" width="69">
                            <p>Employment Law</p>
                        </a>
                    </li>

                    <!-- Business Law -->
                    <li class="sc-item">
                        <a href="#">
                            <img loading="lazy" alt="Business Law" src="assets/images/law/business.png" height="69" width="69">
                            <p>Business Law</p>
                        </a>
                    </li>

                    <!-- Affidavit Law -->
                    <li class="sc-item">
                        <a href="#">
                            <img loading="lazy" alt="Affidavit Law" src="assets/images/law/affidavit.png" height="69" width="69">
                            <p>Affidavit Law</p>
                        </a>
                    </li>

                    <!-- Civil Law -->
                    <li class="sc-item">
                        <a href="#">
                            <img loading="lazy" alt="Civil Law" src="assets/images/law/Civil.png" height="69" width="69">
                            <p>Civil Law</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</section>
<!-- ==========Services End========== -->


<!-- ==========Top Lawyers Start End========== -->
<section class="reveal" id="Top-Lawyers">
    <!-- ============ Trending Slider Start ============ -->
    <div class="hiw-heading-v2">
        <h2>Top Rated Lawyers</h2>
        <p>The best minds. The strongest defense..</p>
    </div>


    <div class="swiper profile-card-slider">
        <div class="swiper-wrapper">
            <?php foreach ($lawyer as $topLawyers) { ?>
                <div class="swiper-slide profile-slide">
                    <div class="profile-card">
                        <div class="image">
                            <img src="lawyer/lawyer_assets/uploads/profilepic/<?php echo $topLawyers['lawyer_picture']; ?>" alt="" class="profile-img" />
                        </div>
                        <div class="text-data">
                            <span class="name"><?php echo $topLawyers['lawyer_name']; ?></span>
                            <span class="job"><?php echo $topLawyers['category_name']; ?> | <?php echo $topLawyers['city_name'] ?> </span>
                        </div>
                        <div class="media-buttons rating">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                        <div class="buttons">
                            <a href="lawyer-profile.php?ID=<?php echo $topLawyers['lawyer_id']; ?>" class="button">View Profile</a>
                        </div>
                        <div class="analytics">
                            <div class="data"><i class="ri-heart-fill"></i><span class="number">60k</span></div>
                            <div class="data"><i class="ri-chat-1-fill"></i><span class="number">20k</span></div>
                            <div class="data"><i class="ri-share-forward-fill"></i><span class="number">12k</span></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Custom Pagination + Navigation -->
        <div class="profile-pagination"></div>
        <div class="profile-button-prev"></div>
        <div class="profile-button-next"></div>

        <div class="lawyer-btn">
            <a href="lawyers.php" class="btn" id="lawyer-btn">View All Lawyers</a>
        </div>
    </div>
</section>
<!-- ==========Top Lawyers End========== -->


<!-- ==========Case Study Start========== -->
<section class="reveal" id="Case-Studies">
    <div class="hiw-heading-v2">
        <h2>Case Studies</h2>
        <p>Stories of justice delivered — one case at a time.</p>
    </div>


    <div class="case-studies">
        <div class="case-card">
            <div class="card-img">
                <img src="assets/images/law/case2.jpeg" alt="">
            </div>
            <div class="card-text">
                <h2 class="case-text">Family Law Dispute</h2>
                <p class="case-text">Helped resolve complex child custody battle peacefully and legally.</p>
            </div>
        </div>

        <div class="case-card">
            <div class="card-img">
                <img src="assets/images/law/case1.jpeg" alt="">
            </div>
            <div class="card-text">
                <h2 class="case-text">Business Contract Review</h2>
                <p class="case-text">Assisted client in renegotiating unfair commercial agreement terms.</p>
            </div>
        </div>

        <div class="case-card">
            <div class="card-img">
                <img src="assets/images/law/case3.jpeg" alt="">
            </div>
            <div class="card-text">
                <h2 class="case-text">Criminal Defense Case</h2>
                <p class="case-text">Defended client wrongfully accused of fraud and cleared charges.</p>
            </div>
        </div>

        <div class="case-card">
            <div class="card-img">
                <img src="assets/images/law/case4.jpeg" alt="">
            </div>
            <div class="card-text">
                <h2 class="case-text">Immigration Law Case</h2>
                <p class="case-text">Successfully helped a family obtain legal residency after visa denial.</p>
            </div>
        </div>

        <div class="case-card">
            <div class="card-img">
                <img src="assets/images/law/case6.jpeg" alt="">
            </div>
            <div class="card-text">
                <h2 class="case-text">Traffic Law Case</h2>
                <p class="case-text">Reduced serious driving penalties through expert legal negotiation.</p>
            </div>
        </div>

        <div class="case-card">
            <div class="card-img">
                <img src="assets/images/law/case5.jpeg" alt="">
            </div>
            <div class="card-text">
                <h2 class="case-text">Employment Dispute</h2>
                <p class="case-text">Won compensation for client in a workplace discrimination case.</p>
            </div>
        </div>

    </div>
</section>
<!-- ==========Case Study End End========== -->


<!-- ==========Why Us Start========== -->
<section class="reveal">
    <div class="whyUs">
        <div class="phones">
            <img src="assets/images/extras/mobileApp.png" alt="Law App Screenshot">
        </div>

        <div class="features">
            <h2>Why Choose Us?</h2>
            <ul class="legal-benefits-list">
                <li><i class="ri-shield-check-line"></i> Connect with<strong>&nbsp;Verified & Experienced Lawyers</strong></li>
                <li><i class="ri-time-line"></i> <strong>Save Time</strong>&nbsp;with Seamless Consultation Booking</li>
                <li><i class="ri-customer-service-2-line"></i>Get&nbsp;<strong>24/7 Client Support</strong> for All Legal Needs</li>
                <li><i class="ri-wallet-3-line"></i> Enjoy&nbsp;<strong>Transparent & Affordable Pricing</strong></li>
                <li><i class="ri-shield-user-line"></i> Receive&nbsp;<strong>Reliable & Confidential Legal Advice</strong></li>
                <li><i class="ri-lock-line"></i> Experience&nbsp;<strong>Secure & Private Consultations</strong></li>
            </ul>

            <div class="badges">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Get it on Google Play">
                <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="Download on the App Store">
            </div>
        </div>
    </div>
</section>
<!-- ==========Why Us End========== -->


<!-- ==========Testimonials Start========== -->
<section class="testimonial-section reveal">
    <div class="hiw-heading-v2">
        <h2>What Our Clients Say</h2>
        <p>
            Real words from clients who trusted us.
        </p>
    </div>


    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
                <div class="testimonial-card">
                    <img src="assets/images/extras/user (1).png" alt="User">
                    <h4>David Collins</h4>
                    <p>I got quick support on a traffic case. The lawyer was skilled and very responsive.</p>
                    <div class="bottom-row">
                        <span class="date">10-07-2025 09:30</span>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            <i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide">
                <div class="testimonial-card">
                    <img src="assets/images/extras/user (2).png" alt="User">
                    <h4>Emily Thompson</h4>
                    <p>Consulted for a custody issue. Got great legal advice — clear and to the point.</p>
                    <div class="bottom-row">
                        <span class="date">12-07-2025 11:45</span>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            <i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide">
                <div class="testimonial-card">
                    <img src="assets/images/extras/user (1).png" alt="User">
                    <h4>Michael Brooks</h4>
                    <p>Got fast help for a criminal case. The lawyer was efficient and very helpful.</p>
                    <div class="bottom-row">
                        <span class="date">15-07-2025 15:20</span>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 4 -->
            <div class="swiper-slide">
                <div class="testimonial-card">
                    <img src="assets/images/extras/user (2).png" alt="User">
                    <h4>Sophia Harris</h4>
                    <p>Found a property lawyer fast. The consultation was easy, smooth, and helpful.</p>
                    <div class="bottom-row">
                        <span class="date">18-07-2025 13:10</span>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            <i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 5 -->
            <div class="swiper-slide">
                <div class="testimonial-card">
                    <img src="assets/images/extras/user (1).png" alt="User">
                    <h4>Christopher White</h4>
                    <p>Got a great lawyer for a job issue. The matter was resolved super quickly.</p>
                    <div class="bottom-row">
                        <span class="date">20-07-2025 10:00</span>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            <i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 6 -->
            <div class="swiper-slide">
                <div class="testimonial-card">
                    <img src="assets/images/extras/user (2).png" alt="User">
                    <h4>Jessica Green</h4>
                    <p>Used the service for an immigration matter. The process was smooth and stress-free.</p>
                    <div class="bottom-row">
                        <span class="date">22-07-2025 08:15</span>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            <i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 7 -->
            <div class="swiper-slide">
                <div class="testimonial-card">
                    <img src="assets/images/extras/user (1).png" alt="User">
                    <h4>Brian Carter</h4>
                    <p>I needed urgent advice on business law. I got connected quickly and got clear guidance.</p>
                    <div class="bottom-row">
                        <span class="date">25-07-2025 14:50</span>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
<!-- ==========Testimonials End========== -->


<!-- ==========Brands Start========== -->
<div class="reveal">
    <div class="hiw-heading-v2">
        <h2>Trusted by Leading Brands</h2>
        <p>We proudly work with the most respected names in the industry.</p>
    </div>
    <div class="brands">
        <div class="brand">
            <img src="assets/images/extras/brand1.png" alt="" width="130px">
        </div>

        <div class="brand">
            <img src="assets/images/extras/brand2.png" alt="">
        </div>

        <div class="brand">
            <img src="assets/images/extras/brand3.png" alt="">
        </div>

        <div class="brand">
            <img src="assets/images/extras/brand4.png" alt="">
        </div>
    </div>
</div>
<!-- ==========Brands Ends========== -->


<!-- ==========HOw It Works Start========== -->
<section class="how-it-works-v2 reveal" id="How-It-Works">
    <div class="hiw-heading-v2">
        <h2>How It Works</h2>
        <p>Your legal journey in just three simple steps</p>
    </div>

    <div class="hiw-steps-v2">
        <div class="hiw-step-card">
            <div class="hiw-icon-circle"><i class="ri-user-add-line"></i></div>
            <h3>Create Account</h3>
            <p>Sign up easily with your email and start your legal journey right away.</p>
        </div>

        <div class="hiw-step-card">
            <div class="hiw-icon-circle"><i class="ri-calendar-check-line"></i></div>
            <h3>Book a Service</h3>
            <p>Choose your legal service and fix an appointment that suits your time.</p>
        </div>

        <div class="hiw-step-card">
            <div class="hiw-icon-circle"><i class="ri-chat-smile-line"></i></div>
            <h3>Meet Your Lawyer</h3>
            <p>Get expert legal advice and solutions from professional lawyers.</p>
        </div>
    </div>
</section>
<!-- ==========HOw It Works End========== -->


<!-- ==========Form Start========== -->
<div class="form reveal" id="Contact">
    <div class="form-container">
        <div class="left-text">
            <h2>Resolving your complaints!</h2>
            <p>Leave your complaint here to help us make our services better for you.</p>
        </div>

        <div class="form-box">
            <form method="POST">
                <div class="row">
                    <input type="text" placeholder="Name *" required pattern="^[A-Za-z]+( [A-Za-z]+){0,2}$" title="Kindly use alphabets only" name="complainer_name">

                    <input type="text" placeholder="Gmail *" required pattern="^[a-zA-Z0-9._a-zA-Z0-9]+@gmail\.com$" title="forexample123@gmail.com" name="complainer_email">
                </div>
                <textarea placeholder="Message *" required name="complain"></textarea>
                <input type="submit" value="Submit" name="btnSubmitComplain">
            </form>
        </div>
    </div>
</div>
<!-- ==========Form End========== -->


<!-- ==========Footer Linked========== -->
<?php include_once("includes/layouts/footer.php") ?>