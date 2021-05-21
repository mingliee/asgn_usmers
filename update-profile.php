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

<link rel="stylesheet" type="text/css" href="css/main.css">

<link rel="stylesheet" type="text/css" href="css/responsive.css">

<link rel="stylesheet" type="text/css" href="css/login.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
<h2 class="product-title">Profile Setting</h2>
<ol class="breadcrumb">
<li><a href="#">Home /</a></li>
<li class="current">Profile Setting</li>
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
        WHERE USER_EMAIL='$sesEmail'";
    $userResult=mysqli_query($conn,$userSQL);

        while($row = mysqli_fetch_assoc($userResult)){
        $username=$row['USER_NAME'];
        $useremail = $row['USER_EMAIL'];
        $user_status=$row['USER_STATUS'];
        $whatsapp = $row ['WHATSAPP'];
        $avatar = $row['AVATAR_NAME'];

        $join = date("j M y g:i a",strtotime($row['CREATE_AT']));
        //$seller = $row ['USER_NAME'];
        
        if($whatsapp==null){
            $whatsapp="-";
        }
    }
?>
<div id="content" class="section-padding">
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
<a href="account-favourite-ads.php">
<i class="lni-heart"></i>
<span>My Favourites</span>
</a>
</li>
<li>
<a class="active" href="account-profile-setting.php">
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
<div class="col-sm-12 col-md-8 col-lg-9">
<div class="row page-content">

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="inner-box">
 <div class="tg-contactdetail">
<div class="dashboard-box">
<h2 class="dashbord-title">Profile Info</h2>
</div>
<div class="dashboard-wrapper">
<form role="form" class="updateProfile-form" name="updateProfile" action="postSubmit.php" method="POST" onsubmit="return updateProfileVal()" >
<?php
    $sesEmail=$_SESSION["userEmail"];

    $userSQL ="SELECT * FROM `USER` 
    INNER JOIN LOCATION ON (LOC_VALUE=USER.ADDRESS) 
    WHERE USER_EMAIL='$sesEmail'";
    $userResult=mysqli_query($conn,$userSQL);

        while($row = mysqli_fetch_assoc($userResult)){
        $username=$row['USER_NAME'];
        $useremail = $row['USER_EMAIL'];
        $user_status=$row['USER_STATUS'];
        $whatsapp = $row ['WHATSAPP'];
        $whatsapp = substr($whatsapp, 1);
        $addVal = $row['LOC_VALUE'];
        $address = $row ['LOC_NAME'];
        $area = $row ['AREA'];
        $school = $row ['SCHOOL'];

        $join = date("j M y g:i a",strtotime($row['CREATE_AT']));
        //$seller = $row ['USER_NAME'];
        }
?>
        <div class="form-group mb-3">
        <label class="control-label">Username*</label>
        <input class="input_cred" name="username" id="username" type="text" value="<?php echo $username; ?>">
        <span class="required error" id="username-info"></span>
        </div>
        <div class="form-group mb-3">
        <label class="control-label">Email Address*</label>
        <div class=" input_cred not-allowed" name="email" type="text"><?php echo $useremail; ?></div>
        <input hidden name="user_email" id="user_email" value="<?php echo $useremail; ?>"/>
        </div>
        <div class="form-group mb-3">
        <label class="control-label">Whats App Phone Number*  (Eg: 0123456789)</label>
        <input class="input_cred" name="phone" id="phone" type="text" value="<?php echo $whatsapp; ?>">
        <span class="required error" id="phone-info"></span>
        </div>

        <div class="form-group mb-3 tg-inputwithicon">
        <label class="control-label">USM School*</label>
        <div class="tg-select form-control">
        <select class="form-ad valid" name="school" id="school" class="school" sel_id aria-required="true" aria-invalid="false" style="padding-left: 12px">
                <option value="none">Select School or Position</option>
                 <?php 
                    $q3 = "SELECT * FROM SCHOOL ORDER BY SCHOOL_ID ASC";
                    $r3 = mysqli_query($conn,$q3);
                    
                    while($sch= mysqli_fetch_array($r3)){
                        if($sch['SCHOOL_VALUE'] == 'none'){
                            echo '<option title="item" value="'.$sch['SCHOOL_VALUE'].'"';
                            echo ' style="background-color:#dcdcc3;font-weight:bold;color:#000000;" disabled>
                            '.$sch['SCHOOL_NAME'].'</option>';

                        }else if($sch['SCHOOL_VALUE'] == $school){
                            echo '<option value="'.$sch['SCHOOL_VALUE'].'" selected>';
                            echo $sch['SCHOOL_NAME'].' </option>';

                        }else{
                            echo '<option value="'.$sch['SCHOOL_VALUE'].'">';
                            echo $sch['SCHOOL_NAME'].'</option>';
                        }
                    }
                    //$loca=$row['ADS_LOC'];
                    //echo"<script>alert('loca: '+$sch['SCHOOL_VALUE'])</script>";
                ?>
            
            </select> 
        </div>
        <span class="required error" id="school-info"></span>
        </div>

        <div class="form-group mb-3 tg-inputwithicon">
        <label class="control-label">USM Hostel*</label>
        <div class="tg-select form-control" id="location_div">
        <select class="form-ad valid" name="loc" id="loc" class="location" sel_id aria-required="true" aria-invalid="false" style="padding-left: 12px" onchange="showDiv(this)">
                <option value="none">Select USM Hostel</option>
               
                 <?php 
                    $q2 = "SELECT * FROM LOCATION ORDER BY LOC_ID ASC";
                    $r2 = mysqli_query($conn,$q2);

                    while($loc= mysqli_fetch_array($r2)){
                        if($loc['LOC_VALUE'] == 'none'){
                            echo '<option title="item" value="'.$loc['LOC_VALUE'].'"';
                            echo ' style="background-color:#dcdcc3;font-weight:bold;color:#000000;" disabled>
                            '.$loc['LOC_NAME'].'</option>';

                        }else if($loc['LOC_VALUE'] == $addVal){
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
        <span class="required error" id="loc-info"></span>
        </div>

        <div class="form-group mb-3 tg-inputwithicon item-area" id="other_loc_div" style="display:<?php if($addVal=="ou"||$addVal=="op"||$addVal=="o") echo 'block'; else echo 'none';?>">
            <label class="control-label">Other Address*</label>
            <input class="form-control input-md" name="other_loc" id="other_loc" placeholder="Location" type="text" value="<?php echo $area; ?>">
            <span class="required error" id="area-info"></span>
        </div>

        
        <div style="display: flex; justify-content: flex-end;">
        <button class="btn btn-cancel" type="button" id="cancelBtn">Cancel</button>
        <input class="btn btn-common" type="submit" name="updateProfile_btn" id="updateProfile_btn" value="Save Changes" style="background-color:#e90dc8">
        </div>

       
</form>



</div>
</div>
</div>
</div>
</div>
</div>
</div>
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
function showDiv(select){
    if(select.value=='ou'||select.value=='op'||select.value=='o'){
        document.getElementById('other_loc_div').style.display = "block";
    } else{
        document.getElementById('other_loc_div').style.display = "none";
    }
}

var btn = document.getElementById('cancelBtn');
    btn.addEventListener('click', function() {
    document.location.href = 'account-profile-setting.php';
    });
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
</body>
</html>