<?php
require_once("../includes/connection.php");

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

	<script>
		$(document).ready(function() {
			// Add click event listener to all "Add to Cart" buttons
			$(".product-card-button").on("click", function() {
				// Check if the user is logged in
				if (loggedIn()) {
					// Get the item ID from the parent list item
					var itemID = $(this).closest(".product-card").data("itemid");

					// Send AJAX request to add the item to the cart
					$.ajax({
						type: "POST",
						url: "/includes/add-to-cart.php",
						data: {
							itemID: itemID
						},
						success: function(response) {
							// Handle the response from the server
							if (response === "Success") {
								// Item added to cart successfully
								alert("Item added to cart!");
							} else {
								// Error handling if needed
								alert("Failed to add item to cart. Please try again.");
							}
						},
						error: function() {
							// Error handling if AJAX request fails
							alert("An error occurred. Please try again.");
						}
					});
				} else {
					// User is not logged in, redirect to the account page or login page
					window.location.href = "/src/account.php";
				}
			});

			// Function to check if the user is logged in
			function loggedIn() {
				// Add your logic to check if the user is logged in
				// For example, you can check if a session variable is set
				return <?php echo isset($_SESSION['UserID']) ? 'true' : 'false'; ?>;
			}
		});
	</script>

	<title>Dans Computers / Home</title>
</head>

<body>
	<?php include_once "../includes/header.php"; ?>


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
				<li class="product-card" data-itemid="1">
					<div class="product-card-image">
						<img src="/images/product1.jpg" alt="Ryzen 5 5600" />
					</div>
					<div class="product-card-info">
						<h3 class="product-card-title">Ryzen 5 5600</h3>
						<p class="product-card-description">
							6-Core 3.5GHz (4.4GHz Boost) Socket AM4 Desktop CPU
						</p>
						<h3>
							<span class="old-price">R5,000.00</span>
							<span class="sale-price">R3,999.00</span>
						</h3>
						<button class="product-card-button">Add to Cart</button>
					</div>
				</li>
				<li class="product-card" data-itemid="2">
					<div class="product-card-image">
						<img src="/images/product2.jpg" alt="ASUS RTX 3070 TUF Gaming" />
					</div>
					<div class="product-card-info">
						<h3 class="product-card-title">ASUS RTX 3070 TUF Gaming</h3>
						<p class="product-card-description">
							TUF-RTX4070-12G-GAMING 12GB GDDR6X 192-Bit PCIe 4.0 Desktop
							Graphics Card
						</p>
						<h3>
							<span class="old-price">R16,000.00</span>
							<span class="sale-price">R14,999.00</span>
						</h3>
						<button class="product-card-button">Add to Cart</button>
					</div>
				</li>
				<li class="product-card" data-itemid="3">
					<div class="product-card-image">
						<img src="/images/product3.jpg" alt="Alienware AW3423DW" />
					</div>
					<div class="product-card-info">
						<h3 class="product-card-title">Alienware AW3423DW</h3>
						<p class="product-card-description">
							UWQHD (3440x1440) 175Hz 0.1ms QD-OLED HDR400 G-Sync Ultimate
							Curved Monitor
						</p>
						<h3>
							<span class="old-price">R25,000.00</span>
							<span class="sale-price">R22,999.00</span>
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
