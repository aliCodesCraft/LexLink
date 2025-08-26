<?php
// Page title
$title = "Lawyer-Profile";

// Include auth, database , and header
include_once("includes/utils/auth.php");
include_once("includes/config/config.php");
include_once("includes/layouts/header.php");
?>


<!-- Fetch lawyer details based on selected ID -->
<?php
// Get lawyer ID from URL
$LawyerID = $_GET['ID']; 

// Booking form handler
include_once("includes/handlers/bookingForm_handler.php");

// Query to fetch lawyer details along with category and city
$getLawyers = "SELECT * FROM `lawyers` 
INNER JOIN `categories` ON lawyers.lawyer_category = categories.category_id 
INNER JOIN `cities` on lawyers.lawyer_city = cities.city_id
WHERE `lawyer_id` = $LawyerID";

// Running query
$lawyerData = mysqli_query($connection, $getLawyers);

// Converting in assoc
$lawyer = mysqli_fetch_assoc($lawyerData); 
?>


<!-- Appointment form modal start -->
<div class="blur-form-background" id="booking-form">
    <div class="blur-close-btn">
        <i class="ri-close-line" style="background-color: #0A2342; padding:5px; border-radius:50%;"></i>
    </div>

    <div class="blur-wrapper">
        <!-- Booking form -->
        <form class="blur-form-container" method="POST">
            <h2>Book Appointment</h2>

            <!-- Name and Email fields pre-filled from session -->
            <div class="blur-input-row">
                <div class="blur-input-group">
                    <i class="ri-user-line"></i>
                    <input type="text" placeholder="Your Name" required name="name" value="<?php echo $_SESSION['username']; ?>" />
                </div>

                <div class="blur-input-group">
                    <i class="ri-mail-line"></i>
                    <input type="email" placeholder="Your Email" required name="email" value="<?php echo $_SESSION['useremail']; ?>" />
                </div>
            </div>

            <!-- Address field -->
            <div class="blur-input-group">
                <i class="ri-map-pin-line"></i>
                <input type="text" placeholder="Your Address" required name="address" />
            </div>

            <!-- Appointment date & time -->
            <div class="blur-input-group">
                <i class="ri-calendar-schedule-fill"></i>
                <input type="datetime-local" placeholder="date time" required name="date-time" />
            </div>

            <!-- Message or case details -->
            <div class="blur-input-group">
                <textarea placeholder="Write your message or case details..." name="message" rows="4" required></textarea>
            </div>

            <!-- Selected lawyer info -->
            <p style="margin-bottom: 0px; font-weight:100; margin-left:3px; text-align:left">Selected Lawyer</p>
            <div class="blur-input-group">
                <i class="fas fa-user-tie"></i>
                <input type="text" placeholder="Lawyer" required value="<?php echo $lawyer['lawyer_name']; ?>" disabled />
                <input type="hidden" name="lawyer-id" value="<?php echo $lawyer['lawyer_id']; ?>" />
            </div>

            <!-- Submit button -->
            <input type="submit" value="Book Appointment" class="blur-btn" name="btnBookAppoitment" />
        </form>
    </div>
</div>
<!-- Appointment form modal end -->


<!-- Lawyer profile content start -->
<div class="profile-banner">
</div>

