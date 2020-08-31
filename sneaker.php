<!DOCTYPE html>
<html>
<head>
	<title>View Sneaker</title>

	<?php include "navbar_essentials.php";include "css_essentials.php"; ?>

	<?php include "core_js.php"; ?>

	<script src="js/sneaker.js"></script>

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
	
<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8" style="margin-top: 100px;">
		<div class="card mt-4">
          <img class="card-img-top img-fluid" src="img/<?php echo $ss['image_name']; ?>" alt="">
          <div class="card-body">
            <h3 class="card-title"><?php echo $ss['name']; ?></h3>
            <h4>$<?php echo $ss['price']; ?></h4>
            <p class="card-text"><?php echo $ss['description']; ?></p>
            <span class="text-warning" style="display: block;">&#9733; &#9733; &#9733; &#9733; &#9733;</span>
            <select>
            	<option value="40">40</option>
            	<option value="41">41</option>
            	<option value="42">42</option>
            	<option value="43">43</option>
            	<option value="44">44</option>
            	<option value="45">45</option>
            </select>
            <?php if($logged_in) echo '<button type="button" class="btn btn-success" style="display: inline-block;" onclick=order_sneaker("'.$_GET['s'].'") >Order</button>'; ?>
            <?php if($admin) echo '<button type="button" class="btn btn-danger" style="display: inline-block;" onclick=delete_sneaker("'.$_GET['s'].'")>Delete Sneaker</button>'; ?>
          </div>
        </div>
	</div>
	<div class="col-lg-2"></div>
</div>

</div>

</body>
</html>