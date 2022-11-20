const ptr = document.getElementById("register");

ptr.addEventListener("click",function(event){
	event.preventDefault()
	
	var a = true;

	var log_id = document.getElementById('logid').value;

	var pass1 = document.getElementById('pass').value;

	var pass2 = document.getElementById('re_pass').value;

	var i = 0

	//id length requirement

	if(log_id.length < 6 || log_id.length>20){
		alert("Username must be 6 to 20 characters.");
		var a = false;
		return;
	}

	
	//login has to be digit or alphabet

	for(i = 0; i<log_id.length; i++){
			if((log_id.charCodeAt(i)>47 && log_id.charCodeAt(i)<58) || (log_id.charCodeAt(i)>= 65 && log_id.charCodeAt(i)<= 90) || (log_id.charCodeAt(i)>= 97 && log_id.charCodeAt(i) <= 122)){
				var a = true;
			}else{
				var a = false;
				alert("Username must contain only digit and alphabets.");
				return;
			}
	}


	//password and re=password are equal

	if(pass1.length != pass2.length){
		var a = false;
		alert("Make sure your password and re-entered password match.");
		return;
	}
	for(i= 0; i<pass1.length; i++){
		
		if(pass1.charAt(i) != pass2.charAt(i)){
			var a = false;
			alert("Make sure your password and re-entered password match.");
			return;
		}
	}

	//password length check

	if(pass1.length < 6 || pass1.length>20){
		alert("Password must be 6 to 20 characters");
		var a = false;
		return;
	}

	//password has to be digit or alphabet
 
	for(i = 0; i<pass1.length; i++){
			if((pass1.charCodeAt(i)>47 && pass1.charCodeAt(i)<58) || (pass1.charCodeAt(i)>= 65 && pass1.charCodeAt(i)<= 90) || (pass1.charCodeAt(i)>= 97 && pass1.charCodeAt(i) <= 122)){
				var a = true;
		
			}else{
				var a = false;
				alert("Password must contain only digit and alphabets.");
				return;
			}
	}

	//password must have at least one upper case, lower case, and digit

	up = 0
	low = 0
	digit = 0

	for(i = 0; i<pass1.length; i++){
		if(pass1.charCodeAt(i)>47 && pass1.charCodeAt(i)<58){
			digit += 1;
		} else if(pass1.charCodeAt(i)>= 65 && pass1.charCodeAt(i)<= 90){
			up += 1;
		}else{
			low += 1;
		}
	}
	if((up == 0) || (low == 0) || (digit == 0)){
		var a = false;
		alert("For safety reasons, the password must have : \n At least one lower case letter \n At least one upper case letter \n At least one digit.");
		return;
	}


	if(a){
		alert("Registration Success!");
	}



	
})