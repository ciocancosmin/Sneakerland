function update_things()
{
	$.ajax({
	  url: "api/api.php?q=get_user",
	  type:"GET",
	  success: function(data){

	  	//alert(data);
	   	if(data == "admin") document.getElementById("navbar_list").innerHTML += '<li class="nav-item"><a class="nav-link" href="admin.html">Add products</a></li>';
		if(data != "0") document.getElementById("navbar_list").innerHTML += '<li class="nav-item"><a class="nav-link" onclick="logout();">Log Out</a></li>';
		else document.getElementById("navbar_list").innerHTML += '<li class="nav-item"><a class="nav-link" href="login.html">Log In</a></li>';   	
	  }
	});
}
function logout()
{
	$.ajax({
	  url: "api/api.php?q=logout",
	  type:"GET",
	  success: function(data){
			window.location.href = "index.html";   	
	  }
	});
}

$( document ).ready(function() {
    update_things();
});