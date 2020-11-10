	<?php
	include '../dbcon.php';

	if(isset($_GET['delete']))
	{
		$geteditid=$_GET['delete'];
		$oid = $_GET['oid'];
		$ptype=$_GET['ptype'];

		$editquery=mysql_query("delete from  order_details where 
			order_id='$geteditid'");
		if($geteditid)
			{
				echo"
				<script>
				alert('Deleted Successfully');
				window.location='order_detail.php?oid=".$oid."&&ptype=".$ptype."';
				</script>	
				";
				//header("location:order_detail.php?success");
			}
		else
			{
				echo"
				<script>
				alert('Delete Failed');
				window.location='order_detail.php?oid=".$oid."&&ptype=".$ptype."';
				</script>	
				";
			}
	}
	?>