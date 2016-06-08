<?php
	session_start();
	include 'connectvars.php';
	
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
		<script type="text/javascript" src="ajax_login.js"></script>
	</head> 
	<body>
		<h1 class="heading">My Cart - Check Out</h1>
<?php
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
						<li class="active"><a href="shoppingcart.php">My Cart</a></li>
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
		<section class="checkout_body">
		
		<form method="post" action="process.php">
		<h3 class="heading" style='text-align:left'>1. User Info</h3>
			<table>
				<tr>
					<td>
						<label for="userName">User Name</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="userName" id="userName" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="password1">Password</label>
					</td>
					<td>
						<label for="password2">Repeat Password</label>
					</td>
				</tr>
				<tr>
					<td >
						<input style='margin-right:10px;' type="password" name="password1" id="password1" />
					</td>
					<td>
						<input type="password" name="password2" id="password2" />
					</td>
				</tr>
			</table>
		<section>
		<h3 class="heading" style='text-align:left'>2. Location</h3>
		<hr>
		<table>
			<tr>
				<td>
					<label for="address">Address</label>
				</td>
			<tr>
				<td colspan="3">
					<input type="text" size="60" name="address" id="address"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="city">City</label>
				</td>
				<td>
					<label for="State">State</label>
				</td>
				<td>
					<label for="zip">Zip</label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="city" id="city" />
				</td>
				<td>
					<input style='margin-right:10px;'type="text" name="state" id="state" size="5" />
				</td>
				<td>
					<input type="text" name="zip" id="zip" />
				</td>
			</tr>
			</tr>
		</table>
		</section>
			<input type="checkbox" name="accept" id="accept" />
			<label for="accept">I agree to the <a href="#">Terms of the Site</a></label>
			<div>
			<button type="submit" value="submit-button">
				Check Me Out!
			</button>
			</div>
			</form>
		</section>
		<div id="cart_nav">
<?php 
	echo "<label class='heading' style='color:black'> Cart Items : ".sizeof($_SESSION['cart'])." </label>";
	if (sizeof($_SESSION['cart']) < 1) {
		echo"You have nothing in your cart";
	} else {
		while (list ($key, $val) = each ($_SESSION['cart'])) { 
			echo "$key - $val <br>";
		}
		echo"<h5 style='color:green'>Total Price: ".$_SESSION['totalprice']."</h4>";
	}
?>
		</div>
		
	<footer>
		 CS 340 Project <a href="./">- Home -</a> Charles Siebert
	</footer>
</body>
</html>