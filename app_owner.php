		<?php
		include '../dbcon.php';
		$oid = $_GET['oid'];
		$pno = $_GET['pno'];
		$sql = mysql_query("UPDATE `owner_details` SET `status`='Active' WHERE eoid='$oid'");
		if($sql == true)
			{
				//Sms Function
						include('way2sms-api.php');
						$client = new WAY2SMSClient();
						$client->login('9611701335', 'hawk009');
						$client->send($pno, 'Your Account has been approved please login and use our website! <--Coffee Day-->');

						sleep(1);
						$client->logout();
						//end
				echo "
				<script>
				alert('Approved');
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