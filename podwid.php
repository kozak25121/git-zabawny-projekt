<?php	 
			
					echo'<div class="howaj lazyload" >
					<video class="myVideo" controlslist="nodownload" style="max-width:100%;height:860px;margin-left:auto;margin-right:auto;display:block;" controls="controls">
					<source src="'.htmlspecialchars($_GET["wideo"]).'" type="video/mp4">
					</video>'.htmlspecialchars($_GET["wideo"]).'</div>';
				?>