<?php
if(!defined("INDEX")) header('location: ../index.php');
if($_SESSION['leveluser']!="admin") header('location: index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=tag";
switch($show){

	//Menampilkan data
	default:
		echo '<h3 class="page-header"><b>Daftar Tag</b>
				<a href="'.$link.'&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';
		
		buka_tabel(array("Tag"));
		$no = 1;
		$query = $mysqli->query("SELECT * FROM tag ORDER BY id_tag");
		while($data = $query->fetch_array()){
			isi_tabel($no, array($data['tag']), $link, $data['id_tag']);
			$no++;
		} 
		tutup_tabel();
		
	break;
	
	//Menampilkan form input dan edit data
	case "form":
		if(isset($_GET['id'])){
			$query = $mysqli->query("SELECT * FROM tag WHERE id_tag='$_GET[id]'");
			$data = $query->fetch_array();
			$aksi = "Edit";
		}else{
			$data = array("id_tag"=>"", "tag"=>"");
			$aksi = "Tambah";
		}
		
		echo'<h3 class="page-header"><b>'.$aksi.' Tag</b> </h3>';	
		
		buka_form($link, $data['id_tag'], strtolower($aksi));
			buat_textbox("Nama Tag", "tag", $data['tag']);
		tutup_form($link);	
	break;	
	
	//Menyisipkan atau mengedit data di database
	case "action":
		$tag_seo = convert_seo($_POST['tag']);
		if($_POST['aksi'] == "tambah"){
			$mysqli->query("INSERT INTO tag SET
				tag = '$_POST[tag]',
				tag_seo = '$tag_seo'
			");
		}elseif($_POST['aksi'] == "edit"){
			$mysqli->query("UPDATE tag SET
				tag = '$_POST[tag]',
				tag_seo = '$tag_seo'
			WHERE id_tag='$_POST[id]'");
		}
		header('location:'.$link);
	break;
	
	//Menghapus data di database
	case "delete":
		$mysqli->query("DELETE FROM tag WHERE id_tag='$_GET[id]'");
		header('location:'.$link);
	break;
}
?>