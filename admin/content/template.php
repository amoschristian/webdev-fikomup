<?php
if(!defined("INDEX")) header('location: ../index.php');
if($_SESSION['leveluser']!="admin") header('location: index.php');
	
$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=template";
switch($show){

	//Menampilkan data
	default:
		echo '<h3 class="page-header"><b>Daftar Template</b>
				<a href="'.$link.'&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';
		
		buka_tabel(array("Preview", "Judul", "Aktif"));
		$no = 1;
		$query = $mysqli->query("SELECT * FROM template ORDER BY aktif");
		while($data = $query->fetch_array()){
			if($data['aktif']=='Y') $aktif = '<span  style="color: green"><i class="glyphicon glyphicon-ok-circle"></i></span>';
			else $aktif = '<a href="'.$link.'&show=activate&id='.$data['id_template'].'" style="color: red"><i class="glyphicon glyphicon-remove-circle"></i></a>';
			
			if(file_exists("../template/$data[folder]/preview.png")) $gambar = "<img src='../template/$data[folder]/preview.png' width='200'>";
			else $gambar = "<img src='images/blank.png' width='200'>";
			
			if($data['aktif']=="Y") isi_tabel($no, array($gambar, $data['judul'], $aktif), $link, $data['id_template'], true, false);
			else isi_tabel($no, array($gambar, $data['judul'], $aktif), $link, $data['id_template']);
			$no++;
		} 
		tutup_tabel();
	break;
	
	//Menampilkan form input dan edit data
	case "form":		
		if(isset($_GET['id'])){
			$query 	= $mysqli->query("SELECT * FROM template WHERE id_template='$_GET[id]'");
			$data	= $query->fetch_array();
			$aksi 	= "Edit";
		}else{
			$data = array("id_template"=>"", "judul"=>"");
			$aksi 	= "Tambah";
		}
		echo'<h3 class="page-header"><b>'.$aksi.' Template</b> </h3>';	
		
		buka_form($link, $data['id_template'], strtolower($aksi));
			buat_textbox("Judul", "judul", $data['judul']);
			if($aksi == "Tambah") buat_textbox("File", "file", "", 4, "file");
		tutup_form($link);	
	break;	
	
	//Menyisipkan atau mengedit data di database
	case "action":
		if($_POST['aksi'] == "tambah"){
			$filename = $_FILES["file"]["name"];
			$source = $_FILES["file"]["tmp_name"];
			$type = $_FILES["file"]["type"];
			
			$nama = explode('.', $filename);
			if($nama[1] != "zip"){
				echo'<script>
						window.alert("File yang diupload tidak bertipe .zip. Silakan di ulang");
						window.location.href=history.back();
					</script>';
			}else{
				include"../library/function_unzip.php";
				unzip_file($filename, $source, "../template/");
				$mysqli->query("INSERT INTO template SET
					judul 		= '$_POST[judul]',
					folder 		= '$nama[0]',
					aktif		= 'N'
				");
				header('location:'.$link);
			}
		}elseif($_POST['aksi'] == "edit"){
			$mysqli->query("UPDATE template SET
				judul 		= '$_POST[judul]'
			WHERE id_template='$_POST[id]'");
		header('location:'.$link);
		}
	break;
	
	//Menghapus data di database
	case "delete":		
		$query 	= $mysqli->query("SELECT * FROM template WHERE id_template='$_GET[id]'");
		$data	= $query->fetch_array();
		
		include "../library/function_remove.php";
		hapus_folder("../template/$data[folder]");
		
		$mysqli->query("DELETE FROM template WHERE id_template='$_GET[id]'");
		header('location:'.$link);
	break;
	
	//Mengaktifkan template
	case "activate":						
		$mysqli->query("UPDATE template SET aktif='N'");
		$mysqli->query("UPDATE template SET aktif='Y' WHERE id_template='$_GET[id]'");
		header('location:'.$link);
	break;
	
}
?>