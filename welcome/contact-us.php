<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Usmers'</title>

<link rel="shortcut icon" href="../img/icon.png" >
<link rel="icon" href="../img/icon.png" >

<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="../css/main.css">

<link rel="stylesheet" type="text/css" href="../fonts/line-icons.css">

<link rel="stylesheet" type="text/css" href="../css/slicknav.css">

<link rel="stylesheet" type="text/css" href="../css/nivo-lightbox.css">

<link rel="stylesheet" type="text/css" href="../css/animate.css">

<link rel="stylesheet" type="text/css" href="../css/owl.carousel.css">

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
<a class="dropdown-item " href="about.php"><i class="lni-home"></i> About</a>
<a class="dropdown-item " href="#"><i class="lni-phone"></i> Contact Us</a>

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
<h2 class="product-title">Contact Us</h2>
<ol class="breadcrumb">
<li><a href="../welcome.php">Home /</a></li>
<li class="current">Contact Us</li>
</ol>
</div>
</div>
</div>
</div>
</div>


<section id="content" class="fullpage section-padding" style="padding-bottom:200px;">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-5">
<img class="img-fluid" src="../img/about/intro.png" alt="">

</div>

<div class="git col-xs-12 col-sm-12 col-md-4">
<h2 class="contact-title">
Get In Touch
</h2>
<div class="information">
<p>USMers' is a marketplace which provided speacially for USM community.</p>
<div class="contact-datails">
<div class="icon">
<i class="lni-map-marker icon-radius"></i>
</div>
<div class="info">
<h3>Address</h3>
<span class="detail">School of Computer Sciences<br> Universiti Sains Malaysia<br>11800 USM, Penang, Malaysia</span>
</div>
</div>
<div class="contact-datails">
<div class="icon">
<i class="lni-pointer icon-radius"></i>
</div>
<div class="info">
<h3>Email</h3>
<span class="detail"><a href="#" class="__cf_email__" data-cfemail="b9eaccc9c9d6cbcdf9d4d8d0d597dad6d4">usmers@gmail.com</a></span>
</div>
</div>

<div class="contact-datails">
<div class="icon">
<i class="lni-phone icon-radius"></i>
</div>
<div class="info">
<h3>Telephone</h3>
<span class="detail">(+60) 4653 4646</span>
</div>
</div>
</div>

</div>
</div>
</div>
</section>


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


<a href="#" class="back-to-top">
<i class="lni-chevron-up"></i>
</a>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>

<script>
function supportVal() {

    console.log('RUN supportVal()');
	var valid = true;

    var name = $("#name").val();
    var email = $("#email").val();
    var supportSubject = $("#supportSubject").val();
    var support_descp = $("#support_descp").val();

    if(name.trim()==""){
        $("#name-info").html("Required").css("color", "#ee0000").show();
		$("#name").addClass("error-field");
		valid = false;
    }else{
        $("#name-info").html("").hide();
        $("#name").removeClass("error-field");
    }
    if(email.trim()==""){
        $("#email-info").html("Required").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
    }else{
        $("#email-info").html("").hide();
        $("#email").removeClass("error-field");
    }

    if(supportSubject.trim()==""){
        $("#support-info").html("Required").css("color", "#ee0000").show();
		$("#supportSubject").addClass("error-field");
		valid = false;
    }else{
        $("#support-info").html("").hide();
        $("#supportSubject").removeClass("error-field");
    }

    if(support_descp.trim()==""){
        $("#support_descp-info").html("Required").css("color", "#ee0000").show();
		$("#support_descp").addClass("error-field");
		valid = false;
    }else{
        $("#support_descp-info").html("").hide();
        $("#support_descp").removeClass("error-field");
    }

    if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
    console.log("subject, "+"valid: "+valid);
	return valid;
}
</script>

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