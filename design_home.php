			<?php
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
        <script type="text/javascript" src="../js/jquery.min(3.2.1).js"></script>
        <script type="text/javascript" src="../js/bootstrap.min(3.3.7).js"></script>
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
          <li><a href="new_owner.php">New Owner </a></li>
          <li><a href="manageowner.php">View Owner</a></li>
          </ul>
          </li>
					<li><a href="logout.php">Logout</a></li>
				</a>
				</ul>
			</div>
			</nav>
			
           <div class="container">
           	<div class="row" style="margin: 5;">
           		<?php
           		include('../dbcon.php');
           		$type_bean = mysql_query("SELECT COUNT(*) FROM `type_bean_details`");
           		$newsinfo = mysql_query("SELECT COUNT(*) FROM `news`");
           		$fbinfo = mysql_query("SELECT COUNT(*) FROM `feedback_details`");
           		$obinfo = mysql_query("SELECT COUNT(*) FROM `owner_details`");
           		$cbinfo = mysql_query("SELECT COUNT(*) FROM `customer_details`");
           		?>
           		<div class="col-md-2 cb">
           			<span class="fa fa-coffee fa-5x" id="title-head"></span>
           			<h4 id="title-para">Coffee Beans</h4>
           			<p style="text-align: center;"><?php echo mysql_result($type_bean, 0) ?></p>
           			<center><p><a href="view_coffee_bean.php" class="btn btn-info"><i class="fa fa-search">View</i></a></p></center>
           		</div>

           		<div class="col-md-2 news">
           			<span class="fa fa-info fa-5x" id="title-news"></span>
           			<h4 id="title-para">News</h4>
           			<p style="text-align: center;"><?php echo mysql_result($newsinfo, 0) ?></p>
           			<center><p><a href="view_news.php" class="btn btn-info"><i class="fa fa-search">View</i></a></p></center>
           		</div>

           		<div class="col-md-2 feed">
           			<span class="fa fa-comments fa-5x" id="title-head"></span>
           			<h4 id="title-para">Feedback</h4>
           			<p style="text-align: center;"><?php echo mysql_result($fbinfo, 0) ?></p>
           			<center><p><a href="view_feedback.php" class="btn btn-info"><i class="fa fa-search">View</i></a></p></center>
           		</div>
           	
          	 	<div class="col-md-2 owner">
           			<span class="fa fa-user-plus fa-5x" id="title-head"></span>
           			<h4 id="title-para">Estate Owners</h4>
           			<p style="text-align: center;"><?php echo mysql_result($obinfo, 0) ?></p>
           			<center><p><a href="view_owner.php" class="btn btn-info"><i class="fa fa-search">View</i></a></p></center>
           		</div>
         
           		<div class="col-md-2 customer">
           			<span class="fa fa-users fa-5x" id="title-head"></span>
           			<h4 id="title-para">Customers</h4>
           			<p style="text-align: center;"><?php echo mysql_result($cbinfo, 0) ?></p>
           			<center><p><a href="view_customer.php" class="btn btn-info"><i class="fa fa-search">View</i></a></p></center>
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
		

