<?php
	session_start();
	include 'connectvars.php';
	
	$userName = $_SESSION['valid_user'];
	$wincount = $_SESSION['wins'];
	$losscount = $_SESSION['loss'];
	
	if(isset($_SESSION['valid_user'])) {
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$dbc) {
				die('Could not connect: ');
			}
		$query = "SELECT gamePoints FROM Users_CS340 WHERE userName='".$_SESSION['valid_user']."'";
		$result = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($result);
		$_SESSION['gamePoints'] = $row['gamePoints'];
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
		<script src="rps.js"></script>
	</head> 
	<body>
		<h1 class="heading"> Rock Paper Scissors! </h1>
		<?php
			session_start();
			if (isset($_SESSION['valid_user'])) {
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
						<li class="active"><a href="RPS.php">Rock, Paper, Scissors</a></li>
						<li><a href="coinFlip.php">Coin Flip</a></li>
						<li><a href="store.php">Store</a></li>
						<li><a href="shoppingcart.php">My Cart</a></li>
						<li><a href="contact.html">How to Use</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
						session_start();
						if (isset($_SESSION['valid_user'])) {
							echo '<li><a href="member.php"><span class="glyphicon glyphicon-user"></span> Members</a></li>';
						} else {
							echo '<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
						}
						?>
						<?php
						session_start();
						if (isset($_SESSION['valid_user'])) {
							echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>';
						} else {
							echo '<li><a href="login_page.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
						}
						?>
					</ul>
				</div>
			</div>
		</nav>
	<div id="description">
		<h2 class="heading"> Rules </h2> 
		<div class="login_section" style="color:white">
			<br />
			Select the images below ( Rock, Paper, or Scissors ) to play against a robot.<br />
			Rock beats Scissors, Paper beats Rock, Scissors beats Paper. <br />
			Score will be tracked below.
			<br />
		</div>
	</div>
	<br/>
	<div style="text-align:center;color:white">
            <button type="button" class="btn" id="bet1" onclick="bet(1)">$1</button>
            <button type="button" class="btn" id="bet5" onclick="bet(5)">$5</button>
            <button type="button" class="btn" id="bet20" onclick="bet(20)">$20</button>
            <button type="button" class="btn" id="bet50" onclick="bet(50)">$50</button>
            <button type="button" class="btn" id="clearbet" onclick="clearbet()">Clear bet</button>
			<p>Bet: $<span id="betValue">0</span></p>
	</div>
	
      <div class="game">
         <label><input type="image" src="images/Rock.png" name="user_choice" value="Rock" onclick="playGame(this.value)" /></label>
         <label><input type="image" src="images/Paper.png" name="user_choice" value="Paper" onclick="playGame(this.value)" /></label>
			<label><input type="image" src="images/Scissors.png" name="user_choice" value="Scissors" onclick="playGame(this.value)" /></label>
		</div>
		<div id="images">
      </div>
	<footer>
		CS 340 Project <a href="./">- Home -</a> Charles Siebert
	</footer>
	</body>
</html>