<?php
// Your local database connection
$local_db = new mysqli('localhost', 'username', 'password', 'local_database');

if ($local_db->connect_error) {
    die('Local Database Connection Failed: ' . $local_db->connect_error);
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
$local_query = "SELECT * FROM users";
$local_result = $local_db->query($local_query);

if ($local_result->num_rows > 0) {
    while ($row = $local_result->fetch_assoc()) {
        $local_users[] = $row;
    }
}

// Fetch data from remote companies' databases via cURL
$company_data = array();

// Example URLs for remote companies
$company_urls = array(
    'http://company1.com/api/users',
);

foreach ($company_urls as $url) {
    $remote_data = fetchRemoteCompanyData($url);
    $company_data[] = json_decode($remote_data, true);
}

// Combine and display the data
$all_users = array_merge($local_users, ...$company_data);

// Display the list of users
echo '<pre>';
print_r($all_users);
echo '</pre>';

// Close your local database connection
$local_db->close();
?>
