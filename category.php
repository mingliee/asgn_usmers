<?php
require 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Usmers'</title>

<link rel="shortcut icon" href="img/icon.png" >
<link rel="icon" href="img/icon.png" >

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="fonts/line-icons.css">

<link rel="stylesheet" type="text/css" href="css/slicknav.css">

<link rel="stylesheet" type="text/css" href="css/nivo-lightbox.css">

<link rel="stylesheet" type="text/css" href="css/animate.css">

<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">

<link rel="stylesheet" type="text/css" href="css/main.css">

<link rel="stylesheet" type="text/css" href="css/responsive.css">

<link rel="stylesheet" type="text/css" href="css/login.css">
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
include 'searchBar.php';
?>

</div>
</div>
</div>
</div>
</div>

</header>


<div class="main-container section-padding">
<div class="container">
<div class="row">
<div class=" side-category col-lg-3 col-md-12 col-xs-12 page-sidebar">
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
	if (isset($_GET['pageno'])) {
		$pageno = $_GET['pageno'];
	} else {
		$pageno = 1;
	}

	$no_of_records_per_page = 18;
    $offset = ($pageno-1) * $no_of_records_per_page;

	if(isset($_GET['cat'])) {
		$category=$_GET['cat'];

		/* $total_pages_sql ="SELECT COUNT(DISTINCT ADS_ITEM.ADS_ID) FROM `ADS_ITEM` 
			INNER JOIN `IMAGE` ON  (IMAGE.ADS_ID=ADS_ITEM.ADS_ID) 
			INNER JOIN `USER` ON  (USER.USER_ID=ADS_ITEM.USER_ID) 
			INNER JOIN `CATEGORY` ON (ADS_ITEM.ADS_CAT=CATEGORY.CAT_VALUE) 
			WHERE ADS_CAT LIKE '%$category%'
			AND ADS_ITEM.ADS_STATUS='ACTIVE' 
			AND IMAGE.IMAGE_STATUS='ACTIVE'"; */

	$total_pages_sql="SELECT COUNT(DISTINCT ADS_ID) FROM (
		SELECT I.ADS_ID AS ADS_ID
		FROM ADS_ITEM I   
		INNER JOIN IMAGE_ITEM II ON (I.ADS_ID=II.ADS_ID)   
		INNER JOIN USER U ON(U.USER_ID=I.USER_ID)   
		INNER JOIN CATEGORY C ON(C.CAT_VALUE=I.ADS_CAT) 
		INNER JOIN ABBR AB ON(AB.ABBR_VALUE=I.ITEM_CONDITION)  
		WHERE I.ADS_STATUS='ACTIVE'   
		AND II.IMAGE_STATUS='ACTIVE' 
		AND I.PRIVATE_STATUS='ACTIVE'
		AND I.ADS_CAT LIKE '%$category%' 
		GROUP BY (I.ADS_ID)  
		UNION SELECT   
		A.ADS_ID AS ADS_ID  
		FROM ADS_ACCOM A   
		INNER JOIN IMAGE_ACCOM IA ON (A.ADS_ID=IA.ADS_ID)   
		INNER JOIN USER U ON(U.USER_ID=A.USER_ID)   
		INNER JOIN CATEGORY C ON(C.CAT_VALUE=A.ADS_CAT)  
		INNER JOIN ABBR AB ON(AB.ABBR_VALUE=A.ACCM_TENET_PREF)  
		WHERE A.ADS_STATUS='ACTIVE'   
		AND IA.IMAGE_STATUS='ACTIVE' 
		AND A.PRIVATE_STATUS='ACTIVE' 
		AND A.ADS_CAT LIKE '%$category%'  
		GROUP BY (A.ADS_ID)  
		UNION SELECT J.ADS_ID AS ADS_ID 
		FROM ADS_JOB J   
		INNER JOIN IMAGE_JOB IJ ON (J.ADS_ID=IJ.ADS_ID)   
		INNER JOIN USER U ON(U.USER_ID=J.USER_ID)   
		INNER JOIN CATEGORY C ON(C.CAT_VALUE=J.ADS_CAT) 
		INNER JOIN ABBR AB ON(AB.ABBR_VALUE=J.JOB_CONTRACT_TYPE)  
		WHERE J.ADS_STATUS='ACTIVE'   
		AND IJ.IMAGE_STATUS='ACTIVE' 
		AND J.PRIVATE_STATUS='ACTIVE'
		AND J.ADS_CAT LIKE '%$category%'    
		GROUP BY (J.ADS_ID)
	) AS TOTAL_ADS";

