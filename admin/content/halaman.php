<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config.js"></script>

<?php
if(!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=halaman";
switch($show){

	//Menampilkan data
	default:
		echo '<h3 class="page-header"><b>Daftar Tag</b>';
						
		if($_SESSION['leveluser']=="admin"){
			echo'<a href="'.$link.'&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>';
		}
		
		echo '</h3>';
		
		buka_tabel(array("Judul Halaman", "User"));
		$no = 1;
		$query = $mysqli->query("SELECT * FROM halaman ORDER BY id_halaman");
		while($data = $query->fetch_array()){
			$user = $mysqli->query("SELECT nama_lengkap FROM user where id_user='$data[id_user]'");
			$us = $user->fetch_array();
			if($_SESSION['leveluser']=="admin") isi_tabel($no, array($data['judul'], $us['nama_lengkap']), $link, $data['id_halaman']);
			else  isi_tabel($no, array($data['judul'], $us['nama_lengkap']), $link, $data['id_halaman'], true, false);
			$no++;
		} 
		tutup_tabel();
		
	break;
	
	//Menampilkan form input dan edit data
	case "form":
		if(isset($_GET['id'])){
			$query 	= $mysqli->query("SELECT * FROM halaman WHERE id_halaman='$_GET[id]'");
			$data	= $query->fetch_array();
			$aksi 	= "Edit";
		}else{
			$data = array("id_halaman"=>"", "judul"=>"", "isi"=>"", "gambar"=>"", "id_modul"=>"");
			$aksi 	= "Tambah";
		}
		
		echo'<h3 class="page-header"><b>'.$aksi.' Halaman</b> </h3>';	
		if($aksi=="Tambah" and $_SESSION['leveluser']!="admin"){
			header('location:'.$link);
		}else{
			buka_form($link, $data['id_halaman'], strtolower($aksi));
				buat_textbox("Judul Halaman", "judul", $data['judul'], 10);
				buat_textarea("Isi Halaman", "isi", $data['isi'], "richtext");
				buat_imagepicker("Gambar", "gambar", $data['gambar']);
				
				//Menampilkan pilihan modul untuk ditampilkan pada halaman
				$konten = $mysqli->query("SELECT * FROM modul WHERE konten='Y' AND aktif='Y'");
				$list = array();
				$list[] = array('val'=>'0', 'cap'=>'Tidak Ada');
				while($kt = $konten->fetch_array()){
					$list[] = array('val'=>$kt['id_modul'], 'cap'=>$kt['judul']);
				}
				buat_combobox("Konten Modul", "konten", $list, $data['id_modul']);
			tutup_form($link);
		}
	break;	
	
	//Menyisipkan atau mengedit data di database
	case "action":
		$judul		= addslashes($_POST['judul']);
		$judul_seo 	= convert_seo($_POST['judul']);
		$isi		= addslashes($_POST['isi']);
		$user		= $_SESSION['iduser'];
		if($_POST['aksi'] == "tambah"){
			$mysqli->query("INSERT INTO halaman SET
				judul 		= '$judul',
				judul_seo 	= '$judul_seo',
				isi			= '$isi',
				hari		= '$hari_ini',
				tanggal		= '$tanggal',
				jam			= '$jam',
				id_user		= '$user',
				id_modul	= '$_POST[konten]',
				gambar 		= '$_POST[gambar]'				
			");
		}elseif($_POST['aksi'] == "edit"){
			$mysqli->query("UPDATE halaman SET
				judul 		= '$judul',
				judul_seo 	= '$judul_seo',
				isi			= '$isi',
				hari		= '$hari_ini',
				tanggal		= '$tanggal',
				jam			= '$jam',
				id_user		= '$user',
				id_modul	= '$_POST[konten]',
				gambar 		= '$_POST[gambar]'
			WHERE id_halaman='$_POST[id]'");
		}
		header('location:'.$link);
	break;
	
	//Menghapus data di database
	case "delete":
		if($_SESSION['leveluser']=="admin"){
			$mysqli->query("DELETE FROM halaman WHERE id_halaman='$_GET[id]'");
		}
		header('location:'.$link);
	break;
	
}
?>