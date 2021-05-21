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

$retrieveReportTicketSQL="SELECT COUNT(*) AS NUM,'ALL' AS CATEGORY FROM SUPPORT 

UNION SELECT COUNT(*) AS NUM,'OPEN' AS CATEGORY FROM SUPPORT 
 WHERE SUPPORT.STATUS LIKE 'OPEN'
UNION SELECT COUNT(*) AS NUM,'PROGRESS' AS CATEGORY FROM SUPPORT 
 WHERE SUPPORT.STATUS LIKE 'PROGRESS'
UNION SELECT COUNT(*) AS NUM,'ON HOLD' AS CATEGORY FROM SUPPORT 
 WHERE SUPPORT.STATUS LIKE 'ON HOLD'
UNION SELECT COUNT(*) AS NUM,'REJECTED' AS CATEGORY FROM SUPPORT 
 WHERE SUPPORT.STATUS LIKE 'REJECTED'
UNION SELECT COUNT(*) AS NUM,'CLOSED' AS CATEGORY FROM SUPPORT 
 WHERE SUPPORT.STATUS LIKE 'CLOSED'";
$retrieveReportTicketResult = mysqli_query($conn,$retrieveReportTicketSQL);

//ALL - OPEN - PROGRESS - ON HOLD - REJECTED - CLOSED
$i=0;
if ( mysqli_num_rows($retrieveReportTicketResult)> 0){
    while($row = mysqli_fetch_assoc($retrieveReportTicketResult)){
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
            <h5 class="page-title mb-n2">Support Tickets</h5>
            <p class="mt-2 mb-n1 ml-3 text-muted"><?php echo $num[0]?> Tickets</p>
          </div>
        </div>
        <div class="nav-scroller">
          <ul class="nav nav-tabs tickets-tab-switch" role="tablist">
          <li class="nav-item">
              <a class="nav-link rounded active" id="all-tab" data-toggle="tab" href="#all-tickets" role="tab" aria-controls="all-tickets" aria-selected="true">All Tickets <div class="badge"><?php echo $num[0]?></div></a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded" id="open-tab" data-toggle="tab" href="#open-tickets" role="tab" aria-controls="open-tickets" aria-selected="true">Open Tickets <div class="badge"><?php echo $num[1]?></div></a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded" id="pending-tab" data-toggle="tab" href="#pending-tickets" role="tab" aria-controls="pending-tickets" aria-selected="false">In Progress Tickets <div class="badge"><?php echo $num[2]?> </div></a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded" id="onhold-tab" data-toggle="tab" href="#onhold-tickets" role="tab" aria-controls="onhold-tickets" aria-selected="false">On-hold Tickets <div class="badge"><?php echo $num[3]?> </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded" id="rejected-tab" data-toggle="tab" href="#rejected-tickets" role="tab" aria-controls="rejected-tickets" aria-selected="false">Rejected Tickets <div class="badge"><?php echo $num[4]?> </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded" id="closed-tab" data-toggle="tab" href="#closed-tickets" role="tab" aria-controls="closed-tickets" aria-selected="false">Closed Tickets <div class="badge"><?php echo $num[5]?> </div>
              </a>
            </li>
          </ul>
        </div>
        <div class="tab-content border-0 tab-content-basic">
          <!-- ALL TICKETS -->
          <div class="tab-pane fade show active col-12" id="all-tickets" role="tabpanel" aria-labelledby="all-tickets">
          <div class="table-responsive">
          <table id="order-listing-all"  class="table table-hover">
            <thead>
              <tr>
                <th> Submitted By</th>
                <th> Subject </th>
                <th> Status </th>
                <th> Support Date </th>
                <th> Support ID </th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $retrieveReportSQL="SELECT * FROM SUPPORT 
                                  INNER JOIN USER ON (SUPPORT.USER_ID=USER.USER_ID) 
                                  ORDER BY (SUPPORT_DATE) DESC";
              $retrieveReportResult = mysqli_query($conn,$retrieveReportSQL);
              if ( mysqli_num_rows($retrieveReportResult)> 0){
                while($row = mysqli_fetch_assoc($retrieveReportResult)){
                  $supportID = $row['SUPPORT_ID'];
                  $byUserID = $row ['USER_ID'];
                  $byUserName = $row ['USER_NAME'];
                  $reason = $row ['SUPPORT_SUBJECT'];
                  $descp = $row ['SUPPORT_DESCP'];
                  $date = $row ['SUPPORT_DATE'];
                 // $date = date("j M y",strtotime($date));
                 $status = $row ['STATUS'];
                 $url='window.location="support-details.php?supportID='.$supportID.'"';

                  echo '<tr class="cursor-pointer" onclick='.$url.'>
                  <td>
                    <img src="assets/images/faces/face1.jpg" class="mr-2" alt="image"> '.$byUserName.'</td>
                  <td>'.$reason.' </td>
                  <td>';
                  if(strpos($status, 'OPEN') !== false){
                    echo '<label class="badge badge-success">OPEN</label>';
                  } else if(strpos($status, 'CLOSED') !== false){
                    echo '<label class="badge badge-primary">CLOSED</label>';
                  } else if(strpos($status, 'PROGRESS') !== false){
                    echo '<label class="badge badge-warning">IN PROGRESS</label>';
                  } else if(strpos($status, 'ON HOLD') !== false){
                    echo '<label class="badge badge-info">ON HOLD</label>';
                  } else if(strpos($status, 'REJECTED') !== false){
                    echo '<label class="badge badge-danger">REJECTED</label>';
                  }
                    
                  echo '</td>
                  <td> '.$date.' </td>
                  <td> '.$supportID.' </td>
  
                </tr>';
                }
              }
            
            ?>
            </tbody>
          </table>
        </div>  
        </div>
        <!-- OPEN TICKETS -->
          <div class="tab-pane fade col-12" id="open-tickets" role="tabpanel" aria-labelledby="open-tickets">
          <div class="table-responsive">
          <table id="order-listing-open"  class="table table-hover">
            <thead>
              <tr>
                <th> Submitted By</th>
                <th> Subject </th>
                <th> Status </th>
                <th> Support Date </th>
                <th> Support ID </th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $retrieveReportSQL="SELECT * FROM SUPPORT 
                                  INNER JOIN USER ON (SUPPORT.USER_ID=USER.USER_ID)
                                  WHERE SUPPORT.STATUS LIKE 'OPEN'
                                  ORDER BY (SUPPORT_DATE) DESC";
              $retrieveReportResult = mysqli_query($conn,$retrieveReportSQL);
              if ( mysqli_num_rows($retrieveReportResult)> 0){
                while($row = mysqli_fetch_assoc($retrieveReportResult)){
                    $supportID = $row['SUPPORT_ID'];
                    $byUserID = $row ['USER_ID'];
                    $byUserName = $row ['USER_NAME'];
                    $reason = $row ['SUPPORT_SUBJECT'];
                    $descp = $row ['SUPPORT_DESCP'];
                    $date = $row ['SUPPORT_DATE'];
                 // $date = date("j M y",strtotime($date));
                 $status = $row ['STATUS'];
                  $url='window.location="support-details.php?supportID='.$supportID.'"';

                  echo '<tr class="cursor-pointer" onclick='.$url.'>
                  <td>
                    <img src="assets/images/faces/face1.jpg" class="mr-2" alt="image"> '.$byUserName.'</td>
                  <td>'.$reason.' </td>
                  <td>';
                  if(strpos($status, 'OPEN') !== false){
                    echo '<label class="badge badge-success">OPEN</label>';
                  }
                    
                  echo '</td>
                  <td> '.$date.' </td>
                  <td> '.$supportID.' </td>
  
                </tr>';
                }
              }
            
            ?>
            </tbody>
          </table>
        </div>  
        </div>

        <!-- PENDING TICKETS -->
          <div class="tab-pane fade col-12" id="pending-tickets" role="tabpanel" aria-labelledby="pending-tickets">
          <div class="table-responsive">
          <table id="order-listing-progress"  class="table table-hover">
            <thead>
              <tr>
                <th> Submitted By</th>
                <th> Subject </th>
                <th> Status </th>
                <th> Support Date </th>
                <th> Support ID </th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $retrieveReportSQL="SELECT * FROM SUPPORT 
                                  INNER JOIN USER ON (SUPPORT.USER_ID=USER.USER_ID) 
                                  WHERE SUPPORT.STATUS LIKE 'PROGRESS'
                                  ORDER BY (SUPPORT_DATE) DESC";
              $retrieveReportResult = mysqli_query($conn,$retrieveReportSQL);
              if ( mysqli_num_rows($retrieveReportResult)> 0){
                while($row = mysqli_fetch_assoc($retrieveReportResult)){
                    $supportID = $row['SUPPORT_ID'];
                    $byUserID = $row ['USER_ID'];
                    $byUserName = $row ['USER_NAME'];
                    $reason = $row ['SUPPORT_SUBJECT'];
                    $descp = $row ['SUPPORT_DESCP'];
                    $date = $row ['SUPPORT_DATE'];
                 // $date = date("j M y",strtotime($date));
                 $status = $row ['STATUS'];
                  $url='window.location="support-details.php?supportID='.$supportID.'"';

                  echo '<tr class="cursor-pointer" onclick='.$url.'>
                  <td>
                    <img src="assets/images/faces/face1.jpg" class="mr-2" alt="image"> '.$byUserName.'</td>
                  <td>'.$reason.' </td>
                  <td>';
                  if(strpos($status, 'PROGRESS') !== false){
                    echo '<label class="badge badge-warning">IN PROGRESS</label>';
                  }
                    
                  echo '</td>
                  <td> '.$date.' </td>
                  <td> '.$supportID.' </td>
  
                </tr>';
                }
              }
            
            ?>
            </tbody>
          </table>
        </div>
          </div>
         <!-- ON HOLD TICKETS -->
          <div class="tab-pane fade" id="onhold-tickets" role="tabpanel" aria-labelledby="onhold-tickets">
          <div class="table-responsive">
          <table id="order-listing-onhold"  class="table table-hover">
            <thead>
              <tr>
                <th> Submitted By</th>
                <th> Subject </th>
                <th> Status </th>
                <th> Support Date </th>
                <th> Support ID </th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $retrieveReportSQL="SELECT * FROM SUPPORT 
                                  INNER JOIN USER ON (SUPPORT.USER_ID=USER.USER_ID) 
                                  WHERE SUPPORT.STATUS LIKE 'ON HOLD'
                                  ORDER BY (SUPPORT_DATE) DESC";
              $retrieveReportResult = mysqli_query($conn,$retrieveReportSQL);
              if ( mysqli_num_rows($retrieveReportResult)> 0){
                while($row = mysqli_fetch_assoc($retrieveReportResult)){
                    $supportID = $row['SUPPORT_ID'];
                    $byUserID = $row ['USER_ID'];
                    $byUserName = $row ['USER_NAME'];
                    $reason = $row ['SUPPORT_SUBJECT'];
                    $descp = $row ['SUPPORT_DESCP'];
                    $date = $row ['SUPPORT_DATE'];
                 // $date = date("j M y",strtotime($date));
                 $status = $row ['STATUS'];
                  $url='window.location="support-details.php?supportID='.$supportID.'"';

                  echo '<tr class="cursor-pointer" onclick='.$url.'>
                  <td>
                    <img src="assets/images/faces/face1.jpg" class="mr-2" alt="image"> '.$byUserName.'</td>
                  <td>'.$reason.' </td>
                  <td>';
                  if(strpos($status, 'ON HOLD') !== false){
                    echo '<label class="badge badge-info">ON HOLD</label>';
                  }
                    
                  echo '</td>
                  <td> '.$date.' </td>
                  <td> '.$supportID.' </td>
  
                </tr>';
                }
              }
            
            ?>
            </tbody>
          </table>
          </div>
          </div>
        <!-- REJECTED TICKETS -->
          <div class="tab-pane fade" id="rejected-tickets" role="tabpanel" aria-labelledby="rejected-tickets">
          <div class="table-responsive">
          <table id="order-listing-rejected"  class="table table-hover">
            <thead>
              <tr>
                <th> Submitted By</th>
                <th> Subject </th>
                <th> Status </th>
                <th> Support Date </th>
                <th> Support ID </th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $retrieveReportSQL="SELECT * FROM SUPPORT 
                                  INNER JOIN USER ON (SUPPORT.USER_ID=USER.USER_ID) 
                                  WHERE SUPPORT.STATUS LIKE 'REJECTED'
                                  ORDER BY (SUPPORT_DATE) DESC";
              $retrieveReportResult = mysqli_query($conn,$retrieveReportSQL);
              if ( mysqli_num_rows($retrieveReportResult)> 0){
                while($row = mysqli_fetch_assoc($retrieveReportResult)){
                    $supportID = $row['SUPPORT_ID'];
                    $byUserID = $row ['USER_ID'];
                    $byUserName = $row ['USER_NAME'];
                    $reason = $row ['SUPPORT_SUBJECT'];
                    $descp = $row ['SUPPORT_DESCP'];
                    $date = $row ['SUPPORT_DATE'];
                 // $date = date("j M y",strtotime($date));
                 $status = $row ['STATUS'];
                  $url='window.location="support-details.php?supportID='.$supportID.'"';

                  echo '<tr class="cursor-pointer" onclick='.$url.'>
                  <td>
                    <img src="assets/images/faces/face1.jpg" class="mr-2" alt="image"> '.$byUserName.'</td>
                  <td>'.$reason.' </td>
                  <td>';
                  if(strpos($status, 'REJECTED') !== false){
                    echo '<label class="badge badge-danger">REJECTED</label>';
                  }
                    
                  echo '</td>
                  <td> '.$date.' </td>
                  <td> '.$supportID.' </td>
  
                </tr>';
                }
              } 
            
            ?>
            </tbody>
          </table>
          </div>
          </div>
        <!-- CLOSED TICKETS -->
          <div class="tab-pane fade" id="closed-tickets" role="tabpanel" aria-labelledby="closed-tickets">
          <div class="table-responsive">
          <table id="order-listing-closed"  class="table table-hover">
            <thead>
              <tr>
                <th> Submitted By</th>
                <th> Subject </th>
                <th> Status </th>
                <th> Support Date </th>
                <th> Support ID </th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $retrieveReportSQL="SELECT * FROM SUPPORT 
                                  INNER JOIN USER ON (SUPPORT.USER_ID=USER.USER_ID) 
                                  WHERE SUPPORT.STATUS LIKE 'CLOSED'
                                  ORDER BY (SUPPORT_DATE) DESC";
              $retrieveReportResult = mysqli_query($conn,$retrieveReportSQL);
              if ( mysqli_num_rows($retrieveReportResult)> 0){
                while($row = mysqli_fetch_assoc($retrieveReportResult)){
                    $supportID = $row['SUPPORT_ID'];
                    $byUserID = $row ['USER_ID'];
                    $byUserName = $row ['USER_NAME'];
                    $reason = $row ['SUPPORT_SUBJECT'];
                    $descp = $row ['SUPPORT_DESCP'];
                    $date = $row ['SUPPORT_DATE'];
                 // $date = date("j M y",strtotime($date));
                 $status = $row ['STATUS'];
                  $url='window.location="support-details.php?supportID='.$supportID.'"';

                  echo '<tr class="cursor-pointer" onclick='.$url.'>
                  <td>
                    <img src="assets/images/faces/face1.jpg" class="mr-2" alt="image"> '.$byUserName.'</td>
                  <td>'.$reason.' </td>
                  <td>';
                  if(strpos($status, 'CLOSED') !== false){
                    echo '<label class="badge badge-primary">CLOSED</label>';
                  }
                    
                  echo '</td>
                  <td> '.$date.' </td>
                  <td> '.$supportID.' </td>
  
                </tr>';
                }
              } 
            
            ?>
            </tbody>
          </table>
          </div>
          </div>

        </div>
<!--         <nav class="mt-4">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#">
                <i class="mdi mdi-chevron-left"></i>
              </a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">4</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">
                <i class="mdi mdi-chevron-right"></i>
              </a>
            </li>
          </ul>
        </nav> -->
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