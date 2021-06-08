<?php
require 'session.php';
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
    <h3 class="page-title"> Profile </h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Sample Pages</a></li>
    <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </ol>
    </nav>
    </div>
<?php 
require '../config.php';
$userID=$_GET['userID'];
$admin = $_SESSION["userID"];

$retrieveUserProfileSQL="SELECT * FROM USER 
                        INNER JOIN LOCATION ON (LOCATION.LOC_VALUE=USER.ADDRESS) 
                        INNER JOIN SCHOOL ON (SCHOOL.SCHOOL_VALUE=USER.SCHOOL) 
                        LEFT JOIN AVATAR ON (USER.AVATAR_ID=AVATAR.AVATAR_ID)
                        WHERE USER.USER_ID ='$userID'";
$retrieveUserProfileResult = mysqli_query($conn,$retrieveUserProfileSQL);

while($row = mysqli_fetch_assoc($retrieveUserProfileResult)){
  $username=$row['USER_NAME'];
  $useremail = $row['USER_EMAIL'];
  $user_status=$row['USER_STATUS'];
  $whatsapp = $row ['WHATSAPP'];
  $userID = $row ['USER_ID'];
  $loc = $row['ADDRESS'];
  if($loc=='ou'||$loc=='op'||$loc=='ou'){
      $loc = $row['AREA'];
  }
  $school=$row['SCHOOL_NAME'];
  $avatar = $row['AVATAR_NAME'];
  if($avatar!=null){
    $imglink="../img/avatar/".$avatar;                      
  }else{
    $imglink="../img/author/avatar.jpg";
  }

  $join = date("j M y g:i a",strtotime($row['CREATE_AT']));

}

?>
<div class="row">
  <div class="col-12">

        <div class="row">
          <div class="col-lg-4 grid-margin">
          <div class="card">
            <div class="card-body">
            <div class="border-bottom text-center pb-4">
              <img src="<?php echo $imglink; ?>" alt="profile" class="img-lg rounded-circle mb-3" />
              <p><?php echo $username; ?></p>
            </div>
            <div class="py-4">
              <p class="clearfix">
                <span class="float-left"> Status </span>
                <span class="float-right text-muted user_status"><?php echo $user_status; ?></span>
              </p>
              <p class="clearfix">
                <span class="float-left"> Phone </span>
                <span class="float-right text-muted"><?php echo $whatsapp; ?></span>
              </p>
              <p class="clearfix">
                <span class="float-left"> Email </span>
                <span class="float-right text-muted"><?php echo $useremail; ?></span>
              </p>
              <p class="clearfix">
                <span class="float-left"> USM School </span>
                <span class="float-right text-muted"><?php echo $school; ?>
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left"> USM Hostel </span>
                <span class="float-right text-muted"><?php echo $loc; ?>
                </span>
              </p>
            </div>
            <div class="d-flex justify-content-between">
              <?php if($user_status==='A'){ ?>
                <button class="btn btn-gradient-danger actionBtn" id="actionBtn" onclick="showSwal('revoke','<?php echo $userID; ?>','<?php echo $admin; ?>')">Revoke Access</button>
                <?php }else { ?>
                <button class="btn btn-gradient-success actionBtn" id="actionBtn" onclick="showSwal('grant','<?php echo $userID; ?>','<?php echo $admin; ?>')">Grant Access</button>
                <?php } ?>
            </div>
            <hr>
            <span><strong>ADMIN ONLY:</strong></span><br>
            <div class="d-flex justify-content-between">
            <?php 
            $q2 ="SELECT * FROM `USER_MANAGEMENT` INNER JOIN USER ON (USER.USER_ID=USER_MANAGEMENT.PIC) where USER_MANAGEMENT.USER_ID = '$userID' ORDER BY `TIME` DESC LIMIT 1";
            $r2=mysqli_query($conn,$q2);
            //echo 'q2: '.$q2;

            if ( mysqli_num_rows($r2)){
              while($row = mysqli_fetch_assoc($r2)){
                $action=$row['ACTION'];
                $adminDescp = $row['DESCP'];
                $time=$row['TIME'];
                $pic = $row['USER_NAME'];

                echo '<div><strong><u>Latest Update Info</u></strong><br>';
                echo 'Action Done: '.$action.'<br>';
                echo 'Description: '.$adminDescp.'<br>';
                echo 'Date: '.$time.'<br>';
                echo 'PIC: '.$pic.'<br></div>';

              }
            }else
            echo '-';
            
            ?>
            </div>
            </div>
          </div>
          </div>
