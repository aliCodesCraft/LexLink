<?php
// include_once("includes/auth.php"); 
?>
<?php include_once("includes/header.php"); ?>


<?php include_once("includes/config.php");

// Lawyer ID Stored in Query String
$LawyerID = $_GET['ID'];
$getLawyers = "
    SELECT lawyers.*, categories.category_name
    FROM lawyers
    INNER JOIN categories 
        ON lawyers.lawyer_category = categories.category_id
    WHERE lawyers.lawyer_status = 'active' 
";

$lawyersData = mysqli_query($connection, $getLawyers);
?>



<div class="hiw-heading-v2">
  <h2>Our Lawyers</h2>
  <p>Find and connect with the right lawyer for your needs.</p>
</div>


<div class="container py-5">
  <div class="row g-4">

    <?php foreach ($lawyersData as $lawyer) { ?>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="profile-card">
          <div class="image">
            <img src="lawyer/assets/lawyer_uploads/<?php echo $lawyer['lawyer_picture']; ?>" alt="" class="profile-img" />
          </div>
          <div class="text-data">
            <span class="name"><?php echo $lawyer['lawyer_name']; ?></span>
            <span class="job"><?php echo $lawyer['category_name']; ?></span>
          </div>
          <div class="media-buttons rating">
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
          </div>
          <div class="buttons">
            <button class="button">View Profile</button>
          </div>
          <div class="analytics">
            <div class="data"><i class="ri-heart-fill"></i><span class="number">60k</span></div>
            <div class="data"><i class="ri-chat-1-fill"></i><span class="number">20k</span></div>
            <div class="data"><i class="ri-share-forward-fill"></i><span class="number">12k</span></div>
          </div>
        </div>
      </div>
    <?php } ?>

  </div>
</div>

<style>
  .row.g-4 {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    /* Center align cards */
  }

  .row.g-4>[class*="col-"] {
    flex: 0 0 calc(20% - 1rem);
    /* 5 cards per row */
    max-width: calc(24.57% - 0.4rem);
  }
</style>


<?php include_once("includes/footer.php"); ?>