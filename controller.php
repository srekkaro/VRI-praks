<?php
	ini_set("display_errors", 1);
	require_once('functions.php');
	$pildid=array(
 		array("big"=>"big/florida.png", "small"=>"small/florida.jpg", "alt"=>"Tundmatu, florida"),
  		array("big"=>"big/kala.jpg", "small"=>"small/kala.jpg", "alt"=>"Tundmatu, kala"),
  		array("big"=>"big/moon.jpg", "small"=>"small/moon.jpg", "alt"=>"Tundamatu, moon"),
 		array("big"=>"big/network.jpg", "small"=>"small/network.jpg", "alt"=>"Tundmatu, network"),
 		array("big"=>"big/random12.jpg", "small"=>"small/random12.jpg", "alt"=>"Tundmatu, random12"),
  		array("big"=>"big/reflection.jpg", "small"=>"small/reflection.jpg", "alt"=>"Tundmatu, reflection")	
 	);
 	
 	$mode="vaikimisi";
	if (!empty($_GET['mode'])){
		$mode=$_GET['mode'];	
	}
 		switch($mode) {
		case "login":
			kuva_login();
		break;
		case "upload":
			kuva_upload();
		break;
		case "register":
			kuva_register();
		break;
		default:
			kuva_galerii();
		break;
	}

?>