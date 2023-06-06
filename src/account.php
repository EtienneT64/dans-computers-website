<?php
// Import the dbh.inc.php file
require_once("connection.php");
session_start();
?>
<?php
if (isset($_SESSION['UserID'])) {
?>
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

<?php
} else {
	// User is not logged in, display the login form
	// Your existing login form code can go here
?>

	<!-- Login form code goes here -->

	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Retrieve form data
		$email = $_POST["email"];
		$password = isset($_POST["password"]) ? $_POST["password"] : '';

		// Validation checks
		$errors = array();

		// Validate email
		if (empty($email)) {
			$errors[] = "Email is required.";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors[] = "Invalid email format.";
		}

		// Validate password
		if (empty($password)) {
			$errors[] = "Password is required.";
		}

		// If there are no errors, process the form
		if (empty($errors)) {
			// Authenticate user against the database
			// Assuming you have a users table in your database with email and hashed_password columns

			// Prepare and execute the query to fetch the user by email
			$query = "SELECT * FROM users WHERE Email = ?";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$result = $stmt->get_result();

			// Check if the user exists and verify the password
			if ($result->num_rows == 1) {
				$row = $result->fetch_assoc();
				$hashedPassword = $row['Password'];
				if (password_verify($password, $hashedPassword)) {
					// Password is correct, user is authenticated
					// Redirect to a success page or perform further actions
					// Set the session variables
					$_SESSION['UserID'] = $row['UserID']; // Example: Store the user ID
					$_SESSION['Username'] = $row['Username']; // Example: Store the username


					// Example: Redirect to homepage
					header("Location: /index.php");
					exit();
				} else {
					$errors[] = "Invalid email or password.";
				}
			} else {
				$errors[] = "Invalid email or password.";
			}

			// Close the database connection
			$conn->close();
		}
	}
	?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="stylesheet" type="text/css" href="/styles/header.css" />
		<link rel="stylesheet" type="text/css" href="/styles/account.css" />
		<link rel="stylesheet" type="text/css" href="/styles/login.css" />
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
				<form id="form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
					<h1>Login</h1>
					<div class="input-control">
						<label for="email">Email</label>
						<input type="text" id="email" name="email" placeholder="Your email" />
						<div class="error">
							<?php
							if (!empty($errors) && in_array("Email is required.", $errors)) {
								echo "Email is required.";
							} elseif (!empty($errors) && in_array("Invalid email format.", $errors)) {
								echo "Invalid email format.";
							}
							?>
						</div>
					</div>

					<div class="input-control">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" placeholder="Your password" />
						<div class="error">
							<?php
							if (!empty($errors) && in_array("Password is required.", $errors)) {
								echo "Password is required.";
							} elseif (!empty($errors) && (in_array("Invalid email or password.", $errors) || in_array("Invalid email or password.", $errors))) {
								echo "Invalid email or password.";
							}
							?>
						</div>
					</div>

					<button type="submit">Log In</button>
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

<?php
}
?>
