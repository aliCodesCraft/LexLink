<?php
include_once("../includes/config.php");


$idToBeRejected = intval($_GET['appID']);
$rejectAppointment = "UPDATE `appointments` SET `appointment_status` = 'rejected' WHERE `appointment_id` = $idToBeRejected";
$reject = mysqli_query($connection, $rejectAppointment);

if ($reject) {

    // Capture the page from which the user came (HTTP Referer)
    // This helps us redirect the user back to the page they were on
    $currentPage = $_SERVER['HTTP_REFERER'];

    // Trigger SweetAlert 
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Reject!',
                    text: 'Appointment is now Rejected',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    background: '#0A2342',
                    color: '#ffffff',
                    confirmButtonColor: 'goldenrod'
                }).then(() => {

                    // Redirecting to current page
                    window.location.href = '$currentPage';
                });
            });
        </script>";
} else {
    echo "Error: " . mysqli_error($connection);
}
