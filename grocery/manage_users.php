<?php
session_start();
include 'connect.php';

// Ensure the user is logged in and is an employee
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'employee') {
    header('Location: login.php');
    exit();
}

// Fetch all users
$users = mysqli_query($conn, "SELECT id, username, email, role FROM users");

// Handle adding, updating, and deleting users
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_user'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $role = $_POST['role'];

        mysqli_query($conn, "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')");
        header('Location: manage_users.php'); // Redirect to refresh the page
    } elseif (isset($_POST['update_user'])) {
        $user_id = $_POST['user_id'];
        $email = $_POST['email'];

        mysqli_query($conn, "UPDATE users SET email = '$email' WHERE id = '$user_id'");
        header('Location: manage_users.php'); // Redirect to refresh the page
    } elseif (isset($_POST['delete_user'])) {
        $user_id = $_POST['user_id'];
        mysqli_query($conn, "DELETE FROM users WHERE id = '$user_id'");
        header('Location: manage_users.php'); // Redirect to refresh the page
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container" style="margin-top: 20px;">
        <h2>Manage Users</h2>

        <!-- Add User Form -->
        <form method="POST" class="mb-4">
            <h4>Add User</h4>
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Role:</label>
                <select name="role" class="form-control" required>
                    <option value="customer">Customer</option>
                    <option value="employee">Employee</option>
                </select>
            </div>
            <button type="submit" name="add_user" class="btn btn-success">Add User</button>
        </form>

        <!-- Existing Users Table -->
        <h4>Existing Users</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($users)): ?>
                <tr>
                    <form method="POST">
                        <td><?php echo $row['username']; ?></td>
                        <td><input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control"></td>
                        <td><?php echo ucfirst($row['role']); ?></td>
                        <td>
                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="update_user" class="btn btn-warning">Update Email</button>
                            <button type="submit" name="delete_user" class="btn btn-danger">Delete</button>
                            <?php if ($row['role'] == 'customer'): ?>
                                <a href="manage_users.php?customer_id=<?php echo $row['id']; ?>" class="btn btn-info">View Order History</a>
                            <?php endif; ?>
                        </td>
                    </form>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- View Customer Order History -->
        <?php if (isset($_GET['customer_id'])): 
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
            <h4>Order History for <?php echo $customer['username']; ?> (<?php echo $customer['email']; ?>)</h4>
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
        <?php endif; ?>

        <a href="employee_home.php" class="btn btn-secondary">Back to Home</a>
    </div>
</body>
</html>
