	
	<?php session_start(); 
	if(!isset($_SESSION['id']))
{
	header('Location: loguj.php');
}
require_once "conect.php";
$conect = @new mysqli($host,$db_user,$db_password,$db_name);

?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>tak</title>
	<link rel="shortcut icon" href="https://pbs.twimg.com/profile_images/1128944282943942658/_SKGcaOa.jpg">
	<meta name="description" content="strony">
	<meta name="dawid" content="str">
	<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
	<script src="js/jquery-1.12.4.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/lazyload.js"></script>
	<script src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="bots/css/bootstrap.min.css" type="text/css" >
	<link href="bots/css/bootstrap.css" rel="stylesheet" type="text/css" >
	<link rel="stylesheet" href="css.css" type="text/css" >
</head>
<body id="cialo">

<nav id ="myDIV"class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><?php echo $_SESSION['id']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Wideo</a>
      </li>
	  <li class="nav-item">
		<form enctype="multipart/form-data" action="plik-wid.php" method="post" class="razem">
		<input type="file" name="plik" class="file" />
		<input type="submit" value="wyślij wideo" />
		</form>
      </li>
  </div>
</nav>
	<div id="wideo" style="height:860px;width:80%;float:left;">
			</div>
			<div style="width:20%;color:white;overflow-y:auto;height:860px;float:right;">
			
		<?php	
				if ($_SESSION['id'] == '1') {$source = 'filmy';}else{$source =  'filmseave';}
				$i=0;
				$directory = $source;
				$dir=opendir($directory);
				 
				while($file_name=readdir($dir))
					{
						 if(($file_name!=".")&&($file_name!=".."))
						{
							
					$img = $source."/".$file_name;
					$i++;
					
					echo'
					<div onclick="wideo('.$i.')" style="cursor:pointer;" class="test">
					
					Nazwa:'.$img.'<a class="wididi'.$i.'" href="'.$img.'" src="'.$img.'" > p </a></div>
					';
						
						
						
						
						
						}
					}
				 
				closedir($dir);
			?>
			<!-- <div  onclick="pole('.$i.')" style="cursor:pointer;" class="test"">Nazwa:'.$img.'<br><video style="width:100%" ><source src="'.$img.'" type="video/mp4"></video></div> -->
			</div>
			
<script>
window.onload = ajax;
function ajax(){
	var XHR = null;
	try
	{
		XHR = new XMLHttpRequest();
	}
	catch(e)
	{
			try
		{
			XHR = new  ActiveXObject("Msxm12.XMLHTTP");
		}catch(e2)
		{
				try
			{
				XHR = new  ActiveXObject("Microsoft.XMLHTTP");
			}catch(e3)
			{
				window.alert('błąd');
			}
		}
	}
	return XHR;
}

function wideo(ile){
var src = $(".wididi"+ile).attr('href');
var wyslij = 'podwid.php?wideo=';
wyslij += src;
wideoajax(wyslij);
}


function wideoajax(link){
XHR= ajax();
	if ( XHR != null ){

		XHR.open("GET", link, true)
		
		XHR.onreadystatechange = function()
		{
			if (XHR.readyState == 4)
			{
				document.getElementById('wideo').innerHTML = XHR.responseText;
				return;
			}
		}
		XHR.send(null);
}

}
</script>
</body>
<!--
<script>
function pole(adres){
	$('.howaj').css('display','none');
	var adr = adres;
	$('#'+adr+'').css('display','block');
};
</script>
	<script>
	$(function(){
	$(".howaj").lazyload();} );
	</script>   -->
	
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>	
<script src="bots/js/bootstrap.min.js"></script>
</html>