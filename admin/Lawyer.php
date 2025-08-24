<?php include_once("includes/header.php"); ?>
<!-- Lawyer Profile Content Start -->
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-xl-8 col-lg-10 col-md-12">

      <div class="card shadow mb-4">
        <div class="card-body">

          <!-- Profile Section -->
          <div class="d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <img src="https://via.placeholder.com/150" alt="Lawyer Photo"
              class="rounded-circle mb-3 mb-md-0 mr-md-4" style="width: 150px; height: 150px; object-fit: cover;">
            <div>
              <h3 class="mb-1">John Doe</h3>
              <p class="text-muted mb-2">Criminal Defense Lawyer</p>
              <p>Experience: 12+ years | Cases Won: 230 | Success Rate: 89%</p>
              <div class="text-warning mb-2">
                ★★★★☆ (4.5)
              </div>
            </div>
          </div>

          <hr>

          <!-- Reviews Section -->
          <h5 class="mb-3">Client Reviews</h5>

          <div class="mb-3">
            <strong>Sarah K.</strong>
            <p class="mb-1">Excellent lawyer! Helped me win my case effortlessly.</p>
            <small class="text-muted">Posted 2 weeks ago</small>
          </div>
          <hr>
          <div class="mb-3">
            <strong>Michael B.</strong>
            <p class="mb-1">Very professional and knowledgeable. Highly recommended.</p>
            <small class="text-muted">Posted 1 month ago</small>
          </div>
          <hr>
          <div class="mb-3">
            <strong>Aisha R.</strong>
            <p class="mb-1">Great communication and support throughout the process.</p>
            <small class="text-muted">Posted 2 months ago</small>
          </div>
          <hr>
          <div class="mb-3">
            <strong>David P.</strong>
            <p class="mb-1">Helped me understand my rights and fight my case successfully.</p>
            <small class="text-muted">Posted 3 months ago</small>
          </div>
          <hr>
          <div class="mb-3">
            <strong>Fatima S.</strong>
            <p class="mb-1">Very trustworthy and experienced lawyer. Will hire again!</p>
            <small class="text-muted">Posted 4 months ago</small>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>
<!-- Lawyer Profile Content End -->

<style>
  /* Responsive Styling for Lawyer Profile */
  @media (max-width: 767px) {
    .card-body {
      text-align: center;
    }

    .card-body img {
      margin-bottom: 15px;
    }
  }
</style>
<?php include_once("includes/footer.php"); ?>