<?php
// Page title
$title = "Active-Appointments";

// Includes auth, header & handler
include_once("../lawyer_includes/lawyer_utils/auth.php");
include_once("../lawyer_includes/lawyer_layouts/header.php");
include_once("../lawyer_includes/lawyer_handlers/appointmentAction_handler.php");
?>

<?php
// Fetching completed appointments
$getActive = "SELECT * FROM `appointments` 
INNER JOIN `users` ON appointments.booker_id = users.user_id 
WHERE booked_lawyer = '$lawyerID' AND (appointment_status='pending' OR appointment_status='accepted') ";

// Runing query
$activeResults = mysqli_query($connection, $getActive);
?>

<!-- Table Styling -->
<style>
    .table th,
    .table td {
        border: 1px solid #dee2e6;
    }

    /* Status colors */
    .status.pending {
        background-color: #ffb84d;
        color: #663300 !important;
        font-weight: bolder;
    }

    .status.accepted {
        background-color: #90ee90;
        color: #006400;
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

<!-- Table container -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Active Appointments</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-warning">
            <h6 class="m-0 font-weight-bold text-light">Your Active Appointments</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table style="text-align:center;" class="table table-bordered table-striped" width="100%" cellspacing="0">

                    <!-- Table headers -->
                    <thead class="text-white" style="background:#0a2342;">
                        <tr>
                            <th>Client Name</th>
                            <th>Client Email</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Booked By</th>
                            <th>Details</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <!-- Table data -->
                    <tbody>

                        <?php
                        // Loop through all active appointments fetched from the database
                        foreach ($activeResults as $active) {

                            // Get the appointment datetime from the database for current appointment
                            $datetime = $active['booker_schedule'];

                            // Seprate and format the datetime to a readable date format
                            $date = date("d-m-Y", strtotime($datetime));
                            $time = date("h:i A", strtotime($datetime));
                        ?>

                            <!-- Table data rows -->
                            <tr>
                                <!-- Client name -->
                                <td class="status <?php echo $active['appointment_status']; ?>"><?php echo $active['booker_name']; ?></td>

                                <!-- Client email -->
                                <td class="status <?php echo $active['appointment_status']; ?>"><?php echo $active['booker_email']; ?></td>

                                <!-- Booking date & time -->
                                <td class="status <?php echo $active['appointment_status']; ?>"><?php echo $date; ?></td>
                                <td class="status <?php echo $active['appointment_status']; ?>"><?php echo $time; ?></td>


                                <!-- Appointment status -->
                                <td class="status <?php echo $active['appointment_status']; ?>"><?php echo $active['appointment_status']; ?></td>

                                <!-- Booked by -->
                                <td class="status <?php echo $active['appointment_status']; ?>"><?php echo $active['user_email']; ?></td>



                                <!-- Details button to open modal -->
                                <td style="text-align:center" class="status <?php echo $active['appointment_status']; ?>">
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $active['appointment_id']; ?>">
                                        View Details
                                    </button>
                                </td>

                                <!-- Action buttons -->
                                <td class="status <?php echo $active['appointment_status']; ?>">

                                    <!-- If status is pending -->
                                    <?php if ($active['appointment_status'] == 'pending') : ?>

                                        <!-- Used by SweetAlert: data-action type & data-href link -->
                                        <a href="page/active-appointments.php?acceptID=<?php echo $active['appointment_id']; ?>"
                                            class="btn btn-primary btn-sm swal-btn"

                                            data-action="Accept"
                                            data-href="page/active-appointments.php?acceptID=<?php echo $active['appointment_id']; ?>"

                                            style="background:lightgreen; color:green;">
                                            Accept
                                        </a>

                                        <!-- Used by SweetAlert: data-action type & data-href link -->
                                        <a href="page/active-appointments.php?rejectID=<?php echo $active['appointment_id']; ?>"
                                            class="btn btn-danger btn-sm swal-btn"

                                            data-action="Reject" 
                                            data-href="page/active-appointments.php?rejectID=<?php echo $active['appointment_id']; ?>"> 
                                            Reject
                                        </a>

                                    <!-- If status is accepted -->
                                    <?php elseif ($active['appointment_status'] == 'accepted') : ?>

                                        <!-- Used by SweetAlert: data-action type & data-href link -->
                                        <a href="page/active-appointments.php?completeID=<?php echo $active['appointment_id']; ?>"
                                            class="btn btn-primary btn-sm swal-btn"

                                            
                                            data-action="Complete" 
                                            data-href="page/active-appointments.php?completeID=<?php echo $active['appointment_id']; ?>"
                                            
                                            style="background:green;">
                                            <i class="fas fa-check"></i> Complete
                                        </a>
                                    <?php endif; ?>

                                </td>

                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="detailsModal<?php echo $active['appointment_id']; ?>" tabindex="-1" aria-labelledby="detailsModalLabel<?php echo $active['appointment_id']; ?>" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header btn-primary text-light">
                                            <h5 class="modal-title" id="detailsModalLabel<?php echo $active['appointment_id']; ?>">Appointment Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <p><strong>Client Name:</strong> <?php echo $active['booker_name']; ?></p>
                                            <p><strong>Client Email:</strong> <?php echo $active['booker_email']; ?></p>
                                            <p><strong>Date:</strong> <?php echo $date; ?></p>
                                            <p><strong>Time:</strong> <?php echo $time; ?></p>
                                            <p><strong>Message:</strong> <?php echo nl2br(htmlspecialchars($active['booker_message'])); ?></p>
                                            <p><strong>Address:</strong> <?php echo nl2br(htmlspecialchars($active['booker_address'])); ?></p>
                                            <p><strong>Status:</strong> <?php echo $active['appointment_status']; ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<?php
// Include footer 
include_once("../lawyer_includes/lawyer_layouts/footer.php");
?>