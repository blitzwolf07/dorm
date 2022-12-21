<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php
$invoice_number = $_GET['invoice_number'];

$sold_order = mysqli_query($conn,"select * from tbl_sold_order where invoice_number = '$invoice_number'") or die (mysqli_error($conn));
$sold_row = mysqli_fetch_assoc($sold_order);

$client = mysqli_query($conn,"select * from tbl_client where id = '".$sold_row['client_id']."'") or die (mysqli_error($conn));
$client_row = mysqli_fetch_assoc($client);
 ?>

<head>

    <title>Invoice Detail | San Lucas Labline</title>
    <?php include 'layouts/head.php'; ?>
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
                            <h4 class="mb-sm-0 font-size-18">Invoice Detail</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                                    <li class="breadcrumb-item active">Invoice Detail</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="invoice-title">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <div class="mb-4">
                                                <img src="company_logo/cp_logo.png" alt="" height="40"><span class="logo-txt" style="text-transform: uppercase; font-size: 30px">San Lucas Labline</span>
                                                
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="mb-4">
                                                <h4 class="float-end font-size-16">Invoice # <?php echo $invoice_number ?></h4>
                                            </div>
                                        </div>
                                    </div>


                                    <p class="mb-1">San Agustin St. Pabayo Corner, Cagayan De Oro City, Misamis Oriental</p>
                                    <p class="mb-1"><i class="mdi mdi-email align-middle mr-1"></i> slucaslabline@gmail.com | sl_labline@yahoo.com</p>
                                    <p><i class="mdi mdi-phone align-middle mr-1"></i> (+63) 917-549-1909</p>
                                </div>
                                <hr class="my-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div>
                                            <h5 class="font-size-15 mb-3">Billed To:</h5>
                                            <h5 class="font-size-14 mb-2"><?php echo $client_row['customer_name'] ?></h5>
                                            <p class="mb-1"><?php echo $client_row['customer_address'] ?></p>
                                            <p class="mb-1"><?php echo $client_row['contact_person'] ?></p>
                                            <p><?php echo $client_row['contact_number'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>
                                            <div>
                                                <h5 class="font-size-15">Order Date:</h5>
                                                <p><?php echo date("F d, Y",strtotime($sold_row['date_sold'])) ?></p>
                                            </div>

                                            <div class="mt-4">
                                                <h5 class="font-size-15">Payment Method:</h5>
                                                <p class="mb-1">Visa ending **** 4242</p>
                                                <p>richards@email.com</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-2 mt-3">
                                    <h5 class="font-size-15">Order summary</h5>
                                </div>
                                <div class="p-4 border rounded">
                                    <div class="table-responsive">
                                        <table class="table table-nowrap align-middle mb-0">
                                            <thead>
                                                <tr>
                                                    <th style="width: 70px;">No.</th>
                                                    <th>Item</th>
                                                    <th class="text-end" style="width: 120px;">Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                  <?php
                                  $i = 1;
                                    $sales = mysqli_query($conn,"select * from tbl_sales_order where invoice_number ='$invoice_number'") or die (mysqli_error($conn));
                                    while($row_sales = mysqli_fetch_assoc($sales)) {
                                        $item_id = $row_sales['item_id'];
                                        $id = $row_sales['id'];
                                        $product_id = $row_sales['item_id'];

                                     $item = mysqli_query($conn,"select * from tbl_item where id ='$item_id'") or die (mysqli_error($conn));
                                     $row_item = mysqli_fetch_assoc($item);

                                     $total_price = mysqli_query($conn,"SELECT sum(s.quantity_order*p.item_price) as total from tbl_sales_order s inner join tbl_item p on p.id=s.item_id where s.id ='$id' AND s.invoice_number = '$invoice_number'");
                                    $row_total = mysqli_fetch_assoc($total_price);

                                        $total = $row_total['total'];
                                                 ?>
                                                <tr>
                                                    <th scope="row"><?php echo $i++ ?></th>
                                                    <td>
                                                        <!-- <h5 class="font-size-15 mb-1">Minia</h5> -->
                                                        <p class="font-size-13 text-muted mb-0"><?php echo $row_item['item_name'] ?></p>
                                                    </td>
                                                    <td class="text-end"><?php echo "₱", number_format($row_item['item_price'],2) ?></td>
                                                </tr>
                                              <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-print-none mt-3">
                                    <div class="float-end">
                                      <a target="_blank" href="invoice_receipt.php?pt=cash&invoice_number=<?php echo $invoice_number ?>" class="btn btn-success waves-effect waves-light mr-1"><i class="bx bx-printer label-icon"></i> Charge Sales Invoice</a>
                                        <a target="_blank" href="invoice_receipt.php?pt=cash<?php echo $invoice_number ?>" class="btn btn-success waves-effect waves-light mr-1"><i class="bx bx-printer label-icon"></i> Proof Of Delivery</a>
                                    </div>
                                    <div class="float-start">
                                      <button class="btn btn-danger noprint" onclick="window.location.replace('order.php?id=<?php echo 'cash'?>&invoice_number=<?php echo$invoice_number ?>');"><i class="mdi mdi-arrow-left-circle label-icon"></i> Back</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
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

<script src="assets/js/app.js"></script>

</body>

</html>