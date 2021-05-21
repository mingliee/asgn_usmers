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

<link rel="stylesheet" type="text/css" href="css/summernote.css">

<link rel="stylesheet" type="text/css" href="css/animate.css">

<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">

<link rel="stylesheet" type="text/css" href="css/responsive.css">

<link rel="stylesheet" type="text/css" href="css/login.css">

<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>

<header id="header-wrap">

<?php
require_once 'config.php';
include  'navbar.php';
$ads_id=$_GET['adsID'];
//echo"<script>alert('ads_id.'+$ads_id)</script>";

    if(count($_POST)>0) {

    $updateSQL ="UPDATE ADS SET ADS_STATUS='DELETED', ADS_TITLE='CHEAPER MASK', ADS_PRICE='2', ADS_LATEST_UPDATE_DATE=NOW() WHERE ADS_ID='67'";
    $updateResult = mysqli_query($conn,$updateSQL);

    $message = "Record Modified Successfully";
    echo"<script>alert('message: '.$message)</script>";

    }

    if (strpos($ads_id, 'AI') !== false) {
        $adsTable="ADS_ITEM";
        $imgTable="IMAGE_ITEM";
    } else if (strpos($ads_id, 'AA') !== false) {
        $adsTable="ADS_ACCOM";
        $imgTable="IMAGE_ACCOM";
    } else if (strpos($ads_id, 'AJ') !== false) {
        $adsTable="ADS_JOB";
        $imgTable="IMAGE_JOB";
    }

    $retrieveSQL = "SELECT * FROM ".$adsTable." WHERE ADS_ID='$ads_id'";
    $retrieveResult = mysqli_query($conn,$retrieveSQL);
    $row= mysqli_fetch_array($retrieveResult);

    $retrieveImgSQL ="SELECT * FROM ".$imgTable." WHERE ADS_ID='$ads_id' AND IMAGE_STATUS='ACTIVE'";
    $retrieveImgResult = mysqli_query($conn,$retrieveImgSQL);
    
//echo 'retrieveSQL: '.$retrieveSQL.'<br/>';
//echo 'retrieveImgSQL: '.$retrieveImgSQL.'<br/>';

?>

</header>


<div class="page-header" style="background: url(img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Update Ads</h2>
<ol class="breadcrumb">
<li><a href="#">Home /</a></li>
<li class="current">Update Ads</li>
</ol>
</div>
</div>
</div>
</div>
</div>


<div id="content" class="section-padding">
<div class="container">

