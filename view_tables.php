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

$tables = array();
$result = $conn->query("SHOW TABLES");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_row()) {
        $tables[] = $row[0];
    }
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($tables);
?>
