<?php
	$conn = mysqli_connect("localhost", "root", "", "project_inv");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>