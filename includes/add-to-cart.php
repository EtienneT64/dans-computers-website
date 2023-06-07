<?php
require_once("../includes/connection.php");

if (session_status() === PHP_SESSION_NONE) {
	session_start();
};

if (isset($_POST['itemID'])) {
	$itemID = $_POST['itemID'];
	$userID = $_SESSION['userID']; // Assuming you have a user session

	// Check if the item already exists in the cart
	$query = "SELECT * FROM user_cart WHERE ItemID = $itemID AND UserID = $userID";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0) {
		// Item already exists, increment the quantity
		$query = "UPDATE user_cart SET Quantity = Quantity + 1 WHERE ItemID = $itemID AND UserID = $userID";
		mysqli_query($connection, $query);
	} else {
		// Item does not exist, insert a new record
		$query = "INSERT INTO user_cart (UserID, ItemID, Quantity) VALUES ($userID, $itemID, 1)";
		mysqli_query($connection, $query);
	}

	// Return a response to the AJAX request (optional)
	echo "Success"; // You can customize the response message as needed
}
