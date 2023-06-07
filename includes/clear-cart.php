<?php
// clear-cart.php

require_once("connection.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['UserID'])) {
    $userID = $_SESSION['UserID'];

    // Delete cart items for the logged-in user
    $sql = "DELETE FROM user_cart WHERE UserID = $userID";
    mysqli_query($conn, $sql);
}

unset($_SESSION['cart']);
