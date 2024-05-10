<!DOCTYPE html>
<html lang="en">
<head>
<!---NIYONSHUTI Jean Pierre 222003223--->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AR workshopss</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <link rel="stylesheet" href="css/style5.css">
</head>
<body>    <header> 
        <h1><img src="img/ig1.png" alt="icon"> AR workshopss</h1>
</header>
<header>
      <nav>
        <ul>
         <li>   <a href="admin_update.html" class="nav-item nav-link">UPDATE</a></li> 
                         <li> <a href="feedback.php" class="nav-item nav-link">FEEDBACK</a>
                        <li>  <a href="ar_resources.php" class="nav-item nav-link">ar_resources</a></li> 
                        <li>  <a href="tags.php" class="nav-item nav-link">tags</a></li> 
                        <li>  <a href="workshops.php" class="nav-item nav-link">workshops</a></li> 
                        <li>  <a href="payments.php" class="nav-item nav-link">PAYMENT</a></li> 
                        <li>  <a href="attendees.php" class="nav-item nav-link">attendees</a>
                       <li>   <a href="instructors.php" class="nav-item nav-link">instructors</a></li> 
                       <li>   <a href="sessions.php" class="nav-item nav-link">sessions</a></li> 
                   

        </ul>
    </nav>
<div class="signout">
        <a href="logout.php">Sign Out</a>
    </div>
    <div>
            <button type="button" onclick="window.location.href='admin_home.html'">Back</button>
    </div> 
</header>
<?php
require_once "config.php";

// Display any alert messages
if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">' . $msg . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ar workshops Management</title>
    <!-- Include any necessary CSS files -->
</head>
<body>
    <!-- Display the table -->
    <br><br><br>
    <table id="dataTable" class="table table-hover text-center">
        <tr>
            <th>ID</th>
            <th>title</th>
            <th>description</th>
            <th>instructor_id</th>
            <th>start_date</th>
            <th>end_date</th>
            <th>location</th>
            <th>capacity</th>
            <th>TagID</th>
        </tr>
        <?php
        // Fetch data from the workshopss table
        $sql = "SELECT * FROM workshops";
        $result = $conn->query($sql);

        // Output data of each row
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["workshop_id"] . "</td>"; // workshops_id
                echo "<td>" . $row["title"] . "</td>"; // title
                echo "<td>" . $row["description"] . "</td>"; // description
                echo "<td>" . $row["instructor_id"] . "</td>"; // instructor_id
                echo "<td>" . $row["start_date"] . "</td>"; // start_date
                echo "<td>" . $row["end_date"] . "</td>"; // end_date
                echo "<td>" . $row["location"] . "</td>"; // location
                echo "<td>" . $row["capacity"] . "</td>"; // capacity
                echo "<td>" . $row["TagID"] . "</td>"; // TagID
                echo "<td>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
    <!-- Include any necessary JavaScript files -->
</body>
</html>