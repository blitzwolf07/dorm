<?php
require_once('bdd.php');
include 'include/connect.php';
error_reporting(0); 
?>
<?php include 'layouts/head-main.php'; ?>

<?php
$users = mysqli_query($conn,"select * from tbl_users where id = '$user_id'");
    while ($row_users = mysqli_fetch_assoc($users)) {
        $dorm_id = $row_users['dorm_id'];
        $id_number = $row_users['id_number'];
        $full_name = $row_users['full_name'];
        $course_year = $row_users['course_year'];
        $contact_number = $row_users['contact_number'];
        $emergency_contact_no = $row_users['emergency_contact_no'];
        $home_address = $row_users['home_address'];
        $email_add = $row_users['email_add'];
        $id_picture = $row_users['id_picture'];
        $id = $row_users['id'];

        $rent = mysqli_query($conn,"select * from tbl_rent where user_id = '".$row_users['id']."'");
        $row_rent = mysqli_fetch_assoc($rent);

        $dorm = mysqli_query($conn,"select * from tbl_dorm where id = '".$row_rent['dorm_id']."'");
        $row_dorm = mysqli_fetch_assoc($dorm);
        $dorm_name = $row_dorm['dorm_name'];

        $room = mysqli_query($conn,"select * from tbl_rooms where id = '".$row_rent['room_id']."'");
        $row_room = mysqli_fetch_assoc($room);
        $room_number = $row_room['room_number'];
    }
 ?>
<head>
    <title><?php echo $language["Dashboard"]; ?> | CLSU Dormitory Management System - Admin & Dashboard </title>

    <?php include 'layouts/head.php'; ?>

    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <link href="assets/libs/@fullcalendar/daygrid/main.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/@fullcalendar/bootstrap/main.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/@fullcalendar/timegrid/main.min.css" rel="stylesheet" type="text/css" />
    <!-- FullCalendar -->
    <link href='css/fullcalendar.css' rel='stylesheet' />

        <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);

    var options = {
     title:'Daily Sales',
     legend:{position:'bottom'},
     chartArea:{width:'110%', height:'65%'}
    };
        var options = {
        hAxis: {
          title: 'Monthly Sales of Year <?php echo date('Y') ?>'
        },
        vAxis: {
          title: 'Popularity'
        },
        colors: ['#a52714', '#097138'],
        crosshair: {
          color: 'blue',
          trigger: 'selection'
        }
      };


    var chart = new google.visualization.BarChart(document.getElementById('line_chart'));

    chart.draw(data, options);
   }
  </script>

    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Profile</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Main</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <?php if($role == '1' || $role == '3') { ?>
                <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">No. of Dorm</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="2">0</span>
                                                </h4>
                                            </div>
                                            <!-- <div class="col-6">
                                                <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                            </div> -->
                                        </div>
                                        <div class="text-nowrap">
                                            <!-- <span class="badge bg-soft-success text-success">20.9k</span> -->
                                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Total of Customer</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="5">0</span>
                                                </h4>
                                            </div>
                                            <div class="col-6">
                                                <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                            </div>
                                        </div>
                                        <div class="text-nowrap">
                                            <!-- <span class="badge bg-soft-danger text-danger">29 Trades</span> -->
                                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
        
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">No. of Leave</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="2">0</span>
                                                </h4>
                                            </div>
                                            <div class="col-6">
                                                <div id="mini-chart3" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                            </div>
                                        </div>
                                        <div class="text-nowrap">
                                            <!-- <span class="badge bg-soft-success text-success">+ $2.8k</span> -->
                                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">No. of Rent</span>
                                                <h4 class="mb-3">
                                                    <span class="10">0</span>
                                                </h4>
                                            </div>
                                            <div class="col-6">
                                                <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                            </div>
                                        </div>
                                        <div class="text-nowrap">
                                            <!-- <span class="badge bg-soft-success text-success">+2.95%</span> -->
                                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->    
                        </div><!-- end row-->
                    
                        <?php } ?>
                    <?php if($role == '2') { ?>
                    <div class="row">
                    <div class="col-xl-4 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm order-2 order-sm-1">
                                        <div class="d-flex align-items-start mt-3 mt-sm-0">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xl me-5">
                                                    <img src="../student_id/<?php echo $id_picture ?>" alt="" class="img-fluid rounded-circle d-block">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                        <h2 class="font-size-30 mb-1"><?php echo $fullname ?></h2>
                                            <div class="" role="group">
                                            <button type="button" class="btn btn-info btn-md waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#edit<?php echo $id ?>">Edit</button>  
                                        <?php include 'profile_edit_modal.php'; ?>
                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto order-1 order-sm-2">
                                        <div class="d-flex align-items-start justify-content-end gap-2">
                                            <div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                    </div>
                        <div class="col-xl-8 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                <h5 class="card-title">Home Address</h5>
                                <p class="text-muted font-size-15"><?php echo $home_address  ?></p>
                                </div>
                                <div class="col-sm-6">
                                <h5 class="card-title">Dorm Name</h5>
                                <p class="text-muted font-size-15"><?php echo $dorm_name  ?></p>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                <h5 class="card-title">Room No.</h5>
                                <p class="text-muted font-size-15"><?php echo $room_number  ?></p>
                            </div>
                                 <div class="col-sm-6">
                                <h5 class="card-title">Course & Year</h5>
                                <p class="text-muted font-size-15"><?php echo $course_year  ?></p>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-sm-6">
                                <h5 class="card-title">ID No.</h5>
                                <p class="text-muted font-size-15"><?php echo $id_number  ?></p>
                            </div>
                                <div class="col-sm-6">
                                <h5 class="card-title">Contact No.</h5>
                                <p class="text-muted font-size-15"><?php echo $contact_number  ?></p>
                            </div>
                            <div class="row">
                            <div class="col-sm-6">
                                <h5 class="card-title">Emergency Contact No.</h5>
                                <p class="text-muted font-size-15"><?php echo $emergency_contact_no  ?></p>
                            </div>
                            <div class="col-sm-6">
                                <h5 class="card-title">Emergency Contact Email Address</h5>
                                <p class="text-muted font-size-15"><?php echo $email_add  ?></p>
                            </div>
                            </div>

                            </div>
                            <!-- end card body -->
    <form action="request_leave_add.php" method="post">
            <div class="modal-footer">      
                <div class="row">
                    <div class="col-xl-12">
                        <div class="btn-group btn-group-example float-end" role="group">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#leave<?php echo $id ?>">Request to Leave</button>  
                            <?php include 'leave_modal_add.php' ?>
                        </div>
                        </div>
                </div>
            </div>
    </form>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
            </div>
                    <?php } ?>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<?php include 'include/script.php'; ?>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Plugins js-->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

<!-- dashboard init -->
<script src="assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

<!-- Calendar -->
<script src="assets/libs/@fullcalendar/core/main.min.js"></script>
<script src="assets/libs/@fullcalendar/bootstrap/main.min.js"></script>
<script src="assets/libs/@fullcalendar/daygrid/main.min.js"></script>
<script src="assets/libs/@fullcalendar/timegrid/main.min.js"></script>
<script src="assets/libs/@fullcalendar/interaction/main.min.js"></script>

<!-- Calendar init -->
<!--  <script src="assets/js/pages/calendar.init.js"></script> -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <!-- FullCalendar -->
    <script src='js/moment.min.js'></script>
    <script src='js/fullcalendar.min.js'></script>
    
    <?php include 'include/script.php'; ?>

<script src="assets/js/app.js"></script>
<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>