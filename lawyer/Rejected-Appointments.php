<?php
include_once("includes/header.php");
include_once("includes/config.php");
?>

<?php

$getReject = "SELECT * FROM `appointments` INNER JOIN `users` ON appointments.booker_id = users.user_id WHERE booked_lawyer = 2 AND `appointment_status` = 'rejected' ";

$rejectResults = mysqli_query($connection, $getReject);


?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Reject Appointments</h1>

    <!-- Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-warning">
            <h6 class="m-0 font-weight-bold text-light">Reject Appointments</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead class="bg-danger text-white">
                        <tr>
                            <th>Client Name</th>
                            <th>Client Email</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Booked By</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rejectResults as $reject) { ?>
                            <?php
                            // Seprating Date Time
                            $datetime = $reject['booker_schedule'];

                            // convert & format datetime
                            $date = date("d-m-Y", strtotime($datetime));
                            $time = date("h:i A", strtotime($datetime));

                            ?>
                            <tr>
                                <td><?php echo $reject['booker_name']; ?></td>
                                <td><?php echo $reject['booker_email']; ?></td>
                                <td><?php echo $date; ?></td>
                                <td><?php echo $time; ?></td>
                                <td><?php echo $reject['user_email']; ?></td>
                                <td>
                                    <a href="actions/complete.php?appID=<?php echo $reject['appointment_id']; ?>"
                                        class="btn btn-success">Complete</a>

                                    <a href="actions/review.php?appID=<?php echo $reject['appointment_id']; ?>"
                                        class="btn btn-warning">Review</a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php include_once("includes/footer.php"); ?>