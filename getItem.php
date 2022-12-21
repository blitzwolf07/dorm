<?php
require_once ("dbcontroller.php");
require_once ("include/connect.php");
$db_handle = new DBController();
if(! empty($_POST['id'])) {
	$item = "select * from tbl_item where supplier_id = '".$_POST['id']."'";
	$results = $db_handle->runQuery($item);
	?>
	<option value disabled selected>Select Item</option>
<?php
	foreach($results as $item) {
 ?>
 <option value="<?php echo $item["id"]; ?>"><?php echo $item['item_name'] ?></option>
<?php 
} 	
}
?>
