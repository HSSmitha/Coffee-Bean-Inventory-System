	<?php
	include 'dbcon.php';
	session_start();
	?>

	<?php
	 if(isset($_POST['Update']))
	{
		$editid=$_GET['edit'];
		$editptype=$_POST['p_type'];
		$editqty=$_POST['qty'];


		$sql =mysql_query("UPDATE product_details SET p_type='$editptype',`qty`=`qty`+'$editqty' where p_id='$editid'");

		if($sql)
				{
					echo "
					<script>
					alert('product information Updated Successfull');
					window.location='Product.php';
					</script>
					";
				}
			else
				{

					echo "
					<script>
					alert('Update Failed');
					window.location='Product.php';
					</script>
					";
				}

	}
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Product Details</title>
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
					background-color:pink;

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
					<li class="active"><a href="Product.php">Product_Details</a></li>
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
		<center><h1><b>Product Details</h1></b></center>
	</div>

		
	<div class="panel-body">
	<form  enctype="multipart/form-data"  action="" method="POST" class="form-horizontal">

	<?php 
	if(isset($_GET['edit']))
	{
		$geteditid=$_GET['edit'];
		$editquery=mysql_query("select * from  product_details INNER JOIN 
			type_bean_details on type_beanid=p_type where
		 p_id='$geteditid'");
		$editrow=mysql_fetch_array($editquery);
		$editid=$editrow['p_id'];
		// if($geteditid==$editid)
		// {
	
			?>

		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="oid">Owner ID</label></h4>
		<div class="col-sm-6">
			<input type="text" readonly class="form-control" name="oid"
			 required value="<?php echo $_SESSION['oid']; ?>">
			 <input type="hidden" name="pid" value="<?php echo $editrow['p_id'];?>">
		</div>	
		</div>


		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="p_type">Product Type</label></h4>
		<div class="col-sm-6">
			<select name="p_type" readonly class="form-control"
			 required>
			
				<option value="<?php  echo $editrow['p_type']; ?>"><?php  echo $editrow['type_beanname']; ?></option>
				<?php
					$q=mysql_query("select * from type_bean_details");
					
					while ( $r=mysql_fetch_array($q)) 
					{
				?>
				<option value="<?php  echo $r['type_beanid']; ?>"><?php  echo $r['type_beanname']; ?></option>
					<?php
					 }
					?>
					
					
			</select>
		</div>	
		</div>	


		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="qty">Quantity In KG</label></h4>
		<div class="col-sm-6">
			<input type="number" class="form-control" name="qty" value="<?php echo $editrow['qty'];?>" 
			required placeholder="Enter Quantity_Of_Coffee">
		</div>	
		</div>


		


		<div class="form-group">
			<center><input type="submit" class="btn btn-warning" value="Update" 
			name="Update"></center>
		</div>	

	</form>

	<?php
	// }
	}
	else
	{

		?>

		<div class="rows">
		<div class="col-md-12">
		<form  enctype="multipart/form-data"  action="" method="POST" class="form-horizontal">

		
			<input type="hidden" readonly class="form-control" name="oid" value="<?php echo $_SESSION['oid']; ?>" required>
		

		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="p_type">Product Type</label></h4>
		<div class="col-sm-6">
			<select name="p_type" class="form-control" required>
			
				<option value="">select product type</option>
				<?php
			$q=mysql_query("select * from type_bean_details where type_beanid not in(select p_type from product_details where o_id='$_SESSION[oid]')   ");
					
					while ( $r=mysql_fetch_array($q)) 
					{
				?>
				<option value="<?php  echo $r['type_beanid']; ?>"><?php  echo $r['type_beanname']; ?></option>
					<?php
					 }
					   ?>
					
			</select>
		</div>	
		</div>	

		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="qty">Quantity In KG</label></h4>
		<div class="col-sm-6">
			<input type="number" class="form-control" name="qty" required placeholder="Enter Quantity_Of_Coffee">
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
		$Owner_ID=$_POST['oid'];
		$Product_Type=$_POST['p_type'];
		$Quantity=$_POST['qty'];
		
	$q=mysql_query("INSERT INTO `product_details`(`o_id`, `p_type`, `qty`)
	 VALUES ('$Owner_ID','$Product_Type','$Quantity')");
	if ($q)
		 {
		 	header("location:Product.php");
			echo "Product added successfully";
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
	<th>PRODUCT-TYPE</th>
	<th>QUANTITY</th>
	<th>IMAGE</th>
	<th>EDIT</th>
	<th>DELETE</th>
	</tr>


	<?php
	$oid = $_SESSION['oid'];
	$display_query=mysql_query("select * from product_details INNER JOIN type_bean_details on type_beanid=p_type WHERE o_id='$oid'");
	while($row=mysql_fetch_array($display_query))
	{
		$editid=$row['p_id'];
	?>

	<tr>
	<td><?php echo $row['type_beanname'];?></td>
	<td><?php echo $row['qty'];?></td>
	<td><img class="img-responsive" width="100px" height="100px" src="../admin/images/<?php echo $row['image'];?>"> </td>
	<td><a  class="btn btn-info" href="Product.php?edit=<?php echo $editid;?>">Edit</a></td>
	<td><a class="btn btn-danger" onclick="return confirm('Are You Sure you want to delete');" 
	href="delete_product.php?delete=<?php echo $editid;?>">Delete</a></td>
	</tr>

	<?php
	}
	?>
	</table>

</div>
</div>
</div>
</div>
	</body>
	</html>

