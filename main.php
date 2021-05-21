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

<link rel="stylesheet" type="text/css" href="fonts/line-icons.css">

<link rel="stylesheet" type="text/css" href="css/slicknav.css">

<link rel="stylesheet" type="text/css" href="css/nivo-lightbox.css">

<link rel="stylesheet" type="text/css" href="css/animate.css">

<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">

<link rel="stylesheet" type="text/css" href="css/main.css">

<link rel="stylesheet" type="text/css" href="css/responsive.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<div class="col-md-12 col-lg-12 col-xs-12 text-center">
<div class="contents" style="padding-bottom: 60px;">
<h1 class="head-title">Welcome to <span class="year">Usmers'</span></h1>
<p>Buy And Sell Everything From Textbooks To Mobile Phones And Computers, <br> Or Search For Room, Jobs And More</p>

<?php
include 'searchBar.php';
?>

</div>
</div>
</div>
</div>
 </div>

</header>

<?php
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;

?>
<section class="categories-icon section-padding bg-drack">
<div class="container">
<div class="row">

<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
<div class="icon-box">
<form action="category.php" class="" method="GET">
<button type="submit" class="btn-cat" name="cat" value="accommodation">
<div class="icon">
<i class="lni-home"></i>
</div>
<h4>Accommodation & Rental</h4>
</button>
</form>
</div>
</div>

<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
<div class="icon-box">
<form action="category.php" class="" method="GET">
<button type="submit" class="btn-cat" name="cat" value="job">
<div class="icon">
<i class="lni-briefcase"></i>
</div>
<h4>Job & Services</h4>
</button>
</form>
</div>
</div>

<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
<div class="icon-box">
<form action="category.php" class="" method="GET">          
<button type="submit" class="btn-cat" name="cat" value="automotive">
<div class="icon">
<i class="lni-car"></i>
</div>
<h4>Automotive</h4>
</button>
</form>
</div>
</div>

<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
<div class="icon-box">
<form action="category.php" class="" method="GET">          
<button type="submit" class="btn-cat" name="cat" value="computer">
<div class="icon">
<i class="lni-display"></i>
</div>
<h4>Computer & Cameras</h4>
</button>
</form>
</div>
</div>

<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
<div class="icon-box">
<form action="category.php" class="" method="GET">          
<button type="submit" class="btn-cat" name="cat" value="mobile">
<div class="icon">
<i class="lni-mobile"></i>
</div>
<h4>Mobile & Gadgets</h4>
</button>
</form>
</div>
</div>

<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
<div class="icon-box">
<form action="category.php" class="" method="GET">          
<button type="submit" class="btn-cat" name="cat" value="home">
<div class="icon">
<i class="lni-bulb"></i>
</div>
<h4>Home Appliances & Furnitures</h4>
</button>
</form>
</div>
</div>

<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
<div class="icon-box">
<form action="category.php" class="" method="GET">          
<button type="submit" class="btn-cat" name="cat" value="clothing">
<div class="icon">
<i class="lni-tshirt"></i>
</div>
<h4>Clothing & Accessories</h4>
</button>
</form>
</div>
</div>

<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
<div class="icon-box">
<form action="category.php" class="" method="GET">
<button type="submit" class="btn-cat" name="cat" value="sport">
<div class="icon">
<i class="lni-basketball"></i>
</div>
<h4>Sport & Hobbies</h4>
</button>
</form>
</div>
</div>

<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
<div class="icon-box">
<form action="category.php" class="" method="GET">
<button type="submit" class="btn-cat" name="cat" value="personal">
<div class="icon">
<i class="lni-hand"></i>
</div>
<h4>Personal Accessories</h4>
</button>
</form>
</div>
</div>

<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
<div class="icon-box">
<form action="category.php" class="" method="GET">
<button type="submit" class="btn-cat" name="cat" value="book">
<div class="icon">
<i class="lni-book"></i>
</div>
<h4>Books & Stationary</h4>
</button>
</form>
</div>
</div>

