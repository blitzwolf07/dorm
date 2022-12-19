<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if(! empty($_POST['id'])) {
    $id = 0;
	$rooms = "select * from tbl_rooms where  id = '".$_POST['id']."'";
	$results = $db_handle->runQuery($rooms); 
	foreach($results as $room) {
        $id = $room['room_number'];
    }

    echo $id;
}
	?>
	
