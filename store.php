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
		<h1 class="heading">Store</h1>
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
						<li class="active"><a href="store.php">Store</a></li>
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

		<nav class="store_nav">
			<ul>
				<legend>Category Sort</legend>
				<li><input type="radio" name="filter" id="desc1" value="accessories" onclick="filterObjects(this.value)">Accessories</li>
				<li><input type="radio" name="filter" id="desc1" value="clothing" onclick="filterObjects(this.value)">Clothing</li>
				<li><input type="radio" name="filter" id="desc1" value="bedding" onclick="filterObjects(this.value)">Bedding</li>
				<li><input type="radio" name="filter" id="desc1" value="furniture" onclick="filterObjects(this.value)">Furniture</li>
				<li><input type="radio" name="filter" id="desc1" value="electronics" onclick="filterObjects(this.value)">Electronics</li>
			</ul>
			<ul>
				<legend>Company Sort</legend>
				<li><input type="radio" name="filter" id="desc1" value="Apple" onclick="filterObjects(this.value)">Apple</li>
				<li><input type="radio" name="filter" id="desc1" value="Samsung" onclick="filterObjects(this.value)">Samsung</li>
				<li><input type="radio" name="filter" id="desc1" value="IKEA" onclick="filterObjects(this.value)">IKEA</li>
				<li><input type="radio" name="filter" id="desc1" value="BBB" onclick="filterObjects(this.value)">Bed Bath & Beyond</li>
				<li><input type="radio" name="filter" id="desc1" value="OldNavy" onclick="filterObjects(this.value)">Old Navy</li>
				<li><input type="radio" name="filter" id="desc1" value="GAP" onclick="filterObjects(this.value)">GAP</li>
			</ul>
			<ul>
				<legend>Price Sort</legend>
				<li><input type="radio" name="filter" id="desc1" value="Ascend" onclick="filterObjects(this.value)">Ascending</li>
				<li><input type="radio" name="filter" id="desc1" value="Descend" onclick="filterObjects(this.value)">Descending</li>
			</ul>
		</nav>
	<section class="store_body">
		
		<div id="storetable" style="padding:1px 16px;height:90%;">
			<?php
				session_start();
				include 'connectvars.php';
				
				$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				if (!$dbc) {
					die('Could not connect: ');
				}
					
				$table = "Inventory_CS340";
				$query = "SELECT * FROM $table";
					
				$result = mysqli_query($dbc, $query);
				if (!$result) {
					die("Query to show fields from table failed");
				}
					
				$img = "<img src='./images/cat3.png'>";
				$fields_num = mysqli_num_fields($result);
				$num_results = mysqli_num_rows($result);
					
				echo "<h1 class='heading' style='color:black;'>All Items!</h1>";
				echo "<table class='sort'><tr>";
				// printing table headers
				for($i=0; $i<$fields_num; $i++) {	
					$field = mysqli_fetch_field($result);	
					
					if($field->name == "prodName") {
						echo "<td></td><td><b>Product Name</b></td>";
					}
					if($field->name == "compName") {
						echo "<td><b>Company</b></td>";
					}
					if($field->name == "keyWord") {
						echo "<td><b>Description</b></td>";
					}
					if($field->name == "price") {
						echo "<td><b>Price</b></td>";
					}
					if($field->name == "stock") {
						echo "<td><b>Items Left</b></td>";
					}
						
				}
				echo "<td><b>Add To Cart</b></td>";
				echo "</tr>\n";
	
				$num_results = mysqli_num_rows($result);
				
				for($j = 0; $j < $num_results; $j++) {
					$row = mysqli_fetch_array($result);
					$add_cart = $row['prodName'];
					echo "<tr style='border-spacing:5px;'>";
					echo "<td>".$img."<td>".$row['prodName']."</td><td>".$row['compName']."</td>";
					echo "<td>".$row['keyWord']."</td><td>".$row['price']."</td><td>".$row['stock']."</td>";
					echo "<td><button type='submit' name='addcart' value='$add_cart' onclick='addToCart(this.value)'>Add to Cart</button></td>";
					echo "</tr>\n";
				}
				echo"</table>";
		
				mysqli_free_result($result);
				mysqli_close($dbc);
			?>
		</div>
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
		}
	?>
	</div>
	<footer>
		 CS 340 Project <a href="./">- Home -</a> Charles Siebert
	</footer>
	</body>
</html>
	