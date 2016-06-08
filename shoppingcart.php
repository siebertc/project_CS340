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
		<h1 class="heading">My Shopping Cart</h1>
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
			<div id="cart_container">
			<?php
			
				echo "<h1 class='heading'> Your Shopping Cart </h1>";
				echo "<h3 style='color:red'>".$_SESSION['fail']."</h3>";
				unset($_SESSION['fail']);
				if (sizeof($_SESSION['cart']) < 1) {
					echo"You have nothing in your cart";
				} else {
					echo "<form method='post' action='removeItemCart.php'>";
					echo "<table><tr><th>Product Name: </th><th>Price:</th><th><input type='submit' value='Remove Items' style='color:black;'></th></tr>";
					while (list ($key, $val) = each ($_SESSION['cart'])) {
						
						$query = "SELECT price FROM Inventory_CS340 WHERE prodName='$val'";
						$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
						$results = mysqli_query($dbc, $query);
						$row = mysqli_fetch_array($results);
						
						$price = $row['price'];
						echo "<tr><td>".$val."</td><td>".$price."</td><td>";
						echo "<input type='checkbox' name='item[]' value='$key'></td></tr>";
						$totalprice += $price;
						$_SESSION['totalprice'] = $totalprice;
					}echo"</table>";
					echo "</form>";
					echo"<h4 class='heading' style='color:green'>Total Price: ".$_SESSION['totalprice']."</h4>";
				}
			?>
			<form method="post" action="checkOut.php">
				<button class ="catbtn" type="submit" name="CheckOut" value="Submit">
				Check Me Out!</button>
			</form>
			</div>
	<footer>
		 CS 340 Project <a href="./">- Home -</a> Charles Siebert
	</footer>
	</body>
</html>