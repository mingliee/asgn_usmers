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
<!--
-->
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox.css">

<link rel="stylesheet" type="text/css" href="css/animate.css">

<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">

<link rel="stylesheet" type="text/css" href="css/main.css">

<link rel="stylesheet" type="text/css" href="css/responsive.css">

<link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>

<header id="header-wrap">

<?php
include  'public-navbar.php';
?>

</header>


<div class="page-header" style="background: url(img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Forgot Password</h2>
<ol class="breadcrumb">
<li><a href="welcome.php">Home /</a></li>
<li class="current">Forgot Password</li>
</ol>
</div>
</div>
</div>
</div>
</div>


<section class="forgetPswd section-padding">
<div class="container">
<div class="row justify-content-center">
<?php 
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"verification=pending")==true){
        echo '<div class="register-form login-area" style="margin-bottom:300px; margin-top:80px ">
        <div class="success-msg" id="success-msg" ><i class="tick lni-checkmark-circle"></i></br>We have sent a reset password link to your email. Please check your email to continue.</div>
        </div>';
    } else{
?>
<div class="col-lg-5 col-md-12 col-xs-12">
<div class="forgot login-area">
<h3>
Forgot Password
</h3>
<form role="form" class="login-form" name="chgPswd-form" id="chgPswd-form" action="updateSubmit.php" method="POST"  onsubmit="return forgetPswdVal();" >
    <div class="form-group">
        <div class="input-icon">
        <i class="icon lni-user"></i>
        <input type="email" id="user_email" class="input_cred" name="user_email" placeholder="*@usm.my or *@student.usm.my" >
        </div>
        <span class="required error" id="user_email-info"></span>
    </div>
    <div class="text-center">
        <input class="btn btn-common " type="submit" name="sendEmailChgPswd_btn" id="sendEmailChgPswd_btn" value="Send Reset Password Email">
    </div>
    <div class="form-group mt-4">
        <ul class="form-links">
            <li class="float-left"><a href="signup.php">Don't have an account?</a></li>
            <li class="float-right"><a href="login.php">Back to Login</a></li>
        </ul>
    </div>
    <div role="alert" class="error-msg" id="error-msg" style="display:none; "></div>

</form>
</div>
</div>
<?php } ?>

</div>
</div>
</section>
<footer>
<div id="copyright">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="site-info float-left">
<p> &copy; USMers' 2020/2021</p>
</div>
<div class="float-right">
<div class="widget">
<ul class="menu">
<li>usmers@gmail.com</li>
<!-- <li><a href="faq.php">FAQ</a></li>
<li><a href="rules.php">Listing Rules</a></li>
<li><a href="support.php">Contact us</a></li> -->
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</footer>


<a href="#" class="back-to-top">
<i class="lni-chevron-up"></i>
</a>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>

<script src="js/validate.js"></script>
<script src="js/jquery-min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--

--><script src="js/jquery.counterup.min.js"></script>
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