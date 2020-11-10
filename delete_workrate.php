	<?php
	include 'dbcon.php';

		if(isset($_GET['delete']))
		{
			$geteditid=$_GET['delete'];
			$editquery=mysql_query("delete from rate_work_details where 
				rateid='$geteditid'");
			if($geteditid)
				{
					echo "
					<script>
					alert('Deleted');
					window.location='rate_work.php';
					</script>
					";
				}
		
			else
				{
				
					echo "
					<script>
					alert('Delete failed');
					window.location='rate_work.php';
					</script>
					";
				}
		}
	?>