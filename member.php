<?php
	session_start();
	include 'connectvars.php';
 
	if ((isset($_POST['userName'])) && (isset($_POST['password'])) ){
		$userName = $_POST['userName'];
		$password = $_POST['password'];
		$hash = sha1($password);
	
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$dbc) {
			die('Could not connect: ');
		}
	
		$query = "SELECT * FROM Users_CS340 WHERE userName='$userName' and password='$hash'";
		$result = mysqli_query($dbc, $query);
	
		if (mysqli_num_rows($result) == 1) {
	
			// The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
			  $row = mysqli_fetch_array($result);
			  $_SESSION['valid_user'] = $row['userName'];
			  $_SESSION['cart'] = array();
			}
		mysqli_free_result($result);
		mysqli_close($dbc);
	}  

?>
<!DOCTYPE html>
<head>
		<meta charset="utf-8">
		<title>Charles Siebert</title>
		<link rel="stylesheet" type="text/css" href="css/mystyles.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head> 
	<body>
		<h1 class="heading">Members Only!</h1>
		<?php
			session_start();
			
			if(isset($_SESSION['valid_user'])) {
				$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				if (!$dbc) {
					die('Could not connect: ');
				}
				$query = "SELECT gamePoints FROM Users_CS340 WHERE userName='".$_SESSION['valid_user']."'";
				$result = mysqli_query($dbc, $query);
				$row = mysqli_fetch_array($result);
				$_SESSION['gamePoints'] = $row['gamePoints'];

				echo " <div style='float:right;right:0;top:40px;position:absolute;border:solid black 1px;background-color:#A1A1A1;margin-right:20px;padding:5px;'>";
				echo "You are logged in as : ".$_SESSION['valid_user']."</div>";
				echo " <div style='float:left;left:0;top:40px;position:absolute;border:solid black 1px;background-color:#A1A1A1;margin-left:20px;padding:5px;'>";
				echo "Total Game Points : ".$_SESSION['gamePoints']."</div>";
			}
		?>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="./">Gaming Bazaar</a>
				</div>
				<div>
					<ul class="nav navbar-nav">
						<li><a href="RPS.php">Rock, Paper, Scissors</a></li>
						<li><a href="coinFlip.php">Coin Flip</a></li>
						<li><a href="store.php">Store</a></li>
						<li><a href="shoppingcart.php">My Cart</a></li>
						<li><a href="contact.html">How to Use</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
						session_start();
						if (isset($_SESSION['valid_user'])) {
							echo '<li class="active"><a href="member.php"><span class="glyphicon glyphicon-user"></span> Members</a></li>';
						} else {
							echo '<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
						}
						?>
						<?php
						session_start();
						if (isset($_SESSION['valid_user'])) {
							echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>';
						} else {
							echo '<li class="active"><a href="login_page.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
						}
						?>
					</ul>
				</div>
			</div>
		</nav>
