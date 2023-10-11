<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html lang="en"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Zoom Car</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!--Custome Style -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!--OWL Carousel slider-->
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <!--slick-slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!--bootstrap-slider -->
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <!--FontAwesome Font Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">    <!-- SWITCHER -->
    <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }    </style>
</head><body>    
    
        <!--Header-->
    <?php include('includes/header.php');?>
    <!-- /Header -->    <!--Page Header-->
    <section class="page-header contactus_page">
        <div class="container">
            <div class="page-header_wrap">
                <div class="page-heading">
                    <h1>Contact Us</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->    <?php
echo '<style>
    /* General styling */
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        margin: 0px;
    }    /* Styling for the contact list */
    ul.contact-list {
        list-style-type: none;
        padding: 0;
        margin: 50px;
    }
    ul.contact-list li {
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        border-radius: 8px;  /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);  /* Shadow for a 3D effect */
        margin: 12px 0;
        padding: 16px;
        text-align: left;
        transition: background-color 0.3s ease;  /* Transition effect for hover */
    }
    ul.contact-list li:nth-child(even) {
        background-color: #f2f2f2;
    }
    ul.contact-list li:hover {
        background-color: #e6e6e6;  /* Hover effect */
    }
    .contact-info {
        display: block;
        margin-bottom: 8px;
        font-size: 16px;
    }
</style>';// Define the path to the contacts.txt file
$contacts_file_path = "assets/files/contacts.txt";// Check if the file exists
if (file_exists($contacts_file_path)) {
    // Read the file into an array, each line as an array element
    $contacts_array = file($contacts_file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);    // Loop through the array to read contacts
    echo '<ul class="contact-list">';
    foreach ($contacts_array as $contact) {
        // Split each line by comma to get the individual fields
        list($name, $email, $phone) = explode(", ", $contact);
        echo "<li>";
        echo "<span class='contact-info'>Name: $name</span>";
        echo "<span class='contact-info'>Email: $email</span>";
        echo "<span class='contact-info'>Phone: $phone</span>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "The contacts.txt file does not exist.";
}
?>
    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
    <!--/Back to top-->    <!--Login-Form -->
    <?php include('includes/login.php');?>
    <!--/Login-Form -->    <!--Register-Form -->
    <?php include('includes/registration.php');?>    <!--/Register-Form -->    <!--Forgot-password-Form -->
    <?php include('includes/forgotpassword.php');?>
    <!--/Forgot-password-Form -->    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/interface.js"></script>
    <!--Switcher-->
    <script src="assets/switcher/js/switcher.js"></script>
    <!--bootstrap-slider-JS-->
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <!--Slider-JS-->
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script></body><!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:55 GMT --></html>
