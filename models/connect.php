<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "db_marketing_vtc";

	// Create connection
	$conn = mysqli_connect($host, $user, $password, $database);
	mysqli_set_charset($conn, 'utf8mb4');

	// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	// echo "Connected successfully";
?>


