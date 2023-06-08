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

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script>
		$(document).ready(function() {
			$(".product-card-button").on("click", function() {
				// Check if the user is logged in
				if (loggedIn()) {
					// Get the item ID from the parent list item
					var itemID = $(this).closest(".product-card").data("itemid");

					// Send AJAX request to add the item to the cart
					$.ajax({
						type: "POST",
						url: "../includes/add-to-cart.php",
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
					window.location.href = "/src/account.php";
				}
			});

			function loggedIn() {
				return <?php echo isset($_SESSION['UserID']) ? 'true' : 'false'; ?>;
			}
		});
	</script>

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
				<li class="product-card" data-itemid="4">
					<div class="product-card-image">
						<img src="/images/ASUS ROG MAXIMUS XII HERO WIFI.jpg" alt="ASUS ROG MAXIMUS XII" />
					</div>
					<div class="product-card-info">
						<h3 class="product-card-title">ASUS ROG MAXIMUS XII HERO WIFI</h3>
						<p class="product-card-description">
							-Intel Z490 ATX
							- Intel LGA 1200 Socket
							- Robust Power Solution
							- Optimized Thermal Design
						</p>
						<h3>
							<span class="old-price">R10,000.00</span>
							<span class="sale-price">R4,999.00</span>
						</h3>
						<button class="product-card-button">Add to Cart</button>
					</div>
				</li>
				<li class="product-card" data-itemid="5">
					<div class="product-card-image">
						<img src="/images/G.Skill Trident Z5 NEO RGB 32GB.jpg" alt="Product 2" />
					</div>
					<div class="product-card-info">
						<h3 class="product-card-title">G.Skill Trident Z5 NEO RGB 32GB</h3>
						<p class="product-card-description">
							- 32GB (2x16GB)
							- DDR5-5600MHz
							- 1.35V
							- CL28
							- 288-pin DIMM
							- AMD EXPO Memory OC Profile
						</p>
						<h3>
							<span class="old-price">R4,000.00</span>
							<span class="sale-price">R2,999.00</span>
						</h3>
						<button class="product-card-button">Add to Cart</button>
					</div>
				</li>
				<li class="product-card" data-itemid="6">
					<div class="product-card-image">
						<img src="/images/Fractal Design Torrent White Steel.jpg" alt="Product 3" />
					</div>
					<div class="product-card-info">
						<h3 class="product-card-title">Fractal Design Torrent White Steel</h3>
						<p class="product-card-description">
							- Top-Tier Airflow Design
							- Steel Chassis
							- Clear Tempered Glass Panel
							- Full-Tower Form Factor
						</p>
						<h3 class="item-price">
							<span class="old-price">R5,000.00</span>
							<span class="sale-price">R3,999.00</span>
						</h3>
						<button class="product-card-button">Add to Cart</button>
					</div>
				</li>
			</ul>
		</div>
	</section>

	<section class="mostpopular">
		<div class="mostpopular-content">
			<h2 class="mostpopular-content-headers">All Products</h2>
			<h3 class="mostpopular-content-headers">Prices subject to change</h3>
			<ul class="products">
				<?php
				$query = "SELECT * FROM items";
				$result = mysqli_query($conn, $query);

				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo '<li class="product-card" data-itemid="' . $row['ItemID'] . '">';
						echo '<div class="product-card-image">';
						echo '<img src="/images/' . $row['Image'] . '" alt="' . $row['Name'] . '" />';
						echo '</div>';
						echo '<div class="product-card-info">';
						echo '<h3 class="product-card-title">' . $row['Name'] . '</h3>';
						echo '<p class="product-card-description">' . $row['Description'] . '</p>';

						$price = 'R' . number_format($row['Price'], 2, '.', ',');
						echo '<h3>';
						echo '<span class="old-price">' . $price . '</span>';

						if ($row['SalesPrice'] != null) {
							$salesPrice = 'R' . number_format($row['SalesPrice'], 2, '.', ',');
							echo '<span class="sale-price">' . $salesPrice . '</span>';
						}
						echo '</h3>';
						echo '<button class="product-card-button">Add to Cart</button>';
						echo '</div>';
						echo '</li>';
					}
				} else {
					echo '<li>No items found.</li>';
				}
				// Close the database connection
				mysqli_close($conn);
				?>

			</ul>
		</div>
	</section>

	<?php include_once "../includes/footer.php"; ?>
</body>

</html>
