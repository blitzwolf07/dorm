<?php
include 'include/connect.php';
include 'include/session.php';

if(isset($_POST['btn_supplier'])) {

$id = $_POST['id'];
$supplier_name = $_POST['supplier_name'];
$contact_person = $_POST['contact_person'];
$supplier_address = $_POST['supplier_address'];
$term = $_POST['term'];

$customer = mysqli_query($conn,"update tbl_supplier set supplier_name='$supplier_name', contact_person='$contact_person', supplier_address='$supplier_address', term='$term' where id ='$id'") or die (mysqli_error($conn));

if($customer)
  {
    $_SESSION['status'] = "Edited Successfully";
    $_SESSION['status_code'] = "success";
    header('location: supplier.php');
  }
  else
  {
    $_SESSION['status'] = "Failed.!";
    $_SESSION['status_code'] = "error";
    header('location: supplier.php');
  }


}

 ?>