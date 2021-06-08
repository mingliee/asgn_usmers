<?php


require('config.php');

if(isset($_GET['id']))
{
     $ads_id=$_GET['id'];
     if (strpos($ads_id, 'AI') !== false) {
          $adsTable="ADS_ITEM";
          $imgTable="IMAGE_ITEM";
          $subSql = "DELETED_ADS.SUB_INFO_1=ADS_ITEM.ITEM_CONDITION,
                    DELETED_ADS.SUB_INFO_2=ADS_ITEM.ITEM_DEAL_METHOD";
     } else if (strpos($ads_id, 'AA') !== false) {
          $adsTable="ADS_ACCOM";
          $imgTable="IMAGE_ACCOM";
          $subSql = "DELETED_ADS.SUB_INFO_1=ADS_ACCOM.ACCM_TENET_PREF";
     } else if (strpos($ads_id, 'AJ') !== false) {
          $adsTable="ADS_JOB";
          $imgTable="IMAGE_JOB";
          $subSql = "DELETED_ADS.SUB_INFO_1=ADS_JOB.JOB_CONTRACT_TYPE ,
                    DELETED_ADS.SUB_INFO_2=ADS_JOB.JOB_SALARY_TYPE ";
     }

     // move data from ori image table to deleted table
     // delete data from ori image table
     $q1="SELECT IMAGE_ID FROM $imgTable WHERE ADS_ID='$ads_id'";
     echo 'q1: '.$q1;
     echo '<br>=======START LOOP (MOVE IMAGE)=========';
     $r1 = mysqli_query($conn,$q1);
     if ( mysqli_num_rows($r1)> 0){
          while($row = mysqli_fetch_assoc($r1)){
               $delIDSQL="(SELECT IFNULL (CONCAT('DI',LPAD((SUBSTRING_INDEX
               (MAX(`DELETED_IMAGE_ID`), 'DI',-1) + 1), 5, '0')), 'DI')
               AS 'IDNUMBER' FROM `DELETED_IMAGE` ORDER BY `DELETED_IMAGE_ID` ASC)";
               $delIDResult=mysqli_query($conn,$delIDSQL);

               if ( mysqli_num_rows($delIDResult)){
                    $r = mysqli_fetch_array($delIDResult);
                    $delID=$r['IDNUMBER'];
               }

               $insertIdSql="INSERT INTO DELETED_IMAGE(DELETED_IMAGE_ID,IMAGE_ID) VALUES ('$delID','".$row['IMAGE_ID']."')";
               $insertResult = mysqli_query($conn,$insertIdSql);
               echo '<br>insertIdSql: '.$insertIdSql;
               echo '<br>insertResult: '.$insertResult;

               $moveSql="UPDATE DELETED_IMAGE, $imgTable
                         SET DELETED_IMAGE.IMAGE_NAME=$imgTable.IMAGE_NAME,
                         DELETED_IMAGE.IMAGE_FILE=$imgTable.IMAGE_FILE,DELETED_IMAGE.ADS_ID='$ads_id',
                         DELETED_IMAGE.IMAGE_STATUS='DELETED' 
                         WHERE DELETED_IMAGE.IMAGE_ID='".$row['IMAGE_ID']."' AND $imgTable.IMAGE_ID='".$row['IMAGE_ID']."'";
               $moveResult = mysqli_query($conn,$moveSql);
               echo '<br>moveSQL: '.$moveSql;
               echo '<br>moveResult: '.$moveResult;
               if($moveResult){
                    $deleteSql="DELETE FROM $imgTable WHERE IMAGE_ID='".$row['IMAGE_ID']."'";
                    $deleteResult = mysqli_query($conn,$deleteSql);
                    echo '<br>deleteSql: '.$deleteSql;
                    echo '<br>deleteResult: '.$deleteResult;     
               }                     
               echo '<br>================';
          }
     }
     echo '<br>=======END LOOP=========';
     

     // move data from ori ads table to deleted table
     // delete data from ori ads table
     echo '<br>=======START(MOVE ADS INFO)=========';
     $delIDSQL="(SELECT IFNULL (CONCAT('DA',LPAD((SUBSTRING_INDEX
               (MAX(`DELETED_ADS_ID`), 'DA',-1) + 1), 5, '0')), 'DA')
               AS 'IDNUMBER' FROM `DELETED_ADS` ORDER BY `DELETED_ADS_ID` ASC)";
     $delIDResult=mysqli_query($conn,$delIDSQL);

     if ( mysqli_num_rows($delIDResult)){
          $r = mysqli_fetch_array($delIDResult);
          $delID=$r['IDNUMBER'];
     }

     $insertIdSql="INSERT INTO DELETED_ADS(DELETED_ADS_ID,ADS_ID) VALUES ('$delID','$ads_id')";
     $insertResult = mysqli_query($conn,$insertIdSql);
     echo '<br>insertIdSql: '.$insertIdSql;
     echo '<br>insertResult: '.$insertResult;

     $moveAdSql="UPDATE DELETED_ADS, $adsTable
                    SET 
                    DELETED_ADS.ADS_STATUS='DELETED',
                    DELETED_ADS.ADS_TITLE=$adsTable.ADS_TITLE,
                    DELETED_ADS.ADS_CAT=$adsTable.ADS_CAT,
                    DELETED_ADS.ADS_PRICE=$adsTable.ADS_PRICE,
                    DELETED_ADS.ADS_DESCP=$adsTable.ADS_DESCP,
                    DELETED_ADS.ADS_LOC=$adsTable.ADS_LOC,
                    DELETED_ADS.ADS_AREA=$adsTable.ADS_AREA,
                    DELETED_ADS.ADS_PUBLISH_DATE=$adsTable.ADS_PUBLISH_DATE,
                    DELETED_ADS.ADS_LATEST_UPDATE_DATE=$adsTable.ADS_LATEST_UPDATE_DATE,
                    DELETED_ADS.USER_ID=$adsTable.USER_ID,
                    DELETED_ADS.PRIVATE_STATUS=$adsTable.PRIVATE_STATUS,
                    DELETED_ADS.DELETED_DATE=$adsTable.DELETED_DATE,";
     $moveAdSql .= $subSql;
     $moveAdSql .= " WHERE DELETED_ADS.ADS_ID='$ads_id' AND $adsTable.ADS_ID='$ads_id'";

     $moveAdResult = mysqli_query($conn,$moveAdSql);
     echo '<br>moveAdSql: '.$moveAdSql;
     echo '<br>moveAdResult: '.$moveAdResult;

     if($moveAdResult){
          $deleteAdSql="DELETE FROM $adsTable WHERE ADS_ID='$ads_id'";
          $deleteAdResult = mysqli_query($conn,$deleteAdSql);
          echo '<br>deleteAdSql: '.$deleteAdSql;
          echo '<br>deleteAdResult: '.$deleteAdResult;
     }   
     echo '<br>=======END(MOVE ADS INFO)=========';
     
    // $mysqli->query($sql);
/*      $updateAdResult = mysqli_query($conn,$sql);
     echo '<br/>deleteAdSQL: '.$sql.'<br/>';
     echo 'updateAdResult: '.$updateAdResult.'<br/>';

	 echo 'Deleted successfully.';
      echo"<script>alert('updateAdResult: '+$updateAdResult)</script>"; */
}


?>