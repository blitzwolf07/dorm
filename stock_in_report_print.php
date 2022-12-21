<?php include 'include/connect.php';  
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
                    <th>Supplier</th>
                    <th>Item Name</th>
                    <th>Pack</th>
                    <th>Price</th>
                    <th>QTY Added</th>
                    <th>Date Added</th> 
            </tr>
          </thead>
          <tbody>
                <?php
                $i = 1;
                $from_date = $_GET['from_date'];
                $to_date = $_GET['to_date'];
                $stockin = mysqli_query($conn,"select * from tbl_stock_in where date_added between '$from_date' and '$to_date'") or die (mysqli_error($conn));
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
                    <td><?php echo '₱', number_format($row_item['item_price'],2) ?></td>
                    <td><?php echo $row_stockin['quantity'] ?></td>
                    <td><?php echo date("M d, Y",strtotime($row_item['date_added'])) ?></td>
                </tr>         

            <?php } ?>
          </tbody>

     </table>
   </div>
     <br>
     <div class="form-group">
          <button type="" class="btn btn-danger noprint" onclick="window.location.replace('stock_in_report.php?from_date=0&to_date=0');">Cancel Printing</button>
     </div>

     </div>





   </body>
 </html>
