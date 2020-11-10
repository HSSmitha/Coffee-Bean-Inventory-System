<?php
include 'dbcon.php';
$id = $_GET['order_id'];
$sql = mysql_query("UPDATE `order_details` SET status='PAID' WHERE order_id='$id'");
if($sql)
{
	$qry = mysql_query("UPDATE `order` SET status='PAID' WHERE order_id='$id'");
	echo"
	<script>
	alert('Updated Successfully');
	window.location='new_order.php';
	</script>	
	";
	
}
?>