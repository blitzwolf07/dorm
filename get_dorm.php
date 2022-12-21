<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if(! empty($_POST['id'])) {
	$room = "select * from tbl_rooms where dorm_id = '".$_POST['id']."'";
	$results = $db_handle->runQuery($room);
	?>
	<option value disabled selected>Select Room No.</option>
<?php
	foreach($results as $room) {
 ?>
 <option value="<?php echo $room["id"]; ?>"><?php echo $room['room_number'] ?></option>
<?php 
} 	
}
 ?>
