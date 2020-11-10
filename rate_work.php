	<?php
	include 'dbcon.php';
	?>
		
	<?php
	 if(isset($_POST['Update']))
	{
		$editid=$_POST['rwid'];
		$editwork_name=$_POST['work_name'];		
		$editrate=$_POST['rate'];

		$sql =mysql_query("UPDATE rate_work_details SET work_name='$editwork_name' ,rate='$editrate' WHERE rateid='$editid'");

		if($sql)
		{
					echo "
					<script>
					alert('Labours coffee rate per work information Updated Successfull');
					window.location='rate_work.php';
					</script>
					";
				}
			else
				{

					echo "
					<script>
					alert('Update Failed');
					window.location='rate_work.php';
					</script>
					";
				}
	}
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Rate work Details</title>
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

	<?php
	session_start();
	//$oid=$_SESSION['oid'];
	?>

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
					<li class="active"><a href="rate_work.php">Rate_Per_Work</a></li>
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
	<form class="form-horizontal" name="rate_work.php" action="" method="post" >

	<?php 
	if(isset($_GET['edit']))
	{
		$geteditid=$_GET['edit'];
		$editquery=mysql_query("select * from rate_work_details where
		rateid='$geteditid'");
		$editrow=mysql_fetch_array($editquery);
		$editid=$editrow['rateid'];
		if($geteditid==$editid)
		{

		?>
		

		<input type="hidden" readonly class="form-control" name="oid"
			 required value="<?php echo $_SESSION['oid']; ?>">
		<input type="hidden" name="rwid" value="<?php echo $editrow['rateid'];?>">		


		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="work_name">Work Name</label></h4>
		<div class="col-sm-6">
			<input type="text" value="<?php echo $editrow['work_name'];?>"  class="form-control"
			name="work_name" required placeholder="Enter work_name">	 
		</div>	
		</div>

		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="rate">Rate</label></h4>
		<div class="col-sm-6">
			<input type="number" value="<?php echo $editrow['rate'];?>"  class="form-control"
			name="rate" required placeholder="Enter rate">	 
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

		?>
        <div class="rows">
		<div class="col-md-12">
		<form class="form-horizontal" name="rate_work.php" action="" method="post" >

	
			<input type="hidden" readonly class="form-control" name="o_id" 
			required value="<?php echo $_SESSION['oid']; ?>">
		
		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="work_name">Work Name</label></h4>
		<div class="col-sm-6">
		<input type="text" class="form-control" name="work_name" required placeholder="Enter Work_name">
		</div>	
		</div>

		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="rate">Rate</label></h4>
		<div class="col-sm-6">
		<input type="number" class="form-control" name="rate" required placeholder="Enter Rate">
		</div>	
		</div>
		
		<div class="form-group">
		<center><input type="submit" class="btn btn-warning"  value="ADD" name="Add"></center>
		</div>

	</form>
	   </div>
		

	<?php
	}
	?>

	<?php
	if (isset($_POST['Add'])) 
	{
		
		$Owner_ID=$_POST['o_id'];
		$Work_name=$_POST['work_name'];
		$Rate=$_POST['rate'];


	$q=mysql_query("INSERT INTO `rate_work_details`( `o_id`,`work_name`,`rate`) VALUES ('$Owner_ID','$Work_name','$Rate')");

	if ($q) {
				echo "Rate added successfully";
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

	<th>WORK NAME</th>
	<th>RATE</th>
	<th>EDIT</th>
	<th>DELETE</th>
	</tr>

	<?php
	$rateid = $_SESSION['oid'];
	$display_query=mysql_query("select * from rate_work_details where o_id='$rateid'");
	while($row=mysql_fetch_array($display_query))
		{
			$editid=$row['rateid'];
			
		?>

	<tr>
	<td><?php echo $row['work_name'];?></td>
	<td><?php echo $row['rate'];?></td>
	<td><a class="btn btn-info" href="rate_work.php?edit=<?php echo $editid;?>">Edit</a></td>
	<td><a  class="btn btn-danger" onclick="return confirm('Are You Sure you want to delete');" 
	href="delete_workrate.php?delete=<?php echo $editid;?>">Delete</a>
</td>
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
	</body>
	</html>
