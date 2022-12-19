<?php
include 'include/connect.php';
include 'include/session.php';

$id = $_POST['id'];
$invoice_number = $_POST['invoice_number'];
$quantity_order = $_POST['quantity_order'];

$update_order = mysqli_query($conn,"update tbl_sales_order set quantity_order = '$quantity_order' where id = '$id'") or die (mysqli_error($conn));

if($update_order)
  {
    $_SESSION['status'] = "Edited Successfully";
    $_SESSION['status_code'] = "success";
    header("location:order.php?id=cash&invoice_number=$invoice_number");
  }
  else
  {
    $_SESSION['status'] = "Failed.!";
    $_SESSION['status_code'] = "error";
    header("location:order.php?id=cash&invoice_number=$invoice_number");
  }

 ?>