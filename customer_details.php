	<!DOCTYPE html>
	<html>
	<head>
		<title>Customer Register</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<style>
	body
		{
		margin: 0;
		background-color:  pink;

		}
	</style>
	</head>


	<?php
	include '../dbcon.php';
	if (isset($_POST['register'])) 
	{
		
	$Customer_Name=$_POST['c_name'];
	$Customer_Phone=$_POST['c_phone'];
	$Customer_EmailID=$_POST['c_email'];
	$Customer_Address=$_POST['c_address'];
	$Customer_Password=$_POST['c_password'];
	$ConfirmPassword=$_POST['c_confirmpass'];



	$sql = mysql_query("select * from customer_details where c_phone='$Customer_Phone'");
		$pnum = mysql_num_rows($sql);
		$sql1 = mysql_query("select * from customer_details where c_email='$Customer_EmailID'");
		$eenum = mysql_num_rows($sql1);
		if($pnum > 0 && $eenum>0)
		{
			echo"
			<script>
			alert('".$Customer_Phone." and ".$Customer_EmailID." already present in database');
			window.location='customer_details.php';
			</script>
			";
		}
		else if($eenum>0)
		{
			echo"
			<script>
			alert('".$Customer_EmailID." already present in database');
			window.location='customer_details.php';
			</script>
			";
		}
		else if($pnum > 0)
		{
			echo"
			<script>
			alert('".$Customer_Phone." already present in database');
			window.location='customer_details.php';
			</script>
			";
		}
		else
		{

	       if ($Customer_Password==$ConfirmPassword) 
	       {

	  $q=mysql_query("INSERT INTO `customer_details`(`c_name`, `c_phone`, `c_email`, `c_address`, `c_password`,`status`) VALUES ('$Customer_Name','$Customer_Phone','$Customer_EmailID','$Customer_Address','$Customer_Password','Registered')");
		if ($q) 
				{
					//Sms Function
					include('way2sms-api.php');
					$client = new WAY2SMSClient();
					$client->login('9611701335', 'hawk009');
					$client->send($Customer_Phone, 'Registration Successfully Done...Please Wait For Admin Approval.! <--Coffee Day-->');

					sleep(1);
					$client->logout();
					//end

					header("location:customer_details.php?success");
				}
		else
				{
					header("location:customer_details.php?fail");
				}
		}
		else
				{
					header("location:customer_details.php?cpass");
				}
	}
}
	?>

	
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
    			<div class="navbar-header">
      				<a class="navbar-brand" href="#">Coffee Bean || Customer</a>
    			</div>
	    		<ul class="nav navbar-nav">
	    			<li><a href="index.php">Login</a></li>
					
				</ul>
			</div>
			</nav>
	<div class="container" style="margin-top:5%; width:50%;">
	<div class="panel panel-info">
	<div class="panel-heading ">
	<center><h1><b>Customer Form</b></h1></center>
	</div>

	<div class="panel-body">
		<form class="form-horizontal" name="Register" action="" method="post">

		<div class="form-group" >
		<label class="control-label col-sm-4" for="c_name">Customer_Name:</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="c_name" pattern="[a-z A-Z]+" title="Only Letters" required placeholder="Enter Customer_Name">
		</div>	
		</div>

		<div class="form-group" >
		<label class="control-label col-sm-4" for="c_phone">Customer_Phone:</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="c_phone" pattern="(7|8|9)\d{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9" maxlength="10"
			 required placeholder="Enter your PhoneNumber">
		</div>	
		</div>

		<div class="form-group" >
		<label class="control-label col-sm-4" for="c_address">Customer_Address:</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="c_address" pattern="[a-z A-Z]+" title="Only Letters"
			required placeholder="Enter your Address">
		</div>	
		</div>

		<div class="form-group" >
		<label class="control-label col-sm-4" for="c_email">Customer_EmailID:</label>
		<div class="col-sm-6">
			<input type="email" class="form-control" name="c_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter proper EmailId" 
			required placeholder="Enter Your EmailId">
		</div>
		</div>

		<div class="form-group" >
		<label class="control-label col-sm-4" for="c_password">Customer_Password:</label>
		<div class="col-sm-6">
			<input type="password" class="form-control"  id="password" name="c_password" pattern=".{6,}" title="Six or more characters"
			required placeholder="Enter Your Password">
		</div>	
		</div>

		<div class="form-group" >	
		<label class="control-label col-sm-4" for="c_confirmpass">CONFIRM PASSWORD:</label>
		<div class="col-sm-6">
			<input type="password" class="form-control" id="epassword"
			 name="c_confirmpass" required placeholder="Enter Your ConfirmPassword">
		  <span id='message'></span>
		</div>	
		</div>

		<div class="form-group">
			<center><button type="submit" class="btn btn-warning" 
			name="register">Register</button></center>
		</div>	

	</form>

		<?php
	if (isset($_GET['success'])) 
		{
				echo "Registration Successfull please <a href='index.php'>LOGIN</a> to continue";
		}
	?>

	<?php
	if (isset($_GET['cpass'])) 
		{
				echo "Registration Failed please enter proper email id";
		}
	?>
	
	</div>
	</div>
	</div>

		<script type="text/javascript">
		$('#password, #epassword').on('keyup', function () {	
	  if ($('#password').val() == $('#epassword').val()) {
	    $('#message').html('Matching').css('color', 'green');
	  } else 
	    $('#message').html('Not Matching').css('color','red');
	});
	</script>

	</body>
	</html>

