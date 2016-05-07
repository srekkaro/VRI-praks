<?php
$vead=array();
ini_set("display_errors", 1);

function connect_db(){
  global $connection;
  $host="localhost";
  $user="test";
  $pass="t3st3r123";
  $db="test";
  $connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa mootoriga ühendust");
  mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function leia_andmed(){
	global $connection;
	$p2ring="SELECT * FROM  10132353_pildid";
	$result = mysqli_query($connection, $p2ring) or die("$p2ring - ".mysqli_error($connection));
	$fotod=array();
	while ($rida = mysqli_fetch_assoc($result)){
		$fotod[]=$rida;
	}
	return ($fotod);
}

function muuda_pilt(){
	global $connection;
	global $pildid;
	global $tulemus;
	if (!empty($_GET["id"])){
		$p2ring="SELECT * FROM 10132353_pildid WHERE id=".mysqli_real_escape_string($connection, $_GET["id"]);
		$result = mysqli_query($connection, $p2ring) or die("$p2ring - ".mysqli_error($connection));
		$tulemus=mysqli_fetch_assoc($result);
		include_once('view/head.html');
		include('view/muuda.html');
		include_once('view/foot.html');	
		}
	else {
		header("Location: ?mode=galerii");	
	}
}

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