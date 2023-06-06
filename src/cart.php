<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" type="text/css" href="/styles/header.css" />
	<link rel="stylesheet" type="text/css" href="/styles/cart.css" />
	<link rel="stylesheet" type="text/css" href="/styles/footer.css" />

	<title>Website / Cart</title>
</head>

<body>
	<nav class="nav_header">
		<a href="/index.php">
			<img src="/images/logo.png" alt="Dans Computers Logo" class="header_img-logo" />
		</a>

		<div class="menu-button">
			<div class="menu-icon"></div>
		</div>

		<div class="nav_links">
			<a href="/index.php">Home</a>
			<a href="/src/sales.php">Sales</a>
			<a href="/src/account.php">Account</a>
		</div>

		<div class="nav_actions">
			<a href="/src/cart.php" class="nav_inner-end"><img src="/svg/shopping-cart-outline-svgrepo-com.svg" alt="Shopping cart" class="header_svg-cart" /></a>
			<a href="/src/signup.php">Sign Up</a>
		</div>

		<div class="menu-dropdown">
			<ul>
				<li><a href="/index.php">Home</a></li>
				<li><a href="/src/sales.php">Sales</a></li>
				<li><a href="/src/account.php">Account</a></li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<h2>Checkout Cart</h2>

		<div class="section">
			<div class="section-title">Customer Information</div>
			<div class="section-content">
				<p>Email: john.doe@example.com</p>
				<p>Shipping Address: 123 Main St, Anytown, USA</p>
			</div>
		</div>

		<div class="section">
			<div class="section-title">Shipping Method</div>
			<div class="section-content">
				<p>
					Please choose a shipping method: Standard Shipping (3-5 business
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
				<p>Billing Address: 123 Main St, Anytown, USA</p>
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
					<tr>
						<td class="item-cell">
							<img src="/images/win1.jpg" alt="Product A" class="product-image" />
							<span>Product A</span>
						</td>
						<td class="quantity-cell">2</td>
					</tr>
					<tr>
						<td class="item-cell">
							<img src="/images/win2.jpg" alt="Product B" class="product-image" />
							<span>Product B</span>
						</td>
						<td class="quantity-cell">1</td>
					</tr>
					<tr>
						<td class="item-cell">
							<img src="/images/win3.jpg" alt="Product C" class="product-image" />
							<span>Product C</span>
						</td>
						<td class="quantity-cell">3</td>
					</tr>
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

	<footer class="footer">
		<div class="footer-content">
			<div class="footer-logo">
				<img src="/images/logo.png" alt="Logo" />
			</div>
			<div class="footer-links">
				<ul>
					<li><a href="/index.php">Home</a></li>
					<li><a href="/src/sales.php">Sales</a></li>
					<li><a href="/src/account.php">Account</a></li>
				</ul>
			</div>
		</div>
		<div class="footer-bottom">
			<p>Copyright &copy; 2023 Dans Computers</p>
		</div>
	</footer>

	<!-- Add jQuery library -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script>
		$(document).ready(function() {
			$('.menu-button').click(function() {
				$('.menu-dropdown').toggleClass('open');
			});
		});
	</script>
</body>

</html>
