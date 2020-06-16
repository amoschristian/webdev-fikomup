<?php
/* Membuat variabel, ubah sesuai dengan nama host dan database pada hosting */
$host	= getenv('fikomdb_host');
$user	= getenv('fikomdb_user');
$pass	= getenv('fikomdb_pass');
$port   = getenv('fikomdb_port');
$db		= getenv('fikomdb_schema');

//Menggunakan objek mysqli untuk membuat koneksi dan menyimpanya dalam variabel $mysqli	//
$mysqli = new mysqli($host, $user, $pass, $db, $port);

//Menentukan timezone //
date_default_timezone_set('Asia/Jakarta'); 

//Membuat variabel yang menyimpan nilai waktu //
$nama_hari 	= array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari		= date("w");
$hari_ini 	= $nama_hari[$hari];

$tgl_sekarang = date("d");
$bln_sekarang = date("m");
$thn_sekarang = date("Y");

$tanggal 	= date('Ymd');
$jam 		= date("H:i:s");
?>
