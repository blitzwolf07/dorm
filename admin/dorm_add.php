<?php
include 'include/connect.php';
include 'include/session.php';

date_default_timezone_set('Asia/Manila');

if(isset($_POST['btn_dorm'])) {
$dorm_name = $_POST['dorm_name'];
$number_rooms = $_POST['number_rooms'];
$date_added = date('Y-m-d');

 $dorm = mysqli_query($conn,"insert into tbl_dorm (dorm_name, number_rooms, date_added) values ('$dorm_name','$number_rooms','$date_added')") or die (mysqli_error($conn));

        if($dorm)
      {
        //echo "Saved";
        $_SESSION['status'] = "Successfully Added.!";
        $_SESSION['status_code'] = "success";
        header("Location: dorm.php");
      }else
      {
        $_SESSION['status'] = "Failed.!";
        $_SESSION['status_code'] = "error";
        header("Location: dorm.php");
      }

}

 ?>