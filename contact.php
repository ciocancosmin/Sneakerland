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
	

	 <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Contact
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
          <!-- Embedded Google Map -->
          <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=iulius%20mall%20timisoara&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de/beste-wordpress-themes/">pureblack.de</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
          <h3>Contact Details</h3>
          <p>
            Iulius Mall
            <br>Timisoara, Romania
            <br>
          </p>
          <p>
            <abbr title="Phone">P</abbr>: 0256 254 456
          </p>
          <p>
            <abbr title="Email">E</abbr>:
            <a href="mailto:name@example.com">admin@sneakerland.com
            </a>
          </p>
          <p>
            <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM
          </p>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


</div>

</div>

</body>
</html>