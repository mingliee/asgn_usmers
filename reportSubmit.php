<?php
require('config.php');

if(isset($_POST['report_btn']))
{
    $reason = $_POST['reason_group'];
    $adsID = $_POST['adsID'];
    $user_id = $_POST['user_id'];

    if(isset($_POST['report_descp'])){
        $descp=mysqli_real_escape_string($conn,$_POST['report_descp']);
    }else{
        $descp=null;
    }
    echo 'descp: '.$descp;

    if(isset($_POST['adsID'])){
        $reportType="ADS";
    }else{
        $reportType="MULTI";
        $adsID=NULL;
    }

   /*  if (strpos($adsID, 'AI') !== false) {
        $q1="SELECT ADS_TITLE FROM ADS_ITEM WHERE ADS_id='$adsID'";
    } else if (strpos($adsID, 'AA') !== false) {
        $q1="SELECT ADS_TITLE FROM ADS_ACCOM WHERE ADS_id='$adsID'";
    } else if (strpos($adsID, 'AJ') !== false) {
        $q1="SELECT ADS_TITLE FROM ADS_JOB WHERE ADS_id='$adsID'";
    } */

    //GET NEXT REPORT_ID with fixed prefix
    $adsIDSQL="(SELECT IFNULL (CONCAT('R',LPAD((SUBSTRING_INDEX
            (MAX(`report_id`), 'R',-1) + 1), 5, '0')), 'R')
            AS 'IDNUMBER' FROM `report` ORDER BY `report_id` ASC)";
            $adsIDResult=mysqli_query($conn,$adsIDSQL);

    if ( mysqli_num_rows($adsIDResult)){
        $row = mysqli_fetch_array($adsIDResult);
        $reportID=$row['IDNUMBER'];
    }


     $sql = "INSERT INTO REPORT (REPORT_ID,REPORT_TYPE,REPORTED_BY_USER_ID,REASON,REPORT_DESCP,STATUS) 
            VALUES('$reportID','$reportType','$user_id','$reason','$descp','OPEN')";
     $insertReport = mysqli_query($conn,$sql);
     if($reportType==='ADS'){
        $bridgeSql = "INSERT INTO REPORT_ADS (REPORT_ID,ADS_ID) 
                        VALUES('$reportID','$adsID')";
        $insertBridge = mysqli_query($conn,$bridgeSql);
    }else{
        $insertBridge=true;
    }
     

     if($insertReport&&$insertBridge){
        echo '<br/>==========INSERT report & bridge sucessfully===========';
        echo '<br/>sql: '.$sql;
        header('Location: report.php?adsID='.$adsID.'&report=success');
    }else{
        echo '<br/>Error: '.mysqli_error($conn);
        header('Location: report.php?adsID=$adsID&report=fail');
    }
}

if(isset($_POST['support_btn']))
{
    $supportSubject = $_POST['supportSubject'];
    $support_descp = $_POST['support_descp'];
    $user_id = $_POST['user_id'];

    //GET NEXT REPORT_ID with fixed prefix
    $supportIDSQL="(SELECT IFNULL (CONCAT('S',LPAD((SUBSTRING_INDEX
            (MAX(`SUPPORT_ID`), 'S',-1) + 1), 5, '0')), 'S')
            AS 'IDNUMBER' FROM `SUPPORT` ORDER BY `SUPPORT_ID` ASC)";
    $supportIDResult=mysqli_query($conn,$supportIDSQL);

    if ( mysqli_num_rows($supportIDResult)){
        $row = mysqli_fetch_array($supportIDResult);
        $supportID=$row['IDNUMBER'];
    }


     $sql = "INSERT INTO SUPPORT (SUPPORT_ID,USER_ID,SUPPORT_SUBJECT,SUPPORT_DESCP,STATUS) 
            VALUES('$supportID','$user_id','$supportSubject','$support_descp','OPEN')";
     $insertSupport = mysqli_query($conn,$sql);

     echo 'sql: '.$sql.'<br>';
     echo 'insertSupport: '.$insertSupport.'<br>';
     if($insertSupport){
        echo '<br/>==========INSERT support sucessfully===========';
        header('Location: support.php?support=success');
    }else{
        echo '<br/>Error: '.mysqli_error($conn);
        header('Location: support.php?support=fail');
    }
}

?>