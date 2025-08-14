<?php include_once("includes/header.php"); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Rejected Appointments</h1>

    <!-- Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-danger">
            <h6 class="m-0 font-weight-bold text-white">Rejected Appointments</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead class="table-danger">
                        <tr>
                            <th>Client Name</th>
                            <th>Date</th>
                            <th>Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ahmed Khan</td>
                            <td>2025-08-04</td>
                            <td>Client unavailable</td>
                        </tr>
                        <tr>
                            <td>Usman Ali</td>
                            <td>2025-08-02</td>
                            <td>Case closed by lawyer</td>
                        </tr>
                        <tr>
                            <td>Jane Smith</td>
                            <td>2025-08-01</td>
                            <td>Incorrect details</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php include_once("includes/footer.php") ?>