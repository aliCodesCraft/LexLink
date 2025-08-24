<?php
include_once("../../includes/config.php");


$idToBeVerify = intval($_GET['appID']);
$verified = "UPDATE `lawyers` SET `lawyer_status` = 'active' WHERE `lawyer_id` = $idToBeVerify";
$completeverify = mysqli_query($connection, $verified);

if ($completeverify) {

    // Capture the page from which the user came (HTTP Referer)
    // This helps us redirect the user back to the page they were on
    $currentPage = $_SERVER['HTTP_REFERER'];

    // Trigger SweetAlert 
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Complete!',
                    text: 'New One Added',
                    icon: 'success',
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
