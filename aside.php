<?php
    require_once("config.php");
    $sesEmail=$_SESSION["userEmail"];

    $userSQL ="SELECT * FROM `USER` WHERE USER_EMAIL='$sesEmail'";
    $userResult=mysqli_query($conn,$userSQL);

        while($row = mysqli_fetch_assoc($userResult)){
        $username=$row['USER_NAME'];
        $useremail = $row['USER_EMAIL'];
        $user_status=$row['USER_STATUS'];
        $whatsapp = $row ['WHATSAPP'];

        $join = date("j M y g:i a",strtotime($row['CREATE_AT']));
        //$seller = $row ['USER_NAME'];
        
        if($whatsapp==null){
            $whatsapp="-";
        }
    }

?>

<aside>
<div class="sidebar-box">
<div class="user">

<div class="usercontent">
<?php 
    echo '<h3>'.$username.'</h3>
    <h4>'.$useremail.'</h4>';

?>
</div>
</div>
<nav class="navdashboard">
<ul>
<li>
<a class="active" href="dashboard.php">
<i class="lni-dashboard"></i>
<span>Dashboard</span>
</a>
</li>
<li>
<a href="account-profile-setting.php">
<i class="lni-cog"></i>
<span>Profile Settings</span>
</a>
</li>
<li>
<a href="account-myads.php">
<i class="lni-layers"></i>
<span>My Ads</span>
</a>
</li>
<li>
<a href="messages.php">
<i class="lni-comments"></i>
<span>Offers/Messages</span>
</a>
</li>
<li>
<a href="account-favourite-ads.php">
<i class="lni-heart"></i>
<span>My Favourites</span>
</a>
</li>
<li>
<a href="privacy-setting.php">
<i class="lni-star"></i>
<span>Privacy Settings</span>
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