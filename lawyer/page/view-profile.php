<?php
// Page title
$title = "View-Profile";

// Includes auth, & header
include_once("../lawyer_includes/lawyer_utils/auth.php");
include_once("../lawyer_includes/lawyer_layouts/header.php");
?>

<?php
$getLawyer = "SELECT * FROM `lawyers` 
INNER JOIN `categories` ON lawyers.lawyer_category = categories.category_id 
INNER JOIN `cities` on lawyers.lawyer_city = cities.city_id
WHERE `lawyer_id` = '$lawyerID' ";

// Running query
$lawyerResult = mysqli_query($connection, $getLawyer);

// Converting in assoc
$lawyer = mysqli_fetch_assoc($lawyerResult);
?>

<!-- Lawyer profile content start -->
<div class="container my-4">

    <div class="card">
        <div class="row g-0">
            <div class="col-md-4 text-center p-3">
                <img src="lawyer_assets/uploads/profilepic/<?php echo $lawyer['lawyer_picture']; ?>"
                    alt="Lawyer Photo"
                    class="img-fluid"
                    style="width:300px; height:400px; object-fit:cover;"> <!-- crops if needed -->


            </div>

            <div class="col-md-8">
                <div class="card-body">

                    <!-- Lawyer info -->
                    <h3 class="card-title"><?php echo $lawyer['lawyer_name']; ?></h3>
                    <p class="card-text mb-1">Senior <?php echo $lawyer['category_name']; ?> | 15+ Years Experience</p>
                    <p class="card-text"><?php echo $lawyer['city_name']; ?> | Expert in High-Profile Cases</p>

                    <!-- Action buttons -->
                    <div class="mb-3">
                        <a href="page/update-profile.php" id="bookBtn" class="btn btn-primary">
                            <i class="fas fa-pencil"></i> Update Profile
                        </a>
                    </div>

                    <!-- About -->
                    <h5>About</h5>
                    <p>With over 15 years of experience in <?php echo $lawyer['category_name']; ?>, I have successfully defended clients in complex, high-stakes cases. My dedication to justice, combined with a strategic approach, ensures that every client receives the strongest defense possible.</p>

                    <!-- Portfolio -->
                    <h5>Portfolio</h5>
                    <div class="d-flex align-items-center p-2 border rounded">
                        <i class="ri-file-download-line fs-3 me-3"></i>
                        <div>
                            <strong>Case Portfolio</strong><br>
                            High-profile case summaries & legal victories.
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- Lawyer profile content end -->

<?php
// Include footer 
include_once("../lawyer_includes/lawyer_layouts/footer.php"); 
?>