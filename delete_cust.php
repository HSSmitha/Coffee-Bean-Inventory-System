	<?php
		include '../dbcon.php';

		if(isset($_GET['delete']))
		{
			$geteditid=$_GET['delete'];
			$editquery=mysql_query("delete from  customer_details where 
				c_id='$geteditid'");
			if($geteditid)
				{
					echo "
					<script>
					alert('Deleted');
					window.location='managecustomer.php';
					</script>
					";
				}
			else
				{

					echo "
					<script>
					alert('Delete Failed');
					window.location='managecustomer.php';
					</script>
					";
				}
		}
	?>