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

<link rel="stylesheet" type="text/css" href="css/messages.css">

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

<div id="content " class="section-padding ">
<div class="container">
<div class="row">

<div class="col-sm-12 col-md-8 col-lg-12 inner-box ">
  <div class="page-content ">
    <div class=" row offers-messages">
    <section class="users col-lg-4">
      <div class="dashboardboxtitle">
        <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="lni-search"></i></button>
        </div>
      </div>
      <div class="users-list">

      </div>
    </section>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 chatBox">
    <section class="chat-area">
      <?php
        if(isset($_GET['from'])) {
      ?>
      <div class="dashboardboxtitle msgTitle">
        <?php 
        $user_id = mysqli_real_escape_string($conn, $_GET['from']);
        // if($user_id==null||$user_id==''||$user_id=='null') $user_id='0';
        $sql = mysqli_query($conn, "SELECT * FROM user LEFT JOIN AVATAR ON (AVATAR.AVATAR_ID=USER.AVATAR_ID) WHERE USER_ID = {$user_id}");
        if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $avatar=$row['AVATAR_NAME'];
          if($avatar!=null){
          $avatarLink="img/avatar/".$avatar;
          }else{
          $avatarLink="img/author/avatar.jpg";
          }

          if($row['USER_ID']===$_SESSION['userID']){
            $name=$row['USER_NAME']." (me)";
          }else{
              $name=$row['USER_NAME'];
          }

        }else{
        header("location: web/users.php");
        }
        ?>
        <a href="web-messages.php" class="back-icon"><i class="lni-chevron-left"></i></a>
        <button class="msgUser" onclick="visitUser('<?php echo $row['USER_ID']; ?>')"><img src="<?php echo $avatarLink; ?>" alt=""></button>
        <div class="details">
        <button class="msgUser" onclick="visitUser('<?php echo $row['USER_ID']; ?>')"><span><?php echo $name; ?></span></button>
        <p><?php echo 'ACTIVE'; ?></p>
        </div>
      </div>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php if($user_id==null||$user_id==''||$user_id=='null') echo  $user_id='0'; else echo  $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="lni-pointer icon-flip"></i></button>
      </form>
    </section>
    <?php 
        }else{
          echo '<div class="chat-box">
          <div class="start-msg">
                  <div class="start-content"><i class="lni-comments"></i></div>
                  <div class="start-content">Start Chatting!</div>
                  </div>
          </div>';
        }
    ?>
    </div>

    </div>
  </div>
</div>

</div>
</div>
</div>

<?php
    include 'footer.php';
    mysqli_close($conn);
?>

<a href="#" class="back-to-top">
<i class="lni-chevron-up"></i>
</a>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>

<script>
function visitUser(id){
  location.href = "profile.php?userID="+id;
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
<script src="web/js/users.js"></script>
<script src="web/js/chat.js"></script>

</body>
</html>