<?php 

$retrieveAdsCountSQL="SELECT ((SELECT COUNT(ADS_ITEM.ADS_ID) FROM ADS_ITEM WHERE USER_ID='$userID')+(SELECT COUNT(ADS_JOB.ADS_ID)  FROM ADS_JOB WHERE USER_ID='$userID')+(SELECT COUNT(ADS_ACCOM.ADS_ID)  FROM ADS_ACCOM WHERE USER_ID='$userID')+(SELECT COUNT(DELETED_ADS.ADS_ID)  FROM DELETED_ADS WHERE USER_ID='$userID')) AS NUM, 'ALL ADS' AS CATEGORY

UNION SELECT ((SELECT COUNT(ADS_ITEM.ADS_ID) FROM ADS_ITEM WHERE USER_ID='$userID' AND ads_status='ACTIVE')+(SELECT COUNT(ADS_JOB.ADS_ID)  FROM ADS_JOB WHERE USER_ID='$userID' AND ads_status='ACTIVE')+(SELECT COUNT(ADS_ACCOM.ADS_ID)  FROM ADS_ACCOM WHERE USER_ID='$userID' AND ads_status='ACTIVE')) AS NUM, 'ACTIVE ADS' AS CATEGORY

UNION SELECT ((SELECT COUNT(ADS_ITEM.ADS_ID) FROM ADS_ITEM WHERE USER_ID='$userID' AND ads_status='RESERVED')+(SELECT COUNT(ADS_JOB.ADS_ID)  FROM ADS_JOB WHERE USER_ID='$userID' AND ads_status='RESERVED')+(SELECT COUNT(ADS_ACCOM.ADS_ID)  FROM ADS_ACCOM WHERE USER_ID='$userID' AND ads_status='RESERVED')) AS NUM, 'RESERVED ADS' AS CATEGORY

UNION SELECT ((SELECT COUNT(ADS_ITEM.ADS_ID) FROM ADS_ITEM WHERE USER_ID='$userID' AND ads_status='SOLD')+(SELECT COUNT(ADS_JOB.ADS_ID)  FROM ADS_JOB WHERE USER_ID='$userID' AND ads_status='SOLD')+(SELECT COUNT(ADS_ACCOM.ADS_ID)  FROM ADS_ACCOM WHERE USER_ID='$userID' AND ads_status='SOLD')) AS NUM, 'SOLD ADS' AS CATEGORY

UNION SELECT ((SELECT COUNT(DELETED_ADS.ADS_ID)  FROM DELETED_ADS WHERE USER_ID='$userID')) AS NUM, 'DELETED ADS' AS CATEGORY

UNION SELECT ((SELECT COUNT(ADS_ITEM.ADS_ID) FROM ADS_ITEM WHERE USER_ID='$userID' AND ads_status='INACTIVE')+(SELECT COUNT(ADS_JOB.ADS_ID)  FROM ADS_JOB WHERE USER_ID='$userID' AND ads_status='INACTIVE')+(SELECT COUNT(ADS_ACCOM.ADS_ID)  FROM ADS_ACCOM WHERE USER_ID='$userID' AND ads_status='INACTIVE')) AS NUM, 'INACTIVE ADS' AS CATEGORY";
$retrieveAdsCountResult = mysqli_query($conn,$retrieveAdsCountSQL);

//ALL - ACTIVE - RESERVED - SOLD - DELETED - INACTIVE
$i=0;
if ( mysqli_num_rows($retrieveAdsCountResult)> 0){
    while($row = mysqli_fetch_assoc($retrieveAdsCountResult)){
      $num[$i] = $row['NUM'];
      $cat[$i] = $row ['CATEGORY'];
      $i++;
    }
}

