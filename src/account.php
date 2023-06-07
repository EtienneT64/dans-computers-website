<?php
require_once("../includes/connection.php");
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
?>
<?php
if (isset($_SESSION['UserID'])) {
?>
	<?php include_once "../includes/account-details.php"; ?>
	<?php
} else {
	?>
	<?php include_once "../includes/login.php"; ?>
<?php
}
?>
