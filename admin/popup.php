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
  <h3 class="page-title"> Popups </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dialogs</a></li>
      <li class="breadcrumb-item active" aria-current="page">Popups</li>
    </ol>
  </nav>
</div>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="row">
        <div class="col-md-4 col-sm-6 d-flex justify-content-center border-right">
          <div class="wrapper card-body text-center">
            <h4 class="card-title">Alerts Popups</h4>
            <p class="card-description">A basic message</p>
            <button class="btn btn-outline-success" onclick="showSwal('basic')">Click here!</button>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 d-flex justify-content-center border-right">
          <div class="wrapper card-body text-center">
            <h4 class="card-title">Alerts Popups</h4>
            <p class="card-description">A title with a text under</p>
            <button class="btn btn-outline-success" onclick="showSwal('title-and-text')">Click here!</button>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 d-flex justify-content-center">
          <div class="wrapper card-body text-center">
            <h4 class="card-title">Alerts Popups</h4>
            <p class="card-description">A success message!</p>
            <button class="btn btn-outline-success" onclick="showSwal('success-message')">Click here!</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="row">
        <div class="col-md-4 col-sm-6 d-flex justify-content-center border-right">
          <div class="wrapper card-body text-center">
            <h4 class="card-title">Alerts Popups</h4>
            <p class="card-description">A success message!</p>
            <button class="btn btn-outline-success" onclick="showSwal('custom-html')">Click here!</button>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 d-flex justify-content-center border-right">
          <div class="wrapper card-body text-center">
            <h4 class="card-title">Alerts Popups</h4>
            <p class="card-description">A success message!</p>
            <button class="btn btn-outline-success" onclick="showSwal('warning-message-and-cancel')">Click here!</button>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 d-flex justify-content-center">
          <div class="wrapper card-body text-center">
            <h4 class="card-title">Alerts Popups</h4>
            <p class="card-description">A message with auto close timer</p>
            <button class="btn btn-outline-success" onclick="showSwal('auto-close')">Click here!</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12 text-center">
            <h4 class="card-title">Avgrund Popup</h4>
            <p class="card-description">Avgrund simple popup</p>
            <a href="#" id="show" class="btn btn-outline-danger">Click here!</a>
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
<script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="assets/plugins/jquery-avgrund/jquery.avgrund.min.js"></script>
<!-- end plugin js -->

<!-- common js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- end common js -->

<script src="assets/js/alerts.js"></script>
<script src="assets/js/avgrund.js"></script>
</body>
</html>