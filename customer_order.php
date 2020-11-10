<!DOCTYPE html>
<html>
<head>
	<title>customer view</title>
				<meta charset="utf-8">
  				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
				<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="style.css">
				<script type="text/javascript" src="../js/jquery.min(3.2.1).js"></script>
        <script type="text/javascript" src="../js/bootstrap.min(3.3.7).js"></script>
				
</head>
			<body>
			<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
    		<div class="navbar-header">

      			<a class="navbar-brand" href="#">Admin</a>
    			</div>

	    		<ul class="nav navbar-nav">
	    			<li><a href="design_home.php">Dashboard</a></li>
					<li><a href="admin_dashboard.php">Type_Bean_Details</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="feedback.php">Feedback</a></li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Customer Details <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li class="active"><a href="new_customer.php">New Customer </a></li>
          <li><a href="managecustomer.php">View Customer</a></li>
          <li><a href="customer_order.php">Track Order</a></li>
          </ul>
          </li>
					<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Estate Owner Details <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="new_owner.php">New Owner </a></li>
          <li><a href="manageowner.php">View Owner</a></li>
          </ul>
          </li>
					<li><a href="logout.php">Logout</a></li>
				</a>
				</ul>

			</div>
			</nav>

			<div class="container" style="margin-top:4%;">
			<div class="panel panel-danger">
			<div class="panel-heading ">
			<center><h1><b>Customer Order Details</b></h1></center>
			</div>


			<div class="panel-body">
		    <div class="rows">
		    <div class="col-md-12">
		<form class="form-horizontal" name="managecustomer.php"
		 action="" method="post" >

	<div class="col-md-12">
	<table class="table table-bordered">
	<tr style="background-color:skyblue">
	<th>CUSTOMER NAME</th>
	<th>OWNER NAME</th>
	<th>VIEW</th>
	</tr>


	<?php
	include '../dbcon.php';

	$sql=mysql_query("SELECT * FROM `order` WHERE status='PAID' or status='UNPAID'");

	while($r=mysql_fetch_array($sql))
		
	?>

	<?php
	$display_query=mysql_query("SELECT * FROM `order` WHERE status='PAID' or status='UNPAID'");
	while($row=mysql_fetch_array($display_query))
	{
		$cid=$row['cid'];
		$oid = $row['order_id'];
		$owner_id = $row['o_id'];
		$cust = mysql_query("SELECT * FROM `customer_details` WHERE c_id='$cid'");
		$cust_row = mysql_fetch_array($cust);
		$cname = $cust_row['c_name'];

		$owner = mysql_query("SELECT * FROM `owner_details` WHERE eoid='$owner_id'");
		$owner_row = mysql_fetch_array($owner);
		$oname = $owner_row['eoname'];
	?>
	<tr>
	<td><?php echo $cname;?></td>
	<td><?php echo $oname;?></td>
	<td><a class="btn btn-success" href="cust_order_info.php?oid=<?php echo $oid; ?>">View</a></td>

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