<?php
	session_start();
	if (isset($_SESSION['valid_user'])) {

		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
		
		$userName = $_SESSION['valid_user'];

		$query = "SELECT COUNT(*) FROM GameRecords_CS340 G1 WHERE G1.userName='$userName' AND G1.winLossTie='W' UNION SELECT COUNT(*) FROM GameRecords_CS340 G2 WHERE G2.userName='$userName' AND G2.winLossTie='L' UNION SELECT COUNT(*) FROM GameRecords_CS340 G3 WHERE G3.userName='$userName' AND G3.winLossTie='T'";
		$i = 0;
		$record = array();
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
		echo "<fieldset class='login_section'>";
		echo "<h1 class='heading'>Rock, Paper, Scissors</h1>";
		echo "<table align='center' border='1'><tr>";
		echo "<td><b>User Name</b></td><td><b>$userName</b></td>";
		echo "</tr>\n";
		while($row = mysqli_fetch_row($result)) {	
			foreach($row as $cell)
				if($i == 0) {
					echo "<tr><td><b>Wins: </b></td>";
				}
				else if ($i == 1) {
					echo "<tr><td><b>Losses: </b></td>";
				}
				else if ($i == 2) {
					echo "<tr><td><b>Ties: </b></td>";
				}
				array_push($record, $cell);
				echo "<td>".$record[$i]."</td>";
				$i += 1;
			echo "</tr>\n";
		}
		
		echo "<tr><td><b>Average: </b></td><td>".round($record[0]/($record[0]+$record[1]),2)."</td>";
		echo "</table></fieldset>";
		
		echo "</br>";
		
		$query = "SELECT COUNT(*) FROM GameRecords2_CS340 G1 WHERE G1.userName='$userName' AND G1.winLossTie='W' UNION SELECT COUNT(*) FROM GameRecords2_CS340 G2 WHERE G2.userName='$userName' AND G2.winLossTie='L'";
		$i = 0;
		$record = array();
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
		echo "<fieldset class='login_section'>";
		echo "<h1 class='heading'>Coin Flip</h1>";
		echo "<table align='center' border='1'><tr>";
		echo "<td><b>User Name</b></td><td><b>$userName</b></td>";
		echo "</tr>\n";
		while($row = mysqli_fetch_row($result)) {	
			foreach($row as $cell)
				if($i == 0) {
					echo "<tr><td><b>Wins: </b></td>";
				}
				else if ($i == 1) {
					echo "<tr><td><b>Losses: </b></td>";
				}
				array_push($record, $cell);
				echo "<td>".$record[$i]."</td>";
				$i += 1;
			echo "</tr>\n";
		}

		echo "<tr><td><b>Average: </b></td><td>".round($record[0]/($record[0]+$record[1]),2)."</td>";
		echo "</table></fieldset>";
		
		echo "</br>";
		
		$query = "SELECT * FROM OrderHistory_CS340 WHERE userName='$userName'";
		
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
		
		$fields_num = mysqli_num_fields($result);
		echo "<fieldset class='login_section'>";
		echo "<h1 class='heading'>Order History</h1>";
		echo "<table align='center' border='1'><tr>";
		// printing table headers
		for($i=0; $i<$fields_num; $i++) {	
			$field = mysqli_fetch_field($result);	
			echo "<td><b>{$field->name}</b></td>";
		}
		echo "</tr>\n";
		while($row = mysqli_fetch_row($result)) {	
			echo "<tr>";	
			// $row is array... foreach( .. ) puts every element
			// of $row to $cell variable	
			foreach($row as $cell)		
				echo "<td>$cell</td>";
			echo "</tr>\n";
		}
		echo "</table></fieldset>";
		
		mysqli_free_result($result);
		mysqli_close($conn);

	}
	else {
		if (isset($userName)) {
			// user tried but can't log in
			echo "<h3 class='heading'> Either your password or username is incorrect. </h3>";
		} else {
			// user has not tried
			echo "<h3 class='heading'> You need to log in. </h3> ";
		}
		// Log in form

		echo "<section class='login_section'>";
		echo "	<h3 class='heading'> Login! </h3>";
		echo "	<form method='POST' action='member.php'>";
		echo "	<div id='err_submit' style='color:red;'>";
		echo "	</div>";
		echo "	<p>";
        echo "    <label>Username: </label>";
        echo "    <input type='text' name='userName' onblur='checkUserName(this.value)'/>";
        echo " </p>";
		echo "	<br/>";
        echo " <p>";
        echo "    <label>Password: </label>";
        echo "    <input type='password' name='password' onblur='checkPassword(this.value)'/>";
		echo "	<br/>";
		echo "	<br/>";
        echo " </p>";
		echo "		<button type='submit' name='submit'>Log In</button>";
		echo "	</form>";
		echo "</section>";
	}	
?>
	<footer>
		 CS 340 Project <a href="./">- Home -</a> Charles Siebert
	</footer>
</body>

</html>		
			
		

