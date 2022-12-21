<?php 
include 'include/connect.php';
$invoice_number = $_GET['invoice_number'];

$order = mysqli_query($conn,"select * from tbl_sold_order where invoice_number = '$invoice_number'") or die (mysqli_error($conn));
    while($row_order=mysqli_fetch_assoc($order)) {
        $date_sold = $row_order['date_sold'];
        $percent_discount = $row_order['percent_discount'];
        $discounted_amount = $row_order['discounted_amount'];
        $total_discounted_amount = $row_order['total_discounted_amount'];
        $less_vat = $row_order['less_vat'];
        $amount_net_vat = $row_order['amount_net_vat'];

    $client = mysqli_query($conn,"select * from tbl_client where id = '".$row_order['client_id']."' ") or die (mysqli_error($conn));
    $row_client = mysqli_fetch_assoc ($client);

    $user = mysqli_query($conn,"select * from tbl_users where id = '".$row_order['user_id']."'") or die (mysqli_error($conn));
    $row_user= mysqli_fetch_assoc($user);
}
    $Amount = $total_discounted_amount;
    $main = $Amount;
    $No_0 = floor($Amount);
    $Cents = round($Amount - $No_0, 2) * 100;
    $No_1 = strlen($No_0);
    $No = 0;
$Array = array();

    $Value = array('ZERO','HUNDRED','THOUSAND','MILLION','BILLION');

    $Trans = array('','ONE','TWO','THREE','FOUR','FIVE','SIX','SEVEN','EIGHT','NINE','TEN',
                          'ELEVEN','TWELVE','THIRTEEN','FOURTEEN','FIFTEEN','SIXTEEN','SEVENTEEN','EIGHTEEN','NINETEEN','TWENTY',
        'TWENTY ONE',     'TWENTY TWO',       'TWENTY THREE',     'TWENTY FOUR',      'TWENTY FIVE',  'TWENTY SIX',       'TWENTY SEVEN',     'TWENTY EIGHT',     'TWENTY NINE',      'THIRTY',
        'THIRTY ONE',       'THIRTY TWO',       'THIRTY THREE',     'THIRTY FOUR',      'THIRTY FIVE',  'THIRTY SIX',       'THIRTY SEVEN',     'THIRTY EIGHT',     'THIRTY NINE',      'FORTY',
        'FORTY ONE',        'FORTY TWO',        'FORTY THREE',      'FORTY FOUR',       'FORTY FIVE',   
        'FORTY SIX',        'FORTY SEVEN',      'FORTY EIGHT',      'FORTY NINE',       'FIFTY',
        'FIFTY ONE',        'FIFTY TWO',        'FIFTY THREE',      'FIFTY FOUR',       'FIFTY FIVE',   'FIFTY SIX',        'FIFTY SEVEN',      'FIFTY EIGHT',      'FIFTY NINE',       'SIXTY',
        'SIXTY ONE',        'SIXTY TWO',        'SIXTY THREE',      'SIXTY FOUR',       'SIXTY FIVE',   'SIXTY SIX',        'SIXTY SEVEN',      'SIXTY EIGHT',      'SIXTY NINE',       'SEVENTY',
        'SEVENTY ONE',      'SEVENTY TWO',      'SEVENTY THREE',    'SEVENTY FOUR',     'SEVENTY FIVE', 'SEVENTY SIX',      'SEVENTY SEVEN',    'SEVENTY EIGHT',    'SEVENTY NINE',     'EITHY',
        'EITHY ONE',       'EITHY TWO',       'EITHY THREE',     'EITHY FOUR',      'EITHY FIVE',  'EITHY SIX',       'EITHY SEVEN',     'EITHY EIGHT',     'EITHY NINE',      'NINETY',
        'NINETY ONE',       'NINETY TWO',       'NINETY THREE',     'NINETY FOUR',      'NINETY FIVE',  'NINETY SIX',       'NINETY SEVEN',     'NINETY EIGHT',     'NINETY NINE'
    );

