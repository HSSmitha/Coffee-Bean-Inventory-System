	<!DOCTYPE html>
	<html>
	<head>
		<title>Estate Owner Register</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
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
	include 'dbcon.php';
	if (isset($_POST['register']))
	{
		
		$name=$_POST['eoname'];
		$adress=$_POST['eoaddress'];
		$phone=$_POST['eophone'];
		$email=$_POST['eoemail'];
		$password=$_POST['eopassword'];
		$ConfirmPassword=$_POST['eoconfirmpass'];

		$sql = mysql_query("select * from owner_details where eophone='$phone'");
		$pnum = mysql_num_rows($sql);
		$sql1 = mysql_query("select * from owner_details where eoemail='$email'");
		$eenum = mysql_num_rows($sql1);
		if($pnum > 0 && $eenum>0)
		{
			echo"
			<script>
			alert('".$phone." and ".$email." already present in database');
			window.location='register.php';
			</script>
			";
		}
		else if($eenum>0)
		{
			echo"
			<script>
			alert('".$email." already present in database');
			window.location='register.php';
			</script>
			";
		}
		else if($pnum > 0)
		{
			echo"
			<script>
			alert('".$phone." already present in database');
			window.location='register.php';
			</script>
			";
		}
		else
		{

	       if ($password==$ConfirmPassword) 
	       {
	       	
			$q=mysql_query("INSERT INTO `owner_details`( `eoname`, `eoaddress`, 
			`eophone`, `eoemail`, `eopassword`,`status`)
			 VALUES ('$name','$adress','$phone','$email','$password','Registered')");
			if ($q) {
						//Sms Function
						include('way2sms-api.php');
						$client = new WAY2SMSClient();
						$client->login('9611701335', 'hawk009');
						$client->send($phone, 'Registration Successfully Done...Please Wait For Admin Approval.! <--Coffee Day-->');

						sleep(1);
						$client->logout();
						//end
						header("location:register.php?success");
					}
				else
					{
						header("location:register.php?fail");
					}
		}

	}

}
	?>


	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
    			<div class="navbar-header">
      				<a class="navbar-brand" href="#">Coffee Bean || EstateOwner</a>
    			</div>
	    		<ul class="nav navbar-nav">
	    			<li><a href="index.php">Login</a></li>
					
				</ul>
			</div>
			</nav>
	<div class="container" style="margin-top:10

	%; width:50%;">
	<div class="panel panel-danger">
	<div class="panel-heading ">
		<center><h1><b>REGISTER FORM</b></h1></center>
	</div>


	<div class="panel-body">
		<form class="form-horizontal" name="Register" action="" method="post">
		<div class="form-group" >
		<label class="control-label col-sm-4" for="eoname">NAME:</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" pattern="[a-z A-Z]+" title="Only Letters" name="eoname" 
			required placeholder="Enter Your Username">
		</div>	
		</div>

		<div class="form-group" >
		<label class="control-label col-sm-4" for="eoaddress">ADDRESS:</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" pattern="[a-z A-Z]+" title="Only Enter Letters" name="eoaddress" 
			required placeholder="Enter Your Address">
		</div>	
		</div>

		<div class="form-group" >
		<label class="control-label col-sm-4" for="eophone">PHONE:</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="eophone" 
			pattern="(7|8|9)\d{9}" title="Phone number should starts with 7-9 and remaing 9 digit with 0-9" maxlength="10" required placeholder="Enter Your PhoneNumber">
		</div>	
		</div>

		<div class="form-group" >
		<label class="control-label col-sm-4" for="eoemail">EMAIL:</label>
		<div class="col-sm-6">
			<input type="email" class="form-control" name="eoemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter proper format EmailId" 
			required placeholder="Enter Your EmailId">
		</div>
		</div>

		<div class="form-group" >
		<label class="control-label col-sm-4" for="eopassword" >PASSWORD:</label>
		<div class="col-sm-6">
			<input type="password" class="form-control" id="password" 
			 pattern=".{6,}" title=" Password should be Six or more characters"
			name="eopassword" required placeholder="Enter Your Password">
		</div>	
		</div>

		<div class="form-group" >	
		<label class="control-label col-sm-4" for="eoconfirmpass">CONFIRM PASSWORD:</label>
		<div class="col-sm-6">
			<input type="password" class="form-control" id="cpassword"
			 name="eoconfirmpass" required placeholder="Enter Your ConfirmPassword">
		  <span id='message'></span>
		</div>	
		</div>

		<div class="form-group">
			<center><button type="submit" class="btn btn-info" 
			name="register">REGISTER</button></center>
		</div>	

	</form>

	<?php
	if (isset($_GET['success'])) 
		{
				echo "Registration Successfull please <a href='index.php'>LOGIN</a> to continue";
		}
	?>

	</div>
	</div>
	</div>

	<script type="text/javascript">
		$('#password, #cpassword').on('keyup', function () {	
	  if ($('#password').val() == $('#cpassword').val()) {
	    $('#message').html('Matching').css('color', 'green');
	  } else 
	    $('#message').html('Not Matching').css('color','red');
	});
	</script>
	</body>
	</html>