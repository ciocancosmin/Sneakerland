<?php

	session_start();

	require "vendor/autoload.php";

	$client = new MongoDB\Client;

	$main_db = $client -> sneakerland;

	$acc = $main_db -> accounts;

	$snk = $main_db -> sneakers;

	$brands = $main_db -> brands;
	
	if(!isset($_SESSION['username'])) $_SESSION['username'] = "0";

?>