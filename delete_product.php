	<?php
	 include 'dbcon.php';

		if(isset($_GET['delete']))
		{
			$geteditid=$_GET['delete'];
			$editquery=mysql_query("delete from product_details where 
				p_id='$geteditid'");
			if($geteditid)
				{
					// header("location:Product.php?success");
					echo "
					<script>
					alert('Deleted');
					window.location='Product.php';
					</script>
					";
				}
			else
				{
					// header("location:Product.php?fail");
					echo "
					<script>
					alert('Delete Failed');
					window.location='Product.php';
					</script>
					";
				}
		}
	?>