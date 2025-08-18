<?php
include_once("includes/config.php");
include_once("includes/header.php");

$getLawyer = "SELECT * FROM `lawyers` 
INNER JOIN `categories` ON lawyers.lawyer_category = categories.category_id 
INNER JOIN `cities` on lawyers.lawyer_city = cities.city_id
WHERE `lawyer_id` = 2";

$lawyerResult = mysqli_query($connection, $getLawyer);




$getCategory = "SELECT * FROM `categories` ";
$categoryResult = mysqli_query($connection, $getCategory);

?>






<div class="p-5">
    <div class="card position-relative">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Lawyer Profile</h6>
        </div>
        <div class="card-body">

            <form action="" enctype="multipart/form-data" method="POST">

                <div class="form-group">
                    <label for="lawyerName" class="form-label">Lawyer Name</label>
                    <input type="text" class="form-control" placeholder="Enter Lawyer Name" name="lawyername"
                        value="<?php echo $lawyerName; ?>" required>
                </div>

                <div class="form-group">
                    <label for="lawyerEmail" class="form-label">Lawyer Email</label>
                    <input type="email" class="form-control" placeholder="Enter Lawyer Email" name="lawyeremail"
                        value="<?php echo $lawyerEmail; ?>" required>
                </div>

                <div class="form-group">
                    <label for="lawyerPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="lawyerpassword"
                        value="<?php echo $lawyerPassword; ?>" required>
                </div>

                <div class="form-group">
                    <label for="lawyerConfirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm Password" name="lawyerconfirmpassword"
                        value="<?php echo $lawyerPassword; ?>" required>
                </div>

                <div class="form-group">
                    <img width="100px" src="assets/lawyerUploads/<?php echo $lawyerImage; ?>" alt="Lawyer Image" id="image-preview">
                    <br>
                    <label for="lawyerImage" class="form-label">Profile Image</label>
                    <input type="file" class="form-control" name="lawyerimage" id="lawyerImage">
                </div>

                <div class="form-group">
                    <label for="lawyerSpecialization" class="form-label">Category</label>
                    <select class="form-select" name="lawyerspecialization" required>
                        <option disabled>Select Category</option>

                        <?php foreach ($categoryResult as $category) { ?>
                            <option value="<?php echo $category['category_id']; ?>"
                                <?php if ($category['category_id'] == $category) echo "selected"; ?>>
                                <?php echo $category['category_name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <input type="submit" value="Update Profile" name="btnUpdateLawyer" class="btn btn-primary">

            </form>

        </div>
    </div>
</div>



<?php include_once("includes/footer.php"); ?>