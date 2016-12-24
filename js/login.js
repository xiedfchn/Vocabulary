$('#submit').click(function(e){
	var username = $('#username').val();
	var password = $('#password').val();
	$.ajax({
		type:"POST",
		url: "checklogin.php",
		data: "myusername="+username+"&mypassword="+password,
		success: function(html){
			 if(html=='true') {
				window.location="index.php";
			  }
			  else {
			  	$("#message").show()
				$("#message").html("Wrong password!");
			  	$("#message").stop(true, true).fadeOut(3000);
			  }
		}
	})
    return false;
})

$('#register').click(function(e){
	var username = $('#username').val();
	var password = $('#password').val();
	$.ajax({
		type:"POST",
		url: "register.php",
		data: "myusername="+username+"&mypassword="+password,
		success: function(html){
			 if(html=='true') {
				window.location="index.php";
			  }
			  else {
			  	$("#message").show();
				$("#message").html("Existing account!");
			  	$("#message").stop(true, true).fadeOut(3000);
			  }
		}
	})
    return false;
})