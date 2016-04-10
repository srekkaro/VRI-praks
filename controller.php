<?php
	ini_set("display_errors", 1);
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
	
 	include_once('view/head.html');
 		switch($mode) {
		case "login":
			include('view/login.html');
		break;
		case "upload":
			include('view/upload.html');
		break;
		case "register":
			include('view/register.html');
		break;
		default:
			include('view/gallery.html');
		break;
	}
 	include_once('view/foot.html');

?>