while($No < $No_1){
    $No_1 = ($No == 2) ? 10 : 100;
    $No_2 = floor($No_0 % $No_1);
    $No_0 = floor($No_0 / $No_1);
    $No +=  ($No_1 == 10) ? : 2;
    if($No_2) {
    $No_3 = (($Count = count($Array)) && $No_2 > 9) ? '' : null;
    $No_4 = ($Count == 1 &&  $Array[0]) ? '' : null;
    $Array [] = ($No_2 < 21) ? $Trans[$No_2].
    ' '.$Value[$Count].$No_3.
    ' '.$No_4 : $Trans[floor($No_2 / 10) * 10].
    ' '.$Trans[$No_2 % 10].
    ' '.$Value[$Count].$No_3.
    ' '.$No_4;
}   else $Array[] = null;
}
    $Peso = array_reverse($Array);
    $Peso = implode('', $Peso);
    $Cents = $Trans[$Cents];
 ?>

<head>
    <title>Stockin Report | San Lucas Labline</title>
    <?php include 'layouts/head.php'; ?>

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <?php include 'layouts/head-style.php'; ?>

<style type="text/css">
    p,h1,h2,h4,h5,th,td {
        color:  black;
    }
    h3 {
        color: black;
    }
</style>
</head>
  <title>SALES | REPORT</title>
 <!DOCTYPE html>
 <html>
   <body onload="print()">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="invoice-title">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <div class="mt-5">
                                                <br/>
                                                    <br/>
                                                        <br/>
                                                    <div class="row">
                                            <div class="col-lg-12">
                                                <span style="font-size: 15px; padding: 0px; margin: 0px; font-weight: bold"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $row_client['customer_name'] ?></span>
                                                <span style="font-size: 15px; padding: 0px; margin: 0px; font-weight: bold"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo  date("F d, Y",strtotime($date_sold)) ?></span>
                                                <br>
                                                    <span style="font-size: 15px; padding: 0px; margin: 0px;  font-weight: bold"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <?php echo $row_client['customer_address'] ?></span>
                                                <br>

                                                    <span style="font-size: 15px; padding: 0px; margin: 0px; font-weight: bold"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <?php echo $row_client['tin'] ?></span>
                                                    <br>
                                                    <span style="font-size: 15px; padding: 0px; margin: 0px; font-weight: bold"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $row_user['code_name'] ?>
                                                </span>
                                                 </div>
                                             </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <p class="mb-1">1874 County Line Road City, FL 33566</p>
                                    <p class="mb-1"><i class="mdi mdi-email align-middle mr-1"></i> abc@123.com</p>
                                    <p><i class="mdi mdi-phone align-middle mr-1"></i> 012-345-6789</p> -->
                                </div>

                        <div class="card mt-0" style="border: 0px solid white">
                                        <table class="table table-nowrap align-middle mb-0" style="border: 0px solid white">
                                            <tbody>
                                            <?php 
                                            $i = 1;
                                            $invoice_number = $_GET['invoice_number'];
                                            $order = mysqli_query($conn,"select * from tbl_sales_order where invoice_number = '$invoice_number'") or die (mysqli_error($conn));
                                            while($row_order=mysqli_fetch_assoc($order)) {

                                            $sold = mysqli_query($conn,"select * from tbl_sold_order where invoice_number = '".$row_order['invoice_number']."'") or die (mysqli_error($conn));
                                            $row_sold = mysqli_fetch_assoc($sold);

                                            $item = mysqli_query($conn,"select * from tbl_item where id = '".$row_order['item_id']."'") or die (mysqli_error($conn));
                                            $row_item = mysqli_fetch_assoc($item);

                                            $inventory = mysqli_query($conn,"select * from tbl_inventory where item_id = '".$row_item['id']."'") or die (mysqli_error($conn));
                                            $row_inventory = mysqli_fetch_assoc($inventory);

                                          $amount = $row_item['item_price'] * $row_order['quantity_order'];
                                  
                                             ?>
                                                <tr style="padding: 0px; margin: 0px">
                                                <td><?php echo $row_item['item_code'] ?></td>
                                                <td><?php echo $row_order['quantity_order'] ?></td>
                                                <td><?php echo $row_item['pack'] ?></td>
                                                <td style="padding: 0px; margin: 0px; padding-top: 7px">
                                                    <span><?php echo $row_item['item_description'] ?></span>
                                                    <br>
                                                    <span>LOT: <?php echo $row_item['lot_no'] ?></span> 
                                                    <br>
                                                    <span>Expiry Date: <?php echo $row_inventory['exp_date'] ?></span>
                                                </td>
                                                <td><?php echo "₱", number_format($row_item['item_price'],2) ?></td>
                                                <td><?php echo "₱", number_format($amount,2) ?></td>
                                                </tr>
                                            <?php } ?>
                                                <!-- <tr>
                                                    <th scope="row" colspan="2" class="text-end">Sub Total</th>
                                                    <td class="text-end">$998.00</td>
                                                </tr> -->
                                                <!-- <tr>
                                                    <th scope="row" colspan="2" class="border-0 text-end">
                                                        Tax</th>
                                                    <td class="border-0 text-end">$12.00</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="2" class="border-0 text-end">Total</th>
                                                    <td class="border-0 text-end">
                                                        <h4 class="m-0">$1010.00</h4>
                                                    </td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                        <div class="col-md-12">
                                            <span style="float: right; padding-right: 6%;">̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ ̲ </span>
                                            </div>
                                    <?php
                                 $invoice_number = $_GET['invoice_number'];
                                 $total_price = mysqli_query($conn,"SELECT sum(s.quantity_order*p.item_price) as total from tbl_sales_order s inner join tbl_item p on p.id=s.item_id where invoice_number='$invoice_number'");
                                    while($row_total = mysqli_fetch_assoc($total_price)) {
                                        $total = $row_total['total'];
                                    }
                                     ?>
                                            <div class="col-md-12">
                                            <span style="float: right; padding-right: 6%; font-weight: bold"><?php echo "₱", number_format($total,2) ?></span>
                                            </div>
                               
                                            <center><span>***NOTHING FOLLOWS***</span></center>
                                            <div class="col-md-12">

                                            <span style="float: right; padding-right: 6%; font-weight: bold"><?php echo "₱", $total_discounted_amount ?></span>
                                            <span style="float: right; padding-right: 6%; font-weight: bold">Less <?php echo $percent_discount ?>%</span>

                                            <br>

                                            <span style="float: right; padding-right: 6%; font-weight: bold"><u><?php echo "₱", number_format($total_discounted_amount,2) ?></u>
                                            </span>
                                            <span style="float: right; padding-right: 6%; font-weight: bold">Total Amount </span>
                                            <br>
                                                <br>
                                            <center><span><?='<p>'.$Peso.'PESOS AND '.$Cents.' CENTS';?></span></center>
                                     </div>
                <br>
                    <br>
                        <br>
                            <br>
                                <br>
                                    <br>
                                        <br>
                                            <br>
                                                <br>
                                                    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <span style="float: right"><?php echo "₱", number_format($total_discounted_amount,2) ?></span>
                <br>
                <span style="float: right"><?php echo "₱", number_format($less_vat,2) ?></span>
                <br>
                <span style="float: right"><?php echo "₱", number_format($amount_net_vat,2) ?></span>
                <br>
                <span style="float: right"><?php echo "₱", $discounted_amount ?></span>
                <br>
                <span style="float: right"><?php echo "₱", number_format($total_discounted_amount,2) ?></span>
            </div>
        </div>
    </div>
                                <div class="d-print-none mt-5">
                                    <div class="float-end">
                                        <button class="btn btn-danger noprint" onclick="window.location.replace('order_receipt.php?id=<?php echo 'cash'?>&invoice_number=<?php echo$invoice_number ?>');"><i class="mdi mdi-arrow-left-circle label-icon"></i> Back</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- end row -->
            </div> <!-- container-fluid -->
        <!-- End Page-content -->
    </div>

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
