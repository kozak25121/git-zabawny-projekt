<?php
session_start(); 
require_once "conect.php";
$conect = @new mysqli($host,$db_user,$db_password,$db_name);
$id = $_POST['del'];

$sql = "SELECT * FROM `img` WHERE id=$id";
$file = $conect->query($sql);
$dane = $file->fetch_assoc();

$url = $dane["url"];

mysqli_query($conect,"DELETE FROM img WHERE id=$id");
unlink($url);


$d = dir("./img");

			while($entry=$d->read()) {
				$entry = "img/".$entry;
					if(is_dir($entry)){
					@rmdir($entry);
					}
			}
$conect->close();			
$d->close();
?>