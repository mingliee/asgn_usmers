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
require_once("config.php");
include  'navbar.php';
?>
</header>

<div class="page-header" style="background: url(img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">My Favorites</h2>
<ol class="breadcrumb">
<li><a href="#">Home /</a></li>
<li class="current">My Favorites</li>
</ol>
</div>
</div>
</div>
</div>
</div>
<?php
    
    $sesEmail=$_SESSION["userEmail"];

    $userSQL ="SELECT * FROM `USER`
        LEFT JOIN AVATAR ON (AVATAR.AVATAR_ID=USER.AVATAR_ID)
        WHERE USER_EMAIL='$sesEmail'";    $userResult=mysqli_query($conn,$userSQL);

        while($row = mysqli_fetch_assoc($userResult)){
        $username=$row['USER_NAME'];
        $useremail = $row['USER_EMAIL'];
        $user_status=$row['USER_STATUS'];
        $whatsapp = $row ['WHATSAPP'];
        $userID = $row ['USER_ID'];
        $avatar = $row['AVATAR_NAME'];

        $join = date("j M y g:i a",strtotime($row['CREATE_AT']));
        //$seller = $row ['USER_NAME'];
        
        if($whatsapp==null){
            $whatsapp="-";
        }
    }

?>

<div id="content" class="section-padding fullpage">
<div class="container">
<div class="row">
<div class="col-sm-12 col-md-4 col-lg-3 page-sidebar">
<aside>
<div class="sidebar-box">
<div class="user">
<div class="userPP" style="position:relative; text-align:center">
    <figure>
        <?php if($avatar!=null){?>
        <span class="img-div">
            <img src="img/avatar/<?php echo $avatar;?>" alt="<?php echo $useremail; ?>" id="profileDisplay">
        </span>
        <?php }else{?>
            <span class="img-div">
            <img src="img/author/avatar.jpg">
            </span>
        <?php }?>
    </figure>
    <br>
    <div class="usercontent">
    <h3><?php echo $username; ?></h3>
    <p><?php echo $useremail; ?></p>
    </div>
</div>
</div>
<nav class="navdashboard">
<ul>
<li>
<a href="messages.php">
<i class="lni-comments"></i>
<span>Messages</span>
</a>
</li>
<li>
<a href="account-myads.php">
<i class="lni-layers"></i>
<span>My Ads</span>
</a>
</li>
<li>
<a class="active" href="account-favourite-ads.php">
<i class="lni-heart"></i>
<span>My Favourites</span>
</a>
</li>
<li>
<a href="account-profile-setting.php">
<i class="lni-cog"></i>
<span>Profile Setting</span>
</a>
</li>
<li>
<a href="profile.php?userID=<?php echo $userID; ?>">
<i class="lni-eye"></i>
<span>View As</span>
</a>
</li>
<li>
<a href="logout.php">
<i class="lni-exit"></i>
<span>Logout</span>
</a>
</li>
</ul>
</nav>
</div>
</aside>
</div>

<div class="col-sm-12 col-md-12 col-lg-9">
<div class="page-content">
<div class="inner-box" style="background:white;">
<!-- <div class="dashboard-box">
<h2 class="dashbord-title">My Favourites</h2>
</div> -->

<?php

require_once("config.php");
$userEmail=$_SESSION["userEmail"];
$myID=$_SESSION["userID"];

