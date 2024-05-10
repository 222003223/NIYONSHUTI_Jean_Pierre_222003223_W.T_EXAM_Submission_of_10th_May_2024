<?php
/*
    
<!-- Jean Pierre NIYONSHUTI        REG_NO:  222003223  -->
 <!--  to fit the better appearence was summarized to be AR Platiform -->


*/
require_once 'config.php'; // Include the config.php file for database connection


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$TagName = $_POST['TagName'];
$Description = $_POST['Description'];
$CreatedBy = $_POST['CreatedBy'];

$sql = "INSERT INTO tags (TagName, Description, CreatedBy)
        VALUES ('$TagName', '$Description', '$CreatedBy')";

if ($conn->query($sql) === TRUE) {
   
    echo "<script>alert('Hello $CreatedBy, your tags was successfully submitted');</script>";

    echo "<script>window.location.href = 'tags.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $TagID  = filter_var($_POST['TagID '], FILTER_SANITIZE_TagID);
    $column = filter_var($_POST['column'], FILTER_SANITIZE_STRING);
    $value = filter_var($_POST['value'], FILTER_SANITIZE_STRING);

    try {
        // Prepare the SQL query
        $sql = "UPDATE tags SET $column = ? WHERE TagID = ?";
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bind_param("ss", $value, $TagID );

        // Execute the query
        $stmt->execute();

        // Check if any rows were affected
        $rowsAffected = $stmt->affected_rows;
        if ($rowsAffected > 0) {
            echo "<script>alert('tags data updated successfully!'); window.location.href = 'admin_home.html';</script>";
        } else {
            echo "<script>alert('No changes were made.'); window.location.href = 'tags.php';</script>";
        }

    } catch(Exception $e) {
        echo "Error updating user data: " . $e->getMessage();
        error_log("Update tags data error: " . $e->getMessage() . "\n", 3, "/path/to/error.log");
    }
}
?>
