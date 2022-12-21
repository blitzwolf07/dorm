<?php
include 'include/connect.php';
include 'include/session.php';

if(isset($_POST['btn_supplier'])) {

$supplier_name = $_POST['supplier_name'];
$contact_person = $_POST['contact_person'];
$supplier_address = $_POST['supplier_address'];
$term = $_POST['term'];

$supplier = mysqli_query($conn,"insert into tbl_supplier (supplier_name, contact_person, supplier_address, term) values ('$supplier_name','$contact_person','$supplier_address','$term')") or die (mysqli_error($conn));

if($supplier)
      {
        //echo "Saved";
        $_SESSION['status'] = "Successfully Added.!";
        $_SESSION['status_code'] = "success";
        header('location:supplier.php');
      }else
      {
        $_SESSION['status'] = "Failed.!";
        $_SESSION['status_code'] = "error";
        header('location:supplier.php');
      }

}


 ?>