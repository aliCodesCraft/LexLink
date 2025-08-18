<?php
include_once("../includes/utils/auth.php");
include_once("../includes/config/config.php");
include_once("../includes/layouts/header.php");
?>

<!-- Fetching User Appointments Through UserID -->
<?php 
$userID = $_SESSION['userID'];

$userAppointment = "SELECT * FROM `appointments` INNER JOIN `lawyers` ON appointments.booked_lawyer = lawyers.lawyer_id WHERE `booker_id` = '$userID' ";

$appointmentResult = mysqli_query($connection, $userAppointment);
?>

<!-- User Appoitments -->
<div class="appointments-container">
    <h2>My Appointments</h2>

    <!-- Looping Details -->
    <?php foreach($appointmentResult as $appointment){ ?>
    <div class="appointment-card">
        <div class="booker-info">
            <strong><?php echo $appointment['booker_name'];?></strong>
            <span><?php echo $appointment['booker_email'];?></span>
            <span><?php echo $appointment['booker_address'];?></span>
            <span><?php echo $appointment['booker_schedule'];?></span>
            <p class="message">Case:<?php echo $appointment['booker_message'];?></p>
        </div>
        <div class="lawyer-info">
            <img src="/LexLink/lawyer/assets/lawyer_uploads/<?php echo $appointment['lawyer_picture'];?>" alt="Lawyer">
            <div>
                <strong><?php echo $appointment['lawyer_name'];?></strong>
                <span class="status <?php echo $appointment['appointment_status'];?>">
                    <?php echo $appointment['appointment_status'];?></span>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php include_once("../includes/layouts/footer.php"); ?>
