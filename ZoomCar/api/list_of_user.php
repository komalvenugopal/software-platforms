<?php
// Set the appropriate response headers for JSON
header('Content-Type: application/json');

// Connect to your company's database
$db_host = "m7az7525jg6ygibs.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$db_user = "fgh9sc82wezg1d1y";
$db_pass = "rsb5bdcbut01gt64";
$db_name = "xtm5hual7b3uhuky";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die(json_encode(array('error' => 'Connection failed: ' . $conn->connect_error)));
}

// Query to fetch the list of users from your company's database
$sql = "SELECT FullName, EmailId FROM tblusers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $users = array();
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    echo json_encode($users);
} else {
    echo json_encode(array('message' => 'No users found.'));
}

// Close the database connection
$conn->close();
?>
