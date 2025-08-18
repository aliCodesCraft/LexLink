<?php
include_once("includes/header.php");
include_once("includes/config.php");
?>

<?php
$getLawyer = "SELECT * FROM `lawyers` 
INNER JOIN `categories` ON lawyers.lawyer_category = categories.category_id 
INNER JOIN `cities` on lawyers.lawyer_city = cities.city_id
WHERE `lawyer_id` = 2";

$lawyerResult = mysqli_query($connection, $getLawyer);
$lawyer = mysqli_fetch_assoc($lawyerResult);
?>

<!-- Lawyer profile content start -->
<div class="container my-4"> <!-- Bootstrap container -->

    <div class="card">
        <div class="row g-0">
            <div class="col-md-4 text-center p-3">
                <img src="assets/lawyer_uploads/<?php echo $lawyer['lawyer_picture']; ?>"
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
                        <a href="edit-profile.php" id="bookBtn" class="btn btn-primary">
                            <i class="fas fa-pencil"></i> Edit Profile
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

<?php include_once("includes/footer.php"); ?>