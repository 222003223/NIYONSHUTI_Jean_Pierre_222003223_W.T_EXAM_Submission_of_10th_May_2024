<?php
/*
    
<!-- Jean Pierre NIYONSHUTI        REG_NO:  222003223  -->
 <!--  to fit the better appearence was summarized to be AR Platiform -->


*/
require_once 'config.php'; // Include the config.php file for database connection


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['query'])) {
    $searchTerm = $conn->real_escape_string($_GET['query']);
    $output = "";
//<!-----HITIMANA FABRICE 222010357---->
    $queries = [
       ' admin' => "SELECT AdminID, Name, PhoneNumber, Email, Role, Password FROM  admin WHERE  AdminID LIKE '%$searchTerm%'",
        'users' => "SELECT user_id ,last_name,first_name,username,email,password,role,contact,gender,dateofbirth FROM users WHERE user_id LIKE '%$searchTerm%'",
        'tags' => "SELECT TagID, TagName, Description, CreatedBy FROM tags WHERE TagID LIKE '%$searchTerm%'",
        'feedback' => "SELECT feedback_id,workshop_id, user_id, feedback_text, rating FROM feedback WHERE feedback_id LIKE '%$searchTerm%'",
        'workshops' => "SELECT workshop_id,title, description, instructor_id, start_date,end_date,location,capacity,TagID FROM workshops WHERE workshop_id LIKE '%$searchTerm%'",
        'payments' => "SELECT payment_id, workshop_id, user_id, amount, payment_method FROM payments WHERE payment_id LIKE '%$searchTerm%'",
        'message' => "SELECT message_id,fullname, email, phone, contact_way, message FROM message WHERE message_id LIKE '%$searchTerm%'",
        'ar_resources' => "SELECT resource_id, workshop_id, resource_type, resource_url, description FROM ar_resources WHERE resource_id LIKE '%$searchTerm%'",
        'sessions' => "SELECT session_id, workshop_id, session_date, session_start_time, session_end_time,session_topic,session_description FROM sessions WHERE session_id LIKE '%$searchTerm%'",
         'instructors' => "SELECT instructor_id,user_id, bio, expertise FROM instructors WHERE instructor_id LIKE '%$searchTerm%'",
        'attendees' => "SELECT attendee_id,workshop_id,user_id FROM attendees WHERE attendee_id LIKE '%$searchTerm%'"
    ];

    $output .= "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $result = $conn->query($sql);
        $output .= "<h3>Table of $table:</h3>";
        
        if ($result) {
            if ($result->num_rows > 0) {
                $output .= "<table border='1'>";
                // Output table header
                $output .= "<tr>";
                $row = $result->fetch_assoc(); // Fetch first row to get column names
                foreach ($row as $key => $value) {
                    $output .= "<th>$key</th>";
                }
                $output .= "</tr>";
                
                // Output table data
                do {
                    $output .= "<tr>";
                    foreach ($row as $value) {
                        $output .= "<td>$value</td>";
                    }
                    $output .= "</tr>";
                } while ($row = $result->fetch_assoc());
                
                $output .= "</table>";
            } else {
                $output .= "<p>No results found in $table matching the search term: '$searchTerm'</p>";
            }
        } else {
            $output .= "<p>Error executing query: " . $conn->error . "</p>";
        }
    }

    echo $output;

    $conn->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>