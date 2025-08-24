<?php
include_once("../includes/header.php");
include_once("../includes/config.php");
?>

<?php
$getusers = "SELECT * FROM `users` ";
$userResults = mysqli_query($connection, $getusers);
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Users</h1>

    <!-- Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-warning">
            <h6 class="m-0 font-weight-bold text-light">All Lawyers</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead class="bg-success text-white">
                        <tr>
                            <th>Id</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Joined At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($userResults as $user) { ?>
                            <tr>
                                <td><?php echo $user['user_id']; ?></td>
                                <td><?php echo $user['user_name']; ?></td>
                                <td><?php echo $user['user_email']; ?></td>
                                <td><?php echo $user['user_created_at']; ?></td>
                                <td>
                                    <a href="actions/reject.php?appID=<?php echo $completed['appointment_id']; ?>" class="btn btn-danger">Delete</a>
                                    <a href="../actions/review.php?appID=<?php echo $completed['appointment_id']; ?>" class="btn btn-warning">Review</a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Success!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Appointment has been completed successfully.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<?php include_once("../includes/footer.php"); ?>