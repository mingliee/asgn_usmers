<?php
require 'session.php';
require '../config.php';

if(isset($_POST['updateReport_btn']))
{
    $reportID = $_POST['reportID'];
    $status_div = $_POST['status_div'];
    $reportComment = $_POST['reportComment'];
    echo '<br>reportID: '.$reportID;
    echo '<br>status_div: '.$status_div;
    echo '<br>reportComment: '.$reportComment;

    $reportComment = str_replace( "'",'"', $reportComment);
    //$reportComment= nl2br(htmlentities($reportComment, ENT_QUOTES, 'UTF-8'));

    echo '<br>reportComment: '.$reportComment;

    $updateReportSQL="UPDATE REPORT SET STATUS='$status_div',COMMENT='$reportComment',
                        UPDATE_DATE=NOW() 
                        WHERE REPORT_ID='$reportID'";
    $updateResult = mysqli_query($conn,$updateReportSQL);

     if($updateResult){
        echo '<br/>==========UPDATE report sucessfully===========';
        echo '<br/>sql: '.$updateReportSQL;
        header('Location: report-details.php?reportID='.$reportID.'&update=success');
    }else{
        echo '<br/>==========UPDATE report FAIL===========';
        echo '<br/>Error: '.mysqli_error($conn);
        echo '<br/>sql: '.$updateReportSQL;
        header('Location: report-details.php?reportID='.$reportID.'&update=fail');
    }
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
}

?>