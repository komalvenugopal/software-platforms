<?php
// Your local database connection
$db_host = "m7az7525jg6ygibs.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$db_user = "fgh9sc82wezg1d1y";
$db_pass = "rsb5bdcbut01gt64";
$db_name = "xtm5hual7b3uhuky";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die('Local Database Connection Failed: ' . $conn->connect_error);
}

// Function to retrieve data from a remote company's database using cURL
function fetchRemoteCompanyData($company_url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $company_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

// Fetch data from your local database
$local_users = array();
$local_query = "SELECT FullName, EmailId FROM tblusers";
$local_result = $conn->query($local_query);

if ($local_result->num_rows > 0) {
    while ($row = $local_result->fetch_assoc()) {
        $local_users[] = $row;
    }
}

// Fetch data from remote companies' databases via cURL
$company_data = array();

// Example URLs for remote companies
$company_urls = array(
    'https://cmpe272.komalvenugopal.tech/ZoomCar/api/list_of_user.php',
);

foreach ($company_urls as $url) {
    $remote_data = fetchRemoteCompanyData($url);
    $company_data[] = json_decode($remote_data, true);
}

// Combine and display the data
$all_users = array_merge($local_users, ...$company_data);

// Display the list of users as an HTML unordered list
echo '<ul>';
foreach ($all_users as $user) {
    echo '<li>' . $user['FullName'] . ' - ' . $user['EmailId'] . '</li>';
}
echo '</ul>';

// Close your local database connection
$conn->close();
?>
