<form class="login-form" name="signup" action="signupSubmit.php" method="POST"  onsubmit="return signupValidation()" >
    <div class="form-group mb-3">
        <div class="input-icon">
        <i class="lni-user"></i>
        <input type="text" id="username" class="input_cred" name="username" placeholder="Username" >
        </div>
        <span class="required error" id="username-info"></span>
    </div>
    <div class="form-group mb-3">
        <div class="input-icon">
        <i class="lni-comments"></i>
        <input type="text" id="user_email" class="input_cred" name="user_email" placeholder="*@usm.my or *@student.usm.my" onchange="valEmail()">
        </div>
        <span class="required error" id="user_email-info"></span>
    </div>

    <div class="form-group mb-3">
        <div class="input-icon">
        <i class="lni-phone"></i>
        <input type="text" id="phone" class="input_cred" name="phone" placeholder="Whats App Phone Number  (Eg: 0123456789)">
        </div>
        <span class="required error" id="phone-info"></span>
    </div>
    <div class="form-group mb-3 tg-inputwithicon">
        <div class="tg-select form-control" id="school_div">
        <select class="form-ad valid" name="school" id="school" class="school" sel_id aria-required="true" aria-invalid="false" style="padding-left: 12px">
                <option value="none" selected>Select USM School or Position</option>
                 <?php 
                    $q3 = "SELECT * FROM SCHOOL ORDER BY SCHOOL_ID ASC";
                    $r3 = mysqli_query($conn,$q3);
                    
                    while($sch= mysqli_fetch_array($r3)){
                        if($sch['SCHOOL_VALUE'] == 'none'){
                            echo '<option title="item" value="'.$sch['SCHOOL_VALUE'].'"';
                            echo ' style="background-color:#dcdcc3;font-weight:bold;color:#000000;" disabled>
                            '.$sch['SCHOOL_NAME'].'</option>';

                        }else{
                            echo '<option value="'.$sch['SCHOOL_VALUE'].'">';
                            echo $sch['SCHOOL_NAME'].'</option>';
                        }
                    }
                      ?>
            
            </select> 
        </div>
        <span class="required error" id="school-info"></span>
        </div>

    <div class="form-group mb-3 tg-inputwithicon">
        <div class="tg-select form-control" id="location_div">
        <select class="form-ad valid" name="loc" id="loc" class="loc" sel_id aria-required="true" aria-invalid="false" style="padding-left: 12px" onchange="showDiv(this)">
                <option value="none" selected>Select USM Hostel</option>
               
                 <?php 
                    $q2 = "SELECT * FROM LOCATION ORDER BY LOC_ID ASC";
                    $r2 = mysqli_query($conn,$q2);

                    while($loc= mysqli_fetch_array($r2)){
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
        </div>
        <span class="required error" id="loc-info"></span>
        </div>

        <div class="form-group mb-3 tg-inputwithicon item-area" id="other_loc_div" style="display:none">
            <input class="form-control input-md" name="other_loc" id="other_loc" placeholder="Other Address" type="text">
            <span class="required error" id="area-info"></span>
        </div>

    <div class="form-group mb-3">
        <div class="input-icon">
        <i class="lni-lock"></i>
        <input type="password" class="input_cred" id="user_pswd" name="user_pswd" placeholder="Password">
        </div>
        <span class="required error" id="signup_pswd-info"></span>
    </div>
    <div class="form-group mb-3">
        <div class="input-icon">
        <i class="lni-lock"></i>
        <input type="password" class="input_cred" id="retype_pswd" name="retype_pswd" placeholder="Retype Password">
        </div>
        <span class="required error" id="retype_pswd-info"></span>
    </div>
    <div class="form-group mb-3 mb-3">
        <div class="checkbox">
        <input type="checkbox" id="accept" name="accept" value="accept">
        <label>By registering, you accept our <a href="">Terms of Use & Posting Rules</a></label>
        </div>
    </div>
    <div class="error-msg" id="error-msg"></div>
    <?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"error=emailExist")==true){
        echo "<div class='error-msg' id='error-msg'>Email Address exist!<br>Please proceed to Login / Forget Password</div>";
    } else if(strpos($fullUrl,"error=usernameExist")==true){
        echo "<div class='error-msg' id='error-msg'>Username exist!!</div>";
    } else if(strpos($fullUrl,"error=pendingVerification")==true){
        echo "<div class='error-msg' id='error-msg'>Verification email has been sent. Please proceed to verify account.</div>";
    }  
    ?>
    <div class="text-center">
        <!--<input class="btn btn-common log-btn" type="submit" name="signup_btn" id="signup_btn" value="Register" >
    -->
    <button type="submit" class="btn btn-common log-btn" name="signup_btn" id="signup_btn" >Register</button>

    </div>
</form>