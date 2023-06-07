<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" type="text/css" href="/styles/hero.css" />
	<link rel="stylesheet" type="text/css" href="/styles/mostpopular.css" />

	<title>Dans Computers / Sales</title>
</head>

<body>
	<?php include_once "../includes/header.php"; ?>

	<section class="mostpopular">
		<div class="mostpopular-content">
			<h2 class="mostpopular-content-headers">Daily Deals</h2>
			<h3 class="mostpopular-content-headers">
				Sale valid until tonight 23:59
			</h3>
			<ul class="products">
				<li class="product-card">
					<div class="product-card-image">
						<img src="/images/deal1.jpg" alt="Product 1" />
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
						<img src="/images/deal2.jpg" alt="Product 2" />
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
						<img src="/images/deal3.jpg" alt="Product 3" />
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

	<section class="mostpopular">
		<div class="mostpopular-content">
			<h2 class="mostpopular-content-headers">Weekly Wins</h2>
			<h3 class="mostpopular-content-headers">
				Sale valid until 7 June 23:59
			</h3>
			<ul class="products">
				<li class="product-card">
					<div class="product-card-image">
						<img src="/images/win1.jpg" alt="Product 1" />
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
						<img src="/images/win2.jpg" alt="Product 2" />
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
						<img src="/images/win3.jpg" alt="Product 3" />
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

	<?php include_once "../includes/footer.php"; ?>

</body>

</html>
