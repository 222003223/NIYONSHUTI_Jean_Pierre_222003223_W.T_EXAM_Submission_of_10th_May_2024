<?php
/*
    
<!-- Jean Pierre NIYONSHUTI        REG_NO:  222003223  -->
 <!--  to fit the better appearence was summarized to be AR Platiform -->


*/
require_once 'config.php'; // Include the config.php file for database connection


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$workshop_id = $_POST['workshop_id'];
$user_id = $_POST['user_id'];
$amount = $_POST['amount'];
$payment_method = $_POST['payment_method'];
$sql = "INSERT INTO payments (workshop_id, user_id, amount, payment_method)
        VALUES ('$workshop_id','$user_id', '$amount','$payment_method')";

if ($conn->query($sql) === TRUE) {
   
    echo "<script>alert('Hello $workshop_id, your registration was successfully submitted');</script>";

    echo "<script>window.location.href = 'payments.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment_id = filter_var($_POST['payment_id'], FILTER_SANITIZE_payment_id);
    $column = filter_var($_POST['column'], FILTER_SANITIZE_STRING);
    $value = filter_var($_POST['value'], FILTER_SANITIZE_STRING);

    try {
        // Prepare the SQL query
        $sql = "UPDATE payments SET $column = ? WHERE payment_id= ?";
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bind_param("ss", $value, $payment_id);

        // Execute the query
        $stmt->execute();

        // Check if any rows were affected
        $rowsAffected = $stmt->affected_rows;
        if ($rowsAffected > 0) {
            echo "<script>alert('payment data updated successfully!'); window.location.href = 'admin_home.html';</script>";
        } else {
            echo "<script>alert('No changes were made.'); window.location.href = 'payments.php';</script>";
        }

    } catch(Exception $e) {
        echo "Error updating user data: " . $e->getMessage();
        error_log("Update payment data error: " . $e->getMessage() . "\n", 3, "/path/to/error.log");
    }
}
?>
