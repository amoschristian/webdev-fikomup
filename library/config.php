<?php
/* Membuat variabel, ubah sesuai dengan nama host dan database pada hosting */
$host	= 'localhost';
$user	= 'u1021250_db_fikomup';
$pass	= 'bidang03';
$port   = '3306';
$db		= 'u1021250_db_fikomup'; 

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
