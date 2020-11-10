<!DOCTYPE html>
<html>
<head>
	<title>Estate owner view</title>

<meta charset="utf-8">
  				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
				<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="style.css">
				<script type="text/javascript" src="../js/jquery.min(3.2.1).js"></script>
        <script type="text/javascript" src="../js/bootstrap.min(3.3.7).js"></script>
				
	</head>

	<body>
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
          <li><a href="new_customer.php">New Customer </a></li>
          <li><a href="managecustomer.php">View Customer</a></li>
          <li><a href="customer_order.php">Track Order</a></li>
          </ul>
          </li>
					<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Estate Owner Details <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li class="active"><a href="new_owner.php">New Owner </a></li>
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

			<center><h1><b>Estate Owner Details</b></h1></center>
			</div>


			<div class="panel-body">
		    <div class="rows">
		    <div class="col-md-12">
	
		<form class="form-horizontal" name="manageowner.php"
		 action="" method="post" >

	<div class="col-md-12">
	<table class="table table-bordered">
	<tr style="background-color:skyblue">
	<th>NAME</th>
	<th>ADDRESS</th>
	<th>PHONE</th>
	<th>EMAILID</th>
	<th>APPROVE</th>
	<th>REJECT</th>
	</tr>


	<?php
	include '../dbcon.php';

	$sql=mysql_query("SELECT * FROM `owner_details` WHERE status='Registered'");


	while($r=mysql_fetch_array($sql))
		
	?>

	<?php
	$display_query=mysql_query("SELECT * FROM `owner_details` WHERE status='Registered'");

	while($row=mysql_fetch_array($display_query))
	{
		$editid=$row['eoid'];
		$status = $row['status'];
	?>
	<tr>
	<td><?php echo $row['eoname'];?></td>
	<td><?php echo $row['eoaddress'];?></td>
	<td><?php echo $row['eophone'];?></td>
	<td><?php echo $row['eoemail'];?></td>
	<td><a href="app_owner.php?oid=<?php echo $editid; ?>&&pno=<?php echo $row['eophone']; ?> class="btn btn-success">Approve</a></td>
	<td><a href="rej_owner.php?oid=<?php echo $editid; ?>&&pno=<?php echo $row['eophone']; ?> class="btn btn-warning">Reject</a></td>
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
