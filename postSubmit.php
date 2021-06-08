<?php
require 'config.php';

    session_start();
    $insertAdResult=false;
    $insertImgResult=false;
    $updateAdResult=false;
    $updateImgResult=false;
    
    if(isset($_POST['updateAds_btn'])&&count($_POST)>0){

        echo '=========updateAds_btn==========';
        
        $status=$_POST['status_div'];
        $title=$_POST['title'];
        $title = str_replace( "'",'"', $title);
        // $category_group=$_POST['category_group'];
        $price=$_POST['price'];
        $description=$_POST['description'];
        $description = str_replace( "'",'"', $description);
        $store_descp= nl2br(htmlentities($description, ENT_QUOTES, 'UTF-8'));
        $ads_loc=$_POST['loc'];
        $other_loc=$_POST['other_loc'];
        $user_email=$_POST['user_email'];
        $seller_id=$_POST['seller_id'];

        $ads_id=$_POST['ads_id'];
        if (strpos($ads_id, 'AI') !== false) {
            $adsTable="ADS_ITEM";
            $imgTable="IMAGE_ITEM";
            $condition=$_POST['condition'];
            $dealMethod=$_POST['deal_method'];

            $n = count($dealMethod);
            $deal = "";
            for($i=0;$i<$n;$i++){
                $deal.=$dealMethod[$i]." ";
            }

            $updateAdSQL="UPDATE ADS_ITEM SET ADS_STATUS='$status',ADS_TITLE='$title', ADS_PRICE='$price',
                ADS_DESCP='$store_descp',ADS_LOC='$ads_loc', ADS_AREA='$other_loc', 
                ITEM_CONDITION='$condition',ITEM_DEAL_METHOD='$deal',
                ADS_LATEST_UPDATE_DATE=NOW() WHERE ADS_ID='$ads_id'";

        } else if (strpos($ads_id, 'AA') !== false) {
            $adsTable="ADS_ACCOM";
            $imgTable="IMAGE_ACCOM";
            $tenet=$_POST['tenet'];
            $n = count($tenet);
            $tenetPref = "";
            for($i=0;$i<$n;$i++){
                $tenetPref.=$tenet[$i]." ";
            }

            $updateAdSQL="UPDATE ADS_ACCOM SET ADS_STATUS='$status',ADS_TITLE='$title', ADS_PRICE='$price',
                ADS_DESCP='$store_descp',ADS_LOC='$ads_loc', ADS_AREA='$other_loc', 
                ACCM_TENET_PREF='$tenetPref',
                ADS_LATEST_UPDATE_DATE=NOW() WHERE ADS_ID='$ads_id'";

        } else if (strpos($ads_id, 'AJ') !== false) {
            $adsTable="ADS_JOB";
            $imgTable="IMAGE_JOB";
            $contract_type=$_POST['contract_type'];
            $salary_type=$_POST['salary_type'];

            $updateAdSQL="UPDATE ADS_JOB SET ADS_STATUS='$status',ADS_TITLE='$title', ADS_PRICE='$price',
                ADS_DESCP='$store_descp',ADS_LOC='$ads_loc', ADS_AREA='$other_loc', 
                JOB_CONTRACT_TYPE='$contract_type',JOB_SALARY_TYPE='$salary_type',
                ADS_LATEST_UPDATE_DATE=NOW() WHERE ADS_ID='$ads_id'";
        }

        //update ad's info to db
        
        $updateAdResult = mysqli_query($conn,$updateAdSQL);
        echo '<br/>updateAdSQL: '.$updateAdSQL.'<br/>';
        echo 'updateAdResult: '.$updateAdResult.'<br/>';

        //$_FILES['file']['name']  -> imagename.jpg
        //insert ad's image
              
        $allowedFileType = array('jpg','png','jpeg');
        //echo"<script>alert('uploadDir: '+$uploadDir)</script>";

        //file properties
        //if(isset($_FILES['image'])){
            //$file = $_FILES['image']['tmp_name'];
        ///}

        // Loop through file items
        $countImg = count(array_filter($_FILES['uploadImage']['name']));
        //echo"<script>alert('countImg: '+$countImg)</script>";

        
        if($countImg=='0'||$countImg==NULL||$countImg==""){
            $updateImgResult=true;
            $delImgResult=true;

        }else{
            $j=0;
            // $targetPath="img/product/";

            //got changes on images
            // set IMAGE_STATUS TO DELETED for addID= $adsid;
            $delImageSQL = "UPDATE ".$imgTable." SET IMAGE_STATUS='DELETED' WHERE ADS_ID='$ads_id'";
            $delImgResult = mysqli_query($conn,$delImageSQL);
            if($delImgResult){
                echo 'DELETED sucessfully <br/>';
            }else{
                echo 'Error: '.mysqli_error($conn);
            }

            echo 'delImageSQL: '.$delImageSQL.'<br/>' ;
            echo 'delImgResult: '.$delImgResult.'<br/>' ;
            echo $j.
            ').<span id="noerror">Image DELETED successfully!.</span><br/><br/>';

            for($i=0; $i<$countImg; $i++){

                $sizeOK=false;
                $extOK=false;

                $targetPath="img/product/";
                $validextensions = array("jpeg", "jpg", "png");
                $ext = explode('.', basename($_FILES['uploadImage']['name'][$i])); //explode file name from dot(.) 
                $file_extension = end($ext); //store extensions in the variable
               
                $image_name = date("dmY-His"); 
                $image_name .= basename($_FILES['uploadImage']['name'][$i]);

                $image=$_FILES['uploadImage']['name'][$i];
                $targetPath = $targetPath.$image_name; //set the target path with a new name of image 
                $j = $j + 1;
                // echo '$targetPath: '.$targetPath.'<br/>';
                //echo '$ext[count($ext) - 1]: '.$ext[count($ext) - 1].'<br/>';
                echo '----------<br>';
                echo 'file size:'.$_FILES["uploadImage"]["size"][$i].'<br/>';

                if ($_FILES["uploadImage"]["size"][$i] < 5000000 ) //Approx. 5000kb/5MB files can be uploaded.
                {
                    $sizeOK=true;
                    echo $j.
                    ').<span id="error">***VALID file Size***</span><br/><br/>';
                    
                } else{
                    $sizeOK=false;
                    echo $j.
                    ').<span id="error">***Invalid file Size***</span><br/><br/>';
                    header("Location:update-ads.php?adsID=$ads_id&error=invalidImgSize");
                    
                }

                if (in_array($file_extension, $validextensions)) {
                    $extOK=true;    
                    echo $j.
                    ').<span id="error">***VALID file Type***</span><br/><br/>';  
                    
                } else{
                    $extOK=false;
                    echo $j.
                    ').<span id="error">***Invalid file Type***</span><br/><br/>';  
                    header("Location:update-ads.php?adsID=$ads_id&error=invalideFileType");
                }

                //no changes on image
                if($_FILES["uploadImage"]["size"][$i] == 0){
                    $updateImgResult=true;
                    $delImgResult=true;
                } else {
                    
                    //insert new'ACTIVE' image
                    $updateImgResult=false;
                    if($sizeOK && $extOK){

                        require_once 'test.php';

                        $detectImage = file_get_contents($_FILES['uploadImage']['tmp_name'][$i]);
                        $detectImage_base64 = base64_encode($detectImage);

                        if (strpos($ads_id, 'AI') !== false) {
                            //get mmaximun id number from table and output the next increment number with prefix II
                            $adsIDSQL="(SELECT IFNULL (CONCAT('II',LPAD((SUBSTRING_INDEX
                            (MAX(`image_id`), 'II',-1) + 1), 5, '0')), 'II')
                            AS 'IDNUMBER' FROM `image_item` ORDER BY `image_id` ASC)";
                            $adsIDResult=mysqli_query($conn,$adsIDSQL);

                            if ( mysqli_num_rows($adsIDResult)){
                                $row = mysqli_fetch_array($adsIDResult);
                                $imageid=$row['IDNUMBER'];
                            }

                            $obj= mysqli_real_escape_string($conn,passDetectImg($detectImage_base64)[0]);
                            $text= mysqli_real_escape_string($conn,passDetectImg($detectImage_base64)[1]);
                            $text = mysqli_real_escape_string($conn,$text);

                            $updateImageSQL = "INSERT INTO IMAGE_ITEM  (IMAGE_ID,IMAGE_STATUS,IMAGE_NAME,IMAGE_FILE,IMAGE_LABEL,IMAGE_OCR,ADS_ID) VALUES('$imageid','ACTIVE','$image_name','$image','$obj','$text','$ads_id')";

                        }else if (strpos($ads_id, 'AA') !== false){
                            //get mmaximun id number from table and output the next increment number with prefix IA
                            $adsIDSQL="(SELECT IFNULL (CONCAT('IA',LPAD((SUBSTRING_INDEX
                            (MAX(`image_id`), 'IA',-1) + 1), 5, '0')), 'IA')
                            AS 'IDNUMBER' FROM `image_item` ORDER BY `image_id` ASC)";
                            $adsIDResult=mysqli_query($conn,$adsIDSQL);

                            if ( mysqli_num_rows($adsIDResult)){
                                $row = mysqli_fetch_array($adsIDResult);
                                $imageid=$row['IDNUMBER'];
                            }
                            $updateImageSQL = "INSERT INTO IMAGE_ACCOM (IMAGE_ID,IMAGE_STATUS,IMAGE_NAME,IMAGE_FILE,ADS_ID) VALUES('$imageid','ACTIVE','$image_name','$image','$ads_id')";

                        }else if (strpos($ads_id, 'AJ') !== false){
                            //get mmaximun id number from table and output the next increment number with prefix IJ
                            $adsIDSQL="(SELECT IFNULL (CONCAT('IJ',LPAD((SUBSTRING_INDEX
                            (MAX(`image_id`), 'IJ',-1) + 1), 5, '0')), 'IJ')
                            AS 'IDNUMBER' FROM `image_item` ORDER BY `image_id` ASC)";
                            $adsIDResult=mysqli_query($conn,$adsIDSQL);

                            if ( mysqli_num_rows($adsIDResult)){
                                $row = mysqli_fetch_array($adsIDResult);
                                $imageid=$row['IDNUMBER'];
                            }
                            $updateImageSQL = "INSERT INTO IMAGE_JOB (IMAGE_ID,IMAGE_STATUS,IMAGE_NAME,IMAGE_FILE,ADS_ID) VALUES('$imageid','ACTIVE','$image_name','$image','$ads_id')";

                        }

                   //  $text = mysqli_real_escape_string($conn,$text);

                        if (move_uploaded_file($_FILES['uploadImage']['tmp_name'][$i], $targetPath)) { //if file moved to uploads folder
                            $updateImgResult = mysqli_query($conn,$updateImageSQL);
                            /* echo 'updateImageSQL: '.$updateImageSQL.'<br/>' ;
                            echo 'updateImgResult: '.$updateImgResult.'<br/>' ;
                            echo $j.
                            ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>'; */

                            if($updateImgResult){
                                echo 'Insert sucessfully';
                            }else{
                                echo 'Error: '.mysqli_error($conn);
                            }
                            
                        } else{
                            echo $j.
                            ').<span id="error">***Upload FAIL***</span><br/><br/>';
                
                        }
                    } else{
                        echo $j.
                            ').<span id="error">***Either one req x each***</span><br/><br/>';
                            
                    }

                }
                
            }
        }

        if($updateAdResult && $updateImgResult && $delImgResult){
            echo '---SUCCESS---<br/>';
            header("Location:ads-details.php?adsID=$ads_id");
            exit();
        }
        else{
            echo '---FAIL---<br/>';
            echo 'updateImgResult'.$updateImgResult.'<br/>';
            echo 'updateAdResult'.$updateAdResult.'<br/>';
            echo 'delImgResult'.$delImgResult.'<br/>';

            if(!$updateImgResult){
                //UNDO previous changes when update image fail
                $undoDelImageSQL = "UPDATE ".$imgTable." SET IMAGE_STATUS='ACTIVE' WHERE ADS_ID='$ads_id'";
                $undoDelImgResult = mysqli_query($conn,$undoDelImageSQL);
                if($undoDelImgResult){
                    echo 'UNDO delete sucessfully';
                }else{
                    echo 'Error: '.mysqli_error($conn);
                }

                //UNDO previous update ads action
              /*   ----------------------------------------------------------------------------
                TODO: when wanna undo previous update on ads, where to get the ori ads info?
                ---------------------------------------------------------------------------- */

                /* $delAdsSQL = "DELETE FROM `".$adsTable."` WHERE ADS_ID='$adsid'";        
                $delAdsResult = mysqli_query($conn,$delAdsSQL);
                echo '<br/>delAdsSQL: '.$delAdsSQL;
                if($delAdsResult){
                    echo 'DELETE ads sucessfully';
                }else{
                    echo 'DELETE ads FAIL <br/>';
                    echo 'Error: '.mysqli_error($conn);
                } */

              header("Location:update-ads.php?adsID=$ads_id&error=ImageUploadFail");
            }
            if(!$updateAdResult){
                /*   ----------------------------------------------------------------------------
                TODO: when wanna undo previous delete/insert on image, whats the step to recover img?
                ---------------------------------------------------------------------------- */

                /* $delImageSQL = "DELETE ".$catTable." FROM ".$catTable." 
                            LEFT JOIN ".$adsTable." ON ".$catTable.".ADS_ID = ".$adsTable.".ADS_ID
                            WHERE ADS_ID='$adsid'";
           
                $delImgResult = mysqli_query($conn,$delImageSQL);
                echo '<br/>delImageSQL: '.$delImageSQL.'<br/>';
                echo '<br/>delImgResult: '.$delImgResult.'<br/>';

                if($delImgResult){
                    echo 'DELETE img sucessfully';
                }else{
                    echo 'DELETE img FAIL<br/>';
                    echo 'Error: '.mysqli_error($conn);
                } */
              header("Location:update-ads.php?adsID=$ads_id&error=uploadFail");
            }

        }
        
    }

    if(isset($_POST['postAds_btn'])){
        echo '=========postAds_btn==========<br/>';
        
        $category_group=$_POST['category_group'];
        $title=$_POST['title'];
        $title = str_replace( "'",'"', $title);
        $price=$_POST['price'];
        $description=$_POST['description'];
        $description = str_replace( "'",'"', $description);
        $store_descp= nl2br(htmlentities($description, ENT_QUOTES, 'UTF-8'));
        $ads_loc=$_POST['loc'];
        $other_loc=$_POST['other_loc'];
        $user_email=$_POST['user_email'];
        
        //Extract user_id out from db
        $userSQL="select USER_ID from user where user_email like '$user_email'";
        $userResult=mysqli_query($conn,$userSQL);
        
        if ( mysqli_num_rows($userResult)){
            $row = mysqli_fetch_array($userResult);
            $userid=$row['USER_ID'];
        }
        echo '<span id="error">***'.$category_group.'***</span><br/><br/>';
                      
        //get value according to the category group
        //create sql query according to category group
        if(strpos($category_group,'item')  !== false){  
            
            //get mmaximun id number from table and output the next increment number with prefix AJ
            $adsIDSQL="(SELECT IFNULL (CONCAT('AI',LPAD((SUBSTRING_INDEX
            (MAX(`ads_id`), 'AI',-1) + 1), 5, '0')), 'AI')
            AS 'IDNUMBER' FROM `ads_item` ORDER BY `ads_id` ASC)";
            $adsIDResult=mysqli_query($conn,$adsIDSQL);

            if ( mysqli_num_rows($adsIDResult)){
                $row = mysqli_fetch_array($adsIDResult);
                $adsid=$row['IDNUMBER'];
            }

            $condition=$_POST['condition'];

            $dealMethod=$_POST['deal_method'];
            $n = count($dealMethod);
            $deal = "";
            for($i=0;$i<$n;$i++){
                $deal.=$dealMethod[$i]." ";
            }

            $insertAdSQL="INSERT INTO ADS_ITEM (ADS_ID,ADS_STATUS,ADS_TITLE,ADS_CAT,ADS_PRICE,ADS_DESCP,ADS_LOC,ADS_AREA,USER_ID,ITEM_CONDITION,ITEM_DEAL_METHOD,PRIVATE_STATUS) 
                        values ('$adsid','ACTIVE', '$title','$category_group','$price','$store_descp', '$ads_loc', '$other_loc', '$userid','$condition','$deal','ACTIVE')";
            
            //$adsIdSQL = "SELECT ADS_ID FROM ADS_ITEM WHERE ADS_TITLE LIKE '$title' AND USER_ID LIKE '$userid'";

        } else if(strpos($category_group,'accommodation')  !== false){
            
            //get mmaximun id number from table and output the next increment number with prefix AJ
            $adsIDSQL="(SELECT IFNULL (CONCAT('AA',LPAD((SUBSTRING_INDEX
            (MAX(`ads_id`), 'AA',-1) + 1), 5, '0')), 'AA')
            AS 'IDNUMBER' FROM `ads_accom` ORDER BY `ads_id` ASC)";
            $adsIDResult=mysqli_query($conn,$adsIDSQL);

            if ( mysqli_num_rows($adsIDResult)){
                $row = mysqli_fetch_array($adsIDResult);
                $adsid=$row['IDNUMBER'];
            }

            $tenet=$_POST['tenet'];
            $n = count($tenet);
            $tenetPref = "";
            for($i=0;$i<$n;$i++){
                $tenetPref.=$tenet[$i]." ";
            }

            $insertAdSQL="INSERT INTO ADS_ACCOM (ADS_ID,ADS_STATUS,ADS_TITLE,ADS_CAT,ADS_PRICE,ADS_DESCP,ADS_LOC,ADS_AREA,USER_ID,ACCM_TENET_PREF,PRIVATE_STATUS) 
                        values ('$adsid','ACTIVE', '$title','$category_group','$price','$store_descp', '$ads_loc', '$other_loc', '$userid','$tenetPref','ACTIVE')";
            
        } else if(strpos($category_group,'job')  !== false){

            //get mmaximun id number from table and output the next increment number with prefix AJ
            $adsIDSQL="(SELECT IFNULL (CONCAT('AJ',LPAD((SUBSTRING_INDEX
            (MAX(`ads_id`), 'AJ',-1) + 1), 5, '0')), 'AJ')
            AS 'IDNUMBER' FROM `ads_job` ORDER BY `ads_id` ASC)";
            $adsIDResult=mysqli_query($conn,$adsIDSQL);

            if ( mysqli_num_rows($adsIDResult)){
                $row = mysqli_fetch_array($adsIDResult);
                $adsid=$row['IDNUMBER'];
            }

            $contract_type=$_POST['contract_type'];
            $salary_type=$_POST['salary_type'];

            $insertAdSQL="INSERT INTO ADS_JOB (ADS_ID,ADS_STATUS,ADS_TITLE,ADS_CAT,ADS_PRICE,ADS_DESCP,ADS_LOC,ADS_AREA,USER_ID,JOB_CONTRACT_TYPE,JOB_SALARY_TYPE,PRIVATE_STATUS) 
                        values ('$adsid','ACTIVE', '$title','$category_group','$price','$store_descp', '$ads_loc', '$other_loc', '$userid','$contract_type','$salary_type','ACTIVE')";
            
            //$adsIdSQL = "SELECT ADS_ID FROM ADS_JOB WHERE ADS_TITLE LIKE '$title' AND USER_ID LIKE '$userid'";

        }

        echo '<span id="error">insertAdSQL: '.$insertAdSQL.'</span><br/><br/>';

        //insert ad's info to db
        $insertAdResult = mysqli_query($conn,$insertAdSQL);
        echo '<span id="error">insertAdResult: '.$insertAdResult.'</span><br/><br/>';
        echo '<span id="error">adsid: '.$adsid.'</span><br/><br/>';

        $allowedFileType = array('jpg','png','jpeg');

        // Loop through file items count(array_filter($_FILES['file']['name'])
        $countImg = count(array_filter($_FILES['uploadImage']['name']));
        //echo"<script>alert('countImg: '+$countImg)</script>";
        
        //initialize variable for each category
        if(strpos($category_group,'item')  !== false){ 
            $adsTable="ADS_ITEM";
            $catTable="image_item";
            $catPrefix="II";
        } else if(strpos($category_group,'accommodation')  !== false){ 
            $adsTable="ADS_ACCOM";
            $catTable="image_accom";
            $catPrefix="IA";
        } else if(strpos($category_group,'job')  !== false){ 
            $adsTable="ADS_JOB";
            $catTable="image_job";
            $catPrefix="IJ";
        }

        if($countImg=='0'||$countImg==NULL||$countImg==""){
            $image_name="back.jpg";

            if(strpos($category_group,'item')  !== false){ 
                //get mmaximun id number from table and output the next increment number with prefix AJ
                $adsIDSQL="(SELECT IFNULL (CONCAT('II',LPAD((SUBSTRING_INDEX
                (MAX(`image_id`), 'II',-1) + 1), 5, '0')), 'II')
                AS 'IDNUMBER' FROM `image_item` ORDER BY `image_id` ASC)";
                $adsIDResult=mysqli_query($conn,$adsIDSQL);

                if ( mysqli_num_rows($adsIDResult)){
                    $row = mysqli_fetch_array($adsIDResult);
                    $imageid=$row['IDNUMBER'];
                }

                $insertImageSQL = "INSERT INTO image_item (IMAGE_ID,IMAGE_STATUS,IMAGE_NAME,ADS_ID) 
                                    VALUES('$imageid','ACTIVE','$image_name','$adsid')";

             } else if(strpos($category_group,'accommodation')  !== false){ 
                 //get mmaximun id number from table and output the next increment number with prefix AJ
                $adsIDSQL="(SELECT IFNULL (CONCAT('IA',LPAD((SUBSTRING_INDEX
                (MAX(`image_id`), 'IA',-1) + 1), 5, '0')), 'IA')
                AS 'IDNUMBER' FROM `image_accom` ORDER BY `image_id` ASC)";
                $adsIDResult=mysqli_query($conn,$adsIDSQL);

                if ( mysqli_num_rows($adsIDResult)){
                    $row = mysqli_fetch_array($adsIDResult);
                    $imageid=$row['IDNUMBER'];
                }
                $insertImageSQL = "INSERT INTO image_accom (IMAGE_ID,IMAGE_STATUS,IMAGE_NAME,ADS_ID) 
                                    VALUES('$imageid','ACTIVE','$image_name','$adsid')";

             } else if(strpos($category_group,'job')  !== false){ 
                 //get mmaximun id number from table and output the next increment number with prefix AJ
                $adsIDSQL="(SELECT IFNULL (CONCAT('IJ',LPAD((SUBSTRING_INDEX
                (MAX(`image_id`), 'IJ',-1) + 1), 5, '0')), 'IJ')
                AS 'IDNUMBER' FROM `image_job` ORDER BY `image_id` ASC)";
                $adsIDResult=mysqli_query($conn,$adsIDSQL);

                if ( mysqli_num_rows($adsIDResult)){
                    $row = mysqli_fetch_array($adsIDResult);
                    $imageid=$row['IDNUMBER'];
                }
                $insertImageSQL = "INSERT INTO image_job (IMAGE_ID,IMAGE_STATUS,IMAGE_NAME,ADS_ID) 
                                    VALUES('$imageid','ACTIVE','$image_name','$adsid')";
             }
            
            $insertImgResult = mysqli_query($conn,$insertImageSQL);
            echo 'insertImageSQL: '.$insertImageSQL.'<br/>' ;
            echo 'insertImgResult: '.$insertImgResult.'<br/>' ;
            echo '<span id="noerror">Image uploaded successfully!.</span><br/><br/>';

            if($insertImgResult){
                echo 'Insert IMAGE sucessfully';
            }else{
                echo 'Insert IMAGE FAIL';
                echo '<br/>Error: '.mysqli_error($conn);
            }
            $insertImgResult=true;

        }else{
            $j=0;
        // $targetPath="img/product/";

            for($i=0; $i<$countImg; $i++){

                $sizeOK=false;
                $extOK=false;

                $targetPath="img/product/";
                $validextensions = array("jpeg", "jpg", "png");
                $ext = explode('.', basename($_FILES['uploadImage']['name'][$i])); //explode file name from dot(.) 
                $file_extension = end($ext); //store extensions in the variable
               
                $image_name = date("dmY-His"); 
                $image_name .= basename($_FILES['uploadImage']['name'][$i]);
                $image_name = mysqli_real_escape_string($conn,$image_name);

                $image=$_FILES['uploadImage']['name'][$i];
                $targetPath = $targetPath.$image_name; //set the target path with a new name of image 
                $j = $j + 1;
                echo '$targetPath: '.$targetPath.'<br/>';
                //echo '$ext[count($ext) - 1]: '.$ext[count($ext) - 1].'<br/>';
                echo '$file_extension: '.$file_extension.'<br/>';
                echo '--------------------<br/>';

                if ($_FILES["uploadImage"]["size"][$i] < 5000000) //Approx. 5MB files can be uploaded.
                {
                    $sizeOK=true;
                    echo $j.
                    ').<span id="error">***VALID file Size***</span><br/><br/>';
                                     
                } else{
                    $sizeOK=false;
                    echo $j.
                    ').<span id="error">***Invalid file Size***
                    <br/>'.$_FILES["uploadImage"]["size"][$i].'</span><br/><br/>';
                    header("Location:post-ads.php?error=invalidImgSize");
                    
                }

                if (in_array($file_extension, $validextensions)) {
                    $extOK=true;    
                    echo $j.
                    ').<span id="error">***VALID file Type***</span><br/><br/>';  
                    
                } else{
                    $extOK=false;
                    echo $j.
                    ').<span id="error">***Invalid file Type***</span><br/><br/>';  
                    header("Location:post-ads.php?error=invalideFileType");                 
                }
                $insertImgResult=false;
                if($sizeOK && $extOK){

                    require_once 'test.php';

                    $detectImage = file_get_contents($_FILES['uploadImage']['tmp_name'][$i]);
		            $detectImage_base64 = base64_encode($detectImage);

                    //undergo object detection and OCR for ADS_ITEM only
                    if(strpos($category_group,'item')  !== false){ 
                        $obj= passDetectImg($detectImage_base64)[0];
                        $text= passDetectImg($detectImage_base64)[1];
                        $text = mysqli_real_escape_string($conn,$text);
                    }
                    
                    /* if(strpos($category_group,'item')  !== false){ 
                        $catTable="image_item";
                        $catPrefix="II";
                    } else if(strpos($category_group,'accommodation')  !== false){ 
                        $catTable="image_accom";
                        $catPrefix="IA";
                    } else if(strpos($category_group,'job')  !== false){ 
                        $catTable="image_job";
                        $catPrefix="IJ";
                    } */

                    //get mmaximun id number from table and output the next increment number with prefix AJ
                    $adsIDSQL="(SELECT IFNULL (CONCAT('".$catPrefix."',LPAD((SUBSTRING_INDEX
                    (MAX(`image_id`), '".$catPrefix."',-1) + 1), 5, '0')), '".$catPrefix."')
                    AS 'IDNUMBER' FROM `".$catTable."` ORDER BY `image_id` ASC)";
                    $adsIDResult=mysqli_query($conn,$adsIDSQL);

                    if ( mysqli_num_rows($adsIDResult)){
                        $row = mysqli_fetch_array($adsIDResult);
                        $imageid=$row['IDNUMBER'];
                    }
                    /* echo '<br/>adsIDSQL: '.$adsIDSQL;
                    echo '<br/>imageid: '.$imageid.'<br/>'; */

                    if (move_uploaded_file($_FILES['uploadImage']['tmp_name'][$i], $targetPath)) { //if file moved to uploads folder
                        if(strpos($category_group,'item')  !== false){ 
                            $insertImageSQL = "INSERT INTO ".$catTable." (IMAGE_ID,IMAGE_STATUS,IMAGE_NAME,IMAGE_FILE,IMAGE_LABEL,IMAGE_OCR,ADS_ID) 
                            VALUES('$imageid','ACTIVE','$image_name','$image','$obj','$text','$adsid')";
                        } else{
                            $insertImageSQL = "INSERT INTO ".$catTable." (IMAGE_ID,IMAGE_STATUS,IMAGE_NAME,IMAGE_FILE,ADS_ID) 
                            VALUES('$imageid','ACTIVE','$image_name','$image','$adsid')";
                        }
                        
                        $insertImgResult = mysqli_query($conn,$insertImageSQL);
                        echo 'insertImageSQL: '.$insertImageSQL.'<br/>';
                        echo 'insertImgResult: '.$insertImgResult.'<br/>';
                        
                        if($insertImgResult){
                            echo 'Insert sucessfully';
                        }else{
                            echo 'Insert Image Fail<br/>';
                            echo 'Error: '.mysqli_error($conn);
                        }
                        
                    } else{
                        echo $j.
                        ').<span id="error">***Upload FAIL***</span><br/><br/>';
                    }
                } else{
                    echo $j.
                        ').<span id="error">***Either one req x each***</span><br/><br/>';
                        
                }
            }
        }

        if($insertAdResult && $insertImgResult){

            echo '<br/>---SUCCESS---<br/>';
            header("Location:ads-details.php?adsID=$adsid");
            exit();
        }
        else{
            echo '<br/>---FAIL---';
            echo '<br/>insertImgResult'.$insertImgResult.'<br/>';
            echo '<br/>insertAdResult'.$insertAdResult.'<br/>';

            /* if(strpos($category_group,'item')  !== false){ 
                $adsTable="ADS_ITEM";
                $catTable="image_item";
                $catPrefix="II";
            } else if(strpos($category_group,'accommodation')  !== false){ 
                $adsTable="ADS_ACCOM";
                $catTable="image_accom";
                $catPrefix="IA";
            } else if(strpos($category_group,'job')  !== false){ 
                $adsTable="ADS_JOB";
                $catTable="image_job";
                $catPrefix="IJ";
            } */
            
            if(!$insertImgResult){
                $delAdsSQL = "DELETE FROM `".$adsTable."` WHERE ADS_ID='$adsid'";        
                $delAdsResult = mysqli_query($conn,$delAdsSQL);
                echo '<br/>delAdsSQL: '.$delAdsSQL;
                if($delAdsResult){
                    echo 'DELETE ads sucessfully';
                }else{
                    echo 'DELETE ads FAIL <br/>';
                    echo 'Error: '.mysqli_error($conn);
                }

               header("Location:post-ads.php?error=ImageUploadFail");
            }
            if(!$insertAdResult){
                $delImageSQL = "DELETE ".$catTable." FROM ".$catTable." 
                            LEFT JOIN ".$adsTable." ON ".$catTable.".ADS_ID = ".$adsTable.".ADS_ID
                            WHERE ADS_ID='$adsid'";
           
                $delImgResult = mysqli_query($conn,$delImageSQL);
                echo '<br/>delImageSQL: '.$delImageSQL.'<br/>';
                echo '<br/>delImgResult: '.$delImgResult.'<br/>';

                if($delImgResult){
                    echo 'DELETE img sucessfully';
                }else{
                    echo 'DELETE img FAIL<br/>';
                    echo 'Error: '.mysqli_error($conn);
                }
              header("Location:post-ads.php?error=uploadFail");
            }

        }
    }

    if(isset($_POST['updateProfile_btn'])){
        echo '=========updateProfile_btn==========<br/>';
        $updateResult=false;
        
        $username=$_POST['username'];
        $phone='6';
        $phone.=$_POST['phone'];
        $user_email=$_SESSION['userEmail'];

        if(isset($_POST['loc'])){
            $user_loc=$_POST['loc'];
            $other_loc=$_POST['other_loc'];
            $other_loc=ucwords($other_loc);
        }      
        if(isset($_POST['school'])){
            $school=$_POST['school'];
        }  

        //Extract user_id out from db
        $updateUserSQL="UPDATE USER SET USER_NAME='$username', WHATSAPP='$phone', SCHOOL='$school',ADDRESS='$user_loc',AREA='$other_loc' WHERE USER_EMAIL='$user_email'";
        $updateResult=mysqli_query($conn,$updateUserSQL);
        
        echo 'updateUserSQL:'.$updateUserSQL;
        echo '<br/>updateResult:'.$updateResult;

     /*   if ( mysqli_num_rows($updateResult)){
            $row = mysqli_fetch_array($userResult);
            $userid=$row['USER_ID'];
        }    
       */ 
        if($updateResult){
            echo '<br/>---SUCCESS updateResult---';
           header("Location:account-profile-setting.php?update=success");
            exit();
        }
        else{
            echo '<br/>---FAIL updateResult---<br/>';
            echo 'updateResult'.$updateResult.'<br/>';
            header("Location:account-profile-setting.php?update=error");
        }
        
    }

    if(isset($_POST['updateAvatar_btn'])){
        echo '=========updateAvatar_btn==========<br/>';
        $updateResult=false;
        $avatarID=$_POST['avatarID'];
        $user_email=$_SESSION['userEmail'];
        echo 'imagesize:'.$_FILES['profileImage']['size'].'<br>';

        if($_FILES['profileImage']['size'] == 0){
            $avatar_name="back.jpg";
            $avatar_id=null;
            $insertImgResult=true;

            //if current avatar is available
            //unlink current avatar from src folder
            if($avatarID!='0'){
                $query = "SELECT * FROM AVATAR WHERE AVATAR_ID='$avatarID'";
                $result = mysqli_query($conn,$query);
                echo 'query:'.$query.'<br>';

                //unlink current avatar
                while ($delete = mysqli_fetch_array($result)) {
                    $image = $delete['AVATAR_NAME'];
                    $file= "img/avatar/".$image;
                    unlink($file);
                }

                //set avatar to null in user table
                $insertAvatarIDSQL="UPDATE USER SET AVATAR_ID='$avatar_id' WHERE USER_EMAIL='$user_email'";
                $insertAvatarIDResult = mysqli_query($conn,$insertAvatarIDSQL);
                echo 'insertAvatarIDSQL: '.$insertAvatarIDSQL.'<br/>';

                //delete data in avatar table
                $deleteAvatarSQL="DELETE FROM AVATAR WHERE AVATAR_ID='$avatarID'";
                $deleteAvatarResult = mysqli_query($conn,$deleteAvatarSQL);
                echo 'deleteAvatarSQL: '.$deleteAvatarSQL.'<br/>';

                if($insertAvatarIDResult&&$deleteAvatarResult){
                    echo 'delete sucessfully';
                    header("Location:account-profile-setting.php?update=success");
                    exit();
                }else{
                    echo 'Delete Image Fail<br/>';
                    echo 'Error: '.mysqli_error($conn);
                    header("Location:account-profile-setting.php?update=error");
                }
                    
            }else{

            }

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
            echo 'targetPath:'.$targetPath.'<br>';
               
            echo 'avatarID:'.$avatarID.'<br>';
            //if current avatar is available
            //unlink current avatar from src folder
            if($avatarID!='0'){
                $query = "SELECT * FROM AVATAR WHERE AVATAR_ID='$avatarID'";
                $result = mysqli_query($conn,$query);
                echo 'query:'.$query.'<br>';

                //unlink current avatar
                while ($delete = mysqli_fetch_array($result)) {
                    $image = $delete['AVATAR_NAME'];
                    $file= "img/avatar/".$image;
                    unlink($file);
                }

                //update avatar file in db
                if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $targetPath)) { //if file moved to uploads folder
                    $updateAvatarSQL = "UPDATE AVATAR SET AVATAR_NAME='$avatar_name',AVATAR_FILE='$avatar' 
                    WHERE AVATAR_ID='$avatarID';";
                    
                    $updateAvatarResult = mysqli_query($conn,$updateAvatarSQL);
                    echo 'updateAvatarSQL: '.$updateAvatarSQL.'<br/>';
                    echo 'updateAvatarResult: '.$updateAvatarResult.'<br/>';
                    
                    if($updateAvatarResult){
                        echo 'Update sucessfully';
                        header("Location:account-profile-setting.php?update=success");
                        exit();
                    }else{
                        echo 'Update Image Fail<br/>';
                        echo 'Error: '.mysqli_error($conn);
                        header("Location:account-profile-setting.php?update=error");
                    }
                    
                } else{
                    echo $j.').<span id="error">***Update avatar FAIL***</span><br/><br/>';
                    header("Location:account-profile-setting.php?update=error");
                }
            }else{
                
                //get mmaximun id number from table and output the next increment number with prefix AJ
                $avatarIDSQL="(SELECT IFNULL (CONCAT('A',LPAD((SUBSTRING_INDEX
                (MAX(`avatar_id`), 'A',-1) + 1), 5, '0')), 'A')
                AS 'IDNUMBER' FROM `AVATAR` ORDER BY `avatar_id` ASC)";
                $avatarIDResult=mysqli_query($conn,$avatarIDSQL);

                if ( mysqli_num_rows($avatarIDResult)){
                    $row = mysqli_fetch_array($avatarIDResult);
                    $avatar_id=$row['IDNUMBER'];
                }
                echo 'avatar_id'.$avatar_id.'<br>';

                //insert avatar file in db
                if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $targetPath)) { //if file moved to uploads folder
                    $insertAvatarSQL = "INSERT INTO AVATAR (AVATAR_ID,AVATAR_NAME,AVATAR_FILE) 
                    VALUES('$avatar_id','$avatar_name','$avatar')";

                    $insertAvatarIDSQL="UPDATE USER SET AVATAR_ID='$avatar_id' WHERE USER_EMAIL='$user_email'";
                    
                    $insertAvatarResult = mysqli_query($conn,$insertAvatarSQL);
                    $insertAvatarIDResult = mysqli_query($conn,$insertAvatarIDSQL);
                    echo 'insertAvatarSQL: '.$insertAvatarSQL.'<br/>';
                    echo 'insertAvatarResult: '.$insertAvatarResult.'<br/>';
                    
                    if($insertAvatarResult&&$insertAvatarIDResult){
                        echo 'Insert both sucessfully';
                        header("Location:account-profile-setting.php?update=success");
                        exit(); 
                    }else if(!$insertAvatarResult){
                        echo 'Insert  AVATAR Fail<br/>';
                        echo 'Error: '.mysqli_error($conn);
                        header("Location:account-profile-setting.php?update=error");
                    }else if(!$insertAvatarIDResult){
                        echo 'Insert  AVATAR_ID in USER Fail<br/>';
                        echo 'Error: '.mysqli_error($conn);
                        header("Location:account-profile-setting.php?update=error");
                    }
                    
                } else{
                    echo $j.').<span id="error">***INSERT avatar FAIL***</span><br/><br/>';
                    header("Location:account-profile-setting.php?update=error");
                }
                   
            }
            

            
            
            
        }
    }


    if(isset($_POST['chgPswd_btn'])){
        echo '=========chgPswd_btn==========<br/>';
        $updateResult=false;
        
        $user_pswd=$_POST['user_pswd'];
        $new_pswd=$_POST['new_pswd'];
        $user_email=$_SESSION['userEmail'];

        //CHECK CURRENT PASSWORD
        $getPswdSQL="SELECT USER_PSWD FROM USER WHERE USER_EMAIL='$user_email'";
        $getPswdResult=mysqli_query($conn,$getPswdSQL);

        if ( mysqli_num_rows($getPswdResult)){
            $row = mysqli_fetch_array($getPswdResult);
            $currentPswd=$row['USER_PSWD'];
        }else{
            echo '<br/>---FAIL updateResult---';
            header("Location:account-profile-setting.php?change=error");
            exit();
        }    

        if($currentPswd===$new_pswd){ //return error if new pswd = current pswd

            echo '<br/>---FAIL updateResult---';
            header("Location:account-profile-setting.php?change=incorrect");
            exit();

        }else if($currentPswd===$user_pswd){ //chg pswd if current pswd matched
            //UPDATE PSWD
            $updatePswdSQL="UPDATE USER SET USER_PSWD='$new_pswd' WHERE USER_EMAIL='$user_email'";
            $updateResult=mysqli_query($conn,$updatePswdSQL);
            
            echo 'updatePswdSQL:'.$updatePswdSQL;
            echo '<br/>updateResult:'.$updateResult;

            if($updateResult){
                echo '<br/>---SUCCESS updateResult---';
                header("Location:account-profile-setting.php?change=success");
                exit();
            }else{
                echo '<br/>---FAIL updateResult---';
                header("Location:account-profile-setting.php?change=error");
                exit();
            }
        }


    }


/*
        //Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
*/
?>