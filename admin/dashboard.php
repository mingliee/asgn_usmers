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
<!-- <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css"> -->
<link media="all" type="text/css" rel="stylesheet" href="assets/plugins/@mdi/font/css/materialdesignicons.min.css">
<link media="all" type="text/css" rel="stylesheet" href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
<!-- end plugin css -->

<link media="all" type="text/css" rel="stylesheet" href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">

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
  include '../config.php';

  $getTotalAdSQL="SELECT ((SELECT COUNT(*) AS TOTAL_ADS FROM ADS_ITEM) +
                  (SELECT COUNT(*) AS TOTAL_ADS FROM ADS_ACCOM)  +
                  (SELECT COUNT(*) AS TOTAL_ADS FROM ADS_JOB) ) 
                  AS TOTAL_ADS FROM DUAL";
  $getTotalAdResult = mysqli_query($conn,$getTotalAdSQL);
  $total = mysqli_fetch_row($getTotalAdResult);
  $TotalAds=$total[0];
  // echo 'total Ads:'.$TotalAds;

  $getCatSQL="SELECT COUNT(*) AS TOTAL_ADS,'ITEM' AS TABLE_NAME FROM ADS_ITEM 
  UNION SELECT COUNT(*) AS TOTAL_ADS,'ACCOMMODATION' AS TABLE_NAME FROM ADS_ACCOM
  UNION SELECT COUNT(*) AS TOTAL_ADS,'JOB' AS TABLE_NAME FROM ADS_JOB";
  $getCatResult = mysqli_query($conn,$getCatSQL);
  if (!$getCatResult) {
    echo 'Could not run query: ' . mysqli_connect_error();
    exit;
  }
  else{

    $i=0;
    $totalAdsByCat=0;
    // $dataPoints = array();
    $CatName="";
    $CatPercentage="";
    while($rowCount = mysqli_fetch_assoc($getCatResult)){
      $catPercent= round(($rowCount['TOTAL_ADS']/$TotalAds)*100,2);
/*       $point = array('label' => $rowCount['TABLE_NAME'] , 'y' => $catPercent);
      echo '<br>table name:'.$rowCount['TABLE_NAME'] ;
      echo '<br>catPercent:'.$catPercent;
      array_push($dataPoints, $point); */
      $ads[$i] = $rowCount["TOTAL_ADS"];
      $totalAdsByCat=$totalAdsByCat+$rowCount["TOTAL_ADS"];
      $CatName=$CatName."'".$rowCount['TABLE_NAME']."', ";
      $CatPercentage=$CatPercentage.$catPercent.", ";
      $i++;
    }

  }

?>

<script>
	window.onload = function() {
    var ctx = document.getElementById('visit-sale-chart').getContext("2d");

      var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
      gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
      var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';
      
      var gradientStrokeGreen = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStrokeGreen.addColorStop(0, 'rgba(6, 185, 157, 1)');
      gradientStrokeGreen.addColorStop(1, 'rgba(132, 217, 210, 1)');
      var gradientLegendGreen = 'linear-gradient(to right, rgba(6, 185, 157, 1), rgba(132, 217, 210, 1))';      

      var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 360);
      gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
      gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
      var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

      var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
      gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
      var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

 
    if ($("#tc").length) {
      var trafficChartData = {
        datasets: [{
          data: [<?php echo $CatPercentage; ?>],
          backgroundColor: [
            gradientStrokeGreen,
            gradientStrokeRed,
            gradientStrokeBlue
          ],
          hoverBackgroundColor: [
            gradientStrokeGreen,
            gradientStrokeRed,
            gradientStrokeBlue
          ],
          borderColor: [
            gradientStrokeGreen,
            gradientStrokeRed,
            gradientStrokeBlue
          ],
          legendColor: [
            gradientLegendGreen,
            gradientLegendRed,
            gradientLegendBlue

          ]
        }],
    
        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
          <?php echo $CatName; ?>
        ]
      };
      var trafficChartOptions = {
        responsive: true,
        animation: {
          animateScale: true,
          animateRotate: true
        },
        legend: false,
        legendCallback: function(chart) {
          var text = []; 
          text.push('<ul>'); 
          for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) { 
              text.push('<li><span class="legend-dots" style="background:' + 
              trafficChartData.datasets[0].legendColor[i] + 
                          '"></span>'); 
              if (trafficChartData.labels[i]) { 
                  text.push(trafficChartData.labels[i]); 
              }
              text.push('<span class="float-right">'+trafficChartData.datasets[0].data[i]+"%"+'</span>')
              text.push('</li>'); 
          } 
          text.push('</ul>'); 
          return text.join('');
        }
      };
      var trafficChartCanvas = $("#tc").get(0).getContext("2d");
      var trafficChart = new Chart(trafficChartCanvas, {
        type: 'doughnut',
        data: trafficChartData,
        options: trafficChartOptions
      });
      $("#tc-legend").html(trafficChart.generateLegend());      
    }
}
</script>

