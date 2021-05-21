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

    <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/jquery-toast-plugin/jquery.toast.min.css">

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
  <h3 class="page-title"> Notifications </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dialogs</a></li>
      <li class="breadcrumb-item active" aria-current="page">Notifications</li>
    </ol>
  </nav>
</div>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Jquery-toast styles</h4>
        <p class="card-description mb-0"> Click on the below buttons for notifications in different styles. </p>
        <p class="card-description"> The <code>icon</code> property can be used to specify the predefined types of toasts - success, info, warning and danger </p>
        <div class="template-demo d-flex justify-content-between flex-wrap">
          <button type="button" class="btn btn-gradient-success btn-fw" onclick="showSuccessToast()">Success</button>
          <button type="button" class="btn btn-gradient-info btn-fw" onclick="showInfoToast()">Info</button>
          <button type="button" class="btn btn-gradient-warning btn-fw" onclick="showWarningToast()">Warning</button>
          <button type="button" class="btn btn-gradient-danger btn-fw" onclick="showDangerToast()">Danger</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Jquery-toast positions</h4>
        <p class="card-description"> The <code>position</code> property can be used to specify the predefined positions of toasts </p>
        <div class="template-demo d-flex justify-content-between flex-wrap">
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="showToastPosition('bottom-left')">Bottom-left</button>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="showToastPosition('bottom-right')">Bottom-right</button>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="showToastPosition('bottom-center')">Bottom-center</button>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="showToastPosition('top-left')">Top-left</button>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="showToastPosition('top-right')">Top-right</button>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="showToastPosition('top-center')">Top-center</button>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="showToastPosition('mid-center')">Mid-center</button>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="showToastInCustomPosition()">Custom</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Bootstrap alert</h4>
        <p class="car-description">Add class <code>.alert .alert-*</code></p>
        <div class="alert alert-success" role="alert"> You successfully read this important alert message. </div>
        <div class="alert alert-info" role="alert"> This alert needs your attention, but it's not that important. </div>
        <div class="alert alert-warning" role="alert"> Better check yourself, you're not looking too good. </div>
        <div class="alert alert-danger" role="alert"> Change a few things up and try submitting again. </div>
        <div class="alert alert-primary" role="alert"> This is a primary alert </div>
        <div class="alert alert-secondary" role="alert"> This alert is not so important. </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Custom alerts</h4>
        <p class="card-description"> Custom HTML inside alert </p>
        <div class="card card-inverse-secondary mb-5">
          <div class="card-body">
            <p class="mb-4"> Well done! You successfully read this important alert message. </p>
            <button class="btn btn-gradient-secondary">Ok</button>
            <button class="btn btn-light">Cancel</button>
          </div>
        </div>
        <div class="card card-inverse-info">
          <div class="card-body">
            <p class="mb-4"> Heads up! This alert needs your attention, but it's not super important. </p>
            <button class="btn btn-gradient-info">Ok</button>
            <button class="btn btn-light">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Bootstrap alerts in fill colors</h4>
        <p class="card-description"> Add class <code>.alert-fill-*</code> with <code>.alert</code>
        </p>
        <div class="alert alert-fill-primary" role="alert">
          <i class="mdi mdi-alert-circle"></i> There! This is a primary alert. </div>
        <div class="alert alert-fill-success" role="alert">
          <i class="mdi mdi-alert-circle"></i> Well done! You successfully read this important alert message. </div>
        <div class="alert alert-fill-info" role="alert">
          <i class="mdi mdi-alert-circle"></i> Heads up! This alert needs your attention, but it's not super important. </div>
        <div class="alert alert-fill-warning" role="alert">
          <i class="mdi mdi-alert-circle"></i> Warning! Better check yourself, you're not looking too good. </div>
        <div class="alert alert-fill-danger" role="alert">
          <i class="mdi mdi-alert-circle"></i> Oh snap! Change a few things up and try submitting again. </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Desktop notification</h4>
        <p class="card-description">Create simple desktop notifications</p>
        <form>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Write some title here" value="Sample title" required>
            <label class="mt-4" for="message">Message</label>
            <textarea placeholder="Write some message here" id="message" class="form-control" required>Sample content</textarea>
          </div>
          <button type="submit" class="btn btn-gradient-success"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Notify</button>
        </form>
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
    <script src="assets/plugins/jquery-toast-plugin/jquery.toast.min.js"></script>
  <!-- end plugin js -->

  <!-- common js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- end common js -->

    <script src="assets/js/toastDemo.js"></script>
  <script src="assets/js/desktop-notification.js"></script>
</body>
</html>