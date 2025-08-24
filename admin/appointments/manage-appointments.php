<?php
include_once("../includes/header.php");
include_once("../includes/config.php");
?>

<?php
//  Geting Total Counts
$getTotal = "SELECT COUNT(*) AS total, 
            SUM(CASE WHEN appointment_status = 'pending' THEN 1 ELSE 0 END) AS pending, 
            SUM(CASE WHEN appointment_status = 'completed' THEN 1 ELSE 0 END) AS completed, 
            SUM(CASE WHEN appointment_status = 'rejected' THEN 1 ELSE 0 END) AS rejected, 
            COUNT(DISTINCT booker_id) AS clients 
        FROM appointments WHERE booked_lawyer = 2";

$result = mysqli_query($connection, $getTotal);
$data = mysqli_fetch_assoc($result);

// Assign values
$total     = $data['total'];
$pending   = $data['pending'];
$completed = $data['completed'];
$rejected  = $data['rejected'];
$clients   = $data['clients'];
?>

<?php
// Geting Recents Records Through Date-Time
$getRecents = "SELECT * FROM appointments INNER JOIN users on appointments.booker_id = users.user_id WHERE booked_lawyer = 2 ORDER BY appointments.booker_schedule DESC LIMIT 5";

$recentsResults = mysqli_query($connection, $getRecents);
?>

<style>
    .table-bordered td {
        padding: 10px;
        text-align: center;
    }

    .status.pending {
        background-color: orangered;
        color: white;
        padding: 20px;
    }

    .status.completed {
        background-color: green;
        color: white;
        padding: 20px;
    }

    .status.rejected {
        background-color: red;
        color: white;
        padding: 20px;
    }
</style>

<div class="container-fluid">
    <div class="row">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Appointments </h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Appointments</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered " style="width:100%; font-size:15px;">

                        <thead>
                            <tr>
                                <th>Case Title</th>
                                <th>Client </th>
                                <th>Lawyer</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recentsResults as $recents) { ?>
                                <?php
                                // Seprating Date Time
                                $datetime = $recents['booker_schedule'];

                                // convert & format datetime
                                $date = date("d-m-Y", strtotime($datetime));
                                $time = date("h:i A", strtotime($datetime));

                                ?>
                                <tr>
                                    <td><?php echo $recents['booker_name']; ?></td>
                                    <td><?php echo $recents['booker_email']; ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td><?php echo $time; ?></td>
                                    <td><?php echo $recents['user_email']; ?></td>
                                    <td class="status pending <?php echo $recents['appointment_status']; ?>"><?php echo $recents['appointment_status']; ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once("../includes/footer.php"); ?>