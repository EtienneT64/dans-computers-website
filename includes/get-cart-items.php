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
$_SESSION['cart'] = $result;

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
