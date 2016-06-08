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
		<h1 class="heading">Sign Up</h1>
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
							echo '<li class="active"><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
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

<?php

  include 'connectvars.php';
  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  
  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $userName = $_POST['userName'];
    $password1 = sha1($_POST['password1']);
	 $password2 = sha1($_POST['password2']);
    $firstName = $_POST['firstName'];
	 $lastName =  $_POST['lastName'];
	 
    if (!empty($userName) && !empty($password1)) {
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM Users_CS340 WHERE userName = '$userName'";
      $data = mysqli_query($dbc, $query);
		if ($password1 == $password2) {
			if (mysqli_num_rows($data) == 0) {
			  // The username is unique, so insert the data into the database
			  $query = "INSERT INTO Users_CS340 (userName, password) VALUES ('$userName', '$password1')";
			  mysqli_query($dbc, $query);

			  // Confirm success with the user
			  echo '<p>Your new account has been successfully created. You\'re now ready to log in.</p>';

			  mysqli_close($dbc);
			  exit();
			}
			else {
			  // An account already exists for this username, so display an error message
			  echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
			  $username = "";
			}
		}
		else {
			// Passwords do not match each other.
			echo 'Passwords do not match, try again.';
		}
    }
    else {
      echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
    }
  }

  mysqli_close($dbc);
?>
	
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <fieldset class="login_section">
	 <div id="error"></div>
      <h3 class="heading">Registration Info</h3>
      <label for="username">Username:</label>
      <input type="text" id="userName" name="userName" value="<?php if (!empty($userName)) echo $userName; ?>" /><br />
      <label for="password1">Password:</label>
      <input type="password" id="password1" name="password1" /><br />
		<label style="margin-left:-52px" for="password2">Confirm Password:</label>
      <input type="password" id="password2" name="password2"/><br />
		<input type="submit" value="Sign Up" name="submit" />
	 </fieldset>
  </form>
  <footer>
		 CS 340 Project <a href="./">- Home -</a> Charles Siebert
	</footer>
</body> 
</html>
