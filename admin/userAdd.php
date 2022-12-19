<?php
include 'include/connect.php';
include 'include/session.php';
date_default_timezone_set('Asia/Manila');

if(isset($_POST['btn_user'])) {

$full_name = $_POST['full_name'];
$home_address = $_POST['home_address'];
$contact_number = $_POST['contact_number'];
$id_picture = $_FILES['id_picture']['name'];
$id_number = $_POST['id_number'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$dorm_id = $_POST['dorm_id'];
$date_added = date('Y-m-d');
$role_id = 3;
$status = 'Approved';
//upload file
    if($id_picture != '')
    {
        $ext = pathinfo($id_picture, PATHINFO_EXTENSION);
   
        $allowed = ['png', 'jpg', 'jpeg',  'gif'];
    
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(id) as id from tbl_users';
            $result = mysqli_query($conn, $sql);
            if ($result > 0)
            {
                $row = mysqli_fetch_array($result);
                $id_picture = ($row['id']+1) . '-' . $id_picture;
            }
            else
                $id_picture = '1' . '-' . $id_picture;
                
            //set target directory
            $path = 'student_id/';
                
            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['id_picture']['tmp_name'],($path . $id_picture));
            // insert file details into database

        $users = mysqli_query($conn,"insert into tbl_users (full_name, home_address, contact_number, id_picture, id_number, password, date_added, status, role_id, dorm_id) values ('$full_name','$home_address','$contact_number','$id_picture','$id_number','$password','$date_added','$status','$role_id','$dorm_id')") or die(mysqli_error($conn));



        if($users)
      {
        //echo "Saved";
        $_SESSION['status'] = "Added Successfully.!";
        $_SESSION['status_code'] = "success";
        header("Location: user_management_list.php");
      }else
      {
        $_SESSION['status'] = "Failed.!";
        $_SESSION['status_code'] = "error";
        header("Location: user_management_list.php");
      }
            
        }
        else
        {
            $_SESSION['status'] = "ID Picture is necessary to upload.!";
            $_SESSION['status_code'] = "error";
            header("Location: student_register.php");
        }
    }
}

 ?>