?>
          <div class="col-lg-8 grid-margin">
          <div class="card">
            <div class="card-body">
          <div class="d-sm-flex pb-4 mb-4 border-bottom">
            <div class="d-flex align-items-center">
              <h5 class="page-title mb-n2">Ads</h5>
              <p class="mt-2 mb-n1 ml-3 text-muted"><?php echo $num[0]?> Ads</p>
            </div>
          </div>
          <div class="nav-scroller adsTab">
            <ul class="nav nav-tabs tickets-tab-switch userTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link rounded active" id="all-tab" data-toggle="tab" href="#all-user" role="tab" aria-controls="all-user" aria-selected="true">All<div class="badge"><?php echo $num[0]?></div></a>
              </li>
              <li class="nav-item">
                <a class="nav-link rounded" id="active-tab" data-toggle="tab" href="#active-ads" role="tab" aria-controls="active-ads" aria-selected="false">Active<div class="badge"><?php echo $num[1]?></div></a>
              </li>
              <li class="nav-item">
                <a class="nav-link rounded" id="reserved-tab" data-toggle="tab" href="#reserved-ads" role="tab" aria-controls="reserved-ads" aria-selected="false">Reserved<div class="badge"><?php echo $num[2]?> </div></a>
              </li>
              <li class="nav-item">
                <a class="nav-link rounded" id="sold-tab" data-toggle="tab" href="#sold-ads" role="tab" aria-controls="sold-ads" aria-selected="false">Sold<div class="badge"><?php echo $num[3]?></div></a>
              </li>
              <li class="nav-item">
                <a class="nav-link rounded" id="deleted-tab" data-toggle="tab" href="#deleted-ads" role="tab" aria-controls="deleted-ads" aria-selected="false">Deleted<div class="badge"><?php echo $num[4]?></div></a>
              </li>
              <li class="nav-item">
                <a class="nav-link rounded" id="inactive-tab" data-toggle="tab" href="#inactive-ads" role="tab" aria-controls="inactive-ads" aria-selected="false">Inactive<div class="badge"><?php echo $num[5]?></div></a>
              </li>
            </ul>
          </div>
          <div class="tab-content border-0 tab-content-basic">
            <!-- ALL ADS -->
            <div class="tab-pane fade show active col-12" id="all-user" role="tabpanel" aria-labelledby="all-user">
            <div class="table-responsive">
            <table id="order-listing-all"  class="table table-hover">
              <thead>
                <tr>
                  <th> Title </th>
                  <th> Status </th>
                  <th> Date </th>
                  <th> Ads ID </th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $q1="SELECT DISTINCT  I.ADS_ID,I.ADS_STATUS,I.ADS_LATEST_UPDATE_DATE,I.ADS_PUBLISH_DATE,I.ADS_TITLE,I.ADS_PRICE,   
                I.ADS_DESCP,I.ADS_LOC,I.ADS_AREA,I.ADS_CAT,U.USER_NAME
                FROM ADS_ITEM I    
                LEFT JOIN IMAGE_ITEM II ON (I.ADS_ID=II.ADS_ID) 
                INNER JOIN USER U ON(U.USER_ID=I.USER_ID)    
                WHERE U.USER_ID ='$userID' 
                GROUP BY (I.ADS_ID)   
                UNION SELECT DISTINCT    
                A.ADS_ID,A.ADS_STATUS,A.ADS_LATEST_UPDATE_DATE ,A.ADS_PUBLISH_DATE,A.ADS_TITLE,A.ADS_PRICE,A.ADS_DESCP,A.ADS_LOC,   
                A.ADS_AREA,A.ADS_CAT,U.USER_NAME
                FROM ADS_ACCOM A    
                LEFT JOIN IMAGE_ACCOM IA ON (A.ADS_ID=IA.ADS_ID) 
                INNER JOIN USER U ON(U.USER_ID=A.USER_ID)    
                WHERE U.USER_ID ='$userID' 
                GROUP BY (A.ADS_ID)   
                UNION SELECT DISTINCT J.ADS_ID,J.ADS_STATUS,J.ADS_LATEST_UPDATE_DATE ,J.ADS_PUBLISH_DATE,J.ADS_TITLE,J.ADS_PRICE,   
                J.ADS_DESCP,J.ADS_LOC,J.ADS_AREA,J.ADS_CAT,U.USER_NAME 
                FROM ADS_JOB J    
                LEFT JOIN IMAGE_JOB IJ ON (J.ADS_ID=IJ.ADS_ID) 
                INNER JOIN USER U ON(U.USER_ID=J.USER_ID)    
                WHERE U.USER_ID ='$userID' 
                GROUP BY (J.ADS_ID)   
                UNION SELECT DISTINCT D.ADS_ID,D.ADS_STATUS,D.ADS_LATEST_UPDATE_DATE ,D.ADS_PUBLISH_DATE,D.ADS_TITLE,D.ADS_PRICE,   
                D.ADS_DESCP,D.ADS_LOC,D.ADS_AREA,D.ADS_CAT,U.USER_NAME 
                FROM DELETED_ADS D    
                LEFT JOIN DELETED_IMAGE DI ON (D.ADS_ID=DI.ADS_ID) 
                INNER JOIN USER U ON(U.USER_ID=D.USER_ID)    
                WHERE U.USER_ID ='$userID' 
                GROUP BY (D.ADS_ID)   
                ORDER BY ADS_LATEST_UPDATE_DATE DESC";
                $r1 = mysqli_query($conn,$q1);
                //echo 'q1: '.$q1;
                if ( mysqli_num_rows($r1)> 0){
                  while($row = mysqli_fetch_assoc($r1)){
                    $title = $row['ADS_TITLE'];
                    $title = str_replace( '"',"'", $title);
                    $status = $row['ADS_STATUS'];
                    $adsID = $row ['ADS_ID'];
                    $date = $row ['ADS_LATEST_UPDATE_DATE'];
                   // $date = date("j M y",strtotime($date));
                  $url='window.location="ads-details.php?adsID='.$adsID.'"';

                    echo '<tr class="cursor-pointer" onclick='.$url.'>
                    <td class="adsName">'.$title.'</td>
                    <td>';
                    if(strpos($status, 'INACTIVE') !== false){
                      echo '<label class="badge badge-secondary">INACTIVE</label>';
                    } else if(strpos($status, 'ACTIVE') !== false){
                      echo '<label class="badge badge-success">ACTIVE</label>';
                    } else if(strpos($status, 'RESERVED') !== false){
                      echo '<label class="badge badge-warning">RESERVED</label>';
                    } else if(strpos($status, 'SOLD') !== false){
                      echo '<label class="badge badge-info">SOLD</label>';
                    } else if(strpos($status, 'DELETED') !== false){
                      echo '<label class="badge badge-danger">DELETED</label>';
                    }
                      
                    echo '</td>
                    <td> '.$date.' </td>
                    <td> '.$adsID.' </td>
    
                  </tr>';
                  }
                }
              
              ?>
              </tbody>
            </table>
          </div>  
          </div>
          <!-- ACTIVE ADS -->
          <div class="tab-pane fade col-12" id="active-ads" role="tabpanel" aria-labelledby="active-ads">
            <div class="table-responsive">
            <table id="order-listing-active"  class="table table-hover">
              <thead>
                <tr>
                <th> Title </th>
                  <th> Status </th>
                  <th> Date </th>
                  <th> Ads ID </th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $q1="SELECT DISTINCT  I.ADS_ID,I.ADS_STATUS,I.ADS_LATEST_UPDATE_DATE,I.ADS_PUBLISH_DATE,I.ADS_TITLE,I.ADS_PRICE,   
                I.ADS_DESCP,I.ADS_LOC,I.ADS_AREA,I.ADS_CAT,U.USER_NAME
                FROM ADS_ITEM I    
                INNER JOIN USER U ON(U.USER_ID=I.USER_ID)    
                WHERE U.USER_ID ='$userID'  AND I.ADS_STATUS='ACTIVE'
                GROUP BY (I.ADS_ID)   
                UNION SELECT DISTINCT    
                A.ADS_ID,A.ADS_STATUS,A.ADS_LATEST_UPDATE_DATE ,A.ADS_PUBLISH_DATE,A.ADS_TITLE,A.ADS_PRICE,A.ADS_DESCP,A.ADS_LOC,   
                A.ADS_AREA,A.ADS_CAT,U.USER_NAME
                FROM ADS_ACCOM A    
                INNER JOIN USER U ON(U.USER_ID=A.USER_ID)    
                WHERE U.USER_ID ='$userID'  AND A.ADS_STATUS='ACTIVE'
                GROUP BY (A.ADS_ID)   
                UNION SELECT DISTINCT J.ADS_ID,J.ADS_STATUS,J.ADS_LATEST_UPDATE_DATE ,J.ADS_PUBLISH_DATE,J.ADS_TITLE,J.ADS_PRICE,   
                J.ADS_DESCP,J.ADS_LOC,J.ADS_AREA,J.ADS_CAT,U.USER_NAME 
                FROM ADS_JOB J    
                INNER JOIN USER U ON(U.USER_ID=J.USER_ID)    
                WHERE U.USER_ID ='$userID'  AND J.ADS_STATUS='ACTIVE'
                GROUP BY (J.ADS_ID)   
                ORDER BY ADS_LATEST_UPDATE_DATE DESC";
                $r1 = mysqli_query($conn,$q1);
                if ( mysqli_num_rows($r1)> 0){
                  while($row = mysqli_fetch_assoc($r1)){
                    $title = $row['ADS_TITLE'];
                    $title = str_replace( '"',"'", $title);
                    $status = $row['ADS_STATUS'];
                    $adsID = $row ['ADS_ID'];
                    $date = $row ['ADS_LATEST_UPDATE_DATE'];
                   // $date = date("j M y",strtotime($date));
                  $url='window.location="ads-details.php?adsID='.$adsID.'"';

                    echo '<tr class="cursor-pointer" onclick='.$url.'>
                    <td class="adsName">'.$title.'</td>
                    <td>';
                    if(strpos($status, 'ACTIVE') !== false){
                      echo '<label class="badge badge-success">ACTIVE</label>';
                    } else if(strpos($status, 'RESERVED') !== false){
                      echo '<label class="badge badge-warning">RESERVED</label>';
                    } else if(strpos($status, 'SOLD') !== false){
                      echo '<label class="badge badge-info">SOLD</label>';
                    } else if(strpos($status, 'DELETED') !== false){
                      echo '<label class="badge badge-danger">DELETED</label>';
                    } else if(strpos($status, 'INACTIVE') !== false){
                      echo '<label class="badge badge-secondary">INACTIVE</label>';
                    }
                      
                    echo '</td>
                    <td> '.$date.' </td>
                    <td> '.$adsID.' </td>
    
                  </tr>';
                  }
                }
              
              ?>
              </tbody>
            </table>
            </div>
            </div>

          <!-- RESERVED ACCOUNT -->
          <div class="tab-pane fade col-12" id="reserved-ads" role="tabpanel" aria-labelledby="reserved-ads">
            <div class="table-responsive">
            <table id="order-listing-reserved"  class="table table-hover">
              <thead>
                <tr>
                <th> Title </th>
                  <th> Status </th>
                  <th> Date </th>
                  <th> Ads ID </th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $q1="SELECT DISTINCT  I.ADS_ID,I.ADS_STATUS,I.ADS_LATEST_UPDATE_DATE,I.ADS_PUBLISH_DATE,I.ADS_TITLE,I.ADS_PRICE,   
                I.ADS_DESCP,I.ADS_LOC,I.ADS_AREA,I.ADS_CAT,U.USER_NAME
                FROM ADS_ITEM I    
                INNER JOIN USER U ON(U.USER_ID=I.USER_ID)    
                WHERE U.USER_ID ='$userID'  AND I.ADS_STATUS='RESERVED'
                GROUP BY (I.ADS_ID)   
                UNION SELECT DISTINCT    
                A.ADS_ID,A.ADS_STATUS,A.ADS_LATEST_UPDATE_DATE ,A.ADS_PUBLISH_DATE,A.ADS_TITLE,A.ADS_PRICE,A.ADS_DESCP,A.ADS_LOC,   
                A.ADS_AREA,A.ADS_CAT,U.USER_NAME
                FROM ADS_ACCOM A    
                INNER JOIN USER U ON(U.USER_ID=A.USER_ID)    
                WHERE U.USER_ID ='$userID'  AND A.ADS_STATUS='RESERVED'
                GROUP BY (A.ADS_ID)   
                UNION SELECT DISTINCT J.ADS_ID,J.ADS_STATUS,J.ADS_LATEST_UPDATE_DATE ,J.ADS_PUBLISH_DATE,J.ADS_TITLE,J.ADS_PRICE,   
                J.ADS_DESCP,J.ADS_LOC,J.ADS_AREA,J.ADS_CAT,U.USER_NAME 
                FROM ADS_JOB J    
                INNER JOIN USER U ON(U.USER_ID=J.USER_ID)    
                WHERE U.USER_ID ='$userID'  AND J.ADS_STATUS='RESERVED'
                GROUP BY (J.ADS_ID)   
                ORDER BY ADS_LATEST_UPDATE_DATE DESC";
                $r1 = mysqli_query($conn,$q1);
                if ( mysqli_num_rows($r1)> 0){
                  while($row = mysqli_fetch_assoc($r1)){
                    $title = $row['ADS_TITLE'];
                    $title = str_replace( '"',"'", $title);
                    $status = $row['ADS_STATUS'];
                    $adsID = $row ['ADS_ID'];
                    $date = $row ['ADS_LATEST_UPDATE_DATE'];
                   // $date = date("j M y",strtotime($date));
                  $url='window.location="ads-details.php?adsID='.$adsID.'"';

                    echo '<tr class="cursor-pointer" onclick='.$url.'>
                    <td class="adsName">'.$title.'</td>
                    <td>';
                    if(strpos($status, 'ACTIVE') !== false){
                      echo '<label class="badge badge-success">ACTIVE</label>';
                    } else if(strpos($status, 'RESERVED') !== false){
                      echo '<label class="badge badge-warning">RESERVED</label>';
                    } else if(strpos($status, 'SOLD') !== false){
                      echo '<label class="badge badge-info">SOLD</label>';
                    } else if(strpos($status, 'DELETED') !== false){
                      echo '<label class="badge badge-danger">DELETED</label>';
                    } else if(strpos($status, 'INACTIVE') !== false){
                      echo '<label class="badge badge-secondary">INACTIVE</label>';
                    }
                      
                    echo '</td>
                    <td> '.$date.' </td>
                    <td> '.$adsID.' </td>
    
                  </tr>';
                  }
                }
              
              ?>
              </tbody>
            </table>
            </div>
            </div>

            <!-- SOLD ADS -->
            <div class="tab-pane fade col-12" id="sold-ads" role="tabpanel" aria-labelledby="sold-ads">
            <div class="table-responsive">
            <table id="order-listing-sold"  class="table table-hover">
              <thead>
                <tr>
                  <th> Title </th>
                  <th> Status </th>
                  <th> Date </th>
                  <th> Ads ID </th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $q1="SELECT DISTINCT  I.ADS_ID,I.ADS_STATUS,I.ADS_LATEST_UPDATE_DATE,I.ADS_PUBLISH_DATE,I.ADS_TITLE,I.ADS_PRICE,   
                I.ADS_DESCP,I.ADS_LOC,I.ADS_AREA,I.ADS_CAT,U.USER_NAME
                FROM ADS_ITEM I    
                INNER JOIN USER U ON(U.USER_ID=I.USER_ID)    
                WHERE U.USER_ID ='$userID'  AND I.ADS_STATUS='SOLD'
                GROUP BY (I.ADS_ID)   
                UNION SELECT DISTINCT    
                A.ADS_ID,A.ADS_STATUS,A.ADS_LATEST_UPDATE_DATE ,A.ADS_PUBLISH_DATE,A.ADS_TITLE,A.ADS_PRICE,A.ADS_DESCP,A.ADS_LOC,   
                A.ADS_AREA,A.ADS_CAT,U.USER_NAME
                FROM ADS_ACCOM A    
                INNER JOIN USER U ON(U.USER_ID=A.USER_ID)    
                WHERE U.USER_ID ='$userID'  AND A.ADS_STATUS='SOLD'
                GROUP BY (A.ADS_ID)   
                UNION SELECT DISTINCT J.ADS_ID,J.ADS_STATUS,J.ADS_LATEST_UPDATE_DATE ,J.ADS_PUBLISH_DATE,J.ADS_TITLE,J.ADS_PRICE,   
                J.ADS_DESCP,J.ADS_LOC,J.ADS_AREA,J.ADS_CAT,U.USER_NAME 
                FROM ADS_JOB J    
                INNER JOIN USER U ON(U.USER_ID=J.USER_ID)    
                WHERE U.USER_ID ='$userID'  AND J.ADS_STATUS='SOLD'
                GROUP BY (J.ADS_ID)   
                ORDER BY ADS_LATEST_UPDATE_DATE DESC";
                $r1 = mysqli_query($conn,$q1);
                if ( mysqli_num_rows($r1)> 0){
                  while($row = mysqli_fetch_assoc($r1)){
                    $title = $row['ADS_TITLE'];
                    $title = str_replace( '"',"'", $title);
                    $status = $row['ADS_STATUS'];
                    $price = $row['ADS_PRICE'];
                    $adsID = $row ['ADS_ID'];
                    $date = $row ['ADS_LATEST_UPDATE_DATE'];
                   // $date = date("j M y",strtotime($date));
                  $url='window.location="ads-details.php?adsID='.$adsID.'"';

                    echo '<tr class="cursor-pointer" onclick='.$url.'>
                    <td class="adsName">
                      <img src="assets/images/faces/face1.jpg" class="mr-2" alt="image"> '.$title.'</td>
                      <td> ';
                    if(strpos($status, 'ACTIVE') !== false){
                      echo '<label class="badge badge-success">ACTIVE</label>';
                    } else if(strpos($status, 'RESERVED') !== false){
                      echo '<label class="badge badge-warning">RESERVED</label>';
                    } else if(strpos($status, 'SOLD') !== false){
                      echo '<label class="badge badge-info">SOLD</label>';
                    } else if(strpos($status, 'DELETED') !== false){
                      echo '<label class="badge badge-danger">DELETED</label>';
                    } else if(strpos($status, 'INACTIVE') !== false){
                      echo '<label class="badge badge-secondary">INACTIVE</label>';
                    }
                      
                    echo '</td>
                    <td> '.$date.' </td>
                    <td> '.$adsID.' </td>
    
                  </tr>';
                  }
                }
              
              ?>
              </tbody>
            </table>
            </div>
            </div>

            <!-- DELETED ADS -->
            <div class="tab-pane fade col-12" id="deleted-ads" role="tabpanel" aria-labelledby="deleted-ads">
            <div class="table-responsive">
            <table id="order-listing-deleted"  class="table table-hover">
              <thead>
                <tr>
                <th> Title </th>
                  <th> Status </th>
                  <th> Date </th>
                  <th> Ads ID </th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $q1="SELECT *
                FROM DELETED_ADS    
                INNER JOIN USER U ON(U.USER_ID=DELETED_ADS.USER_ID)    
                WHERE U.USER_ID ='$userID'
                GROUP BY (DELETED_ADS.ADS_ID)   
                ORDER BY ADS_LATEST_UPDATE_DATE DESC";
                $r1 = mysqli_query($conn,$q1);

                if ( mysqli_num_rows($r1)> 0){
                  while($row = mysqli_fetch_assoc($r1)){
                    $title = $row['ADS_TITLE'];
                    $title = str_replace( '"',"'", $title);
                    $status = $row['ADS_STATUS'];
                    $adsID = $row ['ADS_ID'];
                    $date = $row ['ADS_LATEST_UPDATE_DATE'];
                   // $date = date("j M y",strtotime($date));
                  $url='window.location="ads-details.php?adsID='.$adsID.'"';

                    echo '<tr class="cursor-pointer" onclick='.$url.'>
                    <td class="adsName">'.$title.'</td>
                    <td>';
                    if(strpos($status, 'ACTIVE') !== false){
                      echo '<label class="badge badge-success">ACTIVE</label>';
                    } else if(strpos($status, 'RESERVED') !== false){
                      echo '<label class="badge badge-warning">RESERVED</label>';
                    } else if(strpos($status, 'SOLD') !== false){
                      echo '<label class="badge badge-info">SOLD</label>';
                    } else if(strpos($status, 'DELETED') !== false){
                      echo '<label class="badge badge-danger">DELETED</label>';
                    } else if(strpos($status, 'INACTIVE') !== false){
                      echo '<label class="badge badge-secondary">INACTIVE</label>';
                    }
                      
                    echo '</td>
                    <td> '.$date.' </td>
                    <td> '.$adsID.' </td>
    
                  </tr>';
                  }
                }
              
              ?>
              </tbody>
            </table>
            </div>
            </div>

            <!-- INACTIVE ADS -->
            <div class="tab-pane fade col-12" id="inactive-ads" role="tabpanel" aria-labelledby="inactive-ads">
            <div class="table-responsive">
            <table id="order-listing-inactive"  class="table table-hover">
              <thead>
                <tr>
                <th> Title </th>
                  <th> Status </th>
                  <th> Date </th>
                  <th> Ads ID </th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $q1="SELECT DISTINCT  I.ADS_ID,I.ADS_STATUS,I.ADS_LATEST_UPDATE_DATE,I.ADS_PUBLISH_DATE,I.ADS_TITLE,I.ADS_PRICE,   
                I.ADS_DESCP,I.ADS_LOC,I.ADS_AREA,I.ADS_CAT,U.USER_NAME
                FROM ADS_ITEM I    
                INNER JOIN USER U ON(U.USER_ID=I.USER_ID)    
                WHERE U.USER_ID ='$userID'  AND I.ADS_STATUS='INACTIVE'
                GROUP BY (I.ADS_ID)   
                UNION SELECT DISTINCT    
                A.ADS_ID,A.ADS_STATUS,A.ADS_LATEST_UPDATE_DATE ,A.ADS_PUBLISH_DATE,A.ADS_TITLE,A.ADS_PRICE,A.ADS_DESCP,A.ADS_LOC,   
                A.ADS_AREA,A.ADS_CAT,U.USER_NAME
                FROM ADS_ACCOM A    
                INNER JOIN USER U ON(U.USER_ID=A.USER_ID)    
                WHERE U.USER_ID ='$userID'  AND A.ADS_STATUS='INACTIVE'
                GROUP BY (A.ADS_ID)   
                UNION SELECT DISTINCT J.ADS_ID,J.ADS_STATUS,J.ADS_LATEST_UPDATE_DATE ,J.ADS_PUBLISH_DATE,J.ADS_TITLE,J.ADS_PRICE,   
                J.ADS_DESCP,J.ADS_LOC,J.ADS_AREA,J.ADS_CAT,U.USER_NAME 
                FROM ADS_JOB J    
                INNER JOIN USER U ON(U.USER_ID=J.USER_ID)    
                WHERE U.USER_ID ='$userID'  AND J.ADS_STATUS='INACTIVE'
                GROUP BY (J.ADS_ID)   
                ORDER BY ADS_LATEST_UPDATE_DATE DESC";
                $r1 = mysqli_query($conn,$q1);
                if ( mysqli_num_rows($r1)> 0){
                  while($row = mysqli_fetch_assoc($r1)){
                    $title = $row['ADS_TITLE'];
                    $title = str_replace( '"',"'", $title);
                    $status = $row['ADS_STATUS'];
                    $adsID = $row ['ADS_ID'];
                    $date = $row ['ADS_LATEST_UPDATE_DATE'];
                   // $date = date("j M y",strtotime($date));
                  $url='window.location="ads-details.php?adsID='.$adsID.'"';

                    echo '<tr class="cursor-pointer" onclick='.$url.'>
                    <td class="adsName">'.$title.'</td>
                    <td>';
                    if(strpos($status, 'INACTIVE') !== false){
                      echo '<label class="badge badge-secondary">INACTIVE</label>';
                    }
                      
                    echo '</td>
                    <td> '.$date.' </td>
                    <td> '.$adsID.' </td>
    
                  </tr>';
                  }
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


  </div>
</div>
</div>
<footer class="footer">
<div class="container-fluid clearfix">
<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © USMers' 2020/2021</span>

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
<script src="assets/plugins/datatables.net/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
<!-- end plugin js -->

<!-- common js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- end common js -->
<script src="assets/js/data-table.js"></script>
<script src="assets/js/alerts.js"></script>

</body>
</html>