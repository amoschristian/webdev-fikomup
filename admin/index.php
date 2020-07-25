<?php
session_start();
ob_start();
define("INDEX",true);

//Panggil semua file yang diperlukan pada folder library
include "../library/config.php";
include "../library/function_seo.php";
include "../library/function_menu.php";
include "../library/function_table.php";
include "../library/function_form.php";
include "../library/function_date.php";

setlocale(LC_TIME, 'ID'); //set tanggal ke Indonesia

global $mapBoxToken;
$mapBoxToken = 'pk.eyJ1IjoiYW1vc2NocmlzdGlhbiIsImEiOiJjazdvN2t1MGswNm13M3RwMHU4Y245M2IwIn0.CCTCS5dyJEhkFcz5dE4G1A';

//Mengatur batas timeout
$timeout = $_SESSION['timeout'];
if(time()<$timeout){
	$_SESSION['timeout'] = time()+5000;
}else{
	$_SESSION['login'] = 0;
}

//Mengecek status login
if(empty($_SESSION['username']) or empty($_SESSION['password']) or $_SESSION['login']==0){
	header('location: login.php');
}else{
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Administrator</title>

	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0" />

	<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	
	<script type="text/javascript" src="../plugin/jquery/jquery-2.0.2.min.js"></script>
</head>

<style>
	.table>tbody>tr>td {
		vertical-align: middle;
	}
</style>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top"> 
	<div class="container-fluid">
		<?php include "menu.php"; ?> 
	</div>
</nav>	

<section class="container-fluid"> 	
	<div class="row">
		<div class="col-md-2 col-sm-3 hidden-xs sidebar">
			<?php include "sidebar.php"; ?> 
		</div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<?php include "content.php"; ?> 
		</div>
	</div>
</section>

<footer class="navbar navbar-fixed-bottom footer"> 
	<div class="container-fluid">
		<p class="text-center">Copyright &copy; Cmsku. All right reserved.</p>
	</div>
</footer>

	<script type="text/javascript" src="../plugin/bootstrap/js/bootstrap.min.js"></script>
	 	
	<link type="text/css" rel="stylesheet" href="../plugin/dataTables/css/dataTables.bootstrap.css">
	
	<script type="text/javascript" src="../plugin/dataTables/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../plugin/dataTables/js/dataTables.bootstrap.min.js"></script>
	
	<script type="text/javascript" src="js/myscript.js"></script>
</body>
</html>

<?php } ?>