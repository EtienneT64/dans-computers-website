<?php
require_once("../includes/connection.php");

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

if (isset($_POST['itemID'])) {
	$itemID = $_POST['itemID'];
	$userID = $_SESSION['UserID'];

	// Check if the item exists in the user's cart
	$sql = "SELECT * FROM user_cart WHERE UserID = $userID AND ItemID = $itemID";
	$result = mysqli_query($conn, $sql);

	if ($result && mysqli_num_rows($result) > 0) {
		// Decrease the quantity of the item by 1
		$sql = "UPDATE user_cart SET Quantity = Quantity - 1 WHERE UserID = $userID AND ItemID = $itemID";
		mysqli_query($conn, $sql);

		// Remove the item from the cart if the quantity reaches 0
		$sql = "DELETE FROM user_cart WHERE UserID = $userID AND ItemID = $itemID AND Quantity = 0";
		mysqli_query($conn, $sql);

		// Return a success response
		echo "success";
	} else {
		// Item not found in the cart, return an error response
		echo "error";
	}
} else {
	// Invalid request, return an error response
	echo "error";
}

// Close the database connection
mysqli_close($conn);
