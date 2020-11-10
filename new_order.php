<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Order view</title>
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
		background-color: pink;

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
					<li class="dropdown active">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Customer_Order_Details <span class="caret"></span></a>
					<ul class="dropdown-menu">
					<li class="active"><a href="new_order.php">Order Details</a></li>
					<li><a href="order_details.php">View Orders</a></li>
					</ul>
					</li>
					<li><a href="typebean.php">Coffee_Rate</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="logout.php">Logout</a></li>
				</a>
				</ul>
			</div>
			</nav>
		

			<div class="container" style="margin-top:4%;">
			<div class="panel panel-info">
			<div class="panel-heading ">
			<center><h1><b>Customer Details</b></h1S></center>
			</div>

			<div class="panel-body">
			<div class="rows">
		    <div class="col-md-12">
	       
	       <form class="form-horizontal" name="managecustomer.php"
		 	action="" method="post" >

	<div class="col-md-12">
	<table class="table table-bordered table-striped">
	<tr>
	<th>CUSTOMER NAME</th>
	<th>DATE</th>
	<th>VIEW</th>
	</tr>


	<?php
	$oid = $_SESSION['oid'];
	include '../dbcon.php';
	$display_query=mysql_query("SELECT * FROM `order` WHERE o_id ='$oid' and status='Ordered' GROUP BY order_id");
	while($row=mysql_fetch_array($display_query))
	{
		$editid=$row['order_id'];
		$cid = $row['cid'];
		$ss = mysql_query("SELECT * FROM `customer_details` WHERE c_id='$cid'");
		$res = mysql_fetch_array($ss);
		$name = $res['c_name'];
	?>
	<tr>
	<td><?php echo $name;?></td>
	<td><?php echo $row['o_date']; ?></td>
	<td><a href="new_order_info.php?order_id=<?php echo $row[0] ?>" class="btn btn-info">View</a></td>
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
