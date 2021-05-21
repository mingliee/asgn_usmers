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

<!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
--></head>
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
<h2 class="product-title">My Ads</h2>
<ol class="breadcrumb">
<li><a href="#">Home /</a></li>
<li class="current">My Ads</li>
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
        $userID = $row ['USER_ID'];
        $avatar = $row['AVATAR_NAME'];

        $join = date("j M y g:i a",strtotime($row['CREATE_AT']));
        //$seller = $row ['USER_NAME'];
        
        if($whatsapp==null){
            $whatsapp="-";
        }
    }

?>

<div id="content" class="section-padding" style="padding-bottom:160px">
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
<a class="active" href="account-myads.php">
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
<a href="account-profile-setting.php">
<i class="lni-cog"></i>
<span>Profile Settings</span>
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
<div class="inner-box">
<div class="dashboard-box">
<h2 class="dashbord-title">My Ads</h2>
</div>
<div class="dashboard-wrapper">
<nav class="nav-table">
<ul>
<!-- <li class="active"><a href="#">All Ads (42)</a></li> -->
<!-- <li><a href="#">Published (88)</a></li>
<li><a href="#">Featured (12)</a></li>
<li><a href="#">Sold (02)</a></li>
<li><a href="#">Active (42)</a></li>
<li><a href="#">Expired (01)</a></li> -->
</ul>
</nav>

 <?php
    $userEmail=$_SESSION["userEmail"];

    /* $q1 ="SELECT * FROM `ADS` 
    INNER JOIN `IMAGE` ON  (IMAGE.ADS_ID=ADS.ADS_ID) 
    INNER JOIN `USER` ON  (USER.USER_ID=ADS.USER_ID) 
    INNER JOIN `CATEGORY` ON (ADS.ADS_CAT=CATEGORY.CAT_VALUE)
    WHERE user.USER_EMAIL ='$userEmail' 
    AND IMAGE.IMAGE_STATUS='ACTIVE'
    GROUP BY (ADS.ADS_ID) 
    ORDER BY `ADS_PUBLISH_DATE` DESC"; */

    $q1="SELECT DISTINCT  I.ADS_ID,I.ADS_STATUS,I.ADS_LATEST_UPDATE_DATE,I.ADS_PUBLISH_DATE,I.ADS_TITLE,I.ADS_PRICE,   
    I.ADS_DESCP,I.ADS_LOC,I.ADS_AREA,I.ADS_CAT,II.IMAGE_NAME,U.USER_NAME,C.CAT_NAME 
    FROM ADS_ITEM I    
    INNER JOIN IMAGE_ITEM II ON (I.ADS_ID=II.ADS_ID)    
    INNER JOIN USER U ON(U.USER_ID=I.USER_ID)    
    INNER JOIN CATEGORY C ON(C.CAT_VALUE=I.ADS_CAT)   
    WHERE U.USER_EMAIL ='$userEmail' 
    AND II.IMAGE_STATUS='ACTIVE' 
    AND I.ADS_STATUS <> 'DELETED'
    GROUP BY (I.ADS_ID)   
    UNION SELECT DISTINCT    
    A.ADS_ID,A.ADS_STATUS,A.ADS_LATEST_UPDATE_DATE ,A.ADS_PUBLISH_DATE,A.ADS_TITLE,A.ADS_PRICE,A.ADS_DESCP,A.ADS_LOC,   
    A.ADS_AREA,A.ADS_CAT,IA.IMAGE_NAME,U.USER_NAME ,C.CAT_NAME 
    FROM ADS_ACCOM A    
    INNER JOIN IMAGE_ACCOM IA ON (A.ADS_ID=IA.ADS_ID)    
    INNER JOIN USER U ON(U.USER_ID=A.USER_ID)    
    INNER JOIN CATEGORY C ON(C.CAT_VALUE=A.ADS_CAT) 
    WHERE U.USER_EMAIL ='$userEmail' 
    AND IA.IMAGE_STATUS='ACTIVE'   
    AND A.ADS_STATUS <> 'DELETED'
    GROUP BY (A.ADS_ID)   
    UNION SELECT DISTINCT J.ADS_ID,J.ADS_STATUS,J.ADS_LATEST_UPDATE_DATE ,J.ADS_PUBLISH_DATE,J.ADS_TITLE,J.ADS_PRICE,   
    J.ADS_DESCP,J.ADS_LOC,J.ADS_AREA,J.ADS_CAT,IJ.IMAGE_NAME,U.USER_NAME ,C.CAT_NAME
    FROM ADS_JOB J    
    INNER JOIN IMAGE_JOB IJ ON (J.ADS_ID=IJ.ADS_ID)    
    INNER JOIN USER U ON(U.USER_ID=J.USER_ID)    
    INNER JOIN CATEGORY C ON(C.CAT_VALUE=J.ADS_CAT)  
    WHERE U.USER_EMAIL ='$userEmail'
    AND IJ.IMAGE_STATUS='ACTIVE'    
    AND J.ADS_STATUS <> 'DELETED'
    GROUP BY (J.ADS_ID)   
    ORDER BY ADS_LATEST_UPDATE_DATE DESC";

    $r1=mysqli_query($conn,$q1);    
