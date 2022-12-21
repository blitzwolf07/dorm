<?php
include 'include/connect.php';
include 'include/session.php';

date_default_timezone_set('Asia/Manila');

if(isset($_POST['btn_dorm'])) {
$dorm_id = $_POST['dorm_id'];
$room_number = $_POST['room_number'];
$date_added = date('Y-m-d');

 $dorm = mysqli_query($conn,"insert into tbl_rooms (dorm_id, room_number, date_added) values ('$dorm_id','$room_number','$date_added')") or die (mysqli_error($conn));

        if($dorm)
      {
        //echo "Saved";
        $_SESSION['status'] = "Successfully Added.!";
        $_SESSION['status_code'] = "success";
        header("Location: rooms.php");
      }else
      {
        $_SESSION['status'] = "Failed.!";
        $_SESSION['status_code'] = "error";
        header("Location: rooms.php");
      }

}

 ?>