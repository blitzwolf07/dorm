<?php 
include 'include/connect.php';
 ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Order | San Lucas Labline</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
                            <h4 class="mb-sm-0 font-size-25">Product Order</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Product_Order</li>
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
                                            <button type="button" class="btn btn-primary waves-effect btn-label waves-light" data-bs-toggle="modal" data-bs-target=".sales"><i class="bx bx-plus-circle label-icon"></i>Add Order</button>
                                        </div>
                                        <?php include 'orderAddModal.php'; ?>
                            </div>
                            <div class="card-body">
                                <table id="" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Product</th>
                                            <th>Item Code</th>
                                            <th>Item Name</th>
                                            <th>Pack</th>
                                            <th>Item Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Lot/Batch</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    $page = 'sales';
                                    $invoice_number=$_GET['invoice_number'];
                                    $sales = mysqli_query($conn,"select * from tbl_sales_order where invoice_number ='$invoice_number'") or die (mysqli_error($conn));
                                    while($row_sales = mysqli_fetch_assoc($sales)) {
                                        $item_id = $row_sales['item_id'];
                                        $id = $row_sales['id'];
                                        $item_id = $row_sales['item_id'];

                                     $product = mysqli_query($conn,"select * from tbl_item where id ='$item_id'") or die (mysqli_error($conn));
                                     $row_product = mysqli_fetch_assoc($product);

                                     $total_price = mysqli_query($conn,"SELECT sum(s.quantity_order*p.item_price) as total from tbl_sales_order s inner join tbl_item p on p.id=s.item_id where s.id ='$id' AND s.invoice_number = '$invoice_number'");
                                    $row_total = mysqli_fetch_assoc($total_price);
                                        $total = $row_total['total'];

                                    $supplier = mysqli_query($conn,"select * from tbl_supplier where id ='".$row_sales['supplier_id']."'") or die (mysqli_error($conn));
                                    $row_supplier = mysqli_fetch_assoc($supplier);
                                     ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $row_supplier['supplier_name'] ?></td>
                                            <td><?php echo $row_product['item_code']?></td>
                                            <td><?php echo $row_product['item_name'] ?></td>
                                            <td><?php echo $row_product['pack'] ?></td>
                                            <td><?php echo "₱", number_format($row_product['item_price'],2) ?></td>
                                            <td>
                                        <form action="order_update.php" method="post" enctype="multipart/form-data">

                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <input type="hidden" name="invoice_number" value="<?php echo $invoice_number ?>">
                                        <input type="number" class="form-control border-radius-0" step="1" min="1" max="" name="quantity_order" value="<?php echo $row_sales['quantity_order'] ?>" title="Qty" size="100" pattern="[0-9]*" inputmode="numeric" style="width: 70px; border-radius: 0px; height: 30px"></td>
                                        </form>
                                            <td><?php echo "₱", number_format($row_total['total'],2) ?></td>
                                            <td><?php echo $row_product['lot_no'] ?></td>
                                            <td>
                                        <div class="btn-group" role="group">
                                        <form action="order_remove.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                        <input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
                                        <input type="hidden" name="item_id" value="<?php echo $row_sales['item_id']; ?>" />
                                        <input type="hidden" name="quantity_order" value="<?php echo $row_sales['quantity_order']; ?>" />

                                         <input type="hidden" name="invoice_number" value="<?php echo $invoice_number ?>">
                                            <button type="submit" name="sales_remove" class="btn btn-danger waves-effect btn-label waves-light"><i class="bx bx-trash label-icon"></i>Remove</button>
                                        </form>  
                                        </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    <?php } ?>

                                <?php
                                $id = $_GET['invoice_number'];
                                    $total_price = mysqli_query($conn,"SELECT sum(s.quantity_order*p.item_price) as total from tbl_sales_order s inner join tbl_item p on p.id=s.item_id where invoice_number='$id'");
                                    while($row_total = mysqli_fetch_assoc($total_price)) {
                                        $total = $row_total['total'];
                                 ?>
                                <tbody>
                                <tr>
                                    <td colspan="7" style="text-align: right"><b><h5>Total Amount: </h5></b></td>
                                    <td><h5><?php echo '₱',number_format($total,2) ?></h5></td>
                                    <td></td>
                                </tr>
                                </tbody>
                         <?php } ?>
                             </table>
                                <div class="d-grid gap-2" role="group">
                                    <button type="button" name="sales_remove" class="btn btn-success waves-effect btn-label waves-light d-grid" data-bs-toggle="modal" data-bs-target=".paid<?php echo $id ?>">Paid</button>

                                    <?php include ('order_paidModal.php') ?>
                                </div>
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
<?php include 'include/script_failed.php'; ?>
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
<!-- ckeditor -->
<script src="assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<!-- init js -->
<script src="assets/js/pages/form-editor.init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $('#select2').select2();
</script>   

<script>
    $('.select2').select2(); 

    $('body').on('change', '#client_id', function(){
        var customer_id = $(this).val();

        $.ajax({
          type: "post",
          url: "getClientDetails.php",
          dataType: "json",
          data: {id:customer_id},
          success: function (data) {
            $('#customer_name').val(data.customer_name);
            $('#customer_address').val(customer_address.unit);
          }
        });
    });
  </script> 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
  </script>

</body>

</html>