<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-home"></i>
    </span> Dashboard </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">
        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
      </li>
    </ul>
  </nav>
</div>
<div class="row">
  <div class="col-md-3 stretch-card grid-margin">
    <div class="card bg-gradient-danger card-img-holder text-white">
      <div class="card-body">
        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
        <h4 class="font-weight-normal mb-3">Weekly New Ads <i class="mdi mdi-chart-line mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-4"> 150</h2>
        <h6 class="card-text">Increased by 60%</h6>
      </div>
    </div>
  </div>
  <div class="col-md-3 stretch-card grid-margin">
    <div class="card bg-gradient-info card-img-holder text-white">
      <div class="card-body">
        <img src="assets//images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
        <h4 class="font-weight-normal mb-3">Weekly New User <i class="mdi mdi-human-greeting mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-4">4</h2>
        <h6 class="card-text">Decreased by 10%</h6>
      </div>
    </div>
  </div>
  <div class="col-md-3 stretch-card grid-margin">
    <div class="card bg-gradient-success card-img-holder text-white">
      <div class="card-body">
        <img src="assets//images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
        <h4 class="font-weight-normal mb-3">Weekly Sold Ads<i class="mdi mdi-cash-check mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-4">9</h2>
        <h6 class="card-text">Increased by 5%</h6>
      </div>
    </div>
  </div>
  <div class="col-md-3 stretch-card grid-margin">
    <div class="card bg-gradient-warning card-img-holder text-white">
      <div class="card-body">
        <img src="assets//images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
        <h4 class="font-weight-normal mb-3">Weekly Report Tickets<i class="mdi mdi-ticket-outline mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-4">0</h2>
        <h6 class="card-text">Increased by 0%</h6>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-7 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="clearfix">
          <h4 class="card-title float-left">New Ads Statistics</h4>
          <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
        </div>
        <canvas id="visit-sale-chart" class="mt-4"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-5 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Ad Category</h4>
        <div style="height:200px">
        <canvas id="tc"></canvas>
        <div id="tc-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
        </div>
        <!-- <canvas id="traffic-chart"></canvas>
        <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
       -->
       </div>
       <span>*May not total to 100% due to rounding</span>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="card-inner-body">
        <h4 class="card-title">Recent Complaints</h4>
        <a href="report-tickets.php">See more...</a>
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th> Reported By </th>
                <th> Subject </th>
                <th> Status </th>
                <th> Report Date </th>
                <th> Report ID </th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $retrieveReportSQL="SELECT * FROM REPORT 
                                  INNER JOIN USER ON (REPORT.REPORTED_BY_USER_ID=USER.USER_ID )
                                  INNER JOIN REPORT_REASON ON (REPORT.REASON=REPORT_REASON.REASON_VALUE)
                                  WHERE REPORT.STATUS LIKE 'OPEN'
                                  OR REPORT.STATUS LIKE 'ON HOLD'
                                  OR REPORT.STATUS LIKE 'PROGRESS'
                                  ORDER BY (REPORT_DATE) DESC
                                  LIMIT 5";
              $retrieveReportResult = mysqli_query($conn,$retrieveReportSQL);
              if ( mysqli_num_rows($retrieveReportResult)> 0){
                while($row = mysqli_fetch_assoc($retrieveReportResult)){
                  $reportID = $row['REPORT_ID'];
                  $reportType = $row['REPORT_TYPE'];
                  $byUserID = $row ['REPORTED_BY_USER_ID'];
                  $byUserName = $row ['USER_NAME'];
                  $reason = $row ['REASON_NAME'];
                  $descp = $row ['REPORT_DESCP'];
                  $date = $row ['REPORT_DATE'];
                 // $date = date("j M y",strtotime($date));
                 $status = $row ['STATUS'];
                  $url='window.location="report-details.php?reportID='.$reportID.'"';
                  echo '<tr class="cursor-pointer" onclick='.$url.'>
                  <td>
                    <img src="assets/images/faces/face1.jpg" class="mr-2" alt="image"> '.$byUserName.'</td>
                    <td> ['.$reportType.'] '.$reason.' </td>
                  <td>';
                  if(strpos($status, 'OPEN') !== false){
                    echo '<label class="badge badge-success">OPEN</label>';
                  } else if(strpos($status, 'DONE') !== false){
                    echo '<label class="badge badge-primary">DONE</label>';
                  } else if(strpos($status, 'PROGRESS') !== false){
                    echo '<label class="badge badge-warning">IN PROGRESS</label>';
                  } else if(strpos($status, 'ON HOLD') !== false){
                    echo '<label class="badge badge-info">ON HOLD</label>';
                  } else if(strpos($status, 'REJECTED') !== false){
                    echo '<label class="badge badge-danger">REJECTED</label>';
                  }
                    
                  echo '</td>
                  <td> '.$date.' </td>
                  <td> '.$reportID.' </td>
  
                </tr>';
                }
              } else{
                echo 'No Report Tickets Available';
              }
            
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
      <div class="card-inner-body">
        <h4 class="card-title">Recent Support Tickets</h4>
        <a href="support-tickets.php">See more...</a>
        </div>
        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
              <tr>
                <th> Submitted By </th>
                <th> Subject </th>
                <th> Status </th>
                <th> Support Date </th>
                <th> Support ID </th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $retrieveSupportSQL="SELECT * FROM SUPPORT 
                                  INNER JOIN USER ON (SUPPORT.USER_ID=USER.USER_ID)
                                  WHERE STATUS LIKE 'OPEN'
                                  OR STATUS LIKE 'ON HOLD'
                                  OR STATUS LIKE 'PROGRESS'
                                  ORDER BY (SUPPORT_DATE) DESC
                                  LIMIT 5";
              $retrieveSupportResult = mysqli_query($conn,$retrieveSupportSQL);
              if ( mysqli_num_rows($retrieveSupportResult)> 0){
                while($row = mysqli_fetch_assoc($retrieveSupportResult)){
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
                  } else if(strpos($status, 'PROGRESS') !== false){
                    echo '<label class="badge badge-warning">IN PROGRESS</label>';
                  } else if(strpos($status, 'ON HOLD') !== false){
                    echo '<label class="badge badge-info">ON HOLD</label>';
                  }
                    
                  echo '</td>
                  <td> '.$date.' </td>
                  <td> '.$supportID.' </td>
  
                </tr>';
                }
              } else{
                echo 'No Support Tickets Available';
              }
            
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <div class="row">
  <div class="col-xl-5 grid-margin stretch-card">
    <div class="card">
      <div class="card-body p-0 d-flex">
        <div id="inline-datepicker" class="datepicker datepicker-custom"></div>
      </div>
    </div>
  </div>
