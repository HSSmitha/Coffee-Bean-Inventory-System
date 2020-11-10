s	<!DOCTYPE html>
	<html>
	<head>
		<title>News Image</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	</head>

	<?php
	include '../dbcon.php';

	$q=mysql_query("SELECT * FROM `news`"); 

	while ($r=mysql_fetch_array($q))
		 { 
		 	echo "<img src='../admin/images/".$r['image']."' height='100px' width='100px'>";

		 }

	?>

	</html>
