	<?php
	include 'dbcon.php';

	if(isset($_GET['delete']))
		{
			$geteditid=$_GET['delete'];
			$editquery=mysql_query("delete from work_details where 
				lid='$geteditid'");
			if($geteditid)
				{
					//header("location:Labour_Work.php?success");
					echo "
					<script>
					alert('Deleted');
					window.location='Labour_Work.php';
					</script>
					";
				}
			else
				{
					//header("location:Labour_Work.php?fail");
					echo "
					<script>
					alert('Delete Failed');
					window.location='Labour_Work.php';
					</script>
					";
				}
		}
	?>