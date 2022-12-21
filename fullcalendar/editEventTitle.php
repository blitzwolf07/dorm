<?php
require_once('bdd.php');
require_once('include/session.php');

if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM tbl_event WHERE id = $id";
	$query = $bdd->prepare( $sql );

	if($sql)
      {
        //echo "Saved";
        $_SESSION['status'] = "Event Deleted!";
        $_SESSION['status_code'] = "success";
        header('location:index.php');
      }else
      {
        $_SESSION['status'] = "Failed.!";
        $_SESSION['status_code'] = "error";
        header('location:index.php');
      }

	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	
}elseif (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['color']) && isset($_POST['id'])){
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$color = $_POST['color'];
	
	$sql = "UPDATE tbl_event SET  title = '$title', description = '$description', color = '$color' WHERE id = $id ";

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
	}

}
header('Location: index.php');

	
?>
