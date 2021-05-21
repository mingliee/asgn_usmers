var valid= true;
function filter_category(){
    var category_group = $("#category_group").val();

    $("#category_group_div").removeClass("error-field");
    $("#condition_div").removeClass("error-field");
    $("#tenet_div").removeClass("error-field");
    $("#contract_type_div").removeClass("error-field");
    $("#salary_type_div").removeClass("error-field");
    $("#title").removeClass("error-field");
	$("#price").removeClass("error-field");
	$("#description").removeClass("error-field");
	$("#location_div").removeClass("error-field");
	$("#other_loc").removeClass("error-field");
    $("#deal_method_div").removeClass("error-field");

    $("#ads_title-info").html("").hide();
	$("#ads_cat-info").html("").hide();
    $("#ads_price-info").html("").hide();
    $("#ads_descp-info").html("").hide();
    $("#ads_loc-info").html("").hide();
    $("#ads_area-info").html("").hide();
    $("#tenet-info").html("").hide();
    $("#deal_method-info").html("").hide();

    if(category_group.indexOf('item') > -1){
        document.getElementById('condition_div').style.display = "block";
        document.getElementById('tenet_div').style.display = "none";
        document.getElementById('contract_salary_div').style.display = "none";
        document.getElementById("price_label").innerHTML = "Item Price (RM)";
        document.getElementById('deal_method_div').style.display = "block";

    }else if(category_group.indexOf('accommodation') > -1){
        document.getElementById('condition_div').style.display = "none";
        document.getElementById('tenet_div').style.display = "block";
        document.getElementById('contract_salary_div').style.display = "none";
        document.getElementById("price_label").innerHTML = "Monthly Rental (RM)";
        document.getElementById('deal_method_div').style.display = "none";

    }else if(category_group.indexOf('job') > -1){
        document.getElementById('condition_div').style.display = "none";
        document.getElementById('tenet_div').style.display = "none";
        document.getElementById('contract_salary_div').style.display = "flex";
        document.getElementById("price_label").innerHTML = "Salary (RM)";
        document.getElementById('deal_method_div').style.display = "none";

    }

}
$(function(){
    setInterval(validationFunc, 1000);
});
    
function validationFunc() {
// stuff you want to do every second
category_group.addEventListener("blur", valCategory);
title.addEventListener("blur", valTitle);
price.addEventListener("blur", valPrice);
description.addEventListener("blur", valDescp);
loc.addEventListener("blur", valLoc);

var location = $("#loc").val();
if(location.trim()=="ou"||location.trim()=="op"||location.trim()=="o"){
    other_loc.addEventListener("blur", valArea);
}else{
    //valid = true;
}

var category = $("#category_group").val();
if(category.trim()=="job"){
    contract_type.addEventListener("blur", valContract);
    salary_type.addEventListener("blur", valSalary);
}


//TODO - onblur, after checked, remove error required
//deal_method.addEventListener("blur", valDealMethod);
}

function valCategory() {
    var category = $("#category_group").val();
    if(category.trim()=="none"){
        $("#ads_cat-info").html("Required").css("color", "#ee0000").show();
		$("#category_group_div").addClass("error-field");
		valid = false;
    }else{
        $("#ads_cat-info").html("").hide();
        $("#category_group_div").removeClass("error-field");
    }

}

function valTitle() {
    var title = $("#title").val();
    if(title.trim()==""){
        $("#ads_title-info").html("Required").css("color", "#ee0000").show();
		$("#title").addClass("error-field");
		valid = false;
        return valid;
    }else{
        $("#ads_title-info").html("").hide();
        $("#title").removeClass("error-field");

    }
    console.log("title, "+"valid: "+valid);
}

function valPrice() {
    var price = $("#price").val();
    var regex = /^[0-9]\d*(((,\d{3}){1})?(\.\d{0,2})?)$/;

    if(!regex.test(price)){
        $("#ads_price-info").html("Only numbering are allow").css("color", "#ee0000").show();
		$("#price").addClass("error-field");
		valid = false;
    }else if(price.trim()==""){
        $("#ads_price-info").html("Required").css("color", "#ee0000").show();
		$("#price").addClass("error-field");
		valid = false;
        console.log("price 1 , "+"valid: "+valid);
        return valid;
    }else{
        $("#ads_price-info").html("").hide();
        $("#price").removeClass("error-field");
        console.log("price 2 , "+"valid: "+valid);
    }
    console.log("price, "+"valid: "+valid);
}

function valDescp() {
    var description = $("#description").val();
    if(description.trim()==""){
        $("#ads_descp-info").html("Required").css("color", "#ee0000").show();
		$("#description").addClass("error-field");
		valid = false;
        console.log("description, "+"valid: "+valid);
        return valid;
    }else{
        $("#ads_descp-info").html("").hide();
        $("#description").removeClass("error-field");
        console.log("description, "+"valid: "+valid);
    }
    console.log("description, "+"valid: "+valid);
}

function valLoc() {
    var location = $("#loc").val();
    if(location.trim()=="none"){
        $("#ads_loc-info").html("Required").css("color", "#ee0000").show();
		$("#location_div").addClass("error-field");
		valid = false;
        return valid;
    }else{
        $("#ads_loc-info").html("").hide();
        $("#location_div").removeClass("error-field");
    }
    console.log("location, "+"valid: "+valid);
}

function valArea() {
    var other_loc = $("#other_loc").val();
    if(other_loc.trim()==""){
        $("#ads_area-info").html("Required").css("color", "#ee0000").show();
		$("#other_loc").addClass("error-field");
		valid = false;
        return valid;
    }else{
        $("#ads_area-info").html("").hide();
        $("#other_loc").removeClass("error-field");
    }
    console.log("other_loc, "+"valid: "+valid);
}

