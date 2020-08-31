function check_login()
{
	username = $("#inputUsername").val();
	password = $("#inputPassword").val();
	
	dataa = username+"//"+password

	$.ajax({
	  url: "api/api.php?q=login&q1="+username+"&q2="+password,
	  type:"POST",
	  data:dataa,
	  success: function(data){
	   	
	   	//$("#inputUsername").val('');
	 	//$("#inputPassword").val('');
	 	if(data != "1") $("#login_error").text(data);
	 	else window.location.href = "index.html";
	  }
	});

}