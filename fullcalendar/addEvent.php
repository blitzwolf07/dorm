 <?php

// Connexion à la base de données
require_once('bdd.php');
require_once('include/session.php');
//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$description = $_POST['description'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];

	$sql = "INSERT INTO tbl_event (title, description, start, end, color) values ('$title' ,'$description', '$start', '$end', '$color')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	if($sql)
      {
        //echo "Saved";
        $_SESSION['status'] = "Event Successfully Added!";
        $_SESSION['status_code'] = "success";
        header('location:index.php');
      }else
      {
        $_SESSION['status'] = "Failed.!";
        $_SESSION['status_code'] = "error";
        header('location:index.php');
      }

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
