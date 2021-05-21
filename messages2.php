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

<link rel="stylesheet" type="text/css" href="css/messages.css">

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="fonts/line-icons.css">

<link rel="stylesheet" type="text/css" href="css/slicknav.css">

<link rel="stylesheet" type="text/css" href="css/nivo-lightbox.css">

<link rel="stylesheet" type="text/css" href="css/summernote.css">

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
<h2 class="product-title">Messages</h2>
<ol class="breadcrumb">
<li><a href="#">Home /</a></li>
<li class="current">Messages</li>
</ol>
</div>
</div>
</div>
</div>
</div>


<div id="content" class="section-padding">
<div class="container chat">
    <div class="frame" id="frame">
        <div class="page-sidebar" id="sidepanel">
            <div class="contacts" id="contacts">
                <ul>
                    <li id="userid" class="contact" data-touserid="userid" data-tousername="username">
                    <div class="wrap">
                    
                    <span id="status_userid" class="contact-status status"></span>
                    <img src="img/user/minglilee.jpg" width="40px" alt="" />
                    <div class="meta">
                    <p class="name">MingLi<span id="userid" class="unread">1</span></p>
                    <p class="preview"><span id="isTyping_userid" class="isTyping"></span></p>
                    </div>

                    </div>
                    </li>

                    <li id="userid" class="contact" data-touserid="userid" data-tousername="username">
                    <div class="wrap">
                    <span id="status_userid" class="contact-status status"></span>
                    <img src="img/user/minglilee.jpg" width="40px" alt="" />
                    <div class="meta">
                    <p class="name">MingLi<span id="userid" class="unread">4</span></p>
                    <p class="preview"><span id="isTyping_userid" class="isTyping"></span></p>
                    </div>
                    </div>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="content" id="content">
        <div class="contact-profile" id="userSection">	
						<img src="img/user/minglilee.jpg" alt="" />
							<p>username</p>
							<div class="social-media">
								<i class="fa fa-facebook" aria-hidden="true"></i>
								<i class="fa fa-twitter" aria-hidden="true"></i>
								 <i class="fa fa-instagram" aria-hidden="true"></i>
							</div>					
					</div>
					<div class="messages" id="conversation">		
					</div>
					<div class="message-input" id="replySection">				
						<div class="message-input" id="replyContainer">
							<div class="wrap">
                                <input class="form-control input-md " id="chatMessage" name="chatMessage" placeholder="Write your message..." type="text" />
                                <button class="submit chatButton" id="chatButton"><i class="lni-pointer icon-flip" aria-hidden="true"></i></button>	
                            </div>

						</div>					
					</div>
        </div>
    </div>

<input name="user_email" value=<?php echo $_SESSION["userEmail"];?> type="text" hidden>
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

<?php 
/*
    if (isset($_POST['uploadImage'])){
        $target = "img/product".basename($_FILES['image']['name']);
    }
    
    //file properties
    if(isset($_FILES['image'])){
        $file = $_FILES['image']['tmp_name'];
    }*/
?>
<script>
function postAdsVal() {

    console.log('RUN postAdsVal()');
	var valid = true;

	$("#title").removeClass("error-field");
	$("#category_group_div").removeClass("error-field");
	$("#price").removeClass("error-field");
	$("#description").removeClass("error-field");
	$("#location_div").removeClass("error-field");
	$("#other_loc_div").removeClass("error-field");

	var title = $("#title").val();
	var category_group = $("#category_group").val();
	var price = $('#price').val();
    var description = $('#description').val();
    var location = $('#location').val();
    var other_loc = $('#other_loc').val();

	$("#ads_title-info").html("").hide();
	$("#ads_cat-info").html("").hide();
    $("#ads_price-info").html("").hide();
    $("#ads_descp-info").html("").hide();
    $("#ads_loc-info").html("").hide();
    $("#ads_area-info").html("").hide();
	
    if (title.trim() == "") {
		$("#ads_title-info").html("Required").css("color", "#ee0000").show();
		$("#title").addClass("error-field");
		valid = false;
	}

	if (category_group == "none") {
		$("#ads_cat-info").html("Required").css("color", "#ee0000").show();
		$("#category_group_div").addClass("error-field");
		valid = false;
	}

    if (price.trim() == "") {
		$("#ads_price-info").html("Required").css("color", "#ee0000").show();
		$("#price").addClass("error-field");
		valid = false;
	}

	if (description.trim() == "") {
		$("#ads_descp-info").html("Required").css("color", "#ee0000").show();
		$("#description").addClass("error-field");
		valid = false;
	}

    if (location == "none") {
		$("#ads_loc-info").html("Required").css("color", "#ee0000").show();
		$("#location_div").addClass("error-field");
		valid = false;
	}

	if (other_loc.trim() == "") {
		$("#ads_area-info").html("Required").css("color", "#ee0000").show();
		$("#other_loc_div").addClass("error-field");
		
    }
	/*
    if(document.querySelector('#accept:checked') == null){
        $("#error-msg").html("You must agree to the terms first.").show();
        valid = false;
    }
	if(Password != ConfirmPassword){
        $("#error-msg").html("Both passwords must be same.").show();
        valid=false;
    }
*/
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
</script>

<script>
    document.getElementById("uploadImage").onchange = function () {
        if (typeof (FileReader) != "undefined") {
            var image_preview = $("#image_preview");
            image_preview.html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png|.bmp)$/;

            if ($(this)[0].files.length > 2) {
                alert("You can select only 2 images");
            } else {
                $($(this)[0].files).each(function () {
                var file = $(this);
                if (regex.test(file[0].name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = $("<img />");
                        img.attr("style", "height:100px;padding:5px");
                        img.attr("src", e.target.result);
                        image_preview.append(img);
                    } 
                    reader.readAsDataURL(file[0]);
                } else {
                    alert(file[0].name + " is not a valid image file.");
                    image_preview.html("");
                    return false;
                }
            });
            }

            
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    };

    function showDiv(select){
        if(select.value=='ou'||select.value=='op'||select.value=='o'){
            document.getElementById('other_loc').style.display = "block";
        } else{
            document.getElementById('other_loc').style.display = "none";
        }
    }
</script>

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
