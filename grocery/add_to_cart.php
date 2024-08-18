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

    // Get current stock level
    $product_result = mysqli_query($conn, "SELECT stock FROM products WHERE id='$product_id'");
    $product = mysqli_fetch_assoc($product_result);
    $stock = $product['stock'];

    // Get current quantity in cart
    $cart_result = mysqli_query($conn, "SELECT quantity FROM cart WHERE user_id='$user_id' AND product_id='$product_id'");
    $cart_item = mysqli_fetch_assoc($cart_result);

    $current_quantity = isset($cart_item['quantity']) ? $cart_item['quantity'] : 0;

    if ($current_quantity < $stock) {
        if ($current_quantity > 0) {
            // Update quantity if product already in cart
            $new_quantity = $current_quantity + 1;
            mysqli_query($conn, "UPDATE cart SET quantity = $new_quantity WHERE user_id='$user_id' AND product_id='$product_id'");
        } else {
            // Add new product to cart
            mysqli_query($conn, "INSERT INTO cart (user_id, product_id, quantity) VALUES ('$user_id', '$product_id', 1)");
            $new_quantity = 1;
        }
        echo json_encode(['status' => 'success', 'quantity' => $new_quantity]);
    } else {
        echo json_encode(['status' => 'out_of_stock']);
    }
}
?>
