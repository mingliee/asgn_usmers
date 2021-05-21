var valid;
$('document').ready(function(){
    var username_state;

    //validate username during signup & update-profile (case sensitive)
    $('#username').on('blur', function(){
        var username = $('#username').val();
        var useremail = $('#user_email').val();
        if (username == '') {
            username_state = false;
            return;
        }
        $.ajax({
        url: 'validate.php',
        type: 'post',
        dataType: "text",
        data: {
            'signup_username_validate' : 1,
            'username' : username,
            'useremail' : useremail,
        },
        success: function(response){
        console.log(response);
        $("#username").removeClass("error-field");
        $("#username-info").html("").hide();
            if ($.trim(response) == 'taken' ) {
                username_state = false;
                $("#username-info").html("Username taken. Enter a new name.").css("color", "#ee0000").show();
                $("#username").addClass("error-field");
                // $("#username").style("display:block");
                // alert('response:'+response);
                return false;
            }else if ($.trim(response) == 'not_taken') {

            }
            
        }
        
        });
    });

    //validate phone number during update-profile
    $('#phone').on('blur', function(){
        valPhone();
    });
    $('#username').on('blur', function(){
        valName();
    });
    $('#user_email').on('blur', function(){
        valEmail();
    });
    $('#school').on('blur', function(){
        valSchool();
    });
    $('#loc').on('blur', function(){
        valLoc();
    });
    $('#loc').on('blur', function(){
        valArea();
    });
    $('#user_pswd').on('blur', function(){
        valPswd();
    });
    $('#retype_pswd').on('blur', function(){
        valRetypePswd();
    });
});

function valPhone(){
    var phone = $('#phone').val();
    console.log('phone no: '+phone);
    console.log('valid0: '+valid);
    if (phone != '')
    {
        var res = phone.substring(0, 3);
        if(res =='011'){
            var val = /^\d{11}$/;
            if(val.test(phone))
            {
                $("#phone").removeClass("error-field");
                $("#phone-info").html("").hide();
                
            }
            else
            {
                $("#phone-info").html("Invalid phone number.").css("color", "#ee0000").show();
                $("#phone").addClass("error-field");
                valid=false;
                console.log('valid1: '+valid);
                return valid;
            }
        } else {
            var val = /^\d{10}$/;
            if(val.test(phone))
            {
                $("#phone").removeClass("error-field");
                $("#phone-info").html("").hide();
            }
            else
            {
                $("#phone-info").html("Invalid phone number.").css("color", "#ee0000").show();
                $("#phone").addClass("error-field");
                valid=false;
                console.log('valid2: '+valid);
                return valid;
            }
        }console.log('valid3: '+valid);
        
    }else{
        $("#phone-info").html("Required").css("color", "#ee0000").show();
        $("#phone").addClass("error-field");
        valid=false;
        console.log('valid3 empty: '+valid);
    } 
    

}

function valEmail(){
	$("#user_email").removeClass("error-field");
	var Email = $("#user_email").val();
    var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    $("#user_email-info").html("").hide();
	
    if (Email == "") {
		$("#user_email-info").html("Required").css("color", "#ee0000").show();
		$("#user_email").addClass("error-field");
		valid = false;
	} else if (Email.indexOf('@student.usm.my')<0 && Email.indexOf('@usm.my')<0){
        $("#user_email-info").html("Sign up with USM email").css("color", "#ee0000").show();
		$("#user_email").addClass("error-field");
        valid = false;
    } else if (Email.trim() == "") {
        $("#user_email-info").html("Invalid email address.").css("color", "#ee0000").show();
		$("#user_email").addClass("error-field");
		valid = false;
	} else if (!emailRegex.test(Email)) {
		$("#user_email-info").html("Invalid email address.").css("color", "#ee0000").show();
		$("#user_email").addClass("error-field");
		valid = false;
	} 
    console.log('user_email: '+valid);
    return valid;

}

function valName(){
    var UserName = $("#username").val();
    console.log('UserName: '+valid);
    if (UserName.trim() == "") {
		$("#username-info").html("Required").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
        console.log('UserName2: '+valid);
        return valid;
	} else {
		$("#username-info").html("").hide();
		$("#username").removeClass("error-field");
	}
    console.log('UserName: '+valid);
}

function valSchool(){
	var school = $("#school").val();
    if(school.trim()=="none"){
        $("#school-info").html("Required").css("color", "#ee0000").show();
		$("#school_div").addClass("error-field");
		valid = false;
        console.log('school: '+valid);
        return valid;
    }else{
        $("#school-info").html("").hide();
        $("#school_div").removeClass("error-field");
    }
    console.log('school: '+valid);

}

function valLoc(){
    var loc = $("#loc").val();
    if(loc.trim()=="none"){
        $("#loc-info").html("Required").css("color", "#ee0000").show();
		$("#location_div").addClass("error-field");
		valid = false;
        return valid;
    }else{
        $("#loc-info").html("").hide();
        $("#location_div").removeClass("error-field");
    }
    console.log('loc: '+valid);
}

function valArea(){
    var other_loc = $("#other_loc").val();
    if(other_loc.trim()==""){
        $("#area-info").html("Required").css("color", "#ee0000").show();
        $("#other_loc").addClass("error-field");
        valid = false;
        return valid;
    }else{
        $("#area-info").html("").hide();
        $("#other_loc").removeClass("error-field");
    }    
    
    console.log('area: '+valid);
}

