<?php

require('config.php');

if(isset($_POST['adsID'])&&isset($_POST['myID']))
{
     $ads_id=$_POST['adsID'];
     $myID=$_POST['myID'];
     $action=$_POST['action'];

     if(strpos($action, 'addFav') !== false){
        $sql = "INSERT INTO FAVOURITE (ADS_ID, USER_ID) VALUES ('$ads_id','$myID')";
     }
     if(strpos($action, 'removeFav') !== false){
        $sql = "DELETE FROM FAVOURITE WHERE ADS_ID='$ads_id' AND USER_ID='$myID'";
     }     
     
    // $mysqli->query($sql);
     $editFavResult = mysqli_query($conn,$sql);
     if($editFavResult){
        echo '<br/>==========EDIT FAVOURITE sucessfully===========';
        echo '<br/>sql: '.$sql;

    }else{
        echo '<br/>==========EDIT FAVOURITE FAIL===========';
        echo '<br/>Error: '.mysqli_error($conn);
    }

}


?>