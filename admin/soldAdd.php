<?php
include 'include/connect.php';
date_default_timezone_set('Asia/Manila');

if(isset($_POST['btn_sold'])) {

$pt = $_POST['pt'];
$user_id = $_POST['user_id'];
$client_id = $_POST['client_id'];
$inclusive = $_POST['inclusive'];
$exclusive = $_POST['exclusive'];
$client_address =$_POST['client_address'];
$cash = $_POST['cash'];
$charge = $_POST['charge'];
$client_po_no = $_POST['client_po_no'];
$credit_limit = $_POST['credit_limit'];
$ar_balance = $_POST['ar_balance'];
$particular = $_POST['particular'];
$less_vat = $_POST['less_vat'];
$amount_net_vat = $_POST['amount_net_vat'];
$percent_discount = $_POST['percent_discount'];
$total_discounted_amount = $_POST['total_discounted_amount'];
$special_instruction = $_POST['special_instruction'];
$terms = $_POST['terms'];
$shipping_instruction = $_POST['shipping_instruction'];
$invoice_number = $_POST['invoice_number'];
$total_amount = $_POST['total_amount'];
$discounted_amount = $_POST['discounted_amount'];
$date_sold = date('Y-m-d');

$product_sold = mysqli_query($conn,"insert into tbl_sold_order (user_id, client_id, inclusive, exclusive, client_address, cash, charge, client_po_no, credit_limit, ar_balance, particular, special_instruction, terms, shipping_instruction, invoice_number, total_amount, date_sold, less_vat, amount_net_vat, percent_discount, total_discounted_amount, discounted_amount) values ('$user_id','$client_id','$inclusive','$exclusive','$client_address','$cash','$charge','$client_po_no','$credit_limit','$ar_balance','$particular','$special_instruction','$terms','$shipping_instruction','$invoice_number','$total_amount','$date_sold','$less_vat','$amount_net_vat','$percent_discount','$total_discounted_amount','$discounted_amount')") or die (mysqli_error($conn));

header("location:order_receipt.php?id=$pt&invoice_number=$invoice_number");

}
 ?>
