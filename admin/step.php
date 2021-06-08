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
  <h3 class="page-title"> Form wizard </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Forms</a></li>
      <li class="breadcrumb-item active" aria-current="page">Wizard</li>
    </ol>
  </nav>
</div>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">jquery-steps wizard</h4>
        <form id="example-form" action="#">
          <div>
            <h3>Account</h3>
            <section>
              <h6>Account</h6>
              <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password"> </div>
              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" placeholder="Confirm password"> </div>
            </section>
            <h3>Profile</h3>
            <section>
              <h6>Profile</h6>
              <div class="form-group">
                <label>First name</label>
                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter first name"> </div>
              <div class="form-group">
                <label>Last name</label>
                <input type="password" class="form-control" placeholder="Last name"> </div>
              <div class="form-group">
                <label>Profession</label>
                <input type="password" class="form-control" placeholder="Profession"> </div>
            </section>
            <h3>Comments</h3>
            <section>
              <h6>Comments</h6>
              <div class="form-group">
                <label>Comments</label> <textarea class="form-control" rows="3"></textarea> </div>
            </section>
            <h3>Finish</h3>
            <section>
              <h6>Finish</h6>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox"> I agree with the Terms and Conditions. </label>
              </div>
            </section>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--vertical wizard-->
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">jquery-steps vertical wizard</h4>
        <form id="example-vertical-wizard" action="#">
          <div>
            <h3>Account</h3>
            <section>
              <h6>Account</h6>
              <div class="form-group">
                <label for="userName">User name *</label>
                <input id="userName" name="userName" type="text" class="required form-control"> </div>
              <div class="form-group">
                <label for="password">Password *</label>
                <input id="password" name="password" type="password" class="required form-control"> </div>
              <div class="form-group">
                <label for="confirm">Confirm Password *</label>
                <input id="confirm" name="confirm" type="password" class="required form-control">
                <small>(*) Mandatory</small>
              </div>
            </section>
            <h3>Profile</h3>
            <section>
              <h6>Profile</h6>
              <div class="form-group">
                <label for="name">First name *</label>
                <input id="name" name="name" type="text" class="required form-control"> </div>
              <div class="form-group">
                <label for="surname">Last name *</label>
                <input id="surname" name="surname" type="text" class="required form-control"> </div>
              <div class="form-group">
                <label for="email">Email *</label>
                <input id="email" name="email" type="text" class="required email form-control"> </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input id="address" name="address" type="text" class="form-control">
                <small>(*) Mandatory</small>
              </div>
            </section>
            <h3>Finish</h3>
            <section>
              <h6>Finish</h6>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox"> I agree with the Terms and Conditions. </label>
              </div>
            </section>
          </div>
        </form>
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
    <script src="assets/plugins/jquery-steps/jquery.steps.min.js"></script>
  <script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>

  <!-- end plugin js -->

  <!-- common js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- end common js -->

    <script src="assets/js/wizard.js"></script>
</body>
</html>