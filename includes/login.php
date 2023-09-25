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

				// Check if the user is an admin
				if ($email === "admin@adminonly.com") {
					$_SESSION["admin"] = true;
				}

				// Set the session variables
				$_SESSION['UserID'] = $row['UserID'];
				$_SESSION['Username'] = $row['Username'];
				$_SESSION['Email'] = $row['Email'];

				// Redirect to admin file to process if user is an admin or not
				header("Location: ../includes/admin.php");
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

	<link rel="icon" href="/images/favicon.png" type="image/png">

	<link rel="stylesheet" type="text/css" href="/styles/account.css" />
	<link rel="stylesheet" type="text/css" href="/styles/login.css" />

	<title>Dans Computers / Login</title>
</head>

<body>
	<?php include_once "../includes/header.php"; ?>

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

	<?php include_once "../includes/footer.php"; ?>
</body>

</html>
