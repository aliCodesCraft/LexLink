<?php
include_once("../includes/config.php");


$idToBeReviewd = intval($_GET['appID']);
$reviewAppointment = "UPDATE `appointments` SET `appointment_status` = 'pending' WHERE `appointment_id` = $idToBeReviewd";
$review = mysqli_query($connection, $reviewAppointment);

if ($review) {

    // Capture the page from which the user came (HTTP Referer)
    // This helps us redirect the user back to the page they were on
    $currentPage = $_SERVER['HTTP_REFERER'];

    // Trigger SweetAlert 
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Review!',
                    text: 'Appointment is now Pending',
                    icon: 'warning',
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
