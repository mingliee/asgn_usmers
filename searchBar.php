
<div class="search-bar">
<div class="search-inner">

<form class="search-form" name="search" action="ads.php" method="GET" style="margin:0" >
    <div class="form-group inputwithicon">
    <i class="lni-tag"></i>
    <input type="text" name="keyword" class="form-control" value="" placeholder="Enter Product Keyword">
    </div>
    <div class="form-group inputwithicon">
    <i class="lni-map-marker"></i>
        <div class="select">
            <select name="location" id="location" class="location" style="padding-left: 12px">
                <option value="" selected>Select Location</option>
                <?php 
                    require 'config.php';
                    $q1 = "SELECT * FROM LOCATION ORDER BY LOC_ID ASC";
                    $r1 = mysqli_query($conn,$q1);
                    
                    while($loc= mysqli_fetch_array($r1)){
                        if($loc['LOC_VALUE'] == 'none'){
                            echo '<option title="item" value="'.$loc['LOC_VALUE'].'"';
                            echo ' style="background-color:#dcdcc3;font-weight:bold;color:#000000;" disabled>
                            '.$loc['LOC_NAME'].'</option>';

                        }else{
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
                    require 'config.php';
                    $q1 = "SELECT * FROM CATEGORY ORDER BY CAT_ID ASC";
                    $r1 = mysqli_query($conn,$q1);

                    while($row= mysqli_fetch_array($r1)){
                        if($row['CAT_VALUE'] == 'none'){
                            echo '<option title="item" value="'.$row['CAT_VALUE'].'"';
                            echo ' style="background-color:#dcdcc3;font-weight:bold;color:#000000;" disabled>
                            '.$row['CAT_NAME'].'</option>';

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
        var lat=position.coords.latitude;
        var lng=position.coords.longitude;
        window.location="http://localhost/usmers/ads.php?lat="+lat+"&lng="+lng;
    }
</script>