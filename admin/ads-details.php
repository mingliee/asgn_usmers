<?php
require 'session.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Usmers'</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="_token" content="vNliKe3kBOf8P7CJyd0WyRydE5fE4768siLrid6x">

  <link rel="shortcut icon" href="../img/icon.png" >
  <link rel="icon" href="../img/icon.png" >
  <!-- plugin css -->
  <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/@mdi/font/css/materialdesignicons.min.css">
  <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
  <!-- end plugin css -->

  <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
  <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/owl-carousel-2/assets/owl.carousel.min.css">
  <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/owl-carousel-2/assets/owl.theme.default.min.css">
  <!-- common css -->
  <link media="all" type="text/css" rel="stylesheet" href="css/app.css">
  <!-- end common css -->

</head>
<body>

<div class="container-scroller" id="app">
<?php
include 'header.php';
?>  

<div class="container-fluid page-body-wrapper">
  <div class="theme-setting-wrapper">
    <div id="color-settings" class="settings-panel">
    <i class="settings-close mdi mdi-close"></i>
      <div class="d-flex align-items-center justify-content-between border-bottom">
      <p class="settings-heading font-weight-bold border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Template Skins</p>
      </div>
      <div class="sidebar-bg-options selected" id="sidebar-light-theme">
      <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
      </div>
      <div class="sidebar-bg-options" id="sidebar-dark-theme">
      <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
      </div>
      <p class="settings-heading font-weight-bold mt-2">Header Skins</p>
      <div class="color-tiles mx-0 px-2">
      <div class="tiles primary"></div>
      <div class="tiles success"></div>
      <div class="tiles warning"></div>
      <div class="tiles danger"></div>
      <div class="tiles pink"></div>
      <div class="tiles info"></div>
      <div class="tiles dark"></div>
      <div class="tiles default"></div>
      </div>
    </div>
  </div>

  <div id="right-sidebar" class="settings-panel">
  <i class="settings-close mdi mdi-close"></i>
  <div class="d-flex align-items-center justify-content-between border-bottom">
    <p class="settings-heading font-weight-bold border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
  </div>
  <ul class="chat-list">
    <li class="list active">
      <div class="profile">
        <img src="assets/images/faces/face3.jpg" alt="image">
        <span class="online"></span>
      </div>
      <div class="info">
        <p>Thomas Douglas</p>
        <p>Available</p>
      </div>
      <small class="text-muted my-auto">19 min</small>
    </li>
    <li class="list">
      <div class="profile">
        <img src="assets/images/faces/face2.jpg" alt="image">
        <span class="offline"></span>
      </div>
      <div class="info">
        <div class="wrapper d-flex">
          <p>Catherine</p>
        </div>
        <p>Away</p>
      </div>
      <div class="badge badge-success badge-pill my-auto mx-2">4</div>
      <small class="text-muted my-auto">23 min</small>
    </li>
    <li class="list">
      <div class="profile">
        <img src="assets/images/faces/face3.jpg" alt="image">
        <span class="online"></span>
      </div>
      <div class="info">
        <p>Daniel Russell</p>
        <p>Available</p>
      </div>
      <small class="text-muted my-auto">14 min</small>
    </li>
    <li class="list">
      <div class="profile">
        <img src="assets/images/faces/face4.jpg" alt="image">
        <span class="offline"></span>
      </div>
      <div class="info">
        <p>James Richardson</p>
        <p>Away</p>
      </div>
      <small class="text-muted my-auto">2 min</small>
    </li>
    <li class="list">
      <div class="profile">
        <img src="assets/images/faces/face5.jpg" alt="image">
        <span class="online"></span>
      </div>
      <div class="info">
        <p>Madeline Kennedy</p>
        <p>Available</p>
      </div>
      <small class="text-muted my-auto">5 min</small>
    </li>
    <li class="list">
      <div class="profile">
        <img src="assets/images/faces/face6.jpg" alt="image">
        <span class="online"></span>
      </div>
      <div class="info">
        <p>Sarah Graves</p>
        <p>Available</p>
      </div>
      <small class="text-muted my-auto">47 min</small>
    </li>
  </ul>
  </div>      
<?php 
include 'sidebar.php';
?>     

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
    <h3 class="page-title"> Ads' Info </h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Info</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ad</li>
    </ol>
    </nav>
    </div>
<?php 
require '../config.php';
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
?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
          <div class="card">
      <div class="card-body">
        
            <?php 
                $q1 ="SELECT * FROM `".$adsTable."` 
                    INNER JOIN `".$imgTable."` ON (".$imgTable.".ADS_ID=".$adsTable.".ADS_ID) 
                    WHERE ".$adsTable.".ADS_ID = '$adsID' 
                    AND ".$imgTable.".IMAGE_STATUS='ACTIVE' ";
                $r1=mysqli_query($conn,$q1);
                $rowcount=mysqli_num_rows($r1);
