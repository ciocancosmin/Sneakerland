function load_brands(){
	$.ajax({
	  url: "api/api.php?q=get_brands",
	  type:"GET",
	  success: function(data){
			pl = data.split("//");
			for (var i = 0; i < pl.length; i++) {
			   		document.getElementById("brand_list").innerHTML += '<a href="sneaker_brand.php?b='+pl[i]+'" class="list-group-item">'+pl[i]+'</a>';
			   	}   	
	  }
	});	
}
function small_load_sneakers()
{
	$.ajax({
	  url: "api/api.php?q=small_load_sneakers",
	  type:"GET",
	  success: function(data){
			pl = data.split("//");
			for (var i = 0; i < pl.length; i++) {
			   		pl2 = pl[i].split("/*/");
			   		snk_name = pl2[0];
			   		snk_price = pl2[1];
			   		snk_description = pl2[2];
			   		snk_image = pl2[3];
			   		snk_id = pl2[4];
			   		document.getElementById("small_list_snk").innerHTML += '<div class="col-lg-4 col-md-6 mb-4"><div class="card h-100"><a href="#"><img class="card-img-top" src="img/'+snk_image+'" alt=""></a><div class="card-body"><h4 class="card-title"><a href="sneaker.php?s='+snk_id+'">'+snk_name+'</a></h4><h5>$'+snk_price+'</h5><p class="card-text">'+snk_description+'</p></div><div class="card-footer"><small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9733;</small></div></div></div>';
			   	} 	
	  }
	});	
}
load_brands();
small_load_sneakers();