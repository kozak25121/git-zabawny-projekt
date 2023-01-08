<?php
session_start();
require_once "conect.php";
$conect = @new mysqli($host,$db_user,$db_password,$db_name);
if ($_SESSION['id'] == '1') {$source = 'filmy/';}else{$source =  'filmseave/';}
if (is_uploaded_file($_FILES['plik']['tmp_name'])) {
        echo 'Odebrano plik  Początkowa nazwa: '.$_FILES['plik']['name'];
        echo '<br/>';
        if (isset($_FILES['plik']['type'])) {
            echo 'Typ: '.$_FILES['plik']['type'].'<br/> sesja : '.$_SESSION['id'].'<br/> plik '.$source.'';
        }
		$login = $source.''.rand(0,99).''.date('Y-m-d-H-i-s').''.$_FILES['plik']['name'];
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$login = str_replace('#', '', $login);
        move_uploaded_file($_FILES['plik']['tmp_name'],''.$login);
} else {
	header('Location: wideo.php');
	
}
 


$conect->close();


?>