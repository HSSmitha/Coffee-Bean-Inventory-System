		<?php
		include('../dbcon.php');
		$id = $_GET['id'];
		$status = $_GET['status'];
		if($status=='block')
			{
				$sql = mysql_query("UPDATE `customer_details` SET `status`='Block' WHERE c_id='$id'");
				if($sql == true)
					{
						header("location:managecustomer.php");
					}
			}
		else
			{
				$sql = mysql_query("UPDATE `customer_details` SET `status`='Active' WHERE c_id='$id'");
				if($sql == true)
					{
						header("location:managecustomer.php");
					}
			}
		?>