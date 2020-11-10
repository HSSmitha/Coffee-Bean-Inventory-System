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
			<div class="panel panel-info">
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
	<th>PRODUCT NAME</th>
	<th>QUANTITY</th>
	<th>RATE</th>
	<th>TOTAL</th>
	</tr>


	<?php
	include '../dbcon.php';

	$sql=mysql_query("SELECT * FROM `order_details` WHERE status='PAID' or status='UNPAID'");

	while($r=mysql_fetch_array($sql))
		
	?>

	<?php
	$oid = $_GET['oid'];
	$display_query=mysql_query("SELECT * FROM `order_details` WHERE order_id='$oid'");

	while($row=mysql_fetch_array($display_query))
	{
		$ptype = $row['ptype'];
		$Quantity=$row['qty'];
		$Total=$row['totalamt'];
		$Rate=$row['rate'];

		$qq = mysql_query("SELECT * FROM `order` WHERE order_id='$oid'");
		$qqres = mysql_fetch_array($qq);
		$tamt = $qqres['total'];

		$ss = mysql_query("SELECT * FROM `type_bean_details` WHERE type_beanid='$ptype'");
		$sres = mysql_fetch_array($ss);
		$pname = $sres['type_beanname'];
	?>

	<tr>
	<td><?php echo $pname; ?></td>
	<td><?php echo $Quantity; ?></td>
	<td><?php echo $Rate; ?></td>
	<td><?php echo $Total; ?></td>
	</tr>
	<?php
	}
	?>
	<tr style="background-color: gray;"><td></td><td></td><td></td><td></td></tr>
	<tr>
		<td></td><td></td><td>Total:</td>
		<td> <?php echo $tamt ?></td>
	</tr>	
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
