<?php

	function userAuth($user, $pass){
	
		$servername = "xxxx";
		$username = "xxxx";
		$password = "xxxx";
		$database = "xxxx";
		
		$conn = mysqli_connect($servername, $username, $password, $database);
		
		if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
		}
	}

?>
