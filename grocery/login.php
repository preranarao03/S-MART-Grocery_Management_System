<?php
session_start();
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    // Check if the user exists and has the correct role
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='$role'");
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['user_id'] = $row['id']; // Store the user ID in the session

        if ($row['role'] == 'customer') {
            header('Location: customer_home.php'); // Redirect to the customer dashboard
        } else {
            header('Location: employee_home.php'); // Redirect to the employee dashboard
        }
    } else {
        echo "<script>alert('Invalid credentials! Please check your username, password, and role.'); window.location.href='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container" style="max-width: 400px; margin-top: 100px;">
        <h2>Login</h2>
        <form method="POST">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label>Login as:</label>
                <select name="role" class="form-control" required>
                    <option value="customer">Customer</option>
                    <option value="employee">Employee</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Signup here</a></p>
    </div>
</body>
</html>
