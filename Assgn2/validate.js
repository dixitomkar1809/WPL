$(document).ready(function() {
	// your js code goes here...
	
	console.log('this means that the function is running');
	$('<span></span>').insertAfter('input#username');
	$('<span></span>').insertAfter('input#password');
	$('<span></span>').insertAfter('input#email');
	var regx = /^[A-Za-z0-9]+$/;
	var ErrorMessage = "Error";
	var OkMessage = "OK";
	var InfoMessageUsername = "Username has to be Alphanumric Only";
	var InfoMessagePassword = "Password should be atleast 8 characters long";
	var InfoMessageEmail = "Email should be valid email address (abc@def.xyz)";
	$("input#username").next().hide()
	$("input#password").next().hide()
	$("input#email").next().hide()

	// for Username
	$("input#username").focusin(function(){
		// $(this).css("background-color", "red");
		$(this).next().text(InfoMessageUsername);
		$(this).next().show();
		$(this).next().removeClass();
		$(this).next().addClass('info');
    });
    $("input#username").focusout(function(){
		// $(this).css("background-color", "blue");
		$(this).next().hide();
		var username = $(this).val();
		// console.log($("#username").val().match(regx));
		if ($("input#username").val().match(regx)){
			$(this).next().removeClass();
			$(this).next().text(OkMessage);
			$(this).next().addClass('ok');
			$(this).next().show()
		}
		else if (username.length == 0){
			$(this).next().hide();
			$(this).next().removeClass();
		}
		else{
			$(this).next().removeClass();
			$(this).next().addClass('error');
			$(this).next().text(ErrorMessage);
			$(this).next().show();
		}
	});

	// for password
	$("input#password").focusin(function(){
        $(this).next().text(InfoMessagePassword);
		$(this).next().show();
		$(this).next().removeClass();
		$(this).next().addClass('info');
    });
    $("input#password").focusout(function(){
		// $(this).css("background-color", "blue");
		$(this).next().removeClass();
		$(this).next().hide();
		var password = $(this).val();
		if(password.length >= 8){
			$(this).next().text(OkMessage);
			$(this).next().show();
			$(this).next().removeClass();
			$(this).next().addClass('ok');	
		}
		else if (password.length==0){
			$(this).next().removeClass();
			$(this).next().hide();
		}
		else{
			$(this).next().text(ErrorMessage);
			$(this).next().show();
			$(this).next().removeClass();
			$(this).next().addClass('error');
		}
	});

	// for email
	$("input#email").focusin(function(){
        $(this).next().text(InfoMessageEmail);
		$(this).next().show();
		$(this).next().removeClass();
		$(this).next().addClass('info');
    });
    $("input#email").focusout(function(){
		// $(this).css("background-color", "blue");
		var email = $(this).val();
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{3})?$/;
		$(this).next().hide();
		if(emailReg.test(email)  && email.length > 0){
			$(this).next().removeClass();
			$(this).next().text(OkMessage);
			$(this).next().show();
			$(this).next().addClass('ok');
		}
		else if(email.length == 0){
			$(this).next().removeClass();
			$(this).next().hide();
		}
		else{
			$(this).next().text(ErrorMessage);
			$(this).next().addClass('error');
			$(this).next().show();
		}
	});
});
