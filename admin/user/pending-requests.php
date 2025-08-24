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
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Created At</th>
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
                                    <a href="../actions/complete.php?appID=<?php echo $pending['appointment_id']; ?>"
                                        class="btn btn-success">Add</a>

                                    <a href="../actions/reject.php?appID=<?php echo $pending['appointment_id']; ?>"
                                        class="btn btn-danger">Reject</a>
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