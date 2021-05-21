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

<link rel="stylesheet" type="text/css" href="css/login.css">


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

<?php
    include 'footer.php';
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