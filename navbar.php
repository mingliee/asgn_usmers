<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link media="all" type="text/css" rel="stylesheet" href="admin/assets/plugins/@mdi/font/css/materialdesignicons.min.css">

<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
<div class="container">

<div class="navbar-header">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
<span class="lni-menu"></span>
<span class="lni-menu"></span>
<span class="lni-menu"></span>
</button>
<div class="navbar-brand">
    <a href="main.php" ><img src="img/logo.png" id="usmers-logo" class="usmers-logo" alt=""></a>

</div>
</div>
<div class="collapse navbar-collapse" id="main-navbar">
<ul class="navbar-nav mr-auto">
<li class="nav-item">
<a class="nav-link" href="about.php">
About Us
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="faq.php">
FAQ
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="rules.php">
Rules
</a>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Contact Us
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="support.php">Support</a>
<a class="dropdown-item" href="report.php">Report</a>

</div>
</li>

</ul>

<ul class="sign-in">
<!-- <li class="nav-item dropdown">
<a class="noti noti-dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class=" mdi mdi-bell"></i></a>
<ul class="noti-dropdown-menu"></ul>
</li> -->
<li class="nav-item dropdown">
        <!-- <a class="count-indicator noti noti-dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
             <i class=" mdi mdi-bell"></i>
          <span class="count-symbol bg-danger"></span>
        </a> -->
        <div class="dropdown-noti dropdown-menu navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <h6 class="p-1 mb-0">Notifications</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
              <span>time</span>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <p class="text-gray ellipsis mb-0"> Update dashboard </p>
              <span>time</span>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <p class="text-gray ellipsis mb-0"> New admin wow! </p>
              <span>time</span>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <h6 class="p-1 mb-0 text-center">See all notifications</h6>
        </div>
      </li>
</ul>

<ul class="sign-in">
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="lni-user"></i> My Account</a>
<div class="dropdown-menu">
<?php if($_SESSION['admin']=='1'){ ?>
<a class="dropdown-item" href="admin/dashboard.php"><i class="lni-shuffle"></i> ADMIN</a>
<?php } ?>
<a class="dropdown-item" href="web-messages.php"><i class="lni-comments"></i> Messages</a>
<a class="dropdown-item" href="account-myads.php"><i class="lni-layers"></i> My Ads</a>
<a class="dropdown-item" href="account-favourite-ads.php"><i class="lni-heart"></i> My Favourites</a>
<a class="dropdown-item" href="account-profile-setting.php"><i class="lni-cog"></i> Profile Setting</a>
<a class="dropdown-item" href="profile.php?userID=<?php echo $userID;?>"><i class="lni-eye"></i> View As</a>
<a class="dropdown-item" href="logout.php"><i class="lni-exit icon-flip"></i> Log Out</a>
</div>
</li>
</ul>
<?php if($_SESSION['revoked']=='0'){ ?>
<a class="tg-btn" href="post-ads.php">
<?php }else{ ?> 
<a class="tg-btn-inactive">
<?php } ?>
<i class="lni-pencil-alt"></i> Post New Ad
</a>

</div>
</div>

<ul class="mobile-menu">
<?php if($_SESSION['admin']=='1'){ ?>
    <a href="admin/dashboard.php">ADMIN</a>
<?php } ?>
<?php if($_SESSION['revoked']=='0'){ ?>
<li>
    <a href="post-ads.php">Post New Ad</a>
</li>
<?php }else{ ?>
<li onclick="display()">
    <a>Post New Ad</a>
</li>
<?php } ?>
<li>
<a>My Account</a>
<ul class="dropdown">
<li><a href="messages.php"><i class="lni-comments"></i> Messages</a></li>
<li><a href="account-myads.php"><i class="lni-layers"></i> My Ads</a></li>
<li><a href="account-favourite-ads.php"><i class="lni-heart"></i> My Favourites</a></li>
<li><a href="account-profile-setting.php"><i class="lni-cog"></i> Profile Setting</a></li>
<li><a class="dropdown-item" href="profile.php?userID=<?php echo $userID;?>"><i class="lni-eye"></i> View As</a></li>
</ul>
</li>
<li>
<a href="about.php">About Us</a>
</li>
<li>
<a href="#">
Contact Us
</a>
<ul class="dropdown">
<li><a href="support.php">Support</a></li>
<li><a href="report.php">Report</a></li>
</ul>
</li>
<li>
<a href="rules.php">Rules</a>
</li>
<li>
<a href="faq.php">FAQ</a>
</li>
<li><a href="logout.php">Log Out</a></li>
</ul>

</nav>

<script>
$(function () { 
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) { 
            $('.navbar-header .navbar-brand img').attr('src','img/logo-p.png');
        }
        if ($(this).scrollTop() < 100) { 
            $('.navbar-header .navbar-brand img').attr('src','img/logo.png');
        }
    })
});

</script>
<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.noti-dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '.noti-dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>

<script src="js/alert.js"></script>