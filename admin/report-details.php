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
  <meta name="_token" content="QWbVg2YPfbjHF5EKJU3uC598YFYKIbiR7NI9ehM9">
  
  <link rel="shortcut icon" href="../img/icon.png" >
<link rel="icon" href="../img/icon.png" >

  <!-- plugin css -->
  <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/@mdi/font/css/materialdesignicons.min.css">
  <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
  <!-- end plugin css -->

  <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
  <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/jquery-toast-plugin/jquery.toast.min.css">

  <!-- common css -->
  <link media="all" type="text/css" rel="stylesheet" href="css/app.css">
  <!-- end common css -->

  </head>
<body>

  <div class="container-scroller" id="app">
  <?php
  include 'header.php';
  ?>

  <?php 
  require '../config.php';
  $reportID=$_GET['reportID'];
  $adsID=null;

  $q1 ="SELECT * FROM `REPORT` 
            INNER JOIN `USER` ON (REPORT.REPORTED_BY_USER_ID=USER.USER_ID)
            INNER JOIN `REPORT_REASON` ON (REPORT.REASON=REPORT_REASON.REASON_VALUE)
            INNER JOIN `TICKET_STATUS` ON (REPORT.STATUS=TICKET_STATUS.STATUS_VALUE) 
            WHERE REPORT.REPORT_ID='$reportID'";
  $r1=mysqli_query($conn,$q1);
  $rowcount=mysqli_num_rows($r1);
  if($rowcount==1){
      while($row = mysqli_fetch_assoc($r1)){
          $reportID = $row['REPORT_ID'];
          $reportType = $row['REPORT_TYPE'];
          $byUserID = $row ['REPORTED_BY_USER_ID'];
          $byUserName = $row ['USER_NAME'];
          $reason = $row ['REASON_NAME'];
          $descp = $row ['REPORT_DESCP'];
          
          $date = $row ['REPORT_DATE'];
          // $date = date("j M y",strtotime($date));
          $status = $row ['STATUS_NAME'];
          $comment = $row ['COMMENT'];
          $comment = str_replace( '"',"'", $comment);
      }
  }

  if(strpos($reportType, 'ADS') !== false){
    $q3="SELECT * FROM REPORT_ADS WHERE REPORT_ID='$reportID' ";
    $r3=mysqli_query($conn,$q3);
    while($row3 = mysqli_fetch_assoc($r3)){
      $adsID = $row3['ADS_ID'];
    } 

    if (strpos($adsID, 'AI') !== false) {
      $adsTable="ADS_ITEM";
      $imgTable="IMAGE_ITEM";
  } else if (strpos($adsID, 'AA') !== false) {
      $adsTable="ADS_ACCOM";
      $imgTable="IMAGE_ACCOM";
  } else if (strpos($adsID, 'AJ') !== false) {
      $adsTable="ADS_JOB";
      $imgTable="IMAGE_JOB";
  }
    $q2="SELECT * FROM REPORT_ADS 
        INNER JOIN ".$adsTable." ON (REPORT_ADS.ADS_ID=$adsTable.ADS_ID)
        INNER JOIN USER ON(USER.USER_ID=$adsTable.USER_ID)
        WHERE $adsTable.ADS_ID='$adsID'";
    $r2=mysqli_query($conn,$q2);
    while($row2 = mysqli_fetch_assoc($r2)){
      $adsName = $row2['ADS_TITLE'];
      $sellerID = $row2 ['USER_ID'];
      $sellerName = $row2 ['USER_NAME'];
  
  }
  }


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
  <h3 class="page-title"> Report Form </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Forms</a></li>
      <li class="breadcrumb-item active" aria-current="page">Form elements</li>
    </ol>
  </nav>
</div>
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
    
      <div class="card-body">
        <p class="card-description"> Submitted Time:  <?php echo $date;?> </p>

        <?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"update=success")==true){
        echo '<div class="alert alert-fill-success" role="alert">
        <i class="mdi mdi-alert-circle"></i> Report ticket successfully updated! </div>';
    } else if(strpos($fullUrl,"update=fail")==true){
      echo '<div class="alert alert-fill-danger" role="alert">
      <i class="mdi mdi-alert-circle"></i> Report ticket update fail! </div>';
    } 
    
?>

        <div class="forms-sample">
        <div class="form-group">
            <label>Status: </label> <?php echo $status; ?>
            <!-- <select class="form-ad valid" id="status_div" name="status_div" sel_id aria-required="true" aria-invalid="false" style="padding-left: 12px">
                <option value="none" disabled >Select status</option>
                <?php 
                require '../config.php';
                    $statusSQL = "SELECT * FROM TICKET_STATUS ORDER BY STATUS_ID ASC";
                    $statusResult = mysqli_query($conn,$statusSQL);

                    while($row= mysqli_fetch_array($statusResult)){
                        if($row['STATUS_VALUE'] == $status){
                            echo '<option  value="'.$row['STATUS_VALUE'].'"';
                            echo ' selected>';
                            echo $row['STATUS_NAME'].' </option>';

                        } else{
                            echo '<option value="'.$row['STATUS_VALUE'].'">';
                            echo $row['STATUS_NAME'].' </option>';
                        }
                    }
                ?>
            </select> -->
          </div>
          <div class="form-group">
            <label>Report ID: </label><?php echo $reportID;?>
          </div>
          <hr>
          <?php if($adsID!=null){ ?>
          <div class="form-group">
            <label>Ads Name: </label><?php echo $adsName;?>  <a target = '_blank' href="ads-details.php?adsID=<?php echo $adsID;?>">(<?php echo $adsID;?>)</a>
          </div>
          <div class="form-group">
            <label>Seller Name: </label><?php echo $sellerName;?>  <a target = '_blank' href="user-details.php?userID=<?php echo $sellerID;?>">(<?php echo $sellerID;?>)</a>
          </div>
          <hr>
<?php } ?>
          <div class="form-group">
            <label>Reported by: </label><?php echo $byUserName;?>  <a target = '_blank' href="user-details.php?userID=<?php echo $byUserID;?>">(<?php echo $byUserID;?>)</a>
          </div>
          <div class="form-group">
            <label>Reason: </label><?php echo $reason;?>
          </div>
          <div class="form-group">
            <label>Description: </label><?php echo $descp;?>
          </div>
          <hr>
          <div class="form-group">
            <label>Comment: </label>
            <div class="form-control" name="reportComment" >
              <?php echo $comment;?>
                  </div>
          </div>
          <div class="padTop">
          <input name="reportID" value=<?php echo $reportID;?> type="text" hidden>
          <button class="btn btn-gradient-primary mr-2" onClick="window.location.href='report-details/edit.php?reportID=<?php echo $reportID?>'">Edit</button>
          <!-- <button class="btn btn-light" onclick="goBack()">Cancel</button> -->
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
</footer>      </div>
    </div>
  </div>

  <!-- base js -->
  <script src="js/app.js"></script>
  <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <!-- end base js -->

  <!-- plugin js -->
  <script src="assets/plugins/datatables.net/jquery.dataTables.min.js"></script>
  <script src="assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- end plugin js -->

  <!-- common js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- end common js -->

  <script src="assets/js/data-table.js"></script>

  <script src="assets/js/toastDemo.js"></script>


  </body>
</html>