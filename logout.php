<?php
	session_start();
	$old_user = $_SESSION['valid_user'];
	unset($_SESSION['valid_user']);
	session_destroy();
?>
<!DOCTYPE html>
<head>
		<meta charset="utf-8">
		<title>Charles Siebert</title>
		<link rel="stylesheet" type="text/css" href="css/mystyles.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="validate.js"></script>
	</head> 
	<body>
		<h1 class="heading">Logging Out...</h1>
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
						<li><a href="RPS.php">Rock, Paper, Scissors</a></li>
						<li><a href="coinFlip.php">Coin Flip</a></li>
						<li><a href="store.php">Store</a></li>
						<li><a href="shoppingcart.php">My Cart</a></li>
						<li><a href="contact.html">How to Use</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li><a href="login_page.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
				</div>
			</div>
		</nav>

	<?php
		session_start();
		if (!empty($old_user)) {
			echo 'User: '.$old_user.' is logged out';
		} else {
			echo 'You were not logged in!';
		}
	?>
		<footer>
			CS 340 Project <a href="./">- Home -</a> Charles Siebert
		</footer>
	</body>
</html>

