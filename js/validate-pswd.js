var valid=true;
$('document').ready(function(){

    /* $('#user_pswd').on('blur', function(){
        valCurPswd();
    }); */
    $('#user_pswd').on('keyup', function(){
        valCurPswd();
    });

    /* $('#new_pswd').on('blur', function(){
        valNewPswd();
    }); */
    $('#new_pswd').on('keyup', function(){
        valNewPswd();
    });
    
    /* $('#retype_pswd').on('blur', function(){
        valRetypePswd();
    }); */
    $('#retype_pswd').on('keyup', function(){
        valRetypePswd();
    });

    return valid

});

function valCurPswd(){
    var CurrentPassword = $('#user_pswd').val();
    if (CurrentPassword.trim() == "") {
        $("#pswd-info").html("Required").css("color", "#ee0000").show();
        $("#user_pswd").addClass("error-field");
        valid = false;
        return valid;
    }else{
        $("#pswd-info").html("").hide();
        $("#user_pswd").removeClass("error-field");
    } 
    console.log('Current Password: '+valid);
}

function valNewPswd(){
    var CurrentPassword = $('#user_pswd').val();
    var NewPassword = $('#new_pswd').val();
    if (NewPassword.trim() == "") {
        $("#new_pswd-info").html("Required").css("color", "#ee0000").show();
        $("#new_pswd").addClass("error-field");
        valid = false;
        return valid;
    }else if(NewPassword == CurrentPassword){
        $("#new_pswd-info").html("Cannot enter the same password.").css("color", "#ee0000").show();
        $("#new_pswd").addClass("error-field");
        valid=false;
    }else{
        $("#new_pswd-info").html("").hide();
        $("#new_pswd").removeClass("error-field");
    } 
    console.log('New Password: '+valid);
}

function valRetypePswd(){
    var NewPassword = $('#new_pswd').val();
    var ConfirmPassword = $('#retype_pswd').val();

    if (ConfirmPassword.trim() == "") {
        $("#retype_pswd-info").html("Required").css("color", "#ee0000").show();
        $("#retype_pswd").addClass("error-field");
        valid = false;
        return valid;
    }else if(NewPassword != ConfirmPassword){
        $("#retype_pswd-info").html("Both passwords must be same.").css("color", "#ee0000").show();
        $("#retype_pswd").addClass("error-field");
        valid=false;
    }else{
        $("#retype_pswd-info").html("").hide();
        $("#retype_pswd").removeClass("error-field");
    }
    console.log('ConfirmPassword: '+valid);
}


//chg pswd thru account-profile-setting
function chgPswdVal(){

    console.log('RUN chgPswdVal()');
	valid = true;

    valCurPswd();
    valNewPswd();
    valRetypePswd();

    console.log('END chgPswdVal()');
    console.log('valid: '+valid);
	return valid;
}

//updtae pswd through email validation
function updatePswdVal(){

    console.log('RUN updatePswdVal()');
	valid = true;

    valNewPswd();
    valRetypePswd();

    console.log('END updatePswdVal()');
    console.log('valid: '+valid);
	return valid;
}