<?php
session_start();
$arr_cookie_options = array ('expires' => time() - 1000);
setcookie('ALog', base64_encode($d['n']), $arr_cookie_options);  
if(isset($_COOKIE['ALog'])){
	header('Location: loguj-script.php');
}
if(isset($_SESSION['id']))
{
	session_destroy();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
	<title>zex</title>
	<meta name="description" content="strony">
	<meta name="praca" content="">
	<meta name="dawid" content="str">
	<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="style.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
	
	<style>
	
	input{
	margin :5px;
	padding:10px;
	border-radius:10px;
	background-color:white;
	margin
	}
	body{
		margin:0px;
		padding:0px;
	}
	body > div{
		display:flex;
		margin:0px;
		padding:0px;
		min-height:100vh;
		justify-content:center;
		align-items:center;
		text-align:center;
		background: linear-gradient(-25deg, #03a9f4 0%, #3a78b7 50%, #262626 50%, #607d8b 100%);
		animation: animate 10s linear infinite;
	}
	div{vertical-align: middle;}
	form{
		display:flex;
		align-content:center;
		justify-content:center;
		width:100%;
		height:100%;
	}
	form>div>*{
		width:300px;
		margin-right:auto;
		margin-left:auto;
	}
	form>div{
		display:flex;
		flex-direction:column;
	}
	@keyframes animate{
		0%,100%{
			filter: rotate(0deg);
		}
		50%{
			filter: hue-rotate(360deg);
		}
	}
	</style>
</head>

<body>
<div>
<form enctype="multipart/form-data" action="loguj-script.php" method="post" >
	<div>
		<input type="text" name="nick"/>
		<input type="password" name="password" />
		<input type="submit" value="Zaloguj się" />
	</div>
</form>
</div>
	

			
</body>