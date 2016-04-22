<?php
$vead=array();
ini_set("display_errors", 1);
function kuva_login() {
	include_once('view/head.html');
	if (!empty($_POST)) {
		if (empty($_POST['username'])) {
			$vead[]="Kasutajanimi sisestamata!";
		}
	
		if (empty($_POST['password'])) {
			$vead[]="Parool sisestamata!";
		}
		
		if (!empty($_POST['username']) && !empty($_POST['password'])){
			header("Location: ?mode=galerii");	
		}
	}
	include('view/login.html');
	include_once('view/foot.html');
}
	
function kuva_upload() {
	include_once('view/head.html');
	include('view/upload.html');
	include_once('view/foot.html');
}

function kuva_register() {
	include_once('view/head.html');
	include('view/register.html');
	include_once('view/foot.html');
}	

function kuva_galerii() {
	global $pildid;
	include_once('view/head.html');
	include('view/gallery.html');
	include_once('view/foot.html');
}	

?>