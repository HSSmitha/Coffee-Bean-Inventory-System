<!DOCTYPE html>
<html>
<head>
	<title>Type of coffee bean view</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="js/jquery.min(3.2.1).js"></script>
  	<script src="js/bootstrap.min(3.3.7).js"></script>
	<style>
				body
	{
		margin: 0;
		background-color:  pink;

	}
	</style>
	</head>

	<body>

			<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
    		<div class="navbar-header">
      		<a class="navbar-brand" href="#">EstateOwner</a>
    		</div>
    		<ul class="nav navbar-nav">
	    			<li><a href="home.php">Dashboard</a></li>
					<li><a href="Manage_Labour.php">Manage_Labour</a></li>
					<li><a href="Labour_work.php">Manage_Labour_Work</a></li>
					<li><a href="Product.php">Product_Details</a></li>
					<li><a href="rate_work.php">Rate_Per_Work</a></li>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Customer_Order_Details <span class="caret"></span></a>
					<ul class="dropdown-menu">
					<li><a href="new_order.php">Order Details</a></li>
					<li><a href="order_details.php">View Orders</a></li>
					</ul>
					</li>
					<li class="active"><a href="typebean.php">Coffee_Rate</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="logout.php">Logout</a></li>
				</a>
				</ul>
			</div>
			</nav>
		

			<div class="container" style="margin-top:4%;">
			<div class="panel panel-info">
			<div class="panel-heading ">
			<center><h1><b>Type Bean Details</b></h1></center>
			</div>

			<div class="panel-body">
			<div class="rows">
		    <div class="col-md-12">
	       
	       <form class="form-horizontal" name="managecustomer.php"
		 	action="" method="post" >


     <div class="col-md-12">
	<table class="table table-bordered">
	<tr style="background-color:skyblue">
	<th>TYPE OF BEAN</th>
	<th>COFFEE BEAN</th>
	</tr>

	<?php
	include '../dbcon.php';

	$sql=mysql_query("SELECT * FROM `type_bean_details`");

	while($r=mysql_fetch_array($sql))
		
	?>

	<?php
	$display_query=mysql_query("select * from type_bean_details");
	while($row=mysql_fetch_array($display_query))
	{
		$editid=$row['type_beanid'];
	?>
	<tr>
	<td><?php echo $row['type_beanname'];?></td>
	<td><?php echo $row['rate'];?></td>
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