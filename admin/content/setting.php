<?php
if(!defined("INDEX")) header('location: ../index.php');
if($_SESSION['leveluser']!="admin") header('location: index.php');
		
$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=setting";
switch($show){

	//Menampilkan data
	default:
		echo'<h4 class="page-header"><b> Setting Website </b> </h4>';	
		function dapatkan_nilai($parameter){
			global $mysqli;
			$query 	= $mysqli->query("SELECT * FROM setting WHERE parameter='$parameter'");
			$data	= $query->fetch_array();
			return $data['nilai'];
		}
		buka_form($link, "", "");
			buat_textbox("Judul Website", "judul", dapatkan_nilai("judul"));
			buat_textbox("Deskripsi", "deskripsi", dapatkan_nilai("deskripsi"), 8);
			buat_textbox("URL Website", "url", dapatkan_nilai("url"));
			buat_textbox("Folder Website", "folder", dapatkan_nilai("folder"));
			buat_imagepicker("Ikon Website", "ikon", dapatkan_nilai("ikon"));
			buat_textarea("Keyword", "keyword", dapatkan_nilai("keyword"));
			
			$list = array();
			$list[] =  array("val"=>0, "cap"=>"Artikel Terbaru");
			$query = $mysqli->query("SELECT * FROM halaman");
			while($data=$query->fetch_array()){
				$list[] = array("val"=>$data['id_halaman'], "cap"=>$data['judul']);
			}
			buat_combobox("Homepage", "homepage", $list, dapatkan_nilai("homepage"));
		tutup_form($link);	
		
	break;
	
	//Menyisipkan atau mengedit data di database
	case "action":	
		$parameter = array("judul", "deskripsi", "url", "folder", "ikon", "keyword", "homepage");
		foreach($parameter as $param){
			$mysqli->query("UPDATE setting SET nilai='$_POST[$param]' WHERE parameter='$param'");
		}
		header('location:'.$link);
	break;

}
?>