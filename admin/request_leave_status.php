<?php
include 'include/connect.php';
include 'include/session.php';

if(isset($_POST['btn_leave'])) {

$id = $_POST['id'];
$status = $_POST['status'];
$message = $_POST['message'];

$leave = mysqli_query($conn,"update tbl_leave set status='$status', message='$message' where id ='$id'") or die (mysqli_error($conn));

if($leave)
  {
    $_SESSION['status'] = "Updated Successfully";
    $_SESSION['status_code'] = "success";
    header('location: leave.php');
  }
  else
  {
    $_SESSION['status'] = "Failed.!";
    $_SESSION['status_code'] = "error";
    header('location: leave.php');
  }

}

 ?>