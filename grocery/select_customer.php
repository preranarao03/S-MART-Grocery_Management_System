<?php
session_start();
include 'connect.php';

// Ensure the user is logged in and is an employee
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'employee') {
    header('Location: login.php');
    exit();
}

// Fetch all customers
$customers = mysqli_query($conn, "SELECT id, username, email FROM users WHERE role = 'customer'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Customer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container" style="margin-top: 20px;">
        <h2>Select Customer to View Order History</h2>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($customers)): ?>
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="view_customer_order_history.php?customer_id=<?php echo $row['id']; ?>" class="btn btn-info">View Order History</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="employee_home.php" class="btn btn-secondary">Back to Home</a>
    </div>
</body>
</html>
