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
$resource_type = $_POST['resource_type'];
$resource_url = $_POST['resource_url'];
$description = $_POST['description'];
$sql = "INSERT INTO ar_resources (workshop_id, resource_type, resource_url, description)
        VALUES ('$workshop_id', '$resource_type', '$resource_url', '$description')";

if ($conn->query($sql) === TRUE) {
   
    echo "<script>alert('Hello $workshop_id, your registration was successfully submitted');</script>";

    echo "<script>window.location.href = 'ar_resources.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resource_id = filter_var($_POST['resource_id'], FILTER_SANITIZE_resource_id);
    $column = filter_var($_POST['column'], FILTER_SANITIZE_STRING);
    $value = filter_var($_POST['value'], FILTER_SANITIZE_STRING);

    try {
        // Prepare the SQL query
        $sql = "UPDATE ar_resources SET $column = ? WHERE resource_id= ?";
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bind_param("ss", $value, $resource_id);

        // Execute the query
        $stmt->execute();

        // Check if any rows were affected
        $rowsAffected = $stmt->affected_rows;
        if ($rowsAffected > 0) {
            echo "<script>alert('ar_resources data updated successfully!'); window.location.href = 'admin_home.html';</script>";
        } else {
            echo "<script>alert('No changes were made.'); window.location.href = 'ar_resources.php';</script>";
        }

    } catch(Exception $e) {
        echo "Error updating user data: " . $e->getMessage();
        error_log("Update ar_resources data error: " . $e->getMessage() . "\n", 3, "/path/to/error.log");
    }
}
?>
