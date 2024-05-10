<?php
/*
    


*/
// Include database connection file
require_once "config.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fullname = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$contact_way = $_POST['service'];
$message = $_POST("message");

$sql = "INSERT INTO message(fullname, email, phone, contact_way, message)
        VALUES ('$fullname', '$email', '$phone', '$contact_way','$message')";

if ($conn->query($sql) === TRUE) {
    echo "Thank you,  Your message send was placed successfully. The team will contact you soon.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
