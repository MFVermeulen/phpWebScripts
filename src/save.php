<?php
	
	function save_entry($title, $entry, $date, $category, $author){
		
		$servername = "xxxx";
		$username = "xxxx";
		$password = "xxxx";
		$database = "xxxx";
		
		$dbconnect = mysqli_connect($servername, $username, $password, $database);
		
		if (!$dbconnect) {
    		die("Connection failed: " . mysqli_connect_error());
		}
		
		mysqli_query($dbconnect, "INSERT INTO entries(title,entry,date,category,author)
				VALUES('$title', '$entry', '$date', '$category', '$author')");
		
		$dbconnect->close();
		
	}

?>
