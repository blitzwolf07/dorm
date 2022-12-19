<?php
include 'include/connect.php';
include 'include/session.php';
date_default_timezone_set('Asia/Manila');

if(isset($_POST['btn_leave'])) {

$id = $_POST['id'];
$reason = $_POST['reason'];
$dorm_id = $_POST['dorm_id'];
$status = 'Pending';
$date_created = date('Y-m-d');

$leave = mysqli_query($conn,"insert into tbl_leave (user_id, dorm_id, reason, status, date_created) values ('$id','$dorm_id','$reason','$status','$date_created')") or die (mysqli_error($conn));


if($leave)
  {
    $_SESSION['status'] = "Send Successfully";
    $_SESSION['status_code'] = "success";
    header("location:index.php");
  }
  else
  {
    $_SESSION['status'] = "Failed.!";
    $_SESSION['status_code'] = "error";
    header("location:index.php");
  }


}
 ?>
