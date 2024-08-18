
<?php
session_start();
include 'connect.php';

// Ensure user is logged in and is an employee
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'employee') {
    header('Location: login.php');
    exit();
}

// Fetch all transactions from the database
$result = mysqli_query($conn, "SELECT transactions.id, users.username, transactions.total_amount, transactions.created_at FROM transactions JOIN users ON transactions.user_id = users.id");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Transactions</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>All Transactions</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Customer</th>
                    <th>Total Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['total_amount']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="employee_home.php" class="btn btn-secondary">Back to Home</a>
    </div>
</body>
</html>
