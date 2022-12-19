<?php
include 'include/connect.php';
include 'include/session.php';

if(isset($_POST['btn_order_status'])) {

$id = $_POST['id'];
$status = $_POST['status'];

$category = mysqli_query($conn,"update tbl_cart set status='$status' where id ='$id'") or die (mysqli_error($conn));

if($category)
  {
    $_SESSION['status'] = "Updated Successfully";
    $_SESSION['status_code'] = "success";
    header('location: pending_order.php');
  }
  else
  {
    $_SESSION['status'] = "Failed.!";
    $_SESSION['status_code'] = "error";
    header('location: pending_order.php');
  }


}

 ?>