<?php
session_start();
include "../library/config.php";
include "../library/function_antiinjection.php";
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Fakultas Ilmu Komunikasi Universitas Pancasila - Halaman Administrator</title>
<link rel="shortcut icon" href="images/logo.png" />
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/login.css" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="#" />
<!-- //for-mobile-apps -->
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<!--header start here-->
<div class="body"></div>
<div class="header">
		
						
						<?php
						if(isset($_POST['login'])){
							$username = antiinjeksi($_POST['username']);
							$password = antiinjeksi(md5($_POST['password']));

							$cekuser = $mysqli->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
							$jmluser = $cekuser->num_rows;
							$data = $cekuser->fetch_array();

							if ($jmluser> 0){	

							  $_SESSION['iduser']     	= $data['id_user'];
							  $_SESSION['namalengkap']  = $data['nama_lengkap'];
							  $_SESSION['persnumber']  	= $data['pers_number'];
							  $_SESSION['leveluser']    = $data['level'];
							  $_SESSION['username']     = $data['username'];
							  $_SESSION['password']     = $data['password'];
							  
							  $_SESSION['timeout'] = time()+1000;
							  $_SESSION['login'] = 1;
							  
							  header('location: index.php');
							}else{
							  echo'<div class="alert" role="alert"><b>Sorry!</b> Username atau password salah.</div>';
							}
						}
						?>

						<div class="header-main">
				<img class="logo" src="images/logo.png"></img>
		       <h1>ADMINISTRATOR</h1>
		       <h4>FIKOM UNIVERSITAS PANCASILA</h4>
			<div class="header-bottom">
				<div class="header-right w3agile">
					
					<div class="header-left-bottom agileinfo">

					 <form action="login.php" method="post">
						<input type="text"  value="Username" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}"/>
					<input type="password"  value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}"/>
					   
						<input type="submit" value="Login" name="login">
					</form>	
				</div>
				</div>
			  
			</div>
		</div>
</div>
<!--header end here-->
<div class="copyright">
	<p>Fakultas Ilmu Komunikasi Universitas Pancasila &copy; <script>document.write(new Date().getFullYear());</script>. All rights reserved.</p>
</div>
<!--footer end here-->
</body>
</html>

	
    