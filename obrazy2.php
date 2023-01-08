<?php session_start(); 
//$new = $_SESSION;
//session_regenerate_id();
//$_SESSION = $new;
require_once "conect.php";
$conect = @new mysqli($host,$db_user,$db_password,$db_name);
$zap = $_POST['zap'];
//$mh = curl_multi_init();
/*function create_fake($width,$height){
		//  API url
		$url = 'http://meme.meina.pl/api_fake.php';

		// Collection object
		$data = [
		'width' => $width,
		'height' => $height
		];

		// Initializes a new cURL session
		$curl = curl_init($url);

		// Set the CURLOPT_RETURNTRANSFER option to true
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, false);

		// Set the CURLOPT_POST option to true for POST request
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_TIMEOUT, 1); 
		// Set the request data as JSON using json_encode function
		curl_setopt($curl, CURLOPT_POSTFIELDS,  $data);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
		curl_setopt($curl, CURLOPT_DNS_CACHE_TIMEOUT, 1); 
		curl_setopt($curl, CURLOPT_FRESH_CONNECT, true);
		curl_setopt($curl, CURLOPT_FORBID_REUSE, true);
		curl_setopt($curl, CURLOPT_USERAGENT, 'api');
		// Set custom headers for RapidAPI Auth and Content-Type header
		curl_setopt($curl, CURLOPT_HEADER, 0);

		// Execute cURL request with all previous settings
		//$response = 
		// Close cURL session
		curl_multi_add_handle($GLOBALS['mh'],$curl);
	}*/
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
	function NWD($n,$k){
		$x;
		while ($n != 0){
			$x = $n;
			$n = $k % $n;
			$k = $x;
		}
		return $k;
	}

				$uzerid = $_SESSION['id'];
				$sql = "SELECT url2  FROM (SELECT COUNT(id)as ile,`id`, REPLACE(`url`,LEFT(url,34) ,'') as url2 , uzer FROM `img` WHERE uzer = $uzerid GROUP BY url2,uzer)AS img2 WHERE ile >1 LIMIT $zap,1";
				$file = $conect->query($sql);
				$dane = $file->fetch_assoc();
				$url2 = $dane['url2'];
				$sql = "SELECT * FROM `img` WHERE REPLACE(img.`url`,LEFT(url,34) ,'') = '$url2' and uzer = $uzerid";
				$file = $conect->query($sql);
				if($file->num_rows > 0){
					while($dane = $file->fetch_assoc()){
						$img = $dane['url'];
						if(!getimagesize($img)){
							echo 'nie istnieje';
						}
						$id = $dane["id"];
						if(substr($img, -4) == '.mp4' ){
						echo'
						<div class="un">
						<div class="ustaw">
							<video class="myVideo" controls="controls" style="width:100%;" loop="loop" muted preload="metadata">
								<source data-src="'.$img.'" type="video/mp4">
							</video></div>
								<div class="inputas">
									<form enctype="multipart/form-data" action="delate.php" method="post" target="iframe" class="razem">
									<input type="hidden" name="del" value="'.$id.'"/>
									<input type="submit" value="usuni" />
									</form>
									<a href="'.$img.'" style="display:block;" download><input type="submit" value="Download" /></a>
								</div>
						</div>
						';
						}else{
						echo'
						<div class="un">
								<img data-src="'.$img.'" data-class="fake_img/'.$width.'x'.$height.'.png" src="fake_img/'.$width.'x'.$height.'.png" style="" alt="huj" onclick="onClick(this)" />
								<div class="inputas">
									<form enctype="multipart/form-data" action="delate.php" method="post" target="iframe">
										<input type="hidden" name="del" value="'.$id.'"/>
										<input type="submit" value="usuni" />
									</form>
										<a href="'.$img.'" style="display:block;" download><input type="submit" value="Download" /></a>
								</div>
						</div>
						';
						}
						}
					}
					//execute the multi handle
					/*do {
						$status = curl_multi_exec($mh, $active);
						if ($active) {
							// Wait a short time for more activity
							curl_multi_select($mh);
						}
					} while ($active && $status == CURLM_OK);

					//close the handles
					curl_multi_close($mh);
			*/
			$conect-> close();
?>

