<?php 
include 'include/connect.php';
 ?>
<?php include 'layouts/head-main.php'; ?>

<head>

    <title>Customer | San Lucas Labline</title>
    <?php include 'layouts/head.php'; ?>

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
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
                            <h4 class="mb-sm-0 font-size-25">Transaction Record</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Transaction</li>
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
                                     <div class="float-start gap-2">
                                            <button type="button" class="btn btn-primary waves-effect btn-label waves-light" data-bs-toggle="modal" data-bs-target=".customer"><i class="bx bx-plus-circle label-icon"></i>Add Transaction</button>
                                     </div>
                                        <?php include 'marketing_transactionAddModal.php'; ?>
                            </div>
                            <div class="card-body">

                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Client Name</th>
                                            <th>Invoice #</th>
                                            <th>Product</th>
                                            <th>Item</th>
                                            <th>Price</th>
                                            <th>No. of Order</th>
                                            <th>Total Price</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    $page = 'marketing_transaction';
                                    $marketing_inventory = mysqli_query($conn,"select * from tbl_marketing_transaction") or die (mysqli_error($conn)) or die (mysqli_error($conn));
                                    while($row_marketing_inventory = mysqli_fetch_assoc($marketing_inventory)) {
                                        $id = $row_marketing_inventory['id'];

                                        $client = mysqli_query($conn,"select * from tbl_client where id = '".$row_marketing_inventory['client_id']."'") or die (mysqli_error($conn));
                                        $row_client = mysqli_fetch_assoc($client);

                                        $supplier = mysqli_query($conn,"select * from tbl_supplier where id = '".$row_marketing_inventory['product_id']."'") or die (mysqli_error($conn));
                                        $row_supplier = mysqli_fetch_assoc($supplier);

                                        $item = mysqli_query($conn,"select * from tbl_item where id = '".$row_marketing_inventory['item_id']."'") or die (mysqli_error($conn));
                                        $row_item = mysqli_fetch_assoc($item);
                                     ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $row_client['customer_name'] ?></td>
                                            <td><?php echo $row_marketing_inventory['invoice_number'] ?></td>
                                            <td><?php echo $row_supplier['supplier_name'] ?></td>
                                            <td><?php echo $row_item['item_name'] ?></td>
                                            <td><?php echo "₱", $row_marketing_inventory['item_price'] ?></td>
                                            <td><?php echo $row_marketing_inventory['no_of_orders'] ?></td>
                                            <td><?php echo "₱", number_format($row_marketing_inventory['total_sale'],2  ) ?></td>
                                            <td><?php echo date("M d, Y",strtotime($row_marketing_inventory['date'])) ?></td>
                                    <?php if($role == '3') { ?>
                                            <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-success waves-effect btn-label waves-light" data-bs-toggle="modal" data-bs-target="#edit<?php echo $id ?>"><i class="bx bx-edit label-icon"></i>Edit</button>
                                            <button type="button" class="btn btn-danger waves-effect btn-label waves-light" data-bs-toggle="modal" data-bs-target="#delete<?php echo $id ?>"><i class="bx bx-trash label-icon"></i>Delete</button>   
                                        </div>
                                            </td>
                                    <?php } ?>
                                        </tr>
                                    <?php
                                    include 'deleteModal.php';
                                } ?>

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

<?php include 'include/script.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

  <script>
    $('.select2').select2(); 

    $('body').on('change', '#item_list', function(){
        var customer_id = $(this).val();

        $.ajax({
          type: "post",
          url: "getItemDetails.php",
          dataType: "json",
          data: {id:customer_id},
          success: function (data) {
           /* $('#item_price').val(data.item_price);*/
           
          }
        });
    });
  </script>   

</body>

</html>