//echo 'total_pages_sql: '.$total_pages_sql.'<br/>';

		$result = mysqli_query($conn,$total_pages_sql);
		$total_rows = mysqli_fetch_array($result)[0];
		$total_pages = ceil($total_rows / $no_of_records_per_page);

		/* $q1 ="SELECT * FROM `ADS_ITEM` 
		INNER JOIN `IMAGE` ON  (IMAGE.ADS_ID=ADS_ITEM.ADS_ID) 
		INNER JOIN `USER` ON  (USER.USER_ID=ADS_ITEM.USER_ID) 
		INNER JOIN `CATEGORY` ON (ADS_ITEM.ADS_CAT=CATEGORY.CAT_VALUE) 
		WHERE ADS_CAT LIKE '%$category%'
		AND ADS_ITEM.ADS_STATUS='ACTIVE' 
		AND IMAGE.IMAGE_STATUS='ACTIVE'
		GROUP BY (IMAGE.ADS_ID) 
		ORDER BY `ADS_LATEST_UPDATE_DATE` DESC
        LIMIT $offset, $no_of_records_per_page";
        $r1=mysqli_query($conn,$q1);
        $numAds=mysqli_num_rows($r1); */

		$q1="SELECT DISTINCT  I.ADS_ID,I.ADS_LATEST_UPDATE_DATE,I.ADS_TITLE,I.ADS_PRICE,   
        I.ADS_DESCP,I.ADS_LOC,I.ADS_AREA,I.ADS_CAT,II.IMAGE_NAME,U.USER_NAME,C.CAT_NAME,AB.ABBR_NAME AS SUB_INFO 
        FROM ADS_ITEM I    
        INNER JOIN IMAGE_ITEM II ON (I.ADS_ID=II.ADS_ID)    
        INNER JOIN USER U ON(U.USER_ID=I.USER_ID)    
        INNER JOIN CATEGORY C ON(C.CAT_VALUE=I.ADS_CAT)   
        INNER JOIN ABBR AB ON(AB.ABBR_VALUE=I.ITEM_CONDITION)  
        WHERE I.ADS_STATUS='ACTIVE'    
        AND II.IMAGE_STATUS='ACTIVE'
		AND I.PRIVATE_STATUS='ACTIVE'
		AND I.ADS_CAT LIKE '%$category%'     
        GROUP BY (I.ADS_ID)   
        UNION SELECT DISTINCT    
        A.ADS_ID,A.ADS_LATEST_UPDATE_DATE ,A.ADS_TITLE,A.ADS_PRICE,A.ADS_DESCP,A.ADS_LOC,   
        A.ADS_AREA,A.ADS_CAT,IA.IMAGE_NAME,U.USER_NAME ,C.CAT_NAME,AB.ABBR_NAME AS SUB_INFO 
        FROM ADS_ACCOM A    
        INNER JOIN IMAGE_ACCOM IA ON (A.ADS_ID=IA.ADS_ID)    
        INNER JOIN USER U ON(U.USER_ID=A.USER_ID)    
        INNER JOIN CATEGORY C ON(C.CAT_VALUE=A.ADS_CAT) 
        INNER JOIN ABBR AB ON(AB.ABBR_VALUE=A.ACCM_TENET_PREF)  
        WHERE A.ADS_STATUS='ACTIVE'    
        AND IA.IMAGE_STATUS='ACTIVE' 
		AND A.PRIVATE_STATUS='ACTIVE'  
		AND A.ADS_CAT LIKE '%$category%'  
        GROUP BY (A.ADS_ID)   
        UNION SELECT DISTINCT J.ADS_ID,J.ADS_LATEST_UPDATE_DATE ,J.ADS_TITLE,J.ADS_PRICE,   
        J.ADS_DESCP,J.ADS_LOC,J.ADS_AREA,J.ADS_CAT,IJ.IMAGE_NAME,U.USER_NAME ,C.CAT_NAME,AB.ABBR_NAME AS SUB_INFO 
        FROM ADS_JOB J    
        INNER JOIN IMAGE_JOB IJ ON (J.ADS_ID=IJ.ADS_ID)    
        INNER JOIN USER U ON(U.USER_ID=J.USER_ID)    
        INNER JOIN CATEGORY C ON(C.CAT_VALUE=J.ADS_CAT)  
        INNER JOIN ABBR AB ON(AB.ABBR_VALUE=J.JOB_CONTRACT_TYPE)  
        WHERE J.ADS_STATUS='ACTIVE'    
        AND IJ.IMAGE_STATUS='ACTIVE'   
		AND J.PRIVATE_STATUS='ACTIVE'
		AND J.ADS_CAT LIKE '%$category%'  
        GROUP BY (J.ADS_ID)   
        ORDER BY ADS_LATEST_UPDATE_DATE DESC
        LIMIT $offset, $no_of_records_per_page ";

	} else if (isset($_GET['label'])){
		$label=$_GET['label'];
		$text=$_GET['text'];	
		
	       // $label = mysqli_real_escape_string($conn,$label);
	       // $text = mysqli_real_escape_string($conn,$text);


	       //---------------------------------------------
	       //speacialized each LIKE opearator for each label
		//---------------------------------------------
		$single_label = explode ( ",", $label ); 
		//filter last null after comma
		//take out when ady solve the comma problem (at cisualSearch.php)when pass to GET (here)
		$single_label = array_filter($single_label);
		$x = 0; 
		$construct = " ";
		$hitQuery =" ";
		foreach( $single_label as $search_each ) { 
			$x++;  
			//echo '<br/>x: '.$x.' search_each: '.$search_each;
			if( $x == 1 ) {
				$construct .= "image.IMAGE_LABEL LIKE '%$search_each%' "; 
				$hitQuery .= "(image.IMAGE_LABEL LIKE '%$search_each%') ";
			}
			else {
				$construct .= "OR image.IMAGE_LABEL LIKE '%$search_each%' ";
				$hitQuery .= "+(image.IMAGE_LABEL LIKE '%$search_each%') ";

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
				$constructText .= "image.IMAGE_OCR LIKE '%$search_each%' "; 
				$hitQueryText .= "(image.IMAGE_OCR LIKE '%$search_each%') ";
			}
			else {
				$constructText .= "OR image.IMAGE_OCR LIKE '%$search_each%' ";
				$hitQueryText .= "+(image.IMAGE_OCR LIKE '%$search_each%') ";
			}
		} 
		
		if ($text==null || $text==""){
			$q1="SELECT (";
			$q1.=$hitQuery;
			$q1.=") as LABEL_hits,
				ADS_ITEM.ADS_ID, ADS_ITEM.ADS_TITLE, IMAGE.IMAGE_NAME, ADS_ITEM.ADS_PRICE, ADS_ITEM.ADS_DESCP, ADS_ITEM.ADS_LOC, ADS_ITEM.ADS_CAT, ADS_ITEM.ADS_LATEST_UPDATE_DATE,
				IMAGE.IMAGE_ID,USER.USER_NAME,ADS_ITEM.ADS_CAT,CATEGORY.CAT_NAME,ABBR.ABBR_NAME AS SUB_INFO
				FROM `ADS_ITEM` 
				INNER JOIN `IMAGE` ON  (IMAGE.ADS_ID=ADS_ITEM.ADS_ID) 
				INNER JOIN `user` on (ADS_ITEM.USER_ID=user.USER_ID) 
				INNER JOIN `CATEGORY` ON (ADS_ITEM.ADS_CAT=CATEGORY.CAT_VALUE)
				INNER JOIN `ABBR`  ON (ABBR_VALUE=ADS_ITEM.ITEM_CONDITION)
				WHERE (";
			$q1 .= $construct;
			$q1 .=") AND ADS_ITEM.ADS_STATUS='ACTIVE' 
				AND IMAGE.IMAGE_STATUS='ACTIVE'
				AND IMAGE.PRIVATE_STATUS='ACTIVE'
				GROUP BY (IMAGE.ADS_ID)
				HAVING (LABEL_hits) > 0
				ORDER BY LABEL_hits DESC
				LIMIT $offset, $no_of_records_per_page";

		}else{
			$q1="SELECT (";
			$q1 .=$hitQuery;
			$q1 .= " + ";
			$q1 .=$hitQueryText;
			$q1 .= ") as TOTAL_hits,
				ADS_ITEM.ADS_ID, ADS_ITEM.ADS_TITLE, IMAGE.IMAGE_NAME, ADS_ITEM.ADS_PRICE, ADS_ITEM.ADS_DESCP, ADS_ITEM.ADS_LOC, ADS_ITEM.ADS_CAT, ADS_ITEM.ADS_LATEST_UPDATE_DATE,
				IMAGE.IMAGE_ID,USER.USER_NAME,ADS_ITEM.ADS_CAT,CATEGORY.CAT_NAME,ABBR.ABBR_NAME AS SUB_INFO
				FROM `ADS_ITEM` 
				INNER JOIN `IMAGE` ON  (IMAGE.ADS_ID=ADS_ITEM.ADS_ID) 
				INNER JOIN `user` on (ADS_ITEM.USER_ID=user.USER_ID) 
				INNER JOIN `CATEGORY` ON (ADS_ITEM.ADS_CAT=CATEGORY.CAT_VALUE)
				INNER JOIN `ABBR`  ON (ABBR_VALUE=ADS_ITEM.ITEM_CONDITION)
				WHERE (";
			$q1 .= $construct;
			$q1 .=") AND (";
			$q1 .=$constructText;
			$q1 .= ") AND ADS_ITEM.ADS_STATUS='ACTIVE' 
				AND IMAGE.IMAGE_STATUS='ACTIVE'
				AND IMAGE.PRIVATE_STATUS='ACTIVE'
				GROUP BY (IMAGE.ADS_ID)
				HAVING  (TOTAL_hits) > 0
				ORDER BY (TOTAL_hits) DESC
				LIMIT $offset, $no_of_records_per_page";
		}  

		//echo '<br/>q1: '.$q1;
	}
	
	$r1=mysqli_query($conn,$q1);
	$r2=mysqli_query($conn,$q1);

	$numAds=mysqli_num_rows($r1);

?>

<div class="product-filter">
<div class="short-name">
<span>Showing <?php echo $numAds?> Ads</span>
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
<a class="nav-link " data-toggle="tab" href="#list-view"><i class="lni-list"></i></a>
</li>
</ul>
</div>


<div>
<div class="tab-content">
<div id="grid-view" class="tab-pane fade active show">
<!-- <?php
echo '<p style="text-align:right">total_pages: '.$total_pages.'</p>';
echo '<p style="text-align:right">numAds: '.$total_rows.'</p><br/>';
 ?> -->
<div class="row">

<?php

	if ( mysqli_num_rows($r1)> 0){
		while($row = mysqli_fetch_assoc($r1)){

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
		if($loc=='ou'||$loc=='op'||$loc=='ou'){
			$loc = $row['ADS_AREA'];
		}
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
		</li>';
		echo '<li>
		<i class="lni-alarm-clock"></i> '.$date.'
		</li><li style="float:right;">';
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
		<div class="sellerName" style="text-align:right;color: #999;">';
		echo '<i class="lni-user"  style="margin-right: 5px" ></i> '.$seller.'
		</div>';
		echo '</div>
		</div>
		</div>
		</div>
		</button>
		</form>';

		}
	}else{
		echo '<h6 style="text-align: center;position: absolute;width: 100%;  ">No result found</h6>';
	    }

?>
</div>
</div>

<div id="list-view" class="tab-pane fade ">
<div class="row">

<?php

	if ( mysqli_num_rows($r2)> 0){
		while($row = mysqli_fetch_assoc($r2)){

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
		//$cat = strtok($cat, " ");
		$cat_value=$row['ADS_CAT'];
		$date = date("j M y",strtotime($row['ADS_LATEST_UPDATE_DATE']));
		$seller = $row ['USER_NAME'];

		echo '<form action="ads-details.php" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" method="GET">';            
		echo '<button type="submit" class=" filterDiv" name="adsID" value="';
		echo $ads_id;
		echo '"><div class="feature-container">
		<div class="featured-box">
		<div class="img-1">
		<div class="img-2">
		<img class="img-fluid" src="img/product/'.$image.'" alt="">
		</div>
		</div>';
		echo '<div class="feature-content">
		<div class="product">
		<a href="category.php?cat='.$cat_value.'"><i class="lni-folder"></i> '.$cat.'</a>
		</div><h4>';
		echo $name;
		echo '</h4>
		<span>Last Updated: 4 hours ago</span>
		<ul class="address">
		<li>
		<a href="#"><i class="lni-map-marker"></i>'.$loc;
		echo '</a>
		</li>';

		echo '<li>
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
            <div  class="sellerName"  style="text-align:right;color: #999;">
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

?>

</div>
</div>
</div>
</div>


<div class="pagination-bar" style="width:100%">
<nav>
<ul class="pagination justify-content-center">
<li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>"><a class="page-link" href="?cat=<?php echo $category; ?>&pageno=1">First</a></li>
<li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
    <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo '?cat='.$category.'&pageno='.($pageno - 1); } ?>">Prev</a>
</li>
<?php
for($i=1;$i<=$total_pages;$i++){
    echo '<li class="page-item"><a class="page-link '; if($pageno==$i){ echo 'active'; } 
    echo '" href="?cat='.$category.'&pageno='.$i.'">'.$i.'</a></li>';
}
?>
<li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
    <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo '?cat='.$category.'&pageno='.($pageno + 1); } ?>">Next</a>
</li>
<li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>"><a class="page-link" href="?cat=<?php echo $category; ?>&pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>
</nav>
</div>

</div>
</div>
</div>
</div>

<?php
    include 'footer.php';
   // mysqli_close($conn);
?>
<a href="#" class="back-to-top">
<i class="lni-chevron-up"></i>
</a>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>


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