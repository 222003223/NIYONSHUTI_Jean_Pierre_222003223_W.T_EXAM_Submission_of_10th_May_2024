<?php
/*
    
<!-- Jean Pierre NIYONSHUTI        REG_NO:  222003223  -->
 <!--  to fit the better appearence was summarized to be AR Platiform -->


*/
require_once 'config.php'; // Include the config.php file for database connection


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_POST['user_id'];
$bio = $_POST['bio'];
$expertise = $_POST['expertise'];
$sql = "INSERT INTO instructors (user_id, bio, expertise)
        VALUES ('$user_id', '$bio', '$expertise')";

if ($conn->query($sql) === TRUE) {
   
    echo "<script>alert('Hello $workshop_id, your registration was successfully submitted');</script>";

    echo "<script>window.location.href = 'instructors.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $instructor_id = filter_var($_POST['instructor_id'], FILTER_SANITIZE_instructor_id);
    $column = filter_var($_POST['column'], FILTER_SANITIZE_STRING);
    $value = filter_var($_POST['value'], FILTER_SANITIZE_STRING);

    try {
        // Prepare the SQL query
        $sql = "UPDATE instructors SET $column = ? WHERE instructor_id= ?";
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bind_param("ss", $value, $instructor_id);

        // Execute the query
        $stmt->execute();

        // Check if any rows were affected
        $rowsAffected = $stmt->affected_rows;
        if ($rowsAffected > 0) {
            echo "<script>alert('instructor data updated successfully!'); window.location.href = 'admin_home.html';</script>";
        } else {
            echo "<script>alert('No changes were made.'); window.location.href = 'instructors.php';</script>";
        }

    } catch(Exception $e) {
        echo "Error updating user data: " . $e->getMessage();
        error_log("Update instructor data error: " . $e->getMessage() . "\n", 3, "/path/to/error.log");
    }
}
?>
