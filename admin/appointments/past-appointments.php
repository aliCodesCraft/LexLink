<?php
$title = " Active Appointments";

include_once("../includes/auth.php");
include_once("../includes/header.php");
include_once("../includes/config.php");

?>






<?php
// Fetching completed appointments
$getPast = "SELECT * FROM `appointments` 
INNER JOIN `users` ON appointments.booker_id = users.user_id 
WHERE (appointment_status=
'completed' OR appointment_status='rejected' OR appointment_status='cancelled')";

// Runing query
$pastResults = mysqli_query($connection, $getPast);
?>



<?php

// Messeges & icons
$message = "";
$icon = "";

// Accept appointment
if (isset($_GET['resID'])) {
    $id = intval($_GET['resID']);
    $update = "UPDATE appointments SET appointment_status='pending' WHERE appointment_id=$id";
    if (mysqli_query($connection, $update)) {
        $message = "Appointment Reschedule!";
        $icon = "success";
    }
}


// Alert + redirect back
if (!empty($message)) {
    echo '
    <div class="alert alert-' . $icon . ' alert-dismissible fade show" role="alert">
      <strong>' . $message . '</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>

<!-- Table Styling -->
<style>
    .table th,
    .table td {
        border: 1px solid #dee2e6;
    }

    /* Status colors */
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

<!-- Table container -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Past Appointments</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-warning">
            <h6 class="m-0 font-weight-bold text-light">Your Past Appointments</h6>
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
                            <th>Action</th>
                        </tr>
                    </thead>

                    <!-- Table data -->
                    <tbody>

                        <?php
                        // Loop through all past appointments fetched from the databas
                        foreach ($pastResults as $past) {

                            // Get the appointment datetime from the database for current appointment
                            $datetime = $past['booker_schedule'];

                            // Seprate and format the datetime to a readable date format
                            $date = date("d-m-Y", strtotime($datetime));
                            $time = date("h:i A", strtotime($datetime));
                        ?>

                            <!-- Table data rows -->
                            <tr>
                                <!-- Client name -->
                                <td class="status <?php echo $past['appointment_status']; ?>"><?php echo $past['booker_name']; ?></td>

                                <!-- Client email -->
                                <td class="status <?php echo $past['appointment_status']; ?>"><?php echo $past['booker_email']; ?></td>

                                <!-- Booking date & time -->
                                <td class="status <?php echo $past['appointment_status']; ?>"><?php echo $date; ?></td>
                                <td class="status <?php echo $past['appointment_status']; ?>"><?php echo $time; ?></td>


                                <!-- Appointment status -->
                                <td class="status <?php echo $past['appointment_status']; ?>"><?php echo $past['appointment_status']; ?></td>

                                <!-- Booked by -->
                                <td class="status <?php echo $past['appointment_status']; ?>"><?php echo $past['user_email']; ?></td>

                                <!-- Details button to open modal -->
                                <td style="text-align:center" class="status <?php echo $past['appointment_status']; ?>">
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $past['appointment_id']; ?>">
                                        View Details
                                    </button>
                                </td>


                                <!-- Action -->
                                <!-- Details button to open modal -->
                                <td style="text-align:center" class="status <?php echo $past['appointment_status']; ?>">
                                    <a href="past-appointments.php?resID=<?php echo $past['appointment_id']; ?>"
                                        class="btn btn-sm btn-primary swal-btn"
                                        data-action="reschedule"
                                        data-href="past-appointments.php?resID=<?php echo $past['appointment_id']; ?>">
                                        Reschedule
                                    </a>

                                </td>


                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="detailsModal<?php echo $past['appointment_id']; ?>" tabindex="-1" aria-labelledby="detailsModalLabel<?php echo $past['appointment_id']; ?>" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header btn-primary text-light">
                                            <h5 class="modal-title" id="detailsModalLabel<?php echo $past['appointment_id']; ?>">Appointment Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <p><strong>Client Name:</strong> <?php echo $past['booker_name']; ?></p>
                                            <p><strong>Client Email:</strong> <?php echo $past['booker_email']; ?></p>
                                            <p><strong>Date:</strong> <?php echo $date; ?></p>
                                            <p><strong>Time:</strong> <?php echo $time; ?></p>
                                            <p><strong>Message:</strong> <?php echo nl2br(htmlspecialchars($past['booker_message'])); ?></p>
                                            <p><strong>Address:</strong> <?php echo nl2br(htmlspecialchars($past['booker_address'])); ?></p>
                                            <p><strong>Status:</strong> <?php echo $past['appointment_status']; ?></p>
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


<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.swal-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            let action = this.dataset.action; // Accept/Reject/Complete
            let href = this.dataset.href; // original link

            Swal.fire({
                title: 'Are you sure?',
                text: `Do you really want to mark this appointment as ${action} ?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Yes, ${action} it!`
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href; // redirect if confirmed
                }
            });
        });
    });
</script>


<?php include_once("../includes/footer.php"); ?>