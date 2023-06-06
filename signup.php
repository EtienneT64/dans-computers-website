<?php
include_once '/includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" type="text/css" href="/styles/header.css" />
	<link rel="stylesheet" type="text/css" href="/styles/signup.css" />
	<link rel="stylesheet" type="text/css" href="/styles/footer.css" />

	<script defer src="/index.js"></script>

	<title>Dans Computers / Sign-up</title>
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
			<form id="form" action="/">
				<h1>Sign-up</h1>
				<div class="input-control">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" placeholder="Your name" />
					<div class="error"></div>
				</div>

				<div class="input-control">
					<label for="email">Email</label>
					<input type="text" id="email" name="email" placeholder="Your email" />
					<div class="error"></div>
				</div>

				<div class="input-control">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" placeholder="Your password" />
					<div class="error"></div>
				</div>

				<div class="input-control">
					<label for="password2">Confirm Password</label>
					<input type="password" id="password2" name="password2" placeholder="Your password" />
					<div class="error"></div>
				</div>

				<button type="submit">Sign Up</button>
			</form>
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
