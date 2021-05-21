<?php
require 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Usmers'</title>

<link rel="shortcut icon" href="img/icon.png" >
<link rel="icon" href="img/icon.png" >

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="fonts/line-icons.css">

<link rel="stylesheet" type="text/css" href="css/slicknav.css">


<link rel="stylesheet" type="text/css" href="css/nivo-lightbox.css">

<link rel="stylesheet" type="text/css" href="css/animate.css">

<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">

<link rel="stylesheet" type="text/css" href="css/main.css">

<link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>
<body>

<header id="header-wrap">

<?php
include  'navbar.php';
?>
</header>


<div class="page-header" style="background: url(img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Privacy Setting</h2>
<ol class="breadcrumb">
<li><a href="#">Home /</a></li>
<li class="current">Privacy Setting</li>
</ol>
</div>
</div>
</div>
</div>
</div>

<?php
    require_once("config.php");
    $sesEmail=$_SESSION["userEmail"];

    $userSQL ="SELECT * FROM `USER` WHERE USER_EMAIL='$sesEmail'";
    $userResult=mysqli_query($conn,$userSQL);

        while($row = mysqli_fetch_assoc($userResult)){
        $username=$row['USER_NAME'];
        $useremail = $row['USER_EMAIL'];
        $user_status=$row['USER_STATUS'];
        $whatsapp = $row ['WHATSAPP'];

        $join = date("j M y g:i a",strtotime($row['CREATE_AT']));
        //$seller = $row ['USER_NAME'];
        
        if($whatsapp==null){
            $whatsapp="-";
        }
    }

?>

<div id="content" class="section-padding">
<div class="container">
<div class="row">
<div class="col-sm-12 col-md-4 col-lg-3 page-sidebar">
<aside>
<div class="sidebar-box">
<div class="user">

<div class="usercontent">
<?php 
    echo '<h3>'.$username.'</h3>
    <h4>'.$useremail.'</h4>';

?>
</div>
</div>
<nav class="navdashboard">
<ul>
<!-- <li>
<a href="dashboard.php">
<i class="lni-dashboard"></i>
<span>Dashboard</span>
</a>
</li> -->
<li>
<a href="messages.php">
<i class="lni-comments"></i>
<span>Messages</span>
</a>
</li>
<li>
<a href="account-myads.php">
<i class="lni-layers"></i>
<span>My Ads</span>
</a>
</li>
<li>
<a href="account-favourite-ads.php">
<i class="lni-heart"></i>
<span>My Favourites</span>
</a>
</li>
<li>
<a href="account-profile-setting.php">
<i class="lni-cog"></i>
<span>Profile Setting</span>
</a>
</li>
<!--
<li>
<a class="active" href="privacy-setting.php">
<i class="lni-star"></i>
<span>Privacy Settings</span>
</a>
 </li>-->
<li>
<a href="logout.php">
<i class="lni-exit"></i>
<span>Logout</span>
</a>
</li>
</ul>
</nav>
</div>
</aside>
</div>
<div class="col-sm-12 col-md-8 col-lg-9">
<div class="page-content">
<div class="inner-box">
<div class="dashboard-box">
<h2 class="dashbord-title">Privacy Settings</h2>
</div>
<div class="dashboard-wrapper">
<form class="row form-dashboard">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
<div class="privacy-box privacysetting">
<div class="dashboardboxtitle">
<h2>Settings</h2>
</div>
<div class="dashboardholder">
<ul>
<li>
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="privacysettingsone">
<label class="custom-control-label" for="privacysettingsone">Make my profile photo public</label>
</div>
</li>
<li>
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="privacysettingstwo">
<label class="custom-control-label" for="privacysettingstwo">I want to receive monthly newsletter</label>
</div>
</li>
<li>
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="privacysettingsthree">
<label class="custom-control-label" for="privacysettingsthree">I want to receive e-mail notifications of offers/messages</label>
</div>
</li>
<li>
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="privacysettingsfour">
<label class="custom-control-label" for="privacysettingsfour">I want to receive e-mail alerts about new listings</label>
</div>
</li>
<li>
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="privacysettingsfive">
<label class="custom-control-label" for="privacysettingsfive">Enable offers/messages option in all my ads Post</label>
</div>
</li>
</ul>
<button class="btn btn-common" type="submit">Update</button>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
<div class="privacy-box deleteaccount">
<div class="dashboardboxtitle">
<h2>Delete Account</h2>
</div>
<div class="dashboardholder">
<div class="form-group mb-3 tg-inputwithicon">
 <div class="tg-select form-control">
<select>
<option value="none">Select State</option>
<option value="none">Select State</option>
<option value="none">Select State</option>
</select>
</div>
</div>
<div class="form-group">
<textarea class="form-control" placeholder="Description"></textarea>
</div>
<button class="btn btn-common" type="button">Delete</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php
include  'footer.php';
?>


<a href="#" class="back-to-top">
<i class="lni-chevron-up"></i>
</a>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>


<script src="js/jquery-min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/wow.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/nivo-lightbox.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/main.js"></script>
<script src="js/form-validator.min.js"></script>
<script src="js/contact-form-script.min.js"></script>
<script src="js/summernote.js"></script>
</body>
</html>