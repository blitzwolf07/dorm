<?php
include('include/connect.php');

$id = $_POST['id'];
$data = [];
$query = mysqli_query($conn, 'select * from tbl_client where id="'.$id.'" ') or die(mysqli_error($conn));

while ($row = mysqli_fetch_array($query)) {
   $data = $row;
}

echo json_encode($data);

?>