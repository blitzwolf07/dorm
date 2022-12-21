<?php
include 'include/connect.php';
include 'include/session.php';

$id = $_GET['id'];
$status = 'Received';
$receive = mysqli_query($conn,"update tbl_applicant set status = '$status' where id ='$id'") or die (mysqli_error($conn));

if($receive)
      {
        //echo "Saved";
        $_SESSION['status'] = "Updated Successfully.";
        $_SESSION['status_code'] = "success";
        header('location:applicants.php');
      }else
      {
        $_SESSION['status'] = "Failed.!";
        $_SESSION['status_code'] = "error";
        header('location:applicants.php');
      }
 ?>