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
<!--
-->
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
<h2 class="product-title">Post New Ads</h2>
<ol class="breadcrumb">
<li><a href="#">Home /</a></li>
<li class="current">Post New Ads</li>
</ol>
</div>
</div>
</div>
</div>
</div>


<div id="content" class="section-padding">
<div class="container">

<form role="form" class="postAds-form" name="postAds" action="postSubmit.php" method="POST" onsubmit="return postAdsVal()" enctype = "multipart/form-data" >
<div class="row">

<div class="col-sm-12 col-md-8 col-lg-7">
<div class="row page-content">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<div class="inner-box">
<div class="dashboard-box">
<h2 class="dashbord-title">Ad's Detail</h2>
</div>
<div class="dashboard-wrapper">

    <div class="form-group mb-3 tg-inputwithicon">
        <label class="control-label">Categories*</label>
        <div class="tg-select form-control category_group_div" id="category_group_div">
            <select class="form-ad valid" id="category_group" name="category_group" onchange="filter_category()" sel_id aria-required="true" aria-invalid="false" style="padding-left: 12px">
                <option value="none" selected>Select Categories</option>
                <?php 
                    $q1 = "SELECT * FROM CATEGORY ORDER BY CAT_ID ASC";
                    $r1 = mysqli_query($conn,$q1);

                    while($row= mysqli_fetch_array($r1)){
                        if($row['CAT_VALUE'] == 'none'){
                            echo '<option title="item" value="'.$row['CAT_VALUE'].'"';
                            echo ' style="background-color:#dcdcc3;font-weight:bold;color:#000000;" disabled>
                            '.$row['CAT_NAME'].'</option>';

                        }else{
                            echo '<option value="'.$row['CAT_VALUE'].'">';
                            echo $row['CAT_NAME'].'</option>';
                        }
                    }
                    mysqli_close($conn);

                ?>
            </select>
        </div>
        <span class="required error" id="ads_cat-info"></span>
    </div>

    <div class="form-group mb-3 " id="condition_div" style="display:block">
        <label class="control-label">Condition*</label><br>
        <label class ="condition" ><input type="radio" name="condition" value="used" checked>  Used</label>
        <label class ="condition"><input type="radio" name="condition" value="new">  New</label><br>        
        <span class="required error" id="item_condition-info"></span>
    </div>

    <div class="form-group mb-3" id="tenet_div" style="display:none">
        <label class="control-label">Tenet Preference*</label><br>
        <label class ="tenet"><input type="checkbox" name="tenet[]" id="checkMale" value="male" >  Male</label>
        <label class ="tenet"><input type="checkbox" name="tenet[]" id="checkFemale" value="female">  Female</label><br/>            
        <span class="required error" id="tenet-info"></span>
    </div>

    <div id="contract_salary_div" style="display:none">
    <div class="tg-inputwithicon" style="width:50%;flex: 0 0 50%; padding-right:5%">
        <label class="control-label">Contract Type*</label>
        <div class="tg-select form-control contract_type_div" id="contract_type_div">
            <select class="form-ad valid" id="contract_type" name="contract_type" sel_id aria-required="true" aria-invalid="false" style="padding-left: 12px">
                <option value="none" selected disabled>Select Type</option>
                <option value="parttime" >Part-time</option>
                <option value="freelance" >Freelance</option>
                <option value="internship" >Internship</option>
            </select>
        </div>
        <span class="required error" id="contract_type-info"></span>
    </div>

    <div class="tg-inputwithicon" style="width:40%;flex:1; " style="display:none">
        <label class="control-label">Salary Type*</label>
        <div class="tg-select form-control salary_type_div" id="salary_type_div">
            <select class="form-ad valid" id="salary_type" name="salary_type" sel_id aria-required="true" aria-invalid="false" style="padding-left: 12px">
                <option value="none" selected disabled>Select Type</option>
                <option value="perhour" >Per Hour</option>
                <option value="perday" >Per Day</option>
                <option value="permonth" >Per Month</option>
            </select>
        </div>
        <span class="required error" id="salary_type-info"></span>
    </div>
    </div>

    <div class="form-group mb-3">
        <label class="control-label">Ad Title*</label>
        <input class="form-control input-md" name="title" id="title"  placeholder="Title" type="text" >
        <span class="required error" id="ads_title-info"></span>
    </div>

    <div class="form-group mb-3">
        <label class="control-label" id="price_label">Price (RM)*</label>
        <input class="form-control input-md" id="price" name="price" maxlength="9" placeholder="Price" type="text">
        <span class="required error" id="ads_price-info"></span>    
    </div>

    <div class="form-group mb-3">
        <label class="control-label">Description*</label>
        <textarea class="input_cred" name="description" id="description" placeholder="Decription" rows="6"></textarea>
        <span class="required error" id="ads_descp-info"></span>
    </div>

