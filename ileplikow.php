<?php session_start(); 
$zap = $_POST['zap'];
if(!isset($_SESSION['id']))
{
	header('Location: loguj.php');
}
require_once "conect.php";
$conect = @new mysqli($host,$db_user,$db_password,$db_name);

$page = isSet( $_GET['page'] ) ? intval( $_GET['page'] ) :1;
$pageilosicifoto = isSet( $_GET['how'] ) ? intval( $_GET['how'] ) :40;

?>
<?php echo $_SESSION['id']; ?> - <?php 
	  $uzerid = $_SESSION['id'];
	  $sql = "SELECT COUNT(*) AS `in` FROM `img` WHERE (". $zap .") AND uzer='$uzerid'";
	  $files = $conect->query($sql);
	  if($file = $files->fetch_assoc())
	 	 echo $file['in'];
?> 