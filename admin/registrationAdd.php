<?php
include 'include/connect.php';
include 'include/session.php';

if(isset($_POST['btn_register'])) {

$customer_name = $_POST['customer_name'];
$customer_address = $_POST['customer_address'];
$contact_person = $_POST['contact_person'];
$contact_number = $_POST['contact_number'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role_id = '2';

$registration = mysqli_query($conn,"insert into tbl_client (password, customer_address, contact_person, contact_number, username, password) values ('$password','$customer_address','$contact_person','$contact_number','$username','$password')") or die (mysqli_error($conn));

 if($registration)
  {
    //echo "Saved";
    $_SESSION['status'] = "Registered Successfull!";
    $_SESSION['status_code'] = "success";
    header('Location: auth-register.php');
  }else
  {
    $_SESSION['status'] = "Failed to Register!";
    $_SESSION['status_code'] = "error";
    header('Location: auth-register.php');
  }
}

 ?>