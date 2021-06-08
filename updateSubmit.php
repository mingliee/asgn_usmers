<?php
require 'config.php';

if(isset($_POST['updatePswd_btn'])){
    echo '=========updatePswd_btn==========<br/>';
    $updateResult=false;
    
    $new_pswd=$_POST['new_pswd'];
    $retype_pswd=$_POST['retype_pswd'];
    $user_email=$_SESSION['userEmail'];

    //CHECK CURRENT PASSWORD
    $getPswdSQL="SELECT USER_PSWD FROM USER WHERE USER_EMAIL='$user_email'";
    $getPswdResult=mysqli_query($conn,$getPswdSQL);

    if ( mysqli_num_rows($getPswdResult)){
        $row = mysqli_fetch_array($getPswdResult);
        $currentPswd=$row['USER_PSWD'];
    }else{
        echo '<br/>---FAIL updateResult---';
        header("Location:account-profile-setting.php?change=error");
        exit();
    }    

    if($currentPswd===$new_pswd){ //return error if new pswd = current pswd

        echo '<br/>---FAIL updateResult---';
        header("Location:account-profile-setting.php?change=incorrect");
        exit();

    }else if($currentPswd===$user_pswd){ //chg pswd if current pswd matched
        //UPDATE PSWD
        $updatePswdSQL="UPDATE USER SET USER_PSWD='$new_pswd' WHERE USER_EMAIL='$user_email'";
        $updateResult=mysqli_query($conn,$updatePswdSQL);
        
        echo 'updatePswdSQL:'.$updatePswdSQL;
        echo '<br/>updateResult:'.$updateResult;

        if($updateResult){
            echo '<br/>---SUCCESS updateResult---';
            header("Location:account-profile-setting.php?change=success");
            exit();
        }else{
            echo '<br/>---FAIL updateResult---';
            header("Location:account-profile-setting.php?change=error");
            exit();
        }
    }


}

if(isset($_POST['updatePswdByEmail_btn'])){
    echo '=========updatePswdByEmail_btn==========<br/>';
    $updateResult=false;

    $new_pswd=$_POST['new_pswd'];
    $retype_pswd=$_POST['retype_pswd'];
    $user_email=$_POST['email'];
    $token=$_POST['token'];

echo 'email: '.$user_email;
    //CHECK CURRENT PASSWORD
    $getPswdSQL="SELECT USER_PSWD FROM USER WHERE USER_EMAIL='$user_email'";
    $getPswdResult=mysqli_query($conn,$getPswdSQL);

    if ( mysqli_num_rows($getPswdResult)){
        $row = mysqli_fetch_array($getPswdResult);
        $currentPswd=$row['USER_PSWD'];
    }else{
        echo '<br/>---FAIL updateResult---';
        header("Location:welcome/404.php");
        exit();
    }    

    if($currentPswd===$new_pswd){ //return error if new pswd = current pswd

        echo '<br/>---FAIL updateResult---';
        header("Location:user-account.php?action=resetPswd&token=768e78024aa8fdb9b8fe87be86f64745106b9c8102&error=samePswd");
        exit();

    }else if($new_pswd===$retype_pswd){ //chg pswd if current pswd matched
        //UPDATE PSWD
        $updatePswdSQL="UPDATE USER SET USER_PSWD='$new_pswd' WHERE USER_EMAIL='$user_email'";
        $updateResult=mysqli_query($conn,$updatePswdSQL);
        
        echo 'updatePswdSQL:'.$updatePswdSQL;
        echo '<br/>updateResult:'.$updateResult;

        if($updateResult){
            echo '<br/>---SUCCESS updateResult---';
            header("Location:login.php");
            exit();
        }else{
            echo '<br/>---FAIL updateResult---';
            header("user-account.php?action=resetPswd&token=768e78024aa8fdb9b8fe87be86f64745106b9c8102&error=fail");
            exit();
        }
    }else{
        header("Location:welcome/404.php");
        exit();
    }
}

if(isset($_POST['sendEmailChgPswd_btn'])){
    echo '=========sendEmailChgPswd_btn==========<br/>';
    require_once 'email/sendEmail.php';

    $user_email=$_POST['user_email'];
    $user_email = filter_var($user_email, FILTER_SANITIZE_EMAIL);
    $user_email = filter_var($user_email, FILTER_VALIDATE_EMAIL);

    //$token = bin2hex(random_bytes(10)); // generate unique token
    $token = md5(2418*2+$user_email);
    $addtoken = substr(md5(uniqid(rand(),1)),3,10);
    $token = $token . $addtoken;

    $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
    $expDate = date("Y-m-d H:i:s",$expFormat);

    $query="INSERT INTO password_reset_temp (USER_EMAIL, TOKEN,EXP_DATE) 
    values ( '$user_email','$token','$expDate')";
    echo 'sql:'.$query;
    if(mysqli_query($conn, $query)){
        // TO DO: send verification email to user
        sendChgPswdEmail($user_email, $token);

        header("Location:forget-password.php?verification=pending");
    }
    else{
        echo "<h3>FAILLLL</h3>".$query;
    }
    $updateResult=false;
}



?>