<?php

// Connexion à la base de données
include ('include/bdd.php');
include ('include/session.php');

if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){
	
	
	$id = $_POST['Event'][0];
	$start = $_POST['Event'][1];
	$end = $_POST['Event'][2];

	$sql = "UPDATE tbl_event SET  start = '$start', end = '$end' WHERE id = $id ";

	if($sql)
      {
        //echo "Saved";
        $_SESSION['status'] = "Event Updated Successfully!";
        $_SESSION['status_code'] = "success";
        header('location:index.php');
      }else
      {
        $_SESSION['status'] = "Failed.!";
        $_SESSION['status_code'] = "error";
        header('location:index.php');
      }
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}else{
		die ('OK');
	}

}
//header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
