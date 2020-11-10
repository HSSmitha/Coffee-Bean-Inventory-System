<!DOCTYPE html>
<html>
<head>
	<title>News</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>

<?php
include '../dbcon.php';

$sql=mysql_query("SELECT * FROM `product_details`");

while($r=mysql_fetch_array($sql))
	{

		echo "p_id:".$r["p_id"]."<br>";
		echo "oid:".$r["oid"]."<br>";
		echo "p_type:".$r["p_type"]."<br>";
	}

?>
	<body>
<div class="form-group">
		<center><button type="submit" class="btn btn-warning" name="View">View</button></center>
	</div>

	</body>
	</html>
	