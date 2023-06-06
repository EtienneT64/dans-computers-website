<?php
session_start();
?>

<?php
// Check if the admin session variable is not set
if (!isset($_SESSION["admin"])) {
	// Redirect to the login form or another appropriate page
	header("Location: /src/index.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Page</title>
</head>

<body>
	<h1>Welcome, Admin!</h1>
	<p>This is the admin-only page.</p>
	<!-- Add your admin-specific content here -->
</body>

</html>
