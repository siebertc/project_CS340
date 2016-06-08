<?php
	session_start();
	include 'connectvars.php';
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$dbc) {
			die('Could not connect: ');
		}
	$item_filter = $_REQUEST["filter"];
	
	if ($item_filter == "accessories") {
		
		$table = "Inventory_CS340";
		$query = "SELECT * FROM $table WHERE keyWord ='accessories'";
			
		$result = mysqli_query($dbc, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
		
		$img = "<img src='./images/cat3.png'>";
		$fields_num = mysqli_num_fields($result);
		$num_results = mysqli_num_rows($result);
		
		echo "<h1 class='heading' style='color:black'>Accessories</h1>";
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
	
	mysqli_free_result($result);
	mysqli_close($dbc);
		
	} else if ($item_filter == "clothing") {
		$table = "Inventory_CS340";
		$query = "SELECT * FROM $table WHERE keyWord='$item_filter'";
			
		$result = mysqli_query($dbc, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
			
		$img = "<img src='./images/cat3.png'>";
		$fields_num = mysqli_num_fields($result);
		$num_results = mysqli_num_rows($result);
			
		echo "<h1 class='heading' style='color:black;'>Clothing</h1>";
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
		
		
	} else if ($item_filter == "bedding") {
		$table = "Inventory_CS340";
		$query = "SELECT * FROM $table WHERE keyWord='$item_filter'";
			
		$result = mysqli_query($dbc, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
			
		$img = "<img src='./images/cat3.png'>";
		$fields_num = mysqli_num_fields($result);
		$num_results = mysqli_num_rows($result);
			
		echo "<h1 class='heading' style='color:black;'>Bedding</h1>";
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
		
	} else if ($item_filter == "furniture") {
		$table = "Inventory_CS340";
		$query = "SELECT * FROM $table WHERE keyWord='$item_filter'";
			
		$result = mysqli_query($dbc, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
			
		$img = "<img src='./images/cat3.png'>";
		$fields_num = mysqli_num_fields($result);
		$num_results = mysqli_num_rows($result);
			
		echo "<h1 class='heading' style='color:black;'>Furniture</h1>";
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
		
		
	}else if ($item_filter == "electronics") {
		$table = "Inventory_CS340";
		$query = "SELECT * FROM $table WHERE keyWord='$item_filter'";
			
		$result = mysqli_query($dbc, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
			
		$img = "<img src='./images/cat3.png'>";
		$fields_num = mysqli_num_fields($result);
		$num_results = mysqli_num_rows($result);
			
		echo "<h1 class='heading' style='color:black;'>Electronics</h1>";
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
		
		
	} else if ($item_filter == "Apple") {
		$table = "Inventory_CS340";
		$query = "SELECT * FROM $table WHERE compName='$item_filter'";
			
		$result = mysqli_query($dbc, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
			
		$img = "<img src='./images/cat3.png'>";
		$fields_num = mysqli_num_fields($result);
		$num_results = mysqli_num_rows($result);
			
		echo "<h1 class='heading' style='color:black;'>Apple</h1>";
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
		
		
	} else if ($item_filter == "Samsung") {
		$table = "Inventory_CS340";
		$query = "SELECT * FROM $table WHERE compName='$item_filter'";
			
		$result = mysqli_query($dbc, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
			
		$img = "<img src='./images/cat3.png'>";
		$fields_num = mysqli_num_fields($result);
		$num_results = mysqli_num_rows($result);
			
		echo "<h1 class='heading' style='color:black;'>Samsung</h1>";
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
		
		
	} else if ($item_filter == "IKEA") {
		$table = "Inventory_CS340";
		$query = "SELECT * FROM $table WHERE compName='$item_filter'";
			
		$result = mysqli_query($dbc, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
			
		$img = "<img src='./images/cat3.png'>";
		$fields_num = mysqli_num_fields($result);
		$num_results = mysqli_num_rows($result);
			
		echo "<h1 class='heading' style='color:black;'>IKEA</h1>";
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
		
		
	} else if ($item_filter == "BBB") {
		$table = "Inventory_CS340";
		$query = "SELECT * FROM $table WHERE compName='$item_filter'";
			
		$result = mysqli_query($dbc, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
			
		$img = "<img src='./images/cat3.png'>";
		$fields_num = mysqli_num_fields($result);
		$num_results = mysqli_num_rows($result);
			
		echo "<h1 class='heading' style='color:black;'>Bed Bath & Beyond</h1>";
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
		
		
	} else if ($item_filter == "OldNavy") {
		$table = "Inventory_CS340";
		$query = "SELECT * FROM $table WHERE compName='$item_filter'";
			
		$result = mysqli_query($dbc, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
			
		$img = "<img src='./images/cat3.png'>";
		$fields_num = mysqli_num_fields($result);
		$num_results = mysqli_num_rows($result);
			
		echo "<h1 class='heading' style='color:black;'>Old Navy</h1>";
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
		
		
	} else if ($item_filter == "GAP") {
		$table = "Inventory_CS340";
		$query = "SELECT * FROM $table WHERE compName='$item_filter'";
			
		$result = mysqli_query($dbc, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
			
		$img = "<img src='./images/cat3.png'>";
		$fields_num = mysqli_num_fields($result);
		$num_results = mysqli_num_rows($result);
			
		echo "<h1 class='heading' style='color:black;'>GAP</h1>";
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
		
		
	} else if ($item_filter == "Ascend") {
		$table = "Inventory_CS340";
		$query = "SELECT * FROM $table ORDER by price ASC";
			
		$result = mysqli_query($dbc, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
			
		$img = "<img src='./images/cat3.png'>";
		$fields_num = mysqli_num_fields($result);
		$num_results = mysqli_num_rows($result);
			
		echo "<h1 class='heading' style='color:black;'>Ascending Price</h1>";
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
		
	} else if ($item_filter == "Descend") {
		$table = "Inventory_CS340";
		$query = "SELECT * FROM $table ORDER by price DESC";
			
		$result = mysqli_query($dbc, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
			
		$img = "<img src='./images/cat3.png'>";
		$fields_num = mysqli_num_fields($result);
		$num_results = mysqli_num_rows($result);
			
		echo "<h1 class='heading' style='color:black;'>Descending Price</h1>";
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
	} 
?>