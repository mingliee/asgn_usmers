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

<link media="all" type="text/css" rel="stylesheet" href="admin/assets/plugins/@mdi/font/css/materialdesignicons.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link media="all" type="text/css" rel="stylesheet" href="admin/assets/plugins/owl-carousel-2/assets/owl.carousel.min.css">
<link media="all" type="text/css" rel="stylesheet" href="admin/assets/plugins/owl-carousel-2/assets/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="fonts/line-icons.css">

<link rel="stylesheet" type="text/css" href="css/slicknav.css">

<link rel="stylesheet" type="text/css" href="css/nivo-lightbox.css">

<link rel="stylesheet" type="text/css" href="css/animate.css">

<link rel="stylesheet" type="text/css" href="css/main.css">

<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">

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
<h2 class="product-title">Details</h2>
<ol class="breadcrumb">
<li><a href="#">Home /</a></li>
<li class="current">Details</li>
</ol>
</div>
</div>
</div>
</div>
</div>


<div class="section-padding fullpage">
<div class="container">

<div class="product-info row">
<div class="col-lg-6 col-md-12 col-xs-12">
    
<?php
        $adsID=$_GET['adsID'];

        if (strpos($adsID, 'AI') !== false) {
            $adsTable="ADS_ITEM";
            $imgTable="IMAGE_ITEM";
            $subQ1="INNER JOIN `ABBR` ON (".$adsTable.".ITEM_CONDITION=ABBR.ABBR_VALUE) OR (".$adsTable.".ITEM_DEAL_METHOD =ABBR.ABBR_VALUE) ";
        } else if (strpos($adsID, 'AA') !== false) {
            $adsTable="ADS_ACCOM";
            $imgTable="IMAGE_ACCOM";
            $subQ1="INNER JOIN `ABBR` ON (".$adsTable.".ACCM_TENET_PREF=ABBR.ABBR_VALUE) ";
        } else if (strpos($adsID, 'AJ') !== false) {
            $adsTable="ADS_JOB";
            $imgTable="IMAGE_JOB";
            $subQ1="INNER JOIN `ABBR` ON (".$adsTable.".JOB_CONTRACT_TYPE=ABBR.ABBR_VALUE) OR (".$adsTable.".JOB_SALARY_TYPE=ABBR.ABBR_VALUE) ";
        }

        $q0 ="SELECT * FROM `".$adsTable."` 
            INNER JOIN `".$imgTable."` ON (".$imgTable.".ADS_ID=".$adsTable.".ADS_ID) 
            WHERE ".$adsTable.".ADS_ID = '$adsID' 
            AND ".$imgTable.".IMAGE_STATUS='ACTIVE' ";
        $r0=mysqli_query($conn,$q0);
        $rowcount=mysqli_num_rows($r0);
        echo '<div class="owl-carousel owl-theme full-width">';
        if($rowcount==1){
            while($row = mysqli_fetch_assoc($r0)){
                $image = $row['IMAGE_NAME'];
                $ads_status=$row['ADS_STATUS'];
                
                echo '<div class="img-1">
                <div class="img-3">
                <img class="item img-fluid" src="img/product/';
                echo $image;
                echo '" alt="Ad Image" >';
                if($ads_status=='SOLD'){ echo '<div class="overlay lay-sold" >SOLD</div>';}
                else if($ads_status=='DELETED'){ echo '<div class="overlay lay-deleted">DELETED</div>';}
                else if($ads_status=='RESERVED'){ echo '<div class="overlay lay-reserved" >RESERVED</div>';}
                else if($ads_status=='INACTIVE'){ echo '<div class="overlay lay-inactive" >INACTIVE</div>';}
                echo '</div>
                </div>';
                
            }
        } else if ($rowcount>1){
            while($row = mysqli_fetch_assoc($r0)){
                $image = $row['IMAGE_NAME'];
                $ads_status=$row['ADS_STATUS'];
                
                echo '<div class="img-1">
                <div class="img-3">
                <img class="item img-fluid" src="img/product/';
                echo $image;
                echo '" alt="Ad Image">';
                if($ads_status=='SOLD'){ echo '<div class="overlay lay-sold" >SOLD</div>';}
                else if($ads_status=='DELETED'){ echo '<div class="overlay lay-deleted" >DELETED</div>';}
                else if($ads_status=='RESERVED'){ echo '<div class="overlay lay-reserved" >RESERVED</div>';}
                else if($ads_status=='INACTIVE'){ echo '<div class="overlay lay-inactive" >INACTIVE</div>';}                
                echo '</div>
                </div>';
                
            }
        }
        echo '</div>';

       /*  echo '
        <div class="item"><img src="admin/assets/images/carousel/banner_12.jpg" alt="banner image" /> </div>
        <div class="item"><img src="admin/assets/images/carousel/banner_2.jpg" alt="banner image" /> </div>
        <div class="item"><img src="admin/assets/images/carousel/banner_1.jpg" alt="banner image" /> </div>
      //</div>'; */
            //$row=mysqli_fetch_row($r1);

            $q1 ="SELECT * FROM `".$adsTable."` 
                    INNER JOIN `USER` ON (".$adsTable.".USER_ID=USER.USER_ID) 
                    INNER JOIN `CATEGORY` ON (".$adsTable.".ADS_CAT=CATEGORY.CAT_VALUE) 
                    ".$subQ1."where ADS_ID = '$adsID' ";
            $r1=mysqli_query($conn,$q1);
            //echo 'q1: '.$q1;

            $i=0;
            $edit="true";
            while($row = mysqli_fetch_assoc($r1)){
                $userEmail=$row['USER_EMAIL'];
                $ads_id = $row['ADS_ID'];
                $ads_status=$row['ADS_STATUS'];
                $privateStatus=$row['PRIVATE_STATUS'];
                if($ads_status=="SOLD" || $ads_status=="DELETED"){
                    $edit="false";
                }
                $name = $row ['ADS_TITLE'];
                $name = str_replace( '"',"'", $name);
                $price = $row['ADS_PRICE'];
                if($price=='0'){
                    $free="true";
                    $price="FREE";
                }else{
                    $free="false";
                }
                $price=str_ireplace('.00','',$price);
                $descp = $row['ADS_DESCP'];
                $descp = str_replace( '"',"'", $descp);
                $loc = $row['ADS_LOC'];
                if($loc=='ou'||$loc=='op'||$loc=='ou'){
                    $loc = $row['ADS_AREA'];
                }
                $cat = $row['CAT_NAME'];
                //$cat = strtok($cat, " ");
                $cat_value=$row['ADS_CAT'];
                $sub[$i]=$row['ABBR_NAME'];
                $date = date("j M y g:i a",strtotime($row['ADS_PUBLISH_DATE']));
                $seller = $row ['USER_NAME'];
                $sellerID=$row['USER_ID'];
                $phoneNo = $row['WHATSAPP'];
                $text="Hi, I'm interested in your ads *(";
                $text .= $name;
                $text .= ")* in _Usmers'_";
                $urlencodedtext = str_replace(' ', '%20', $text);
                $i++;
            }

        $myID = $_SESSION["userID"];
        if($privateStatus==='DELETED'){
            echo("<script>location.href = '404.php?e=removed';</script>");
        }
         
        //favourited?
        $favourite="false";
        $q2="SELECT * FROM favourite 
        INNER JOIN user ON (FAVOURITE.USER_ID=USER.USER_ID) 
        WHERE FAVOURITE.USER_ID='".$myID."' 
        AND FAVOURITE.ADS_ID='".$adsID."'";

        $r2=mysqli_query($conn,$q2);
        while($row = mysqli_fetch_assoc($r2)){
            $favourite="true";
        }
        //echo 'q2: '.$q2.'<br/>';
        //echo 'fav: '.$favourite;

        ?>
