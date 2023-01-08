<?php
session_start();
header("HTTP/1.0 204 No Content");
require_once "conect.php";
$conect = @new mysqli($host,$db_user,$db_password,$db_name);
$i = 0;
$login1 = date('Y-m-d-H-i-s').'_-_'.rand(0,9999).'_-_';
mkdir("img/$login1");
while(isset($_FILES['plik']['tmp_name'][$i])){
$F = $_FILES['plik']['type'][$i];
	if($F == 'video/mp4' ||$F == 'image/png' ||$F == 'image/jpeg' ||$F == 'image/gif' ||$F == 'image/bmp' ||$F == 'image/tiff' ||$F == 'image/svg+xml' ||$F == 'image/img'){
				$login = 'img/'.$login1.'/'.$_FILES['plik']['name'][$i];
				$login = str_replace("#","",$login);
				$login = str_replace("&","",$login);
				$login = str_replace("*","",$login);
				$login = str_replace("!","",$login);
				$login = str_replace("=","",$login);
				$login = str_replace("?","",$login);
				$login = htmlentities($login, ENT_QUOTES, "UTF-8");
				move_uploaded_file($_FILES['plik']['tmp_name'][$i],''.$login);
				$uzer = $_SESSION['id'];
				$conect->query("INSERT INTO `img` VALUES (NULL,'$login','$uzer')");
				
	}
	$i++;
}
$conect->close();
?>

