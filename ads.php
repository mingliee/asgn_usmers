<?php
require 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Usmers'</title>

<link rel="shortcut icon" href="img/icon.png" >
<link rel="icon" href="img/icon.png" >

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


<link rel="stylesheet" type="text/css" href="css/slicknav.css">

<link rel="stylesheet" type="text/css" href="css/nivo-lightbox.css">

<link rel="stylesheet" type="text/css" href="css/animate.css">

<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">

<link rel="stylesheet" type="text/css" href="css/main.css">

<link rel="stylesheet" type="text/css" href="css/responsive.css">

<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" type="text/css" href="fonts/line-icons.css">

</head>
<body>

<header id="header-wrap">

<?php
require_once 'config.php';
include  'navbar.php';
?>

<div id="hero-area">
<div class="overlay"></div>
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 text-center">
<div class="contents-ctg">

<?php
$keyword="";
$location="";
$category="";
if(isset($_GET['search_btn'])){

    $keyword=$_GET['keyword'];
    $location=$_GET['location'];
    if($location===''){
        $location='none';
    }
    $category=$_GET['category_group'];
}
?>

<div class="search-bar">
<div class="search-inner">

<form class="search-form" name="search" action="ads.php" method="GET" style="margin:0" >
    <div class="form-group inputwithicon">
    <i class="lni-tag"></i>
    <input type="text" name="keyword" class="form-control" value="<?php echo $keyword; ?>" placeholder="Enter Product Keyword">
    </div>
    <div class="form-group inputwithicon">
    <i class="lni-map-marker"></i>
        <div class="select">
            <select name="location" id="location" class="location" style="padding-left: 12px">
                <option value="" selected>Select Location</option>
                <?php 
                    $q1 = "SELECT * FROM LOCATION ORDER BY LOC_ID ASC";
                    $r1 = mysqli_query($conn,$q1);
                    echo 'loc:'.$location;
                    while($loc= mysqli_fetch_array($r1)){
                        if($loc['LOC_VALUE'] == 'none'||$location== ''){
                            echo '<option title="item" value="'.$loc['LOC_VALUE'].'"';
                            echo ' style="background-color:#dcdcc3;font-weight:bold;color:#000000;" disabled>
                            '.$loc['LOC_NAME'].'</option>';

                        }else if($loc['LOC_VALUE'] == $location){
                            echo '<option value="'.$loc['LOC_VALUE'].'" selected>';
                            echo $loc['LOC_NAME'].'</option>';
                        } 
                        else{
                            echo '<option value="'.$loc['LOC_VALUE'].'">';
                            echo $loc['LOC_NAME'].'</option>';
                        }
                    }
                ?>
            </select>
            <!-- <i onClick="getLocation()" class="lni-target" style="left: 200px;cursor:pointer;"></i> -->
        </div>
    </div>
    <div class="form-group inputwithicon">
    <i class="lni-menu"></i>
        <div class="select">
            <select id="category_group" name="category_group" style="padding-left: 12px">
                <option value="" selected>Select Categories</option>
                <?php 
                    $q1 = "SELECT * FROM CATEGORY ORDER BY CAT_ID ASC";
                    $r1 = mysqli_query($conn,$q1);

                    while($row= mysqli_fetch_array($r1)){
                        if($row['CAT_VALUE'] == 'none'){
                            echo '<option title="item" value="'.$row['CAT_VALUE'].'"';
                            echo ' style="background-color:#dcdcc3;font-weight:bold;color:#000000;" disabled>
                            '.$row['CAT_NAME'].'</option>';

                        }else if($row['CAT_VALUE'] == $category){
                            echo '<option value="'.$row['CAT_VALUE'].'" selected>';
                            echo $row['CAT_NAME'].'</option>';
                        }else{
                            echo '<option value="'.$row['CAT_VALUE'].'">';
                            echo $row['CAT_NAME'].'</option>';
                        }
                    }

                ?>
            </select>
        </div>
    </div>
    <button class="btn btn-common" type="submit" name="search_btn" id="search_btn"><i class="lni-search"></i> Search Now</button>
</form>
</div>
</div>

<p style="padding:10px 0px"> Or try...</p>
<div class="scFunc" style="text-align:center;">
<form action="visualSearch.php" method="post" enctype="multipart/form-data" style="display:inline-block;padding:0% 2%;  ">
    <label for="uploadImage"  class="btn btn-common">
    <input type="file" name="image" id= "uploadImage" onchange="this.form.submit()" accept="image/*" class="form-control"><i class="lni-keyword-research"></i> 
    Search By Image
    </label>
    <input name="adsID" id="adsID" value="" hidden>
</form>
<div style="display:inline-block;padding: 0% 2%;" onClick="getLocation()">
    <label class="btn btn-common">
    <i  class="lni-target" style="left: 200px;cursor:pointer;"></i>
    Search Near Me
    </label>
</div>
</div>
<p id="demo"></p>

</div>
</div>
</div>
</div>
</div>

</header>


<div class="main-container section-padding">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-12 col-xs-12 page-sidebar">
<aside>

<div class="widget categories">
<h4 class="widget-title">All Categories</h4>
<ul class="categories-list">
<li>
<a href="category.php?cat=accommodation">
<i class="lni-home"></i>
Accommodation & Rental
</a>
        <ul style="padding-left:25px">
                <a href="category.php?cat=house"><li style="padding:0px"> - House Rental</li></a>
                <a href="category.php?cat=room"><li style="padding:0px"> - Room Rental</li></a>
        </ul>
</li>
<li>
<a href="category.php?cat=job">
<i class="lni-briefcase"></i>
Job & Services
        <ul style="padding-left:25px">
                <a href="category.php?cat=jobs"><li style="padding:0px"> - Jobs</li></a>
                <a href="category.php?cat=service"><li style="padding:0px"> - Services</li></a>
        </ul>
