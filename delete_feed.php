	<?php
	include '../dbcon.php';

	if(isset($_GET['delete']))
	{
		$geteditid=$_GET['delete'];
		$editquery=mysql_query("delete from feedback_details where 
		fid='$geteditid'");
		if($geteditid)
				{
					echo "
					<script>
					alert('Deleted');
					window.location='feedback.php';
					</script>
					";
				}
			else
				{
					echo "
					<script>
					alert('Delete Failed');
					window.location='feedback.php';
					</script>
					";
				}
	}
	?>