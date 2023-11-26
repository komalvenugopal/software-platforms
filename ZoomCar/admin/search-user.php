<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('includes/config.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
    exit;
} else {
    $searchResults = [];
    $searched = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
        $searched = true;
        $conditions = [];
        $params = [];

        // Check if the fields are not empty and add to the search conditions
        if (!empty($_POST['fs_name'])) {
            $conditions[] = "FirstName LIKE :fs_name";
            $params[':fs_name'] = "%" . $_POST['fs_name'] . "%";
        }
        if (!empty($_POST['ls_name'])) {
            $conditions[] = "LastName LIKE :ls_name";
            $params[':ls_name'] = "%" . $_POST['ls_name'] . "%";
        }
        if (!empty($_POST['email'])) {
            $conditions[] = "EmailId LIKE :email";
            $params[':email'] = "%" . $_POST['email'] . "%";
        }
        if (!empty($_POST['mobile'])) {
            $conditions[] = "ContactNo LIKE :mobile";
            $params[':mobile'] = "%" . $_POST['mobile'] . "%";
        }
        if (!empty($_POST['home_mobile'])) {
            $conditions[] = "HomePhoneNo LIKE :home_mobile";
            $params[':home_mobile'] = "%" . $_POST['home_mobile'] . "%";
        }

        // Build the SQL query dynamically
        $sql = "SELECT * FROM tblusers";
        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(' OR ', $conditions);
        }

        $query = $dbh->prepare($sql);

        // Bind parameters
        foreach ($params as $key => &$val) {
            $query->bindParam($key, $val, PDO::PARAM_STR);
        }

        // Execute the query
        $query->execute();
        $searchResults = $query->fetchAll(PDO::FETCH_OBJ);
    }
}
?>

<?php if ($searched): ?>
    <?php if (!empty($searchResults)): ?>
        <!-- Display search results -->
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>Home Phone No</th>
            </tr>
            <?php foreach ($searchResults as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user->FirstName); ?></td>
                <td><?php echo htmlspecialchars($user->LastName); ?></td>
                <td><?php echo htmlspecialchars($user->EmailId); ?></td>
                <td><?php echo htmlspecialchars($user->ContactNo); ?></td>
                <td><?php echo htmlspecialchars($user->HomePhoneNo); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No users found with the given criteria.</p>
    <?php endif; ?>
<?php endif; ?>



<!doctype html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Zoom Car | Admin Post Vehicle</title>	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
        <?php include('includes/leftbar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Search User</h2>
                        <!-- Display messages -->
                        <?php if(isset($msg)){ echo $msg; } ?>
                        <?php if(isset($error)){ echo $error; } ?>

                        <!-- Registration Form Starts -->
                            <!-- Search Form Starts Here -->
                            <form method="post" class="form-horizontal">
                                <!-- First Name Field -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">First Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="fs_name" class="form-control" placeholder="Enter first name">
                                    </div>
                                </div>
                                <!-- Last Name Field -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="ls_name" class="form-control" placeholder="Enter last name">
                                    </div>
                                </div>
                                <!-- Email Field -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                                    </div>
                                </div>
                                <!-- Other fields as needed... -->
                                <div class="col-sm-8 col-sm-offset-2">
                                    <input class="btn btn-primary" type="submit" name="search" value="Search">
                                </div>
                            </form>
                            <!-- Search Form Ends Here -->

                        <?php if($searched): ?>
                            <?php if(!empty($searchResults)): ?>
                                <!-- Display search results -->
                                
                                <table>
                                    <!-- Your code to display results in a table -->
                                </table>
                            <?php else: ?>
                                <p>No users found with the given criteria.</p>
                            <?php endif; ?>
                        <?php endif; ?>

                        <!-- Registration Form Ends -->
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