$q1="SELECT DISTINCT  I.ADS_ID,I.ADS_STATUS,I.ADS_LATEST_UPDATE_DATE,I.ADS_PUBLISH_DATE,I.ADS_TITLE,I.ADS_PRICE,   
    I.ADS_DESCP,I.ADS_LOC,I.ADS_AREA,I.ADS_CAT,II.IMAGE_NAME,U.USER_NAME,C.CAT_NAME,FAV.FAV_ADDED_DATE,AB.ABBR_NAME AS SUB_INFO 
    FROM ADS_ITEM I    
    INNER JOIN IMAGE_ITEM II ON (I.ADS_ID=II.ADS_ID)    
    INNER JOIN USER U ON(U.USER_ID=I.USER_ID)    
    INNER JOIN CATEGORY C ON(C.CAT_VALUE=I.ADS_CAT)   
    INNER JOIN FAVOURITE FAV ON(FAV.ADS_ID=I.ADS_ID)
    INNER JOIN ABBR AB ON(AB.ABBR_VALUE=I.ITEM_CONDITION)  
    AND II.IMAGE_STATUS='ACTIVE'   
    WHERE FAV.USER_ID ='$myID' 
    GROUP BY (I.ADS_ID)   
    UNION SELECT DISTINCT    
    A.ADS_ID,A.ADS_STATUS,A.ADS_LATEST_UPDATE_DATE ,A.ADS_PUBLISH_DATE,A.ADS_TITLE,A.ADS_PRICE,A.ADS_DESCP,A.ADS_LOC,   
    A.ADS_AREA,A.ADS_CAT,IA.IMAGE_NAME,U.USER_NAME ,C.CAT_NAME,FAV.FAV_ADDED_DATE,AB.ABBR_NAME AS SUB_INFO
    FROM ADS_ACCOM A    
    INNER JOIN IMAGE_ACCOM IA ON (A.ADS_ID=IA.ADS_ID)    
    INNER JOIN USER U ON(U.USER_ID=A.USER_ID)    
    INNER JOIN CATEGORY C ON(C.CAT_VALUE=A.ADS_CAT)
    INNER JOIN FAVOURITE FAV ON(FAV.ADS_ID=A.ADS_ID)
    INNER JOIN ABBR AB ON(AB.ABBR_VALUE=A.ACCM_TENET_PREF)
    AND IA.IMAGE_STATUS='ACTIVE'   
    WHERE FAV.USER_ID ='$myID' 
    GROUP BY (A.ADS_ID)   
    UNION SELECT DISTINCT J.ADS_ID,J.ADS_STATUS,J.ADS_LATEST_UPDATE_DATE ,J.ADS_PUBLISH_DATE,J.ADS_TITLE,J.ADS_PRICE,   
    J.ADS_DESCP,J.ADS_LOC,J.ADS_AREA,J.ADS_CAT,IJ.IMAGE_NAME,U.USER_NAME ,C.CAT_NAME,FAV.FAV_ADDED_DATE,AB.ABBR_NAME AS SUB_INFO
    FROM ADS_JOB J    
    INNER JOIN IMAGE_JOB IJ ON (J.ADS_ID=IJ.ADS_ID)    
    INNER JOIN USER U ON(U.USER_ID=J.USER_ID)    
    INNER JOIN CATEGORY C ON(C.CAT_VALUE=J.ADS_CAT)  
    INNER JOIN FAVOURITE FAV ON(FAV.ADS_ID=J.ADS_ID)
    INNER JOIN ABBR AB ON(AB.ABBR_VALUE=J.JOB_CONTRACT_TYPE)  
    AND IJ.IMAGE_STATUS='ACTIVE'    
    WHERE FAV.USER_ID ='$myID' 
    GROUP BY (J.ADS_ID)   
    ORDER BY FAV_ADDED_DATE DESC";
$r1=mysqli_query($conn,$q1);

//echo 'q1: '.$q1.'<br/>';

