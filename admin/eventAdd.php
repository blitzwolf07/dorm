<?php 
include_once('include/session.php');
include_once('include/connect.php');

//echo $_POST['title'];
if (isset($_POST['event_title']) && isset($_POST['event_description']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$event_title = $_POST['event_title'];
	$event_description = $_POST['event_description'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];

	$sql = "INSERT INTO tbl_event(event_title, event_description, start, end, color) values ('$event_title','$event_description', '$start', '$end', '$color')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);


?>