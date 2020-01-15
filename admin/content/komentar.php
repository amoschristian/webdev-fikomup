<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config.js"></script>

<?php
if(!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=komentar";
switch($show){

	//Menampilkan data
	default:
		echo '<h3 class="page-header"><b>Daftar Komentar</b></h3>';
			
		buka_tabel(array("Author", "Komentar", "Artikel"));
		$no = 1;
		$query = $mysqli->query("SELECT * FROM komentar ORDER BY id_komentar desc");
		while($data = $query->fetch_array()){
			$artikel = $mysqli->query("SELECT * FROM artikel where id_artikel='$data[id_artikel]'");
			$atk = $artikel->fetch_array();
			
			$tanggal = print_tanggal($data['tanggal']);
			if($data['dibaca'] == 'N'){
				$author = '<a href="mailto:'.$data['email'].'"><b>'.$data['nama'].'</b></a>';
				$komentar = '<small class="text-muted">'.$tanggal.'</small><br/><p><b>'.$data['komentar'].'</b></p>';
			}else{
				$author = '<a href="mailto:'.$data['email'].'">'.$data['nama'].'</a>';
				$komentar = '<small class="text-muted">'.$tanggal.'</small><br/><p>'.$data['komentar'].'</p>';
			}
			
			$artikel = '<a href="../artikel/'.$atk['id_artikel'].'/'.$atk['judul_seo'].'" target="blank">'.$atk['judul'].'</a>';
			
			isi_tabel($no, array($author, $komentar, $artikel), $link, $data['id_komentar']);
			$no++;
		} 
		tutup_tabel();
		
	break;
	
	//Menampilkan form edit data
	case "form":
			$mysqli->query("UPDATE komentar SET dibaca='Y' WHERE id_komentar='$_GET[id]'");
			$query 	= $mysqli->query("SELECT * FROM komentar WHERE id_komentar='$_GET[id]'");
			$data	= $query->fetch_array();
			$aksi 	= "Edit";
				
		echo'<h3 class="page-header"><b>'.$aksi.' Komentar</b> </h3>';	
		
		buka_form($link, $data['id_komentar'], strtolower($aksi));
			buat_textbox("Nama", "nama", $data['nama']);
			buat_textbox("Email", "email", $data['email']);
			buat_textarea("Isi Komentar", "komentar", $data['komentar'], "richtext");
		tutup_form($link);	
	break;	
	
	//Mengedit data di database
	case "action":
		$nama			= addslashes($_POST['nama']);
		$komentar		= addslashes($_POST['komentar']);
	
			$mysqli->query("UPDATE komentar SET
				nama 		= '$nama',
				email		= '$_POST[email]',
				komentar	= '$komentar',
				tanggal		= '$tanggal'
			WHERE id_komentar='$_POST[id]'");

		header('location:'.$link);
	break;
	
	//Menghapus data di database
	case "delete":
		$mysqli->query("DELETE FROM komentar WHERE id_komentar='$_GET[id]'");
		header('location:'.$link);
	break;
}
?>