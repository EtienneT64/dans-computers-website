<?php
require_once("../includes/connection.php");

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

// Check if the cart is empty
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
	// Retrieve user information
	$userID = $_SESSION['UserID'];
	$username = $_SESSION['Username'];
	$email = $_SESSION['Email'];

	// Calculate transaction details
	$subtotal = 0;
	$vatRate = 0.15;
	$shippingCost = 100;

	foreach ($_SESSION['cart'] as $item) {
		$itemID = $item['ItemID'];
		$itemName = $item['Name'];
		$salesPrice = $item['SalesPrice'];
		$quantity = $item['Quantity'];

		$itemSubtotal = $salesPrice * $quantity;
		$subtotal += $itemSubtotal;
	}

	$vat = $subtotal * $vatRate;
	$total = $subtotal + $vat + $shippingCost;

	// Display transaction preview
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Transaction Preview</title>
		<link rel="stylesheet" type="text/css" href="/styles/transaction-preview.css" />
	</head>

	<body>
		<div class="transaction-preview">
			<h2>Transaction Preview</h2>

			<div class="section">
				<div class="section-title">Customer Information</div>
				<div class="section-content">
					<p>Username: <?php echo $username; ?></p>
					<p>Email: <?php echo $email; ?></p>
					<p>Shipping Address: 22 Firgrove, Cape Town, South Africa</p>
				</div>
			</div>

			<div class="section">
				<div class="section-title">Shipping Method</div>
				<div class="section-content">
					<p>Door-to-door Courier: Standard Shipping (3-5 business days)</p>
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
							<th>Subtotal</th>
						</tr>
						<?php
						foreach ($_SESSION['cart'] as $item) {
							$itemName = $item['Name'];
							$salesPrice = $item['SalesPrice'];
							$quantity = $item['Quantity'];
							$itemSubtotal = $salesPrice * $quantity;
						?>
							<tr>
								<td><?php echo $itemName; ?></td>
								<td>R<?php echo number_format($salesPrice, 2); ?></td>
								<td><?php echo $quantity; ?></td>
								<td>R<?php echo number_format($itemSubtotal, 2); ?></td>
							</tr>
						<?php
						}
						?>
					</table>
				</div>
			</div>

			<div class="order-summary">
				<table>
					<tr>
						<td>Subtotal:</td>
						<td>R<?php echo number_format($subtotal, 2); ?></td>
					</tr>
					<tr>
						<td>VAT (<?php echo ($vatRate * 100); ?>%):</td>
						<td>R<?php echo number_format($vat, 2); ?></td>
					</tr>
					<tr>
						<td>Shipping:</td>
						<td>R<?php echo number_format($shippingCost, 2); ?></td>
					</tr>
					<tr class="total-row">
						<td>Total:</td>
						<td>R<?php echo number_format($total, 2); ?></td>
					</tr>
				</table>
			</div>

			<div class="actions">
				<button class="confirm-button" onclick="confirmTransaction()">Confirm</button>
				<button class="cancel-button" onclick="cancelTransaction()">Cancel</button>
			</div>
		</div>

		<script>
			function confirmTransaction() {
				// Send an AJAX request to store the transaction in the database
				var xhr = new XMLHttpRequest();
				xhr.open("POST", "/includes/store-transaction.php", true);
				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xhr.onreadystatechange = function() {
					if (xhr.readyState === 4 && xhr.status === 200) {
						// Display a success message
						alert("Transaction completed successfully!");

						// Optionally, you can redirect the user to a confirmation page or perform any other necessary actions
						window.location.href = "/src/cart.php";
					}
				};
				xhr.send();
			}

			function cancelTransaction() {
				// Redirect the user back to the cart page
				window.location.href = "/src/cart.php";
			}
		</script>
	</body>

	</html>

<?php
} else {
	// Redirect the user back to the cart page if the cart is empty
	header("Location: /src/cart.php");
	exit();
}
?>
