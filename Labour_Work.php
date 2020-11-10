		<?php
	include '../dbcon.php';
	session_start();
	?>

	<?php
	 if(isset($_POST['Update']))
	{
		$editid=$_GET['edit'];
		$editqty=$_POST['qty_cfe'];
		$editamttin=$_POST['amt_tin'];
		$edittotal=$_POST['total_amt'];

		$sql =mysql_query("UPDATE work_details SET  qty_cfe='$editqty',
		amt_tin='$editamttin',total_amt='$edittotal'
		  where lid='$editid'");

	if($sql)
				{
					echo "
					<script>
					alert('Labourwork information Updated Successfull');
					window.location='Labour_work.php';
					</script>
					";
				}
			else
				{

					echo "
					<script>
					alert('Update Failed');
					window.location='Labour_work.php';
					</script>
					";
				}

	}
	?>

	<!DOCTYPE html>
	<html>
	<head>
	<title>Labour Work Details</title>
	<meta charset="utf-8">
  				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
				<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="style.css">
				<script src="js/jquery.min(3.2.1).js"></script>
  				<script src="js/bootstrap.min(3.3.7).js"></script>
			</head>	
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
					<li class="active"><a  href="Labour_work.php">Manage_Labour_Work</a></li>
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
		

	<div class="container" style="margin-top:4%;">
	<div class="panel panel-info">
	<div class="panel-heading ">
		<center><h1><b>Labour Details</h1></b></center>
	</div>

		
	<div class="panel-body">
	<form class="form-horizontal" name="Labour_Work" action="" method="post">
		

	<?php 
	if(isset($_GET['edit']))
	{
		$geteditid=$_GET['edit'];
		$editquery=mysql_query("select * from work_details where
		 lid='$geteditid'");
		$editrow=mysql_fetch_array($editquery);
		$editid=$editrow['lid'];
		if($geteditid==$editid)
		{
			
		?>
		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="lid">Labour Name</label></h4>
		<div class="col-sm-6">
			<?php
			$editid=$_GET['edit'];
					$q=mysql_query("select * from labour_details where lid='$editid'");
					
					$r=mysql_fetch_array($q);
					$lname = $r['lname'];
				?>
				<input type="text" name="name" class="form-control"  pattern="[a-z A-Z]+" title="Only Letters"value="<?php echo $lname; ?>" readonly>
			<input type="hidden" name="wid" value="<?php echo $editrow['lid'];?>">
		</div>	
		</div>


		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="qty_cfe">Quantity Of CoffeeBean</label></h4>
		<div class="col-sm-6">
			<input type="number"  value="<?php echo $editrow['qty_cfe'];?>"
			 class="form-control" 
			name="qty_cfe" id="qty_cfe"   
			required placeholder="Enter Quantity_Of_CoffeeBean">
		</div>	
		</div>

		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="amt_tin">Amount Per Tin</label></h4>
		<div class="col-sm-6">
			<input type="number"  value="<?php echo $editrow['amt_tin'];?>"
			 class="form-control" name="amt_tin"  id="amt_tin" 
			 required placeholder="Enter amount per tin"  onchange="check()">
		</div>	
		</div>


		<div class="form-group" >	
		<h4><label class="control-label col-sm-4" for="total_amt">Total Amount</label></h4>
		<div class="col-sm-6">
			<input type="number" value="<?php echo $editrow['total_amt'];?>" class="form-control" 
			name="total_amt"  id="total_amt" required placeholder="Enter total amount">
		</div>	
		</div>

		<div class="form-group">
			<center><input type="submit" class="btn btn-warning" value="Update" 
			name="Update"></center>
		</div>	

		</form>

		  <?php
		}
	}
	else
	{

	?>   <div class="rows">
		<div class="col-md-12">
		<form class="form-horizontal" name="Labour_work" action="" method="post">
			<input type="hidden" name="oid" value="<?php echo $_SESSION['oid']; ?>">


		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="lname">Labour Name</label></h4>
		<div class="col-sm-6">
			<select name="lname" class="form-control" required>
			
				<option value="">select labour</option>
				<?php
				$ooid = $_SESSION['oid'];
					$q=mysql_query("select * from labour_details where lid not in(select lname from work_details where o_id='$ooid'");
					
					while ( $r=mysql_fetch_array($q)) 
					{
				?>
				<option value="<?php  echo $r['lid']; ?>"><?php  echo $r['lname']; ?></option>
					<?php
					 }
					   ?>	
			</select>
			
		</div>	
		</div>


		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="qty_cfe">Quantity Of CoffeeBean</label></h4>
		<div class="col-sm-6">
			<input type="number" class="form-control" name="qty_cfe" id="qty_cfe" 
			required placeholder="Enter Quantity_Of_CoffeeBean">
		</div>	
		</div>

		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="amt_tin">Amount Per Tin</label></h4>
		<div class="col-sm-6">
			<input type="number" class="form-control" name="amt_tin" id="amt_tin" 
			required placeholder="Enter Amount_Per_Tin" onchange="check()">
		</div>
		</div>

		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="total_amt" >Total Amount</label></h4>
		<div class="col-sm-6">
			<input type="number" class="form-control" name="total_amt" id="total_amt" 
			required placeholder="Enter Total_Amount">
		</div>	
		</div>


		<div class="form-group">
			<center><button type="submit" class="btn btn-warning" name="Add">ADD</button></center>
		</div>	

		
		</form>
	   </div>
		
		<?php
		}
		?>

	<?php

	if (isset($_POST['Add'])) 
	{
		$Labour_ID=$_POST['lid'];
		$Labour_name=$_POST['lname'];
		$oid = $_POST['oid'];
		$Quantity_Of_CoffeeBean=$_POST['qty_cfe'];
		$Amount_Per_Tin=$_POST['amt_tin'];
		$Total_Amount=$_POST['total_amt'];


	$q=mysql_query("INSERT INTO `work_details`(`lid`, `lname`,`o_id`,`qty_cfe`, `amt_tin`, `total_amt`,`w_date`) 
	VALUES ('$Labour_ID','$Labour_name','$oid','$Quantity_Of_CoffeeBean','$Amount_Per_Tin','$Total_Amount',now())");

		if ($q) 
			{
				echo "Labour Work Details added successfully";
			}
		else
			{
				echo "Error";
			}
	}
	?>

	</div>
	<div align="center">
	<?php
	if(isset($_GET['success']))
	{
		echo "Deleted";
	}
	?>

	
	<table class="table table-bordered">
	<tr style="background-color:skyblue;">
	<th>LABOUR NAME</th>
	<th>QUANTITY</th>
	<th>AMOUNT TIN</th>
	<th>TOTAL</th>
	<th>Date</th>
	<th>EDIT</th>
	<th>DELETE</th>
	</tr>

	<?php
	$oid = $_SESSION['oid'];
	$display_query=mysql_query("select * from work_details where o_id='$oid'");
	while($row=mysql_fetch_array($display_query))
	{
		$editid=$row['lid'];
		$labouridch=mysql_query("select * from labour_details where lid='$editid'");
	?>
	<tr>
	<td><?php while ($row1=mysql_fetch_array($labouridch)) {
		echo  $row1['lname'];  }  ?></td>
	<td><?php echo $row['qty_cfe'];?></td>
	<td><?php echo $row['amt_tin'];?></td>
	<td><?php echo $row['total_amt'];?></td>
	<td><?php echo $row['w_date'];?></td>
	<td><a class="btn btn-info" href="Labour_Work.php?edit=<?php echo $editid;?>">Edit</a></td>
	<td><a class="btn btn-danger" onclick="return confirm('Are You Sure you want to delete');" 
	href="delete_work.php?delete=<?php echo $editid;?>">Delete</a></td>
	</tr>

	<?php
	}
	?>
	</table>

	</div>
	</div>
	</div>
	</div>
	</div>
	

	<script type="text/javascript">
	function check(){

		var a=document.getElementById('amt_tin').value;

		var b=document.getElementById('qty_cfe').value;

		var c=a*b;
		document.getElementById('total_amt').value=c;
	}

	</script>
	</body>
	</html>











