<?php
			include '../dbcon.php';
			session_start();
			if(isset($_SESSION['admin']))
			{
			?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>Admin Home Page</title>
				<meta charset="utf-8">
  				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
				<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.css">
				<link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css">
				<link rel="stylesheet" type="text/css" href="style.css">
			</head>

			<body>
			<nav class="navbar navbar-inverse">
			<div class="container-fluid">
    			<div class="navbar-header">
      				<a class="navbar-brand" href="#">Admin</a>
    			</div>
	    		<ul class="nav navbar-nav">
	    			<li class="active"><a href="design_home.php">Dashboard</a></li>
					<li><a href="admin_dashboard.php">Type_Bean_Details</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="feedback.php">Feedback</a></li>
					<li><a href="managecustomer.php">Customer Details</a></li>
					<li><a href="manageowner.php">EstateOwner Details</a></li>
					<li><a href="logout.php">Logout</a></li>
				</a>
				</ul>
			</div>
			</nav>

			 <div class="container">
           	<div class="row">
           		<div class="col-md-12">
           		<div class="table table-responsive"> 
				<table class="table table-bordered">
				<tr style="background-color:skyblue;">
			<th>Name</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Email</th>
			</tr>
			

			<?php

			$sql=mysql_query("SELECT * FROM `owner_details`");

			while($r=mysql_fetch_array($sql))
				
			?>

			<?php
			$display_query=mysql_query("select * from owner_details");
			while($row=mysql_fetch_array($display_query))
			{
				$editid=$row['eoid'];
			?>
			<tr>
			<td><?php echo $row['eoname'];?></td>
			<td><?php echo $row['eoaddress'];?></td>
			<td><?php echo $row['eophone'];?></td>
			<td><?php echo $row['eoemail'];?></td>
			</tr>
			<?php
			}
			?>

			
</table>
		</form>
	</div>

</div>
</div>
</div>
</div>
</div>
</body>
</html>
<?php
}
else
{
	echo"
	<script>
	alert('please login');
	window.location='index.php';
	</script>
	";
}
?>