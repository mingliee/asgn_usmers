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

<div  style="height:100%"> 
<div class="page-header" style="background: url(img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Login</h2>
<ol class="breadcrumb">
<li><a href="welcome.php">Home /</a></li>
<li class="current">Login</li>
</ol>
</div>
</div>
</div>
</div>
</div>


<section class="login section-padding">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-5 col-md-8 col-xs-12">
<div class="login-form login-area">
<h3>
Login Now
</h3>
<form role="form" class="login-form" name="login" action="loginSubmit.php" method="POST"  onsubmit="return loginValidation();">
    <?php if(!empty($loginResult)){?>
		<div class="error-msg"><?php echo $loginResult;?></div>
	<?php }?>

    <div class="form-group">
        <div class="input-icon">
        <i class="lni-user"></i>
        <input type="text" id="user_email" class="input_cred" name="user_email" placeholder="*@usm.my or *@student.usm.my" onchange="valEmail();" >
        </div>
        <span class="required error" id="user_email-info"></span>

    </div>
    <div class="form-group">
        <div class="input-icon">
        <i class="lni-lock"></i>
        <input type="password" class="input_cred" id="user_pswd" name="user_pswd" placeholder="Password" >
        </div>
        <span class="required error" id="user_pswd-info"></span>

    </div>
    <div class="form-group login-box">
        <div class="checkbox">
        <!--<input type="checkbox" id="rememberme" name="rememberme" value="rememberme">
        <label>Keep me logged in</label>-->
        </div>
        <a class="forgetpassword" href="forget-password.php">Forgot Password?</a>
    </div>
    <!-- <div class="error-msg" id="error-msg"></div> -->

    <?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"error=pendingVerification")==true){
        echo "<div class='error-msg' id='error-msg'>Verify Account Through Your USM Email!</div>";
    } else if(strpos($fullUrl,"error=incorrectCredentials")==true){
        echo "<div class='error-msg' id='error-msg'>Incorrect USM email or password!</div>";
    } else if(strpos($fullUrl,"m=sessionExpired")==true){
        echo "<div class='error-msg' id='error-msg'>Your session has expired! Please login again.</div>";
    } else if(strpos($fullUrl,"m=prohibitedAccess")==true){
        echo "<div class='error-msg' id='error-msg'>HELLO. CANNOT.</div>";
    }     
    
    ?>
    <div class="text-center">
        <input class="btn btn-common " type="submit" name="login_btn" id="login_btn" value="Login">
    </div>
</form>

</div>
</div>
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
</div>

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

-->
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