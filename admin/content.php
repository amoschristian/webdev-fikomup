<?php
if(!defined("INDEX")) header('location: index.php');
	
$content = isset($_GET['content']) ? $_GET['content'] : 'dashboard';
$kosong = true;

//IG API AUTH
$code = isset($_GET['code']) ? $_GET['code'] : '';

if ($code && $content == 'dashboard') {
	header("Location: /admin/?content=instagram&ig_code=".$code); 
}

//Menampilkan file sesuai nilai $content
$page = [
	'dashboard', 
	'artikel', 
	'berita', 
	'event', 
	'kategori', 
	'tag', 
	'halaman', 
	'komentar', 
	'media', 
	'modul', 
	'template', 
	'menu', 
	'widget', 
	'layout', 
	'user', 
	'setting', 
	'backuprestore', 
	'lecturer', 
	'partner', 
	'instagram',
	'organization',
	'student',
	'alumni',
	'ukm',
	'announcement_counseling',
	'schedule_counseling'
];
foreach($page as $pg){
	if($content == $pg and $kosong){
		include 'content/'.$pg.'.php';
		$kosong = false;
		break;
	}
}

//Menampilkan konten dari modul yang memiliki menu
$query = $mysqli->query("SELECT * FROM modul WHERE menu='Y'");
while($data = $query->fetch_array()){
	if(file_exists("../module/$data[folder]/admin.php")){
		if($content == $data['folder'] and $kosong){
			$_FOLDER_MODUL = "../module/$data[folder]";
			include "../module/$data[folder]/admin.php";
			$kosong = false;
		}
	}
}

//Pesan jika kosong
if($kosong){
	echo '<br><br><div class="alert alert-warning"><b>Sorry</b>, Halaman tidak ditemukan!</div>';
}	
?>