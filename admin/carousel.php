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

    <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/owl-carousel-2/assets/owl.carousel.min.css">
  <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/owl-carousel-2/assets/owl.theme.default.min.css">

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
  <h3 class="page-title"> Carousel </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">UI Elements</a></li>
      <li class="breadcrumb-item active" aria-current="page">Carousel</li>
    </ol>
  </nav>
</div>
<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic carousel</h4>
        <div class="owl-carousel owl-theme full-width">
          <div class="item">
            <img src="assets/images/carousel/banner_12.jpg" alt="banner image" /> </div>
          <div class="item">
            <img src="assets/images/carousel/banner_2.jpg" alt="banner image" /> </div>
          <div class="item">
            <img src="assets/images/carousel/banner_1.jpg" alt="banner image" /> </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Carousel with captions</h4>
        <div class="owl-carousel owl-theme full-width">
          <div class="item">
            <div class="card text-white">
              <img class="card-img" src="assets/images/carousel/banner_4.jpg" alt="Card image">
              <div class="card-img-overlay d-flex">
                <div class="mt-auto text-center w-100">
                  <h3>Third Slide Label</h3>
                  <h6 class="card-text mb-4 font-weight-normal">Nulla vitae elit libero, a pharetra augue mollis interdum.</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card text-white">
              <img class="card-img" src="assets/images/carousel/banner_5.jpg" alt="Card image">
              <div class="card-img-overlay d-flex">
                <div class="mt-auto text-center w-100">
                  <h3>Third Slide Label</h3>
                  <h6 class="card-text mb-4 font-weight-normal">Nulla vitae elit libero, a pharetra augue mollis interdum.</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card text-white">
              <img class="card-img" src="assets/images/carousel/banner_6.jpg" alt="Card image">
              <div class="card-img-overlay d-flex">
                <div class="mt-auto text-center w-100">
                  <h3>Third Slide Label</h3>
                  <h6 class="card-text mb-4 font-weight-normal">Nulla vitae elit libero, a pharetra augue mollis interdum.</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row grid-margin">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Loop</h4>
        <div class="owl-carousel owl-theme loop">
          <div class="item">
            <img src="assets/images/carousel/banner_7.jpg" alt="banner image" /> </div>
          <div class="item">
            <img src="assets/images/carousel/banner_8.jpg" alt="banner image" /> </div>
          <div class="item">
            <img src="assets/images/carousel/banner_9.jpg" alt="banner image" /> </div>
          <div class="item">
            <img src="assets/images/carousel/banner_10.jpg" alt="banner image" /> </div>
          <div class="item">
            <img src="assets/images/carousel/banner_11.jpg" alt="banner image" /> </div>
          <div class="item">
            <img src="assets/images/carousel/banner_12.jpg" alt="banner image" /> </div>
          <div class="item">
            <img src="assets/images/carousel/banner_2.jpg" alt="banner image" /> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row grid-margin">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">non-Loop</h4>
        <div class="owl-carousel owl-theme nonloop">
          <div class="item">
            <img src="assets/images/carousel/banner_3.jpg" alt="banner image" /> </div>
          <div class="item">
            <img src="assets/images/carousel/banner_5.jpg" alt="banner image" /> </div>
          <div class="item">
            <img src="assets/images/carousel/banner_6.jpg" alt="banner image" /> </div>
          <div class="item">
            <img src="assets/images/carousel/banner_8.jpg" alt="banner image" /> </div>
          <div class="item">
            <img src="assets/images/carousel/banner_11.jpg" alt="banner image" /> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row grid-margin">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Right to left</h4>
        <div class="owl-carousel owl-theme rtl-carousel">
          <div class="item">
            <img src="assets/images/carousel/banner_6.jpg" alt="banner image" /> </div>
          <div class="item">
            <img src="assets/images/carousel/banner_9.jpg" alt="banner image" /> </div>
          <div class="item">
            <img src="assets/images/carousel/banner_12.jpg" alt="banner image" /> </div>
          <div class="item">
            <img src="assets/images/carousel/banner_3.jpg" alt="banner image" /> </div>
          <div class="item">
            <img src="assets/images/carousel/banner_7.jpg" alt="banner image" /> </div>
          <div class="item">
            <img src="assets/images/carousel/banner_10.jpg" alt="banner image" /> </div>
          <div class="item">
            <img src="assets/images/carousel/banner_2.jpg" alt="banner image" /> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Video</h4>
        <div class="owl-carousel owl-theme video-carousel">
          <div class="item-video">
            <a class="owl-video" href="https://youtu.be/a3ICNMQW7Ok"></a>
          </div>
          <div class="item-video">
            <a class="owl-video" href="https://youtu.be/Sq4lbCC24js"></a>
          </div>
          <div class="item-video">
            <a class="owl-video" href="https://youtu.be/XH6ER3cNrCY"></a>
          </div>
          <div class="item-video">
            <a class="owl-video" href="https://youtu.be/nFdBNJsW46Y"></a>
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
</footer>      </div>
    </div>
  </div>

  <!-- base js -->
  <script src="js/app.js"></script>
  <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <!-- end base js -->

  <!-- plugin js -->
    <script src="assets/plugins/owl-carousel-2/owl.carousel.min.js"></script>
  <!-- end plugin js -->

  <!-- common js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- end common js -->

    <script src="assets/js/owl-carousel.js"></script>
</body>
</html>