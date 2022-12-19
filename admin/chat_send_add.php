<?php 
    
date_default_timezone_set('Asia/Manila');
    session_start();
    if(isset($_SESSION['user_id'])){
        include "include/connect.php";
        $date_now = date('Y-m-d H:i:s');
        $outgoing_id = $_SESSION['user_id'];
        $admin_id = $_POST['admin_id'];
        $message = mysqli_real_escape_string($conn, $_POST['message']);

            // insert file details into database
             $sql = mysqli_query($conn, "INSERT INTO tbl_messages (incoming_msg_id, outgoing_msg_id, msg, date_time) VALUES ('$admin_id', '$outgoing_id', '$message','$date_now')") or die(mysqli_error($conn));
            header("location:chat_user.php?user_id=$admin_id");
        
    }else{
        header("location:chat_user.php?user_id=$admin_id");
    }


    
?>