<?php
// Page title
$title = "Appointments";

// Include auth,connection & header
include_once("../includes/utils/auth.php");
include_once("../includes/config/config.php");
include_once("../includes/layouts/header.php");
?>

<!-- Fetching User Appointments Through UserID -->
<?php
$userID = $_SESSION['userID'];

$userAppointment = "SELECT * FROM `appointments` 
INNER JOIN `lawyers` ON appointments.booked_lawyer = lawyers.lawyer_id 
WHERE `booker_id` = '$userID' ";

$appointmentResult = mysqli_query($connection, $userAppointment);
?>

<style>
    .status.accepted {
        background-color: lightgreen;
        color: green;
    }

    .status.cancelled {
        background-color: darkred !important;
        color: white !important;

    }

    .status.pending {
        background-color: #ec9419;
        color: white;
    }

    .status.completed {
        background-color: #28a745;
        color: white;
    }

    .status.rejected {
        background-color: #dc3545;
        color: white;
    }
</style>

<!-- User Appoitments -->
<div class="appointments-container">
    <h2>My Appointments</h2>

    <!-- Looping appointments -->
    <?php foreach ($appointmentResult as $appointment) { ?>

        <!-- Appointment card -->
        <div class="appointment-card">
            <div class="booker-info">

                <!-- Appointment details -->
                <strong><?php echo $appointment['booker_name']; ?></strong>
                <span><?php echo $appointment['booker_email']; ?></span>
                <span><?php echo $appointment['booker_address']; ?></span>
                <span><?php echo $appointment['booker_schedule']; ?></span>
                <p class="message">Case:<?php echo $appointment['booker_message']; ?></p>
            </div>

            <!-- Booked lawyer info -->
            <div class="lawyer-info">
                <img src="/LexLink/lawyer/lawyer_assets/uploads/profilepic/<?php echo $appointment['lawyer_picture']; ?>" alt="Lawyer">
                <div>
                    <strong><?php echo $appointment['lawyer_name']; ?></strong>

                    <!-- Appointment status -->
                    <span class="status <?php echo $appointment['appointment_status']; ?>">
                        <?php echo $appointment['appointment_status']; ?></span>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php
// Include footer 
include_once("../includes/layouts/footer.php");
 ?>