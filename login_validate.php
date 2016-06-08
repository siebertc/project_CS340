<?php
	session_start();
	include 'connectvars.php';
	$_SESSION['uName'] = $_REQUEST['userName'];
	$userName = $_SESSION['uName'];
	$password = $_REQUEST['password'];
	if (isset($userName) ) {
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$userName = mysqli_real_escape_string($dbc, trim($userName));

		if (!$dbc) {
			die('Could not connect: ');
		}
		$query = "SELECT * FROM Users_CS340 WHERE userName='$userName' ";

		$result = mysqli_query($dbc, $query);
	
		if (mysqli_num_rows($result) == 1) {
			}
		else {
			$response = "That username is not in the database.";
			echo $response;
		}
		mysqli_free_result($result);
		mysqli_close($dbc);
	}  
	
	else if(isset($password)) {
		
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$hash = sha1($password); 
		
		if (!$dbc) {
			die('Could not connect: ');
		}
		$query = "SELECT * FROM Users_CS340 WHERE password='$hash'";

		$result = mysqli_query($dbc, $query);
		
		if (mysqli_num_rows($result) == 1) {
			}
		else {
			$response = "Invalid username or password.";
			echo $response;
		}
		mysqli_free_result($result);
		mysqli_close($dbc);
	}  
?>