<div class="profile-container">
    <div class="profile-header">
        <!-- Lawyer profile picture -->
        <img src="lawyer/lawyer_assets/uploads/profilepic/<?php echo $lawyer['lawyer_picture']; ?>" alt="Lawyer Photo" class="profile-pic">

        <div class="profile-info">
            <!-- Lawyer basic info -->
            <h1><?php echo $lawyer['lawyer_name']; ?></h1>
            <p>Senior <?php echo $lawyer['category_name']; ?> | 15+ Years Experience</p>
            <p><?php echo $lawyer['city_name']; ?> | Expert in High-Profile Cases</p>

            <!-- Action buttons based on appointment status -->
            <div class="action-buttons">
                <?php if ($status == 'pending'): ?>
                    <a href="javascript:void(0);" class="btn-primary" style="background:gold; color:black;">
                        <i class="fas fa-clock"></i> Appointment pending
                    </a>
                    <!-- Cancel button -->
                    <a href="javascript:void(0);"
                        class="btn btn-primary"
                        style="background-color:#a00000;"
                        onclick="confirmCancel('lawyer-profile.php?ID=<?php echo $LawyerID ?>&cancelID=<?php echo $appointmentID ?>')">
                        <i class="fas fa-times"></i> Cancel appointment
                    </a>

                <?php elseif ($status == 'cancelled'): ?>
                    <a href="javascript:void(0);" class="btn-primary" style="background-color: #a00000;">
                        Appointment cancelled <i class="fas fa-times-square"></i>
                    </a>
                    <a href="#" id="bookAgainBtn" class="btn-primary" style="margin-top:5px; background:#007bff; color:white;">
                        Book Again <i class="fa-solid fa-rotate-left"></i>
                    </a>

                <?php elseif ($status == 'accepted'): ?>
                    <a href="javascript:void(0);" class="btn-primary" style="background-color: lightgreen; color:green;">
                        Appointment accepted <i class="fas fa-check-circle"></i>
                    </a>
                    <!-- Cancel button -->
                    <a href="javascript:void(0);"
                        class="btn btn-primary"
                        style="background-color:#a00000;"
                        onclick="confirmCancel('lawyer-profile.php?ID=<?php echo $LawyerID ?>&cancelID=<?php echo $appointmentID ?>')">
                        <i class="fas fa-times"></i> Cancel appointment
                    </a>

                <?php elseif ($status == 'completed'): ?>
                    <a href="javascript:void(0);" class="btn-primary" style="background:green; color:white;">
                        <i class="fas fa-check-circle"></i> Appointment completed
                    </a>
                    <br>
                    <a href="#" id="bookAgainBtn" class="btn-primary" style="margin-top:5px; background:#007bff; color:white;">
                        Book Again <i class="fa-solid fa-rotate-left"></i>
                    </a>

                <?php elseif ($status == 'rejected'): ?>
                    <a href="javascript:void(0);" class="btn-primary" style="background:red; color:white;">
                        <i class="fas fa-times-circle"></i> Appointment rejected
                    </a>
                    <br>
                    <a href="#" id="bookAgainBtn" class="btn-primary" style="margin-top:5px; background:#007bff; color:white;">
                        Book Again
                    </a>

                <?php else: ?>
                    <!-- Default available state -->
                    <a href="#" id="bookBtn" class="btn-primary bookAppoitment">
                        <i class="fas fa-calendar-check"></i> Book Appointment
                    </a>
                    <span class="status-available"><i class="fas fa-circle"></i> Available</span>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Lawyer profile body -->
    <div class="profile-body">
        <h3>About</h3>
        <p>With over 15 years of experience in <?php echo $lawyer['category_name']; ?>, I have successfully defended clients in complex, high-stakes cases. My dedication to justice, combined with a strategic approach, ensures that every client receives the strongest defense possible.</p>

        <h3>Portfolio</h3>
        <div class="portfolio-card">
            <i class="ri-file-download-line"></i>
            <div>
                <strong>Case Portfolio</strong><br>
                High-profile case summaries & legal victories.
            </div>
        </div>

        <div class="reviews">
            <h3>Client Reviews</h3>
            <!-- Review cards -->
            <div class="review-card">
                <div class="review-author">Emily R.</div>
                <div class="stars">★★★★★</div>
                <p><?php echo $lawyer['lawyer_name']; ?> was professional, compassionate, and incredibly skilled. They saved my career.</p>
            </div>
            <div class="review-card">
                <div class="review-author">Michael T.</div>
                <div class="stars">★★★★☆</div>
                <p>Great communication and results. Highly recommend for anyone facing serious charges.</p>
            </div>
            <div class="review-card">
                <div class="review-author">Sarah P.</div>
                <div class="stars">★★★★★</div>
                <p>Their expertise turned a hopeless case into a complete dismissal. Forever grateful!</p>
            </div>
            <div class="review-card">
                <div class="review-author">James K.</div>
                <div class="stars">★★★★★</div>
                <p>Sharp, strategic, and a true fighter in the courtroom.</p>
            </div>
        </div>
    </div>
</div>
<!-- Lawyer profile content end -->

<!-- Profile banner styling -->
<style>
.profile-banner {
    background: linear-gradient(rgba(10, 35, 66, 0.6), rgba(10, 35, 66, 0.6)),
                url('assets/images/hero-banner/banner.png');
    background-size: cover;       /* image puri jagah cover kare */
    background-position: center;  /* center se adjust ho */
    background-repeat: no-repeat; /* repeat na ho */
    height: 200px;
    width: 100%;                  /* full width mein chale */
    position: relative;
}


</style>

<?php
// Include footer
include_once("includes/layouts/footer.php"); 
?> 
