<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="userList">
        <!-- User data will be displayed here -->
    </div>

    <script>
        $(document).ready(function() {
            // Define the API endpoint URL
            var apiUrl = 'api/list_of_user.php';

            // Make an AJAX GET request to the API
            $.ajax({
                url: apiUrl,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Check if the API response contains user data
                    if (data && data.length > 0) {
                        var userListHtml = '<h2>List of Users</h2><ul>';
                        // Iterate through the user data and create list items
                        $.each(data, function(index, user) {
                            userListHtml += '<li>' + user.FullName + '</li>';
                        });
                        userListHtml += '</ul>';

                        // Update the HTML content with the user list
                        $('#userList').html(userListHtml);
                    } else {
                        // Display a message if no users were found
                        $('#userList').html('<p>No users found.</p>');
                    }
                },
                error: function() {
                    // Handle errors if the API request fails
                    $('#userList').html('<p>Error loading user data.</p>');
                }
            });
        });
    </script>
</body>
</html>
