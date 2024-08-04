<?php
session_start(); // Start the session

// Destroy the session
session_unset();
session_destroy();

// Redirect to the login and signup page
header("Location: http://localhost:8080/grocery/index1.html");
exit();
?>