</a>
</li>
<li>
<a href="category.php?cat=item">
<i class="lni-shopping-basket"></i>
Pre-loved/New Items
<ul style="padding-left:25px">
		<a href="category.php?cat=book"><li style="padding:0px"> - Books & Stationary</li></a>
		<a href="category.php?cat=home"><li style="padding:0px"> - Home Appliances & Furnitures</li></a>
		<a href="category.php?cat=clothing"><li style="padding:0px"> - Clothing & Accessories</li></a>
		<a href="category.php?cat=mobile"><li style="padding:0px"> - Mobile & Gadgets</li></a>
		<a href="category.php?cat=computer"><li style="padding:0px"> - Computer & Cameras</li></a>
		<a href="category.php?cat=automotive"><li style="padding:0px"> - Automotive</li></a>
		<a href="category.php?cat=sport"><li style="padding:0px"> - Sport & Hobbies</li></a>
		<a href="category.php?cat=personal"><li style="padding:0px"> - Personal Accessories</li></a>
		<a href="category.php?cat=health"><li style="padding:0px"> - Health & Beauty</li></a>
		<a href="category.php?cat=others"><li style="padding:0px"> - Others</li></a>
	</ul>
</a>
</li>
</ul>
</div>

</aside>
</div>
<div class="col-lg-9 col-md-12 col-xs-12 page-content">

