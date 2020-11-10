	<?php
	session_start();
	include '../dbcon.php';
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
<li><a href="cart.php">Cart</a></li>
<li><a href="logout.php">Logout</a></li>
</a>
</ul>
</div>
</nav>



	 <div class="container" style="margin-top:4%;">
			<div class="panel panel-info">
			<div class="panel-heading ">
			<center><h1><b>Order Details</b></h1></center>
			</div>

			<div class="panel-body">
	<div class="rows">
		<?php
		$ptype = $_GET['ptype'];
		include('../dbcon.php');
		$sql = mysql_query("SELECT * FROM `type_bean_details` WHERE type_beanid='$ptype'");
		$rr = mysql_fetch_array($sql);
		$image = $rr['image'];
		?>
	<div class="col-md-4 thumbnail">
		<img class="img-responsive" src="../admin/images/<?php echo $image;?>">
	</div>
	<div class="col-md-8">
	<form class="form-horizontal" name="order_detail" action="" method="post">
		<input type="hidden" readonly class="form-control" name="cid" required value="<?php echo $_SESSION['cid']; ?>">
		<input type="hidden" class="form-control" name="oid" value="<?php echo $_GET['oid']; ?>" readonly>
		

		<div class="form-group" >
		<label class="control-label col-sm-2" for="oid">Product:</label>
		<div class="col-sm-10">
		<?php
		$ptype = $_GET['ptype'];
		include('../dbcon.php');
		$sql = mysql_query("SELECT * FROM `type_bean_details` WHERE type_beanid='$ptype'");
		$rr = mysql_fetch_array($sql);
		$pid = $rr[0];
		$pname = $rr['type_beanname'];
		?>
		<input type="hidden" class="form-control" name="pid" value="<?php echo $pid; ?>" readonly>
		<input type="text" class="form-control" name="ptype" value="<?php echo $pname; ?>" readonly>
		</div>	
		</div>

		<div class="form-group" >	
		<label class="control-label col-sm-2" for="rate">Rate_KG:</label>
		<div class="col-sm-10">
		<?php
		$ptype = $_GET['ptype'];
		include('../dbcon.php');
		$sql = mysql_query("SELECT * FROM `type_bean_details` WHERE type_beanid='$ptype'");
		$rr = mysql_fetch_array($sql);
		$pid = $rr[0];
		$rate = $rr['rate'];
		?>
			<input type="text" class="form-control" name="rate" id="rate"
			 required placeholder="Enter Rate_KG" value="<?php echo $rate; ?>" readonly>
		</div>	
		</div>
		<div class="form-group" >	
		<label class="control-label col-sm-2" for="rate">Available Qty:</label>
		<div class="col-sm-10">
			<?php
		$ptype = $_GET['ptype'];
		include('../dbcon.php');
		$sql = mysql_query("SELECT * FROM `product_details` WHERE p_type='$ptype'");
		$rr = mysql_fetch_array($sql);
		$qty = $rr['qty'];
		?>
		<input type="text" class="form-control" name="aqty" id="aqty" value="<?php echo $qty; ?>" readonly="Quantity">

		</div>
		</div>

		<div class="form-group" >	
		<label class="control-label col-sm-2" for="qty">Quantity:</label>
		<div class="col-sm-10">
		<input type="text" class="form-control" name="qty" id="qty" required placeholder="Enter Quantity" onchange="check()">
		</div>	
		</div>

		<div class="form-group" >	
		<label class="control-label col-sm-2" for="totalamt">Total_Amount:</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="totalamt" id="totalamt" required placeholder="Enter Total_Amount" readonly>
		</div>	
		</div>


		 <div class="form-group" style="margin-left: 85%;"> 
    	<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-warning" 
			name="Order">ORDER</button>
		</div>
		</div>	

	</form>
	</div>

	

	<?php
	$ccid = $_SESSION['cid'];
	if (isset($_POST['Order'])) 
	{
		$Customer_ID=$_POST['cid'];
		$Owner_ID=$_POST['oid'];
		$ptype = $_POST['pid'];
		$Quantity=$_POST['qty'];
		$Rate_KG=$_POST['rate'];
		$Total_Amount=$_POST['totalamt'];

		$zz = mysql_query("SELECT * FROM `order` WHERE cid='$ccid' and status='Added'");
		$count = mysql_num_rows($zz);
		if($count > 0)
		{
			$ss = mysql_query("SELECT * FROM `order` WHERE cid='$ccid' and status='Added'");
			$res = mysql_fetch_array($ss);
			$or_id = $res['order_id'];

			$query = mysql_query("INSERT INTO `order_details`(`order_id`,`cid`, `o_id`, `ptype`,`qty`, `rate`, `totalamt`, `status`)VALUES ('$or_id','$Customer_ID','$Owner_ID','$ptype','$Quantity','$Rate_KG','$Total_Amount','Added')");
			if($query)
			{
				$qry = mysql_query("UPDATE `product_details` SET `qty`=`qty`-'$Quantity' WHERE p_type='$ptype' and o_id='$Owner_ID'");

					echo "
					<script>
					alert('Order sent successfully');
					window.location='Product.php';
					</script>
					";
			}
		}

		else
		{
			$q=mysql_query("INSERT INTO `order`(`cid`, `o_id`, `status`, `o_date`) VALUES('$Customer_ID','$Owner_ID','Added',now())");

			$iid = mysql_insert_id();
			if ($q)
			{
				$sql = mysql_query("INSERT INTO `order_details`(`order_id`,`cid`, `o_id`, `ptype`,`qty`, `rate`, `totalamt`, `status`)VALUES ('$iid','$Customer_ID','$Owner_ID','$ptype','$Quantity','$Rate_KG','$Total_Amount','Added')");
				$qry = mysql_query("UPDATE `product_details` SET `qty`=`qty`-'$Quantity' WHERE p_type='$ptype'");

					echo "
					<script>
					alert('Order sent successfully');
					window.location='Product.php';
					</script>
					";
			}
			else
			{
				echo "
					<script>
					alert('Error');
					window.location='order_details.php';
					</script>
					";
			}
		}

	}
	?>



	
	</div>
	</div>
	</div>
	</div>
	
	<script type="text/javascript">
	function check(){

		var a=document.getElementById('qty').value;
		var aq = document.getElementById('aqty').value;
		var b=document.getElementById('rate').value;
		if(parseFloat(a) > parseFloat(aq))
		{
			alert('Quantity more than available quantity');
			document.getElementById('qty').value = "";
		}
		else
		{
			var c=a*b;
			document.getElementById('totalamt').value=c;
		}
	}
	</script>
	</body>
	</html>
