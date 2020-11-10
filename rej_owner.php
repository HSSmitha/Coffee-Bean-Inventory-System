<?php
include '../dbcon.php';
$oid = $_GET['oid'];
$pno = $_GET['pno'];
$sql = mysql_query("DELETE FROM `owner_details` WHERE eoid='$oid'");
if($sql == true)
{	//Sms Function
				include('way2sms-api.php');
				$client = new WAY2SMSClient();
				$client->login('9611701335', 'hawk009');
				$client->send($pno, 'Your account has been Rejected. <--Coffee Day-->');

				sleep(1);
				$client->logout();
				//end

	echo "
	<script>
	alert('Rejected');
	window.location='new_owner.php';
	</script>
	";
}
else
{
	echo "
	<script>
	alert('Error');
	window.location='new_owner.php';
	</script>
	";
}
?>