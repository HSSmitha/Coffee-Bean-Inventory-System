	<?php
	include '../dbcon.php';
	?>

	<?php
	 if(isset($_POST['update']))
		{
			$editid=$_POST['tid'];
			$edittypename=$_POST['type_beanname'];
			$editrate=$_POST['rate'];	
			
			$sql =mysql_query("UPDATE type_bean_details  SET type_beanname='$edittypename',
				rate='$editrate' where type_beanid='$editid'");
			if($sql)
				{
					echo "
					<script>
					alert('Records Updated Successfull');
					window.location='admin_dashboard.php';
					</script>
					";
				}
			else
				{

					echo "
					<script>
					alert('Update Failed');
					window.location='admin_dashboard.php';
					</script>
					";
				}

		}
	?>

	<?php
	if(isset($_POST['upload']))
		{
			$tid = $_GET['edit'];
			$editimage=$_FILES['image']['name'];
			$target="images/";
			if (move_uploaded_file($_FILES['image']['tmp_name'], $target.$editimage)) 
			$qry = mysql_query("UPDATE type_bean_details SET image='$editimage' where type_beanid='$tid'");
			if($qry)
				{
					echo "
					<script>
					alert('Records Updated Successfull');
					window.location='admin_dashboard.php';
					</script>
					";
				}
			else
				{

					echo "
					<script>
					alert('Update Failed');
					window.location='admin_dashboard.php';
					</script>
					";
				}
		}
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>type bean Details</title>
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
	    			<li ><a href="design_home.php">Dashboard</a></li>
					<li class="active"><a href="admin_dashboard.php">Type_Bean_Details</a></li>
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


	<div class="container" style="margin-top:4%;">
	<div class="panel panel-danger">
	<div class="panel-heading ">
		<center><h1><b> Coffee Bean Rate Updates</b></h1></center>
	</div>
		
	<div class="panel-body">
	<div class="row">
	<?php 
	if(isset($_GET['edit']))
	{
			$geteditid=$_GET['edit'];
			$editquery=mysql_query("select * from type_bean_details where type_beanid='$geteditid'");
			$editrow=mysql_fetch_array($editquery);
			$editid=$editrow['type_beanid'];
		{
			
	?>
				
				<div class="col-md-6">
				<center><h3><b>Update Bean Details</b></h3></center>
				<form class="form-horizontal" name="admin_dashboard.php" action="" method="post" 
			 	enctype="multipart/form-data">
				<div class="form-group">

				<h4><label class="control-label col-sm-4" for="type_beanname">Type Of Bean</label></h4>
				<div class="col-sm-6">
				<input type="text"  value="<?php echo $editrow['type_beanname'];?>" class="form-control" 
				name="type_beanname" required placeholder="Enter type_beanname">
				<input type="hidden" name="tid" value="<?php echo $editrow['type_beanid'];?>">
				</div>
				</div>

				<div class="form-group">
				<h4><label class="control-label col-sm-4" for="rate">Coffee Bean Rate</label></h4>
				<div class="col-sm-6">
				<input type="text" class="form-control" value="<?php echo $editrow['rate'];?>" 
				 name="rate" required placeholder="Enter Coffee_bean_rate">
				</div>
				</div>

				<div class="form-group">
				<center><input type="submit" class="btn btn-warning" value="update" 
				name="update"></center>
				</div>	
				</form>
				</div>
			
				<div class="col-md-6 ">
				<center><h3><b>Update Image Details</b></h3></center>
				<form class="form-horizontal" action="" method="post" 
			 	enctype="multipart/form-data">

			 	<div class="form-group" >
				<h4><label class="control-label col-sm-4" for="image">Image</label></h4>
				<div class="col-sm-6">
				<input type="file" class="form-control" name="image" value="<?php echo $editrow['image'];?>" required>
				</div>	
				</div>
				<div class="form-group">
				<center><input type="submit" class="btn btn-warning" value="update" 
				name="upload"></center>
				</div>	
				</form>
				</div>

		    <?php
	    }
	}
	else
	{

		?>
			
			<div class="col-md-12">
	     	<form  enctype="multipart/form-data"  action="" method="POST" class="form-horizontal">
	     	<div class="form-group">
			<h4><label class="control-label col-sm-4" for="type_beanname">Type Of Bean</label></h4>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="type_beanname" required placeholder="Enter type_beanname">
			</div>
			</div>

			<div class="form-group">
			<h4><label class="control-label col-sm-4" for="rate">Coffee Bean Rate</label></h4>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="rate" required placeholder="Enter Coffee_bean_rate">
			</div>
			</div>


			<div class="form-group" >
			<h4><label class="control-label col-sm-4" for="image">Image</label></h4>
			<div class="col-sm-6">
			<input type="file" class="form-control" name="image_name" required 
			placeholder="Enter image">
			</div>
			</div>


			<div class="form-group">
			<center><input type="submit" class="btn btn-warning" name="submit" 
			value="ADD"></center>
			</div>
			
			<?php 
			if(isset($_GET['success_add']))
			 	{
					echo "Information added Successfull";
				}
			?>

			</form>
			</div>
	<?php
	}
	?>

	<?php
	if(isset($_POST['submit'])) 
	 {
		
		$Type_of_bean=$_POST['type_beanname'];
		$Coffee_bean_rate=$_POST['rate'];
		$Image=$_FILES['image_name']['name'];
		$target="images/";

		$sql = mysql_query("select * from type_bean_details where type_beanname='$Type_of_bean'");
		$num = mysql_num_rows($sql);
		if($num > 0)
			{
				echo"
				<script>
				alert('".$Type_of_bean." already present in database');
				window.location='admin_dashboard.php';
				</script>
				";
			}
		else
			{
				if (move_uploaded_file($_FILES['image_name']['tmp_name'], $target.$Image)) 

				$query=mysql_query("INSERT INTO type_bean_details(type_beanname,rate,image)
				 VALUES ('$Type_of_bean','$Coffee_bean_rate','$Image')") or die(mysql_error($con));

				if ($query)
					{
					header("location:admin_dashboard.php?success_add");
					}
				else
					{
						echo "Error".$query;
					}
			}

	 }
	?>
	<div class="col-md-12">
	<table class="table table-bordered">
		<tr style="background-color:skyblue;">
		<th>BEAN NAME</th>
		<th>RATE</th>
		<th>IMAGE</th>
		<th>EDIT</th>
		<th>DELETE</th>
		</tr>
	<?php
		$display_query=mysql_query("select * from type_bean_details");
		while($row=mysql_fetch_array($display_query))
		{
			$editid=$row['type_beanid'];
	?>
	<tr>
	<td><?php echo $row['type_beanname'];?></td>
	<td><?php echo $row['rate'];?></td>
	<td><img class="img-responsive" width="100px" height="100px" src="images/<?php echo $row['image'];?>"> </td>
	<td><a class="btn btn-info" href="admin_dashboard.php?edit=<?php echo $editid;?>">Edit</a></td>
	<td><a class="btn btn-danger" onclick="return confirm('Are You Sure you want to delete');" 
	href="delete_type.php?delete=<?php echo $editid;?>">Delete</a></td>
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
	</div>
	</body>
	</html>



	






















































