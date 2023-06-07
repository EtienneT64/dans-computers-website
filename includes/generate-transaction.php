<?php
require_once("../includes/connection.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Retrieve user information
$userID = $_SESSION['UserID'];
$username = $_SESSION['Username'];
$email = $_SESSION['Email'];

// Calculate transaction details
$subtotal = 0;
$vatRate = 0.15;
$shippingCost = 100;

foreach ($_SESSION['cart'] as $item) {
    $itemID = $item['ItemID'];
    $itemName = $item['Name'];
    $salesPrice = $item['SalesPrice'];
    $quantity = $item['Quantity'];

    $itemSubtotal = $salesPrice * $quantity;
    $subtotal += $itemSubtotal;
}

$vat = $subtotal * $vatRate;
$total = $subtotal + $vat + $shippingCost;

// Get the current date and time
$date = date("Y-m-d H:i:s");

// Store the transaction in the database using prepared statements
$sql = "INSERT INTO transactions (UserID, Subtotal, Vat, Shipping, GrandTotal, Date)
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "idddd", $userID, $subtotal, $vat, $shippingCost, $total, $date);
$result = mysqli_stmt_execute($stmt);

if ($result) {
    // Clear the cart after a successful transaction
    $_SESSION['cart'] = array();

    // Display a success message
    echo "success";
} else {
    // Display the exact error message
    echo "Error: " . mysqli_error($conn);
}

// Close the prepared statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
