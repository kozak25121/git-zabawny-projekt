<?php
session_start();
require_once "conect.php";
$conect = @new mysqli($host,$db_user,$db_password,$db_name);


/*zabespieczasz dane*/
if(!isset($_COOKIE['ALog'])){
$login =$_POST['nick'];
$haslo =$_POST['password'];
$login = htmlentities($login, ENT_QUOTES, "UTF-8");
$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
}else{
$login = htmlentities(base64_decode($_COOKIE['ALog']), ENT_QUOTES, "UTF-8");
$haslo = htmlentities(base64_decode($_COOKIE['AHas']), ENT_QUOTES, "UTF-8");
}

if($conect->connect_error!=0)
{
	echo'error';
}else
{
	/*select line*/
	$a = "SELECT * FROM `passwd` WHERE n='$login' AND h='$haslo'";
	/*połączenie*/
	$o = @$conect->query($a);
	/*dane z połączenia*/
	$d = $o->fetch_assoc();
	/*liczy kolumny*/
	$i = $o->num_rows;
	if($i>0){
	/*dane z połączenia są wyjmowane*/
	$_SESSION['id'] = $d['id'];
	$_SESSION['name'] = $d['n'];
	$_SESSION['haslo'] = $d['h'];

	$arr_cookie_options = array ('expires' => time() + 60*60*24*30);
	setcookie('ALog', base64_encode($d['n']), $arr_cookie_options);  
	setcookie('AHas', base64_encode($d['h']), $arr_cookie_options); 
	
	header('Location: index.php');
	$conect->close();
	}else{header('Location: loguj.php');}
}

?>