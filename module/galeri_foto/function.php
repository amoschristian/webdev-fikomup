<?php
function aktifkan_modul(){
	global $mysqli;
	
	$sql = "CREATE TABLE IF NOT EXISTS `md_galeri_foto` (
			`id_galeri` int(10) NOT NULL AUTO_INCREMENT,
			`judul` varchar(50) NOT NULL,
			`gambar` varchar(100) NOT NULL,
			`tanggal` date NOT NULL,
			PRIMARY KEY(`id_galeri`)
			) ENGINE=MyISAM";
			
	$mysqli->query($sql);
}

function hapus_modul(){
	global $mysqli;
	$sql = "DROP TABLE `md_galeri_foto`";
	
	$mysqli->query($sql);
}
?>