<?php
include '../dbcon.php';
$tamt = $_GET['tamt'];
$o_id = $_GET['oid'];
$pno = $_GET['pno'];
$sql = mysql_query("UPDATE `order` SET `status`='Ordered',`total`='$tamt' WHERE order_id='$o_id'");
if($sql = true)
{
	$qry = mysql_query("UPDATE `order_details` SET `status`='Ordered' WHERE order_id='$o_id'");

		//Sms Function
		include('way2sms-api.php');
		$client = new WAY2SMSClient();
		$client->login('9611701335', 'hawk009');
		$client->send($pno, 'Your order has been successfully placed..please pay total amount of '.$tamt.' Rupees. <--Coffee Day-->');

		sleep(1);
		$client->logout();
		//end

	echo "
	<script>
	alert('Order Placed');
	window.location='home.php';
	</script>
	";
}
else
{
	echo "
	<script>
	alert('Sorry Could not place your Order');
	window.location='cart.php';
	</script>
	";
}
?>