</div>
            <div class="col-lg-5 col-md-12 col-xs-12">
            <div class="details-box">
            <div class="ads-details-info">
            <h2><?php echo $name;?>
            </h2>
            <h4 style="color:red"> 
            <?php 
            if($free!="true"){
                echo 'RM '.$price;
            }else
                echo $price;
            ?>
            </h4>
            <div class="details-meta">

            <span><a href="#"><i class="lni-alarm-clock"></i> <?php echo $date;?>
            </a></span>
            <span><a href="#"><i class="lni-map-marker"></i> <?php echo $loc;?>
            </a></span>
            </div>
            <h4 class="title-small mb-3">Description:</h4>
            <p class="mb-2 wrapText">
            <?php echo $descp;?>
            </p>
            </div>
            <ul class="advertisement mb-4">
            <li>
            <p><strong><?php if($adsTable==="ADS_ITEM") echo " Deal Method: "; else if($adsTable==="ADS_JOB") echo " Contract Type: "; else if($adsTable==="ADS_ACCOM") echo " Tenet Preference: ";?></strong> <?php echo $sub[0];?></p>
            </li>
            <?php
            if($adsTable==="ADS_ITEM"||$adsTable==="ADS_JOB") {
            echo' <li>
            <p><strong>';
            if($adsTable==="ADS_ITEM") 
                echo " Condition: "; 
            else if($adsTable==="ADS_JOB") 
                echo " Salary Type: ";
            echo' </strong> <a href="#">'.$sub[1].'</a></p>
            </li>';
            }
            ?>
            <li>
            <p><strong> Category:</strong> <a href="category.php?cat=<?php echo $cat_value;?>">
            <?php echo $cat;?>
            </a></p>
            </li>
            </ul>

            <?php
            if($userEmail==$_SESSION["userEmail"] && $edit==="true"){
                echo '<div class="btns-actions"><a class="btn-action btn-edit" href="update-ads.php?adsID=';
                echo $ads_id;
                echo '"><i class="lni-pencil"></i></a>';
                echo '<div class="btn-action btn-delete " onClick="confirmation(\''.$ads_id.'\')">
                <i class="lni-trash"></i></div></div>';
            } else if($userEmail!=$_SESSION["userEmail"]){
                echo '<div class="ads-btn mb-4">
                <a href="#" class="btn btn-common btn-reply"><i class="lni-comments"></i> Chat Now</a>';
                echo '<a href="mailto:'.$userEmail.'?subject=Interested in '.$name.'&body=Hi, I am interested in your ads ('.$name.') posted on Usmers. Do this item still avalable? Thanks!"><i class="lni-envelope" style="font-size: 23px;vertical-align: middle;"></i></a>';
                echo '<a href="https://wa.me/'.$phoneNo.'/?text='.$urlencodedtext.'"><i class="lni-whatsapp"></i></a>';
                
                if($favourite==="false"){
                    echo '<i onClick="addFav(\''.$ads_id.'\',\''.$myID.'\')" class="favIcon lni-heart" id="favIcon" style="color:#ff0404;font-size: 23px;vertical-align: middle; "></i>';
                } else if($favourite==="true"){
                    echo '<i onClick="removeFav(\''.$ads_id.'\',\''.$myID.'\')" class="favIcon lni-heart-filled" id="favIcon" style="color:#ff0404;font-size: 23px;vertical-align: middle; "></i>';
                }
                
                echo '</div>';
            }?>

        <div class="description-info ">
        <div class="short-info">
        <h4>Short Info</h4>
        <ul>
        <li class="adsSellerName"><a href="profile.php?userID=<?php echo $sellerID; ?>"><i class="lni-users"></i> More ads by <span><?php echo $seller;?></span></a></li>
        <li><a href="report.php?adsID=<?php echo $ads_id;?>"><i class="lni-warning"></i> Report this ad</a></li>
        </ul>
        </div>
        </div>
