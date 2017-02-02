<?php

function loadentries($category){
	$servername = "xxxx";
	$username = "xxxx";
	$password = "xxxx";
	$database = "xxxx";
		
	$dbconnect = mysqli_connect($servername, $username, $password, $database);
		
	if (!$dbconnect) {
    	die("Connection failed: " . mysqli_connect_error());
	}
  
	$num_rows = mysqli_num_rows($dbconnect->query("SELECT * FROM `entries`"));
	
	if($category == "all"){
		$sql = "SELECT DATE_FORMAT(date, '%d/%m/%y') AS date, category, author, title, entry FROM `entries` ORDER BY DATE_FORMAT(`date`,'%y/%m/%d') DESC";
	} else {
		$sql = "SELECT DATE_FORMAT(date, '%d/%m/%y') AS date, category, author, title, entry FROM `entries` WHERE `category`='".$category."' ORDER BY DATE_FORMAT(`date`,'%y/%m/%d') DESC";
	}
	
	$result = $dbconnect->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
        	echo "<h1>" . $row["title"]. "</h1> | published: " . $row["date"]. " |<br><br><br>" . html_entity_decode($row["entry"]) . "<br><br><br> | category: " . $row["category"]. " | author: " . $row["author"] . " |<br><br><hr class='separator'>";
    	}
		
	} else {
    	echo "0 results";
	}
	
	$dbconnect->close();
}
?>
