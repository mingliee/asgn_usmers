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
<a href="welcome.php" class="navbar-brand"><img src="img/logo.png" id="usmers-logo" class="usmers-logo" alt="usmers-logo"></a>
</div>

<div class="collapse navbar-collapse" id="main-navbar">
<ul class="navbar-nav mr-auto">
<li class="nav-item">
<a class="nav-link" href="welcome/about.php">
About Us
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="welcome/contact-us.php">
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
<a class="dropdown-item " href="login.php"><i class="lni-lock"></i> Log In</a>
<a class="dropdown-item" href="signup.php"><i class="lni-user"></i> Signup</a>
<a class="dropdown-item " href="welcome/about.php"><i class="lni-home"></i> About</a>
<a class="dropdown-item " href="welcome/contact-us.php"><i class="lni-phone"></i> Contact Us</a>

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
            $('.navbar-header .navbar-brand img').attr('src','img/logo-p.png');
        }
        if ($(this).scrollTop() < 100) { 
            $('.navbar-header .navbar-brand img').attr('src','img/logo.png');
        }
    })
});

</script>
</header>

<div  style="height:100%"> 
<div class="page-header" style="background: url(img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Reset Password</h2>
<ol class="breadcrumb">
<li><a href="welcome.php">Home /</a></li>
<li class="current">Reset Password</li>
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
Reset Password
</h3>
<?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"token")==true){
        require 'config.php';
        $token=$_GET['token'];
        $sql = "SELECT * FROM password_reset_temp WHERE token='$token' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

                $_SESSION['userEmail']=$user['USER_EMAIL'];
                $expDate =$user['EXP_DATE'];

                $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d"), date("Y"));
                $currentTime = date("Y-m-d H:i:s",$expFormat);

                //echo "<br>expDate:".$expDate." currentTime: ".$currentTime;

                if($currentTime<$expDate){
                    //echo '<br>havent expired';

                    ?>

                    <form role="form" class="login-form" name="update" action="updateSubmit.php" method="POST"  onsubmit="return updatePswdVal();">
                        <div class="form-group">
                            <div class="input-icon">
                            <i class="lni-lock"></i>
                            <input type="password" class="input_cred" id="new_pswd" name="new_pswd" placeholder="New Password" >
                            </div>
                            <span class="required error" id="new_pswd-info"></span>

                        </div>
                        <div class="form-group">
                            <div class="input-icon">
                            <i class="lni-lock"></i>
                            <input type="password" class="input_cred" id="retype_pswd" name="retype_pswd" placeholder="Retype New Password" >
                            </div>
                            <span class="required error" id="retype_pswd-info"></span>

                        </div>
                        <!-- <div class="error-msg" id="error-msg"></div> -->

                        <?php
                        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                            if(strpos($fullUrl,"error=samePswd")==true){
                                echo "<div class='error-msg' id='error-msg'>New password cannot same as old password</div>";
                            }
                        ?>

                        <div class="text-center">
                            <input class="btn btn-common " type="submit" name="updatePswdByEmail_btn" id="updatePswdByEmail_btn" value="Update Password">
                            <input type="hidden" name="email" value="<?php echo $user['USER_EMAIL'];?>"/>
                            <input type="hidden" name="token" value="<?php echo $token;?>"/>

                        </div>
                       
                    </form>
                    <?php
                }else{
                    //echo '<br>expired';
                    ?>
                        <div class="link-expired text-center" style="padding: 50px 10px;">
                        <p>Reset password link has expired. Click <a href='forget-password.php'>HERE</a> to resend the link.</p> 
                        </div>
                    <?php
                    

                }

        } else {
            echo "User not found!";
            echo $sql;
            header('location: http://localhost/usmers/welcome/404.php');
            exit(0);
        }
    }else{
        echo 'invalid url';
    }
?>

</div>
</div>
</div>
</div>
</section>

<footer style="bottom:0px;position:absolute;width:100%">
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

<script src="js/validate-pswd.js"></script>
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