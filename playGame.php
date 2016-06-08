<?php
	session_start();
	include 'connectvars.php';
	
	$userName = $_SESSION['valid_user'];
	$wincount = $_SESSION['wins'];
	$losscount = $_SESSION['loss'];
	$wager = 50;

	if(isset($_SESSION['valid_user'])) {
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$dbc) {
				die('Could not connect: ');
			}
	}
	$user_choice = $_REQUEST["user_choice"];
	
	$comp_choice = array(Rock, Paper, Scissors);
	$choice = rand(0,2);
	$computer = $comp_choice[$choice];
	
	if($user_choice == 'Scissors') {
		$user_img = "<img src='images/Scissors.png'>";
	}
	else if($user_choice == 'Paper') {
		$user_img =  "<img src='images/Paper.png'>";
	}
	else if($user_choice == 'Rock') {
		$user_img =  "<img src='images/Rock.png'>";
	}
	
	if($computer == 'Scissors') {
		$comp_img = "<img src='images/Scissors.png'>";
	}
	else if($computer == 'Paper') {
		$comp_img =  "<img src='images/Paper.png'>";
	}
	else if($computer == 'Rock') {
		$comp_img =  "<img src='images/Rock.png'>";
	}
	
	//$computer_pic = "<img src='images/'>"
	echo '<table><tr><th>You Picked:</th>';
	echo '<th>Computer Picked:</th></tr>';
	echo '<tr><td> ';
	print $user_img;
	echo '</td><td>';
	print $comp_img;
	echo '</td></tr></table>';

	if($user_choice == $computer) {
		echo '<p>Result : Draw!</p>';
		$_SESSION['wins'] = (int)$_SESSION['wins'];
		$tieq = "INSERT INTO GameRecords_CS340 (userName, winLossTie, wager) VALUE ('$userName', 'T', '$wager')";
		mysqli_query($dbc, $tieq);
		mysqli_close($dbc);
	}
		else if($user_choice == 'Rock' && $computer == 'Scissors'){
			echo '<p>Result : Win!</p>';
			$_SESSION['wins'] = (int)$_SESSION['wins'] +1;
			$wincount = $_SESSION['wins'];
			$winq = "INSERT INTO GameRecords_CS340 (userName, winLossTie, wager) VALUE ('$userName', 'W', '$wager')";
			mysqli_query($dbc, $winq);
			mysqli_close($dbc);
		}
		else if($user_choice == 'Rock' && $computer == 'Paper'){
			echo '<p>Result : Loss!</p>';
			$_SESSION['loss'] = (int)$_SESSION['loss'] +1;
			$losscount = $_SESSION['loss'];
			$lossq = "INSERT INTO GameRecords_CS340 (userName, winLossTie, wager) VALUE ('$userName', 'L', '$wager')";
			mysqli_query($dbc, $lossq);
			mysqli_close($dbc);
		}
		else if($user_choice == 'Paper' && $computer == 'Scissors'){
			echo '<p>Result : Loss!</p>';
			$_SESSION['loss'] = (int)$_SESSION['loss'] +1;
			$losscount = $_SESSION['loss'];
			$lossq = "INSERT INTO GameRecords_CS340 (userName, winLossTie, wager) VALUE ('$userName', 'L', '$wager')";
			mysqli_query($dbc, $lossq);	
			mysqli_close($dbc);
		}
		else if($user_choice == 'Paper' && $computer == 'Rock'){
			echo '<p>Result : Win!</p>';
			$_SESSION['wins'] = (int)$_SESSION['wins'] +1;
			$wincount = $_SESSION['wins'];
			$winq = "INSERT INTO GameRecords_CS340 (userName, winLossTie, wager) VALUE ('$userName', 'W', '$wager')";
			mysqli_query($dbc, $winq);
			mysqli_close($dbc);
		}
		else if($user_choice == 'Scissors' && $computer == 'Rock'){
			echo '<p>Result : Loss!</p>';
			$_SESSION['loss'] = (int)$_SESSION['loss'] +1;
			$losscount = $_SESSION['loss'];
			$lossq = "INSERT INTO GameRecords_CS340 (userName, winLossTie, wager) VALUE ('$userName', 'L', '$wager')";
			mysqli_query($dbc, $lossq);
			mysqli_close($dbc);
		}
		else if($user_choice == 'Scissors' && $computer == 'Paper'){
			echo '<p>Result : Win!</p>';
			$_SESSION['wins'] = (int)$_SESSION['wins'] +1;
			$wincount = $_SESSION['wins'];
			$winq = "INSERT INTO GameRecords_CS340 (userName, winLossTie, wager) VALUE ('$userName', 'W', '$wager')";
			mysqli_query($dbc, $winq);
			mysqli_close($dbc);
		}
	mysqli_free_result($result);
	mysqli_close($dbc);
?>
		<p>Wins: <?php echo $wincount; ?></p>
		<p>Losses: <?php echo $losscount; ?></p>