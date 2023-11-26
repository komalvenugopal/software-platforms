<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if(isset($_POST['register'])) {
        $fs_name = $_POST['fs_name'];
        $ls_name = $_POST['ls_name'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $home_mobile = $_POST['home_mobile'];
        $mobile = $_POST['mobile'];

        // Password hashing for security
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // SQL Query
        echo "hello";
        $sql = "INSERT INTO  tblusers(FirstName, LastName, FullName, EmailId, ContactNo, HomePhoneNo, Password) VALUES(:fs_name,:ls_name,:fname,:email,:mobile,:home_mobile,:password)";

        $query = $dbh->prepare($sql);
        
        // Bind parameters
        $query->bindParam(':fs_name', $fs_name, PDO::PARAM_STR);
        $query->bindParam(':ls_name', $ls_name, PDO::PARAM_STR);
        $query->bindParam(':fname', $fname, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':home_mobile', $home_mobile, PDO::PARAM_STR);
        $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
        
        // Execute the query
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        echo "hello2";

        if($lastInsertId) {
            $msg = "User registered successfully";
        } else {
            $error = "Something went wrong. Please try again";
        }
    }
?>

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
                        <h2 class="page-title">Register User</h2>
                        <!-- Display messages -->
                        <?php if(isset($msg)){ echo $msg; } ?>
                        <?php if(isset($error)){ echo $error; } ?>

                        <!-- Registration Form Starts -->
                        <form method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fs_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ls_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Full Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fname" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Home Mobile</label>
                                <div class="col-sm-10">
                                    <input type="text" name="home_mobile" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Mobile</label>
                                <div class="col-sm-10">
                                    <input type="text" name="mobile" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-8 col-sm-offset-2">
                                <input class="btn btn-primary" type="submit" name="register" value="Register">
                            </div>
                        </form>
                        <!-- Registration Form Ends -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
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
<?php } // End else ?>
