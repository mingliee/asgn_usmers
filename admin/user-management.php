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
require '../config.php';
?>     

<?php 

$retrieveUserSQL="SELECT COUNT(*) AS NUM,'ALL' AS CATEGORY FROM USER 
UNION SELECT COUNT(*) AS NUM,'ACTIVE USER' AS CATEGORY FROM USER  WHERE USER_STATUS LIKE 'A'
UNION SELECT COUNT(*) AS NUM,'REVOKED USER' AS CATEGORY FROM USER  WHERE USER_STATUS LIKE 'R'";
$retrieveUserResult = mysqli_query($conn,$retrieveUserSQL);

//ALL - ACTIVE - REVOKED
$i=0;
if ( mysqli_num_rows($retrieveUserResult)> 0){
    while($row = mysqli_fetch_assoc($retrieveUserResult)){
      $num[$i] = $row['NUM'];
      $cat[$i] = $row ['CATEGORY'];
      $i++;
    }
}

?>
<div class="main-panel">
<div class="content-wrapper">
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="d-sm-flex pb-4 mb-4 border-bottom">
          <div class="d-flex align-items-center">
            <h5 class="page-title mb-n2">User Management</h5>
            <p class="mt-2 mb-n1 ml-3 text-muted"><?php echo $num[0]?> Users</p>
          </div>
        </div>
        <div class="nav-scroller">
          <ul class="nav nav-tabs tickets-tab-switch userTab" role="tablist">
          <li class="nav-item">
              <a class="nav-link rounded active" id="all-tab" data-toggle="tab" href="#all-user" role="tab" aria-controls="all-user" aria-selected="true">All Account <div class="badge"><?php echo $num[0]?></div></a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded" id="active-tab" data-toggle="tab" href="#active-account" role="tab" aria-controls="active-account" aria-selected="true">Active Account <div class="badge"><?php echo $num[1]?></div></a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded" id="revoked-tab" data-toggle="tab" href="#revoked-account" role="tab" aria-controls="revoked-account" aria-selected="false">Revoked Account <div class="badge"><?php echo $num[2]?> </div></a>
            </li>
          </ul>
        </div>
        <div class="tab-content border-0 tab-content-basic">
          <!-- ALL ACCOUNT -->
          <div class="tab-pane fade show active col-12" id="all-user" role="tabpanel" aria-labelledby="all-user">
          <div class="table-responsive">
          <table id="order-listing-all"  class="table table-hover">
            <thead>
              <tr>
                <th> Username </th>
                <th> User Email </th>
                <th> Status </th>
                <th> User ID </th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $q1="SELECT * FROM USER 
                   ORDER BY (CREATE_AT) DESC";
              $r1 = mysqli_query($conn,$q1);
              if ( mysqli_num_rows($r1)> 0){
                while($row = mysqli_fetch_assoc($r1)){
                  $userID = $row['USER_ID'];
                  $useremail = $row['USER_EMAIL'];
                  $username = $row ['USER_NAME'];
                  $date = $row ['CREATE_AT'];
                 // $date = date("j M y",strtotime($date));
                 $status = $row ['USER_STATUS'];
                 $url='window.location="user-details.php?userID='.$userID.'"';

                  echo '<tr class="cursor-pointer" onclick='.$url.'>
                  <td>
                    <img src="assets/images/faces/face1.jpg" class="mr-2" alt="image"> '.$username.'</td>
                    <td>'.$useremail.' </td>
                  <td>';
                  if(strpos($status, 'A') !== false){
                    echo '<label class="badge badge-success">ACTIVE</label>';
                  } else if(strpos($status, 'R') !== false){
                    echo '<label class="badge badge-danger">REVOKED</label>';
                  }
                    
                  echo '</td>
                  <td> '.$userID.' </td>
  
                </tr>';
                }
              }
            
            ?>
            </tbody>
          </table>
        </div>  
        </div>
        <!-- ACTIVE ACCOUNT -->
        <div class="tab-pane fade col-12" id="active-account" role="tabpanel" aria-labelledby="active-account">
          <div class="table-responsive">
          <table id="order-listing-active"  class="table table-hover">
            <thead>
              <tr>
              <th> Username </th>
                <th> User Email </th>
                <th> Status </th>
                <th> User ID </th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $q1="SELECT * FROM USER WHERE USER_STATUS LIKE 'A'
                   ORDER BY (CREATE_AT) DESC";
              $r1 = mysqli_query($conn,$q1);
              if ( mysqli_num_rows($r1)> 0){
                while($row = mysqli_fetch_assoc($r1)){
                  $userID = $row['USER_ID'];
                  $useremail = $row['USER_EMAIL'];
                  $username = $row ['USER_NAME'];
                  $date = $row ['CREATE_AT'];
                 // $date = date("j M y",strtotime($date));
                 $status = $row ['USER_STATUS'];
                 $url='window.location="user-details.php?userID='.$userID.'"';

                  echo '<tr class="cursor-pointer" onclick='.$url.'>
                  <td>
                    <img src="assets/images/faces/face1.jpg" class="mr-2" alt="image"> '.$username.'</td>
                    <td>'.$useremail.' </td>
                  <td>';
                  if(strpos($status, 'A') !== false){
                    echo '<label class="badge badge-success">ACTIVE</label>';
                  } else if(strpos($status, 'R') !== false){
                    echo '<label class="badge badge-danger">REVOKED</label>';
                  }
                    
                  echo '</td>
                  <td> '.$userID.' </td>
  
                </tr>';
                }
              }
            
            ?>
            </tbody>
          </table>
        </div>  
        </div>

        <!-- REVOKED ACCOUNT -->
          <div class="tab-pane fade col-12" id="revoked-account" role="tabpanel" aria-labelledby="revoked-account">
          <div class="table-responsive">
          <table id="order-listing-revoked"  class="table table-hover">
            <thead>
              <tr>
              <th> Username </th>
                <th> User Email </th>
                <th> Status </th>
                <th> User ID </th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $q1="SELECT * FROM USER WHERE USER_STATUS LIKE 'R'
                   ORDER BY (CREATE_AT) DESC";
              $r1 = mysqli_query($conn,$q1);
              if ( mysqli_num_rows($r1)> 0){
                while($row = mysqli_fetch_assoc($r1)){
                  $userID = $row['USER_ID'];
                  $useremail = $row['USER_EMAIL'];
                  $username = $row ['USER_NAME'];
                  $date = $row ['CREATE_AT'];
                 // $date = date("j M y",strtotime($date));
                 $status = $row ['USER_STATUS'];
                 $url='window.location="user-details.php?userID='.$userID.'"';

                  echo '<tr class="cursor-pointer" onclick='.$url.'>
                  <td>
                    <img src="assets/images/faces/face1.jpg" class="mr-2" alt="image"> '.$username.'</td>
                    <td>'.$useremail.' </td>
                  <td>';
                  if(strpos($status, 'A') !== false){
                    echo '<label class="badge badge-success">ACTIVE</label>';
                  } else if(strpos($status, 'R') !== false){
                    echo '<label class="badge badge-danger">REVOKED</label>';
                  }
                    
                  echo '</td>
                  <td> '.$userID.' </td>
  
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


  </body>
</html>