<?php
require 'config.php';


if(isset($_POST['signup_username_validate'])){
    $username = $_POST['username'];

  	$sql = "SELECT * FROM USER WHERE BINARY USER_NAME='$username'";
  	$results = mysqli_query($conn, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	  echo 'taken';	
  	}else{
  	  echo 'not_taken';
  	}
 	exit();

}
/* 
if(isset($_POST['signup_btn'])){
    require_once 'email/sendEmail.php';

    $username=$_POST['username'];
    $user_email=$_POST['user_email'];
    $user_pswd=$_POST['user_pswd'];
    $address=$_POST['loc'];
    $area=$_POST['other_loc'];
    $area=ucfirst($area);
    $school=$_POST['school'];
    $phone='6';
    $phone.=$_POST['phone'];
    
    
    $valEmailSql="SELECT * FROM USER WHERE USER_EMAIL='$user_email'";
    $valNameSql="SELECT * FROM USER WHERE USER_NAME='$username'";

    if(mysqli_num_rows(mysqli_query($conn,$valEmailSql)))
    {
        $emailResult=mysqli_query($conn,$valEmailSql);
        while($row = mysqli_fetch_assoc($emailResult)){
            $user_status=$row['USER_STATUS'];
        }
        if($user_status=="P"){
            header("Location:signup.php?error=pendingVerification");
        }
        else if($user_status=="A")
            header("Location:signup.php?error=emailExist");
        echo "<h3>FAILLLL</h3>".$query;
        exit();
    } 
    else if(mysqli_num_rows(mysqli_query($conn,$valNameSql)))
    {
        header("Location:signup.php?error=usernameExist");
        echo "<h3>FAILLLL</h3>".$query;
        exit();
    } 
    else{

        $token = bin2hex(random_bytes(10)); // generate unique token

        $query="INSERT INTO USER (USER_EMAIL,USER_PSWD,USER_NAME,WHATSAPP,SCHOOL,ADDRESS,AREA,USER_STATUS,TOKEN) 
        values ( '$user_email','$user_pswd','$username','$phone','$school','$address','$area','P','$token')";
        echo 'sql:'.$query;
        if(mysqli_query($conn, $query)){
            // TO DO: send verification email to user
            sendVerificationEmail($user_email, $token);

            session_start();
            $_SESSION['userEmail']=$user_email;
            $_SESSION['userStatus']="P"; //Pending, Active, Bar, Inactive

            header("Location:signup.php?verification=pending");
        }
        else{
            echo "<h3>FAILLLL</h3>".$query;
        }
    }
} */


    
   
?>

