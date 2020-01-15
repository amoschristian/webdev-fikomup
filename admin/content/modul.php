<?php
if(!defined("INDEX")) header('location: ../index.php');
if($_SESSION['leveluser']!="admin") header('location: index.php');
	
$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=modul";
switch($show){

	//Menampilkan data
	default:
		echo '<h3 class="page-header"><b>Daftar Modul</b>
				<a href="'.$link.'&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';
		
		buka_tabel(array("Judul", "Aktif"));
		$no = 1;
		$query = $mysqli->query("SELECT * FROM modul ORDER BY aktif");
		while($data = $query->fetch_array()){
			if($data['aktif']=='Y') $aktif = '<a href="'.$link.'&show=deactivate&id='.$data['id_modul'].'" style="color: green"><i class="glyphicon glyphicon-ok-circle"></i></a>';
			else $aktif = '<a href="'.$link.'&show=activate&id='.$data['id_modul'].'" style="color: red"><i class="glyphicon glyphicon-remove-circle"></i></a>';
			
			isi_tabel($no, array($data['judul'], $aktif), $link, $data['id_modul']);
			$no++;
		} 
		tutup_tabel();
		
	break;
	
	//Menampilkan form input dan edit data
	case "form":	
		if(isset($_GET['id'])){
			$query 	= $mysqli->query("SELECT * FROM modul WHERE id_modul='$_GET[id]'");
			$data	= $query->fetch_array();
			$aksi 	= "Edit";
		}else{
			$data = array("id_modul"=>"", "judul"=>"");
			$aksi 	= "Tambah";
		}
		echo'<h3 class="page-header"><b>'.$aksi.' Modul</b> </h3>';	
		
		buka_form($link, $data['id_modul'], strtolower($aksi));
			buat_textbox("Judul", "judul", $data['judul']);
			if($aksi=="Tambah") buat_textbox("File", "file", "", 4, "file");
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
				include "../library/function_unzip.php";
				unzip_file($filename, $source, "../module/");
				$mysqli->query("INSERT INTO modul SET
					judul 		= '$_POST[judul]',
					folder 		= '$nama[0]',
					aktif		= 'N'
				");				
				header('location:'.$link);
			}
		}elseif($_POST['aksi'] == "edit"){
			$mysqli->query("UPDATE modul SET
				judul 		= '$_POST[judul]'
			WHERE id_modul='$_POST[id]'");			
			header('location:'.$link);
		}
	break;
	
	//Menghapus data di database
	case "delete":
		$query 	= $mysqli->query("SELECT * FROM modul WHERE id_modul='$_GET[id]'");
		$data	= $query->fetch_array();
		
		if(file_exists("../module/$data[folder]/function.php")){
			include "../module/$data[folder]/function.php";
			hapus_modul();
		}
		
		include "../library/function_remove.php";
		hapus_folder("../module/$data[folder]");
		
		$mysqli->query("DELETE FROM modul WHERE id_modul='$_GET[id]'");
		header('location:'.$link);
	break;
		
	//Mengaktifkan data
	case "activate":	
		$query 	= $mysqli->query("SELECT * FROM modul WHERE id_modul='$_GET[id]'");
		$data	= $query->fetch_array();
		
		$menu = (file_exists("../module/$data[folder]/menu.php")) ? 'Y' : 'N';
		$konten = (file_exists("../module/$data[folder]/content.php")) ? 'Y' : 'N';
		$widget = (file_exists("../module/$data[folder]/widget.php")) ? 'Y' : 'N';
		
		if(file_exists("../module/$data[folder]/function.php")){
			include "../module/$data[folder]/function.php";
			aktifkan_modul();
		}
		
		$mysqli->query("UPDATE modul SET 
			aktif	= 'Y',
			menu	= '$menu',
			konten	= '$konten',
			widget  = '$widget'
		WHERE id_modul='$_GET[id]'");
		header('location:'.$link);
	break;
	
	//Menonaktifkan data
	case "deactivate":
		$mysqli->query("UPDATE modul SET aktif='N' WHERE id_modul='$_GET[id]'");
		header('location:'.$link);
	break;
}
?>