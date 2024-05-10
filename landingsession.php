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
$session_date = $_POST['session_date'];
$session_start_time = $_POST['session_start_time'];
$session_end_time = $_POST['session_end_time'];
$session_topic = $_POST['session_topic'];
$session_description = $_POST['session_description'];


$sql = "INSERT INTO sessions (workshop_id, session_date, session_start_time, session_end_time,session_topic,session_description)
        VALUES ('$workshop_id','$session_date', '$session_start_time', '$session_end_time','$session_topic','$session_description')";

if ($conn->query($sql) === TRUE) {
   
    echo "<script>alert('Hello $workshop_id, your registration was successfully submitted');</script>";

    echo "<script>window.location.href = 'sessions.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $session_id = filter_var($_POST['session_id'], FILTER_SANITIZE_session_id);
    $column= filter_var($_POST['column'], FILTER_SANITIZE_STRING);
    $value = filter_var($_POST['value'], FILTER_SANITIZE_STRING);

    try {
        // Prepare the SQL query
        $sql = "UPDATE as SET $value = ? WHERE session_id= ?";
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bind_param("ss", $value, $session_id);

        // Execute the query
        $stmt->execute();

        // Check if any rows were affected
        $rowsAffected = $stmt->affected_rows;
        if ($rowsAffected > 0) {
            echo "<script>alert('sessions data updated successfully!'); window.location.href = 'admin_home.html';</script>";
        } else {
            echo "<script>alert('No changes were made.'); window.location.href = 'sessions.php';</script>";
        }

    } catch(Exception $e) {
        echo "Error updating user data: " . $e->getMessage();
        error_log("Update sessions data error: " . $e->getMessage() . "\n", 3, "/path/to/error.log");
    }
}
?>
