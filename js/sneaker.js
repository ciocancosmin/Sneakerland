function delete_sneaker(id){
	$.ajax({
	  url: "api/api.php?q=delete_sneaker&q1="+id,
	  type:"DELETE",
	  data:id,
	  success: function(data){
			window.location.href="index.php";
	  }
	});
}
function order_sneaker(id)
{
	$.ajax({
	  url: "api/api.php?q=add_order&q1="+id,
	  type:"POST",
	  data:id,
	  success: function(data){
			window.location.href="index.php";
	  }
	});
}