	<?php
	if(isset($_POST['ile']))
				{
					if(isset($_SESSION['ile'])){}else{$_SESSION['diile'] = 0; $_SESSION['ile'] = 0;}
					$ile = $_POST['ile'] + $_SESSION['diile'];
					$diile = $_POST['diile'] + $_SESSION['ile'];
					$_SESSION['ile'] = $ile;
					$_SESSION['diile'] = $diile;
					
				}else{
				$ile = 0;
				$diile = 20;
				}
				$i = 0;
				require_once "conect.php";
				$conect = @new mysqli($host,$db_user,$db_password,$db_name);
				$sql = "SELECT * FROM `img`";
				$file = $conect->query($sql);
				if($file->num_rows > 0){
					while($dane = $file->fetch_assoc()){
						if($ile == $i){
						if($ile <= $diile){
						$img = $dane["url"];
					
					echo'<div class="col-sm-6 col-md-3 col-lg-3" style="" ><figure><img  style="cursor:pointer" ;
						onclick="onClick(this)" class="lazyload img-fluid" src="'.$img.'" alt="'.$img.'"/></figure></div>';
						}else{exit;}
						}else{$i++;}
					}
				}
				$conect->close();
				?>