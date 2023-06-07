<?php
require_once("../includes/connection.php");

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['UserID'])) {
	header("Location: /src/account.php");
	exit();
}

if (isset($_POST['itemID'])) {
	$itemID = $_POST['itemID'];
	$userID = $_SESSION['UserID'];

	// Check if the item already exists in the cart
	$query = "SELECT * FROM user_cart WHERE ItemID = $itemID AND UserID = $userID";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		// Query execution failed, display the error message
		echo "Query Error: " . mysqli_error($conn);
		exit();
	}

	if (mysqli_num_rows($result) > 0) {
		// Item already exists, increment the quantity
		$query = "UPDATE user_cart SET Quantity = Quantity + 1 WHERE ItemID = $itemID AND UserID = $userID";
		$updateResult = mysqli_query($conn, $query);

		if (!$updateResult) {
			// Query execution failed, display the error message
			echo "Query Error: " . mysqli_error($conn);
			exit();
		}
	} else {
		// Item does not exist, insert a new record
		$query = "INSERT INTO user_cart (UserID, ItemID, Quantity) VALUES ($userID, $itemID, 1)";
		$insertResult = mysqli_query($conn, $query);

		if (!$insertResult) {
			// Query execution failed, display the error message
			echo "Query Error: " . mysqli_error($conn);
			exit();
		}
	}

	// Close the database conn
	mysqli_close($conn);

	// Return a response to the AJAX request
	echo "Success";
}
