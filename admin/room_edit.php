<?php
include 'include/connect.php';
include 'include/session.php';

if(isset($_POST['btn_room'])) {

$id = $_POST['id'];
$dorm_id = $_POST['dorm_id'];
$room_number = $_POST['room_number'];


        $category = mysqli_query($conn,"update tbl_rooms set dorm_id='$dorm_id', room_number='$room_number' where id ='$id'") or die (mysqli_error($conn));

            if($category)
              {
                $_SESSION['status'] = "Edited Successfully";
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
        else
        {
            header("Location: rooms.php?");
        }

 ?>