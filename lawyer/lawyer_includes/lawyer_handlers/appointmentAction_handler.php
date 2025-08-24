<?php

// Messeges & icons
$message = "";
$icon = "";

// Accept appointment
if (isset($_GET['acceptID'])) {
    $id = intval($_GET['acceptID']);
    $update = "UPDATE appointments SET appointment_status='accepted' WHERE appointment_id=$id";
    if (mysqli_query($connection, $update)) {
        $message = "Appointment Aceepted!";
        $icon = "success";
    }
}

// Reject appointment
elseif (isset($_GET['rejectID'])) {
    $id = intval($_GET['rejectID']);
    $update = "UPDATE appointments SET appointment_status='rejected' WHERE appointment_id=$id";
    if (mysqli_query($connection, $update)) {
        $message = "Appointment has been Rejected!";
        $icon = "danger";
    }
}

// Complete appointment
elseif (isset($_GET['completeID'])) {
    $id = intval($_GET['completeID']);
    $update = "UPDATE appointments SET appointment_status='completed' WHERE appointment_id=$id";
    if (mysqli_query($connection, $update)) {
        $message = "Appointment completed!";
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
