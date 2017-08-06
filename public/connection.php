<?php

	$con;
	
	if($con = new mysqli("localhost", "root", "", "dbbarangay")) {
		//echo "Connected!<br>";
	} else {
		die("Could not connect " . mysqli_error($con));
	}
	
	mysqli_select_db($con, "dbbarangay");
	
?>