echo 'num of ads: '.mysqli_num_rows($r1);

    if ( mysqli_num_rows($r1)> 0){
        echo '<table class="table table-responsive dashboardtable tablemyads">
        <thead>
        <tr>
        <!--
        <th>
        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="checkedall">
        <label class="custom-control-label" for="checkedall"></label>
        </div>
        </th>
        -->
        <th>Photo</th>
        <th>Title</th>
        <th>Category</th>
        <th>Ad Status</th>
        <th>Price</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>';
        echo '<tr data-category="active">';
        /*
        <td>
        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="adone">
        <label class="custom-control-label" for="adone"></label>
        </div>
        </td>
*/
    while($row = mysqli_fetch_assoc($r1)){

        $ads_id = $row['ADS_ID'];
        $ads_status = $row['ADS_STATUS'];
        $name = $row ['ADS_TITLE'];
        $name = str_replace( '"',"'", $name);
        $image = $row['IMAGE_NAME'];
        $price = $row['ADS_PRICE'];
        $descp = $row['ADS_DESCP'];
        $loc = $row['ADS_LOC'];
        $cat = $row['CAT_NAME'];
       // $cat = strtok($cat, " ");
        $date = date("j M y",strtotime($row['ADS_PUBLISH_DATE']));
        $seller = $row ['USER_NAME'];

        if($ads_status=='ACTIVE'){
           $adsSpan='adstatusactive';
        } else if($ads_status=='INACTIVE'){
         $adsSpan='adstatusinactive';
        } else if($ads_status=='DELETED'){
         $adsSpan='adstatusdeleted';
        } else if($ads_status=='SOLD'){
         $adsSpan='adstatussold';
        } else if($ads_status=='RESERVED'){
         $adsSpan='adsonhold';
        }

        
        echo '<td class="photo">
        <div class="img-1">
        <div class="img-4">
        <img class="img-fluid" src="img/product/';     
        echo $image;
        echo '" alt="'.$ads_id.'">
        </div>
        </div>
        </td>
        <td data-title="Title">
        <a href="ads-details.php?adsID='.$ads_id.'"><h3>'.$name;    
        echo '</h3>
        <span>ID: '.$ads_id.'</span>
        </td></a>';
        echo '<td data-title="Category"><span class="adcategories">';
        echo $cat.'</span></td>
        <td data-title="Ad Status"><span class="adstatus '.$adsSpan.'">'.$ads_status.'</span></td>
        <td data-title="Price">
        <h3>RM ';
        echo $price.'</h3>
        </td>';
        echo '<td data-title="Action">
        <div class="btns-actions">
       <!-- <a class="btn-action btn-view" href="ads-details.php?adsID=';
        echo $ads_id;
        echo '">
        <i class="lni-eye"></i></a>-->';
        if($ads_status=='ACTIVE'||$ads_status=='INACTIVE'||$ads_status=='RESERVED'){ 
            echo '<a class="btn-action btn-edit" href="update-ads.php?adsID=';
            echo $ads_id;
            echo '"><i class="lni-pencil"></i></a>';
            echo '<div class="btn-action btn-delete " onClick="confirmation(\''.$ads_id.'\')">
            <i class="lni-trash"></i></div>';
         }
        echo '</div>
        </td>
         </tr>';

    }
}
else{
    echo '<h6 style="text-align: center;width: 100%;  ">Start <a href="post-ads.php">Posting Ad</a>!</h6>';
}
 
 ?>

</tbody>
</table>
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

<div id="snackbar"></div>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>

<script type="text/javascript">
/*
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("ads_id");
        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: 'delete.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Record removed successfully");  
               }
            });
        }
    });
*/
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
                    location.reload();
                    popup("delete");      
               }
            });
      }
    }

    function popup(action){
        var action=action;
        // Get the snackbar DIV
        var x = document.getElementById("snackbar");

        // Add the "show" class to DIV
        x.className = "show";

        if(action=="delete"){
            document.getElementById("snackbar").innerHTML = "Delete Ad Success";
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