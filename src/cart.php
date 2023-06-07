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
				<p>Billing Address: 22 Firgrove, Cape Town, South Afric</p>
			</div>
		</div>

		<div class="section">
			<div class="section-title">Items in Order</div>
			<div class="section-content">
				<table>
					<tr>
						<th>Item</th>
						<th>Quantity</th>
					</tr>
					<?php
					// Retrieve cart items for the logged-in user
					$userID = $_SESSION['UserID'];
					$sql = "SELECT items.Name, user_cart.Quantity
        FROM user_cart
        INNER JOIN items ON user_cart.ItemID = items.ItemID
        WHERE user_cart.UserID = $userID";

					$result = mysqli_query($conn, $sql);

					// Check if the query was successful
					if ($result) {
						// Iterate over the cart items and display them
						while ($row = mysqli_fetch_assoc($result)) {
							$itemName = $row['Name'];
							$quantity = $row['Quantity'];

							// Display the item details
							echo "<tr>";
							echo "<td class='item-cell'>";
							echo "<img src='/images/$itemName.jpg' alt='$itemName' class='product-image' />";
							echo "<span>$itemName</span>";
							echo "</td>";
							echo "<td class='quantity-cell'>$quantity</td>";
							echo "</tr>";
						}
					} else {
						// Handle the error if the query fails
						echo "Error: " . mysqli_error($conn);
					}

					// Close the database connection
					mysqli_close($conn);
					?>
				</table>
			</div>
		</div>

		<div class="order-summary">
			<table>
				<tr>
					<td>Subtotal:</td>
					<td>R150.00</td>
				</tr>
				<tr>
					<td>VAT (15%):</td>
					<td>R15.00</td>
				</tr>
				<tr>
					<td>Shipping:</td>
					<td>R10.00</td>
				</tr>
				<tr class="total-row">
					<td>Total:</td>
					<td>R175.00</td>
				</tr>
			</table>
		</div>
	</div>

	<?php include_once "../includes/footer.php"; ?>
</body>

</html>
