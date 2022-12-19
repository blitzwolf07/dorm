<?php 
include 'include/connect.php';
date_default_timezone_set('Asia/Manila');
 ?>
<?php include 'layouts/head-main.php'; ?>

<head>

    <title>Expiry Report | San Lucas Labline</title>
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
                            <h4 class="mb-sm-0 font-size-25">Expired Item Report</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Expired_Item_Report</li>
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
                                <div class="row">
                                <div class="d-print-none col-12">
                                    <div class="float-end ">
                                        <a href="javascript:window.print()" class="btn btn-primary waves-effect btn-label waves-light"><span><i class="bx bx-printer label-icon"></i> Print</span></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="invoice-title mt-0">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <div class="mb-4">
                                                <img src="company_logo/cp_logo.png" alt="" height="24"><span class="logo-txt">SAN LUCAS LABLINE</span>
                                            </div>
                                        </div>
                                         <div class="flex-shrink-0">
                                            <div class="mb-4">
                                                <h4 class="float-end font-size-16">Item Expired</h4>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Supplier</th>
                                            <th>Item Name</th>
                                            <th>Pack</th>
                                            <th>Quantity Exp.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    $date_now = date('Y-m-d');
                                    $stockin = mysqli_query($conn,"select * from tbl_stock_in where exp_date <= '$date_now' ") or die (mysqli_error($conn));
                                    while($row_stockin = mysqli_fetch_assoc($stockin)) {
                                        $id = $row_stockin['id'];

                                    $inventory = mysqli_query($conn,"select * from tbl_inventory where id ='".$row_stockin['inventory_id']."'") or die (mysqli_error($conn));
                                    $row_inventory = mysqli_fetch_assoc($inventory);

                                    $item = mysqli_query($conn,"select * from tbl_item where id ='".$row_inventory['item_id']."'") or die (mysqli_error($conn));

                                    $row_item = mysqli_fetch_assoc($item);

                                    $supplier = mysqli_query($conn,"select * from tbl_supplier where id ='".$row_stockin['supplier_id']."'") or die (mysqli_error($conn));

                                    $row_supplier = mysqli_fetch_assoc($supplier);
                                     ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $row_supplier['supplier_name'] ?></td>
                                            <td><?php echo $row_item['item_name'] ?></td>
                                            <td><?php echo $row_item['pack'] ?></td>
                                            <td><?php echo $row_stockin['quantity'] ?></td>
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

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<script src="assets/js/app.js"></script>

 <!-- flatpickr js -->
<script src="assets/libs/flatpickr/flatpickr.min.js"></script>

<!-- init js -->
<script src="assets/js/pages/invoices-list.init.js"></script>




</body>

</html>