<?php
    session_start();
    include_once "config.php";
    include "../include/connect.php";

    $user_id = $_SESSION['user_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM tbl_users WHERE NOT id = {$user_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= '<center>No user found related to your search term</center>';
    }
    echo $output;
?>