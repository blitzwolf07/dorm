<?php
include 'include/connect.php';
include 'include/session.php';
date_default_timezone_set('Asia/Manila');

if(isset($_POST['btn_sales'])) {
$pt = $_POST['pt'];
$supplier_id = $_POST['supplier_id'];
$item_id = $_POST['item_id'];
$quantity_order = $_POST['quantity_order'];
$invoice_number = $_POST['invoice_number'];
$date_order = date('Y-m-d');

$quantity_1 = mysqli_query($conn, "select * from tbl_inventory where item_id='$item_id'") or die(mysqli_error($conn));

while($row = mysqli_fetch_assoc($quantity_1)) {
	if($row['quantity']<=0) {

        $_SESSION['status'] = "Out of Stock";
        $_SESSION['status_code'] = "error";
        header("location:order.php?id=$pt&invoice_number=$invoice_number");
	}
	else
      {
        $sales = mysqli_query($conn,"insert into tbl_sales_order (supplier_id, item_id, invoice_number, quantity_order, date_order) values ('$supplier_id','$item_id','$invoice_number','$quantity_order','$date_order')") or die (mysqli_error($conn));

		header("location:order.php?id=$pt&invoice_number=$invoice_number");

		$inventory = mysqli_query($conn,"UPDATE tbl_inventory set quantity = quantity-$quantity_order where item_id = '$item_id' ") or die (mysqli_error($conn));

      }
}
	
}
 ?>
