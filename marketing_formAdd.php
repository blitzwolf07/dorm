<?php
include 'include/connect.php';
date_default_timezone_set('Asia/Manila');

if(isset($_POST['btn_sold'])) {

$client_id = $_POST['client_id'];
$transaction = $_POST['transaction'];
$invoice_number = $_POST['invoice_number'];
$product_id = $_POST['product_id'];
$item_id = $_POST['item_id'];
$no_of_orders = $_POST['no_of_orders'];
$item_price = $_POST['item_price'];
$total_sale = $_POST['total_sale'];

$product_sold = mysqli_query($conn,"insert into tbl_sold_order (customer_id, invoice_number, total_amount, date_sold) values ('$customer_id','$invoice_number','$total_amount','$date_sold')") or die (mysqli_error($conn));

header("location:order_receipt.php?id=$pt&invoice_number=$invoice_number");

}
 ?>
