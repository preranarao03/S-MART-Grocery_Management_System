<?php
session_start();
include 'connect.php';

// Ensure the user is logged in and is an employee
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'employee') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center" style="margin-top: 100px;">
        <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
        <p>Select an option to proceed:</p>
        <a href="manage_products.php" class="btn btn-primary btn-lg">Manage Products</a>
        <a href="manage_users.php" class="btn btn-info btn-lg">Manage Users and View Order History</a>
        <br><br>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>
