<?php
include('../dbcon.php');
$id = $_GET['id'];
$ptype = $_GET['ptype'];
$qty = $_GET['qty'];
$sql = mysql_query("DELETE FROM order_details WHERE order_id='$id'") or die(mysql_error());
if($sql == true)
{
	$res = mysql_query("UPDATE `product_details` SET `qty`=`qty`+'$qty' WHERE p_type='$ptype'") or die(mysql_error());
	header("location:cart.php");
}
?>