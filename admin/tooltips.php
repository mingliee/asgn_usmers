<!DOCTYPE html>
<html>
<head>
  <title>Purple Pro Laravel Dashboard Template</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="QWbVg2YPfbjHF5EKJU3uC598YFYKIbiR7NI9ehM9">
  
  <link rel="shortcut icon" href="favicon.ico">

  <!-- plugin css -->
  <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/@mdi/font/css/materialdesignicons.min.css">
  <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
  <!-- end plugin css -->

  
  <!-- common css -->
  <link media="all" type="text/css" rel="stylesheet" href="css/app.css">
  <!-- end common css -->

  </head>
<body data-base-url="https://bootstrapdash.com/demo/purple/laravel/template/demo_1">

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
  <h3 class="page-title"> Tooltips </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">UI Elements</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tooltips</li>
    </ol>
  </nav>
</div>
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic tooltip</h4>
        <p class="card-description">Basic tooltip demo that appears on hover</p>
        <p>Hover the below button for interactive demo</p>
        <button class="btn btn-gradient-primary" data-toggle="tooltip" data-placement="right" title="Basic tooltip">Hover me</button>
      </div>
      <div class="card-body">
        <h4 class="card-title">Tooltip positions</h4>
        <p class="card-description">Add attribute <code>data-placement={position}</code> to the element</p>
        <div class="tooltip-static-demo">
          <div class="tooltip bs-tooltip-top bs-tooltip-top-demo" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner"> Top Tooltip </div>
          </div>
          <div class="tooltip bs-tooltip-right bs-tooltip-right-demo" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner"> Right Tooltip </div>
          </div>
          <div class="tooltip bs-tooltip-bottom bs-tooltip-bottom-demo" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner"> Bottom Tooltip </div>
          </div>
          <div class="tooltip bs-tooltip-left bs-tooltip-left-demo" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner"> Left Tooltip </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <h4 class="card-title">Tooltip colors</h4>
        <p class="card-description">Add attribute <code>data-custom-class="tooltip-{color}"</code> to the element</p>
        <div class="tooltip-static-demo">
          <div class="tooltip bs-tooltip-bottom bs-tooltip-bottom-demo tooltip-success" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner"> Success </div>
          </div>
          <div class="tooltip bs-tooltip-bottom bs-tooltip-bottom-demo tooltip-info" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner"> Info </div>
          </div>
          <div class="tooltip bs-tooltip-bottom bs-tooltip-bottom-demo tooltip-warning" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner"> Warning </div>
          </div>
          <div class="tooltip bs-tooltip-bottom bs-tooltip-bottom-demo tooltip-primary" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner"> Primary </div>
          </div>
          <div class="tooltip bs-tooltip-bottom bs-tooltip-bottom-demo tooltip-danger" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner"> Danger </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic popover</h4>
        <p class="card-description">Basic popover demo that appears on click</p>
        <p>Click the below button for interactive demo</p>
        <button type="button" class="btn btn-gradient-primary" data-toggle="popover" title="Popover title" data-content="Sed posuere consectetur est at lobortis. Aenean eu leo quam.">Click me</button>
      </div>
      <div class="card-body">
        <h4 class="card-title">Popover positions</h4>
        <p class="card-description">Add attribute <code>data-placement="{position}"</code> to the element</p>
        <div class="popover-static-demo">
          <div class="popover bs-popover-top bs-popover-top-demo">
            <div class="arrow"></div>
            <h3 class="popover-header">Popover top</h3>
            <div class="popover-body">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.</p>
            </div>
          </div>
          <div class="popover bs-popover-right bs-popover-right-demo">
            <div class="arrow"></div>
            <h3 class="popover-header">Popover right</h3>
            <div class="popover-body">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.</p>
            </div>
          </div>
          <div class="popover bs-popover-bottom bs-popover-bottom-demo">
            <div class="arrow"></div>
            <h3 class="popover-header">Popover bottom</h3>
            <div class="popover-body">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.</p>
            </div>
          </div>
          <div class="popover bs-popover-left bs-popover-left-demo">
            <div class="arrow"></div>
            <h3 class="popover-header">Popover left</h3>
            <div class="popover-body">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.</p>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Popover Colors</h4>
        <p class="card-description">Add attribute <code>data-custom-class="popover-{color}"</code> to the element</p>
        <div class="popover-static-demo">
          <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-success">
            <div class="arrow"></div>
            <h3 class="popover-header">Success</h3>
            <div class="popover-body">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.</p>
            </div>
          </div>
          <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-warning">
            <div class="arrow"></div>
            <h3 class="popover-header">Warning</h3>
            <div class="popover-body">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.</p>
            </div>
          </div>
          <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-danger">
            <div class="arrow"></div>
            <h3 class="popover-header">Danger</h3>
            <div class="popover-body">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.</p>
            </div>
          </div>
          <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-info">
            <div class="arrow"></div>
            <h3 class="popover-header">Info</h3>
            <div class="popover-body">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.</p>
            </div>
          </div>
          <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-primary">
            <div class="arrow"></div>
            <h3 class="popover-header">Primary</h3>
            <div class="popover-body">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.</p>
            </div>
          </div>
          <div class="clearfix"></div>
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
</footer>      </div>
    </div>
  </div>

  <!-- base js -->
  <script src="js/app.js"></script>
  <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <!-- end base js -->

  <!-- plugin js -->
    <!-- end plugin js -->

  <!-- common js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- end common js -->

    <script src="assets/js/popover.js"></script>
</body>
</html>