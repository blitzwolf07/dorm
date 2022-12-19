<?php 
    
date_default_timezone_set('Asia/Manila');
    session_start();
    if(isset($_SESSION['user_id'])){
        include_once "config.php";
        include "../include/connect.php";
        $date_now = date('Y-m-d H:i:s');
        $outgoing_id = $_SESSION['user_id'];
        $images = $_FILES['images']['name'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        if(!empty($images)){

         $ext = pathinfo($images, PATHINFO_EXTENSION);
   
        $allowed = ['pdf', 'doc', 'docx', 'png', 'jpg', 'jpeg', 'gif', 'webp'];

        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(id) as id from tbl_messages';
            $result = mysqli_query($conn, $sql);
            if ($result > 0)
            {
                $row = mysqli_fetch_array($result);
                $images = ($row['id']+1) . '-' . $images;
            }
            else
                $images = '1' . '-' . $images;
                
            //set target directory
            $path = '../files/';
                
            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['images']['tmp_name'],($path . $images));
            // insert file details into database
             $sql = mysqli_query($conn, "INSERT INTO tbl_messages (incoming_msg_id, outgoing_msg_id, msg, images, date_time) VALUES ('$incoming_id', '$outgoing_id', '$message','$images','$date_now')") or die(mysqli_error($conn));
         }
        }else {
             $sql = mysqli_query($conn, "INSERT INTO tbl_messages (incoming_msg_id, outgoing_msg_id, msg, images, date_time) VALUES ('$incoming_id', '$outgoing_id', '$message','$images','$date_now')") or die(mysqli_error($conn));
        }
    }else{
        header("location:chat_user.php");
    }


    
?>