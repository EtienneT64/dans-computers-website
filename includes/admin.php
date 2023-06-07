<?php
require_once("../includes/connection.php");

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

// Check if the admin session variable is not set
if (!isset($_SESSION["admin"])) {
	header("Location: /src/account.php");
	exit;
}

// Function to retrieve all items from the database
function getItems($conn)
{
	$stmt = $conn->prepare("SELECT * FROM items WHERE ItemID > 6");
	$stmt->execute();
	return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Function to add a new item to the database
function addItem($conn, $name, $description, $price, $salesPrice, $image)
{
	$stmt = $conn->prepare("INSERT INTO items (Name, Description, Price, SalesPrice, Image) VALUES (?, ?, ?, ?, ?)");
	$stmt->bind_param("ssdds", $name, $description, $price, $salesPrice, $image);
	if ($stmt->execute()) {
		// Display JavaScript alert for successful addition
		echo '<script>alert("Item added successfully!");</script>';
	} else {
		// Display an alert for failed addition
		echo '<script>alert("Failed to add the item. Please try again.");</script>';
	}
}

// Function to delete an item from the database
function deleteItem($conn, $itemID)
{
	$stmt = $conn->prepare("DELETE FROM items WHERE ItemID = ?");
	$stmt->bind_param("i", $itemID);
	if ($stmt->execute()) {
		// Redirect to the admin page after successful deletion
		header("Location: admin.php?success=delete");
		exit;
	}
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['add'])) {
		// Process the form submission for adding a new item
		$name = $_POST['name'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$salesPrice = $_POST['sales_price'];
		$image = $_POST['image'];

		addItem($conn, $name, $description, $price, $salesPrice, $image);
	} elseif (isset($_POST['delete'])) {
		// Process the form submission for deleting an item
		$itemID = $_POST['item_id'];

		deleteItem($conn, $itemID);
	}
}

// Retrieve all items from the database
$items = getItems($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="/styles/admin.css" />

	<title>Dans Computers / Admin</title>
</head>

<body>
	<?php include_once "../includes/header.php"; ?>
	<div class="container">
		<h1>Admin Page</h1>

		<h2>Add Item</h2>
		<form method="post" class="item-form">
			<label for="name">Name:</label>
			<input type="text" name="name" id="name" required><br>

			<label for="description">Description:</label>
			<textarea name="description" id="description" required></textarea><br>

			<label for="price">Price:</label>
			<input type="number" step="0.01" name="price" id="price" required><br>

			<label for="sales_price">Sales Price:</label>
			<input type="number" step="0.01" name="sales_price" id="sales_price"><br>

			<label for="image">Image URL:</label>
			<input type="text" name="image" id="image"><br>

			<input type="submit" name="add" value="Add Item" class="btn-add">
		</form>

		<h2>Items</h2>
		<table>
			<tr>
				<th>ItemID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Sales Price</th>
				<th>Image</th>
				<th>Actions</th>
			</tr>
			<?php foreach ($items as $item) { ?>
				<tr>
					<td><?= $item['ItemID'] ?></td>
					<td><?= $item['Name'] ?></td>
					<td><?= $item['Description'] ?></td>
					<td><?= $item['Price'] ?></td>
					<td><?= $item['SalesPrice'] ?></td>
					<td><?= $item['Image'] ?></td>
					<td>
						<div class="button-container">
							<form method="post" style="display:inline;">
								<input type="hidden" name="item_id" value="<?= $item['ItemID'] ?>">
								<input type="submit" class="btn-delete" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
							</form>
						</div>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>

	<?php include_once "../includes/footer.php"; ?>
</body>

</html>
