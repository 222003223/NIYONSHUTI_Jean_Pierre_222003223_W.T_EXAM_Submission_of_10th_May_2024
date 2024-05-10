<?php
/*
    
 <!-- Jean Pierre NIYONSHUTI        REG_NO:  222003223   -->
 <!-- ar_workshop_platform-->


*/
// Include database connection file
require_once "config.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT username FROM users WHERE email=? AND password=?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows > 0) {
    // User found, redirect to user home page
    session_start();
    $_SESSION['email'] = $email;
    header("Location: user_home.html");
    exit();
} else {
    // User not found, display error message
    echo "<script>alert('Wrong Email or Password, Please Verify Credentials');</script>";
    echo "<script>window.location.href = 'login.html';</script>";
}


$stmt->close();
$conn->close();
?>
