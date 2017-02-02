<?php
	session_start(); // Start session
	$error='';
	 if($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST['uname']) || empty($_POST['psw'])) {
			$error = "Username or Password is invalid!";
		}
		else
		{
		// Define $username and $password
		$user=$_POST['uname'];
		$pass=$_POST['psw'];
		
		$servername = "xxxx";
		$username = "xxxx";
		$password = "xxxx";
		$database = "xxxx";
		
		$conn = mysqli_connect($servername, $username, $password, $database);
		
		if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
		}
		
		// Security purposes
		$user = stripslashes($user);
		$pass = stripslashes($pass);
		$user = mysqli_real_escape_string($conn, $user);
		$pass = mysqli_real_escape_string($conn, $pass);
		// Fetch information of registerd users and find user match.
		$sql = "SELECT * FROM `members` WHERE `password`='".$pass."' AND `username`='".$user."'";
		$query = $conn->query($sql);
		$rows = mysqli_num_rows($query);
		if ($rows == 1) {
			$_SESSION['login_user']=$user; // Initializing Session
			header("Location: backend/admin/index.php"); // Redirecting backend page
		} else {
			$error = "Username or Password is invalid!";
		}
		mysqli_close($conn);
		}
	}
?>
