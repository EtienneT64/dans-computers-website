<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" type="text/css" href="/styles/account.css" />

	<title>Dans Computers / Account</title>
</head>

<body>
	<?php include_once "../includes/header.php"; ?>

	<div class="page-wrapper">
		<div class="container">
			<h2>My Account</h2>
			<div class="account-details">
				<label for="name">Name:</label>
				<p id="name"><?php echo isset($_SESSION['Username']) ? $_SESSION['Username'] : 'Guest'; ?></p>

				<label for="email">Email:</label>
				<p id="email"><?php echo isset($_SESSION['Email']) ? $_SESSION['Email'] : ''; ?></p>
			</div>
			<div class="logout-link">
				<a href="/includes/logout.php">Logout</a>
			</div>
		</div>
	</div>

	<?php include_once "../includes/footer.php"; ?>
</body>

</html>
