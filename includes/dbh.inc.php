<?php

$dsn = "mysql:host=localhost;dbname=dans_computers_db";
$dbusername = "root";
$dbpassword = "";
// $dbName = "dans_computers_db";

try {
	$pdo = new PDO($dsn, $dbusername, $dbpassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

// $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
