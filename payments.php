<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AR payments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <link rel="stylesheet" href="css/style5.css">
</head>
<body>    <header> 
        <h1><img src="img/ig1.png" alt="icon"> AR payments</h1>
</header>
<header>
      <nav>
        <ul>
         <li>   <a href="admin_update.html" class="nav-item nav-link">UPDATE</a></li> 
                         <li> <a href="feedback.php" class="nav-item nav-link">feedback</a>
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
    <title>ar payment Management</title>
    <!-- Include any necessary CSS files -->
</head>
<body>
    <!-- Display the table -->
    <br><br><br>
    <table id="dataTable" class="table table-hover text-center">
        <tr>
            <th>ID</th>
            <th>workshop_id</th>
            <th>user_id</th>
            <th>amount</th>
            <th>payment_method</th>
        </tr>
        <?php
        // Fetch data from the payments table
        $sql = "SELECT * FROM payments";
        $result = $conn->query($sql);

        // Output data of each row
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["payment_id"] . "</td>"; // payment_id
                echo "<td>" . $row["workshop_id"] . "</td>"; // workshop_id
                echo "<td>" . $row["user_id"] . "</td>"; // user_id
                echo "<td>" . $row["amount"] . "</td>"; // amount
                echo "<td>" . $row["payment_method"] . "</td>"; // payment_method
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