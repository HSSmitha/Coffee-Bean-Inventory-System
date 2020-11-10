	<?php
	include 'dbcon.php';

		if(isset($_GET['delete']))
		{
			$geteditid=$_GET['delete'];
			$editquery=mysql_query("delete from labour_details where 
				lid='$geteditid'");
			if($geteditid)
			{
				echo "
					<script>
					alert('Deleted');
					window.location='Manage_Labour.php';
					</script>
					";
				}
			else
				{
					// header("location:Product.php?fail");
					echo "
					<script>
					alert('Delete Failed');
					window.location='Manage_Labour.php';
					</script>
					";
				}
		}
	?>

