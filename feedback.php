	<!DOCTYPE html>
	<html>
	<head>
		<title>Feedback Details</title>
		<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
 

		<?php
		include '../dbcon.php';
		session_start();
		?>

		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
    		<div class="navbar-header">
      		<a class="navbar-brand" href="#">Customer</a>
    		</div>
    		<ul class="nav navbar-nav">
    		<li><a href="home.php">Dashboard</a></li>
					<li ><a href="Product.php">Product</a></li>
					<li class="active"><a href="feedback.php">Feedback</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="cart.php">Cart</a></li>
					<li><a href="logout.php">Logout</a></li>
				</a>
				</ul>
			</div>
			</nav>


	<div class="container" style="margin-top:4%;">
	<div class="panel panel-danger">
	<div class="panel-heading ">
		<center><h1><b>Feedback Details</h1></b></center>
	</div>

		
	<div class="panel-body">
	<form class="form-horizontal" name="feedback" action="" method="post">
			
		
			<input type="hidden" readonly class="form-control" name="cid" 
			required  value="<?php echo $_SESSION['cid']; ?>">
		
		
		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="oid">Owner Name</label></h4>
		<div class="col-sm-6">
			<select class="form-control" name="oid">
				<option selected disabled>Select Estate Owner</option>
				<?php
				include('../dbcon.php');
				$sql = mysql_query("select * from owner_details");
				while($row = mysql_fetch_array($sql))
				{
					echo"<option value=".$row['eoid'].">".$row['eoname']."</option>";
				}
				?>
			</select>
		</div>	
		</div>
		<div class="form-group" >
		<h4><label class="control-label col-sm-4" for="feedback">Feedback</label></h4>
		<div class="col-sm-6">
			<textarea class="form-control" cols="7" rows="7" name="feedback" 
			required placeholder="Enter Your Feedback"></textarea>
		</div>	
		</div>

		<div class="form-group">
			<center><button type="submit" class="btn btn-warning" 
			name="Send">SEND</button></center>
		</div>	

	</form>
	</div>

	<?php
	if (isset($_POST['Send'])) 
	{

	$cid=$_POST['cid'];
	$oid = $_POST['oid'];
	$Feedback=$_POST['feedback'];

	$q=mysql_query("INSERT INTO `feedback_details`(`cid`,`oid`, `feedback`,`f_date`) VALUES ('$cid','$oid','$Feedback',now())");
		if ($q)
			{
				echo "Feedback send successfully";
			}
		else
			{
				echo "Error";
			}
	}
	?>

	</div>
	</div>
	</div>
	</body>
	</html>
