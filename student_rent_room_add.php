<?php
include 'include/connect.php';
include 'include/session.php';

date_default_timezone_set('Asia/Manila');

if(isset($_POST['btn_rent'])) {
$user_id = $_POST['user_id'];
$dorm_id = $_POST['dorm_id'];
$room_id = $_POST['room_id'];
$date_in = $_POST['date_in'];
$date_out = $_POST['date_out'];

 $dorm = mysqli_query($conn,"insert into tbl_rent (user_id, dorm_id, room_id, date_in, date_out) values ('$user_id','$dorm_id','$room_id','$date_in','$date_out')") or die (mysqli_error($conn));

        if($dorm)
      {
        //echo "Saved";
        $_SESSION['status'] = "Successfully Added.!";
        $_SESSION['status_code'] = "success";
        header("Location: rent.php");
      }else
      {
        $_SESSION['status'] = "Failed.!";
        $_SESSION['status_code'] = "error";
        header("Location: rent.php");
      }

}

 ?>