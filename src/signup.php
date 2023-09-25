<?php
require_once("../includes/connection.php");
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Retrieve form data
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$password2 = $_POST["password2"];

	// Validation checks
	$errors = array();

	// Validate username
	if (empty($username)) {
		$errors[] = "Username is required.";
	}

	// Validate email
	if (empty($email)) {
		$errors[] = "Email is required.";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Invalid email format.";
	}

	// Validate password
	if (empty($password)) {
		$errors[] = "Password is required.";
	} elseif (strlen($password) < 6) {
		$errors[] = "Password must be at least 6 characters long.";
	}

	// Validate password confirmation
	if (empty($password2)) {
		$errors[] = "Please confirm your password.";
	} elseif ($password !== $password2) {
		$errors[] = "Passwords do not match.";
	}

	// If there are no errors, process the form
	if (empty($errors)) {
		// Hash the password
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

		// Save data to the database
		$query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("sss", $username, $email, $hashedPassword);
		$stmt->execute();

		// Close the database connection
		$stmt->close();
		$conn->close();

		header("Location: /src/index.php");
		exit();
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="icon" href="/images/favicon.png" type="image/png">

	<link rel="stylesheet" type="text/css" href="/styles/signup.css" />

	<script defer src="../scripts/signup.js"></script>

	<title>Dans Computers / Sign-up</title>
</head>

<body>
	<?php include_once "../includes/header.php"; ?>

	<div class="page-wrapper">
		<div class="container">
			<form id="form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
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

	<?php include_once "../includes/footer.php"; ?>

</body>

</html>
