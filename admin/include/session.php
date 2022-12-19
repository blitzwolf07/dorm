<?php
session_start();
include'connect.php';

if (isset($_SESSION['user_id'])) {
    # code...

$user_id = $_SESSION['user_id'];

$session_query = mysqli_query($conn, "select * from tbl_users where id='$user_id' ") or die(mysqli_error($conn));
$session_row = mysqli_fetch_assoc($session_query);

$fullname = $session_row['full_name'];
$role = $session_row['role_id'];
$dorm_id = $session_row['dorm_id'];
}
/*elseif(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: auth-login.php");
    exit;
}else{
    $_SESSION['error'] = "You dont have permission to view this Page";
    header("location:auth-login.php");
}*/
?>