function valContract() {
    var contract_type = $("#contract_type").val();
    if(contract_type.trim()=="none"){
        $("#contract_type-info").html("Required").css("color", "#ee0000").show();
		$("#contract_type_div").addClass("error-field");
		valid = false;
        return valid;
    }else{
        $("#contract_type-info").html("").hide();
        $("#contract_type_div").removeClass("error-field");
    }
    console.log("contract_type, "+"valid: "+valid);
}

function valSalary() {
    var salary_type = $("#salary_type").val();
    if(salary_type.trim()=="none"){
        $("#salary_type-info").html("Required").css("color", "#ee0000").show();
		$("#salary_type_div").addClass("error-field");
		valid = false;
        return valid;
    }else{
        $("#salary_type-info").html("").hide();
        $("#salary_type_div").removeClass("error-field");
    }
    console.log("salary_type, "+"valid: "+valid);
}

function valDealMethod() {
    var checkbox = document.getElementsByName("deal_method[]"),
    i,
    checked;
    for (i = 0; i < checkbox.length; i += 1) {
        checked = (checkbox[i].checked||checked===true)?true:false;
    }    
    if(checked==false){
        $("#deal_method-info").html("Required").css("color", "#ee0000").show();
        valid = false;
        return valid;
       
    } else{
        $("#deal_method-info").html("").hide();
    }
    console.log("deal_method, "+"valid: "+valid);
}

function valTenetPref() {
    var checkbox = document.getElementsByName("tenet[]"),
    i,
    checked;
    for (i = 0; i < checkbox.length; i += 1) {
        checked = (checkbox[i].checked||checked===true)?true:false;
    }    
    console.log("1tenet, "+"valid: "+valid);
    if(checked==false){
        $("#tenet-info").html("Required").css("color", "#ee0000").show();
        valid = false;
        console.log("2tenet, "+"valid: "+valid);

        return valid;
    } else{
        $("#tenet-info").html("").hide();
        console.log("3tenet, "+"valid: "+valid);

    }
    console.log("tenet, "+"valid: "+valid);
}

/* category_group  -   category_group_div  -   ads_cat-info
condition  -        condition_div  -        item_condition-info
tenet[]  -          tenet_div  -            tenet-info
contract_type   -   contract_type_div  --   contract_type-info
salary_type  -      salary_type_div  -      salary_type-info
title  -            title  -                ads_title-info
price  -            price  -                ads_price-info
description   -     description  -          ads_descp-info
location  -         location_div  -         ads_loc-info
other_loc  -        other_loc_div  -            ads_area-info
deal_method[]  -    deal_method_div  -      deal_method-info
uploadImage[] */

function postAdsVal() {

    console.log('RUN postAdsVal()');
	valid = true;
    var category_group = $("#category_group").val();

    valCategory();

    if(category_group.includes("item")){

        valTitle();
        valPrice();
        valDescp();
        valLoc();
        valDealMethod();

        var location = $("#loc").val();
        if(location.trim()=="ou"||location.trim()=="op"||location.trim()=="o"){
            valArea();
        }
        //alert("item-"+"valid: "+valid);

    } else if(category_group.includes("accommodation")){
        
        valTitle();
        valPrice();
        valDescp();
        valLoc();
        valTenetPref();
        var location = $("#loc").val();
        if(location.trim()=="ou"||location.trim()=="op"||location.trim()=="o"){
            valArea();
        }
        //alert("accommodation-"+"valid: "+valid);

    } else if(category_group.includes("job")){

        valTitle();
        valPrice();
        valDescp();
        valLoc();
        valContract();
        valSalary();

        var location = $("#loc").val();
        if(location.trim()=="ou"||location.trim()=="op"||location.trim()=="o"){
            valArea();
        }
        //alert("job-"+"valid: "+valid);
    }
    

    if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
    //valid = false;
    console.log('END postAdsVal()');
    console.log('valid: '+valid);
	return valid;
	
}

function updateAdsVal() {

    console.log('RUN updateAdsVal()');
	valid = true;
    var category_group = $("#category_group").val();

    if(category_group.includes("item")){

        valTitle();
        valPrice();
        valDescp();
        valLoc();
        valDealMethod();

        var location = $("#loc").val();
        if(location.trim()=="ou"||location.trim()=="op"||location.trim()=="o"){
            valArea();
        }
        //alert("item-"+"valid: "+valid);

    } else if(category_group.includes("accommodation")){
        
        valTitle();
        valPrice();
        valDescp();
        valLoc();
        valTenetPref();
        var location = $("#loc").val();
        if(location.trim()=="ou"||location.trim()=="op"||location.trim()=="o"){
            valArea();
        }
        //alert("accommodation-"+"valid: "+valid);

    } else if(category_group.includes("job")){

        valTitle();
        valPrice();
        valDescp();
        valLoc();
        valContract();
        valSalary();

        var location = $("#loc").val();
        if(location.trim()=="ou"||location.trim()=="op"||location.trim()=="o"){
            valArea();
        }
        //alert("job-"+"valid: "+valid);
    }
    

    if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
    //valid = false;
    console.log('END postAdsVal()');
    console.log('valid: '+valid);
	return valid;
	
}

function showDiv(select){
    if(select.value=='ou'||select.value=='op'||select.value=='o'){
        document.getElementById('other_loc_div').style.display = "block";
    } else{
        document.getElementById('other_loc_div').style.display = "none";
    }
}