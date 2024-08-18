
<?php
$servername = "localhost"; // Typically 'localhost'
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password (usually empty for XAMPP)
$database = "grocery"; // The name of your database

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
