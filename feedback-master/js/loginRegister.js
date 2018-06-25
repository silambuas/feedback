// JavaScript Document

var login_reg_num = document.getElementById('login_reg_num');
var login_password = document.getElementById('login_password');

var reg_name = document.getElementById('reg_name');
var reg_email = document.getElementById('reg_email');
var reg_reg_num = document.getElementById('reg_reg_num');
var reg_year = document.getElementById('reg_year');
var reg_sec = document.getElementById('reg_sec');
var reg_password = document.getElementById('reg_password');
var reg_repassword = document.getElementById('reg_repassword');

function doLogin(){
	$.ajax({
		url: 'php/login.php',
		data: "reg_num="+login_reg_num+"&password="+login_password,
		type:"POST",
		success: function(data){
			if (data == "SUCCESS"){
				location.href="home.php";
			}else{
				alert(data);
			}
		}
	});
}

function doRegister(){
	$.ajax({
		url: 'php/register.php',
		data: "reg_name="+reg_name+"&reg_email="+reg_email+"&reg_reg_num="+reg_reg_num+"&reg_year="+reg_year+"&reg_sec="+reg_sec+"&reg_password="+reg_password,
		type:"POST",
		beforeSend: function () {
			if (reg_password.val() != reg_repassword.val()) {
				alert("Password does not match.");
			}
		},
		success: function(data){
			if (data == "SUCCESS"){
				location.href="home.php";
			}else{
				alert(data);
			}
		}
	});
}