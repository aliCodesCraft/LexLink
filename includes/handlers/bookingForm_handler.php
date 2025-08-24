<?php
// Initialize session
include_once("includes/utils/session.php");
$bookerId = $_SESSION['userID'];
$LawyerID  = $_GET['ID'];


// Inserting Data in Appoitments Table
if (isset($_POST['btnBookAppoitment']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $bookerName = $_POST['name'];
    $bookerEmail = $_POST['email'];
    $bookerAddress = $_POST['address'];
    $bookerSchedule = $_POST['date-time'];
    $bookerMessage = $_POST['message'];
    $bookedLawyer = $_POST['lawyer-id'];

    $bookingQuery = "INSERT INTO `appointments` (`booker_id`, `booker_name`, `booker_email`, `booker_address`, `booker_schedule`, `booker_message` ,`booked_lawyer`, `appointment_status`) 

    VALUES ('$bookerId', '$bookerName', '$bookerEmail', '$bookerAddress', '$bookerSchedule', '$bookerMessage', '$bookedLawyer','pending')";

    $bookingResult = mysqli_query($connection, $bookingQuery);

    if ($bookingResult) {
        echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Appointment Booked',
                text: 'Mr " . addslashes($bookerName) . " Your Appointment is booked',
                icon: 'success',
                confirmButtonText: 'Continue',
                background: '#0A2342',
                color: '#ffffff',
                confirmButtonColor: 'goldenrod'
            }).then(() => {
                // Button ka color yellow karna
                const btn = document.querySelector('.bookAppoitment');
                if(btn){
                    btn.style.backgroundColor = 'gold';
                    btn.style.color = '#000';
                    btn.innerHTML = '<i class=\"fas fa-clock\"></i> Pending';
                }
            });
        });
    </script>
    ";
    }
}




// Fetch latest status from DB
$status = '';
$userId = $_SESSION['userID'];

if ($userId && $LawyerID) {
    $getStatus = "SELECT `appointment_id`,`appointment_status` 
              FROM `appointments` 
              WHERE `booked_lawyer` = '$LawyerID' 
              AND `booker_id` = '$userId' 
              ORDER BY appointment_id DESC 
              LIMIT 1";

    $statusResult = mysqli_query($connection, $getStatus);
    $result = mysqli_fetch_assoc($statusResult);
    
    if ($result) {
        $status = $result['appointment_status'];
        $appointmentID = $result['appointment_id'];
    }
}

if(isset($_GET['cancelID'])){
    $id = intval($_GET['cancelID']);
    $update = "UPDATE appointments SET appointment_status='cancelled' WHERE appointment_id=$id";
    if(mysqli_query($connection, $update)){

        // Redirect to reload the page with updated appointment status
        echo "
        <script>
            window.location.href = 'lawyer-profile.php?ID=".$LawyerID."';
        </script>
        ";
        exit();
    }
}
