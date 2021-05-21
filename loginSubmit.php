<?php
require 'config.php';

    $user_email=$_POST['user_email'];
    $user_pswd=$_POST['user_pswd'];
    
    $sql = " SELECT * FROM USER WHERE USER_EMAIL='$user_email' AND USER_PSWD='$user_pswd' ";
    $result = mysqli_query($conn,$sql);

    if ( mysqli_num_rows($result)){
        $row = mysqli_fetch_array($result);

        if($row['USER_STATUS']=='P'){
            header("Location:login.php?error=pendingVerification");
            echo "<h3>FAILLLL</h3>".$query;
            exit();
        }else if($row['USER_STATUS']=='A'||$row['USER_STATUS']=='R'){
            $userID= $row['USER_ID'];

            session_start();
            $_SESSION['userEmail']=$user_email;
            $_SESSION['userStatus']=$row['USER_STATUS']; //Pending, Active, Bar, Inactive
            $_SESSION['userID'] = $row['USER_ID'];
           
            header("Location:main.php");
            exit(); 
        } else
            exit();
    }
    else{
        header("Location:login.php?error=incorrectCredentials");
        echo "<h3>FAILLLL</h3>".$query;
        exit();
    }

?>