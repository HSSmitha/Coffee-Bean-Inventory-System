	<!DOCTYPE html>
	<html>
	<head>
		<title>Estaten Owner Login</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<?php
	include 'dbcon.php';

		if (isset($_POST['login'])) {
		$query=mysql_query("SELECT * FROM `owner_details` WHERE `eoemail`='$_POST[ename]' and `	eopassword`='$_POST[epass]' and `status`='Active'");
			if ($r=mysql_fetch_array($query)) 
			{
				session_start();
				$_SESSION['eid']=$r['eoid'];
				$_SESSION['owner'] = true;
				header("location:home.php");
			}
			else
			{
				echo "
				<script>
				alert('Invalid email-id or password');
				window.location='index.php';
				</script>
				";
			}
	}
	?>

		<body id="estate_log">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
    			<div class="navbar-header">
      				<a class="navbar-brand" href="#">Coffee Bean || Estate Owner</a>
    			</div>
	    		<ul class="nav navbar-nav">
	    			<li><a href="../index.php">Home</a></li>
					
				</ul>
			</div>
			</nav>
	<div class="container elogin">
	<div class="panel panel-info">
	<div class="panel-heading ">
	<center><h1>Forgot Password</h1></center>
	</div>


		<div class="panel-body">
		<div class="row">
		<div class="col-md-8" style="margin-left: 20%;">

			<?php
			if(isset($_GET['success']))
			{
				echo'<form method="post" class="form-group">
				<label>Enter Your OTP Number</label>
				<input type="text" name="otp" placeholder="OTP Number" class="form-control"><br/>
				<input type="submit" name="save" class="btn btn-primary" value="Submit">
			</form>';
			}
			else
			{
				echo'
				<form method="post" class="form-group">
				<label>Enter Your Mobile Number</label>
				<input type="text" name="mbno" placeholder="Mobile Number" class="form-control"><br/>
				<input type="submit" name="submit" class="btn btn-primary" value="Submit">
			</form>';
			}
			?>
		</div>
		<?php
		include('dbcon.php');
		if(isset($_POST['save']))
		{
			$otp = $_POST['otp'];
			$rr = mysql_query("SELECT * FROM `owner_otp` WHERE otp_number='$otp'");
			$count = mysql_num_rows($rr);
			if($count > 0)
			{
				$res = mysql_fetch_array($rr);
				$oid = $res[0];
				$id = $res[1];
				$ss = mysql_query("SELECT * FROM `owner_details` WHERE eoid='$id'");
				$rres = mysql_fetch_array($ss);
				$pno = $rres['eophone'];
				$pass = $rres['eopassword'];

				//Sms Function
						include('way2sms-api.php');
						$client = new WAY2SMSClient();
						$client->login('9611701335', 'hawk009');
						$client->send($pno, 'Your Password is "'.$pass.'"<--Coffee Day-->');

						sleep(1);
						$client->logout();
						//end

						$qry = mysql_query("DELETE FROM `owner_otp` WHERE ot_id='$oid'");

						header("location:index.php");
			}
			else
			{
				echo"
				<script>
				alert('OTP Number invalid');
				window.location='forgot_pass.php?success';
				</script>
				";
			}
		}
		?>

		<?php
		include('dbcon.php');
		if(isset($_POST['submit']))
		{
			$mbno = $_POST['mbno'];
			$sql = mysql_query("SELECT * FROM `owner_details` WHERE eophone='$mbno'");
			$count = mysql_num_rows($sql);
			if($count > 0)
			{
				$res = mysql_fetch_array($sql);
				$id = $res[0];
				$pno = $res['eophone'];
				// generate OTP
				$otp = rand(100000,999999);
				$ss = mysql_query("INSERT INTO `owner_otp`(`e_id`, `otp_number`) VALUES('$id','$otp')");
				if($ss == true)
				{
					//Sms Function
						include('way2sms-api.php');
						$client = new WAY2SMSClient();
						$client->login('9611701335', 'hawk009');
						$client->send($pno, 'Your OTP Number is "'.$otp.'". <--Coffee Day-->');

						sleep(1);
						$client->logout();
						//end

						header("location:forgot_pass.php?success");
				}
			}
			else{
				echo"
				<script>
				alert('phone number not registered');
				window.location='forgot_pass.php';
				</script>
				";
			}
		}
		?>
		</div>	
	</div>
	</div>
	</div>
	</body>
	</html>