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
		
		if (($_POST['username']=='kasutaja')&&($_POST['password']=='parool')) {
			alusta_sessioon();
			$_SESSION['sisenemine']=array();
			$_SESSION['teade']="Sisselogimine &otilde;nnestus!";
			header("Location: ?mode=galerii");	
		}
		else {
			$vead[]="Kasutajat ei eksisteeri v&otilde;i parool oli vale!";
		}
	}
	include('view/login.html');
	include_once('view/foot.html');
}
	
function kuva_upload() {
	include_once('view/head.html');
	if (isset($_SESSION['sisenemine'])) {
		include('view/upload.html');
	}
	else {
		global $pildid;
		$vead[]="Piltide &uuml;leslaadimiseks pead olema sisselogitud!";
		include('view/gallery.html');	
	}
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

function kuva_logout() {
		lopeta_sessioon();
		global $pildid;
		include_once('view/head.html');
		include('view/gallery.html');
		include_once('view/foot.html');
}

function alusta_sessioon(){
	// siin ees võiks muuta ka sessiooni kehtivusaega, aga see pole hetkel tähtis
	session_start();
	}
	
function lopeta_sessioon(){
	$_SESSION = array();
	if (isset($_COOKIE[session_name()])) {
 	 setcookie(session_name(), '', time()-42000, '/');
	}
	session_destroy();
}

?>