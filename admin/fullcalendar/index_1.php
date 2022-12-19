<?php
require_once('bdd.php');
include 'include/connect.php';
$sql = "SELECT * FROM tbl_event ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();
$date_now = date('Y-m-d');
//index.php
$connect = mysqli_connect("localhost", "root", "", "db_sll");
$query = '
SELECT *,
UNIX_TIMESTAMP(CONCAT_WS(" ", date, date)) AS datetime
FROM tbl_marketing_transaction
ORDER BY date DESC, date DESC
';
$result = mysqli_query($connect, $query);
$rows = array();
$table = array();
$table['cols'] = array(
 array(
  'label' => 'Date Time', 
  'type' => 'date'
 ),
 array(
  'label' => 'NMMC', 
  'type' => 'number'
 ),
  array(
  'label' => 'Maria Reyna', 
  'type' => 'number'
 ),

);

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $datetime = explode(".", $row["datetime"]);
 $sub_array[] =  array(
      "v" => 'Date(' . $datetime[0] . '000)'
     );
 $sub_array[] =  array(

      "v" => $row["total_sale"]
     );

 $rows[] =  array(
     "c" => $sub_array
    );
}
$table['rows'] = $rows;
$jsonTable = json_encode($table);

?>

<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["Dashboard"]; ?> | San Lucas Labline - Admin & Dashboard </title>

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
     chartArea:{width:'100%', height:'65%'}
    };
        var options = {
        hAxis: {
          title: 'Sales'
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
                            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

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
                <?php if($role != '3') { ?>
                <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">No. of Item</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="
                                                <?php
                                                $item = mysqli_query($conn,"select * from tbl_item") or die (mysqli_error($conn));
                                                $row = mysqli_num_rows($item);
                                                echo $row;
                                                 ?>
                                                    ">0</span>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Total of Stocks</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php
                                                $product = mysqli_query($conn,"select sum(quantity) as  quantity_stock from tbl_stock_in") or die (mysqli_error($conn));
                                                while($row = mysqli_fetch_assoc($product)) {
                                                echo $row['quantity_stock'];
                                               }  ?>">0</span>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">No. of Customers</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php
                                                $product = mysqli_query($conn,"select * from tbl_client") or die (mysqli_error($conn));
                                                $row = mysqli_num_rows($product);
                                                echo $row;
                                                 ?>">0</span>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">No. of Suppliers</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target=" <?php
                                                $product = mysqli_query($conn,"select * from tbl_supplier") or die (mysqli_error($conn));
                                                $row = mysqli_num_rows($product);
                                                echo $row;
                                                 ?>">0</span>
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
                    <?php if($role == '3') { ?>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">No. of Item</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="
                                                <?php
                                                $item = mysqli_query($conn,"select * from tbl_item") or die (mysqli_error($conn));
                                                $row = mysqli_num_rows($item);
                                                echo $row;
                                                 ?>
                                                    ">0</span>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Sold Items</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php
                                                $product = mysqli_query($conn,"select sum(quantity) as  quantity_stock from tbl_stock_in") or die (mysqli_error($conn));
                                                while($row = mysqli_fetch_assoc($product)) {
                                                echo $row['quantity_stock'];
                                               }  ?>">0</span>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Profit</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php
                                                $product = mysqli_query($conn,"select * from tbl_client") or die (mysqli_error($conn));
                                                $row = mysqli_num_rows($product);
                                                echo $row;
                                                 ?>">0</span>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">No. of Suppliers</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target=" <?php
                                                $product = mysqli_query($conn,"select * from tbl_supplier") or die (mysqli_error($conn));
                                                $row = mysqli_num_rows($product);
                                                echo $row;
                                                 ?>">0</span>
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
            <?php if($role == '3') { ?>
                <div class="row">
                        <!-- Chart -->
                        <div class="col">
                                <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                 <div class="page-wrapper">
                                <h4 align="center">Daily Sales Chart</h4>
                                <div id="line_chart" style="width: 120%; height: 500px"></div>
                                </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                        </div>
                        </div>
                        <!-- Chart -->
                    </div>
                     <div class="row">
                        <!-- Chart -->
                        <div class="col">
                                <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                 <div class="page-wrapper">
                                <h4 align="center">Daily Sales Chart</h4>
                                <div id="bar_chart" style="width: 120%; height: 500px"></div>
                                </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                        </div>
                        </div>
                        <!-- Chart -->
                    </div>
                <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Calendar Event</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-grid">
                                                   <button class="btn font-16 btn-primary" id="btn-new-event"><i class="mdi mdi-plus-circle-outline"></i> Create
                                                        New Event</button>
                                                </div>
                                                
                                                <div id="external-events" class="mt-2">
                                                    <br>
                                                    <p class="text-muted">Drag and drop your event or click in the calendar</p>
                                                    <div class="external-event fc-event text-success bg-soft-success" data-class="bg-success">
                                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>New Event Planning
                                                    </div>
                                                    <div class="external-event fc-event text-info bg-soft-info" data-class="bg-info">
                                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Meeting
                                                    </div>
                                                    <div class="external-event fc-event text-warning bg-soft-warning" data-class="bg-warning">
                                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Generating Reports
                                                    </div>
                                                    <div class="external-event fc-event text-danger bg-soft-danger" data-class="bg-danger">
                                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Create New theme
                                                    </div>
                                                    <div class="external-event fc-event text-dark bg-soft-dark" data-class="bg-dark">
                                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Team Meeting
                                                    </div>
                                                </div>

                                                <div class="row justify-content-center mt-5">
                                                    <div class="col-lg-12 col-sm-6">
                                                        <img src="assets/images/undraw-calendar.svg" alt="" class="img-fluid d-block">
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div> <!-- end col-->

                                    <div class="col-xl-9 col-lg-8">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="calendar"></div>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->

                                </div> 

                                <div style='clear:both'></div>
                                <!-- Add New Event MODAL -->
                                <div class="modal fade" id="ModalAdd" tabindex="-1">
                                    <form id="form-event" action="addEvent.php" method="POST" class="needs-validation" novalidate>
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header py-3 px-4 border-bottom-0">
                                                <h5 class="modal_title" id="modal-title">Add Event</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                            </div>
                                            <div class="modal-body p-4">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                            <label class="form-label">Event Title</label>
                                                                <input class="form-control" placeholder="Enter Event Name"
                                                                    type="text" name="title" id="title" />
                                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                         <label class="form-label">Event Description</label>
                                                                <input class="form-control" placeholder="Enter Event Description"
                                                                    type="text" name="description" id="description"  />
                                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                         <label class="form-label">Start</label>
                                                                <input class="form-control" placeholder="Insert Event Name"
                                                                    type="text" name="start" id="start" required value="" />
                                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                         <label class="form-label">End</label>
                                                                <input class="form-control" placeholder="Insert Event Name"
                                                                    type="text" name="end" id="end" required value="" />
                                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                               <label class="form-label">Color</label>
                                                               <select class="form-control form-select" name="color" id="color" required="">
                          <option value="">Choose</option>
                          <option style="color:#6666ff;" value="#6666ff">&#9724; Blue</option>
                          <option style="color:#00b33c;" value="#00b33c">&#9724; Green</option> 
                          <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                          <option style="color:#FF3232;" value="#FF3232">&#9724; Red</option>
                          <option style="color:#000;" value="#000">&#9724; Black</option>
                                                                </select>
                                                                <div class="invalid-feedback">Please select a valid event category</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-6">
                                                            <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                                        </div>
                                                        <div class="col-6 text-end">
                                                            <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div> <!-- end modal-content-->
                                    </div> <!-- end modal dialog-->
                                </form>
                                </div>
                                <!-- end modal-->
                                <?php if($role == '1') { ?>
                                <div class="modal fade" id="ModalEdit" tabindex="-1">
                                    <form id="form-event" action="editEventTitle.php" method="POST" class="needs-validation" novalidate>
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header py-3 px-4 border-bottom-0">
                                                <h5 class="modal_title" id="modal-title">Edit Event</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                            </div>
                                            <div class="modal-body p-4">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                            <label class="form-label">Event Title</label>
                                                                <input class="form-control" placeholder="Insert Event Name"
                                                                    type="text" name="title" id="title" />
                                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                         <label class="form-label">Event Description</label>
                                                                <input class="form-control" placeholder="Insert Event Name"
                                                                    type="text" name="description" id="description" />
                                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                                            </div>
                                                        </div>
                                                       
                                        <div class="col-12">
                                            <div class="mb-3">
                                                 <label class="form-label">Color</label>
                                        <select class="form-control" name="color" id="color">
                          <option value="">Choose</option>
                          <option style="color:#6666ff;" value="#6666ff">&#9724; Blue</option>
                          <option style="color:#00b33c;" value="#00b33c">&#9724; Green</option> 
                          <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                          <option style="color:#FF3232;" value="#FF3232">&#9724; Red</option>
                          <option style="color:#000;" value="#000">&#9724; Black</option>
                                        </select>
                                                                <div class="invalid-feedback">Please select a valid event category</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <input type="hidden" name="id" class="form-control" id="id">
                                                    <div class="row mt-2">
                                                        <div class="col-6">
                                                            <button type="submit" class="btn btn-danger" id="btn-delete-event" name="delete">Delete</button>
                                                        </div>

                                                        <div class="col-6 text-end">
                                                            <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div> <!-- end modal-content-->
                                    </div> <!-- end modal dialog-->
                                </form>
                                </div>
                            <?php } ?>
                            <?php if($role == '2') { ?>
                                <div class="modal fade" id="ModalEdit" tabindex="-1">
                                    <form id="form-event" action="editEventTitle.php" method="POST" class="needs-validation" novalidate>
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header py-3 px-4 border-bottom-0">
                                                <h5 class="modal_title" id="modal-title">Edit Event</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                            </div>
                                            <div class="modal-body p-4">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                            <label class="form-label">Event Title</label>
                                                                <input class="form-control" placeholder="Insert Event Name"
                                                                    type="text" name="title" id="title" />
                                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                         <label class="form-label">Event Description</label>
                                                                <input class="form-control" placeholder="Insert Event Name"
                                                                    type="text" name="description" id="description" />
                                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                                            </div>
                                                        </div>
                                                       
                                        <div class="col-12">
                                            <div class="mb-3">
                                                 <label class="form-label">Color</label>
                                        <select class="form-control" name="color" id="color">
                          <option value="">Choose</option>
                          <option style="color:#6666ff;" value="#6666ff">&#9724; Blue</option>
                          <option style="color:#00b33c;" value="#00b33c">&#9724; Green</option> 
                          <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                          <option style="color:#FF3232;" value="#FF3232">&#9724; Red</option>
                          <option style="color:#000;" value="#000">&#9724; Black</option>
                                        </select>
                                                                <div class="invalid-feedback">Please select a valid event category</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <input type="hidden" name="id" class="form-control" id="id">
                                                    <div class="row mt-2">
                                                        <div class="col-6">
                                                            <button type="submit" class="btn btn-danger" id="btn-delete-event" name="delete">Delete</button>
                                                        </div>

                                                        <div class="col-6 text-end">
                                                            <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div> <!-- end modal-content-->
                                    </div> <!-- end modal dialog-->
                                </form>
                                </div>
                            <?php } ?>
                            </div>
                        </div> 
                        <!-- calendar -->
                       <?php } ?>
                       <?php if($role == '2' || $role == '3' || $role == '4' || $role == '5' || $role == '6') { ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Calendar Event</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-8">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="calendar"></div>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->

                                </div> 

                                <div style='clear:both'></div>
                        <?php if($role == '1') { ?>
                                <!-- Add New Event MODAL -->
                                <div class="modal fade" id="ModalAdd" tabindex="-1">
                                    <form id="form-event" action="addEvent.php" method="POST" class="needs-validation" novalidate>
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header py-3 px-4 border-bottom-0">
                                                <h5 class="modal_title" id="modal-title">Add Event</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                            </div>
                                            <div class="modal-body p-4">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                            <label class="form-label">Event Title</label>
                                                                <input class="form-control" placeholder="Enter Event Name"
                                                                    type="text" name="title" id="title" required value="" />
                                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                         <label class="form-label">Event Description</label>
                                                                <input class="form-control" placeholder="Enter Event Description"
                                                                    type="text" name="description" id="description" />
                                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                         <label class="form-label">Start</label>
                                                                <input class="form-control" placeholder="Insert Event Start "
                                                                    type="text" name="start" id="start" required value="" />
                                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                         <label class="form-label">End</label>
                                                                <input class="form-control" placeholder="Insert Event End"
                                                                    type="text" name="end" id="end" required value="" />
                                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                               <label class="form-label">Color</label>
                                                               <select class="form-control form-select" name="color" id="color" required="">
                          <option value="">Choose</option>
                          <option style="color:#6666ff;" value="#6666ff">&#9724; Blue</option>
                          <option style="color:#00b33c;" value="#00b33c">&#9724; Green</option> 
                          <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                          <option style="color:#FF3232;" value="#FF3232">&#9724; Red</option>
                          <option style="color:#000;" value="#000">&#9724; Black</option>
                                                                </select>
                                                                <div class="invalid-feedback">Please select a valid event category</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-6">
                                                            <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                                        </div>
                                                        <div class="col-6 text-end">
                                                            <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div> <!-- end modal-content-->
                                    </div> <!-- end modal dialog-->
                                </form>
                            </div>
                                <!-- end modal-->
                            <?php } ?>
                            <?php if($role != '1') { ?>
                                <div class="modal fade" id="ModalEdit" tabindex="-1">
                                    <form id="form-event" action="editEventTitle.php" method="POST" class="needs-validation" novalidate>
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header py-3 px-4 border-bottom-0">
                                                <h5 class="modal_title" id="modal-title">View Event</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                            </div>
                                            <div class="modal-body p-4">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                            <label class="form-label">Event Title</label>
                                                                <input class="form-control" placeholder="Insert Event Name"
                                                                    type="text" name="title" id="title" disabled="" value="" />
                                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                         <label class="form-label">Event Description</label>
                                                                <textarea class="form-control" placeholder="Insert Event Name"
                                                                    type="text" name="description" id="description" disabled=""/> </textarea>
                                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <input type="hidden" name="id" class="form-control" id="id">
                                                
                                                    <div class="row mt-2">
                                                        <div class="col-12 text-end">
                                                            <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Okay</button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div> <!-- end modal-content-->
                                    </div> <!-- end modal dialog-->
                                </form>
                                </div>
                            <?php } ?>
                            </div>
                        </div> 
                        <!-- calendar -->
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

    <script>
    $(document).ready(function() {
         var that = this;
    if(!this.todayDate) {
        this.todayDate = new Date();
    }
        $('#calendar').fullCalendar({
            header: {
                left: 'today',
                center: 'prev title next',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: that.todayDate,
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            select: function(start, end) {
                
                $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD'));
                $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD'));
                $('#ModalAdd').modal('show');
            },
            eventRender: function(event, element) {
                element.bind('dblclick', function() {
                    $('#ModalEdit #id').val(event.id);
                    $('#ModalEdit #title').val(event.title);
                    $('#ModalEdit #description').val(event.description);
                    $('#ModalEdit #color').val(event.color);
                    $('#ModalEdit').modal('show');
                });
            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position
                edit(event);
            },
            eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

                edit(event);

            },
            events: [
            <?php foreach($events as $event): 
            
                $start = explode(" ", $event['start']);
                $end = explode(" ", $event['end']);
                if($start[1] == '00:00:00'){
                    $start = $start[0];
                }else{
                    $start = $event['start'];
                }
                if($end[1] == '00:00:00'){
                    $end = $end[0];
                }else{
                    $end = $event['end'];
                }
            ?>
                {
                    id: '<?php echo $event['id']; ?>',
                    title: '<?php echo $event['title']; ?>',
                    description: '<?php echo $event['description']; ?>',
                    start: '<?php echo $start; ?>',
                    end: '<?php echo $end; ?>',
                    color: '<?php echo $event['color']; ?>',
                },
            <?php endforeach; ?>
            ]
        });
<?php if($role == '1') { ?>
        function edit(event){
            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end){
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else{
                end = start;
            }
            
            id =  event.id;
            
            Event = [];
            Event[0] = id;
            Event[1] = start;
            Event[2] = end;
            
            $.ajax({
             url: 'editEventDate.php',
             type: "POST",
             data: {Event:Event},
             success: function(rep) {
                    if(rep == 'OK'){
                        alert('Saved');
                    }else{
                        alert('Date Changed Successfully'); 
                    }
                }
            });
        }
    <?php }elseif($role != '1') { ?>
        function edit(event){
            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end){
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else{
                end = start;
            }
            
            id =  event.id;
            
            Event = [];
            Event[0] = id;
            Event[1] = start;
            Event[2] = end;
            
            $.ajax({
             url: 'editEventDate.php',
             type: "POST",
             data: {Event:Event},
             success: function(rep) {
                    if(rep == 'OK'){
                        alert('Saved');
                    }else{
                        alert('Date Changed Successfully'); 
                    }
                }
            });
        }
    <?php } ?>
    });

</script>
<script src="assets/js/app.js"></script>
<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>