<form role="form" class="postAds-form" name="postAds" action="postSubmit.php" method="POST" onsubmit="return updateAdsVal()" enctype = "multipart/form-data" >
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
        <label class="control-label">Status*</label>
        <div class="tg-select form-control status_div" id="status_div">
            <select class="form-ad valid" id="status_div" name="status_div" sel_id aria-required="true" aria-invalid="false" style="padding-left: 12px">
                <option value="none" disabled >Select status</option>
                <?php 
                    $statusSQL = "SELECT * FROM ADS_STATUS ORDER BY STATUS_ID ASC";
                    $statusResult = mysqli_query($conn,$statusSQL);

                    while($status= mysqli_fetch_array($statusResult)){
                         if($status['STATUS_VALUE'] == $row['ADS_STATUS']){
                            if($status['STATUS_VALUE'] =='INACTIVE' || $status['STATUS_VALUE'] =='DELETED' ){
                                echo '<option  value="'.$status['STATUS_VALUE'].'"';
                                echo ' style="background-color:#dcdcc3;" disabled selected>';
                                echo $status['STATUS_NAME'].' </option>';

                            } else{
                                echo '<option value="'.$status['STATUS_VALUE'].'" selected>';
                                echo $status['STATUS_NAME'].' </option>';
                            }

                        } else {
                            if($status['STATUS_VALUE'] =='INACTIVE' || $status['STATUS_VALUE'] =='DELETED' ){
                                echo '<option  value="'.$status['STATUS_VALUE'].'"';
                                echo ' style="background-color:#dcdcc3;" disabled >';
                                echo $status['STATUS_NAME'].' </option>';

                            } else{
                                echo '<option value="'.$status['STATUS_VALUE'].'">';
                                echo $status['STATUS_NAME'].'</option>';
                            }
                            
                        }
                    }
                   
                ?>
            </select>
        </div>
                <span class="required error" id="ads_status-info"></span>
    </div>

    <div class="form-group mb-3 tg-inputwithicon">
        <label class="control-label">Category*</label>
                <?php 
                    $q1 = "SELECT * FROM CATEGORY WHERE CAT_VALUE='".$row['ADS_CAT']."'";
                    $r1 = mysqli_query($conn,$q1);

                    while($cat= mysqli_fetch_array($r1)){
                        $catName=$cat['CAT_NAME'];
                    }
                ?>
        <div class="input_cred not-allowed" name="category_group_div" id="category_group_div"  type="text" onload="filter_category()">
        <?php echo $catName ?>
        <input id="category_group" name="category_group" value="<?php echo $row['ADS_CAT']; ?>" hidden/>
        </div>
    </div>

    <?php if($adsTable==='ADS_ITEM') {?>
    <div class="form-group mb-3 " id="condition_div">
        <label class="control-label">Condition*</label><br>
        <label class ="condition" ><input type="radio" name="condition" value="used" <?php if($row['ITEM_CONDITION']==='used') echo 'checked'; ?> >  Used</label>
        <label class ="condition"><input type="radio" name="condition" value="new" <?php if($row['ITEM_CONDITION']==='new') echo 'checked'; ?> >  New</label><br>        
        <span class="required error" id="item_condition-info"></span>
    </div>
    <?php } ?>

    <?php if($adsTable==='ADS_ACCOM') {?>
    <div class="form-group mb-3" id="tenet_div">
        <label class="control-label">Tenet Preference*</label><br>
        <label class ="tenet"><input type="checkbox" name="tenet[]" id="checkMale" value="male" <?php if (strpos($row['ACCM_TENET_PREF'], 'male') !== false) echo 'checked'; ?>>  Male</label>
        <label class ="tenet"><input type="checkbox" name="tenet[]" id="checkFemale" value="female" <?php if (strpos($row['ACCM_TENET_PREF'], 'female') !== false) echo 'checked'; ?>>  Female</label><br/>            
        <span class="required error" id="tenet-info"></span>
    </div>
    <?php } ?>

    <?php if($adsTable==='ADS_JOB') {?>
    <div id="contract_salary_div" style="display:flex">
    <div class="tg-inputwithicon" style="width:50%;flex: 0 0 50%; padding-right:5%">
        <label class="control-label">Contract Type*</label>
        <div class="tg-select form-control contract_type_div" id="contract_type_div">
            <select class="form-ad valid" id="contract_type" name="contract_type" sel_id aria-required="true" aria-invalid="false" style="padding-left: 12px">
                <option value="none" disabled>Select Type</option>
                <option value="parttime" <?php if($row['JOB_CONTRACT_TYPE']==='parttime') echo 'selected'; ?>>Part-time</option>
                <option value="freelance" <?php if($row['JOB_CONTRACT_TYPE']==='freelance') echo 'selected'; ?>>Freelance</option>
                <option value="internship" <?php if($row['JOB_CONTRACT_TYPE']==='internship') echo 'selected'; ?>>Internship</option>
            </select>
        </div>
        <span class="required error" id="contract_type-info"></span>
    </div>

    <div class="tg-inputwithicon" style="width:40%;flex:1; ">
        <label class="control-label">Salary Type*</label>
        <div class="tg-select form-control salary_type_div" id="salary_type_div">
            <select class="form-ad valid" id="salary_type" name="salary_type" sel_id aria-required="true" aria-invalid="false" style="padding-left: 12px">
                <option value="none" disabled>Select Type</option>
                <option value="perhour" <?php if($row['JOB_SALARY_TYPE']==='perhour') echo 'selected'; ?>>Per Hour</option>
                <option value="perday" <?php if($row['JOB_SALARY_TYPE']==='perday') echo 'selected'; ?> >Per Day</option>
                <option value="permonth" <?php if($row['JOB_SALARY_TYPE']==='permonth') echo 'selected'; ?> >Per Month</option>
            </select>
        </div>
        <span class="required error" id="salary_type-info"></span>
    </div>
    </div>
    <?php } ?>

    <div class="form-group mb-3">
        <label class="control-label">Ad Title*</label>
        <input class="form-control input-md" name="title" id="title"  placeholder="title" type="text" value="<?php echo $row['ADS_TITLE']; ?>">
        <span class="required error" id="ads_title-info"></span>
    </div>

    <div class="form-group mb-3">
        <label class="control-label">Price (RM)*</label>
        <input class="form-control input-md" id="price" name="price" placeholder="Ad your Price" type="text" value="<?php echo $row['ADS_PRICE']; ?>">
        <span class="required error" id="ads_price-info"></span>    
    </div>

    <div class="form-group mb-3">
        <label class="control-label">Description*</label>
        <textarea class="input_cred" name="description" id="description" placeholder="Decription" rows="6"><?php echo str_replace("<br />","",$row['ADS_DESCP']); ?></textarea>
        <span class="required error" id="ads_descp-info"></span>
    </div>
    <div class="form-group mb-3 tg-inputwithicon item-location">
        <label class="control-label">Item Location*</label>
        <div class="tg-select form-control" id="location_div">
            <select class="form-ad valid" name="loc" id="loc" class="loc" sel_id aria-required="true" aria-invalid="false" style="padding-left: 12px" onchange="showDiv(this)">
                <option value="none" disabled>Select Location</option>
               
                 <?php 
                    $q2 = "SELECT * FROM LOCATION ORDER BY LOC_ID ASC";
                    $r2 = mysqli_query($conn,$q2);

                    
                    while($loc= mysqli_fetch_array($r2)){
                        if($loc['LOC_VALUE'] == 'none'){
                            echo '<option title="item" value="'.$loc['LOC_VALUE'].'"';
                            echo ' style="background-color:#dcdcc3;font-weight:bold;color:#000000;" disabled>
                            '.$loc['LOC_NAME'].'</option>';

                        }else if($loc['LOC_VALUE'] == $row['ADS_LOC']){
                            echo '<option value="'.$loc['LOC_VALUE'].'" selected>';
                            echo $loc['LOC_NAME'].' </option>';

                        }else{
                            echo '<option value="'.$loc['LOC_VALUE'].'">';
                            echo $loc['LOC_NAME'].'</option>';
                        }
                    }
                    //$loca=$row['ADS_LOC'];
                    //echo"<script>alert('loca: '+$loc['LOC_VALUE'])</script>";
                    

                ?>
            
            </select> 
        </div>
        <span class="required error" id="ads_loc-info"></span>
    </div>
    
    <div class="form-group mb-3 tg-inputwithicon item-area" id="other_loc_div" style="display:<?php if($row['ADS_LOC']=="ou"||$row['ADS_LOC']=="op"||$row['ADS_LOC']=="o") echo 'block'; else echo 'none';?>">
        <label class="control-label">Other Address*</label>
        <input class="form-control input-md" name="other_loc" id="other_loc" placeholder="Location" type="text" value="<?php echo $row['ADS_AREA']; ?>">
        <span class="required error" id="ads_area-info"></span>
    </div>

    <?php if($adsTable==='ADS_ITEM') {?>
    <div class="form-group mb-3" id="deal_method_div" style="display:block">
        <label class="control-label">Deal Method*</label><br>
        <label class ="deal_method" ><input type="checkbox" name="deal_method[]"  value="meetup" <?php if(strpos($row['ITEM_DEAL_METHOD'],'meetup')!== false) echo 'checked'; ?>>  Meet Up</label>
        <label class ="deal_method" ><input type="checkbox" name="deal_method[]" value="mail" <?php if(strpos($row['ITEM_DEAL_METHOD'],'mail')!== false) echo 'checked'; ?>>  Mailing or Delivery</label><br>        
        <span class="required error" id="deal_method-info"></span>
    </div>
    <?php } ?>

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
<div id="image_preview">
<?php 
    while($rowImg= mysqli_fetch_array($retrieveImgResult)){
    $image = $rowImg['IMAGE_NAME'];

    echo '<img src="img/product/';
    echo $image;
    echo '" style="height:100px;padding:5px">';
    }

    ?>
                
