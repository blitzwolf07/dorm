<?php include 'include/connect.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>

    <title>Pending Order | San Lucas Labline</title>
    <?php include 'layouts/head.php'; ?>
    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style type="text/css">
    table,thead,tbody,tr,td {
        vertical-align: middle;
    }
    </style>
    
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
                            <h4 class="mb-sm-0 font-size-25">Pending Order Record</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Pending Order</li>
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
                                     <h4 class="card-title">List of Pending Order</h4>
                            </div>
                            <div class="card-body">

                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Customer Name</th>
                                            <th>Item Image</th>
                                            <th>Item Name</th>
                                            <!-- <th>Item Code</th> -->
                                            <th>Pack</th>
                                            <th>QTY Order</th>
                                            <th>Status</th>
                                            <th>Contact No.</th>
                                        <?php if($role == '2') { ?>
                                            <th>Action</th>
                                        <?php } ?>
                                        </tr>
                                    </t head>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    $page = 'cart';
                                    $cart = mysqli_query($conn,"select * from tbl_cart where status = '0' || status = '2' || status = '3' || status = '4' order by status") or die (mysqli_error($conn));
                                    while($row_cart = mysqli_fetch_assoc($cart)) {
                                        $id = $row_cart['id'];

                                    $item = mysqli_query($conn,"select * from tbl_item where id = '".$row_cart['item_id']."'") or die (mysqli_error($conn));
                                    $row_item = mysqli_fetch_assoc($item);

                                    $client = mysqli_query($conn,"select * from tbl_client where id = '".$row_cart['customer_id']."'") or die (mysqli_error($conn));
                                    $row_client = mysqli_fetch_assoc($client);
                                     ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $row_client['customer_name']?></td>
                                            <td><a href="products/<?php echo $row_item['item_pic'] ?>" target="_blank"><img src="products/<?php echo $row_item['item_pic'] ?>" height="30" width="70"></a></td>
                                            <td><?php echo $row_item['item_name']?></td>
                                            <!-- <td><?php echo $row_item['item_code']?></td> -->
                                            <td><?php echo $row_item['pack']?></td>
                                            <td><?php echo $row_cart['quantity']?></td>
                                            <td>
                                            <?php if($row_cart['status'] == '0' || $row_cart['status'] == '1' || $row_cart['status'] == '2') { ?>
                                             <span class="badge bg-soft-warning text-warning ms-1  font-size-14">Pending</span>
                                           <?php }elseif($row_cart['status'] == '3') { ?>
                                           <span class="badge bg-soft-primary text-primary ms-1  font-size-14">Approved</span>
                                            <?php }else { ?>
                                            <span class="badge bg-soft-danger text-danger ms-1  font-size-14">Rejected</span>
                                            <?php } ?>
                                            </td>
                                            <td><?php echo $row_client['contact_number']?></td>
                                            <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-success waves-effect btn-label waves-light" data-bs-toggle="modal" data-bs-target="#order_status<?php echo $id ?>"><i class="bx bx-analyse label-icon"></i>Change Status</button>
                                            </div>  
                                            </td>
                                        </tr>
                                    <?php
                                    include 'order_change_status.php';
                                }
                                 ?>
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

<!-- Sweet alert -->
<?php include 'include/script.php'; ?>

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

</body>
</html>