<?php

    $byText=false;
    $byLoc=false;
    $byImg=false;

    if (isset($_GET['pageno'])) {
		$pageno = $_GET['pageno'];
	} else {
		$pageno = 1;
	}

	$no_of_records_per_page = 12;
    $offset = ($pageno-1) * $no_of_records_per_page;

    if(isset($_GET['search_btn'])){

        $byText=true;

        $keyword=$_GET['keyword'];
        $location=$_GET['location'];
        $category=$_GET['category_group'];

       // echo '<br/>location: '.$location.' category: '.$category;
        $single_keyword = explode ( " ", $keyword ); 
        $x = 0; 
        $construct_I = " ";
        $construct_A = " ";
        $construct_J = " ";
        $hitQuery_I =" ";
        $hitQuery_A =" ";
        $hitQuery_J =" ";
        foreach( $single_keyword as $search_each ) { 
            $x++;  
            //echo '<br/>x: '.$x.' search_each: '.$search_each;
            if( $x == 1 ) {
                $construct_I .= "I.ADS_TITLE LIKE '%$search_each%' "; 
                $construct_A .= "A.ADS_TITLE LIKE '%$search_each%' "; 
                $construct_J .= "J.ADS_TITLE LIKE '%$search_each%' "; 
                $hitQuery_I .= "(I.ADS_TITLE LIKE '%$search_each%') ";
                $hitQuery_A .= "(A.ADS_TITLE LIKE '%$search_each%') ";
                $hitQuery_J .= "(J.ADS_TITLE LIKE '%$search_each%') ";
            }
            else {
                $construct_I .= "OR I.ADS_TITLE LIKE '%$search_each%' ";
                $construct_A .= "OR A.ADS_TITLE LIKE '%$search_each%' ";
                $construct_J .= "OR J.ADS_TITLE LIKE '%$search_each%' ";
                $hitQuery_I .= "+(I.ADS_TITLE LIKE '%$search_each%') ";
                $hitQuery_A .= "+(A.ADS_TITLE LIKE '%$search_each%') ";
                $hitQuery_J .= "+(J.ADS_TITLE LIKE '%$search_each%') ";

            }
        } 
        //echo'<br/>construct: '.$construct;
        //echo'<br/>hitQuery: '.$hitQuery.'<br/>';

        /* $total_pages_sql="SELECT  COUNT(DISTINCT ADS_ITEM.ADS_ID)
                    FROM `ads_item` 
                    INNER JOIN `IMAGE` ON  (IMAGE.ADS_ID=ADS_ITEM.ADS_ID) 
                    INNER JOIN `user` on (ADS_ITEM.USER_ID=user.USER_ID) 
                    INNER JOIN `CATEGORY` ON (ADS_ITEM.ADS_CAT=CATEGORY.CAT_VALUE)
                    WHERE (";
        $total_pages_sql .= $construct;
        $total_pages_sql .=") AND ADS_CAT LIKE '%$category%' 
                    AND ADS_LOC LIKE '%$location%'
                    AND ADS_ITEM.ADS_STATUS='ACTIVE' 
			        AND IMAGE.IMAGE_STATUS='ACTIVE'"; */

        $total_pages_sql=   
            "SELECT COUNT(DISTINCT ADS_ID) FROM (
                SELECT I.ADS_ID AS ADS_ID
                FROM ADS_ITEM I   
                INNER JOIN IMAGE_ITEM II ON (I.ADS_ID=II.ADS_ID)   
                INNER JOIN USER U ON(U.USER_ID=I.USER_ID)   
                INNER JOIN CATEGORY C ON(C.CAT_VALUE=I.ADS_CAT) 
                INNER JOIN ABBR AB ON(AB.ABBR_VALUE=I.ITEM_CONDITION)  
                WHERE (";
        $total_pages_sql .= $construct_I;
        $total_pages_sql .=") 
                AND I.ADS_CAT  LIKE '%$category%' 
                AND I.ADS_LOC  LIKE '%$location%' 
                AND I.ADS_STATUS='ACTIVE'   
                AND I.PRIVATE_STATUS='ACTIVE'
                AND II.IMAGE_STATUS='ACTIVE'    
                GROUP BY (I.ADS_ID)  
                UNION SELECT   
                A.ADS_ID AS ADS_ID  
                FROM ADS_ACCOM A   
                INNER JOIN IMAGE_ACCOM IA ON (A.ADS_ID=IA.ADS_ID)   
                INNER JOIN USER U ON(U.USER_ID=A.USER_ID)   
                INNER JOIN CATEGORY C ON(C.CAT_VALUE=A.ADS_CAT)  
                INNER JOIN ABBR AB ON(AB.ABBR_VALUE=A.ACCM_TENET_PREF)  
                WHERE (";
                        $total_pages_sql .= $construct_A;
                        $total_pages_sql .=")  
                AND A.ADS_CAT  LIKE '%$category%' 
                AND A.ADS_LOC  LIKE '%$location%'
                AND A.ADS_STATUS='ACTIVE'  
                AND A.PRIVATE_STATUS='ACTIVE' 
                AND IA.IMAGE_STATUS='ACTIVE'   
                GROUP BY (A.ADS_ID)  
                UNION SELECT J.ADS_ID AS ADS_ID 
                FROM ADS_JOB J   
                INNER JOIN IMAGE_JOB IJ ON (J.ADS_ID=IJ.ADS_ID)   
                INNER JOIN USER U ON(U.USER_ID=J.USER_ID)   
                INNER JOIN CATEGORY C ON(C.CAT_VALUE=J.ADS_CAT) 
                INNER JOIN ABBR AB ON(AB.ABBR_VALUE=J.JOB_CONTRACT_TYPE)  
                WHERE (";
                        $total_pages_sql .= $construct_J;
                        $total_pages_sql .=")  
                AND J.ADS_CAT  LIKE '%$category%' 
                AND J.ADS_LOC  LIKE '%$location%'
                AND J.ADS_STATUS='ACTIVE' 
                AND J.PRIVATE_STATUS='ACTIVE'  
                AND IJ.IMAGE_STATUS='ACTIVE'   
                GROUP BY (J.ADS_ID)
                ) AS TOTAL_ADS";

  //echo '<br/>total_pages_sql: '.$total_pages_sql;

        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        //echo 'total_pages_sql= '.$total_pages_sql.'<br/>';
        //echo 'total_rows: '.$total_rows.'<br/>';

        /* $searchSQL="SELECT (";
        $searchSQL.=$hitQuery;
        $searchSQL.=") as TITLE_hits,
                    ADS_ITEM.ADS_ID, ADS_ITEM.ADS_TITLE, IMAGE.IMAGE_NAME, ADS_ITEM.ADS_PRICE, ADS_ITEM.ADS_DESCP, ADS_ITEM.ADS_LOC, ADS_ITEM.ADS_CAT, ADS_ITEM.ADS_LATEST_UPDATE_DATE,
                    IMAGE.IMAGE_ID,USER.USER_NAME,ADS_ITEM.ADS_CAT,CATEGORY.CAT_NAME
                    FROM `ads_item` 
                    INNER JOIN `IMAGE` ON  (IMAGE.ADS_ID=ADS_ITEM.ADS_ID) 
                    INNER JOIN `user` on (ADS_ITEM.USER_ID=user.USER_ID) 
                    INNER JOIN `CATEGORY` ON (ADS_ITEM.ADS_CAT=CATEGORY.CAT_VALUE)
                    WHERE (";
        $searchSQL .= $construct_I;
        $searchSQL .=") AND ADS_CAT LIKE '%$category%' 
                    AND ADS_LOC LIKE '%$location%'
                    AND ADS_ITEM.ADS_STATUS='ACTIVE' 
			        AND IMAGE.IMAGE_STATUS='ACTIVE'
                    GROUP BY (IMAGE.ADS_ID)
                    HAVING (TITLE_hits) > 0
                    ORDER BY TITLE_hits DESC
                    LIMIT $offset, $no_of_records_per_page"; */

        $searchSQL="SELECT DISTINCT (";
        $searchSQL.=$hitQuery_I;
        $searchSQL.=")  as TITLE_hits, 
        I.ADS_ID, I.ADS_TITLE, II.IMAGE_NAME, 
        I.ADS_PRICE, I.ADS_DESCP, I.ADS_LOC, I.ADS_CAT, 
        I.ADS_LATEST_UPDATE_DATE, II.IMAGE_ID,U.USER_NAME,I.ADS_CAT, 
        C.CAT_NAME ,AB.ABBR_NAME AS SUB_INFO 
        FROM ADS_ITEM  I
        INNER JOIN IMAGE_ITEM II  ON (II.ADS_ID=I.ADS_ID) 
        INNER JOIN USER U on (I.USER_ID=U.USER_ID) 
        INNER JOIN CATEGORY C ON (I.ADS_CAT=C.CAT_VALUE) 
        INNER JOIN ABBR AB ON(AB.ABBR_VALUE=I.ITEM_CONDITION) 
        WHERE (";
                $searchSQL .= $construct_I;
                $searchSQL .=")
        AND I.ADS_CAT LIKE '%$category%' AND I.ADS_LOC LIKE '%$location%' 
        AND I.ADS_STATUS='ACTIVE' 
        AND I.PRIVATE_STATUS='ACTIVE'
        AND II.IMAGE_STATUS='ACTIVE' 
        GROUP BY I.ADS_ID 
        UNION 
        SELECT DISTINCT (";
                $searchSQL.=$hitQuery_A;
                $searchSQL.=")  as TITLE_hits, 
        A.ADS_ID, A.ADS_TITLE, IA.IMAGE_NAME, 
        A.ADS_PRICE,A.ADS_DESCP, A.ADS_LOC, A.ADS_CAT, 
        A.ADS_LATEST_UPDATE_DATE, IA.IMAGE_ID,U.USER_NAME,A.ADS_CAT, 
        C.CAT_NAME ,AB.ABBR_NAME AS SUB_INFO 
        FROM ADS_ACCOM  A
        INNER JOIN IMAGE_ACCOM IA  ON (IA.ADS_ID=A.ADS_ID) 
        INNER JOIN USER U on (A.USER_ID=U.USER_ID) 
        INNER JOIN CATEGORY C ON (A.ADS_CAT=C.CAT_VALUE) 
        INNER JOIN ABBR AB ON(AB.ABBR_VALUE=A.ACCM_TENET_PREF) 
        WHERE (";
                $searchSQL .= $construct_A;
                $searchSQL .=")
        AND A.ADS_CAT LIKE '%$category%' AND A.ADS_LOC LIKE '%$location%' 
        AND A.ADS_STATUS='ACTIVE' 
        AND A.PRIVATE_STATUS='ACTIVE'
        AND IA.IMAGE_STATUS='ACTIVE' 
        GROUP BY A.ADS_ID 
        UNION 
        SELECT DISTINCT (";
                $searchSQL.=$hitQuery_J;
                $searchSQL.=")  as TITLE_hits, 
        J.ADS_ID, J.ADS_TITLE, IJ.IMAGE_NAME, 
        J.ADS_PRICE,J.ADS_DESCP, J.ADS_LOC, J.ADS_CAT, 
        J.ADS_LATEST_UPDATE_DATE, IJ.IMAGE_ID,U.USER_NAME,J.ADS_CAT, 
        C.CAT_NAME ,AB.ABBR_NAME AS SUB_INFO 
        FROM ADS_JOB  J
        INNER JOIN IMAGE_JOB IJ  ON (IJ.ADS_ID=J.ADS_ID) 
        INNER JOIN USER U on (J.USER_ID=U.USER_ID) 
        INNER JOIN CATEGORY C ON (J.ADS_CAT=C.CAT_VALUE) 
        INNER JOIN ABBR AB ON(AB.ABBR_VALUE=J.JOB_CONTRACT_TYPE) 
        WHERE (";
                $searchSQL .= $construct_J;
                $searchSQL .=")
        AND J.ADS_CAT LIKE '%$category%' AND J.ADS_LOC LIKE '%$location%' 
        AND J.ADS_STATUS='ACTIVE' 
        AND J.PRIVATE_STATUS='ACTIVE'
        AND IJ.IMAGE_STATUS='ACTIVE' 
        GROUP BY J.ADS_ID 
        HAVING (TITLE_hits) > 0 
        ORDER BY TITLE_hits DESC, ADS_LATEST_UPDATE_DATE DESC
        LIMIT $offset, $no_of_records_per_page";

    //echo '<br/><br/>searchSQL: '.$searchSQL;

    } else if (isset($_GET['label'])){ //Search by image SQL
        $byImg=true;

		$label=$_GET['label'];
		$text=$_GET['text'];	
		
	    // $label = mysqli_real_escape_string($conn,$label);
	    // $text = mysqli_real_escape_string($conn,$text);


	    //---------------------------------------------
	    //speacialized each LIKE opearator for each label
		//---------------------------------------------
		$single_label = explode ( ",", $label ); 
		//filter last null after comma
		//take out when ady solve the comma problem (at visualSearch.php)when pass to GET (here)
		$single_label = array_filter($single_label);
		$x = 0; 
		$construct = " ";
		$hitQuery =" ";
		foreach( $single_label as $search_each ) { 
			$x++;  
			//echo '<br/>x: '.$x.' search_each: '.$search_each;
			if( $x == 1 ) {
				$construct .= "IMAGE_ITEM.IMAGE_LABEL LIKE '%$search_each%' "; 
				$hitQuery .= "(IMAGE_ITEM.IMAGE_LABEL LIKE '%$search_each%') ";
			}
			else {
				$construct .= "OR IMAGE_ITEM.IMAGE_LABEL LIKE '%$search_each%' ";
				$hitQuery .= "+(IMAGE_ITEM.IMAGE_LABEL LIKE '%$search_each%') ";

			}
		} 

		//---------------------------------------------
	        //speacialized each LIKE opearator for each OCR text
		//---------------------------------------------
		$single_text = explode ( " ", $text ); 
		//filter last null after comma
		//take out when ady solve the comma problem (at cisualSearch.php)when pass to GET (here)
		$single_text = array_filter($single_text);
		$y = 0; 
		$constructText = " ";
		$hitQueryText =" ";
		foreach( $single_text as $search_each ) { 
			$y++;  
			//echo '<br/>x: '.$x.' search_each: '.$search_each;
			if( $y == 1 ) {
				$constructText .= "IMAGE_ITEM.IMAGE_OCR LIKE '%$search_each%' "; 
				$hitQueryText .= "(IMAGE_ITEM.IMAGE_OCR LIKE '%$search_each%') ";
			}
			else {
				$constructText .= "OR IMAGE_ITEM.IMAGE_OCR LIKE '%$search_each%' ";
				$hitQueryText .= "+(IMAGE_ITEM.IMAGE_OCR LIKE '%$search_each%') ";
			}
		} 
		
		if ($text==null || $text==""){   //IF TEXT IS NULL (NO OCR)

            $total_pages_sql ="SELECT COUNT(DISTINCT ADS_ITEM.ADS_ID) FROM `ADS_ITEM` 
			INNER JOIN `IMAGE_ITEM` ON  (IMAGE_ITEM.ADS_ID=ADS_ITEM.ADS_ID) 
				INNER JOIN `user` on (ADS_ITEM.USER_ID=user.USER_ID) 
				INNER JOIN `CATEGORY` ON (ADS_ITEM.ADS_CAT=CATEGORY.CAT_VALUE)
                INNER JOIN `ABBR`  ON (ABBR_VALUE=ADS_ITEM.ITEM_CONDITION)
				WHERE (";
			$total_pages_sql .= $construct;
			$total_pages_sql .=") AND ADS_ITEM.ADS_STATUS='ACTIVE' 
                AND ADS_ITEM.PRIVATE_STATUS='ACTIVE'
				AND IMAGE_ITEM.IMAGE_STATUS='ACTIVE'";

            $result = mysqli_query($conn,$total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);

			$searchSQL="SELECT (";
			$searchSQL.=$hitQuery;
			$searchSQL.=") as LABEL_hits,
				ADS_ITEM.ADS_ID, ADS_ITEM.ADS_TITLE, IMAGE_ITEM.IMAGE_NAME, ADS_ITEM.ADS_PRICE, ADS_ITEM.ADS_DESCP, ADS_ITEM.ADS_LOC, ADS_ITEM.ADS_CAT, ADS_ITEM.ADS_LATEST_UPDATE_DATE,
				IMAGE_ITEM.IMAGE_ID,USER.USER_NAME,ADS_ITEM.ADS_CAT,CATEGORY.CAT_NAME,ABBR.ABBR_NAME AS SUB_INFO
				FROM `ADS_ITEM` 
				INNER JOIN `IMAGE_ITEM` ON  (IMAGE_ITEM.ADS_ID=ADS_ITEM.ADS_ID) 
				INNER JOIN `user` on (ADS_ITEM.USER_ID=user.USER_ID) 
				INNER JOIN `CATEGORY` ON (ADS_ITEM.ADS_CAT=CATEGORY.CAT_VALUE)
                INNER JOIN `ABBR`  ON (ABBR_VALUE=ADS_ITEM.ITEM_CONDITION)
				WHERE (";
			$searchSQL .= $construct;
			$searchSQL .=") AND ADS_ITEM.ADS_STATUS='ACTIVE'
                AND ADS_ITEM.PRIVATE_STATUS='ACTIVE' 
				AND IMAGE_ITEM.IMAGE_STATUS='ACTIVE'
				GROUP BY (IMAGE_ITEM.ADS_ID)
				HAVING (LABEL_hits) > 0
				ORDER BY LABEL_hits DESC,ADS_LATEST_UPDATE_DATE DESC
                LIMIT $offset, $no_of_records_per_page";

		}else{ //ELSE IF TEXT IS NOT NULL (UNDERGO OCR)

            $total_pages_sql ="SELECT COUNT(DISTINCT ADS_ITEM.ADS_ID) FROM `ADS_ITEM` 
			    INNER JOIN `IMAGE_ITEM` ON  (IMAGE_ITEM.ADS_ID=ADS_ITEM.ADS_ID) 
				INNER JOIN `user` on (ADS_ITEM.USER_ID=user.USER_ID) 
				INNER JOIN `CATEGORY` ON (ADS_ITEM.ADS_CAT=CATEGORY.CAT_VALUE)
                INNER JOIN `ABBR`  ON (ABBR_VALUE=ADS_ITEM.ITEM_CONDITION)
				WHERE (";
			$total_pages_sql .= $construct;
			$total_pages_sql .=") AND (";
			$total_pages_sql .=$constructText;
			$total_pages_sql .= ") AND ADS_ITEM.ADS_STATUS='ACTIVE' 
                AND ADS_ITEM.PRIVATE_STATUS='ACTIVE'
				AND IMAGE_ITEM.IMAGE_STATUS='ACTIVE'";

            $result = mysqli_query($conn,$total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);


			$searchSQL="SELECT (";
			$searchSQL .=$hitQuery;
			$searchSQL .= " + ";
			$searchSQL .=$hitQueryText;
			$searchSQL .= ") as TOTAL_hits,
				ADS_ITEM.ADS_ID, ADS_ITEM.ADS_TITLE, IMAGE_ITEM.IMAGE_NAME, ADS_ITEM.ADS_PRICE, ADS_ITEM.ADS_DESCP, ADS_ITEM.ADS_LOC, ADS_ITEM.ADS_CAT, ADS_ITEM.ADS_LATEST_UPDATE_DATE,
				IMAGE_ITEM.IMAGE_ID,USER.USER_NAME,ADS_ITEM.ADS_CAT,CATEGORY.CAT_NAME,ABBR.ABBR_NAME AS SUB_INFO
				FROM `ADS_ITEM` 
				INNER JOIN `IMAGE_ITEM` ON  (IMAGE_ITEM.ADS_ID=ADS_ITEM.ADS_ID) 
				INNER JOIN `user` on (ADS_ITEM.USER_ID=user.USER_ID) 
				INNER JOIN `CATEGORY` ON (ADS_ITEM.ADS_CAT=CATEGORY.CAT_VALUE)
                INNER JOIN `ABBR`  ON (ABBR_VALUE=ADS_ITEM.ITEM_CONDITION)
				WHERE (";
			$searchSQL .= $construct;
			$searchSQL .=") AND (";
			$searchSQL .=$constructText;
			$searchSQL .= ") AND ADS_ITEM.ADS_STATUS='ACTIVE' 
                AND ADS_ITEM.PRIVATE_STATUS='ACTIVE'    
				AND IMAGE_ITEM.IMAGE_STATUS='ACTIVE'
				GROUP BY (IMAGE_ITEM.ADS_ID)
				HAVING  (TOTAL_hits) > 0
				ORDER BY (TOTAL_hits) DESC,ADS_LATEST_UPDATE_DATE DESC
                LIMIT $offset, $no_of_records_per_page";
		}  

		//echo '<br/>searchSQL: '.$searchSQL;
	}else if (isset($_GET['lat'])){ //Search Around Me

        $byLoc=true;

        $lat=$_GET['lat'];
        $lng=$_GET['lng'];
/*         echo 'lat: '.$lat.'<br>';
        echo 'lng: '.$lng.'<br>'; */

        $total_pages_sql="SELECT COUNT(DISTINCT ADS_ID) FROM (
            SELECT (((acos(sin(( ".$lat." * pi() / 180))*sin(( LOCATION.lat * pi() / 180)) 
            + cos(( ".$lat." * pi() /180 ))*cos(( LOCATION.lat * pi() / 180)) * 
            cos((( ".$lng." - LOCATION.lng) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance,
            ADS_ITEM.ADS_ID
            FROM `ADS_ITEM`
            INNER JOIN `IMAGE_ITEM` ON  (IMAGE_ITEM.ADS_ID=ADS_ITEM.ADS_ID) 
            INNER JOIN `user` on (ADS_ITEM.USER_ID=user.USER_ID) 
            INNER JOIN `CATEGORY` ON (ADS_ITEM.ADS_CAT=CATEGORY.CAT_VALUE)
            INNER JOIN `ABBR`  ON (ABBR_VALUE=ADS_ITEM.ITEM_CONDITION)
            INNER JOIN `LOCATION` ON (LOCATION.LOC_VALUE=ADS_ITEM.ADS_LOC)
            WHERE ADS_ITEM.ADS_STATUS='ACTIVE' 
            AND ADS_ITEM.PRIVATE_STATUS='ACTIVE'
            AND IMAGE_ITEM.IMAGE_STATUS='ACTIVE'
            GROUP BY (IMAGE_ITEM.ADS_ID)
            HAVING  (distance) >= 0
            UNION
            SELECT (((acos(sin(( ".$lat." * pi() / 180))*sin(( LOCATION.lat * pi() / 180)) 
                    + cos(( ".$lat." * pi() /180 ))*cos(( LOCATION.lat * pi() / 180)) * 
                    cos((( ".$lng." - LOCATION.lng) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance, 
            ADS_ACCOM.ADS_ID
            FROM `ADS_ACCOM`
            INNER JOIN `IMAGE_ACCOM` ON  (IMAGE_ACCOM.ADS_ID=ADS_ACCOM.ADS_ID) 
            INNER JOIN `user` on (ADS_ACCOM.USER_ID=user.USER_ID) 
            INNER JOIN `CATEGORY` ON (ADS_ACCOM.ADS_CAT=CATEGORY.CAT_VALUE)
            INNER JOIN `ABBR`  ON (ABBR_VALUE=ADS_ACCOM.ACCM_TENET_PREF)
            INNER JOIN `LOCATION` ON (LOCATION.LOC_VALUE=ADS_ACCOM.ADS_LOC)
            WHERE ADS_ACCOM.ADS_STATUS='ACTIVE' 
            AND ADS_ACCOM.PRIVATE_STATUS='ACTIVE'
            AND IMAGE_ACCOM.IMAGE_STATUS='ACTIVE'
            GROUP BY (IMAGE_ACCOM.ADS_ID)
            HAVING  (distance) >= 0
            UNION
            SELECT (((acos(sin(( ".$lat." * pi() / 180))*sin(( LOCATION.lat * pi() / 180)) 
                    + cos(( ".$lat." * pi() /180 ))*cos(( LOCATION.lat * pi() / 180)) * 
                    cos((( ".$lng." - LOCATION.lng) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance,
            ADS_JOB.ADS_ID
            FROM `ADS_JOB`
            INNER JOIN `IMAGE_JOB` ON  (IMAGE_JOB.ADS_ID=ADS_JOB.ADS_ID) 
            INNER JOIN `user` on (ADS_JOB.USER_ID=user.USER_ID) 
            INNER JOIN `CATEGORY` ON (ADS_JOB.ADS_CAT=CATEGORY.CAT_VALUE)
            INNER JOIN `ABBR`  ON (ABBR_VALUE=ADS_JOB.JOB_CONTRACT_TYPE)
            INNER JOIN `LOCATION` ON (LOCATION.LOC_VALUE=ADS_JOB.ADS_LOC)
            WHERE ADS_JOB.ADS_STATUS='ACTIVE' 
            AND ADS_JOB.PRIVATE_STATUS='ACTIVE'
            AND IMAGE_JOB.IMAGE_STATUS='ACTIVE'
            GROUP BY (IMAGE_JOB.ADS_ID)
            HAVING  (distance) >= 0			
            ) AS TOTAL_ADS";

        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $searchSQL="SELECT (((acos(sin(( ".$lat." * pi() / 180))*sin(( LOCATION.lat * pi() / 180)) 
                    + cos(( ".$lat." * pi() /180 ))*cos(( LOCATION.lat * pi() / 180)) * 
                    cos((( ".$lng." - LOCATION.lng) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance, 
                    ADS_ITEM.ADS_ID, ADS_ITEM.ADS_TITLE, IMAGE_ITEM.IMAGE_NAME, ADS_ITEM.ADS_PRICE, ADS_ITEM.ADS_DESCP, ADS_ITEM.ADS_LOC, ADS_ITEM.ADS_CAT, ADS_ITEM.ADS_LATEST_UPDATE_DATE,
                    IMAGE_ITEM.IMAGE_ID,USER.USER_NAME,ADS_ITEM.ADS_CAT,CATEGORY.CAT_NAME,ABBR.ABBR_NAME AS SUB_INFO
                    FROM `ADS_ITEM`
                    INNER JOIN `IMAGE_ITEM` ON  (IMAGE_ITEM.ADS_ID=ADS_ITEM.ADS_ID) 
                    INNER JOIN `user` on (ADS_ITEM.USER_ID=user.USER_ID) 
                    INNER JOIN `CATEGORY` ON (ADS_ITEM.ADS_CAT=CATEGORY.CAT_VALUE)
                    INNER JOIN `ABBR`  ON (ABBR_VALUE=ADS_ITEM.ITEM_CONDITION)
                    INNER JOIN `LOCATION` ON (LOCATION.LOC_VALUE=ADS_ITEM.ADS_LOC)
                    WHERE ADS_ITEM.ADS_STATUS='ACTIVE' 
                    AND ADS_ITEM.PRIVATE_STATUS='ACTIVE'
                    AND IMAGE_ITEM.IMAGE_STATUS='ACTIVE'
                    GROUP BY (IMAGE_ITEM.ADS_ID)
                    HAVING  (distance) >= 0
                    UNION
                    SELECT (((acos(sin(( ".$lat." * pi() / 180))*sin(( LOCATION.lat * pi() / 180)) 
                    + cos(( ".$lat." * pi() /180 ))*cos(( LOCATION.lat * pi() / 180)) * 
                    cos((( ".$lng." - LOCATION.lng) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance, 
                    ADS_ACCOM.ADS_ID, ADS_ACCOM.ADS_TITLE, IMAGE_ACCOM.IMAGE_NAME, ADS_ACCOM.ADS_PRICE, ADS_ACCOM.ADS_DESCP, ADS_ACCOM.ADS_LOC, ADS_ACCOM.ADS_CAT, ADS_ACCOM.ADS_LATEST_UPDATE_DATE,
                    IMAGE_ACCOM.IMAGE_ID,USER.USER_NAME,ADS_ACCOM.ADS_CAT,CATEGORY.CAT_NAME,ABBR.ABBR_NAME AS SUB_INFO
                    FROM `ADS_ACCOM`
                    INNER JOIN `IMAGE_ACCOM` ON  (IMAGE_ACCOM.ADS_ID=ADS_ACCOM.ADS_ID) 
                    INNER JOIN `user` on (ADS_ACCOM.USER_ID=user.USER_ID) 
                    INNER JOIN `CATEGORY` ON (ADS_ACCOM.ADS_CAT=CATEGORY.CAT_VALUE)
                    INNER JOIN `ABBR`  ON (ABBR_VALUE=ADS_ACCOM.ACCM_TENET_PREF)
                    INNER JOIN `LOCATION` ON (LOCATION.LOC_VALUE=ADS_ACCOM.ADS_LOC)
                    WHERE ADS_ACCOM.ADS_STATUS='ACTIVE'
                    AND ADS_ACCOM.PRIVATE_STATUS='ACTIVE' 
                    AND IMAGE_ACCOM.IMAGE_STATUS='ACTIVE'
                    GROUP BY (IMAGE_ACCOM.ADS_ID)
                    HAVING  (distance) >= 0
                    UNION
                    SELECT (((acos(sin(( ".$lat." * pi() / 180))*sin(( LOCATION.lat * pi() / 180)) 
                    + cos(( ".$lat." * pi() /180 ))*cos(( LOCATION.lat * pi() / 180)) * 
                    cos((( ".$lng." - LOCATION.lng) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance, 
                    ADS_JOB.ADS_ID, ADS_JOB.ADS_TITLE, IMAGE_JOB.IMAGE_NAME, ADS_JOB.ADS_PRICE, ADS_JOB.ADS_DESCP, ADS_JOB.ADS_LOC, ADS_JOB.ADS_CAT, ADS_JOB.ADS_LATEST_UPDATE_DATE,
                    IMAGE_JOB.IMAGE_ID,USER.USER_NAME,ADS_JOB.ADS_CAT,CATEGORY.CAT_NAME,ABBR.ABBR_NAME AS SUB_INFO
                    FROM `ADS_JOB`
                    INNER JOIN `IMAGE_JOB` ON  (IMAGE_JOB.ADS_ID=ADS_JOB.ADS_ID) 
                    INNER JOIN `user` on (ADS_JOB.USER_ID=user.USER_ID) 
                    INNER JOIN `CATEGORY` ON (ADS_JOB.ADS_CAT=CATEGORY.CAT_VALUE)
                    INNER JOIN `ABBR`  ON (ABBR_VALUE=ADS_JOB.JOB_CONTRACT_TYPE)
                    INNER JOIN `LOCATION` ON (LOCATION.LOC_VALUE=ADS_JOB.ADS_LOC)
                    WHERE ADS_JOB.ADS_STATUS='ACTIVE' 
                    AND ADS_JOB.PRIVATE_STATUS='ACTIVE'
                    AND IMAGE_JOB.IMAGE_STATUS='ACTIVE'
                    GROUP BY (IMAGE_JOB.ADS_ID)
                    HAVING  (distance) >= 0
                    ORDER BY distance ASC
                    LIMIT $offset, $no_of_records_per_page";

    }

        $GridSearchResult = mysqli_query($conn,$searchSQL);
        $ListSearchResult = mysqli_query($conn,$searchSQL);

        $numAds=mysqli_num_rows($GridSearchResult);
        //echo 'total_pages_sql: '.$total_pages_sql.'<br>';
        //echo 'searchSQL: '.$searchSQL.'<br>';
?>

<div class="product-filter">
<div class="short-name">
<span>Showing <?php echo $total_rows?> Ads</span>
</div>
<!-- <div class="Show-item">
<span>Show Items</span>
<form class="woocommerce-ordering" method="post">
<label>
<select name="order" class="orderby">
<option selected="selected" value="menu-order">49 items</option>
<option value="popularity">popularity</option>
<option value="popularity">Average ration</option>
<option value="popularity">newness</option>
<option value="popularity">price</option>
</select>
</label>
</form>
</div> -->
<ul class="nav nav-tabs">
<li class="nav-item">
<a class="nav-link active" data-toggle="tab" href="#grid-view"><i class="lni-grid"></i></a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#list-view"><i class="lni-list"></i></a>
</li>
</ul>
</div>


<div >
<div class="tab-content">
<!-- <?php
echo '<p style="text-align:right">total_pages: '.$total_pages.'</p>';
echo '<p style="text-align:right">numAds: '.$total_rows.'</p><br/>';
 ?> -->

<?php
echo '<div id="grid-view" class="tab-pane fade active show">
<div class="row">';

    if ( mysqli_num_rows($GridSearchResult)> 0){
        while($row = mysqli_fetch_assoc($GridSearchResult)){
            $ads_id = $row['ADS_ID'];
            $name = $row ['ADS_TITLE'];
            $name = str_replace( '"',"'", $name);
            $image = $row['IMAGE_NAME'];
            $price = $row['ADS_PRICE'];
            if($price=='0'){
                $free="true";
                $price="FREE";
            }else{
                $free="false";
            }
            $price=str_ireplace('.00','',$price);
            $price=str_ireplace('.00','',$price);
            $descp = $row['ADS_DESCP'];
            $loc = $row['ADS_LOC'];
            $cat = $row['CAT_NAME'];
            //  $cat = strtok($cat, " ");
            $cat_value=$row['ADS_CAT'];
            $date = date("j M y",strtotime($row['ADS_LATEST_UPDATE_DATE']));
            $seller = $row ['USER_NAME'];
            $sub=$row['SUB_INFO'];

            echo '<form action="ads-details.php" class="col-xs-6 col-lg-4" method="GET">';            
            echo '<button type="submit" class=" filterDiv" name="adsID" value="';
            echo $ads_id;
            echo '"><div class="feature-container">
            <div class="featured-box">
            <div class="img-1">
            <div class="img-2">
            <img class="img-fluid" src="img/product/';
            echo $image;
            echo '" alt="">
            </div>
            </div>
            
            <div class="feature-content">
            <div class="product">
            <a href="category.php?cat='.$cat_value.'"><i class="lni-folder"></i> ';
            echo $cat;
            echo '</a>
            </div>
            <h4>';
            echo $name;
            echo '</h4>
            <ul class="address">
            <li>
            <a href="#"><i class="lni-map-marker"></i> ';
            echo $loc;
            echo '</a>
            </li>
            <li>
            <a href="#"><i class="lni-alarm-clock"></i> ';
            echo $date.'</a></li>';
            echo '<li style="float:right;">';
            if(strpos($cat_value, 'accommodation') !== false)
            echo '<i class="lni-users" style="font-size: 15px;margin-right:3px;"></i>';
            else
            echo '<i class="lni-package"></i> ';
            echo $sub.'
            </li>
            </ul>';
            echo '<div class="listing-bottom">
            <h3 class="price float-left">';
            if($free!='true'){
            echo 'RM ';}
            echo $price.'</h3>';
            echo '<div class="sellerName" style="text-align:right;color: #999;">
            <i class="lni-user"  style="margin-right: 5px" ></i> '.$seller.'
            </div>';
            echo '</div>
            </div>
            </div>
            </div>
            </button>
            </form>';

        }      
    }
    else{
        echo '<h6 style="text-align: center;position: absolute;width: 100%;  ">No result found</h6>';
    }
 
echo' </div>
    </div>';
?>

<?php


        echo '<div id="list-view" class="tab-pane fade">
        <div class="row">';

    
            if ( mysqli_num_rows($ListSearchResult)> 0){
                while($row = mysqli_fetch_assoc($ListSearchResult)){
                    $ads_id = $row['ADS_ID'];
                    $name = $row ['ADS_TITLE'];
                    $name = str_replace( '"',"'", $name);
                    $image = $row['IMAGE_NAME'];
                    $price = $row['ADS_PRICE'];
                    if($price=='0'){
                        $free="true";
                        $price="FREE";
                    }else{
                        $free="false";
                    }
                    $price=str_ireplace('.00','',$price);
                    $descp = $row['ADS_DESCP'];
                    $loc = $row['ADS_LOC'];
                    $cat = $row['CAT_NAME'];
                //  $cat = strtok($cat, " ");
                    $cat_value=$row['ADS_CAT'];
                    $date = date("j M y",strtotime($row['ADS_LATEST_UPDATE_DATE']));
                    $seller = $row ['USER_NAME'];
                    $sub=$row['SUB_INFO'];
    
                    echo '<form action="ads-details.php" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" method="GET">';            
                    echo '<button type="submit" class=" filterDiv" name="ads" value="';
                    echo $ads_id;
                    echo '"><div>
                    <div class="featured-box">
                    <div class="img-1">
                    <div class="img-2">
                    <img class="img-fluid" src="img/product/'.$image.'" alt="">
                    </div>
                    </div>';
                    echo '<div class="feature-content">
                    <div class="product">
                    <a href="category.php?cat='.$cat_value.'"><i class="lni-folder"></i> ';
                    echo $cat;
                    echo '</a>
                    </div><h4>';
                    echo $name;
                    echo '</h4>
                    <span>Last Updated: 4 hours ago</span>
                    <ul class="address">
                    <li>
                    <a href="#"><i class="lni-map-marker"></i>'.$loc;
                    echo '</a>
                    </li>
                    <li>
                    <a href="#"><i class="lni-alarm-clock"></i> '.$date;
                    echo '</a>
                    </li>
                    <li style="float:right;">';
                    if(strpos($cat_value, 'accommodation') !== false)
                    echo '<i class="lni-users" style="font-size: 15px;margin-right:3px;"></i>';
                    else
                    echo '<i class="lni-package"></i> ';
                    echo $sub.'
                    </li>
                    </ul>';
                    
                    echo '<div class="listing-bottom">
                    <h3 class="price float-left">';
                    if($free!='true'){
                    echo 'RM ';}
                    echo $price.'</h3>
                    <div class="sellerName"  style="text-align:right;color: #999;">
                    <i class="lni-user"  style="margin-right: 5px" ></i> '.$seller.'
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </button>
                    </form>';
    
                }      
            }else{
                echo '<h6 style="text-align: center;position: absolute;width: 100%;  ">No result found</h6>';
            }
         
       echo' </div>
        </div>';
?>


</div>
</div>

<?php 
$url="";
if($byText){
    $url="keyword=".$keyword."&location=".$location."&category_group=".$category."&search_btn=";
}else if($byLoc){
    $url="lat=".$lat."&lng=".$lng;
}else if($byImg){
    $url="label=".$label."&text=".$text;
} 
?>
<div class="pagination-bar" style="width:100%">
<nav>
<ul class="pagination justify-content-center">
<li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>"><a class="page-link" href="?<?php echo $url; ?>&pageno=1">First</a></li>
<li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
    <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo '?'.$url.'&pageno='.($pageno - 1); } ?>">Prev</a>
</li>
<?php
for($i=1;$i<=$total_pages;$i++){
    echo '<li class="page-item"><a class="page-link '; if($pageno==$i){ echo 'active'; } 
    echo '" href="?'.$url.'&pageno='.$i.'">'.$i.'</a></li>';
}
?>
<li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
    <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?".$url."&pageno=".($pageno + 1); } ?>">Next</a>
</li>
<li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>"><a class="page-link" href="?<?php echo $url; ?>&pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>
</nav>
</div>

</div>
</div>
</div>
</div>

<?php
    include 'footer.php';
    mysqli_close($conn);
?>
<a href="#" class="back-to-top">
<i class="lni-chevron-up"></i>
</a>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>

<script>
    var x = document.getElementById("demo");
    function getLocation(){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
            
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
/*         x.innerHTML = "Latitude: " + position.coords.latitude + 
        "<br>Longitude: " + position.coords.longitude; */
        var lat=position.coords.latitude;
        var lng=position.coords.longitude;
        window.location="http://localhost/usmers/ads.php?lat="+lat+"&lng="+lng;
    }
</script>

<script src="js/jquery-min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/wow.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/nivo-lightbox.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/main.js"></script>
<script src="js/form-validator.min.js"></script>
<script src="js/contact-form-script.min.js"></script>
<script src="js/summernote.js"></script>
</body>
</html>