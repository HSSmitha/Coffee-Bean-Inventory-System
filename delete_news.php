	<?php
		include '../dbcon.php';

		if(isset($_GET['delete']))
		{
			$geteditid=$_GET['delete'];
			$editquery=mysql_query("delete from  news where 
				n_id='$geteditid'");
			if($geteditid)
				{
					echo "
					<script>
					alert('Deleted');
					window.location='news.php';
					</script>
					";
				}
			else
				{
					echo "
					<script>
					alert('Delete Failed');
					window.location='news.php';
					</script>
					";
				}
		}
	?>