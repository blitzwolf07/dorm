<?php 
include 'include/connect.php';

function filterData(&$str) {

	$str = preg_replace("/\t/", "\\t", $str);
	$str = preg_replace("/\r?\n/", "\\n", $str);
	if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';

}

$fileName = "members-data_" . date('Y-m-d') . ".xls";

$fields  = array('No','Client Name','Invoice #','Product','Item','Price','No. of Orders','Total Price', 'Date');

$excelData = implode("\t", array_values($fields)) . "\n";

$i = 1;
$query = $conn->query("select * from tbl_marketing_transaction order by id asc");
if($query->num_rows >0) {
	while ( $row = $query->fetch_assoc()) {
		# code...
	/*$status  = ($row['status'] == 1)?'Active':'Inactive';*/
$client = mysqli_query($conn,"select * from tbl_client where id = '".$row['client_id']."'") or die (mysqli_error($conn));

    $row_client = mysqli_fetch_assoc($client);

    $supplier = mysqli_query($conn,"select * from tbl_supplier where id = '".$row['product_id']."'") or die (mysqli_error($conn));
    $row_supplier = mysqli_fetch_assoc($supplier);

    $item = mysqli_query($conn,"select * from tbl_item where id = '".$row['item_id']."'") or die (mysqli_error($conn));
    $row_item = mysqli_fetch_assoc($item);

	$lineData  = array($i++, $row_client['customer_name'], $row['invoice_number'],$row_supplier['supplier_name'], $row_item['item_name'], $row['item_price'], $row['no_of_orders'], $row['total_sale'], $row['date']);
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

