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
  <meta name="_token" content="vNliKe3kBOf8P7CJyd0WyRydE5fE4768siLrid6x">

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
?>     
<?php 
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"add=success")==true){
?>
<script>
function showMsg(){
    swal({
        title: 'Done!',
        text: 'New admin succcessfully added',
        timer: 2000,
        icon: 'success',
        button: {
        text: "OK",
        value: true,
        visible: true,
        className: "btn btn-primary"
        }
      })

}      
window.onload = showMsg;
</script>
<?php
    } else if(strpos($fullUrl,"add=fail")==true){
?>
<script>
function showMsg(){
    swal({
        title: 'Error!',
        text: 'Fail to add new admin',
        timer: 2000,
        icon: 'error',
        button: {
          text: "OK",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })

}      
window.onload = showMsg;
</script>
<?php
    } else if(strpos($fullUrl,"add=duplicate")==true){
?>
<script>
function showMsg(){
    swal({
        title: 'Exist Admin!',
        text: 'Admin already exist',
        timer: 2000,
        icon: 'warning',
        button: {
          text: "OK",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })

}      
window.onload = showMsg;
</script>
<?php
    } else if(strpos($fullUrl,"remove=success")==true){
?>
<script>
function showMsg(){
    swal({
      title: 'Done!',
        text: 'Remove admin succcessfully',
        timer: 2000,
        icon: 'success',
        button: {
        text: "OK",
        value: true,
        visible: true,
        className: "btn btn-primary"
        }
      })

}      
window.onload = showMsg;
</script>
<?php
    } else if(strpos($fullUrl,"remove=error")==true){
?>
<script>
function showMsg(){
    swal({
      title: 'Error!',
        text: 'Fail to remove admin',
        timer: 2000,
        icon: 'error',
        button: {
          text: "OK",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })

}      
window.onload = showMsg;
</script>
<?php 
    }
?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
    <h3 class="page-title"> Admin Management </h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Admin Management</a></li>
    <li class="breadcrumb-item active" aria-current="page">Admin</li>
    </ol>
    </nav>
    </div>

<div class="row">
  <div class="col-12">
    
        <div class="row">
          <div class="col-lg-4 grid-margin">
          <div class="card">
      <div class="card-body">
          <form role="form" name="addAdmin" id="addAdmin" action="updateAdmin.php" method="POST" >
            <div class="py-4">
              <p class="clearfix">
                <span class="float-left"> New Admin Email: </span>
              </p>
              <div class="form-group">
                <input class="form-control" type="text" name="newAdminEmail" id="newAdminEmail" placeholder="Email..." onblur="return valEmail()"/>
                <span class="required error" id="email-info"></span>
            </div>

            </div>
            <div class="d-flex justify-content-between">
            <!-- <input class="btn btn-gradient-success actionBtn addAdmin_btn" type="submit" name="addAdmin_btn" id="addAdmin_btn" value="Add Admin"> -->

                <button class="btn btn-gradient-success addAdmin_btn" id="addAdmin_btn" name="addAdmin_btn" onclick="valInfo(event)">Add Admin</button>
            </div>
          </form>
          </div>
          </div>
          </div>

          <div class="col-lg-8 grid-margin">
          <div class="card">
            <div class="card-body">
<!--           <div class="d-sm-flex pb-4 mb-4 border-bottom">
            <div class="d-flex align-items-center">
              <h5 class="page-title mb-n2">User Management</h5>
              <p class="mt-2 mb-n1 ml-3 text-muted">Users</p>
            </div>
          </div> -->
          <div class="border-0 tab-content-basic">
            <!-- ALL ADS -->
            <div class="tab-pane fade show active" id="all-user" role="tabpanel" aria-labelledby="all-user">
            <div class="table-responsive">
            <table id="order-listing-all"  class="table table-hover">
              <thead>
                <tr>
                  <th> Name </th>
                  <th> Email </th>
                  <th> Added Date </th>
                  <th> Admin ID </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
              <?php 
                // $q1="SELECT * FROM ADMIN INNER JOIN USER ON (USER.USER_EMAIL=ADMIN.USER_EMAIL)";
                $q1="SELECT * FROM ADMIN 
                INNER JOIN USER ON (USER.USER_EMAIL=ADMIN.USER_EMAIL)
                LEFT JOIN AVATAR ON (USER.AVATAR_ID=AVATAR.AVATAR_ID)";

                $r1 = mysqli_query($conn,$q1);
                if ( mysqli_num_rows($r1)> 0){
                  while($row = mysqli_fetch_assoc($r1)){
                    $id = $row['ADMIN_ID'];
                    $email = $row['USER_EMAIL'];
                    // $name = $row ['USER_NAME'];
                    $name = $row['USER_NAME'];
                    $date = $row ['ADDED_DATE'];
                   // $date = date("j M y",strtotime($date));
                   $avatar = $row['AVATAR_NAME'];
                  if($avatar!=null){
                    $imglink="../img/avatar/".$avatar;                      
                  }else{
                    $imglink="../img/author/avatar.jpg";
                  }
                  $url='window.location="ads-details.php?adsID='.$id.'"';

                    echo '<tr>
                    <td class="">
                      <img src="'.$imglink.'" class="mr-2" alt="image"> '.$name.'</td>
                    <td>';
                    echo $email;
                      
                    echo '</td>
                    <td> '.$date.' </td>
                    <td> '.$id.' </td>';
                    if($_SESSION['userEmail']===$email||$_SESSION['userEmail']==="usmers@usm.my")
                      echo '<td onclick="remove(event,\''.$id.'\')" class="link">Remove</td>';
                    else{
                      echo '<td class="unlink">Remove</td>';
                    }
    
                  echo '</tr>';
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
</div>
</div>
<footer class="footer">
<div class="container-fluid clearfix">
<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © USMers' 2020/2021</span>

</span>
</div>
</footer>      
</div>
</div>
</div>

<script>
//$('.addAdmin_btn').on('click',function(e){
    function valInfo(e){
    e.preventDefault();
    var form = $(this).parents('form');
    var email = $("#newAdminEmail").val();
    var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    var valid=true;

    if (email == "") {
		$("#email-info").html("Required field").css("color", "#ee0000").show();
		valid = false;
	} else if (email.indexOf('@student.usm.my')<0 && email.indexOf('@usm.my')<0){
        $("#email-info").html("Only USM email domain is allow").css("color", "#ee0000").show();
        valid = false;
    } else if (email.trim() == "") {
        $("#email-info").html("Required field").css("color", "#ee0000").show();
		valid = false;
	} else if (!emailRegex.test(email)) {
		$("#email-info").html("Invalid email address").css("color", "#ee0000").show();
		valid = false;
	} 

    if(valid){
        swal({
        title: 'Are you sure?',
        text: "Add new admin.",
        icon: 'warning',
        showCancelButton: true,
/*         confirmButtonColor: '#3f51b5',
        cancelButtonColor: '#ff4081',
        confirmButtonText: 'Great ', */
        showLoaderOnConfirm: true,
        buttons: {
          cancel: {
            text: "Cancel",
            value: null,
            visible: true,
            className: "btn btn-danger",
            closeModal: true,
          },
          confirm: {
            text: "YES",
            value: true,
            visible: true,
            className: "btn btn-primary",
            closeModal: true,
            isConfirm:true,
          }
        }
    }).then((result) => {
		  	if (result){
                document.getElementById("addAdmin").submit();
		  	}
 
	})
    }
    
}

function remove(e,id){
    e.preventDefault();
    //alert(id);
    swal({
        title: 'Are you sure?',
        text: "Remove admin role.",
        icon: 'warning',
        showCancelButton: true,
/*         confirmButtonColor: '#3f51b5',
        cancelButtonColor: '#ff4081',
        confirmButtonText: 'Great ', */
        showLoaderOnConfirm: true,
        buttons: {
          cancel: {
            text: "Cancel",
            value: null,
            visible: true,
            className: "btn btn-danger",
            closeModal: true,
          },
          confirm: {
            text: "YES",
            value: true,
            visible: true,
            className: "btn btn-primary",
            closeModal: true,
            isConfirm:true,
          }
        }
    }).then((result) => {
		  	if (result){
          $.ajax({
			   		url: 'updateAdmin.php',
			    	type: 'POST',
			       	data: {
                adsID:id,
                action:'remove',
                adminID:id
             },
			       	dataType: 'json',
               success: function (response) {
                alert('response: '+JSON.stringify(response));
                //location.reload();
                window.location.href = "admin-management.php?remove=success"
                //swal("Done!", "", "success");
                },
                error: function (response) {
                  //alert('error: '+JSON.stringify(response));
                  window.location.href = "admin-management.php?remove=error";
                }
			    })
		  	}
 
	})

}
</script>

<!-- base js -->
<script src="js/app.js"></script>
<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<!-- end base js -->

<!-- plugin js -->
<script src="assets/plugins/datatables.net/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
<!-- end plugin js -->

<!-- common js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- end common js -->
<script src="assets/js/data-table.js"></script>
<script src="assets/js/alerts.js"></script>

</body>
</html>