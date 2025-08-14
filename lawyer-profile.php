<?php include_once("includes/auth.php"); ?>



<!-- ==========Header Linked========== -->
<?php include_once("includes/header.php"); ?>
<!-- ==========Header Linked========== -->

<!-- Fetching Lawyer Data Through ID -->
<?php
include_once("includes/config.php");

// Lawyer ID Stored in Query String
$LawyerID = $_GET['ID'];
$getLawyers = "
    SELECT lawyers.*, categories.category_name
    FROM lawyers
    INNER JOIN categories 
        ON lawyers.lawyer_category = categories.category_id
    WHERE lawyers.lawyer_status = 'active' 
      AND lawyers.lawyer_id = '$LawyerID'
";

$lawyersData = mysqli_query($connection, $getLawyers);
$rows = mysqli_fetch_assoc($lawyersData);
?>

<style>
    .blur-input-row {
        display: flex;
        gap: 10px;
        /* space between fields */
    }

    .blur-input-row .blur-input-group {
        flex: 1;
        /* equal width fields */
    }

    /* Responsive for mobile */
    @media (max-width: 600px) {
        .blur-input-row {
            flex-direction: column;
        }
    }

    /* Address aur Date Time ke beech ka vertical gap kam */
    .blur-input-group {
        margin-bottom: 8px;
        /* pehle yahan zyada hoga, isse kam kar do */
    }

    .blur-input-group textarea {
        width: 100%;
        border: none;
        outline: none;
        background: #3b4f68;
        resize: none;
        font-size: 16px;
        color: inherit;
        padding: 10px;
    }

    input,
    textarea::placeholder {
        color: white;
    }
</style>

<!-- Form Container Modal -->
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
                    <input type="text" placeholder="Your Name" required name="name" />
                </div>

                <div class="blur-input-group">
                    <i class="ri-mail-line"></i>
                    <input type="email" placeholder="Your Email" required name="email" />
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
                <input type="text" placeholder="Lawyer" required value="<?php echo $rows['lawyer_name']; ?>" name="selected-lawyer" disabled />
            </div>

            <input type="submit" value="Book Appointment" class="blur-btn" name="btnUserRegister" />
        </form>

    </div>
</div>

<!-- Lawyer Profile Content Start -->

<div class="profile-banner"></div>

<div class="profile-container">
    <div class="profile-header">
        <img src="lawyer/assets/lawyer_uploads/<?php echo $rows['lawyer_picture']; ?>" alt="Lawyer Photo" class="profile-pic">
        <div class="profile-info">
            <h1><?php echo $rows['lawyer_name']; ?></h1>
            <p>Senior <?php echo $rows['category_name']; ?> | 15+ Years Experience | Expert in High-Profile Cases</p>
            <p>Seattle, Washington</p>

            <div class="action-buttons">
                <a href="#"class="btn-primary bookAppoitment"><i class="fas fa-calendar-check"></i> Book Appointment</a>
                <span class="status-available"><i class="fas fa-circle"></i> Available</span>
            </div>
        </div>
    </div>

    <div class="profile-body">
        <h3>About</h3>
        <p>With over 15 years of experience in <?php echo $rows['category_name']; ?>, I have successfully defended clients in complex, high-stakes cases. My dedication to justice, combined with a strategic approach, ensures that every client receives the strongest defense possible.</p>

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
<!-- Lawyer Profile Content End -->



<style>
    .profile-banner {
        background: #0A66C2 url('lawyer/assets/lawyer_uploads/<?php echo $rows['lawyer_picture']; ?>') center/cover no-repeat;
        height: 200px;
        position: relative;
    }
    .profile-container {
        background: #fff;
        max-width: 100%;
        margin: 0 auto 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        padding: 25px;
        position: relative;
        top: -60px; /* Lift container up for overlap effect */
    }
    .profile-header {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        border-bottom: 1px solid #e5e5e5;
        padding-top: 60px; /* space for image overlap */
        padding-bottom: 20px;
    }
    .profile-pic {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        border: 4px solid #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        object-fit: cover;
        position: absolute;
        top: -65px; /* overlap height */
        left: 25px;
        background: #fff;
    }
    .profile-info {
        flex: 1;
        min-width: 250px;
    }
    .profile-info h1 {
        font-size: 26px;
        margin: 0;
        color: #222;
    }
    .profile-info p {
        color: #555;
        margin: 5px 0;
    }
    .action-buttons {
        display: flex;
        gap: 10px;
        margin-top: 12px;
        flex-wrap: wrap;
    }
    .btn-primary {
        background: #0A66C2;
        color: #fff;
        border: none;
        padding: 10px 18px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 500;
        transition: background 0.3s ease;
    }
    .btn-primary:hover {
        background: #004182;
    }
    .status-available {
        color: #28a745;
        font-weight: bold;
        padding: 8px 15px;
        background: #e6f4ea;
        border-radius: 6px;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .profile-body {
        padding-top: 20px;
    }
    .profile-body h3 {
        font-size: 20px;
        margin-bottom: 8px;
        color: #0A66C2;
    }
    .portfolio-card {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        max-width: 350px;
        margin-top: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .portfolio-card i {
        font-size: 55px;
        color: #004182;
    }
    .portfolio-card div {
        padding: 10px;
    }
    /* Reviews */
    .reviews {
        margin-top: 25px;
    }
    .review-card {
        background: #f9f9f9;
        border-radius: 8px;
        padding: 12px 15px;
        margin-bottom: 12px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.05);
    }
    .review-author {
        font-weight: 600;
        margin-bottom: 5px;
    }
    .stars {
        color: #f8b400;
        margin-bottom: 6px;
    }
    @media (max-width: 600px) {
        .profile-container {
            top: -50px;
            padding: 15px;
        }
        .profile-header {
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding-top: 70px;
        }
        .profile-pic {
            left: 50%;
            transform: translateX(-50%);
        }
        .profile-info {
            margin-left: 0;
        }
        .action-buttons {
            justify-content: center;
        }
    }
</style>
<!-- ==========Header Linked========== -->
<?php include_once("includes/footer.php"); ?>
<!-- ==========Header Linked========== -->