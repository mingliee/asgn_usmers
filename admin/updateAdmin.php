<?php
require 'session.php';
require '../config.php';

if(isset($_POST['newAdminEmail']))
{
    $email = $_POST['newAdminEmail'];
    echo '<br>email: '.$email;

    //verify EMAIL
    $verifySQL="SELECT * FROM ADMIN WHERE USER_EMAIL='$email'";
    $verifyResult=mysqli_query($conn,$verifySQL);
    if ( mysqli_num_rows($verifyResult)){
        echo '<br/>sql: '.$verifySQL;
        header('Location: admin-management.php?add=duplicate');

    }else{
        //GET NEXT ADMIN_ID with fixed prefix
        $adminIDSQL="(SELECT IFNULL (CONCAT('A',LPAD((SUBSTRING_INDEX
        (MAX(`ADMIN_ID`), 'A',-1) + 1), 5, '0')), 'A')
        AS 'IDNUMBER' FROM `ADMIN` ORDER BY `ADMIN_ID` ASC)";
        $adminIDResult=mysqli_query($conn,$adminIDSQL);

        if ( mysqli_num_rows($adminIDResult)){
        $row = mysqli_fetch_array($adminIDResult);
        $adminID=$row['IDNUMBER'];
        }

        $addAdminSQL="INSERT INTO ADMIN (ADMIN_ID,USER_EMAIL) VALUES ('$adminID','$email')";
        $addResult = mysqli_query($conn,$addAdminSQL);

        if($addResult){
        echo '<br/>==========UPDATE report sucessfully===========';
        echo '<br/>sql: '.$addAdminSQL;
        header('Location: admin-management.php?add=success');
        }else{
        echo '<br/>==========UPDATE report FAIL===========';
        echo '<br/>Error: '.mysqli_error($conn);
        echo '<br/>sql: '.$addAdminSQL;
        header('Location: admin-management.php?add=fail');
        }

    }

    

}

if(isset($_POST['action']))
{
    $action = $_POST['action'];
    $response['status']  = 'fail';

    if($action==='remove'){
        $adminID = $_POST['adminID'];
        //echo 'adminID: '.$adminID;

        $removeAdminSQL="DELETE FROM ADMIN WHERE ADMIN_ID='".$adminID."'";
        $removeResult = mysqli_query($conn,$removeAdminSQL);

        if($removeResult){
            $response['status']  = 'success';
        }else{
            $response['status']  = 'fail';
            echo 'fail'.mysqli_error($conn);
        }
    }
    echo json_encode($response);

}