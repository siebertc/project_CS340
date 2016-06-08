<?php
	session_start();
	
	$sCart = array();
	$item = $_REQUEST['addcart'];
	array_push($_SESSION['cart'], $item);
	$sCart = $_SESSION['cart'];
	
	echo "<label class='heading' style='color:black'> Cart Items : ".sizeof($_SESSION['cart'])." </label><br>";
	
	if (sizeof($_SESSION['cart']) < 1) {
		echo"You have nothing in your cart";
	} else {
		while (list ($key, $val) = each ($_SESSION['cart'])) { 
			echo "$key - $val <br>"; 
		}
	}
?>
	