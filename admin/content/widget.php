<script type="text/javascript" src="js/widget.js"></script>
<?php
if(!defined("INDEX")) header('location: ../index.php');
if($_SESSION['leveluser']!="admin") header('location: index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=widget";
switch($show){

	//Menampilkan data
	default:
		echo '<h3 class="page-header"><b>Daftar Widget</b>
				<a href="'.$link.'&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';
		
		buka_tabel(array("Judul", "Tipe",  "Posisi", "Urut", "Aktif"));
		$no = 1;		
		$query = $mysqli->query("SELECT * FROM widget ORDER BY posisi,aktif,urut");	
		while($data = $query->fetch_array()){
			if($data['aktif']=='Y') $aktif = '<a href="'.$link.'&show=deactivate&id='.$data['id_widget'].'" style="color: green"><i class="glyphicon glyphicon-ok-circle"></i></a>';
			else $aktif = '<a href="'.$link.'&show=activate&id='.$data['id_widget'].'" style="color: red"><i class="glyphicon glyphicon-remove-circle"></i></a>';
			
			isi_tabel($no, array($data['judul'], $data['tipe'], $data['posisi'], $data['urut'], $aktif), $link, $data['id_widget']);
			$no++;
		} 
		tutup_tabel();
	break;
	
	//Menampilkan form input dan edit data
	case "form":
		if(isset($_GET['id'])){
			$query 	= $mysqli->query("SELECT * FROM widget WHERE id_widget='$_GET[id]'");
			$data	= $query->fetch_array();
			$aksi 	= "Edit";
		}else{
			$data = array("id_widget"=>"", "judul"=>"", "tipe"=>"", "posisi"=>"", "konten"=>"", "urut"=>"");
			$aksi 	= "Tambah";
		}
		
		echo'<h3 class="page-header"><b>'.$aksi.' Widget</b> </h3>';	
		
		buka_form($link, $data['id_widget'], strtolower($aksi));
			buat_textbox("Judul", "judul", $data['judul']);
			
			$list = array();
			$list[] = array("val"=>"terbaru", "cap"=>"Artikel Terbaru");
			$list[] = array("val"=>"populer", "cap"=>"Artikel Populer");
			$list[] = array("val"=>"kategori", "cap"=>"Kategori Artikel");
			$list[] = array("val"=>"modul", "cap"=>"Modul");
			$list[] = array("val"=>"menu", "cap"=>"Menu");
			$list[] = array("val"=>"skrip", "cap"=>"Skrip");
			buat_combobox("Tipe widget", "tipe", $list, $data['tipe']);
			
			$list = array();
			$widget = $mysqli->query("SELECT * FROM modul where widget='Y' AND aktif='Y'");
			while($sd = $widget->fetch_array()){
				$list[] = array("val"=>$sd['id_modul'], "cap"=>$sd['judul']);
			}
			buat_combobox("Modul Konten", "modul", $list, $data['konten']);
			
			buat_textarea("Skrip Konten", "skrip", $data['konten']);
			
			$list = array();
			for($i=1; $i<=10; $i++){
				$list[] = array("val"=>$i, "cap"=>$i);
			}
			buat_combobox("Posisi", "posisi", $list, $data['posisi'], 1);
			
			$list = array();
			for($i=1; $i<=20; $i++){
				$list[] = array("val"=>$i, "cap"=>$i);
			}
			buat_combobox("Urutan", "urut", $list, $data['urut'], 1);
		tutup_form($link);	
	break;	
	
	//Menyisipkan atau mengedit data di database
	case "action":
		if($_POST['tipe']=="modul") $konten = $_POST['modul'];
		elseif($_POST['tipe']=="skrip") $konten = addslashes($_POST['skrip']);
		else $konten = "";
		
		if($_POST['aksi'] == "tambah"){
			$mysqli->query("INSERT INTO widget SET
				judul 		  = '$_POST[judul]',				
				tipe 		  = '$_POST[tipe]',				
				konten		  = '$konten',				
				posisi		  = '$_POST[posisi]',					
				urut	 	  = '$_POST[urut]'				
			");
		}elseif($_POST['aksi'] == "edit"){
			$mysqli->query("UPDATE widget SET
				judul 		  = '$_POST[judul]',				
				tipe 		  = '$_POST[tipe]',				
				konten		  = '$konten',				
				posisi		  = '$_POST[posisi]',					
				urut	 	  = '$_POST[urut]'		
			WHERE id_widget='$_POST[id]'");
		}
		header('location:'.$link);
	break;
	
	//Menghapus data di database
	case "delete":
		$mysqli->query("DELETE FROM widget WHERE id_widget='$_GET[id]'");
		header('location:'.$link);
	break;
	
	//Mengaktifkan data
	case "activate":			
		$mysqli->query("UPDATE widget SET aktif='Y' WHERE id_widget='$_GET[id]'");
		header('location:'.$link);
	break;
	
	//Menonaktifkan data
	case "deactivate":
		$mysqli->query("UPDATE widget SET aktif='N' WHERE id_widget='$_GET[id]'");
		header('location:'.$link);
	break;
}
?>