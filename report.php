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

<link rel="stylesheet" type="text/css" href="css/login.css">

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
<h2 class="product-title">Report</h2>
<ol class="breadcrumb">
<li><a href="#">Home /</a></li>
<li class="current">Report</li>
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
    if(strpos($fullUrl,"report=success")==true){
        echo "<div style='margin-top:50px;'>
        <div id='msgSubmit' class='h3 text-center msgSubmit success-msg'>
        <i class='tick lni-checkmark-circle'></i><br/>
        Report Form Successfully Submitted!<br/>
        <p class='text-center' style='padding-top:10px'> We will get back to you within 3 working days.</p>
        </div></div>
        ";
    }  else{
    
?>


    <?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"report=fail")==true){
        echo "<div class='error-msg' id='error-msg'>Report Form Fail To Submit. Please Try Again Later. </div>";
    }
    
?>    
<h2 class="contact-title">
Report Form
</h2>
<?php 

    if(isset($_GET['adsID'])){
        $adsID=$_GET['adsID'];

        if (strpos($adsID, 'AI') !== false) {
            $q1="SELECT ADS_TITLE FROM ADS_ITEM WHERE ADS_id='$adsID'";
        } else if (strpos($adsID, 'AA') !== false) {
            $q1="SELECT ADS_TITLE FROM ADS_ACCOM WHERE ADS_id='$adsID'";
        } else if (strpos($adsID, 'AJ') !== false) {
            $q1="SELECT ADS_TITLE FROM ADS_JOB WHERE ADS_id='$adsID'";
        }

        
        $r1=mysqli_query($conn,$q1);
        $row=mysqli_fetch_assoc($r1);
        $adsTitle=$row['ADS_TITLE'];

    } else if(isset($_GET['userID'])){
        $sellerID=$_GET['userID'];
    }


?>
<form id="reportForm" class="reportForm" action="reportSubmit.php" method="POST" onsubmit="return reportVal()">
<div class="row">
    <?php
    if(isset($_GET['adsID'])){
        ?>
    <div style="margin-left:15px">
        <h6 style="text-transform: capitalize;"><b>Ad's Title: </b><?php echo $adsTitle ?></h6>
    </div>
    <?php } 
    ?>
    <div class="col-md-12">
    <div class="form-group mb-3 tg-inputwithicon">
        <div class="tg-select form-control report_group_div" id="report_group_div">
            <select class="form-ad valid" id="reason_group" name="reason_group" sel_id aria-required="true" aria-invalid="false" style="padding-left: 12px">
                <option value="none" selected disabled>Select Reason</option>
                <?php 
                    $q2 = "SELECT * FROM REPORT_REASON ORDER BY REASON_ID ASC";
                    $r2 = mysqli_query($conn,$q2);
                   
                    while($row2= mysqli_fetch_array($r2)){
                            echo '<option value="'.$row2['REASON_VALUE'].'" >';
                            echo $row2['REASON_DESCP'].' </option>';

                    }
                    //$loca=$row['ADS_LOC'];
                    //echo"<script>alert('loca: '+$loc['LOC_VALUE'])</script>";
                    

                ?>
<!--                 <option value="prohibited">Prohibited (bannded) items </option> 
                <option value="listing">Listing policy violations (improper keywords, outside links, etc.)</option> 
                <option value="offensive">Offensive and potentially offensive items</option> 
                <option value="fraud">Fraudulent listings (illegal seller demands etc.)</option> 
                <option value="stolen">Stolen property</option> 
                <option value="o">Others</option>  -->
            </select>
        </div>
        <span class="required error" id="report-info"></span>
    </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <textarea class="input_cred" id="report_descp" name="report_descp" placeholder="Description..." rows="10" data-error="Write your message"></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
    </div>
<div class="col-md-12" style="display: flex; justify-content: flex-end; ">
    <input name="user_id" value=<?php echo $_SESSION["userID"];?> type="text" hidden>
    <?php
        if(isset($_GET['adsID'])){
    ?>
        <input name="adsID" value=<?php echo $adsID; ?> type="text" hidden>
    <?php } ?>
    
    <input class="btn btn-common" type="submit" name="report_btn" id="report_btn" value="Report">
<!-- <button type="submit" id="submit" class="btn btn-common">Report</button> -->

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
function reportVal() {

    console.log('RUN reportVal()');
	var valid = true;

    $("#report_group_div").removeClass("error-field");
    var reason_group = $("#reason_group").val();
    $("#report-info").html("").hide();

    if (reason_group == "none") {
		$("#report-info").html("Required").css("color", "#ee0000").show();
		$("#report_group_div").addClass("error-field");
		valid = false;
	}

    if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}

</script>

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
<!-- <script src="js/contact-form-script.min.js"></script> -->
<script src="js/summernote.js"></script>
</body>
</html>