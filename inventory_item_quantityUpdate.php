<?php
include 'include/connect.php';
include 'include/session.php';
date_default_timezone_set('Asia/Manila');

if(isset($_POST['btn_quantity'])) {
	$id = $_POST['id'];
	$supplier_id = $_POST['supplier_id'];
	$quantity = $_POST['quantity'];
	$date_added = date('Y-m-d');
  $exp_date = $_POST['exp_date'];

$quantity_0 = mysqli_query($conn,"update tbl_inventory set quantity=quantity+'$quantity',date_added='$date_added', exp_date='$exp_date' where id ='$id'") or die (mysqli_error($conn));

$last_id = mysqli_insert_id($conn);

$quantity_1 = mysqli_query($conn,"insert into tbl_stock_in (supplier_id, inventory_id, quantity, date_added,exp_date) values ('$supplier_id','$id','$quantity','$date_added','$exp_date')") or die (mysqli_error($conn));

	if($quantity_0)
      {
        //echo "Saved";
        $_SESSION['status'] = "Successfully Added!";
        $_SESSION['status_code'] = "success";
        header("Location: inventory.php");
      }else
      {
        $_SESSION['status'] = "Failed!";
        $_SESSION['status_code'] = "error";
        header("Location: inventory.php");
      }

}

 ?>