<?php
include 'include/connect.php';

if(isset($_POST['sales_remove'])) {

$id = $_POST['id'];
$pt = $_POST['pt'];
$item_id = $_POST['item_id'];
$invoice_number = $_POST['invoice_number'];
$quantity_order = $_POST['quantity_order'];

$sales_remove = mysqli_query($conn,"delete from tbl_sales_order where id ='$id'") or die (mysqli_error($conn));

$inventory = mysqli_query($conn,"UPDATE tbl_inventory set quantity = quantity+$quantity_order where item_id = '$item_id' ") or die (mysqli_error($conn));

header("location:order.php?id=$pt&invoice_number=$invoice_number");
}
 ?>