</div><span>(Maximum 5 photos)</span>
<input name="uploadImage[]" id="uploadImage" type="file" value="<?php echo $rowImg['IMAGE_FILE']; ?>" multiple />
</label>
<div style="display: flex; justify-content: flex-end; padding-top:20px;">
<!-- <a href="ads-details.php?adsID=<?php echo $row['ADS_ID'];?>"> -->
<div class="btns-actions">
<div class="btn-action btn-delete " onClick="confirmation('<?php echo $ads_id ?>');">
<i class="lni-trash"></i>
</div>
</div>

<div class="btn btn-cancel" onclick="goBack()" style="background-color:#e1dfe1">Cancel</div>
<!-- </a> -->
<input class="btn btn-common" type="submit" name="updateAds_btn" id="updateAds_btn" value="Update" style="background-color:#e90dc8">

</div>
<?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"error=uploadFail")==true){
        echo "<div class='error-msg'>Upload Failed! Please Try Again Later.</div>";
    } else if(strpos($fullUrl,"error=ImageUploadFail")==true){
        echo "<div class='error-msg'>Image must be less than 500KB/5MB and in .jpg/png/jpeg format!!</div>";
    } else if(strpos($fullUrl,"error=invalidImgSize")==true){
        echo "<div class='error-msg'>invalidImgSize</div>";
    } else if(strpos($fullUrl,"error=invalideFileType")==true){
        echo "<div class='error-msg'>invalideFileType</div>";
    } 
    
    ?>
</div>
</div>
<input name="user_email" value=<?php echo $_SESSION["userEmail"];?> type="text" hidden>
<input name="ads_id" value=<?php echo $row['ADS_ID'];?> type="text" hidden>
<input name="seller_id" value=<?php echo $row['USER_ID'];?> type="text" hidden>
</form>
</div>
</div>

<?php
include  'footer.php';
mysqli_close($conn);
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
                alert("You can select only 5 images");
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

    function confirmation(adsID){
      var id = adsID;
      var answer = confirm('Are you sure you want to delete '+id+'? Action cannot be undo.');
      if(answer){
        // alert("ads:"+id);
         $.ajax({
               url: 'delete.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    //$("#"+id).remove();
                    window.location.href = "account-myads.php";
                    //location.reload();
                          
               }
            });
      }
    }

  /*   function showDiv(select){
        if(select.value=='ou'||select.value=='op'||select.value=='o'){
            document.getElementById('other_loc').style.display = "block";
        } else{
            document.getElementById('other_loc').style.display = "none";
        }
    } */
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