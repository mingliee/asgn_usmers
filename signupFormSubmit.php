<?php
require 'config.php';
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
    $insertImgResult=false;

    if($_FILES['profileImage']['size'] == 0){
        $avatar_name="back.jpg";
        $avatar_id=0;
        $insertImgResult=true;
    }else{
        $targetPath="img/avatar/";
        $validextensions = array("jpeg", "jpg", "png");
        $ext = explode('.', basename($_FILES['profileImage']['name'])); //explode file name from dot(.) 
        $file_extension = end($ext); //store extensions in the variable
        
        $avatar_name = date("dmY-His"); 
        $avatar_name .= basename($_FILES['profileImage']['name']);
        $avatar_name = mysqli_real_escape_string($conn,$avatar_name);

        $avatar=$_FILES['profileImage']['name'];
        $targetPath = $targetPath.$avatar_name; //set the target path with a new name of avatar 

        //get mmaximun id number from table and output the next increment number with prefix AJ
        $avatarIDSQL="(SELECT IFNULL (CONCAT('A',LPAD((SUBSTRING_INDEX
        (MAX(`avatar_id`), 'A',-1) + 1), 5, '0')), 'A')
        AS 'IDNUMBER' FROM `AVATAR` ORDER BY `avatar_id` ASC)";
        $adsIDResult=mysqli_query($conn,$avatarIDSQL);

        if ( mysqli_num_rows($adsIDResult)){
            $row = mysqli_fetch_array($adsIDResult);
            $avatar_id=$row['IDNUMBER'];
        }

        if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $targetPath)) { //if file moved to uploads folder
            $insertAvatarSQL = "INSERT INTO AVATAR (AVATAR_ID,AVATAR_NAME,AVATAR_FILE) 
            VALUES('$avatar_id','$avatar_name','$avatar')";
            
            $insertAvatarResult = mysqli_query($conn,$insertAvatarSQL);
            echo 'insertAvatarSQL: '.$insertAvatarSQL.'<br/>';
            echo 'insertAvatarResult: '.$insertAvatarResult.'<br/>';
            
            if($insertAvatarResult){
                echo 'Insert sucessfully';
            }else{
                echo 'Insert Image Fail<br/>';
                echo 'Error: '.mysqli_error($conn);
            }
            
        } else{
            echo $j.
            ').<span id="error">***Upload FAIL***</span><br/><br/>';
        }
        
    }

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

        $query="INSERT INTO USER (USER_EMAIL,USER_PSWD,USER_NAME,WHATSAPP,SCHOOL,ADDRESS,AREA,USER_STATUS,TOKEN,AVATAR_ID) 
        values ( '$user_email','$user_pswd','$username','$phone','$school','$address','$area','P','$token','$avatar_id')";
        echo 'sql:'.$query;
        if(mysqli_query($conn, $query)){
            // TO DO: send verification email to user
            //sendVerificationEmail($user_email, $token);

            session_start();
            $_SESSION['userEmail']=$user_email;
            $_SESSION['userStatus']="P"; //Pending, Active, Bar, Inactive

            header("Location:signup.php?verification=pending");
        }
        else{
            echo "<h3>FAILLLL</h3>".$query;
        }
    }
?>