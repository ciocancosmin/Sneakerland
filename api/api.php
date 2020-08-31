<?php

	session_start();

	require "../vendor/autoload.php";

	$client = new MongoDB\Client;

	$main_db = $client -> sneakerland;

	$acc = $main_db -> accounts;

	$snk = $main_db -> sneakers;

	$brands = $main_db -> brands;

	$orders = $main_db -> orders;

	$q = "";

	$q1 = "";

	$q2 = "";

	$q3 = "";

	$q4 = "";

	$q5 = "";

	if(!isset($_SESSION['username'])) $_SESSION['username'] = "0";

	if(isset($_GET['q'])) $q = $_GET['q'];

	if(isset($_GET['q1'])) $q1 = $_GET['q1'];

	if(isset($_GET['q2'])) $q2 = $_GET['q2'];

	if(isset($_GET['q3'])) $q3 = $_GET['q3'];

	if(isset($_GET['q4'])) $q4 = $_GET['q4'];

	if(isset($_GET['q5'])) $q5 = $_GET['q5'];


	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


	if($q == "login")
	{
		$username = $q1;
		$password = $q2;
		$qry = $acc -> findOne([
			'username' => $username 
		]);
		if(isset($qry['_id']))
		{
			if($qry['password'] == $password)
			{
				$_SESSION['username'] = $username;
				echo "1";
			}
			else echo "Password is not correct!";
		}
		else echo "The account with this username does not exist!";
	}

	if($q == "register")
	{
		$username = $q1;
		$password = $q2;
		$email = $q3;
		$address = $q4;
		$card = $q5;
		$qry = $acc -> findOne([
			'username' => $username 
		]);
		$qry2 = $acc -> findOne([
			'email' => $email 
		]);
		$message = "";
		if(isset($qry['_id'])) $message.= "There's already an account with that username! \n";
		if(isset($qry2['_id'])) $message.= "There's already an account with that email! \n";
		if(!isset($qry['_id']) && !isset($qry2['_id']))
		{
			$qry3 = $acc -> insertOne([
				'username' => $username,
				'password' => $password,
				'email' => $email,
				'address' => $address,
				'card' => $card
			]);
			$message = "1";
		}
		echo $message;
	}
	if($q == "get_user")
	{
		echo $_SESSION['username'];
	}
	if( isset($_POST['sneakerSubmit']) && $_SESSION['username'] == "admin" )
	{
		$sneaker_name = $_POST['sneakerName'];
		$sneaker_brand = $_POST['sneakerBrand'];
		$sneaker_price = $_POST['sneakerPrice'];
		$sneaker_description = $_POST['sneakerDescription'];
		$c = $brands -> findOne([
			'name' => $sneaker_brand
		]);
		if(!isset($c['_id']))
		{
			$d = $brands -> insertOne([
				'name' => $sneaker_brand
			]);
		}
		//upload_file
		$file = $_FILES['sneakerImage'];
		$file_type = $_FILES['sneakerImage']['type'];
		$file_name = $_FILES['sneakerImage']['name'];
		$file_name_tmp = $_FILES['sneakerImage']['tmp_name'];
		$f1 = explode("/", $file_type);
		$f2 = explode(".", $file_name);
		$file_extension = $f2[1];
		if($f1[0] == "image")
		{
			$new_f_name = generateRandomString(30);
			$new_f_location = "../img/".$new_f_name.".".$file_extension;
			move_uploaded_file($file_name_tmp, $new_f_location);

			//insert in db

			$tt = $snk -> insertOne([
				'name' => $sneaker_name,
				'brand' => $sneaker_brand,
				'price' => $sneaker_price,
				'description' => $sneaker_description,
				'image_name' => $new_f_name.".".$file_extension
			]);

			header("Location: ../admin.html");
		}
	}

	if($q == "logout")
	{

		$_SESSION['username'] = "0";

	}
	if($q == "get_brands")
	{
		$br = $brands -> find();
		$send = "";
		foreach ($br as $key) {
			$send .= $key['name']."//";
		}
		$send = substr($send, 0,-2);
		echo $send;
	}
	if($q == "small_load_sneakers")
	{
		$filter = [];
		$options = ['sort' => ['_id' => -1], 'limit' => 6];
		$sm_q = $snk->find($filter, $options);
		$snd = "";
		foreach ($sm_q as $key) {
			$snd .= $key['name']."/*/".$key['price']."/*/".$key['description']."/*/".$key['image_name']."/*/".$key['_id']."//";
		}
		$snd = substr($snd, 0, -2);
		echo $snd;
	}
	if($q == "delete_sneaker")
	{
		$snk_id = $q1;
		if($_SESSION['username'] == "admin")
		{
			$dd = $snk -> deleteOne([
				'_id' => new MongoDB\BSON\ObjectID( $q1 )
			]);
		}

	}
	if($q == "add_order")
	{
		$snk_id = $q1;
		if($_SESSION['username'] != "0")
		{
			$oo = $orders -> insertOne([
				'from' => $_SESSION['username'],
				'sneaker' => $snk_id
			]);
		}
	}

?>