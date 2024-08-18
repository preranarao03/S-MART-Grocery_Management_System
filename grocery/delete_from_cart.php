<?php
session_start();
include 'connect.php';

// Ensure the user is logged in
if (!isset($_SESSION['username']) || !isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $cart_id = $_POST['cart_id'];
    
    // Remove product from cart
    mysqli_query($conn, "DELETE FROM cart WHERE id='$cart_id' AND user_id='$user_id'");
    header('Location: cart.php');
}
?>