<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
<div class="icon-box">
<form action="category.php" class="" method="GET">
<button type="submit" class="btn-cat" name="cat" value="health">
<div class="icon">
<i class="lni-grow"></i>
</div>
<h4>Health & Beauty</h4>
</button>
</form>
</div>
</div>

<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
<div class="icon-box">
<form action="category.php" class="" method="GET">
<button type="submit" class="btn-cat" name="cat" value="others">
<div class="icon">
<i class="lni-more-alt"></i>
</div>
<h4>Others</h4>
</button>
</form>
</div>
</div>

</div>
</div>
</section>

<?php 
    } 
?>

<section class="featured section-padding">
<div class="container page-content">
<h1 class="section-title" id="section-title">All Listing</h1>

<?php

    
    $no_of_records_per_page = 20;
    $offset = ($pageno-1) * $no_of_records_per_page;

        /* $total_pages_sql = "SELECT COUNT(DISTINCT ADS_ITEM.ADS_ID) FROM `ADS_ITEM`,`ADS_ACCOM`,`ADS_JOB`
        INNER JOIN `IMAGE` ON (IMAGE.ADS_ID=ADS_ITEM.ADS_ID) 
        INNER JOIN `user` ON (USER.USER_ID=ADS_ITEM.USER_ID) 
        INNER JOIN `CATEGORY` ON (ADS_ITEM.ADS_CAT=CATEGORY.CAT_VALUE) 
        WHERE ADS_ITEM.ADS_STATUS='ACTIVE' 
        AND IMAGE.IMAGE_STATUS='ACTIVE'
        "; */
        $total_pages_sql="SELECT COUNT(DISTINCT ADS_ID) FROM (
                            SELECT I.ADS_ID AS ADS_ID
                            FROM ADS_ITEM I   
                            INNER JOIN IMAGE_ITEM II ON (I.ADS_ID=II.ADS_ID)   
                            INNER JOIN USER U ON(U.USER_ID=I.USER_ID)   
                            INNER JOIN CATEGORY C ON(C.CAT_VALUE=I.ADS_CAT) 
                            INNER JOIN ABBR AB ON(AB.ABBR_VALUE=I.ITEM_CONDITION)  
                            WHERE I.ADS_STATUS='ACTIVE'   
                            AND II.IMAGE_STATUS='ACTIVE' 
                            AND  I.PRIVATE_STATUS='ACTIVE'   
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
                            AND  A.PRIVATE_STATUS='ACTIVE'   
                            GROUP BY (A.ADS_ID)  
                            UNION SELECT J.ADS_ID AS ADS_ID 
                            FROM ADS_JOB J   
                            INNER JOIN IMAGE_JOB IJ ON (J.ADS_ID=IJ.ADS_ID)   
                            INNER JOIN USER U ON(U.USER_ID=J.USER_ID)   
                            INNER JOIN CATEGORY C ON(C.CAT_VALUE=J.ADS_CAT) 
                            INNER JOIN ABBR AB ON(AB.ABBR_VALUE=J.JOB_CONTRACT_TYPE)  
                            WHERE J.ADS_STATUS='ACTIVE'   
                            AND IJ.IMAGE_STATUS='ACTIVE'   
                            AND  J.PRIVATE_STATUS='ACTIVE' 
                            GROUP BY (J.ADS_ID)
                        ) AS TOTAL_ADS";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


        /* $q1 ="SELECT * FROM `ADS_ITEM` 
        INNER JOIN `IMAGE` ON (IMAGE.ADS_ID=ADS_ITEM.ADS_ID) 
        INNER JOIN `user` ON (USER.USER_ID=ADS_ITEM.USER_ID) 
        INNER JOIN `CATEGORY` ON (ADS_ITEM.ADS_CAT=CATEGORY.CAT_VALUE) 
        WHERE ADS_ITEM.ADS_STATUS='ACTIVE' 
        AND IMAGE.IMAGE_STATUS='ACTIVE' 
        GROUP BY (IMAGE.ADS_ID) 
        ORDER BY `ADS_LATEST_UPDATE_DATE` DESC
        LIMIT $offset, $no_of_records_per_page"; */

        $q1="SELECT DISTINCT  I.ADS_ID,I.ADS_LATEST_UPDATE_DATE,I.ADS_TITLE,I.ADS_PRICE,   
        I.ADS_DESCP,I.ADS_LOC,I.ADS_AREA,I.ADS_CAT,II.IMAGE_NAME,U.USER_NAME,C.CAT_NAME,AB.ABBR_NAME AS SUB_INFO 
        FROM ADS_ITEM I    
        INNER JOIN IMAGE_ITEM II ON (I.ADS_ID=II.ADS_ID)    
        INNER JOIN USER U ON(U.USER_ID=I.USER_ID)    
        INNER JOIN CATEGORY C ON(C.CAT_VALUE=I.ADS_CAT)   
        INNER JOIN ABBR AB ON(AB.ABBR_VALUE=I.ITEM_CONDITION)  
        WHERE I.ADS_STATUS='ACTIVE'    
        AND II.IMAGE_STATUS='ACTIVE'  
        AND  I.PRIVATE_STATUS='ACTIVE'  
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
        AND  A.PRIVATE_STATUS='ACTIVE'   
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
        AND  J.PRIVATE_STATUS='ACTIVE'    
        GROUP BY (J.ADS_ID)   
        ORDER BY ADS_LATEST_UPDATE_DATE DESC
        LIMIT $offset, $no_of_records_per_page ";

        $r1=mysqli_query($conn,$q1);
        $numAds=mysqli_num_rows($r1);

         echo '<p style="text-align:right">total_pages: '.$total_pages.'</p>';
        echo '<p style="text-align:right">numAds: '.$total_rows.'</p> '; 
        echo ' <p style="text-align:right">(Sort by recently updated)</p>
        <div class="row">';

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
            $descp = str_replace( '"',"'", $descp);
            $loc = $row['ADS_LOC'];
            if($loc=='ou'||$loc=='op'||$loc=='ou'){
                $loc = $row['ADS_AREA'];
            }
            $cat = $row['CAT_NAME'];
            // $cat = strtok($cat, " ");
            $cat_value=$row['ADS_CAT'];
            $date = date("j M y",strtotime($row['ADS_LATEST_UPDATE_DATE']));
            $seller = $row ['USER_NAME'];
            $sub=$row['SUB_INFO'];
          //  $test = $row['IMAGE_OCR'];
           // echo 'test: '.$test;

            echo '<form action="ads-details.php" class="col-xs-6 col-lg-3" method="GET" style="padding:0">';            
            echo '<button type="submit" class=" filterDiv" name="adsID" value="';
            echo $ads_id;
            echo '"><div class="feature-container">
            <div class="featured-box">
            <div class="img-1">
            <div class="img-2">
            <img class="img-fluid" src="img/product/';
            echo $image;
            echo'" alt="">
            </div>
            </div>
            <div class="feature-content">
            <div class="product catName">
            <a href="category.php?cat='.$cat_value.'"><i class="lni-folder"></i>'.$cat.'</a>';

            echo '</div>
            <h4>'.$name.'</h4>';
            // <span>Publish Date:'.$date.'</span>';

            echo '<ul class="address">
            <li>
            <i class="lni-map-marker"></i> '.$loc.'</li>';

            echo '<li>
            <i class="lni-alarm-clock"></i> '.$date.'
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

?>

<div class="pagination-bar" style="width:100%">
<nav>
<ul class="pagination justify-content-center">
<li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>"><a class="page-link" href="?pageno=1">First</a></li>
<li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
    <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
</li>
<?php
for($i=1;$i<=$total_pages;$i++){
    echo '<li class="page-item"><a class="page-link '; if($pageno==$i){ echo 'active'; } 
    echo '" href="?pageno='.$i.'">'.$i.'</a></li>';
}
?>
<li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
    <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
</li>
<li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>
</nav>
</div>

</div>
</div>
</section>

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

<script src="js/jquery-min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/wow.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/nivo-lightbox.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/form-validator.min.js"></script>
<script src="js/contact-form-script.min.js"></script>
<script src="js/summernote.js"></script>
<script src="js/main.js"></script>

</body>
</html>
