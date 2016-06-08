<!DOCTYPE html>
<head>
		<meta charset="utf-8">
		<title>Charles Siebert</title>
		<link rel="stylesheet" type="text/css" href="css/mystyles.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="ajax_login.js"></script>
	</head> 
	<body>
		<h1 class="heading">Login Page</h1>
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
							echo '<li class="active"><a href="login_page.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
						}
						?>
					</ul>
				</div>
			</div>
		</nav>
		
		<section class="login_section">
			<h3 class="heading"> Login! </h3>
			<form method="POST" action="member.php">
			<div id="err_submit" style="color:red;">
			</div>
			<p>
            <label>Username: </label>
            <input type="text" name="userName" onblur="checkUserName(this.value)"/>
         </p>
			<br/>
         <p>
            <label>Password: </label>
            <input type="password" name="password" onblur="checkPassword(this.value)"/>
			<br/>
			<br/>
         </p>
				<button type="submit" name="submit">Log In</button>
			</form>
		</section>
		
		<footer>
		 CS 340 Project <a href="./">- Home -</a> Charles Siebert
		</footer>
	</body>

</html>	
			