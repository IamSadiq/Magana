function check_email(){
	var email_status = document.getElementById('email_error');
	var email = document.getElementById('email').value;

	if (email != "") {
		email_status.innerHTML = "Checking...";

		var xmlhttp;
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		}
		else
		{
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.open("POST","ajax_register_check.php",true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		xmlhttp.onreadystatechange = function()
		{
			if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
				email_status.innerHTML = xmlhttp.responseText;
			}
		}
		var user = "email="+email;
		xmlhttp.send(user);
	}

}

function check_pword()
{
	var pword1_status = document.getElementById('pword1Error');
	var pword1 = document.getElementById('pword1').value;

	if (pword1 != "") {
		pword1_status.innerHTML = "Checking...";

		var xmlhttp;
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		}
		else
		{
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.open("POST","ajax_register_check.php",true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		xmlhttp.onreadystatechange = function()
		{
			if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
				pword1_status.innerHTML = xmlhttp.responseText;
			}
		}
		var user = "pword1="+pword1;
		xmlhttp.send(user);
	}
}

function confirm_pword()
{
	var pword2_status = document.getElementById('pword2Error');
	var pword2 = document.getElementById('pword2').value;

	if (pword2 != "") {
		pword2_status.innerHTML = "Checking...";

		var xmlhttp;
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		}
		else
		{
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.open("POST","ajax_register_check.php",true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		xmlhttp.onreadystatechange = function()
		{
			if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
				pword2_status.innerHTML = xmlhttp.responseText;
			}
		}
		var user = "pword2="+pword2;
		xmlhttp.send(user);
	}
}

$(document).ready(function(){

	$('#user_img').hide();
	$('#edit_profile').hide();

	$('.loginDiv').show();
	$('.registerDiv').hide();
	
	//Show Register div
	$('#register').on('click', function(){
		$('.registerDiv').show();
	});

	//Hide Register div
	$('.closeRegister').on('click', function(){
			$('.registerDiv').hide();
	});

});
