<?php
session_start();
include 'include/connect.php';

if(isset($_POST['btn_login'])) {

    $id_number = $_POST['id_number'];
    $password = $_POST['password'];

    $user_login = mysqli_query($conn,"select * from tbl_users where id_number='$id_number' AND status = 'Approved'") or die (mysqli_error($conn));
    $row = mysqli_fetch_assoc($user_login);
    $count = mysqli_num_rows($user_login);
    if(password_verify($password, $row['password'])) {
        $_SESSION['user_id']=$row['id'];
        header("location: fullcalendar/index.php");
    }
    elseif($password != $row['password'] || $id_number != $row['id_number']) {
        header("location:index.php");
    }
    else{
        $_SESSION['status'] = "Failed.!";
        $_SESSION['status_code'] = "error";
        header("Location: index.php");

}
}

 ?>