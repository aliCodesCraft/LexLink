<?php
include_once("../includes/header.php");
include_once("../includes/config.php");
?>

<?php
$getlawyers = "SELECT * FROM `lawyers` INNER JOIN `categories` ON lawyers.lawyer_id = categories.category_id WHERE `lawyer_status` = 'pending' ";
$lawyerResults = mysqli_query($connection, $getlawyers);
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pending </h1>

    <!-- Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-warning">
            <h6 class="m-0 font-weight-bold text-light">Pending Requests</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead class="bg-warning text-white">
                        <tr>
                            <th>Id</th>
                            <th>Lawyer Name</th>
                            <th>Lawyer Email</th>
                            <th>Profile Photo</th>
                            <th>Certificate</th>
                            <th>Category</th>
                            <th>Joined At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lawyerResults as $lawyer) { ?>
                            <tr>
                                <td><?php echo $lawyer['lawyer_id']; ?></td>
                                <td><?php echo $lawyer['lawyer_name']; ?></td>
                                <td><?php echo $lawyer['lawyer_email']; ?></td>
                                <td><?php echo $lawyer['lawyer_picture']; ?></td>
                                <td><?php echo $lawyer['lawyer_document']; ?></td>
                                <td><?php echo $lawyer['category_name']; ?></td>
                                <td><?php echo $lawyer['created_at']; ?></td>

                                <td>
                                    <a href="actions/reject.php?appID=<?php echo $lawyer['lawyer_id']; ?>" class="btn btn-danger">Reject</a>
                                    <a href="actions/complete.php?appID=<?php echo $lawyer['lawyer_id']; ?>" class="btn btn-warning">Verify</a>
                                </td>

                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php include_once("../includes/footer.php"); ?>