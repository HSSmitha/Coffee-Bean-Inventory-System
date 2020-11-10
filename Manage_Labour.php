	<?php
	session_start();
	include 'dbcon.php';
	?>

	<?php
	 if(isset($_POST['update']))
	{
		$editid=$_POST['uid'];
		$editname=$_POST['lname'];
		$editphone=$_POST['lphone'];
		$editemail=$_POST['lemail'];
		$editaddress=$_POST['laddress'];

	$sql =mysql_query("UPDATE labour_details SET  lname='$editname',
	lphone='$editphone', lemail='$editemail',
	 laddress='$editaddress' where lid='$editid'");
	if($sql)
				{
					echo "
					<script>
					alert('Labour information Updated Successfull');
					window.location='Manage_Labour.php';
					</script>
					";
				}
			else
				{

					echo "
					<script>
					alert('Update Failed');
					window.location='Manage_Labour.php';
					</script>
					";
				}

	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Manage Labour Details</title>
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


	
		<body>

			<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
    		<div class="navbar-header">
      		<a class="navbar-brand" href="#">Admin</a>
    		</div>
    		<ul class="nav navbar-nav">
	    			<li><a href="home.php">Dashboard</a></li>
					<li  class="active"><a href="Manage_Labour.php">Manage_Labour</a></li>
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
			
	    	
	<div class="container" style="margin-top:4%;">
	<div class="panel panel-info">
	<div class="panel-heading ">
		<center><h1><b>Labour Details</h1></b></center>
	</div>

		
	<div class="panel-body">
	<form class="form-horizontal" name="Manage_Labour" action="" method="post">
	<?php 
	if(isset($_GET['edit']))
	{
		$geteditid=$_GET['edit'];
		$editquery=mysql_query("select * from labour_details where lid='$geteditid'");
		$editrow=mysql_fetch_array($editquery);
		$editid=$editrow['lid'];
		if($geteditid==$editid)
		{
			
		?>
		
		<input type="hidden" readonly class="form-control" name="oid"
			 required value="<?php echo $_SESSION['oid']; ?>">
		<input type="hidden" name="uid" value="<?php echo $editrow['lid'];?>">


		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="lname">Labour Name</label></h4>
		<div class="col-sm-6">
			<input type="text"  value="<?php echo $editrow['lname'];?>"
			 class="form-control" name="lname"  pattern="[a-z A-Z]+" title="Only Letters" required placeholder="Enter Labour_Name">
		</div>	
		</div>

		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="lphone">Labour Phone</label></h4>
		<div class="col-sm-6">
			<input type="text" value="<?php echo $editrow['lphone'];?>" 
			class="form-control" name="lphone" pattern="(7|8|9)\d{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9" maxlength="10" required placeholder="Enter Labour_Phone Number">
		</div>
		</div>


		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="lemail" >Labour_EmailID</label></h4>
		<div class="col-sm-6">
			<input type="email" value="<?php echo $editrow['lemail'];?>"
			 class="form-control" name="lemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter proper EmailId" required placeholder="Enter Labour_EmailID">
		</div>	
		</div>

		<div class="form-group" >	
		<h4><label class="control-label col-sm-4" for="laddress">Labour Address</label></h4>
		<div class="col-sm-6">
			<input type="text" value="<?php echo $editrow['laddress'];?>"
			 class="form-control" name="laddress" pattern="[a-z A-Z]+" title="Only Letters"  required placeholder="Enter Labour_Address">
		</div>	
		</div>

		<div class="form-group">
		<center><input type="submit" class="btn btn-warning" value="Update" name="update"></center>
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
		<form class="form-horizontal" name="Manage_Labour" action="" method="post">

		
			<input type="hidden" readonly class="form-control" name="oid" 
			required value="<?php echo $_SESSION['oid']; ?>">
	

		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="lname">Labour Name</label></h4>
		<div class="col-sm-6">
			<input type="text"  class="form-control" name="lname" pattern="[a-z A-Z]+" title="Only Letters" 
			required placeholder="Enter Labour_Name">
		</div>	
		</div>

		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="lphone">Labour Phone</label></h4>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="lphone"  	pattern="(7|8|9)\d{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9" maxlength="10" 
			required placeholder="Enter Labour_Phone Number">
		</div>
		</div>


		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="lemail" >Labour EmailID</label></h4>
		<div class="col-sm-6">
			<input type="email"  class="form-control" name="lemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter proper EmailId"
			required placeholder="Enter Labour_EmailID">
		</div>	
		</div>



		<div class="form-group" >	
		<h4><label class="control-label col-sm-4" for="laddress">Labour Address</label></h4>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="laddress" " pattern="[a-z A-Z]+" title="Only Enter Letters" 
			 required placeholder="Enter Labour_Address">
		</div>	
		</div>

		<div class="form-group">
			<center><button type="submit" class="btn btn-warning" name="Add" >ADD</button></center>
			</div>	

	</form>
	</div>
	<?php
	}
	?>

	<?php
	$oid = $_SESSION['oid'];
	if (isset($_POST['Add'])) 
	{
		$Owner_ID=$_POST['oid'];
		$Labour_Name=$_POST['lname'];
		$Labour_Phone=$_POST['lphone'];
		$Labour_EmailID=$_POST['lemail'];
		$Labour_Address=$_POST['laddress'];


		$sql = mysql_query("select * from labour_details where lphone='$Labour_Phone' and o_id='$oid'");
		$pnum = mysql_num_rows($sql);
		$sql1 = mysql_query("select * from labour_details where lemail='$Labour_EmailID' and o_id='$oid'");
		$eenum = mysql_num_rows($sql1);
		if($pnum > 0 && $eenum>0)
		{
			echo"
			<script>
			alert('".$Labour_Phone." and ".$Labour_EmailID." already present in database');
			window.location='Manage_Labour.php';
			</script>
			";
		}
		else if($eenum > 0)
		{
			echo"
			<script>
			alert('".$Labour_EmailID." already present in database');
			window.location='Manage_Labour.php';
			</script>
			";
		}
		else if($pnum > 0)
		{
			echo"
			<script>
			alert('".$Labour_Phone." already present in database');
			window.location='Manage_Labour.php';
			</script>
			";
		}
		else
		{


		$q=mysql_query("INSERT INTO `labour_details`(`o_id`, `lname`, `lphone`, `lemail`, `laddress`) 
		VALUES ('$Owner_ID','$Labour_Name','$Labour_Phone','$Labour_EmailID','$Labour_Address')");

		if ($q) {
					echo "Labour added successfully";
				}
			else
				{
					echo "Error";
				}
			}
	}
	?>

	</div>
	

	
	<table class="table table-bordered">
	<tr style="background-color:skyblue;">
	<th>LABOUR NAME</th>
	<th>LABOUR PHONE</th>
	<th>LABOUR EMAILID</th>
	<th>LABOUR ADDRESS</th>
	<th>EDIT</th>
	<th>DELETE</th>
	</tr>
	<?php
	$lid = $_SESSION['oid'];
	$display_query=mysql_query("select * from labour_details where o_id='$lid'");
	while($row=mysql_fetch_array($display_query))
	{
		$editid=$row['lid'];	
	?>
	<tr>
	<td><?php echo $row['lname'];?></td>
	<td><?php echo $row['lphone'];?></td>
	<td><?php echo $row['lemail'];?></td>
	<td><?php echo $row['laddress'];?></td>
	<td><a class="btn btn-info" href="Manage_Labour.php?edit=<?php echo $editid;?>">Edit</a></td>
	<td><a class="btn btn-danger" onclick="return confirm('Are You Sure you want to delete');" 
	href="delete_labour.php?delete=<?php echo $editid;?>">Delete</a></td>
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
