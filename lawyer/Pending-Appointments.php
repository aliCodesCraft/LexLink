<?php
include_once("includes/header.php");
include_once("includes/config.php");
?>

<?php

$getPending = "SELECT * FROM `appointments` INNER JOIN `users` ON appointments.booker_id = users.user_id WHERE booked_lawyer = 2 AND `appointment_status` = 'pending' ";

$pendingResults = mysqli_query($connection, $getPending);


?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pending Appointments</h1>

    <!-- Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-warning">
            <h6 class="m-0 font-weight-bold text-light">Pending Appointments</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead class="bg-warning text-white">
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
                        <?php foreach ($pendingResults as $pending) { ?>
                            <?php
                            // Seprating Date Time
                            $datetime = $pending['booker_schedule'];

                            // convert & format datetime
                            $date = date("d-m-Y", strtotime($datetime));
                            $time = date("h:i A", strtotime($datetime));

                            ?>
                            <tr>
                                <td><?php echo $pending['booker_name']; ?></td>
                                <td><?php echo $pending['booker_email']; ?></td>
                                <td><?php echo $date; ?></td>
                                <td><?php echo $time; ?></td>
                                <td><?php echo $pending['user_email']; ?></td>
                                <td>
                                    <a href="actions/complete.php?appID=<?php echo $pending['appointment_id']; ?>" 
                                    class="btn btn-success">Complete</a>

                                    <a href="actions/reject.php?appID=<?php echo $pending['appointment_id']; ?>" 
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
<?php include_once("includes/footer.php"); ?>