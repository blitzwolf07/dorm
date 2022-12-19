<?php include 'include/connect.php';  
 ?>

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

    <?php include 'layouts/head-style.php'; ?>

</head>
  <title>SALES | REPORT</title>
 <!DOCTYPE html>
 <html>
    <style type="text/css" media="print">
        @media print{
              .noprint, .noprint *{
                  display: none; !important;
              }
        }
        body {
          font-style: Sans-serif;
        }

    </style>

   <body onload="print()">
     <div class="container">
   <!--     
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="form-group col-sm-6">
        <img src="image/receipt_logo.jpg" style="margin-left:auto; max-width: 35%;max-height: auto">
          </div>
          
                 <label>asdads</label>
              
          <br>
               
          </div>
         
          </div>
          </div> -->
      
     <div class="card-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
               <div class="form-group col-sm-12">
                <center>
                <h1>SAN LUCAS LABLINE</h1>
                <h4>Stockin Report</h4>
                </center>
                <br>
              </div>
            </div>
          </div>
        </div>
     <table id="ready" class="table table-striped table-bordered" style="width: 100%;">
          <thead>
            <tr>
                    <th>No.</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>QTY</th>
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
                        <td><?php echo "₱",number_format($row_item['item_price']) ?></td>
                        <td><?php echo $row_sales_order['quantity_sold'] ?></td>
                        <td><?php echo "₱",number_format($total,2); ?></td>
                        <td><?php echo date("M d, Y",strtotime($row_sold_order['date_sold'])) ?></td>
                      </tr>         

            <?php } ?>
          </tbody>

     </table>
   </div>
     <br>
     <div class="form-group">
          <button type="" class="btn btn-danger noprint" onclick="window.location.replace('sales_report.php?from_date=0&to_date=0');">Cancel Printing</button>
     </div>

     </div>

   </body>
 </html>
