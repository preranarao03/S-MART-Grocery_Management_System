<?php
session_start();
include 'connect.php';

// Ensure the user is logged in
if (!isset($_SESSION['username']) || !isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch cart items for the logged-in user
$result = mysqli_query($conn, "SELECT cart.id, cart.product_id, products.name, products.price, cart.quantity FROM cart JOIN products ON cart.product_id = products.id WHERE cart.user_id = '$user_id'");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout'])) {
    // Handle checkout
    $total_amount = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $total_amount += $row['price'] * $row['quantity'];
    }

    mysqli_query($conn, "INSERT INTO transactions (user_id, total_amount) VALUES ('$user_id', '$total_amount')");
    $transaction_id = mysqli_insert_id($conn);

    mysqli_data_seek($result, 0);  // Reset result pointer
    while ($row = mysqli_fetch_assoc($result)) {
        // Ensure product_id is correctly retrieved
        $product_id = $row['product_id'];
        $quantity = $row['quantity'];
        $price = $row['price'];
        
        // Insert into transaction_details
        mysqli_query($conn, "INSERT INTO transaction_details (transaction_id, product_id, quantity, price) VALUES ('$transaction_id', '$product_id', '$quantity', '$price')");
        
        // Update product stock
        mysqli_query($conn, "UPDATE products SET stock = stock - $quantity WHERE id = $product_id");
    }

    // Clear the cart
    mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id'");

    // Redirect to the dashboard page after successful checkout
    echo '<script>alert("Order placed successfully!"); window.location.href="customer_home.php";</script>';
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Your Cart</h2>
        <a href="products.php" class="btn btn-info">Continue Shopping</a>
        <form method="POST">
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0; 
                    while ($row = mysqli_fetch_assoc($result)): 
                        $subtotal = $row['price'] * $row['quantity'];
                    ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $subtotal; ?></td>
                    </tr>
                    <?php 
                    $total += $subtotal; 
                    endwhile; 
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total</th>
                        <th><?php echo $total; ?></th>
                    </tr>
                </tfoot>
            </table>
            <button type="submit" name="checkout" class="btn btn-success">Checkout</button>
        </form>
        <a href="order_history.php" class="btn btn-info">View Order History</a>
        <a href="customer_home.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</body>
</html>
