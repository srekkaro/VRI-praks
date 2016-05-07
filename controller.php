<?php
	ini_set("display_errors", 1);
	require_once('functions.php');
	alusta_sessioon();
	connect_db();
	$pildid = array();
	$pildid=leia_andmed();

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
		case "logout":
			kuva_logout();
		break;
		case "muuda":
			muuda_pilt();
		break;
		default:
			kuva_galerii();
		break;
	}

?>