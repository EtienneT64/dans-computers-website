<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
?>

<head>
	<link rel="stylesheet" type="text/css" href="/styles/header.css" />
</head>

<nav class="nav_header">
	<a href="/src/index.php">
		<img src="/images/logo.png" alt="Dans Computers Logo" class="header_img-logo" />
	</a>

	<div class="menu-button">
		<div class="menu-icon"></div>
	</div>

	<div class="nav_links">
		<a href="/src/index.php">Home</a>
		<a href="/src/sales.php">Sales</a>
		<a href="/src/account.php">Account</a>
	</div>

	<div class="nav_actions">
		<a href="/src/cart.php" class="nav_inner-end">
			<img src="/svg/shopping-cart-outline-svgrepo-com.svg" alt="Shopping cart" class="header_svg-cart" />
		</a>
		<?php
		if (isset($_SESSION['UserID'])) {
			// User is logged in, show the username
			echo '<span class="username">' . $_SESSION['Username'] . '</span>';
		} else {
			// User is not logged in, show the Sign Up link
			echo '<a href="/src/signup.php">Sign Up</a>';
		}
		?>
	</div>

	<div class="menu-dropdown">
		<ul>
			<li><a href="/src/index.php">Home</a></li>
			<li><a href="/src/sales.php">Sales</a></li>
			<li><a href="/src/account.php">Account</a></li>
		</ul>
	</div>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
	$(document).ready(function() {
		$('.menu-button').click(function() {
			$('.menu-dropdown').toggleClass('open');
		});
	});
</script>
