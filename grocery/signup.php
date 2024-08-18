<?php
session_start();
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role = 'customer';

    // Check if the user already exists
    $checkUser = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' OR username='$username'");
    if (mysqli_num_rows($checkUser) > 0) {
        echo "<script>alert('User already exists!'); window.location.href='signup.php';</script>";
    } else {
        // Insert new user
        $sql = "INSERT INTO users (username, password, email, role) VALUES ('$username', '$password', '$email', '$role')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Signup successful!'); window.location.href='index.php';</script>";
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container" style="max-width: 400px; margin-top: 100px;">
        <h2>Signup</h2>
        <form method="POST">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Signup</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
