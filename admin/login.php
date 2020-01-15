<?php
session_start();
include "../library/config.php";
include "../library/function_antiinjection.php";
?>

<html>
<head>
	<title>Halaman Administrator</title>
	
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0" />

	<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/login.css"/>
	
	<script type="text/javascript" src="../plugin/jquery/jquery-2.0.2.min.js"></script>
</head>
<body>

<div class="container-fluid"> 	
	<div class="row">
		<div class="col-md-4 col-md-push-4 form-login">
		
<?php
if(isset($_POST['login'])){
	$username = antiinjeksi($_POST['username']);
	$password = antiinjeksi(md5($_POST['password']));

	$cekuser = $mysqli->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
	$jmluser = $cekuser->num_rows;
	$data = $cekuser->fetch_array();

	if ($jmluser> 0){

	  $_SESSION['username']     = $data['username'];
	  $_SESSION['namalengkap']  = $data['nama_lengkap'];
	  $_SESSION['password']     = $data['password'];
	  $_SESSION['iduser']     	= $data['id_user'];
	  $_SESSION['leveluser']    = $data['level'];
	  
	  $_SESSION['timeout'] = time()+1000;
	  $_SESSION['login'] = 1;
	  
	  header('location: index.php');
	}else{
	  echo'<div class="alert alert-danger login-alert" role="alert"><b>Sorry!</b> Username atau password salah.</div>';
	}
}
?>

			<div class="panel panel-primary">
			   <div class="panel-heading">
				  <b>Login Administrator</b>
			   </div>
			   <div class="panel-body">
				  <form method="post" action="login.php" class="form-horizontal">
					<div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
						<input type="text" name="username" placeholder="Username" autofocus class="form-control">
					</div>
					<br/>
					<div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
						<input type="password" name="password" placeholder="Password" class="form-control">
					</div>
					<br/>
					<button type="submit" name="login" class="btn btn-primary pull-right">
						<i class="glyphicon glyphicon-log-in"></i> Login Administrator
					</button>
				  </form>
			   </div>
			</div>
		</div>
	</div>
</div>

</body>
</html>
