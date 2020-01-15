<?php
if(!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=galeri_foto";
switch($show){

	//Menampilkan data
	default:
		echo '<h3 class="page-header"><b>Galeri Foto</b>
				<a href="'.$link.'&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';
		
		buka_tabel(array("Foto", "Judul Foto", "Tanggal Posting"));
		$no = 1;
		$query = $mysqli->query("SELECT * FROM md_galeri_foto ORDER BY id_galeri DESC");
		while($data = $query->fetch_array()){			
			$tanggal = print_tanggal($data['tanggal']);
			$foto 	= '<img src="../media/thumbs/'.$data['gambar'].'" width="100">';
			isi_tabel($no, array($foto, $data['judul'], $tanggal), $link, $data['id_galeri']);
			$no++;
		} 
		tutup_tabel();
		
	break;
	
	//Menampilkan form input dan edit data
	case "form":
		if(isset($_GET['id'])){
			$query 	= $mysqli->query("SELECT * FROM md_galeri_foto WHERE id_galeri='$_GET[id]'");
			$data	= $query->fetch_array();
			$aksi 	= "Edit";
		}else{
			$data = array("id_galeri"=>"", "judul"=>"", "gambar"=>"");
			$aksi 	= "Tambah";
		}
		
		echo'<h3 class="page-header"><b>'.$aksi.' Foto</b> </h3>';	
			buka_form($link, $data['id_galeri'], strtolower($aksi));
				buat_textbox("Judul Foto", "judul", $data['judul'], 4);
				buat_imagepicker("Foto", "gambar", $data['gambar']);
			tutup_form($link);
	break;	
	
	//Menyisipkan atau mengedit data di database
	case "action":
		$judul		= addslashes($_POST['judul']);
		if($_POST['aksi'] == "tambah"){
			$mysqli->query("INSERT INTO md_galeri_foto SET
				judul 		= '$judul',
				tanggal		= '$tanggal',
				gambar 		= '$_POST[gambar]'				
			");
		}elseif($_POST['aksi'] == "edit"){
			$mysqli->query("UPDATE md_galeri_foto SET
				judul 		= '$judul',
				tanggal		= '$tanggal',
				gambar 		= '$_POST[gambar]'
			WHERE id_galeri='$_POST[id]'");
		}
		header('location:'.$link);
	break;
	
	//Menghapus data di database
	case "delete":
		$mysqli->query("DELETE FROM md_galeri_foto WHERE id_galeri='$_GET[id]'");
		header('location:'.$link);
	break;
}
?>