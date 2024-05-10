<?php
/*
    
/*
    
 <!-- Jean Pierre NIYONSHUTI        REG_NO:  222003223   -->
 <!-- ar_workshop_platform-->


*/


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'Jean');
define('DB_PASSWORD', 'PierreJ@2020');
define('DB_NAME', 'ar_workshop_platform');
define('DB_PORT', '3306'); 


$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
