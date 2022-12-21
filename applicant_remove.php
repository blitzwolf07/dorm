<?php 
include 'include/connect.php';
if(isset($_POST['btn_remove'])) {

$applicant = mysqli_query($conn,"delete from tbl_applicant") or die (mysqli_error($conn));

if($applicant)
      {
        //echo "Saved";
        $_SESSION['status'] = "Successfully Remove";
        $_SESSION['status_code'] = "success";
        header('location:applicants.php');
      }else
      {
        $_SESSION['status'] = "Failed.!";
        $_SESSION['status_code'] = "error";
        header('location:applicants.php');
      }
}

?>