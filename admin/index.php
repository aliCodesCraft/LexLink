<?php
include_once("includes/header.php");
include_once("includes/config.php");
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

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <!-- Top Row - Stats Cards -->
    <div class="row">
        <!-- Total Appointments -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registered Users</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?></div>
                </div>
            </div>
        </div>

        <!-- Pending Appointments -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 text-white">Active Lawyers</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pending; ?></div>
                </div>
            </div>
        </div>

        <!-- Completed Appointments -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-white">Upcoming
                        Appointments</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $completed; ?></div>
                </div>
            </div>
        </div>

        <!-- Total Clients -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending Requests
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Row -->
    <div class="row">

        <!-- Recent Appointments Table -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Appointments</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="width:100%; font-size:15px;">

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
                                        <td class="status <?php echo $recents['appointment_status']; ?>"><?php echo $recents['appointment_status']; ?></td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Summary -->
        <!-- <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Status Summary</h6>
                </div>
                <div class="card-body">
                    <p><strong>Completed:</strong> <?php echo $completed; ?></p>
                    <p><strong>Pending:</strong> <?php echo $pending; ?></p>
                    <p><strong>Rejected:</strong> <?php echo $rejected; ?></p>
                    <hr>
                    <small class="text-muted">Updated: Today</small>
                </div>
            </div>
        </div> -->
    </div>
</div>

<!-- /.container-fluid -->

</div>


<?php include_once("includes/footer.php") ?>