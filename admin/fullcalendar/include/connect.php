<?php
$conn = mysqli_connect("localhost","root","","db_dorm") or die (mysqli_error($conn));
 ?>

 <?php
$connection = mysqli_connect("localhost", "root", "", "db_dorm");
if (!$connection) {
 die("Failed to connect to database");
}
