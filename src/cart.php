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
					<?php include_once "../includes/get-cart-items.php"; ?>
				</table>
			</div>
		</div>

		<div class="order-summary">
			<table>
				<?php if ($subtotal > 0) { ?>
					<tr>
						<td>Subtotal:</td>
						<td>R<?php echo number_format($subtotal, 2); ?></td>
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
			xhr.open("POST", "../includes/remove-item.php", true);
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
			// Check if the cart is empty
			if (<?php echo ($subtotal > 0) ? 'true' : 'false'; ?>) {
				// Clear the cart
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
</body>

</html>
