<?php
include 'include/connect.php';
include 'include/session.php';

if(isset($_POST['btn_customer'])) {

$customer_name = $_POST['customer_name'];
$contact_person = $_POST['contact_person'];
$contact_number = $_POST['contact_number'];
$customer_address = $_POST['customer_address'];
$tin = $_POST['tin'];
$term = $_POST['term'];

$customer = mysqli_query($conn,"insert into tbl_client (customer_name, contact_person, contact_number, customer_address, term, tin) values ('$customer_name','$contact_person','$contact_number','$customer_address','$term','$tin')") or die (mysqli_error($conn));

if($customer)
      {
        //echo "Saved";
        $_SESSION['status'] = "Successfully Added.!";
        $_SESSION['status_code'] = "success";
        header('location:customer.php');
      }else
      {
        $_SESSION['status'] = "Failed.!";
        $_SESSION['status_code'] = "error";
        header('location:customer.php');
      }

}


 ?>