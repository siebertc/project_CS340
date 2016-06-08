<?php
	session_start();
	include 'connectvars.php';
	
	$userName = $_POST['userName'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$totalprice = $_SESSION['totalprice'];
	
	$arr = array();
	$quantity = 1;
	
	if ( $password1 == $password2 ) {
		$hash = sha1($password1);
		
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$dbc) {
			die('Could not connect: ');
		}
		
		$query = "SELECT * FROM Users_CS340 WHERE userName='$userName' and password='$hash'";
		$result = mysqli_query($dbc, $query);
	
		if ((mysqli_num_rows($result) == 1) && ($_SESSION['gamePoints'] > $totalprice)) { //verify account authenticity - confirm order
			while (list ($key, $val) = each ($_SESSION['cart'])) { 
		
				$query = "UPDATE Inventory_CS340 SET stock = stock - 1 WHERE prodName = '$val'";
				mysqli_query($dbc, $query);
				array_push($arr, $val);
				unset($_SESSION['cart'][$key]);
			}
			
			$query = "INSERT INTO CustomerOrder_CS340 (userName, address, city, state, zip, totalPrice) VALUES ('$userName', '$address',  '$city',  '$state',  '$zip', '$totalprice')";
			mysqli_query($dbc, $query);
			
			$query = "UPDATE Users_CS340 SET gamePoints = gamePoints - '$totalprice' WHERE userName='$userName'";
			mysqli_query($dbc, $query);
			
			sort($arr, SORT_STRING);
			for($i = 0; $i < sizeof($arr); $i++) {
				if ( $arr[$i] == $arr[$i+1] ) {
					$quantity += 1;
				} else {
					$query = "INSERT INTO OrderQuantity_CS340 (orderID, prodName, quantity) SELECT MAX(CO.orderID), '$arr[$i]', '$quantity' FROM CustomerOrder_CS340 CO WHERE userName='$userName'";
					mysqli_query($dbc, $query);
					$quantity = 1;
				}
			}
			
			header('Location: member.php');
		
		} else if ( $_SESSION['gamePoints'] < $totalprice) {
			$_SESSION['fail'] = "Failed to buy item(s). Insufficient Funds.";
			header('Location: shoppingcart.php');
		}
	}
?>