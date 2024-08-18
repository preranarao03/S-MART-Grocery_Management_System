<?php
session_start();
include 'connect.php';

// Ensure the user is logged in and is a customer
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'customer') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center" style="margin-top: 100px;">
        <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
        <p>Select an option to proceed:</p>
        <a href="products.php" class="btn btn-primary btn-lg">View All Products</a>
        <a href="cart.php" class="btn btn-secondary btn-lg">View My Cart</a>
        <a href="order_history.php" class="btn btn-info btn-lg">View Order History</a>
        <br><br>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>
