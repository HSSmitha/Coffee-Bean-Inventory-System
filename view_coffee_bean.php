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
				<table class="table table-bordered table-striped">
				<tr style="background-color:skyblue;">
				<th>BEAN NAME</th>
				<th>RATE</th>
				<th>IMAGE</th>

				</tr>
				<?php
				$display_query=mysql_query("select * from type_bean_details");
				while($row=mysql_fetch_array($display_query))
				{
				$editid=$row['type_beanid'];
				?>

				<tr>
				<td><?php echo $row['type_beanname'];?></td>
				<td><?php echo $row['rate'];?></td>
				<td><img class="img-responsive" width="100px" height="100px" src="images/<?php echo $row['image'];?>"> </td>

				</tr>

				<?php
				}
				?>
				</table>
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
		

