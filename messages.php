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

<div class="col-sm-12 col-md-8 col-lg-12 ">
<div class="page-content ">
<div class="inner-box chatpg">

<div class="dashboard-wrapper ">

<div id="frame">		
				<div id="sidepanel">
					<div id="profile">
					<?php
                    $sesEmail=$_SESSION["userEmail"];

                    $userSQL ="SELECT * FROM `USER` 
                    INNER JOIN SCHOOL ON (USER.SCHOOL=SCHOOL.SCHOOL_VALUE)
                    INNER JOIN LOCATION ON (LOCATION.LOC_VALUE=USER.ADDRESS) 
                    LEFT JOIN AVATAR ON (AVATAR.AVATAR_ID=USER.AVATAR_ID)
                    WHERE USER_EMAIL='$sesEmail'";
                    $userResult=mysqli_query($conn,$userSQL);

                    echo '<div class="wrap">';
					while($row = mysqli_fetch_assoc($userResult)){ 
						echo '<img id="profile-img" src="img/author/avatar.jpg" class="online" alt="" />';
						echo  '<p>'.$row['USER_NAME'].'</p>';
							echo '<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>';
							echo '<div id="status-options">';
							echo '<ul>';
								echo '<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>';
								echo '<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>';
								echo '<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>';
								echo '<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>';
							echo '</ul>';
							echo '</div>';
							echo '<div id="expanded">';			
							echo '<a href="logout.php">Logout</a>';
							echo '</div>';
					}
					echo '</div>';
					?>
					</div>
					<div id="search">
						<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
						<input type="text" placeholder="Search contacts..." />					
					</div>
					<div id="contacts">	
					<?php
					echo '<ul>';
					$sesEmail=$_SESSION["userEmail"];
                    $sesID=$_SESSION["userID"];

                    $userSQL ="SELECT * FROM `MESSAGE` 
                    INNER JOIN USER ON (USER.USER_ID=MESSAGE.RECEIVER_ID)
                    LEFT JOIN AVATAR ON (AVATAR.AVATAR_ID=USER.AVATAR_ID)
                    WHERE MESSAGE.SENDER_ID='$sesID'
                    GROUP BY ROOM_ID";
                    $userResult=mysqli_query($conn,$userSQL);

					while($row = mysqli_fetch_assoc($userResult)) {
						$status = 'offline';						
/* 						if($user['online']) {
							$status = 'online';
						} */
						$activeUser = '';
/* 						if($row ['USER_ID'] == $currentSession) {
							$activeUser = "active";
						} */
						echo '<li id="'.$row ['USER_ID'].'" class="contact '.$activeUser.'" data-touserid="'.$row ['USER_ID'].'" data-tousername="'.$row['USER_NAME'].'">';
						echo '<div class="wrap">';
						echo '<span id="status_'.$row ['USER_ID'].'" class="contact-status '.$status.'"></span>';
						echo '<img src="img/author/avatar.jpg" alt="" />';
						echo '<div class="meta">';
						echo '<p class="name">'.$row['USER_NAME'].'<span id="unread_'.$row ['USER_ID'].'" class="unread">1</span></p>';
						echo '<p class="preview"><span id="isTyping_'.$row ['USER_ID'].'" class="isTyping"></span></p>';
						echo '</div>';
						echo '</div>';
						echo '</li>'; 
					}
					echo '</ul>';
					?>
					</div>
					<div id="bottom-bar">	
						<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
						<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>					
					</div>
				</div>			
				<div class="content" id="content"> 
					<div class="contact-profile" id="userSection">	
					<?php
                    $userSQL ="SELECT * FROM `USER` 
                    INNER JOIN SCHOOL ON (USER.SCHOOL=SCHOOL.SCHOOL_VALUE)
                    INNER JOIN LOCATION ON (LOCATION.LOC_VALUE=USER.ADDRESS) 
                    LEFT JOIN AVATAR ON (AVATAR.AVATAR_ID=USER.AVATAR_ID)
                    WHERE USER_EMAIL='$sesEmail'";
                    $userResult=mysqli_query($conn,$userSQL);

					$userDetails = $chat->getUserDetails($currentSession);
					foreach ($userDetails as $user) {										
						echo '<img src="img/author/img1" alt="" />';
							echo '<p>'.$row['USER_NAME'].'</p>';
							echo '<div class="social-media">';
								echo '<i class="fa fa-facebook" aria-hidden="true"></i>';
								echo '<i class="fa fa-twitter" aria-hidden="true"></i>';
								 echo '<i class="fa fa-instagram" aria-hidden="true"></i>';
							echo '</div>';
					}	
					?>						
					</div>
					<div class="messages" id="conversation">		
					<?php
					echo $chat->getUserChat($_SESSION['userid'], $currentSession);						
					?>
					</div>
					<div class="message-input" id="replySection">				
						<div class="message-input" id="replyContainer">
							<div class="wrap">
								<input type="text" class="chatMessage" id="chatMessage<?php echo $currentSession; ?>" placeholder="Write your message..." />
								<button class="submit chatButton" id="chatButton<?php echo $currentSession; ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>	
							</div>
						</div>					
					</div>
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
    include 'footer.php';
    mysqli_close($conn);
?>

<a href="#" class="back-to-top">
<i class="lni-chevron-up"></i>
</a>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>


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
<script src="js/messages.js"></script>

</body>
</html>