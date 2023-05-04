<?php 
require_once '../components/navbarDashboard.php';
include '../connections/connection.php';

// Establish database connection
$con = connection();

// Retrieve data from table
$sql = "SELECT * FROM tbl_residents";
$result = $con->query($sql);

// Check if data exists
if ($result->num_rows > 0) {
    
    // Display data in HTML table
    echo "<table>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Sex</th><th>Age</th><th>Address</th><th>Contact</th><th>Email</th></tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["firstname"]."</td>";
        echo "<td>".$row["lastname"]."</td>";
        echo "<td>".$row["sex"]."</td>";
        echo "<td>".$row["age"]."</td>";
        echo "<td>".$row["address"]."</td>";
        echo "<td>".$row["contact"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No data available.";
}

// Close database connection
$con->close();

?>