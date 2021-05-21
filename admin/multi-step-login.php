<!DOCTYPE html>
<html>
<head>
  <title>Purple Premium Laravel Admin Dashboard Template</title>
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

  <!-- plugin css -->
    <!-- end plugin css -->

  <!-- common css -->
  <link media="all" type="text/css" rel="stylesheet" href="css/app.css">
  <!-- end common css -->

  </head>
<body data-base-url="https://bootstrapdash.com/demo/purple/laravel/template/demo_1">

  <div class="container-scroller" id="app">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center justify-content-center auth multi-step-login">
  <div class="row w-100">
    <div class="col-md-5 mx-auto py-5">
      <h4 class="text-center">Create your account</h4>
      <form class="step-form" id="msform">
        <!-- progressbar -->
        <ul class="step-progress" id="progressbar">
          <li class="active">Login Details</li>
          <li>User Profile</li>
          <li>Finish</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
          <div class="form-group">
            <input class="form-control" type="text" name="username" placeholder="Username" />
          </div>
          <div class="form-group">
            <input class="form-control" type="password" name="pass" placeholder="Password" />
          </div>
          <div class="form-group">
            <input class="form-control" type="password" name="cpass" placeholder="Confirm Password" />
          </div>
          <button class="btn btn-gradient-primary next action-button float-left" type="button" name="next" value="Next" />Next</button>
        </fieldset>
        <fieldset>
          <div class="row">
            <div class="form-group col-md-6">
              <input class="form-control" type="text" name="FirstName" placeholder="First Name" />
            </div>
            <div class="form-group col-md-6">
              <input class="form-control" type="text" name="Last Name" placeholder="Last Name" />
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <input class="form-control" type="email" name="email" placeholder="Email" />
            </div>
            <div class="form-group col-md-6">
              <input class="form-control" type="text" name="Country" placeholder="Country" />
            </div>
          </div>
          <div class="form-group">
            <input class="form-control" type="number" name="Number" placeholder="Number" />
          </div>
          <button class="btn btn-gradient-primary next action-button float-left" type="button" name="next" value="Next" />Next</button>
        </fieldset>
        <fieldset class="text-center">
          <p class="font-weight-bold">Created sucessfully</p>
          <i class="mdi mdi-shield-check text-warning icon-lg"></i>
          <h4 class="font-weight-bold">Welcome purple</h4>
          <p class="mb-0 text-muted">You’ve successfully created a account for this user.</p>
        </fieldset>
      </form>
    </div>
  </div>
</div>
    </div>
  </div>

    <!-- base js -->
    <script src="js/app.js"></script>
    <!-- end base js -->

    <!-- plugin js -->
      <script src="assets/plugins/jquery.easing/jquery.easing.min.js"></script>
    <!-- end plugin js -->

      <script src="assets/js/login.js"></script>
</body>
</html>