<?php
	session_start();
	include 'connectvars.php';
	
	$userName = $_SESSION['valid_user'];
	$wincount = $_SESSION['wins2'];
	$losscount = $_SESSION['loss2'];
	$wager = 50;
	
	if(isset($_SESSION['valid_user'])) {
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$dbc) {
				die('Could not connect: ');
			}
	}
	$user_choice = $_REQUEST["user_choice"];
	
	$comp_choice = array(Heads, Tails);
	$choice = rand(0,1);
	$computer = $comp_choice[$choice];
	
	if($user_choice == 'Heads') {
		$user_img = "<img src='images/heads.png'>";
	}
	else if($user_choice == 'Tails') {
		$user_img =  "<img src='images/tails.png'>";
	}
	
	if($computer == 'Heads') {
		$comp_img = "<img src='images/heads.png'>";
	}
	else if($computer == 'Tails') {
		$comp_img =  "<img src='images/tails.png'>";
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
		echo '<p>Result : Win!</p>';
		$_SESSION['wins2'] = (int)$_SESSION['wins2'] +1;
		$wincount = $_SESSION['wins2'];
		$tieq = "INSERT INTO GameRecords2_CS340 (userName, winLossTie, wager) VALUE ('$userName', 'W', '$wager')";
		mysqli_query($dbc, $tieq);
		mysqli_close($dbc);
	} else if($user_choice != $computer){
		echo '<p>Result : Loss!</p>';
		$_SESSION['loss2'] = (int)$_SESSION['loss2'] +1;
		$losscount = $_SESSION['loss2'];
		$lossq = "INSERT INTO GameRecords2_CS340 (userName, winLossTie, wager) VALUE ('$userName', 'L', '$wager')";
		mysqli_query($dbc, $lossq);
		mysqli_close($dbc);
	}
	
	mysqli_free_result($result);
	mysqli_close($dbc);
?>
		<p>Wins: <?php echo $wincount; ?></p>
		<p>Losses: <?php echo $losscount; ?></p>