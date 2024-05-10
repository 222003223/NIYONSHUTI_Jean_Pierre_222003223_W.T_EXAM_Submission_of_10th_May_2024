<?php
/*
     <!-- Jean Pierre NIYONSHUTI        REG_NO:  222003223  -->
 <!--  to fit the better appearence was summarized to be AR Platiform -->


*/
// Include database connection file
require_once "config.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$contact = $_POST['contact'];
$gender = $_POST['gender'];
$dateofbirth = $_POST['dateofbirth'];

// Insert data into database
$sql = "INSERT INTO users (last_name,first_name,username,email,password,role,contact,gender,dateofbirth)
        VALUES ('$last_name', '$first_name','$username', '$email', '$password', '$role','$contact','$gender','$dateofbirth')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Hello $name, your registration was successfully submitted');</script>";
    echo "<script>window.location.href = 'login.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
/*
    
 <!-- Jean Pierre NIYONSHUTI        REG_NO:  222003223  -->
 <!--  to fit the better appearence was summarized to be AR Platiform -->


*/
?>
