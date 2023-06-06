<?php
	
	$host = "localhost";

	$user = "root";

	$pass = "";

	$db = "attendance";

	$con=mysqli_connect($host, $user, $pass, $db) or die(mysql_error());
	mysqli_set_charset($con,'utf8');
?>