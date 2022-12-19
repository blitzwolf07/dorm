<?php
include 'include/connect.php';
$date_now = date('Y-m-d');
$query = '
SELECT *,
UNIX_TIMESTAMP(CONCAT_WS(" ", date)) AS datetime
FROM tbl_marketing_transaction where date between date AND date
ORDER BY date DESC, date DESC
';
$result = mysqli_query($conn, $query);
$rows = array();
$table = array();
$table['cols'] = array(
 array(
  'label' => 'Date Time', 
  'type' => 'date'
 ),
 array(
  'label' => 'NMMC', 
  'type' => 'number'
 ),
  array(
  'label' => '', 
  'type' => 'number'
 ),

);

while($row = mysqli_fetch_assoc($result))
{
 $sub_array = array();
 $datetime = explode(".", $row["datetime"]);
 $sub_array[] =  array(
      "v" => 'Date(' . $datetime[0] . '000)'
     );
 $sub_array[] =  array(

      "v" => $row["total_sale"]
     );

 $rows[] =  array(
     "c" => $sub_array
    );
}
$table['rows'] = $rows;
$jsonTable = json_encode($table);
 ?>

