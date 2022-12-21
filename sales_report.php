<?php 
include 'include/connect.php';
 ?>
<?php include 'layouts/head-main.php'; ?>

<head>

    <title>Sales Report | San Lucas Labline</title>
    <?php include 'layouts/head.php'; ?>

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- flatpickr css -->
    <link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css">

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
                            <h4 class="mb-sm-0 font-size-25">Sales Reports</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Sales_Report</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <form action="sales_report.php" method="get">
                                <div class="row">
                                <div class="col-2">
                                     <div class="float-start gap-3">
                                        <span>From: </span>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="from_date" id="datepicker-range" placeholder="Select Date">
                                            <span class="input-group-text"><i class="bx bx-calendar-event"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="float-start gap-3">
                                        <span>To: </span>
                                        <div class="input-group">
                                            <input type="text" name="to_date" class="form-control" id="datepicker-range" placeholder="Select Date">
                                            <span class="input-group-text"><i class="bx bx-calendar-event"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 gap-2" style="padding-top: 22px">
                                    <div class="gap-2">
                                        <button type="submit" class="btn btn-success waves-effect btn-label waves-light"><span><i class="bx bx-search label-icon"></i> Search</span></button>
                                    </div>
                                </div>
                                <div class="col-6 gap-2" style="padding-top: 22px">
                                    <div class="float-end gap-2">
                                        <a target="_blank" href="sales_report_print.php?from_date=<?php echo $_GET['from_date'] ?>&to_date=<?php echo $_GET['to_date'] ?>" class="btn btn-primary waves-effect btn-label waves-light"><span><i class="bx bx-printer label-icon"></i> Print</span></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                            </div>
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Client Name</th>
                                            <th>Product Name</th>
                                            <th>Item Name</th>
                                            <th>Item Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Date Sold</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    $page = 'row_sold_order';
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];
                                    $sold_order = mysqli_query($conn,"select * from tbl_sold_order where date_sold between '$from_date' and '$to_date'") or die (mysqli_error($conn));
                                    while($row_sold_order = mysqli_fetch_assoc($sold_order)) {
                                        $id = $row_sold_order['id'];

                                    $sales_order = mysqli_query($conn,"select * from tbl_sales_order where invoice_number ='".$row_sold_order['invoice_number']."'") or die (mysqli_error($conn));
                                    $row_sales_order = mysqli_fetch_assoc($sales_order);

                                    $item = mysqli_query($conn,"select * from tbl_item where id ='".$row_sales_order['item_id']."'") or die (mysqli_error($conn));
                                    $row_item = mysqli_fetch_assoc($item);

                                    $client = mysqli_query($conn,"select * from tbl_client where id ='".$row_sold_order['customer_id']."'") or die (mysqli_error($conn));
                                    $row_client = mysqli_fetch_assoc($client);

                                    $invoice_number = $row_sales_order['invoice_number'];
                                    $total_price = mysqli_query($conn,"SELECT sum(s.quantity_sold*p.item_price) as total from tbl_sales_order s inner join tbl_item p on p.id=s.item_id where invoice_number='$invoice_number'");
                                    $row_total = mysqli_fetch_assoc($total_price);
                                    $total = $row_total['total'];
                                    
                                    $supplier = mysqli_query($conn,"select * from tbl_supplier where id ='".$row_sales_order['supplier_id']."'") or die (mysqli_error($conn));
                                    $row_supplier = mysqli_fetch_assoc($supplier);
                                     ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $row_client['customer_name'] ?></td>
                                            <td><?php echo $row_supplier['supplier_name'] ?></td>
                                            <td><?php echo $row_item['item_name'] ?></td>
                                            <td><?php echo "₱",number_format($row_item['item_price'],2) ?></td>
                                            <td><?php echo $row_sales_order['quantity_sold'] ?></td>
                                            <td><?php echo "₱",number_format($total,2); ?></td>
                                            <td><?php echo date("M d, Y",strtotime($row_sold_order['date_sold'])) ?></td>
                                        </tr>
                                    <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
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

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<script src="assets/js/app.js"></script>

<script src="assets/js/pages/form-validation.init.js"></script>


<!-- Sweet Alerts js -->
<script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
<script src="assets/js/pages/sweetalert.init.js"></script>

 <!-- flatpickr js -->
<script src="assets/libs/flatpickr/flatpickr.min.js"></script>

<!-- init js -->
<script src="assets/js/pages/invoices-list.init.js"></script>


<!-- choices js -->
<script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

<!-- color picker js -->
<script src="assets/libs/@simonwep/pickr/pickr.min.js"></script>
<script src="assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>


</body>

</html>