function valPswd(){
    var Password = $('#user_pswd').val();
    if (Password.trim() == "") {
		$("#signup_pswd-info").html("Required").css("color", "#ee0000").show();
		$("#user_pswd").addClass("error-field");
		valid = false;
        return valid;
	}else{
        $("#signup_pswd-info").html("").hide();
        $("#user_pswd").removeClass("error-field");
    } 
    console.log('Password: '+valid);
}

function valRetypePswd(){
    var ConfirmPassword = $('#retype_pswd').val();
    if (ConfirmPassword.trim() == "") {
		$("#retype_pswd-info").html("Required").css("color", "#ee0000").show();
		$("#retype_pswd").addClass("error-field");
		valid = false;
        return valid;
	}else{
        $("#retype_pswd-info").html("").hide();
        $("#retype_pswd").removeClass("error-field");
    } 
    console.log('ConfirmPassword: '+valid);
}

function signupValidation() {
    var valid = true;
	console.log('START signupValidation()');

    valName();
    valPhone();
    valEmail();
    valSchool();
    valLoc();
    var location = $("#loc").val();
    if(location.trim()=="ou"||location.trim()=="op"||location.trim()=="o"){
        valArea();
    }
    valPswd();
    valRetypePswd();	

    if(document.querySelector('#accept:checked') == null){
        $("#error-msg").html("You must agree to the terms first.").show();
        valid = false;
    }else{
        $("#error-msg").html("").hide();
    }
    var Password = $('#user_pswd').val();
    var ConfirmPassword = $('#retype_pswd').val();

	if(Password != ConfirmPassword){
        $("#error-msg").html("Both passwords must be same.").show();
        valid=false;
    }
    console.log('checked: '+valid);

    if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
    console.log('END signupValidation()');
    console.log('valid: '+valid);
	return valid;
}

function loginValidation() {
	var valid = true;
	$("#user_email").removeClass("error-field");
	$("#user_pswd").removeClass("error-field");

	var Email = $("#user_email").val();
	var Password = $('#user_pswd').val();

	$("#user_email-info").html("").hide();
    $("#user_pswd-info").html("").hide();

	if (Email.trim() == "") {
		$("#user_email-info").html("Required").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
	}
	if (Password.trim() == "") {
		$("#user_pswd-info").html("Required.").css("color", "#ee0000").show();
		$("#user_pswd").addClass("error-field");
		valid = false;
	}
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}

function updateProfileVal() {

    console.log('RUN updateProfileVal()');
	valid = true;

    valName();
    valPhone();
    valSchool();
    valLoc();
    var location = $("#loc").val();
    if(location.trim()=="ou"||location.trim()=="op"||location.trim()=="o"){
        valArea();
    }

	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
    console.log('END updateProfileVal()');
    console.log('valid: '+valid);
	return valid;
}

function realtimeValName(){
    console.log('UserName validate taken ')
    var username = $('#username').val();
        var useremail = $('#user_email').val();
        console.log('username: '+username);
        if (username == '') {
            valid = false;
            return valid;
        }
        $.ajax({
        url: 'validate.php',
        type: 'post',
        dataType: "text",
        data: {
            'signup_username_validate' : 1,
            'username' : username,
            'useremail' : useremail,
        },
        success: function(response){
        console.log(response);
        $("#username").removeClass("error-field");
        $("#username-info").html("").hide();
        console.log('UserName response: '+response);
            if ($.trim(response) == 'taken' ) {
                valid = false;
                $("#username-info").html("Username taken. Enter a new name.").css("color", "#ee0000").show();
                $("#username").addClass("error-field");
                // $("#username").style("display:block");
                // alert('response:'+response);
                console.log('UserName taken1: '+valid);
                return valid;
            }else if ($.trim(response) == 'not_taken') {
                console.log('UserName taken1.5: '+valid);
            }
            
        }
        
        });
        console.log('UserName taken2: '+valid);
}

function signupformValidation(currentIndex) {
    var currentIndex=currentIndex;
    valid = true;
    $("#error-msg").html("").hide();
	console.log('START signupformValidation()');
    console.log('current: '+currentIndex);
    
    if(currentIndex=='0'){
        realtimeValName();
        valName();
        valPhone();
        valEmail();
    } else if(currentIndex=='1'){
        valSchool();
        valLoc();
        var location = $("#loc").val();
        if(location.trim()=="ou"||location.trim()=="op"||location.trim()=="o")
        {
            valArea();
        }
    } else if(currentIndex=='2'){
        valPswd();
        valRetypePswd();
        var Password = $('#user_pswd').val();
        var ConfirmPassword = $('#retype_pswd').val();

        if(Password != ConfirmPassword){
            $("#error-msg").html("Both passwords must be same.").show();
            valid=false;
        }
    } else if(currentIndex=='3'){
        if(document.querySelector('#accept:checked') == null){
            $("#error-msg").html("You must agree to the terms first.").show();
            valid = false;
        }else{
            $("#error-msg").html("").hide();
        }
        console.log('checked: '+valid);
    }
    

    if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
    console.log('END signupformValidation()');
    console.log('valid: '+valid);

    return valid;
}

