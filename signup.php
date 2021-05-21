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

<link media="all" type="text/css" rel="stylesheet" href="admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.css">

<link media="all" type="text/css" rel="stylesheet" href="css/step.css">

<!-- <link media="all" type="text/css" rel="stylesheet" href="admin/css/app.css"> -->

</head>

<body style="min-height: 100vh;">

<header id="header-wrap">
<?php
require_once 'config.php';
include  'public-navbar.php';
?>
</nav>

</header>

<div class="page-header" style="background: url(img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Join Us</h2>
<ol class="breadcrumb">
<li><a href="welcome.php">Home /</a></li>
<li class="current">Register</li>
</ol>
</div>
</div>
</div>
</div>
</div>


<section class="register section-padding">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-10 col-md-8 col-xs-12">
<?php 
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"verification=pending")==true){
        echo '<div class="register-form login-area" style="margin-bottom:300px; margin-top:80px ">
        <div class="success-msg" id="success-msg" ><i class="tick lni-checkmark-circle"></i></br>Verification Email has been sent to your inbox!</div>
        </div>';
    } else{
?>
<div class="register-form login-area">

<h3>
Register
</h3>
<div class="card card-step">
<div class="card-body card-step">
        <form id="signup-form" class="signup login-form" name="signup" action="signupFormSubmit.php" method="POST" enctype="multipart/form-data" >
          <div>
            <h3>Account</h3>
            <section class="tab">
              <h6>Account</h6>
                <div class="text-center" style="position: relative;" onClick="triggerClick()">
                    <span class="img-div">
                        <img src="img/author/avatar.jpg"  id="profileDisplay">
                    </span>
                    <span class="editicon"><i class="lni-pencil"></i> Edit</span> 
                    <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                    <!-- <label>Profile Image</label> -->
                    <br>
                </div>
              <div class="form-group mb-3">
                <div class="input-icon">
                <i class="lni-user"></i>
                <input type="text" id="username" class="input_cred" name="username" placeholder="Username" required  >
                </div>
                <span class="required error" id="username-info"></span>
            </div>
            <div class="form-group mb-3">
                <div class="input-icon">
                <i class="lni-comments"></i>
                <input type="text" id="user_email" class="input_cred" name="user_email" placeholder="*@usm.my or *@student.usm.my" onchange="valEmail()" required >
                </div>
                <span class="required error" id="user_email-info"></span>
            </div>
            <div class="form-group mb-3">
                <div class="input-icon">
                <i class="lni-phone"></i>
                <input type="text" id="phone" class="input_cred" name="phone" placeholder="Whats App Phone Number  (Eg: 0123456789)" required >
                </div>
                <span class="required error" id="phone-info"></span>
            </div>
            
           
            </section>
            <h3>Profile</h3>
            <section  class="tab">
              <h6>Profile</h6>
              <div class="form-group mb-3 tg-inputwithicon">
        <div class="tg-select form-control" id="school_div">
        <select class="form-ad valid" name="school" id="school" class="school" sel_id aria-required="true" aria-invalid="false" style="padding-left: 12px">
                <option value="none" selected>Select USM School or Position</option>
                 <?php 
                    $q3 = "SELECT * FROM SCHOOL ORDER BY SCHOOL_ID ASC";
                    $r3 = mysqli_query($conn,$q3);
                    
                    while($sch= mysqli_fetch_array($r3)){
                        if($sch['SCHOOL_VALUE'] == 'none'){
                            echo '<option title="item" value="'.$sch['SCHOOL_VALUE'].'"';
                            echo ' style="background-color:#dcdcc3;font-weight:bold;color:#000000;" disabled>
                            '.$sch['SCHOOL_NAME'].'</option>';

                        }else if($sch['SCHOOL_VALUE'] != ''){
                            echo '<option value="'.$sch['SCHOOL_VALUE'].'">';
                            echo $sch['SCHOOL_NAME'].'</option>';
                        }
                    }
                      ?>
            
            </select> 
        </div>
        <span class="required error" id="school-info"></span>
        </div>
        <div class="form-group mb-3 tg-inputwithicon">
        <div class="tg-select form-control" id="location_div">
        <select class="form-ad valid" name="loc" id="loc" class="loc" sel_id aria-required="true" aria-invalid="false" style="padding-left: 12px" onchange="showDiv(this)">
                <option value="none" selected>Select USM Hostel</option>
               
                 <?php 
                    $q2 = "SELECT * FROM LOCATION ORDER BY LOC_ID ASC";
                    $r2 = mysqli_query($conn,$q2);

                    while($loc= mysqli_fetch_array($r2)){
                        if($loc['LOC_VALUE'] == 'none'){
                            echo '<option title="item" value="'.$loc['LOC_VALUE'].'"';
                            echo ' style="background-color:#dcdcc3;font-weight:bold;color:#000000;" disabled>
                            '.$loc['LOC_NAME'].'</option>';

                        }else if($loc['LOC_VALUE'] != ''){
                            echo '<option value="'.$loc['LOC_VALUE'].'">';
                            echo $loc['LOC_NAME'].'</option>';
                        }
                    }
                     ?>
            
            </select> 
        </div>
        <span class="required error" id="loc-info"></span>
        </div>
        <div class="form-group mb-3 tg-inputwithicon item-area" id="other_loc_div" style="display:none">
            <input class="form-control input-md" name="other_loc" id="other_loc" placeholder="Other Address" type="text">
            <span class="required error" id="area-info"></span>
        </div>
            </section>
            <h3>Password</h3>
            <section  class="tab">
              <h6>Password</h6>
              <div class="form-group mb-3">
                    <div class="input-icon">
                    <i class="lni-lock"></i>
                    <input type="password" class="input_cred" id="user_pswd" name="user_pswd" placeholder="Password">
                    </div>
                    <span class="required error" id="signup_pswd-info"></span>
                </div>
                <div class="form-group mb-3">
                    <div class="input-icon">
                    <i class="lni-lock"></i>
                    <input type="password" class="input_cred" id="retype_pswd" name="retype_pswd" placeholder="Retype Password">
                    </div>
                    <span class="required error" id="retype_pswd-info"></span>
                </div>
            </section>
            <h3>Finish</h3>
            <section  class="tab">
              <h6>Finish</h6>
              <div class="form-group mb-3 mb-3">
                    <div class="checkbox">
                    <p>Privacy and Terms</p>
                    To create a Google Account, you’ll need to agree to the Terms of Service below.<br>
In addition, when you create an account, we process your information as described in our Privacy Policy, including these key points:<br>
Data we process when you use Google
<br>When you set up a Google Account, we store information you give us like your name, email address, and telephone number.
<br>When you use Google services to do things like write a message in Gmail or comment on a YouTube video, we store the information you create.
<br>When you search for a restaurant on Google Maps or watch a video on YouTube, for example, we process information about that activity – including information like the video you watched, device IDs, IP addresses, cookie data, and location.
<br>We also process the kinds of information described above when you use apps or sites that use Google services like ads, Analytics, and the YouTube video player.
<br>Why we process it
<br>We process this data for the purposes described in our policy, including to:
    <br>
    <br>Help our services deliver more useful, customized content such as more relevant search results;
    <br>Improve the quality of our services and develop new ones;
    <br>Deliver personalized ads, depending on your account settings, both on Google services and on sites and apps that partner with Google;
    <br>Improve security by protecting against fraud and abuse; and
    <br>Conduct analytics and measurement to understand how our services are used. We also have partners that measure how our services are used. Learn more about these specific advertising and measurement partners.
    <br>Combining data
    <br>We also combine this data among our services and across your devices for these purposes. For example, depending on your account settings, we show you ads based on information about your interests, which we can derive from your use of Search and YouTube, and we use data from trillions of search queries to build spell-correction models that we use across all of our services.
    <br>You’re in control
    <br>Depending on your account settings, some of this data may be associated with your Google Account and we treat this data as personal information. You can control how we collect and use this data now by clicking “More Options” below. You can always adjust your controls later or withdraw your consent for the future by visiting My Account (myaccount.google.com).

                    <br><br>
                    <input type="checkbox" id="accept" name="accept" value="accept">
                    <label>By registering an account, I have read and agreed with the <a href="">Terms of Use & Posting Rules</a> from Usmers'</label>
                    </div>
                </div>
            </section>
            <?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"error=emailExist")==true){
        echo "<div class='error-msg' id='error-msg'>Email Address exist!<br>Please proceed to Login / Forget Password</div>";
    } else if(strpos($fullUrl,"error=usernameExist")==true){
        echo "<div class='error-msg' id='error-msg'>Username exist!!</div>";
    } else if(strpos($fullUrl,"error=pendingVerification")==true){
        echo "<div class='error-msg' id='error-msg'>Verification email has been sent. Please proceed to verify account.</div>";
    }  
    ?>
            <div role="alert" class="error-msg" id="error-msg" style="display:none; "></div>
          </div>
        </form>
      </div>
</div>
<!-- form -->



</div>
<?php } ?>
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


<a href="#" class="back-to-top">
<i class="lni-chevron-up"></i>
</a>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>
<script>
function showDiv(select){
        if(select.value=='ou'||select.value=='op'||select.value=='o'){
            document.getElementById('other_loc_div').style.display = "block";
        } else{
            document.getElementById('other_loc_div').style.display = "none";
        }
    }

</script>

<script src="js/validate.js"></script>
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
<script src="js/avatar.js"></script>

<script src="admin/assets/plugins/jquery-steps/jquery.steps.min.js"></script>
<script src="admin/assets/js/wizard.js"></script>
<!-- <script src="admin/js/app.js"></script> -->
  <!-- <script src="admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script> -->
  <!-- <script src="admin/assets/plugins/jquery-validation/jquery.validate.min.js"></script> -->

</body>
</html>
