<?php
session_start();

require '../config.php';

if (isset($_GET['action'])) {

    $action=$_GET['action'];
    $token = $_GET['token'];

    if(strpos($action, 'verify') !== false){

        $sql = "SELECT * FROM user WHERE token='$token' LIMIT 1";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $query = "UPDATE user SET USER_STATUS='A' WHERE TOKEN='$token'";
    
            if (mysqli_query($conn, $query)) {
                $_SESSION['userID'] =$user['USER_ID'];
                $_SESSION['userEmail']=$user['USER_EMAIL'];
                $_SESSION['userStatus']="A"; //Pending, Active, Bar
                echo "username:".$user['USER_ID']." email: ".$user['USER_EMAIL']." status:". $_SESSION['userStatus'];
                header('location: http://localhost/usmers/main.php');
                exit(0);
            }
        } else {
            echo "User not found!";
            echo $sql;
            header('location: http://localhost/usmers/welcome/404.php');
        }

    }
/*     else if(strpos($action, 'resetPswd') !== false){
        $sql = "SELECT * FROM password_reset_temp WHERE token='$token' LIMIT 1";
        $result = mysqli_query($conn, $sql);
    echo 'sqL;'.$sql;
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $query = "UPDATE user SET USER_STATUS='A' WHERE TOKEN='$token'";
echo '<br>num: '.mysqli_num_rows($result);
            if (mysqli_query($conn, $query)) {
                $_SESSION['userEmail']=$user['USER_EMAIL'];
                $expDate =$user['EXP_DATE'];

                echo "<br>expDate:".$expDate." email: ".$user['USER_EMAIL'];
                header('location: https://localhost/usmers/user-account.php?action=resetPswd&token='.$token);
                exit(0);
            }
        } else {
            echo "User not found!";
            echo $sql;
            header('location: http://localhost/usmers/welcome/404.php');
            exit(0);
        }
    } */

    
} else {
    header('location: http://localhost/usmers/welcome/404.php');
    exit(0);
}
?>