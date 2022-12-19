<?php
include 'include/connect.php';
include 'include/session.php';

if(isset($_POST['btn_client'])) {

$id = $_POST['id'];
$customer_name = $_POST['customer_name'];
$contact_person = $_POST['contact_person'];
$customer_address = $_POST['customer_address'];
$term = $_POST['term'];

$customer = mysqli_query($conn,"update tbl_client set customer_name='$customer_name', contact_person='$contact_person', customer_address='$customer_address', term='$term' where id ='$id'") or die (mysqli_error($conn));

if($customer)
  {
    $_SESSION['status'] = "Edited Successfully";
    $_SESSION['status_code'] = "success";
    header('location: customer.php');
  }
  else
  {
    $_SESSION['status'] = "Failed.!";
    $_SESSION['status_code'] = "error";
    header('location: customer.php');
  }


}

 ?>