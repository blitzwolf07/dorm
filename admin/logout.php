<?php
include 'include/connect.php';
$user_id = $_POST['id'];

// Destroy the session.
session_destroy();
// Redirect to login page
header("location: index.php");
exit();
?>