echo '<div id="grid-view" class="tab-pane fade active show">
<div class="row">';
    $favourite="false";
    $i=0;

    if ( mysqli_num_rows($r1)> 0){
        while($row = mysqli_fetch_assoc($r1)){
            $ads_id = $row['ADS_ID'];
            $name = $row ['ADS_TITLE'];
            $name = str_replace( '"',"'", $name);
            $image = $row['IMAGE_NAME'];
            $price = $row['ADS_PRICE'];
            if($price=='0'){
                $free="true";
                $price="FREE";
            }else{
                $free="false";
            }
            $price=str_ireplace('.00','',$price);
            $descp = $row['ADS_DESCP'];
            $loc = $row['ADS_LOC'];
            if($loc=='ou'||$loc=='op'||$loc=='ou'){
                $loc = $row['ADS_AREA'];
            }
            $cat = $row['CAT_NAME'];
            //  $cat = strtok($cat, " ");
            $cat_value=$row['ADS_CAT'];
            $date = date("j M y",strtotime($row['ADS_LATEST_UPDATE_DATE']));
            $seller = $row ['USER_NAME'];
            $sub=$row['SUB_INFO'];
            $favourite="true";

            echo '<form action="ads-details.php" class="col-xs-6 col-lg-4" method="GET">';            
            echo '<button type="submit" class=" filterDiv" name="adsID" value="';
            echo $ads_id;
            echo '"><div class="feature-container"><div class="featured-box">
            <div class="featured-box" style="margin-top:0;">
            <div class="img-1">
            <div class="img-2">
            <img class="img-fluid" src="img/product/';
            echo $image;
            echo '" alt="">
            </div>
            </div>
            
            <div class="feature-content">
            <div class="product">
            <a href="category.php?cat='.$cat_value.'"><i class="lni-folder"></i> ';
            echo $cat;
            echo '</a>
            </div>
            <h4>';
            echo $ads_id;
            echo '</h4>
            <ul class="address">
            <li>
            <a href="#"><i class="lni-map-marker"></i> ';
            echo $loc;
            echo '</a>
            </li>
            <li>
            <a href="#"><i class="lni-alarm-clock"></i> ';
            echo $date.'</a></li>';
            echo '<li style="float:right;">';
            
            if(strpos($cat_value, 'accommodation') !== false)
            echo '<i class="lni-users" style="font-size: 15px;margin-right:3px;"></i>';
            else
            echo '<i class="lni-package"></i> ';
            echo $sub.'
            </li>
            </ul>';
            echo '<div class="listing-bottom">
            <h3 class="price float-left">';
            if($free!='true'){
                echo 'RM ';}
            echo $price.'</h3>';
            echo '<div style="text-align:right;color: #999;">';

            if($favourite==="false"){
                echo '<i onClick="addFav(\''.$ads_id.'\',\''.$myID.'\',event,\''.$i.'\')" class="favIcon_'.$i.' favIcon lni-heart" id="favIcon_'.$i.'" ></i>';
            } else if($favourite==="true"){
                echo '<i onClick="removeFav(\''.$ads_id.'\',\''.$myID.'\',event,\''.$i.'\')" class="favIcon_'.$i.' favIcon lni-heart-filled" id="favIcon_'.$i.'"></i>';
            }
            
            echo '</div></div>
            </div>
            </div>
            </div>
            </div>
            </button>
            </form>';
            $i++;

        }      
    }
    else{
        echo '<h6 style="text-align: center;position: absolute;width: 100%;  ">Is there really nothing you like in Usmers\'?</h6>';
    }
 
echo' </div>
    </div>';
?>


</div>
</div>
</div>

</div>
</div>
</div>


<?php
include  'footer.php';
?>

<a href="#" class="back-to-top">
<i class="lni-chevron-up"></i>
</a>
<div id="snackbar"></div>
<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>

<script>
    function addFav(adsID,myID,event,i){
        event.preventDefault();
        $adsID=adsID;
        $myID=myID;
        $i=i;
        $.ajax({
            url: 'editFav.php',
            type: 'POST',
            data: {
                adsID: adsID,
                myID:myID,
                action: 'addFav',           
            },
            success: function(data) {
                $("#favIcon_"+$i).toggleClass("lni-heart lni-heart-filled");
                document.getElementById( "favIcon_"+$i ).setAttribute( "onClick", "removeFav('"+$adsID+"','"+$myID+"',event,,'"+$i+"')" );
               //alert('Added to Favourite-'+$adsID+ 'data:'+data);
               popup("add");          
            },
            error: function(){
                //x.classList.toggle("lni-heart");
                alert('Something wrong, please try again later.');
            },
        });      
    }

    function removeFav(adsID,myID,event,i){
        event.preventDefault();
        $adsID=adsID;
        $myID=myID;
        $i=i;
        $.ajax({
            url: 'editFav.php',
            type: 'POST',
            data: {
                adsID: adsID,
                myID:myID,
                action: 'removeFav',           
            },
            success: function(data) {
                $("#favIcon_"+$i).toggleClass("lni-heart lni-heart-filled");
                document.getElementById( "favIcon_"+$i ).setAttribute( "onClick", "addFav('"+$adsID+"','"+$myID+"',event,'"+$i+"')" );
                //alert('Remove from Favourite-'+$adsID+ 'data:'+data);
                popup("remove");                        
            },
            error: function(){
                //x.classList.toggle("lni-heart");
                alert('Something wrong, please try again later.');
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
<script src="js/form-validator.min.js"></script>
<script src="js/contact-form-script.min.js"></script>
<script src="js/summernote.js"></script>
</body>
</html>