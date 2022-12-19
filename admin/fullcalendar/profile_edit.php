<?php
include 'include/connect.php';
include 'include/session.php';

if(isset($_POST['btn_profile'])) {

$id = $_POST['id'];
$full_name = $_POST['full_name'];
$home_address = $_POST['home_address'];
$email_add = $_POST['email_add'];
$course_year = $_POST['course_year'];
$contact_number = $_POST['contact_number'];
$emergency_contact_no = $_POST['emergency_contact_no'];

        $profile = mysqli_query($conn,"update tbl_users set full_name='$full_name', home_address='$home_address', email_add='$email_add', course_year='$course_year', contact_number='$contact_number', emergency_contact_no='$emergency_contact_no' where id ='$id'") or die (mysqli_error($conn));

            if($profile)
              {
                $_SESSION['status'] = "Edited Successfully";
                $_SESSION['status_code'] = "success";
                header('location: index.php');
              }
              else
              {
                $_SESSION['status'] = "Failed.!";
                $_SESSION['status_code'] = "error";
                header('location: index.php');
              }
        }
        else
        {
            header("Location: index.php?");
        }

 ?>