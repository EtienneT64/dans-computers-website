<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" type="text/css" href="/styles/header.css" />
	<link rel="stylesheet" type="text/css" href="/styles/hero.css" />
	<link rel="stylesheet" type="text/css" href="/styles/mostpopular.css" />
	<link rel="stylesheet" type="text/css" href="/styles/footer.css" />

	<title>Dans Computers / Home</title>
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

	<section class="hero">
		<div class="hero-content">
			<h1>Deal of the Day</h1>
			<h2>ASUS ROG MAXIMUS XII HERO WIFI INTEL ATX MOTHERBOARD</h2>
			<h3>
				<span class="old-price">R10,000.00</span>
				<span class="sale-price">R4,999.00</span>
			</h3>
			<button>Add to Cart</button>
		</div>
		<div>
			<img src="/images/deal1.jpg" alt="Deal of the day" class="hero_image" />
		</div>
	</section>

	<section class="mostpopular">
		<div class="mostpopular-content">
			<h2 class="mostpopular-content-headers">Most popular</h2>
			<ul class="products">
				<li class="product-card">
					<div class="product-card-image">
						<img src="/images/product1.jpg" alt="Ryzen CPU" />
					</div>
					<div class="product-card-info">
						<h3 class="product-card-title">Ryzen 5 5600</h3>
						<p class="product-card-description">
							6-Core 3.5GHz (4.4GHz Boost) Socket AM4 Desktop CPU
						</p>
						<h3>
							<span class="old-price">R10,000.00</span>
							<span class="sale-price">R4,999.00</span>
						</h3>
						<button class="product-card-button">Add to Cart</button>
					</div>
				</li>
				<li class="product-card">
					<div class="product-card-image">
						<img src="/images/product2.jpg" alt="RTX GPU" />
					</div>
					<div class="product-card-info">
						<h3 class="product-card-title">ASUS RTX 3070 TUF Gaming</h3>
						<p class="product-card-description">
							TUF-RTX4070-12G-GAMING 12GB GDDR6X 192-Bit PCIe 4.0 Desktop
							Graphics Card
						</p>
						<h3>
							<span class="old-price">R10,000.00</span>
							<span class="sale-price">R4,999.00</span>
						</h3>
						<button class="product-card-button">Add to Cart</button>
					</div>
				</li>
				<li class="product-card">
					<div class="product-card-image">
						<img src="/images/product3.jpg" alt="OLED Monitor" />
					</div>
					<div class="product-card-info">
						<h3 class="product-card-title">Alienware AW3423DW</h3>
						<p class="product-card-description">
							UWQHD (3440x1440) 175Hz 0.1ms QD-OLED HDR400 G-Sync Ultimate
							Curved Monitor
						</p>
						<h3>
							<span class="old-price">R10,000.00</span>
							<span class="sale-price">R4,999.00</span>
						</h3>
						<button class="product-card-button">Add to Cart</button>
					</div>
				</li>
			</ul>
		</div>
	</section>

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
