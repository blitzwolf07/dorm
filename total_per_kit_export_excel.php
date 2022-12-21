<?php 
include 'include/connect.php';

function filterData(&$str) {

	$str = preg_replace("/\t/", "\\t", $str);
	$str = preg_replace("/\r?\n/", "\\n", $str);
	if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';

}

$fileName = "members-data_" . date('Y-m-d') . ".xls";

$fields  = array('No','Client Name','Invoice #','Product','Item','No. of Orders');

$excelData = implode("\t" , array_values($fields)) . "\n" ;

$i = 1;
$query = $conn->query("select distinct item_id from tbl_marketing_transaction order by id asc");
if($query->num_rows >0) {
	while ( $row = $query->fetch_assoc()) {
		# code...
	/*$status  = ($row['status'] == 1)?'Active':'Inactive';*/
    $total_per_ket = mysqli_query($conn,"SELECT *,sum(no_of_orders) as no_orders, sum(total_sale) as total_sale from tbl_marketing_transaction where item_id = '".$row['item_id']."'") or die (mysqli_error($conn)) or die (mysqli_error($conn));

   	   $row_total_per_ket = mysqli_fetch_assoc($total_per_ket);

       $client = mysqli_query($conn,"select * from tbl_client where id = '".$row_total_per_ket['client_id']."'") or die (mysqli_error($conn));
       $row_client = mysqli_fetch_assoc($client);

       $supplier = mysqli_query($conn,"select * from tbl_supplier where id = '".$row_total_per_ket['product_id']."'") or die (mysqli_error($conn));
       $row_supplier = mysqli_fetch_assoc($supplier);

       $item = mysqli_query($conn,"select * from tbl_item where id = '".$row_total_per_ket['item_id']."'") or die (mysqli_error($conn));
       $row_item = mysqli_fetch_assoc($item);

	$lineData  = array($i++, $row_client['customer_name'], $row_total_per_ket['invoice_number'],$row_supplier['supplier_name'], $row_item['item_name'], $row_total_per_ket['no_of_orders']);
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

