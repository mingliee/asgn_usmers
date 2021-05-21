<?php
require 'session.php';
?>
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
          <div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="d-sm-flex pb-4 mb-4 border-bottom">
          <div class="d-flex align-items-center">
            <h5 class="page-title mb-n2">Open Tickets</h5>
            <p class="mt-2 mb-n1 ml-3 text-muted">230 Tickets</p>
          </div>
          <form class="ml-auto d-flex pt-2 pt-md-0 align-items-stretch w-50 justify-content-end">
            <input type="text" class="form-control w-50" placeholder="Search">
            <button type="submit" class="btn btn-gradient-success no-wrap ml-4">Search Ticket</button>
          </form>
        </div>
        <div class="nav-scroller">
          <ul class="nav nav-tabs tickets-tab-switch" role="tablist">
            <li class="nav-item">
              <a class="nav-link rounded active" id="open-tab" data-toggle="tab" href="#open-tickets" role="tab" aria-controls="open-tickets" aria-selected="true">Open Tickets <div class="badge">13</div></a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded" id="pending-tab" data-toggle="tab" href="#pending-tickets" role="tab" aria-controls="pending-tickets" aria-selected="false">Pending Tickets <div class="badge">50 </div></a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded" id="onhold-tab" data-toggle="tab" href="#onhold-tickets" role="tab" aria-controls="onhold-tickets" aria-selected="false">On-hold Tickets <div class="badge">29 </div>
              </a>
            </li>
          </ul>
        </div>
        <div class="tab-content border-0 tab-content-basic">
          <div class="tab-pane fade show active" id="open-tickets" role="tabpanel" aria-labelledby="open-tickets">
            <div class="tickets-date-group"><i class="mdi mdi-calendar"></i>Tuesday, 21 May 2019 </div>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8 col-12">
                <div class="wrapper">
                  <h5>#39033 - Design Admin Dashboard</h5>
                  <div class="badge badge-gradient-success">New</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="assets/images/faces/face13.jpg" alt="profile image">
                  <span>Brett Gonzales</span>
                  <span><i class="mdi mdi-clock-outline"></i>03:34AM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6 d-none d-md-block">
                <img class="img-xs rounded-circle" src="assets/images/faces/face16.jpg" alt="profile image">
                <span class="text-muted">Frank Briggs</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6 d-none d-md-block">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Wireframe</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8 col-12">
                <div class="wrapper">
                  <h5>#39040 - Website Redesign</h5>
                  <div class="badge badge-gradient-info">Pro</div>
                </div>
                <div class="wrapper text-muted d-none d-lg-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="assets/images/faces/face18.jpg" alt="profile image">
                  <span>Olivia Cross</span>
                  <span><i class="mdi mdi-clock-outline"></i>04:23AM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-12">
                <img class="img-xs rounded-circle" src="assets/images/faces/face14.jpg" alt="profile image">
                <span class="text-muted">Frank Briggs</span>
              </div>
              <div class="ticket-float col-lg-2 d-none d-lg-block">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Wireframe</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#39041 - Bootstrap Framework not working</h5>
                  <div class="badge badge-gradient-info">Pro</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="assets/images/faces/face11.jpg" alt="profile image">
                  <span>Leah Frank</span>
                  <span><i class="mdi mdi-clock-outline"></i>04:24AM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="assets/images/faces/face10.jpg" alt="profile image">
                <span class="text-muted">Emilie Barnett</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Deployed</span>
              </div>
            </a>
            <div class="tickets-date-group"><i class="mdi mdi-calendar"></i>Tuesday, 20 Apr,2019 </div>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#39045 - Design Admin Dashboard</h5>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="assets/images/faces/face18.jpg" alt="profile image">
                  <span>Luella Sparks</span>
                  <span><i class="mdi mdi-clock-outline"></i>12:54PM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="assets/images/faces/face6.jpg" alt="profile image">
                <span class="text-muted">Hunter Garza</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Concept</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#29033 - Set up the marketplace strategy </h5>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="assets/images/faces/face15.jpg" alt="profile image">
                  <span>Mitchell Barber</span>
                  <span><i class="mdi mdi-clock-outline"></i>4:19AM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="assets/images/faces/face7.jpg" alt="profile image">
                <span class="text-muted">Michael Campbell</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Wireframe</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#29033 - Design Admin Dashboard</h5>
                  <div class="badge badge-gradient-success">New</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="assets/images/faces/face13.jpg" alt="profile image">
                  <span>Rhoda Jimenez</span>
                  <span><i class="mdi mdi-clock-outline"></i>01:27PM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="assets/images/faces/face10.jpg" alt="profile image">
                <span class="text-muted">Maria Cook</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Deployed</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#29033 - Compose newsletter for the big launch</h5>
                  <div class="badge badge-gradient-success">New</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="assets/images/faces/face17.jpg" alt="profile image">
                  <span>Alta Little</span>
                  <span><i class="mdi mdi-clock-outline"></i>06:16PM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="assets/images/faces/face20.jpg" alt="profile image">
                <span class="text-muted">Juan Little</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Concept</span>
              </div>
            </a>
          </div>
          <div class="tab-pane fade" id="pending-tickets" role="tabpanel" aria-labelledby="pending-tickets">
            <div class="tickets-date-group"><i class="mdi mdi-calendar"></i>Tuesday, 21 May 2019 </div>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#39045 - Design Admin Dashboard</h5>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="assets/images/faces/face18.jpg" alt="profile image">
                  <span>Luella Sparks</span>
                  <span><i class="mdi mdi-clock-outline"></i>12:54PM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="assets/images/faces/face6.jpg" alt="profile image">
                <span class="text-muted">Hunter Garza</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Concept</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#39033 - Design Admin Dashboard</h5>
                  <div class="badge badge-gradient-success">New</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="assets/images/faces/face13.jpg" alt="profile image">
                  <span>Brett Gonzales</span>
                  <span><i class="mdi mdi-clock-outline"></i>03:34AM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="assets/images/faces/face16.jpg" alt="profile image">
                <span class="text-muted">Frank Briggs</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Wireframe</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#29033 - Compose newsletter for the big launch</h5>
                  <div class="badge badge-gradient-success">New</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="assets/images/faces/face17.jpg" alt="profile image">
                  <span>Alta Little</span>
                  <span><i class="mdi mdi-clock-outline"></i>06:16PM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="assets/images/faces/face20.jpg" alt="profile image">
                <span class="text-muted">Juan Little</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Concept</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#39040 - Website Redesign</h5>
                  <div class="badge badge-gradient-info">Pro</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="assets/images/faces/face18.jpg" alt="profile image">
                  <span>Olivia Cross</span>
                  <span><i class="mdi mdi-clock-outline"></i>04:23AM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="assets/images/faces/face14.jpg" alt="profile image">
                <span class="text-muted">Frank Briggs</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Wireframe</span>
              </div>
            </a>
            <div class="tickets-date-group"><i class="mdi mdi-calendar"></i>Tuesday, 20 Apr,2019 </div>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#29033 - Set up the marketplace strategy </h5>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="assets/images/faces/face15.jpg" alt="profile image">
                  <span>Mitchell Barber</span>
                  <span><i class="mdi mdi-clock-outline"></i>4:19AM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="assets/images/faces/face7.jpg" alt="profile image">
                <span class="text-muted">Michael Campbell</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Wireframe</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#39041 - Bootstrap Framework not working</h5>
                  <div class="badge badge-gradient-info">Pro</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="assets/images/faces/face11.jpg" alt="profile image">
                  <span>Leah Frank</span>
                  <span><i class="mdi mdi-clock-outline"></i>04:24AM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="assets/images/faces/face10.jpg" alt="profile image">
                <span class="text-muted">Emilie Barnett</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Deployed</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#29033 - Design Admin Dashboard</h5>
                  <div class="badge badge-gradient-success">New</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="assets/images/faces/face13.jpg" alt="profile image">
                  <span>Rhoda Jimenez</span>
                  <span><i class="mdi mdi-clock-outline"></i>01:27PM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="assets/images/faces/face10.jpg" alt="profile image">
                <span class="text-muted">Maria Cook</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Deployed</span>
              </div>
            </a>
          </div>
          <div class="tab-pane fade" id="onhold-tickets" role="tabpanel" aria-labelledby="onhold-tickets">
            <div class="tickets-date-group"><i class="mdi mdi-calendar"></i>Tuesday, 21 May 2019 </div>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#39040 - Website Redesign</h5>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="assets/images/faces/face18.jpg" alt="profile image">
                  <span>Olivia Cross</span>
                  <span><i class="mdi mdi-clock-outline"></i>04:23AM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="assets/images/faces/face14.jpg" alt="profile image">
                <span class="text-muted">Frank Briggs</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Wireframe</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#29033 - Design Admin Dashboard</h5>
                  <div class="badge badge-gradient-success">New</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="assets/images/faces/face13.jpg" alt="profile image">
                  <span>Rhoda Jimenez</span>
                  <span><i class="mdi mdi-clock-outline"></i>01:27PM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="assets/images/faces/face10.jpg" alt="profile image">
                <span class="text-muted">Maria Cook</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Deployed</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#29033 - Compose newsletter for the big launch</h5>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="assets/images/faces/face17.jpg" alt="profile image">
                  <span>Alta Little</span>
                  <span><i class="mdi mdi-clock-outline"></i>06:16PM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="assets/images/faces/face20.jpg" alt="profile image">
                <span class="text-muted">Juan Little</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Concept</span>
              </div>
            </a>
          </div>
        </div>
        <nav class="mt-4">
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
        </nav>
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
    <!-- end plugin js -->

  <!-- common js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- end common js -->

  </body>
</html>