<?php
require 'session.php';
require('../config.php');
if(isset($_POST['adsID']))
{
    $response = array();
    $adsID = $_POST['adsID'];
    $action=$_POST['action'];
    $reason=$_POST['reason'];

    $reason=$reason['feedback'];
    $reason = str_replace( "'",'"', $reason);
    $admin=$_POST['admin'];

    if (strpos($adsID, 'AI') !== false) {
        $adsTable="ADS_ITEM";
        $imgTable="IMAGE_ITEM";
    } else if (strpos($adsID, 'AA') !== false) {
        $adsTable="ADS_ACCOM";
        $imgTable="IMAGE_ACCOM";
    } else if (strpos($adsID, 'AJ') !== false) {
        $adsTable="ADS_JOB";
        $imgTable="IMAGE_JOB";
    }

    if(strpos($action, 'delete') !== false){
        $updateAdsSQL="UPDATE $adsTable SET PRIVATE_STATUS='DELETED',ADMIN_UPDATE_DATE=NOW() 
                        WHERE ADS_ID='$adsID'";
        
        $insertInfoSQL="INSERT INTO ADS_MANAGEMENT (ADS_ID,ACTION,DESCP,TIME,PIC) 
        VALUES ('$adsID','DELETE','$reason',NOW(),'$admin')";

    } else if(strpos($action, 'recover') !== false){
        $updateAdsSQL="UPDATE $adsTable SET PRIVATE_STATUS='ACTIVE',ADMIN_UPDATE_DATE=NOW() 
                        WHERE ADS_ID='$adsID'";
        
        $insertInfoSQL="INSERT INTO ADS_MANAGEMENT (ADS_ID,ACTION,DESCP,TIME,PIC) 
        VALUES ('$adsID','RECOVER','$reason',NOW(),'$admin')";
    }
    
    $updateAdsResult = mysqli_query($conn,$updateAdsSQL);
    $insertInfoResult = mysqli_query($conn,$insertInfoSQL);

     if($updateAdsResult&&$insertInfoResult){
        $response['status']  = 'success';
        //echo '<br/>==========UPDATE AD sucessfully===========';
        //echo '<br/>sql: '.$updateAdsSQL;
        //header('Location: user-details.php?adsID='.$adsID.'&update=success');
    }else{
        $response['status']  = 'fail';
        //echo '<br/>==========UPDATE AD FAIL===========';
        //echo '<br/>Error: '.mysqli_error($conn);
        echo json_encode($updateAdsSQL.$insertInfoSQL);
        //header('Location: user-details.php?adsID='.$adsID.'&update=fail');
    }
    echo json_encode($response);
}

?>