<?php
include_once("../includes/config.php");


$idToBeDeleted = intval($_GET['appID']);
$deleteAppointments = mysqli_query(
    $connection,
    "DELETE FROM `appointments` WHERE `booked_lawyer` = $idToBeDeleted"
);

if ($deleteAppointments) {
    // 2) Then delete the lawyer
    $deleteLawyer = mysqli_query(
        $connection,
        "DELETE FROM `lawyers` WHERE `lawyer_id` = $idToBeDeleted"
    );
}
if ($deleteLawyer) {

    // Capture the page from which the user came (HTTP Referer)
    // This helps us redirect the user back to the page they were on
    $currentPage = $_SERVER['HTTP_REFERER'];

    // Trigger SweetAlert 
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Delete!',
                    text: 'Data Has Been Deleted',
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