<!--<span><a href="#"><i class="lni-eye"></i> 299 View</a></span>-->

<script>
$(document).ready(function() {
    $("#owl-demo").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds
            
        items : 1,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]

    });

});

$(document).ready(function(){
$('#owl-demo').owlCarousel({
    margin:10,
    responsiveClass:true,
    autoHeight:true,
    items:1,
    autoplay:true,
    autoplayTimeout:10000,
    autoplayHoverPause:true,
    nav : true,
    dots: true, //Make this true
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
})
});
</script>

<script>
    function addFav(adsID,myID){
        $adsID=adsID;
        $myID=myID;
        $.ajax({
            url: 'editFav.php',
            type: 'POST',
            data: {
                adsID: adsID,
                myID:myID,
                action: 'addFav',           
            },
            success: function(data) {
                //$("#"+id).remove();
                //x.classList.toggle("lni-heart-filled");
                $("#favIcon").toggleClass("lni-heart lni-heart-filled");
                document.getElementById( "favIcon" ).setAttribute( "onClick", "removeFav('"+adsID+"','"+$myID+"')" );
               // alert('Added to Favourite'+ 'data:'+data);
               popup("add");
                        
            },
            error: function(){
                //x.classList.toggle("lni-heart");
               // alert('Something wrong, please try again.');
            },
        });      
    }

    function removeFav(adsID,myID){
        $adsID=adsID;
        $myID=myID;
        $.ajax({
            url: 'editFav.php',
            type: 'POST',
            data: {
                adsID: adsID,
                myID:myID,
                action: 'removeFav',           
            },
            success: function(data) {
                //$("#"+id).remove();
                //x.classList.toggle("lni-heart-filled");
                $("#favIcon").toggleClass("lni-heart lni-heart-filled");
                document.getElementById( "favIcon" ).setAttribute( "onClick", "addFav('"+adsID+"','"+$myID+"')" );
                //alert('Remove from Favourite'+ 'data:'+data);
                popup("remove");        
            },
            error: function(){
                //x.classList.toggle("lni-heart");
                //alert('Something wrong, please try again.');
            },
        });      
    }

    function popup(action){
        var action=action;
        // Get the snackbar DIV
        var x = document.getElementById("snackbar");

        // Add the "show" class to DIV
        x.className = "show";

        if(action=="add"){
            document.getElementById("snackbar").innerHTML = "Added to My Favourites";
        }else if(action=="remove"){
            document.getElementById("snackbar").innerHTML = "Remove from My Favourites";
        }
        // After 3 seconds, remove the show class from DIV
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }

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
</script>

