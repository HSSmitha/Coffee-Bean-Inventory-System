<?php
include('../dbcon.php');
$id = $_GET['id'];
$status = $_GET['status'];
if($status=='block')
{
	$sql = mysql_query("UPDATE `owner_details` SET `status`='Block' WHERE eoid='$id'");
	if($sql == true)
	{
		header("location:manageowner.php");
	}
}
else
{
	$sql = mysql_query("UPDATE `owner_details` SET `status`='Active' WHERE eoid='$id'");
	if($sql == true)
	{
		header("location:manageowner.php");
	}
}
?>