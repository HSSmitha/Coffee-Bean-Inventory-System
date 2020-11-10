	<?php
	include '../dbcon.php';

	if(isset($_GET['delete']))
	{
		$geteditid=$_GET['delete'];

		$sql = mysql_query("SELECT * FROM `product_details` WHERE p_type='$geteditid'");
		$count = mysql_num_rows($sql);
		if($count > 0)
		{
			echo "
			<script>
			alert('Sorry Stock Available you cant delete the product');
			window.location='admin_dashboard.php';
			</script>
			";
		}
		else
		{
			$editquery=mysql_query("delete from type_bean_details where type_beanid='$geteditid'");
			if($geteditid)
			{
				echo "
				<script>
				alert('Deleted Successfully');
				window.location='admin_dashboard.php';
				</script>
				";
			}
			else
			{
				echo "
				<script>
				alert('Delete Failed');
				window.location='admin_dashboard.php';
				</script>
				";
			}
		}
	}
	?>