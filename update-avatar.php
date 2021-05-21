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
        <img src="img/avatar/<?php echo $avatar;?>" alt="<?php echo $useremail; ?>">
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
<h2 class="dashbord-title">Profile Avatar</h2>
</div>
<div class="dashboard-wrapper">
<form role="form" class="updateAvatar-form" name="updateAvatar" action="postSubmit.php" method="POST" onsubmit="return updateProfileVal()" enctype="multipart/form-data" >
<?php
    $sesEmail=$_SESSION["userEmail"];

    $userSQL ="SELECT * FROM `USER` 
    LEFT JOIN AVATAR ON (AVATAR.AVATAR_ID=USER.AVATAR_ID)
    WHERE USER_EMAIL='$sesEmail'";
    $userResult=mysqli_query($conn,$userSQL);

        while($row = mysqli_fetch_assoc($userResult)){
            $avatar = $row['AVATAR_NAME'];
            $avatarID=$row['AVATAR_ID'];

        }
        if($avatar==null){
            $avatarID=0;
        }
?>
        <div class="form-group mb-3">
        <label class="control-label">Current Avatar</label>
        <figure>
        <span class="img-div avatar">
            <?php if($avatar!=null){?>
                <img src="img/avatar/<?php echo $avatar;?>" alt="<?php echo $useremail; ?>">
            <?php }else{?>
                <img src="img/author/avatar.jpg">
            <?php }?>
            </span>
        </figure>
        </div>
<hr>
        <div class="form-group mb-3">
        <label class="control-label">New Avatar</label>
        <figure>
            <span class="img-div"  onClick="triggerClick()">
            <span class="editicon"><i class="lni-pencil"></i> Edit</span> 

            <img src="img/author/avatar.jpg" onClick="triggerClick()" id="profileDisplay">
            </span>
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
        </figure>
        <span class="required error" id="username-info"></span>
        </div>
        

        
        <div style="display: flex; justify-content: flex-end;">
        <button class="btn btn-cancel" type="button" id="cancelBtn">Cancel</button>
        <input class="btn btn-common" type="submit" name="updateAvatar_btn" id="updateAvatar_btn" value="Save Changes" style="background-color:#e90dc8">
        </div>
        <input name="avatarID" value="<?php echo $avatarID;?>" type="text" hidden>

       
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
<script src="js/avatar.js"></script>

</body>
</html>