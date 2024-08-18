<?php
session_start();
include 'connect.php';

// Ensure the user is logged in and is a customer
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'customer') {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch the customer's order history
$order_result = mysqli_query($conn, "
    SELECT transactions.id AS transaction_id, transactions.total_amount, transactions.created_at, 
           transaction_details.product_id, transaction_details.quantity, transaction_details.price, 
           products.name 
    FROM transactions 
    JOIN transaction_details ON transactions.id = transaction_details.transaction_id 
    JOIN products ON transaction_details.product_id = products.id 
    WHERE transactions.user_id = '$user_id' 
    ORDER BY transactions.created_at DESC
");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Order History</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container" style="margin-top: 20px;">
        <h2>Your Order History</h2>

        <?php if (mysqli_num_rows($order_result) > 0): ?>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price per Unit</th>
                        <th>Total Amount</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($order_result)): ?>
                        <tr>
                            <td><?php echo $row['transaction_id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['total_amount']; ?></td>
                            <td><?php echo date("F j, Y, g:i a", strtotime($row['created_at'])); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>You have no past orders.</p>
        <?php endif; ?>

        <a href="customer
