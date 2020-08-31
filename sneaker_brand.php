<!DOCTYPE html>
<html>
<head>
	<title>Sneaker Collection</title>

	<?php include "navbar_essentials.php";include "css_essentials.php"; ?>

	<?php include "core_js.php"; ?>

</head>
<body>

<?php include "navbar.php"; ?>

<?php 

	include "database_module.php";

	$ss = $snk -> findOne([
		'_id' => new MongoDB\BSON\ObjectID( $_GET['s'] )
	]);
	
	$admin = 0;

	$logged_in = 0;

	if($_SESSION['username'] == "admin") $admin = 1;
	if($_SESSION['username'] != "0") $logged_in = 1;

?>

<div class="container">
	
<div class="row" style="margin-top: 100px;">
	

	<?php

	$snk_brand = $_GET['b'];

	$ff = $snk -> find([
		'brand' => $snk_brand
	]);

	foreach ($ff as $key) {
		$snk_name = $key['name'];
		$snk_price = $key['price'];
		$snk_description = $key['description'];
		$snk_image = "img/".$key['image_name'];
		$snk_id = $key['_id'];
		echo '<div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="'.$snk_image.'" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="sneaker.php?s='.$snk_id.'">'.$snk_name.'</a>
                </h4>
                <h5>$'.$snk_price.'</h5>
                <p class="card-text">'.$snk_description.'</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9733;</small>
              </div>
            </div>
    </div>';
	}

	?>


</div>

</div>

</body>
</html>