<!-- Fetching Lawyer Data Through ID -->
<?php
include_once("includes/config.php");

// Lawyer ID Stored in Query String
$LawyerID = $_GET['ID'];
$getLawyers = "
    SELECT * FROM `lawyers`
    WHERE lawyer_status = 'active' 
      AND lawyer_id = '$LawyerID'
";

$lawyersData = mysqli_query($connection, $getLawyers);
$rows = mysqli_fetch_assoc($lawyersData);
?>


<?php include_once("includes/header.php"); ?>




<?php include_once("includes/footer.php"); ?>