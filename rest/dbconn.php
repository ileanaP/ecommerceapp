<?php

    $server_name = "localhost";
	
	$username = "root";
	
	$password = "";
	
	$db = "ticketing";
	
	$conn = mysqli_connect($server_name, $username, $password, $db);
	

	
	//Checker
	
	if(!$conn)
	{
		die("Connection failed: " . mysqli_connect_error());
		
	}
	else
	{
		echo "OK!";
	}

?>
