	<?php
		include '../dbcon.php';

		if(isset($_GET['delete']))
		{
			$geteditid=$_GET['delete'];
			$editquery=mysql_query("delete from  owner_details where 
				eoid='$geteditid'");
			if($geteditid)
				{
					echo "
					<script>
					alert('Deleted');
					window.location='manageowner.php';
					</script>
					";
				}
			else
				{
					echo "
					<script>
					alert('Delete Failed');
					window.location='manageowner.php';
					</script>
					";
				}
		}
	?>