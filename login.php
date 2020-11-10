<?php
if (isset($_POST['submit']))
{
	$uname=$_POST['username'];
	$pass=$_POST['password'];
	include '../dbcon.php';
	$query=mysql_query("SELECT * FROM admin_login WHERE username='$uname' and
	password='$pass'");
	if ($r=mysql_num_rows($query)>0)
	{
		session_start();
		$_SESSION['admin'] = true;
		header("location:design_home.php");
	} 	
	else
	{
		header('location:index.php?id=1');
	}
} 
?>
