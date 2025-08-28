<?php
include_once("includes/header.php");
include_once("includes/config.php");
?>

<?php
//  Geting Total Counts
$getTotal = "SELECT 
            COUNT(*) AS total,
            COALESCE(SUM(CASE WHEN appointment_status = 'pending' THEN 1 ELSE 0 END), 0) AS pending, 
            COALESCE(SUM(CASE WHEN appointment_status = 'completed' THEN 1 ELSE 0 END), 0) AS completed, 
            COALESCE(SUM(CASE WHEN appointment_status = 'rejected' THEN 1 ELSE 0 END), 0) AS rejected, 
            COALESCE(COUNT(DISTINCT booker_id), 0) AS clients 
        FROM appointments";

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
$getRecents = "SELECT * FROM appointments
 INNER JOIN users on appointments.booker_id = users.user_id 
 ORDER BY appointments.booker_schedule DESC LIMIT 5";

$recentsResults = mysqli_query($connection, $getRecents);
?>




<!-- Styling recents table -->
<style>
    .table th,
    .table td {
        border: 1px solid #dee2e6;
    }

    /* Status colors */
    .status.pending {
        background-color: #ffb84d !important;
        color: #663300 !important;
        font-weight: bolder;
    }

    .status.accepted {
        background-color: #90ee90 !important;
        color: #006400 !important;
        font-weight: bolder;
    }

    .status.rejected {
        background-color: #ffb3b3;
        color: #800000 !important;
        font-weight: bolder;
    }

    .status.cancelled {
        background-color: #ff6c6c;
        color: #660000 !important;
        font-weight: bolder;
    }

    .status.completed {
        background-color: #90ee90;
        color: #006400 !important;
        font-weight: bolder;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.8rem;
        font-weight: bold;
    }

    .status {
        padding: 0.25rem 0.5rem;
        font-weight: bolder;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 200px;
    }

    .table td,
    .table th {
        padding: 0.25rem 0.5rem;
        vertical-align: middle;
    }

    .modal-header .btn-close {
        filter: invert(1);
    }
</style>

<!-- Begin page content -->
<div class="container-fluid">

    <!-- Page heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Lawyer Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <!-- Top row - stats cards -->
    <div class="row">
        <!-- Total appointments -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total
                        Appointments</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?></div>
                </div>
            </div>
        </div>

        <!-- Pending appointments -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 text-white">Pending
                        Appointments</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pending; ?></div>
                </div>
            </div>
        </div>

        <!-- Completed appointments -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-white">Completed
                        Appointments</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $completed; ?></div>
                </div>
            </div>
        </div>

        <!-- Total clients -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Clients
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main row -->
    <div class="row">

        <!-- Recents appointments table -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Appointments</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="text-align:center;" class="table table-bordered table-striped" width="100%" cellspacing="0">
                            <thead class="text-white" style="background:#0a2342;">
                                <tr>
                                    <th>Client Name</th>
                                    <th>Client Email</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($recentsResults as $recents) { ?>
                                    <?php
                                    // Seprating date-time
                                    $datetime = $recents['booker_schedule'];

                                    // convert & format date-time
                                    $date = date("d-m-Y", strtotime($datetime));
                                    $time = date("h:i A", strtotime($datetime));

                                    ?>
                                    <tr>
                                        <td class="status <?php echo $recents['appointment_status']; ?>"><?php echo $recents['booker_name']; ?></td>
                                        <td class="status <?php echo $recents['appointment_status']; ?>"><?php echo $recents['booker_email']; ?></td>
                                        <td class="status <?php echo $recents['appointment_status']; ?>"><?php echo $date; ?></td>
                                        <td class="status <?php echo $recents['appointment_status']; ?>"><?php echo $time; ?></td>
                                        <td class="status <?php echo $recents['appointment_status']; ?>"><?php echo $recents['appointment_status'] ?></td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status summary -->
        <div class="col-lg-4 mb-4">
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
        </div>
    </div>
</div>
</div>


<?php include_once("includes/footer.php") ?>