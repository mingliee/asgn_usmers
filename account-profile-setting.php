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

</head>
<body>

<header id="header-wrap">

<?php
include  'navbar.php';
?>

</header>
<script>
     $(document).ready(function(){
        var scrollTo = getParameterByName('change');
          if(scrollTo!=''){
              $('html, body').animate({
                 scrollTop: $("#chgPswdDiv").offset().top -50
               }, 1000);
          }
      /* if (window.location.hash == "#chgPswd") {
        $('html, body').animate({
           scrollTop: $("#chgPswdDiv").offset().top
         }, 1000);
      } */

      function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
   });
</script>

<div class="page-header" style="background: url(img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Profile Settings</h2>
<ol class="breadcrumb">
<li><a href="#">Home /</a></li>
<li class="current">Profile Settings</li>
</ol>
</div>
</div>
</div>
</div>
</div>

<?php
require 'config.php';

    $sesEmail=$_SESSION["userEmail"];

    $userSQL ="SELECT * FROM `USER` 
    INNER JOIN SCHOOL ON (USER.SCHOOL=SCHOOL.SCHOOL_VALUE)
    INNER JOIN LOCATION ON (LOCATION.LOC_VALUE=USER.ADDRESS) 
    LEFT JOIN AVATAR ON (AVATAR.AVATAR_ID=USER.AVATAR_ID)
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
        $school = $row ['SCHOOL_NAME'];
        $userID = $row ['USER_ID'];
        $avatar = $row['AVATAR_NAME'];

        $join = date("j M y g:i a",strtotime($row['CREATE_AT']));
        //$seller = $row ['USER_NAME'];
        
        if($whatsapp==null){
            $whatsapp="-";
        }
        if($address==null){
            $address="-";
        }
        if($area==null){
            $area="-";
        }
        if($school==null){
            $school="-";
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
            <a href="update-avatar.php">
                <span class="img-div">
                    <?php if($avatar!=null){?>
                        <img src="img/avatar/<?php echo $avatar;?>" alt="<?php echo $useremail; ?>" id="profileDisplay">
                    <?php }else{?>
                        <img src="img/author/avatar.jpg" onClick="triggerClick()" id="profileDisplay">
                    <?php }?>
                </span>
                <span class="bolticon"><i class="lni-pencil"></i> Edit</span> 
            </a>  
                   
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
<div class="row page-content fullpage" style="padding-top:0;" >

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="inner-box">
 <div class="tg-contactdetail">
<div class="dashboard-box">
<h2 class="dashbord-title">Profile Info</h2>
<?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
     if(strpos($fullUrl,"update=success")==true){
        echo "<div class='success-msg profile' id='success-msg'>Successfully Updated!</div>";
    } else if(strpos($fullUrl,"update=error")==true){
        echo "<div class='error-msg profile' id='error-msg'>Update Failed! Pleas Try Again Later.</div>";
    } 
    
    ?>
</div>
<div class="dashboard-wrapper">

        <div class="form-group mb-3">
        <label class="control-label">Username</label>
        <div class="input_cred" name="name" type="text" ><?php echo $username; ?></div>
        </div>
        <div class="form-group mb-3">
        <label class="control-label">Email Address</label>
        <div class=" input_cred" name="email" type="text" ><?php echo $useremail; ?></div>
        </div>
        <div class="form-group mb-3">
        <label class="control-label">Whats App Phone Number</label>
        <div class="input_cred" name="phone" type="text" ><?php echo $whatsapp; ?></div>
        </div>
        <div class="form-group mb-3">
        <label class="control-label">USM School</label>
        <div class="input_cred" name="school" type="text"><?php echo $school; ?></div>
        </div>
        <div class="form-group mb-3">
        <label class="control-label ">USM Hostel</label>
        <div class="input_cred" name="address" type="text"><?php echo $address; ?></div>
        </div>
        <?php 
            if($addVal=='ou'||$addVal=='op'||$addVal=='o'){
                echo '<div class="form-group mb-3">
                <label class="control-label">Other Address</label>
                <div class="input_cred form-control" name="other_loc" type="text">'.$area.'</div>
                </div>';
            }
        ?>
        
        <div style="display: flex; justify-content: flex-end;">
        <button class="btn btn-common" type="button" id="editBtn">Edit</button>
        </div>


</div>
</div>
</div>

<br>

<div class="inner-box"  id="chgPswdDiv">
 <div class="tg-contactdetail">
<div class="dashboard-box">
<h2 class="dashbord-title">Change Password</h2>
<?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
     if(strpos($fullUrl,"change=success")==true){
        echo "<div class='success-msg profile' id='success-msg'>Successfully Updated!</div>";
    } else if(strpos($fullUrl,"change=error")==true){
        echo "<div class='error-msg profile' id='error-msg'>Update Failed! Pleas Try Again Later.</div>";
    } else if(strpos($fullUrl,"change=incorrect")==true){
        echo "<div class='error-msg profile' id='error-msg'>Password incorrect.</div>";
    } 
    
    ?>
</div>
<div class="dashboard-wrapper">
<form role="form" class="chgPswd-form" name="chgPswd"  action="postSubmit.php" method="POST" onsubmit="return chgPswdVal()">
    <div class="form-group mb-3 tg-inputwithicon">
        <label class="control-label">Current</label>
        <input class="input_cred" name="user_pswd" id="user_pswd" type="password" >
        <span class="required error" id="pswd-info"></span>
    </div>

    <div class="form-group mb-3 tg-inputwithicon">
        <label class="control-label">New</label>
        <input class="input_cred" name="new_pswd" id="new_pswd" type="Password" >
        <span class="required error" id="new_pswd-info"></span>
    </div>

    <div class="form-group mb-3 tg-inputwithicon">
        <label class="control-label">Retype new</label>
        <input class="input_cred" name="retype_pswd" id="retype_pswd" type="password" >
        <span class="required error" id="retype_pswd-info"></span>
    </div>
    
    <div style="display: flex; justify-content: flex-end;">
    <input class="btn btn-common" type="submit" name="chgPswd_btn" id="chgPswd_btn" value="Save Changes" style="background-color:#e90dc8">
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
?>

<a href="#" class="back-to-top">
<i class="lni-chevron-up"></i>
</a>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>

<script>
    var btn = document.getElementById('editBtn');
        btn.addEventListener('click', function() {
        document.location.href = 'update-profile.php';
     });

</script>

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
<script src="js/avatar.js"></script>

</body>
</html>