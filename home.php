<?php

session_start();
if(isset($_SESSION['estate']))
{
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Estate Owner Home Page</title>
				<meta charset="utf-8">
  				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
				<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="style.css">
				<script src="js/jquery.min(3.2.1).js"></script>
  				<script src="js/bootstrap.min(3.3.7).js"></script>
			</head>

	<body>
			<nav class="navbar navbar-inverse">
			<div class="container-fluid">
    			<div class="navbar-header">
      				<a class="navbar-brand" href="#">EstateOwner</a>
    			</div>
	    		<ul class="nav navbar-nav">
	    			<li class="active"><a href="home.php">Dashboard</a></li>
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
					<li><a href="typebean.php">Coffee_Rate</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="logout.php">Logout</a></li>
				</a>
				</ul>
			</div>
			</nav>
			
    <div class="container">
	<img src="images/cfe_estate.jpg"; style="height:500px;width:100%">
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