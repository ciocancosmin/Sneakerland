function check_register()
{
	username = $("#inputUsername").val();
	password = $("#inputPassword").val();
	email = $("#inputEmail").val();
	address = $("#inputAdress").val();
	card = $("#inputCard").val();

	$.ajax({
	  url: "api/api.php?q=register&q1="+username+"&q2="+password+"&q3="+email+"&q4="+address+"&q5="+card,
	  type:"GET",
	  success: function(data){
	   	
	   	//$("#inputUsername").val('');
	 	//$("#inputPassword").val('');
	 	if(data != "1") $("#login_error").text(data);
	 	else
	 	{
	 		alert("Acount created successfully, proceeding to the login page...");
	 		window.location.href = "login.html";
	 	}
	  }
	});

}