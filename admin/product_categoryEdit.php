<?php
include 'include/connect.php';
include 'include/session.php';

if(isset($_POST['btn_category'])) {

$id = $_POST['id'];
$category_name = $_POST['category_name'];

$category = mysqli_query($conn,"update tbl_category set category_name='$category_name' where id ='$id'") or die (mysqli_error($conn));

if($category)
  {
    $_SESSION['status'] = "Edited Successfully";
    $_SESSION['status_code'] = "success";
    header('location: product_category.php');
  }
  else
  {
    $_SESSION['status'] = "Failed.!";
    $_SESSION['status_code'] = "error";
    header('location: product_category.php');
  }


}

 ?>