<!-- EXTRA 
<div class="form-group md-3">
<section id="editor">
<div id="summernote">
</div>
</section>
</div>
 END -->

    <div class="form-group mb-3 tg-inputwithicon item-location">
        <label class="control-label">Location*</label>
        <div class="tg-select form-control" id="location_div">
            <select class="form-ad valid" name="loc" id="loc" class="loc" sel_id aria-required="true" aria-invalid="false" style="padding-left: 12px" onchange="showDiv(this)">
                <option value="none" selected>Select Location</option>
                <?php 
                require 'config.php';
                    $q2 = "SELECT * FROM LOCATION ORDER BY LOC_ID ASC";
                    $r2 = mysqli_query($conn,$q2);

                    while($row= mysqli_fetch_array($r2)){
                        if($row['LOC_VALUE'] == 'none'){
                            echo '<option title="item" value="'.$row['LOC_VALUE'].'"';
                            echo ' style="background-color:#dcdcc3;font-weight:bold;color:#000000;" disabled>
                            '.$row['LOC_NAME'].'</option>';

                        }else if($row['LOC_VALUE'] != ''){
                            echo '<option value="'.$row['LOC_VALUE'].'">';
                            echo $row['LOC_NAME'].'</option>';
                        }
                    }
                    mysqli_close($conn);

                ?>
            </select> 
        </div>
        <span class="required error" id="ads_loc-info"></span>
    </div>

    <div class="form-group mb-3 tg-inputwithicon item-area" id="other_loc_div" style="display:none">
        <label class="control-label">Others*</label>
        <input class="form-control input-md" name="other_loc" id="other_loc" placeholder="Location" type="text">
        <span class="required error" id="ads_area-info"></span>
    </div>

    <div class="form-group mb-3" id="deal_method_div" style="display:block">
        <label class="control-label">Deal Method*</label><br>
        <label class ="deal_method" ><input type="checkbox" name="deal_method[]"  value="meetup" >  Meet Up</label>
        <label class ="deal_method" ><input type="checkbox" name="deal_method[]" value="mail">  Mailing or Delivery</label><br>        
        <span class="required error" id="deal_method-info"></span>
    </div>

</div><!--dashboard-wrapper-->
</div><!--innerbox-->
</div>
</div>
</div>

<div class="col-sm-12 col-md-4 col-lg-5">
<label class="tg-fileuploadlabel">
<label for="uploadImage" class="btn btn-common">
    Upload Photo
</label>
<input name="uploadImage[]" id="uploadImage" type="file" multiple />
<div id="image_preview"></div><span>(Maximum 5 photos)</span>
</label>
<div style="display: flex; justify-content: flex-end; padding-top:20px;">
<div class="btn btn-cancel" onclick="goBack()" style="background-color:#e1dfe1">Cancel</div>
<input class="btn btn-common" type="submit" name="postAds_btn" id="postAds_btn" value="Post" style="background-color:#e90dc8">
<!--
<button type="submit" class="btn btn-common log-btn" name="postAds_btn" id="postAds_btn" >Post Ad</button>
-->
</div>
<?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"error=uploadFail")==true){
        echo "<br><div class='error-msg'>Upload Failed! Please Try Again Later.</div>";
    }  else if(strpos($fullUrl,"error=ImageUploadFail")==true){
        echo "<br><div class='error-msg'>Image must be less than 5MB and in .jpg/png/jpeg format!!</div>";
    } else if(strpos($fullUrl,"error=invalidImgSize")==true){
        echo "<br><div class='error-msg'>invalidImgSize</div>";
    } else if(strpos($fullUrl,"error=invalideFileType")==true){
        echo "<br><div class='error-msg'>invalideFileType</div>";
    } 
    
    ?>
</div>
</div>
<input name="user_email" value=<?php echo $_SESSION["userEmail"];?> type="text" hidden>
</form>
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

<script>
    function goBack() {
        window.history.back();
    }
    
    document.getElementById("uploadImage").onchange = function () {
        if (typeof (FileReader) != "undefined") {
            var image_preview = $("#image_preview");
            image_preview.html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png|.bmp)$/;

            if ($(this)[0].files.length > 5) {
                alert("You can select maximum 5 images");
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


</script>
<script src="js/postAds.js"></script>
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


<?php  
/*
if (isset($_POST['insert'])){
  $target = "image/".basename($_FILES['image']['name']);
}
//Connect to database
require 'dbh.php';

//file properties
if(isset($_FILES['image'])){
  $file = $_FILES['image']['tmp_name'];
}

if(!isset($file)){
	echo "<p> </p>";
} else {
	//$image = mysql_real_escape_string(file_get_contents($_FILES['image']['tmp_name']));
	$image = $_FILES['image']['name'];
	$image_name = mysqli_real_escape_string($conn,$_FILES['image']['name']);
	$image_size = getimagesize($_FILES['image']['tmp_name']);
	$name = $_POST['name'];
	$price = $_POST ['price'];
	$venue = $_POST ['venue'];
	$desp = $_POST ['desp'];
  $category = $_POST ['category'];
  $sellerID = $_SESSION["userID"] ;
 
	if(empty($name)||empty($price)||empty($venue)||empty($desp)||empty($category)){
    echo"<script>alert('Please fill in all the details.')</script>";

  } else if($image_size == FALSE || empty($image_size)){
    echo"<script>alert('Uploaded file is not a valid image. Only JPG, PNG files are allow.')</script>";

}else {
  $sql = "INSERT INTO images (name,image,productName,productPrice,venue,descrip,category,userID) VALUES('$image_name','$image','$name','$price', '$venue','$desp','$category','$sellerID')";
	$query =  mysqli_query($conn,$sql);
  $lastid = mysqli_insert_id($conn);
  
  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
    echo "<script type='text/javascript'>alert('Item successfully Uploaded!')</script>";
  }else{
    echo "<script type='text/javascript'>alert('Error uploading!')</script>";

}
  }
  

		
}

error_reporting(-1);
*/
?>