<?php
	$servername = "xxxx";
	$username = "xxxx";
	$password = "xxxx";
	$database = "xxxx";
		
	$conn = mysqli_connect($servername, $username, $password, $database);
		
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

	session_start();// Start session
	$user_check=$_SESSION['login_user'];
    $sql = "SELECT `username` FROM `members` WHERE `username`='" . $user_check . "'";
	$ses_sql = $conn->query($sql);
	$row = $ses_sql->fetch_assoc();
	$login_session =$row['username'];
	if(!isset($login_session)){
		$conn->close(); 
		$error = "Please log in to continue..";
		header('Location: ../../index.php');
	}
?>
