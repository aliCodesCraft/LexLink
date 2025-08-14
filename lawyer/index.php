<?php include_once("includes/header.php")?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Lawyer Dashboard</h1>
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
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total
                                        Appointments</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">45</div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Appointments -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 text-white">Pending
                                        Appointments</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                                </div>
                            </div>
                        </div>

                        <!-- Completed Appointments -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-white">Completed
                                        Appointments</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Clients -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Clients
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
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
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Client Name</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Ali Khan</td>
                                                    <td>2025-08-05</td>
                                                    <td>3:00 PM</td>
                                                    <td><span class="badge bg-success text-light">Completed</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Fatima Ahmed</td>
                                                    <td>2025-08-06</td>
                                                    <td>11:00 AM</td>
                                                    <td><span class="badge bg-warning text-light">Pending</span></td>
                                                </tr>
                                                <tr>
                                                    <td>John Doe</td>
                                                    <td>2025-08-07</td>
                                                    <td>2:00 PM</td>
                                                    <td><span class="badge bg-danger text-light ">Cancelled</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status Summary -->
                        <div class="col-lg-4 mb-4">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Status Summary</h6>
                                </div>
                                <div class="card-body">
                                    <p><strong>Completed:</strong> 30</p>
                                    <p><strong>Pending:</strong> 12</p>
                                    <p><strong>Cancelled:</strong> 3</p>
                                    <hr>
                                    <small class="text-muted">Updated: Today</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.container-fluid -->

            </div>


<?php include_once("includes/footer.php")?>