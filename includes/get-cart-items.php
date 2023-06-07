<?php
require_once("../includes/connection.php");

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

// Retrieve cart items for the logged-in user
$userID = $_SESSION['UserID'];
$sql = "SELECT items.ItemID, items.Name, items.SalesPrice, user_cart.Quantity
        FROM user_cart
        INNER JOIN items ON user_cart.ItemID = items.ItemID
        WHERE user_cart.UserID = $userID";

$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result && mysqli_num_rows($result) > 0) {
	// Initialize variables for calculations
	$subtotal = 0;

	// Iterate over the cart items and display them
	while ($row = mysqli_fetch_assoc($result)) {
		$itemID = $row['ItemID'];
		$itemName = $row['Name'];
		$salesPrice = $row['SalesPrice'];
		$quantity = $row['Quantity'];

		// Calculate the item subtotal using the sales price and add it to the overall subtotal
		$itemSubtotal = $salesPrice * $quantity;
		$subtotal += $itemSubtotal;

		// Display the item details
		echo "<tr>";
		echo "<td class='item-cell'>";
		echo "<img src='/images/$itemName.jpg' alt='$itemName' class='product-image' />";
		echo "<span>$itemName</span>";
		echo "</td>";
		echo "<td class='price-cell'>R" . number_format($salesPrice, 2) . "</td>";
		echo "<td class='quantity-cell'>$quantity</td>";
		echo "<td class='remove-cell'>";
		echo "<button class='remove-button' onclick='removeItem($itemID)'>Remove</button>";
		echo "</td>";
		echo "</tr>";
	}

	// Calculate the VAT and total
	$vat = $subtotal * 0.15;
	$total = $subtotal + $vat;

	// Calculate the shipping cost
	$shipping = ($subtotal >= 1000) ? 0 : 100;
} else {
	// Handle the case when the cart is empty
	$subtotal = 0;
	$vat = 0;
	$shipping = 0;
}

$_SESSION['cart'] = $result;
?>



<!-- Your HTML code -->

<script>
	// ...

	// Function to handle the checkout process
	function checkout() {
		// Check if the cart is empty
		if (<?php echo ($subtotal > 0) ? 'true' : 'false'; ?>) {
			// Clear the cart in the database
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "../includes/clear-cart.php", true);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.onreadystatechange = function() {
				if (xhr.readyState === 4 && xhr.status === 200) {
					// Display a success message
					alert("Thank you for your purchase!");

					// Optionally, you can redirect the user to a confirmation page or perform any other necessary actions

					// Reload the page to update the cart
					location.reload();
				}
			};
			xhr.send();

		} else {
			// Display an alert for an empty cart
			alert("Your cart is empty.");
		}
	}
</script>
