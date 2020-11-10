	<?php
	session_start();
	include '../dbcon.php';
	if(isset($_SESSION['customer']))
	{
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Order Details</title>
		<meta charset="utf-8">
  				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
				<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<?php
	//session_start();
	?>
	<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
	<div class="navbar-header">
	<a class="navbar-brand" href="#">Customer</a>
	</div>
	<ul class="nav navbar-nav">
	<li><a href="home.php">Dashboard</a></li>
	<li><a href="Product.php">Product</a></li>
	<li><a href="feedback.php">Feedback</a></li>
	<li><a href="news.php">News</a></li>
	<li><a href="logout.php">Logout</a></li>
	</a>
	</ul>
	</div>
	</nav>


	<div class="container" style="margin-top: 5%;"> 
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
							</div>
							<div class="col-xs-6">
								<a href="Product.php" class="btn btn-primary btn-sm btn-block">
									<span class="glyphicon glyphicon-share-alt"></span> Continue shopping
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
				<?php
				$cid = $_SESSION['cid'];
				$sql = mysql_query("SELECT * FROM `order_details` WHERE status='Added' and cid='$cid'");
				$i=0;
				while($res = mysql_fetch_array($sql))
				{
					$order_id=$res['order_id'];
					$bid = $res['ptype'];
					$o_id=$res['o_id'];
					$ss = mysql_query("SELECT * FROM `type_bean_details` WHERE type_beanid='$bid'");
					$rres = mysql_fetch_array($ss);
					$image = $rres['image'];
					$tname = $rres[1];
					$rate = $rres[2];
					$qty = $res['qty'];
					$q = mysql_query("SELECT `order_id`, `cid`, `o_id`, `ptype`, `qty`, `rate`, SUM(`totalamt`) as tamt, `status` FROM `order_details` WHERE status='Added' and cid='$cid'");
					$qq = mysql_fetch_array($q);

					$tamt = $qq['tamt'];
					
				
					echo'<div class="row">
						<div class="col-xs-2"><img class="img-responsive" src="../admin/images/'.$image.'">
						</div>
						<div class="col-xs-4">
							<h4 class="product-name"><strong>'.$tname.'</strong></h4><h4><small><p>Price:'.$rate.'</p></small></h4>
						</div>
						<div class="col-xs-6">
							<div class="col-xs-6 text-right">
								<h6><strong>'.$rate.' <span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-xs-4">
								<input type="text" class="form-control input-sm" value="'.$qty.'">
							</div>
							<div class="col-xs-2">
								<a href="remove_cart.php?id='.$res[0].'&&ptype='.$res[3].'&&qty='.$res['qty'].'" class="btn btn-link btn-xs">
									<span class="glyphicon glyphicon-trash"> </span>
								</a>
							</div>
						</div>
					</div>
					<hr>';
					}
					?>
	
					<div class="row">
						<div class="text-center">
							<div class="col-xs-9">
								<h6 class="text-right">Added items?</h6>
							</div>
							<div class="col-xs-3">
								<button type="button" class="btn btn-default btn-sm btn-block">
									Update cart
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row text-center">
						<div class="col-xs-9">
							<h4 class="text-right">Total <strong><?php
							$cid = $_SESSION['cid'];
							$sql = mysql_query("SELECT * FROM `order_details` WHERE cid='$cid' and status='Added'");
							$count = mysql_num_rows($sql);
							if($count > 0)
							{
								echo $tamt; 
							}
							else
							{
								echo'0';
							}
							 
							 ?></strong></h4>
						</div>
						<?php
						$cid = $_SESSION['cid'];
						$ss = mysql_query("SELECT * FROM `customer_details` WHERE c_id='$cid'");
						$resc = mysql_fetch_array($ss);
						$pno = $resc['c_phone'];
						?>
						<div class="col-xs-3">
							<?php
							$cid = $_SESSION['cid'];
							$sql = mysql_query("SELECT * FROM `order_details` WHERE cid='$cid' and status='Added'");
							$count = mysql_num_rows($sql);
							if($count > 0)
							{
							?>
							<a href="order_qry.php?oid=<?php echo $order_id; ?>&&tamt=<?php echo $tamt; ?>&&pno=<?php echo $pno; ?>" class="btn btn-warning btn-block">
								Order
							</a>
							<?php
							}
							?>

						</div>
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