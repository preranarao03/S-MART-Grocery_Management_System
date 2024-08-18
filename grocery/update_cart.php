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
    $product_id = $_POST['product_id'];
    
    // Get current quantity in cart
    $cart_result = mysqli_query($conn, "SELECT quantity FROM cart WHERE user_id='$user_id' AND product_id='$product_id'");
    $cart_item = mysqli_fetch_assoc($cart_result);

    $current_quantity = isset($cart_item['quantity']) ? $cart_item['quantity'] : 0;

    if ($current_quantity > 1) {
        // Decrease quantity if more than one item in cart
        $new_quantity = $current_quantity - 1;
        mysqli_query($conn, "UPDATE cart SET quantity = $new_quantity WHERE user_id='$user_id' AND product_id='$product_id'");
        echo json_encode(['status' => 'success', 'quantity' => $new_quantity]);
    } elseif ($current_quantity == 1) {
        // Remove item from cart if only one item left
        mysqli_query($conn, "DELETE FROM cart WHERE user_id='$user_id' AND product_id='$product_id'");
        echo json_encode(['status' => 'removed']);
    } else {
        echo json_encode(['status' => 'not_in_cart']);
    }
}
?>
