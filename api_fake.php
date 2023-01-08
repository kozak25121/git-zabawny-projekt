<?php
header("HTTP/1.0 204 No Content");
$w = $_POST['width'];
$h = $_POST['height'];
//fastcgi_finish_request();
function create_fake($width,$height){
	$file = './fake_img/'.$width.'x'.$height.'.png';
	if(!file_exists($file)){
				if($new = imagecreatetruecolor($width,$height)){
					imagepng($new,$file,0);
					exec('optipng '.$file );
				}
				else{
					create_fake($width,$height);
				}
			}
		}
create_fake($w,$h);