<?php
session_start();
include 'include/connect.php';

if(isset($_POST['btn_category'])) {
 $category_name = $_POST['category_name'];
 $date_created = date('Y-m-d');

 $category= mysqli_query($conn,"insert into tbl_category (category_name,date_created) values ('$category_name','$date_created')") or die (mysqli_error($conn));

 if($category)
  {
    //echo "Saved";
    $_SESSION['status'] = "Saved Successfull!";
    $_SESSION['status_code'] = "success";
    header('Location: product_category.php');
  }else
  {
    $_SESSION['status'] = "Failed to Save!";
    $_SESSION['status_code'] = "error";
    header('Location: product_category.php');
  }
 
}

 ?>