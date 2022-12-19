<?php
include 'include/connect.php';
include 'include/session.php';

if(isset($_POST['btn_dorm'])) {

$id = $_POST['id'];
$dorm_name = $_POST['dorm_name'];
$number_rooms = $_POST['number_rooms'];


        $category = mysqli_query($conn,"update tbl_dorm set dorm_name='$dorm_name', number_rooms='$number_rooms' where id ='$id'") or die (mysqli_error($conn));

            if($category)
              {
                $_SESSION['status'] = "Edited Successfully";
                $_SESSION['status_code'] = "success";
                header('location: dorm.php');
              }
              else
              {
                $_SESSION['status'] = "Failed.!";
                $_SESSION['status_code'] = "error";
                header('location: dorm.php');
              }
        }
        else
        {
            header("Location: dorm.php?");
        }

 ?>