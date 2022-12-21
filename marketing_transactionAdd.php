<?php
include 'include/connect.php';
date_default_timezone_set('Asia/Manila');

if(isset($_POST['btn_transaction'])) {

$client_id = $_POST['client_id'];
$transaction = $_POST['transaction'];
$invoice_number = $_POST['invoice_number'];
$product_id = $_POST['product_id'];
$item_id = $_POST['item_id'];
$no_of_orders = $_POST['no_of_orders'];
$item_price = $_POST['item_price'];
$total_sale = $_POST['total_sale'];
$transaction = $_POST['transaction'];
$date = $_POST['date'];

$product_sold = mysqli_query($conn,"insert into tbl_marketing_transaction (client_id, invoice_number, product_id, item_id, no_of_orders, item_price, total_sale, transaction, date) values ('$client_id','$invoice_number','$product_id','$item_id','$no_of_orders','$item_price','$total_sale','$transaction','$date')") or die (mysqli_error($conn));

header("location:marketing_transaction.php");

}
 ?>
