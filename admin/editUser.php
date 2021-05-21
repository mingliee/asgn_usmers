<?php
require 'session.php';
require('../config.php');
if(isset($_POST['userID']))
{
    $response = array();
    $userID = $_POST['userID'];
    $action=$_POST['action'];
    $reason=$_POST['reason'];

    $reason=$reason['feedback'];
    $reason = str_replace( "'",'"', $reason);
    $admin=$_POST['admin'];

    if(strpos($action, 'revoke') !== false){
        $updateUserSQL="UPDATE USER SET USER_STATUS='R',
                        ADMIN_UPDATE_DATE=NOW() 
                        WHERE USER_ID='$userID'";

        $insertInfoSQL="INSERT INTO USER_MANAGEMENT (USER_ID,ACTION,DESCP,TIME,PIC) 
                        VALUES ('$userID','REVOKE','$reason',NOW(),'$admin')";
    } else if(strpos($action, 'grant') !== false){
        $updateUserSQL="UPDATE USER SET USER_STATUS='A',
                        ADMIN_UPDATE_DATE=NOW() 
                        WHERE USER_ID='$userID'";
        $insertInfoSQL="INSERT INTO USER_MANAGEMENT (USER_ID,ACTION,DESCP,TIME,PIC) 
                        VALUES ('$userID','GRANT','$reason',NOW(),'$admin')";
    }
    
    $updateUserResult = mysqli_query($conn,$updateUserSQL);
    $insertInfoResult = mysqli_query($conn,$insertInfoSQL);

     if($updateUserResult){
        $response['status']  = 'success';
        //echo '<br/>==========UPDATE user sucessfully===========';
        //echo '<br/>sql: '.$updateUserSQL;
        //header('Location: user-details.php?userID='.$userID.'&update=success');
    }else{
        $response['status']  = 'fail';
        //echo '<br/>==========UPDATE user FAIL===========';
        //echo '<br/>Error: '.mysqli_error($conn);
        echo '<br/>sql: '.$updateUserSQL;
        //header('Location: user-details.php?userID='.$userID.'&update=fail');
    }
    echo json_encode($response);
}

if(isset($_POST['updateSupport_btn']))
{
    $supportID = $_POST['supportID'];
    $status_div = $_POST['status_div'];
    $supportComment = $_POST['supportComment'];
    echo '<br>supportID: '.$supportID;
    echo '<br>status_div: '.$status_div;
    echo '<br>supportComment: '.$supportComment;

    $supportComment = str_replace( "'",'"', $supportComment);
    //$supportComment= nl2br(htmlentities($supportComment, ENT_QUOTES, 'UTF-8'));

    echo '<br>supportComment: '.$supportComment;

    $updateSupportSQL="UPDATE SUPPORT SET STATUS='$status_div',COMMENT='$supportComment',
                        UPDATE_DATE=NOW() 
                        WHERE SUPPORT_ID='$supportID'";
    $updateResult = mysqli_query($conn,$updateSupportSQL);

     if($updateResult){
        echo '<br/>==========UPDATE SUPPORT sucessfully===========';
        echo '<br/>sql: '.$updateSupportSQL;
        header('Location: support-details.php?supportID='.$supportID.'&update=success');
    }else{
        echo '<br/>==========UPDATE SUPPORT FAIL===========';
        echo '<br/>Error: '.mysqli_error($conn);
        echo '<br/>sql: '.$updateSupportSQL;
        header('Location: support-details.php?supportID='.$reportID.'&update=fail');
    }
    return true;
}

?>