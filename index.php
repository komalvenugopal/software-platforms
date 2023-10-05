<?php
// Include config file
include 'config.php';

// SQL query to fetch data
$sql = "SELECT id, name, price FROM products";
$result = $connect->query($sql);

// Begin HTML table
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>Price</th></tr>";

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["price"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='3'>0 results</td></tr>";
}
// End HTML table
echo "</table>";

// Close connection
$connect->close();
?>
