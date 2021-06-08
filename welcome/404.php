<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Usmers'</title>

<link rel="shortcut icon" href="../img/icon.png" >
<link rel="icon" href="../img/icon.png" >

<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="../fonts/line-icons.css">

<link rel="stylesheet" type="text/css" href="../css/slicknav.css">

<link rel="stylesheet" type="text/css" href="../css/nivo-lightbox.css">

<link rel="stylesheet" type="text/css" href="../css/animate.css">

<link rel="stylesheet" type="text/css" href="../css/owl.carousel.css">

<link rel="stylesheet" type="text/css" href="../css/main.css">

<link rel="stylesheet" type="text/css" href="../css/responsive.css"> 

<link rel="stylesheet" type="text/css" href="../css/login.css">


</head>
<body>

<header id="header-wrap">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
<div class="container">

<div class="navbar-header">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
<span class="lni-menu"></span>
<span class="lni-menu"></span>
<span class="lni-menu"></span>
</button>
<a href="../welcome.php" class="navbar-brand"><img src="../img/logo.png" id="usmers-logo" class="usmers-logo" alt="usmers-logo"></a>
</div>

<div class="collapse navbar-collapse" id="main-navbar">
<ul class="navbar-nav mr-auto">
<li class="nav-item">
<a class="nav-link" href="about.php">
About Us
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="contact-us.php">
Contact Us
</a>
</li>
</ul>
</div>

<div  class="myAcc">
<ul class="sign-in">
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="lni-user"></i> My Account</a>
<div class="dropdown-menu">
<a class="dropdown-item " href="../login.php"><i class="lni-lock"></i> Log In</a>
<a class="dropdown-item" href="../signup.php"><i class="lni-user"></i> Signup</a>
<a class="dropdown-item " href="#"><i class="lni-home"></i> About</a>
<a class="dropdown-item " href="contact-us.php"><i class="lni-phone"></i> Contact Us</a>

</div>
</li>
</ul>
</div>

</div>
</div>
</nav>

<script>
$(function () { 
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) { 
            $('.navbar-header .navbar-brand img').attr('src','../img/logo-p.png');
        }
        if ($(this).scrollTop() < 100) { 
            $('.navbar-header .navbar-brand img').attr('src','../img/logo.png');
        }
    })
});

</script>
</header>


<div class="page-header" style="background: url(../img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">404</h2>
<ol class="breadcrumb">
<li><a href="#">Home /</a></li>
<li class="current">404</li>
</ol>
</div>
</div>
</div>
</div>
</div>

<div class="error section-padding fullpage">
<div class="container">
<div class="row justify-content-center">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
<div class="error-content">
<div class="error-message">
<h2>404</h2>
<?php 
if(isset($_GET['e'])){
    $reason=$_GET['e'];
    if($reason==="removed"){
        echo '<h5><span>Ooooops!</span> Ad has been removed by seller/admin!</h5>';
    }else if($reason==="revoked"){
        echo '<h5><span>Ooooops!</span> Your access to post new ads has been revoked!<br>
        <a href="support.php">Contact us</a> for more info.</h5>';
    }

}else{
echo '<h5><span>Ooooops!</span> Something Went Wrong...</h5>';
}

?>
</div>
<!-- <form class="form-error-search">
<input type="search" name="search" class="form-control" placeholder="Search Here">
<button class="btn btn-common btn-search" type="button">Search Now</button>
</form>
<div class="description">
<span>Or Goto <a href="#">Homepage</a></span>
</div> -->
</div>
</div>
</div>
</div>
</div>

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


<script src="../js/jquery-min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.counterup.min.js"></script>
<script src="../js/waypoints.min.js"></script>
<script src="../js/wow.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/nivo-lightbox.js"></script>
<script src="../js/jquery.slicknav.js"></script>
<script src="../js/main.js"></script>
<script src="../js/form-validator.min.js"></script>
<script src="../js/contact-form-script.min.js"></script>
<script src="../js/summernote.js"></script>
</body>
</html>