<!--
<div class="share">
<span>Share: </span>
<div class="social-link">
<a class="facebook" href="#"><i class="lni-facebook-filled"></i></a>
<a class="twitter" href="#"><i class="lni-twitter-filled"></i></a>
<a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a>
<a class="google" href="#"><i class="lni-google-plus"></i></a>
</div>
</div>
-->
</div>
</div>
</div>

<!--
<div class="description-info">
<div class="row">
<div class="col-lg-4 col-md-6 col-xs-12">
<div class="short-info">
<h4>Short Info</h4>
<ul>
<li><a href="#"><i class="lni-users"></i> More ads by <span>User</span></a></li>
<li><a href="#"><i class="lni-printer"></i> Print this ad</a></li>
<li><a href="#"><i class="lni-reply"></i> Send to a friend</a></li>
<li><a href="#"><i class="lni-warning"></i> Report this ad</a></li>
</ul>
</div>
</div>
</div>
</div>
-->
</div>
</div>


<?php 
include 'footer.php';
mysqli_close($conn);
?>

<div id="snackbar"></div>


<a href="#" class="back-to-top">
<i class="lni-chevron-up"></i>
</a>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>
<script src="admin/assets/plugins/owl-carousel-2/owl.carousel.min.js"></script>
<script src="admin/assets/js/owl-carousel.js"></script>

<script src="js/jquery-min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/wow.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/nivo-lightbox.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/form-validator.min.js"></script>
<script src="js/contact-form-script.min.js"></script>
<script src="js/summernote.js"></script>

</body>
</html>