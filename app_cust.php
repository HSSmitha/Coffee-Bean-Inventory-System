		<?php
		include '../dbcon.php';
		$cid = $_GET['cid'];
		$pno = $_GET['pno'];
		$sql = mysql_query("UPDATE `customer_details` SET `status`='Active' WHERE c_id='$cid'");
		if($sql == true)
			{
				//Sms Function
				include('way2sms-api.php');
				$client = new WAY2SMSClient();
				$client->login('9611701335', 'hawk009');
				$client->send($pno, 'Your account has been approved..please login an use our website. <--Coffee Day-->');

				sleep(1);
				$client->logout();
				//end

				echo "
				<script>
				alert('Approved');
				window.location='new_customer.php';
				</script>
				";
			}
		else
			{
				echo "
				<script>
				alert('Error');
				window.location='new_customer.php';
				</script>
				";
			}
		?>