/*                 echo 'q1:'.$q1.'<br>';
                echo 'rowcount:'.$rowcount.'<br>'; */
                if($rowcount==1){
                    echo '<div class="">';
                    while($row = mysqli_fetch_assoc($r1)){
                        $image = $row['IMAGE_NAME'];
                        $ads_status=$row['ADS_STATUS'];
                        echo '<div class="img-1">
                        <div class="img-2">
                        <img class="item img-fluid" src="../img/product/'.$image.'" alt="ad image" />';
                        if($ads_status=='SOLD'){ echo '<div class="overlay lay-sold" >SOLD</div>';}
                        else if($ads_status=='DELETED'){ echo '<div class="overlay lay-deleted" >DELETED</div>';}
                        else if($ads_status=='RESERVED'){ echo '<div class="overlay lay-reserved" >RESERVED</div>';}
                        else if($ads_status=='INACTIVE'){ echo '<div class="overlay lay-inactive" >INACTIVE</div>';}
                        echo '</div>
                        </div>';
                    }
                    echo '</div>';
                } else if ($rowcount>1){
                    $x=0;
                    echo '<div class="owl-carousel owl-theme full-width">';
                    while($row = mysqli_fetch_assoc($r1)){
                        $x++;
                        $image = $row['IMAGE_NAME'];
                        $ads_status=$row['ADS_STATUS'];

                        
                        echo '<div class="img-1">
                        <div class="img-2">
                        <img class="item img-fluid" src="../img/product/'.$image.'" alt="banner image" />';
                        if($ads_status=='SOLD'){ echo '<div class="overlay lay-sold" >SOLD</div>';}
                        else if($ads_status=='DELETED'){ echo '<div class="overlay lay-deleted" >DELETED</div>';}
                        else if($ads_status=='RESERVED'){ echo '<div class="overlay lay-reserved" >RESERVED</div>';}
                        else if($ads_status=='INACTIVE'){ echo '<div class="overlay lay-inactive" >INACTIVE</div>';}
                        echo '</div>
                        </div>';
                    }
                    echo '</div>';
                }

                
            ?>    
      </div>
    </div>
          </div>
<?php 
$admin = $_SESSION["userID"];
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
    $date=$row['ADS_PUBLISH_DATE'];
    // $date = date("j M y g:i a",strtotime($date);
    $seller = $row ['USER_NAME'];
    $sellerID=$row['USER_ID'];
    $phoneNo = $row['WHATSAPP'];
    $text="Hi, I'm interested in your ads *(";
    $text .= $name;
    $text .= ")* in _Usmers'_";
    $urlencodedtext = str_replace(' ', '%20', $text);
    $i++;
}

?>
          <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
            <div class="ads-details-info">
            <h2><?php echo $name;?>
            </h2>
            <h3 style="color:red"> 
            <?php 
            if($free!="true"){
                echo 'RM '.$price;
            }else
                echo $price;
            ?>
            </h3>
            <div class="details-meta">

            <span><strong> Seller:</strong><a href="user-details.php?userID=<?php echo $sellerID;?>"><?php echo $seller;?></a></span><br/>
            <span><strong> Location:</strong><?php echo $loc;?></span><br/>
            <span><strong> Latest Update Date:</strong><?php echo $date;?></span>
            </div>
            <hr>
            <span><strong> Description:</strong></span><br>
            <span class="mb-2 wrapText">
            <?php echo $descp;?>
            </span>
            </div>
            <hr>
            <span><strong><?php if($adsTable==="ADS_ITEM") echo " Deal Method: "; else if($adsTable==="ADS_JOB") echo " Contract Type: "; else if($adsTable==="ADS_ACCOM") echo " Tenet Preference: ";?></strong> <?php echo $sub[0];?></span>
            <?php
            if($adsTable==="ADS_ITEM"||$adsTable==="ADS_JOB") {
            echo'
            <br><span><strong>';
            if($adsTable==="ADS_ITEM") 
                echo " Condition: "; 
            else if($adsTable==="ADS_JOB") 
                echo " Salary Type: ";
            echo' </strong>'.$sub[1].'</span>';
            }
            ?>
            <br/>
            <span><strong> Category:</strong>
            <?php echo $cat;?></span>
            <hr>
            
            <span><strong>ADMIN ONLY:</strong></span><br>
            <div class="d-flex justify-content-between">
            <?php 
            $q2 ="SELECT * FROM `ADS_MANAGEMENT` where ADS_ID = '$adsID' ORDER BY `TIME` DESC LIMIT 1";
            $r2=mysqli_query($conn,$q2);
            //echo 'q2: '.$q2;

            if ( mysqli_num_rows($r2)){
              while($row = mysqli_fetch_assoc($r2)){
                $action=$row['ACTION'];
                $adminDescp = $row['DESCP'];
                $time=$row['TIME'];
                $pic = $row['PIC'];

                echo '<div><strong><u>Latest Update Info</u></strong><br>';
                echo 'Action Done: '.$action.'<br>';
                echo 'Description: '.$adminDescp.'<br>';
                echo 'Date: '.$time.'<br>';
                echo 'PIC: '.$pic.'<br></div>';

              }
            }else
            echo '-';
            
            ?>
            <div class="a-flex justify-content-between">
              <?php if($ads_status==='ACTIVE'||$ads_status==='RESERVED'||$ads_status==='INACTIVE'){
                if($privateStatus==='ACTIVE'){ ?>
                <button class="btn btn-gradient-danger actionBtn" id="actionBtn" onclick="showSwal('delete','<?php echo $ads_id; ?>','<?php echo $admin; ?>')">Delete Ad</button>
                <?php }else if($privateStatus==='DELETED'){?>
                  <button class="btn btn-gradient-success actionBtn" id="actionBtn" onclick="showSwal('recover','<?php echo $ads_id; ?>','<?php echo $admin; ?>')">Recover Ad</button>
              <?php  } 
                }else{
                  echo '<i>Deleted/sold ad cannot be romove.</i>';
                } ?>
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
<footer class="footer">
<div class="container-fluid clearfix">
<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
</span>
</div>
</footer>      
</div>
</div>
</div>

<!-- base js -->
<script src="js/app.js"></script>
<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<!-- end base js -->

<!-- plugin js -->
<script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="assets/plugins/datatables.net/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="assets/plugins/owl-carousel-2/owl.carousel.min.js"></script>

<!-- end plugin js -->

<!-- common js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- end common js -->
<script src="assets/js/data-table.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/alerts.js"></script>

</body>
</html>