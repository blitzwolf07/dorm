<?php
include 'include/connect.php';
include 'include/session.php';
date_default_timezone_set('Asia/Manila');

if(isset($_POST['btn_status'])) {

	$id = $_POST['id'];
  $status = $_POST['status_login'];

$status_query = mysqli_query($conn,"UPDATE tbl_users set status='$status' where id ='$id'") or die (mysqli_error($conn));

	if($status_query)
      {
        //echo "Saved";
        $_SESSION['status'] = "Updated Successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: students.php");
      }else
      {
        $_SESSION['status'] = "Failed!";
        $_SESSION['status_code'] = "error";
        header("Location: students.php");
      }

}

 ?>