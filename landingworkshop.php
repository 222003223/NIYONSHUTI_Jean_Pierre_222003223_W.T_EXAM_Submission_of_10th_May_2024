<?php
/*
    
<!-- Jean Pierre NIYONSHUTI        REG_NO:  222003223  -->
 <!--  to fit the better appearence was summarized to be AR Platiform -->


*/
require_once 'config.php'; // Include the config.php file for database connection


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$title = $_POST['title'];
$description = $_POST['description'];
$instructor_id = $_POST['instructor_id'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$location = $_POST['location'];
$capacity = $_POST['capacity'];
$TagID = $_POST['TagID'];

$sql = "INSERT INTO workshops (title, description, instructor_id, start_date,end_date,location,capacity,TagID)
        VALUES ('$title','$description', '$instructor_id', '$start_date','$end_date','$location','$capacity','$TagID')";

if ($conn->query($sql) === TRUE) {
   
    echo "<script>alert('Hello $title, your registration was successfully submitted');</script>";

    echo "<script>window.location.href = 'workshops.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $workshop_id = filter_var($_POST['workshop_id'], FILTER_SANITIZE_workshop_id);
    $column= filter_var($_POST['column'], FILTER_SANITIZE_STRING);
    $value = filter_var($_POST['value'], FILTER_SANITIZE_STRING);

    try {
        // Prepare the SQL query
        $sql = "UPDATE workshops SET $value = ? WHERE workshop_id= ?";
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bind_param("ss", $value, $workshop_id);

        // Execute the query
        $stmt->execute();

        // Check if any rows were affected
        $rowsAffected = $stmt->affected_rows;
        if ($rowsAffected > 0) {
            echo "<script>alert('workshops data updated successfully!'); window.location.href = 'admin_home.html';</script>";
        } else {
            echo "<script>alert('No changes were made.'); window.location.href = 'workshops.php';</script>";
        }

    } catch(Exception $e) {
        echo "Error updating user data: " . $e->getMessage();
        error_log("Update workshops data error: " . $e->getMessage() . "\n", 3, "/path/to/error.log");
    }
}
?>
