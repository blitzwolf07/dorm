<?php 
include 'include/connect.php';


function filterData(&$str) {

	$str = preg_replace("/\t/", "\\t", $str);
	$str = preg_replace("/\r?\n/", "\\n", $str);
	if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';

}

$fileName = "members-data_" . date('Y-m-d') . ".csv";

$fields  = array('No','Client Name','Transaction','Invoice #','Product','Item','Price','No. of Orders','Total');

$excelData = implode("\t", array_values($fields)) . "\n";

$query = $conn->query("select * from tbl_marketing_transaction order by id asc");
if($query->num_rows >0) {
	while ( $row = $query->fetch_assoc()) {
		# code...
	/*$status  = ($row['status'] == 1)?'Active':'Inactive';*/
	$lineData  = array($row['id'], $row['client_id'], $row['transaction'], $row['invoice_number'],$row['product_id'], $row['item_id'], $row['item_price'], $row['no_of_orders'], $row['total_sale']);
	array_walk($lineData, 'filterData');
	$excelData .= implode("\t", array_values($lineData)) . "\n";
	}
 }
 else {
 	$excelData .='No records found. . . ' . "\n";
 }


 header("Content-Type: application/vnd.ms-excel");
 header("Content-Disposition: attachment; filename=\"$fileName\"");

 echo $excelData;

 exit;

 ?>

