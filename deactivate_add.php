<?php
include 'include/connect.php';
include 'include/session.php';

$id = $_POST['id'];
$status_activate = $_POST['status_activate'];

$leave = mysqli_query($conn,"update tbl_users set status_activate='$status_activate' where id ='$id'") or die (mysqli_error($conn));

if($leave)
  {
    $_SESSION['status'] = "Updated Successfully";
    $_SESSION['status_code'] = "success";
    header('location: students.php');
  }
  else
  {
    $_SESSION['status'] = "Failed.!";
    $_SESSION['status_code'] = "error";
    header('location: students.php');
  }




 ?>