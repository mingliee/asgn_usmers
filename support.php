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

<link rel="stylesheet" type="text/css" href="css/login.css">

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
require_once 'config.php';
include  'navbar.php';
?>
</header>


<div class="page-header" style="background: url(img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Support</h2>
<ol class="breadcrumb">
<li><a href="#">Home /</a></li>
<li class="current">Support</li>
</ol>
</div>
</div>
</div>
</div>
</div>

<section id="content" class="fullpage section-padding" style="padding-bottom:200px;">
<div class="container">
<div class="row profileinfo">
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">

<?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"support=success")==true){
        echo "<div style='margin-top:50px;'>
        <div id='msgSubmit' class='h3 text-center msgSubmit success-msg'>
        <i class='tick lni-checkmark-circle'></i><br/>
        Support From Successfully Sent!<br/>
        <p class='text-center' style='padding-top:10px'> We will get back to you within 3 working days.</p>
        </div></div>
        ";
    }  else{
    
?>


    <?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"support=fail")==true){
        echo "<div class='error-msg' id='error-msg'>Support Form Fail To Submit. Please Try Again Later. </div>";
    }
    
?>    
<h2 class="contact-title">
Send Message To Us
</h2>

<form id="supportForm" class="supportForm" action="reportSubmit.php" method="POST" onsubmit="return supportVal()">
<div class="row">
    <div class="col-md-12">
    <div class="form-group mb-3">
        <input class="form-control input-md" id="supportSubject" name="supportSubject" placeholder="Subject..." type="text">
        <span class="required error" id="support-info"></span>
    </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <textarea class="input_cred" id="support_descp" name="support_descp" placeholder="Description..." rows="10" data-error="Write your message"></textarea>
                    <span class="required error" id="support_descp-info"></span>
                </div>
            </div>
        </div>
    </div>
<div class="col-md-12" style="display: flex; justify-content: flex-end; ">
    <input name="user_id" value=<?php echo $_SESSION["userID"];?> type="text" hidden>   
    <input class="btn btn-common" type="submit" name="support_btn" id="support_btn" value="Post">
<div class="clearfix"></div>
</div>
</div>
</form>
<?php
    }
?>
</div>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
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


<?php 
include 'footer.php';
?>


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

    var supportSubject = $("#supportSubject").val();
    var support_descp = $("#support_descp").val();
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

<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-min.js"></script>

<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/wow.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/nivo-lightbox.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/main.js"></script>
<!-- <script src="js/form-validator.min.js"></script>
<script src="js/contact-form-script.min.js"></script> -->
<script src="js/summernote.js"></script>
</body>
</html>