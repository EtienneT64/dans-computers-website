<?php
require_once("../includes/connection.php");

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
?>

<?php
// Check if the user is not logged in
if (!isset($_SESSION['UserID'])) {
	header("Location: /src/account.php");
	exit(); // Make sure to exit after the redirect
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" type="text/css" href="/styles/cart.css" />

	<title>Website / Cart</title>
</head>

<body>
	<?php include_once "../includes/header.php"; ?>

	<div class="container">
		<h2>Checkout Cart</h2>

		<div class="section">
			<div class="section-title">Customer Information</div>
			<div class="section-content">
				<p>Username: <?php echo isset($_SESSION['Username']) ? $_SESSION['Username'] : ''; ?></p>
				<p>Email: <?php echo isset($_SESSION['Email']) ? $_SESSION['Email'] : ''; ?></p>
				<p>Shipping Address: 22 Firgrove, Cape Town, South Africa</p>
			</div>
		</div>

		<div class="section">
			<div class="section-title">Shipping Method</div>
			<div class="section-content">
				<p>
					Door-to-door Courier: Standard Shipping (3-5 business
					days)
				</p>
			</div>
		</div>

		<div class="section">
			<div class="section-title">Payment Information</div>
			<div class="section-content">
				<p>Payment Method: Credit Card</p>
				<p>Card Number: ************1234</p>
				<p>Expiration Date: 12/2024</p>
				<p>Billing Address: 22 Firgrove, Cape Town, South Africa</p>
			</div>
		</div>

		<div class="section">
			<div class="section-title">Items in Order</div>
			<div class="section-content">
				<table>
					<tr>
						<th>Item</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Remove</th>
					</tr>
					<?php
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

					// Close the database connection
					mysqli_close($conn);
					?>
				</table>
			</div>
		</div>

		<div class="order-summary">
			<table>
				<?php if ($subtotal > 0) { ?>
					<tr>
						<td>Subtotal:</td>
						<td>R<?php echo number_format($subtotal * 0.85, 2); ?></td>
					</tr>
					<tr>
						<td>VAT (15%):</td>
						<td>R<?php echo number_format($vat, 2); ?></td>
					</tr>
					<tr>
						<td>Shipping:</td>
						<td>R<?php echo number_format($shipping, 2); ?></td>
					</tr>
					<tr class="total-row">
						<td>Total:</td>
						<td>R<?php echo number_format($total, 2); ?></td>
					</tr>
				<?php } else { ?>
					<tr>
						<td colspan="2">Your cart is empty.</td>
					</tr>
				<?php } ?>
			</table>
		</div>


		<div class="checkout-button">
			<button onclick="checkout()">Checkout</button>
		</div>
	</div>

	<?php include_once "../includes/footer.php"; ?>

	<script>
		// Function to remove an item from the cart
		function removeItem(itemID) {
			// Send an AJAX request to the remove_item.php script
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "/includes/remove-item.php", true);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.onreadystatechange = function() {
				if (xhr.readyState === 4 && xhr.status === 200) {
					// Reload the page to update the cart
					location.reload();
				}
			};
			xhr.send("itemID=" + itemID);
		}

		// Function to handle the checkout process
		function checkout() {
			// Implement your checkout logic here
			alert("Thank you for your purchase!");
		}
	</script>
</body>

</html>
