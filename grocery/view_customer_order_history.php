<?php
session_start();
include 'connect.php';

// Ensure the user is logged in and is an employee
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'employee') {
    header('Location: login.php');
    exit();
}

if (!isset($_GET['customer_id'])) {
    header('Location: select_customer.php');
    exit();
}

$customer_id = $_GET['customer_id'];

// Fetch the selected customer's order history
$order_result = mysqli_query($conn, "
    SELECT transactions.id AS transaction_id, transactions.total_amount, transactions.created_at, 
           transaction_details.product_id, transaction_details.quantity, transaction_details.price, 
           products.name 
    FROM transactions 
    JOIN transaction_details ON transactions.id = transaction_details.transaction_id 
    JOIN products ON transaction_details.product_id = products.id 
    WHERE transactions.user_id = '$customer_id' 
    ORDER BY transactions.created_at DESC
");

// Fetch the customer's details
$customer_result = mysqli_query($conn, "SELECT username, email FROM users WHERE id = '$customer_id'");
$customer = mysqli_fetch_assoc($customer_result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Order History</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container" style="margin-top: 20px;">
        <h2>Order History for <?php echo $customer['username']; ?> (<?php echo $customer['email']; ?>)</h2>

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
            <p>This customer has no past orders.</p>
        <?php endif; ?>

        <a href="select_customer.php" class="btn btn-secondary">Back to Customer List</a>
    </div>
</body>
</html>
