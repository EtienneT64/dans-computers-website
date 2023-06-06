<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" type="text/css" href="/styles/header.css" />
	<link rel="stylesheet" type="text/css" href="/styles/account.css" />
	<link rel="stylesheet" type="text/css" href="/styles/footer.css" />

	<title>Dans Computers / Account</title>
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

	<div class="page-wrapper">
		<div class="container">
			<h2>My Account</h2>
			<div class="account-details">
				<label for="name">Name:</label>
				<p id="name">Larry Low</p>

				<label for="email">Email:</label>
				<p id="email">larrylow@gmail.com</p>
			</div>
			<div class="change-password-link">
				<a href="#">Change Password</a>
			</div>
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