</div> -->
<div class="row">
  <div class="col-md-7 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Project Status</h4>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th> # </th>
                <th> Name </th>
                <th> Due Date </th>
                <th> Progress </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td> 1 </td>
                <td> Herman Beck </td>
                <td> May 15, 2015 </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
              </tr>
              <tr>
                <td> 2 </td>
                <td> Messsy Adam </td>
                <td> Jul 01, 2015 </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
              </tr>
              <tr>
                <td> 3 </td>
                <td> John Richards </td>
                <td> Apr 12, 2015 </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
              </tr>
              <tr>
                <td> 4 </td>
                <td> Peter Meggik </td>
                <td> May 15, 2015 </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
              </tr>
              <tr>
                <td> 5 </td>
                <td> Edward </td>
                <td> May 03, 2015 </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
              </tr>
              <tr>
                <td> 5 </td>
                <td> Ronald </td>
                <td> Jun 05, 2015 </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-5 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title text-white">Todo</h4>
        <div class="add-items d-flex">
          <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?">
          <button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
        </div>
        <div class="list-wrapper">
          <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
            <li>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox"> Meeting with Alisa </label>
              </div>
              <i class="remove mdi mdi-close-circle-outline"></i>
            </li>
            <li class="completed">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox" checked> Call John </label>
              </div>
              <i class="remove mdi mdi-close-circle-outline"></i>
            </li>
            <li>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox"> Create invoice </label>
              </div>
              <i class="remove mdi mdi-close-circle-outline"></i>
            </li>
            <li>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox"> Print Statements </label>
              </div>
              <i class="remove mdi mdi-close-circle-outline"></i>
            </li>
            <li class="completed">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
              </div>
              <i class="remove mdi mdi-close-circle-outline"></i>
            </li>
            <li>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox"> Pick up kids from school </label>
              </div>
              <i class="remove mdi mdi-close-circle-outline"></i>
            </li>
          </ul>
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
    <script src="assets/plugins/chartjs/chart.min.js"></script>
  <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <!-- end plugin js -->

  <!-- common js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- end common js -->

    <script src="assets/js/dashboard.js"></script>
</body>
</html>