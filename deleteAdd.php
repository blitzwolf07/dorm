<?php
include 'include/connect.php';
include 'include/session.php';

if(isset($_POST['btn_delete'])) {
$id = $_POST['id'];
$page = $_POST['page'];

if($page == 'students') {
$delete = mysqli_query($conn,"delete from tbl_users where id = '$id'") or die (mysqli_error($conn));
  if($delete)
  {
    $_SESSION['status'] = "Deleted Successfully";
    $_SESSION['status_code'] = "success";
    header('location: students.php');
  }
  else
  {
    $_SESSION['status'] = "Failed.!";
    $_SESSION['status_code'] = "error";
    header('location: product_category.php');
  }
		
}
elseif($page == 'staff') {
$delete = mysqli_query($conn,"delete from tbl_users where id = '$id'") or die (mysqli_error($conn));
	if($delete)
	  {
	    $_SESSION['status'] = "Deleted Successfully";
	    $_SESSION['status_code'] = "success";
	    header('location: user_management_list.php');
	  }
	  else
	  {
	    $_SESSION['status'] = "Failed.!";
	    $_SESSION['status_code'] = "error";
	    header('location: item.php');
	  }
}
elseif($page == 'dorm') {
$delete = mysqli_query($conn,"delete from tbl_dorm where id = '$id'") or die (mysqli_error($conn));
	if($delete)
	  {
	    $_SESSION['status'] = "Deleted Successfully";
	    $_SESSION['status_code'] = "success";
	    header('location: dorm.php');	
	  }
	  else
	  {
	    $_SESSION['status'] = "Failed.!";
	    $_SESSION['status_code'] = "error";
	    header('location: customer.php');	
	  }
}
elseif($page == 'rent') {
$delete = mysqli_query($conn,"delete from tbl_rent where id = '$id'") or die (mysqli_error($conn));
	if($delete)
	  {
	    $_SESSION['status'] = "Deleted Successfully";
	    $_SESSION['status_code'] = "success";
	    header('location: rent.php');
	  }
	  else
	  {
	    $_SESSION['status'] = "Failed.!";
	    $_SESSION['status_code'] = "error";
	    header('location: supplier.php');
	  }
}
elseif($page == 'users') {
$delete = mysqli_query($conn,"delete from tbl_users where id = '$id'") or die (mysqli_error($conn));
	if($delete)
	  {
	    $_SESSION['status'] = "Deleted Successfully";
	    $_SESSION['status_code'] = "success";
	    header('location: user_management_list.php');
	  }
	  else
	  {
	    $_SESSION['status'] = "Failed.!";
	    $_SESSION['status_code'] = "error";
	    header('location: user_management_list.php');
	  }
}
elseif($page == 'leave') {
$delete = mysqli_query($conn,"delete from tbl_leave where id = '$id'") or die (mysqli_error($conn));
	if($delete)
	  {
	    $_SESSION['status'] = "Deleted Successfully";
	    $_SESSION['status_code'] = "success";
	    header('location: leave.php');
	  }
	  else
	  {
	    $_SESSION['status'] = "Failed.!";
	    $_SESSION['status_code'] = "error";
	    header('location: marketing_transaction.php');
	  }
}
elseif($page == 'applicant') {
$delete = mysqli_query($conn,"delete from tbl_applicant where id = '$id'") or die (mysqli_error($conn));
	if($delete)
	  {
	    $_SESSION['status'] = "Applicant Deleted Successfully";
	    $_SESSION['status_code'] = "success";
	    header('location: applicants.php');
	  }
	  else
	  {
	    $_SESSION['status'] = "Failed.!";
	    $_SESSION['status_code'] = "error";
	    header('location: applicants.php');
	  }
}
elseif($page == 'rooms') {
$delete = mysqli_query($conn,"delete from tbl_rooms where id = '$id'") or die (mysqli_error($conn));
	if($delete)
	  {
	    $_SESSION['status'] = "Rooms Deleted Successfully";
	    $_SESSION['status_code'] = "success";
	    header('location: rooms.php');
	  }
	  else
	  {
	    $_SESSION['status'] = "Failed.!";
	    $_SESSION['status_code'] = "error";
	    header('location: rooms.php');
	  }
}
}
?>