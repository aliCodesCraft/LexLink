<?php
// Page title
$title = "Update-Profile";

// Includes auth, header & handler
include_once("../lawyer_includes/lawyer_utils/auth.php");
include_once("../lawyer_includes/lawyer_layouts/header.php");
include_once("../lawyer_includes/lawyer_handlers/lawyerUpdate_handler.php");
?>

<?php
// Fetching lawyer details with category and city
$getLawyer = "SELECT * FROM `lawyers` 
INNER JOIN `categories` ON lawyers.lawyer_category = categories.category_id 
INNER JOIN `cities` on lawyers.lawyer_city = cities.city_id
WHERE `lawyer_id` = '$lawyerID' ";

// Running query
$lawyerResult = mysqli_query($connection, $getLawyer);

// Fetching all categories and cities
$getCategory = "SELECT * FROM `categories` ";
$getCities = "SELECT * FROM `cities` ";

// Running query
$categoryResult = mysqli_query($connection, $getCategory);
$cityResult = mysqli_query($connection, $getCities);
?>

<!-- Update Form -->
<div class="p-5">
    <div class="card position-relative">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Lawyer Profile</h6>
        </div>
        <div class="card-body">

            <form action="" enctype="multipart/form-data" method="POST">

                <!-- Profile picture preview -->
                <div style="display: inline-block; text-align: center;">
                    <img width="160px" class="rounded-circle" style="border:2px solid #0a2342; object-fit:cover;" src="lawyer_assets/uploads/profilepic/<?php echo $lawyer['lawyer_picture']; ?>"
                        alt="" id="image-preview" height="160px" style="margin-bottom: 14px;">

                    <div id="edit-icon" style="cursor: pointer; color: #0a2342; font-size: 14px; margin-bottom:20px;">
                        <i class="fas fa-pencil"></i> Change Profile Pic
                    </div>
                </div>

                <!-- Lawyer name -->
                <div class="form-group">
                    <label for="lawyerName" class="form-label">Lawyer Name</label>
                    <input type="text" class="form-control" placeholder="Enter Lawyer Name" name="lawyername"
                        value="<?php echo $lawyer['lawyer_name']; ?>">
                </div>

                <!-- Lawyer email -->
                <div class="form-group">
                    <label for="lawyerEmail" class="form-label">Lawyer Email</label>
                    <input type="email" class="form-control" placeholder="Enter Lawyer Email" name="lawyeremail"
                        value="<?php echo $lawyer['lawyer_email']; ?>">
                </div>

                <!-- Lawyer password -->
                <div class="form-group">
                    <label for="lawyerPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="lawyerpassword">
                </div>

                <!-- Lawyer confirm password -->
                <div class="form-group">
                    <label for="lawyerConfirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm Password" name="lawyerconfirmpassword">
                </div>

                <!-- Lawyer profile picture -->
                <div class="form-group" style="display: none;">
                    <label for="lawyerImage" class="form-label">Profile Image</label>
                    <input type="file" class="form-control" name="lawyerpic" id="lawyerImage" accept="image/*">
                </div>

                <!-- Lawyer category -->
                <div class="form-group">
                    <label for="lawyerSpecialization" class="form-label">Category</label>
                    <select class="form-select" name="lawyercategory">
                        <option disabled>Select Category</option>

                        <?php
                        // Loop through categories and mark the lawyer's category as selected
                        foreach ($categoryResult as $category) { ?>
                            <option value="<?php echo $category['category_id']; ?>"
                                <?php
                                // Check if lawyer's category matches this category ID
                                if ($lawyer['lawyer_category'] == $category['category_id']) echo "selected";
                                ?>>
                                <?php echo $category['category_name']; ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>

                <!-- Lawyer city -->
                <div class="form-group">
                    <label for="lawyerSpecialization" class="form-label">City</label>
                    <select class="form-select" name="lawyercity">
                        <option disabled>Select City</option>

                        <?php
                        // Loop through cities and mark the lawyer's city as selected
                        foreach ($cityResult as $city) { ?>
                            <option value="<?php echo $city['city_id']; ?>"
                                <?php
                                // Check if lawyer's city matches this city ID
                                if ($lawyer['lawyer_city'] == $city['city_id']) echo "selected";
                                ?>>
                                <?php echo $city['city_name']; ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>

                <!-- Update btn -->
                <input type="submit" value="Update Profile" name="btnUpdateLawyer" class="btn btn-primary">

            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (isset($_SESSION['success'])): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Success',
    text: '<?php echo $_SESSION['success']; ?>',
    confirmButtonText: 'OK'
});
</script>
<?php unset($_SESSION['success']); endif; ?>

<?php if (isset($_SESSION['error'])): ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Error',
    text: '<?php echo $_SESSION['error']; ?>',
    confirmButtonText: 'OK'
});
</script>
<?php unset($_SESSION['error']); endif; ?>

<?php
// Include footer 
include_once("../lawyer_includes/lawyer_layouts/footer.php");
?>