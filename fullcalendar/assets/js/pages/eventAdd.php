<?php 
include_once('include/session.php');
include_once('include/connect.php');

    $event_title = $_POST['event_title'];
    $event_description = $_POST['event_description'];
    $event_category = $_POST['event_category'];
    
    $query = mysqli_query($conn, "insert into tbl_event (event_title, event_description, event_category) values ('$event_title','$event_description','$event_category') ") or die(mysqli_error($conn));
    echo "Added successfully";

?>