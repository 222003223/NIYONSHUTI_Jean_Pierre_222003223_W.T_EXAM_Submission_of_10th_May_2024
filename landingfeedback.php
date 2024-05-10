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
$feedback_text = $_POST['feedback_text'];
$rating = $_POST['rating'];
$sql = "INSERT INTO feedback (workshop_id, user_id, feedback_text, rating)
        VALUES ('$workshop_id', '$user_id', '$feedback_text', '$rating')";

if ($conn->query($sql) === TRUE) {
   
    echo "<script>alert('Hello $workshop_id, your registration was successfully submitted');</script>";

    echo "<script>window.location.href = 'feedback.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback_id = filter_var($_POST['feedback_id'], FILTER_SANITIZE_feedback_text);
    $column = filter_var($_POST['column'], FILTER_SANITIZE_STRING);
    $value = filter_var($_POST['value'], FILTER_SANITIZE_STRING);

    try {
        // Prepare the SQL query
        $sql = "UPDATE feedback SET $column = ? WHERE feedback_id= ?";
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bind_param("ss", $value, $feedback_id);

        // Execute the query
        $stmt->execute();

        // Check if any rows were affected
        $rowsAffected = $stmt->affected_rows;
        if ($rowsAffected > 0) {
            echo "<script>alert('feedback data updated successfully!'); window.location.href = 'admin_home.html';</script>";
        } else {
            echo "<script>alert('No changes were made.'); window.location.href = 'feedback.php';</script>";
        }

    } catch(Exception $e) {
        echo "Error updating user data: " . $e->getMessage();
        error_log("Update feedback data error: " . $e->getMessage() . "\n", 3, "/path/to/error.log");
    }
}
?>
