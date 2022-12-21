<?php
include 'include/connect.php';
include 'include/session.php';

if(isset($_POST['btn_rent'])) {

$id = $_POST['id'];
$user_id = $_POST['user_id'];
$dorm_id = $_POST['dorm_id'];
$date_in = $_POST['date_in'];
$date_out = $_POST['date_out'];

        $category = mysqli_query($conn,"update tbl_rent set user_id='$user_id', dorm_id='$dorm_id', room_id='$room_id', date_in='$date_in', date_out='$date_out' where id ='$id'") or die (mysqli_error($conn));

            if($category)
              {
                $_SESSION['status'] = "Edited Successfully";
                $_SESSION['status_code'] = "success";
                header('location: rent.php');
              }
              else
              {
                $_SESSION['status'] = "Failed.!";
                $_SESSION['status_code'] = "error";
                header('location: rent.php');
              }
        }
        else
        {
            header("Location: rent.php?");
        }

 ?>