<?php
// Display all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<?php
// Include authentication file
include_once("includes/utils/auth.php");

// Include header layout
include_once("includes/layouts/header.php");

// Include database configuration
include_once("includes/config/config.php");
?>


<!-- Fetch lawyer details based on selected ID -->
<?php
$LawyerID = $_GET['ID'];

// Handle booking form submissions
include_once("includes/handlers/bookingForm_handler.php");

$getLawyers = "
    SELECT lawyers.*, categories.category_name, cities.city_name
    FROM lawyers
    INNER JOIN categories ON lawyers.lawyer_category = categories.category_id
    INNER JOIN cities ON lawyers.lawyer_city = cities.city_id
    WHERE lawyers.lawyer_status = 'active' AND lawyers.lawyer_id = '$LawyerID'
";

// Executing getLawyers query
$lawyerData = mysqli_query($connection, $getLawyers);
$lawyer = mysqli_fetch_assoc($lawyerData);
?>


<!-- Appointment form modal start -->
<div class="blur-form-background" id="booking-form">
    <div class="blur-close-btn">
        <i class="ri-close-line" style="background-color: #0A2342; padding:5px; border-radius:50%;"></i>
    </div>

    <div class="blur-wrapper">
        <form class="blur-form-container" method="POST">
            <h2>Book Appointment</h2>

            <div class="blur-input-row">
                <div class="blur-input-group">
                    <i class="ri-user-line"></i>
                    <!-- Username stored in session -->
                    <input type="text" placeholder="Your Name" required name="name" value="<?php echo $_SESSION['username']; ?>" />
                </div>

                <div class="blur-input-group">
                    <i class="ri-mail-line"></i>
                    <!-- Useremail stored in session -->
                    <input type="email" placeholder="Your Email" required name="email" value="<?php echo $_SESSION['useremail']; ?>" />
                </div>
            </div>

            <div class="blur-input-group">
                <i class="ri-map-pin-line"></i>
                <input type="text" placeholder="Your Address" required name="address" />
            </div>

            <div class="blur-input-group">
                <i class="ri-calendar-schedule-fill"></i>
                <input type="datetime-local" placeholder="date time" required name="date-time" />
            </div>

            <!-- Message / Case Details -->
            <div class="blur-input-group">
                <textarea placeholder="Write your message or case details..." name="message" rows="4" required></textarea>
            </div>

            <p style="margin-bottom: 0px; font-weight:100; margin-left:3px; text-align:left">Selected Lawyer</p>
            <div class="blur-input-group">
                <i class="fas fa-user-tie"></i>
                <!-- Selected lawyer -->
                <input type="text" placeholder="Lawyer" required value="<?php echo $lawyer['lawyer_name']; ?>" disabled />

                <!-- Hidden field to submit the selected lawyer's ID to the backend -->
                <input type="hidden" name="lawyer-id" value="<?php echo $lawyer['lawyer_id']; ?>" />
            </div>

            <input type="submit" value="Book Appointment" class="blur-btn" name="btnBookAppoitment" />
        </form>

    </div>
</div>
<!-- Appointment form modal end -->

<!-- Lawyer profile content start -->
<div class="profile-banner"></div>

<div class="profile-container">
    <div class="profile-header">
        <img src="lawyer/assets/lawyer_uploads/<?php echo $lawyer['lawyer_picture']; ?>" alt="Lawyer Photo" class="profile-pic">
        <div class="profile-info">

            <!-- Lawyer info -->
            <h1><?php echo $lawyer['lawyer_name']; ?></h1>
            <p>Senior <?php echo $lawyer['category_name']; ?> | 15+ Years Experience</p>
            <p><?php echo $lawyer['city_name']; ?> Expert in High-Profile Cases</p>


            
<div class="action-buttons">

    <?php if ($status == 'pending'): ?>
        <a href="javascript:void(0);" class="btn-primary" style="background:gold; color:black;">
            <i class="fas fa-clock"></i> Appointment is Pending
        </a>

    <?php elseif ($status == 'completed'): ?>
        <a href="javascript:void(0);" class="btn-primary" style="background:green; color:white;">
            <i class="fas fa-check-circle"></i> Appointment Completed
        </a>
        <br>
        <a href="#" id="bookAgainBtn" class="btn-primary" style="margin-top:5px; background:#007bff; color:white;">
            Book Again
        </a>

    <?php elseif ($status == 'rejected'): ?>
        <a href="javascript:void(0);" class="btn-primary" style="background:red; color:white;">
            <i class="fas fa-times-circle"></i> Appointment Rejected
        </a>
        <br>
        <a href="#" id="bookAgainBtn" class="btn-primary" style="margin-top:5px; background:#007bff; color:white;">
            Book Again
        </a>

    <?php else: ?>
        <a href="#" id="bookBtn" class="btn-primary bookAppoitment">
            <i class="fas fa-calendar-check"></i> Book Appointment
        </a>
        <span class="status-available"><i class="fas fa-circle"></i> Available</span>
    <?php endif; ?>

</div>




        </div>
    </div>

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
            <div class="review-card">
                <div class="review-author">Emily R.</div>
                <div class="stars">★★★★★</div>
                <p>Mr. Blake was professional, compassionate, and incredibly skilled. He saved my career.</p>
            </div>
            <div class="review-card">
                <div class="review-author">Michael T.</div>
                <div class="stars">★★★★☆</div>
                <p>Great communication and results. Highly recommend for anyone facing serious charges.</p>
            </div>
            <div class="review-card">
                <div class="review-author">Sarah P.</div>
                <div class="stars">★★★★★</div>
                <p>His expertise turned a hopeless case into a complete dismissal. Forever grateful!</p>
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

<style>
        .profile-banner {
        background: #0A66C2 url('lawyer/assets/lawyer_uploads/<?php echo $lawyer['lawyer_picture']; ?>') center/cover no-repeat;
        height: 200px;
        position: relative;
    }

</style>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(function(){

    // Book Again click → replace button with Book Appointment
    $(document).on("click", "#bookAgainBtn", function(e){
        e.preventDefault();
        $(".action-buttons").html(`
            <a href="#" id="bookBtn" class="btn-primary bookAppoitment">
                <i class="fas fa-calendar-check"></i> Book Appointment
            </a>
            <span class="status-available"><i class="fas fa-circle"></i> Available</span>
        `);
    });

    // Book Appointment click → show modal
    $(document).on("click", "#bookBtn, .bookAppoitment", function(e){
        e.preventDefault();
        $("#booking-form").show();
    });

    // Close modal
    $(document).on("click", ".blur-close-btn", function(){
        $("#booking-form").hide();
    });

});

</script>

<!-- ==========Include footer layout========== -->
<?php include_once("includes/layouts/footer.php"); ?>