<?php
include 'include/connect.php';
include 'include/session.php';
date_default_timezone_set('Asia/Manila');

if(isset($_POST['btn_register'])) {

$full_name = $_POST['full_name'];
$home_address = $_POST['home_address'];
$dorm_id = $_POST['dorm_id'];
$room_number = $_POST['room_number'];
$course_year = $_POST['course_year'];
$contact_number = $_POST['contact_number'];
$emergency_contact_no = $_POST['emergency_contact_no'];
$id_picture = $_FILES['id_picture']['name'];
$id_number = $_POST['id_number'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email_add = $_POST['email_add'];
$date_added = date('Y-m-d');
$role_id = 2;
$status = 'Pending';
//upload file
    if($id_picture != '')
    {
        $ext = pathinfo($id_picture, PATHINFO_EXTENSION);
   
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif'];
    
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

        $users = mysqli_query($conn,"insert into tbl_users (full_name, home_address, dorm_id, room_id, course_year, contact_number, emergency_contact_no, id_picture, id_number, password, date_added, status, role_id, email_add) values ('$full_name','$home_address','$dorm_id','$room__id','$course_year','$contact_number','$emergency_contact_no','$id_picture','$id_number','$password','$date_added','$status','$role_id','$email_add')") or die(mysqli_error($conn));



        if($users)
      {
        //echo "Saved";
        $_SESSION['status'] = "Successfully Registered; Wait the owner to confirm you.!";
        $_SESSION['status_code'] = "success";
        header("Location: student_register.php");
      }else
      {
        $_SESSION['status'] = "Failed.!";
        $_SESSION['status_code'] = "error";
        header("Location: student_register.php");
      }
            
        }
        else
        {
            $_SESSION['status'] = "ID Picture is necessary to upload.!";
            $_SESSION['status_code'] = "error";
            header("Location: student_register.php");
        }
    }
/*    else {       
$item = mysqli_query($conn,"insert into tbl_item (supplier_id, category_id, item_name, item_description, item_price, date_added, lot_no, pack, date_added, item_code) values ('$supplier_id','$category_id','$item_name','$item_description','$item_price','$lot_no','$pack','$date_added','$item_code')") or die (mysqli_error($conn));

    $last_id = $conn->insert_id;

     $inventory = mysqli_query($conn,"insert into tbl_inventory (item_id) values ('$last_id')") or die (mysqli_error($conn));

    if($item)
      {
        //echo "Saved";
        $_SESSION['status'] = "Successfully Added.!";
        $_SESSION['status_code'] = "success";
        header("Location: item.php?");
      }else
      {
        $_SESSION['status'] = "Failed.!";
        $_SESSION['status_code'] = "error";
        header("Location: item.php?");
      }
	}*/
}

 ?>