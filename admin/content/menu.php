<script type="text/javascript" src="js/menu.js"></script>
<?php
if(!defined("INDEX")) header('location: ../index.php');
if($_SESSION['leveluser']!="admin") header('location: index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=menu";
switch($show){

	//Menampilkan data
	default:
		
		$kategori = isset($_REQUEST['kategori']) ? $_REQUEST['kategori'] : "main";
		echo '<h3 class="page-header"><b>Daftar Menu</b>
				<a href="'.$link.'&show=form&kategori='.$kategori.'" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah 
				</a>
			</h3>';
		
		//Membuat tab kategori menu
		echo'<nav class="nav nav-tabs" style="margin-bottom: 20px">';
				$list = array();
				$list[] = array("val"=>"main", "cap"=>"Main Menu");
				$list[] = array("val"=>"secondary", "cap"=>"Secondary Menu");
				
				$menu = $mysqli->query("SELECT * FROM widget WHERE tipe='menu'");
				while($mn = $menu->fetch_array()){
					$list[] = array("val"=>$mn['id_widget'], "cap"=>$mn['judul']);
				}
								
				foreach($list as $ls){
					$class = $ls['val']==$kategori ? 'class="active"' : '';
					echo'<li '.$class.'><a href="'.$link.'&kategori='.$ls['val'].'">'.$ls['cap'].'</a></li>';
				}	
		echo'</nav>';	
		
		//Membuat fungsi tampil link
		function tampil_link($data){
			global $mysqli;
			if($data['jenis_link']=="kategori"){
				$kategori = $mysqli->query("select * from kategori where id_kategori='$data[link]'");
				$kat = $kategori->fetch_array();
				$tampil_link = "Kategori: $kat[kategori]";
			}elseif($data['jenis_link']=="halaman"){
				$halaman = $mysqli->query("select * from halaman where id_halaman='$data[link]'");
				$hal = $halaman->fetch_array();
				$tampil_link = "Halaman: $hal[judul]";
			}else{
				$tampil_link = "URL: $data[link]";
			}
			return $tampil_link;
		}
		
		buka_tabel(array("Judul", "Link", "Urutan"));
		$no = 1;
		if(isset($_REQUEST['kategori'])) $query = $mysqli->query("SELECT * FROM menu WHERE induk='0' and kategori_menu='$_REQUEST[kategori]' ORDER BY urut");
		else $query = $mysqli->query("SELECT * FROM menu WHERE induk='0' and kategori_menu='main' ORDER BY urut");
		
		while($data = $query->fetch_array()){
			isi_tabel($no, array($data['judul'], tampil_link($data), $data['urut']), $link, $data['id_menu']);
						
			$sub = $mysqli->query("SELECT * FROM menu WHERE induk='$data[id_menu]' ORDER BY urut");
			while($datasub = $sub->fetch_array()){
				isi_tabel($no, array("--- ".$datasub['judul'], tampil_link($datasub), $datasub['urut']), $link, $datasub['id_menu']);
				$no++;
			}
			$no++;
		} 
		tutup_tabel();
		
	break;
	
	//Menampilkan form input dan edit data
	case "form":
		if(isset($_GET['id'])){
			$query 	= $mysqli->query("SELECT * FROM menu WHERE id_menu='$_GET[id]'");
			$data	= $query->fetch_array();
			$aksi 	= "Edit";
			$kategori_menu = $data['kategori_menu'];
		}else{
			$data = array("id_menu"=>"", "judul"=>"", "induk"=>"", "jenis_link"=>"", "link"=>"", "urut"=>"");
			$aksi 	= "Tambah";
			$kategori_menu = $_GET['kategori'];
		}
		
		echo'<h4 class="page-header"><b>'.$aksi.' Menu</b> </h4>';	
		
		buka_form($link.'&kategori='.$kategori_menu, $data['id_menu'], strtolower($aksi));
			buat_textbox("Judul Menu", "judul", $data['judul']);
			
			$menu = $mysqli->query("SELECT * FROM menu WHERE induk='0' and kategori_menu='$kategori_menu'");
			$list = array();
			$list[] = array('val'=>'', 'cap'=>'Tidak Ada');
			while($mn = $menu->fetch_array()){
				$list[] = array('val'=>$mn['id_menu'], 'cap'=>$mn['judul']);
			}
			buat_combobox("Induk Menu", "induk", $list, $data['induk']);	
			
			$list = array();
			$list[] = array("val"=>"halaman", "cap"=>"Halaman");
			$list[] = array("val"=>"kategori", "cap"=>"Kategori");
			$list[] = array("val"=>"url", "cap"=>"URL");
			buat_combobox("Jenis Link", "jenis_link", $list, $data['jenis_link']);
			
			$list = array();
			$halaman = $mysqli->query("SELECT * FROM halaman");
			while($hal = $halaman->fetch_array()){
				$list[] = array("val"=>$hal['id_halaman'], "cap"=>$hal['judul']);
			}
			buat_combobox("Link Halaman", "link_halaman", $list, $data['link']);
			
			$list = array();
			$kategori = $mysqli->query("SELECT * FROM kategori");
			while($kat = $kategori->fetch_array()){
				$list[] = array("val"=>$kat['id_kategori'], "cap"=>$kat['kategori']);
			}
			buat_combobox("Link Kategori", "link_kategori", $list, $data['link']);
			
			buat_textbox("Link URL", "link_url", $data['link']);
			
			$list = array();
			for($i=1; $i<=20; $i++){
				$list[] = array("val"=>$i, "cap"=>$i);
			}
			buat_combobox("Urutan", "urut", $list, $data['urut'], 1);
			
		tutup_form($link.'&kategori='.$kategori_menu);	
	break;	
	
	//Menyisipkan atau mengedit data di database
	case "action":
		if($_POST['jenis_link']=="halaman") $datalink = $_POST['link_halaman'];
		elseif($_POST['jenis_link']=="kategori") $datalink = $_POST['link_kategori'];
		else $datalink = $_POST['link_url'];
		
		if($_POST['aksi'] == "tambah"){
			$mysqli->query("INSERT INTO menu SET
				judul 		  = '$_POST[judul]',				
				induk 		  = '$_POST[induk]',				
				kategori_menu = '$_GET[kategori]',				
				jenis_link    = '$_POST[jenis_link]',				
				link	 	  = '$datalink',				
				urut	 	  = '$_POST[urut]'				
			");
		}elseif($_POST['aksi'] == "edit"){
			$mysqli->query("UPDATE menu SET
				judul 		  = '$_POST[judul]',				
				induk 		  = '$_POST[induk]',				
				kategori_menu = '$_GET[kategori]',				
				jenis_link    = '$_POST[jenis_link]',				
				link	 	  = '$datalink',				
				urut	 	  = '$_POST[urut]'	
			WHERE id_menu='$_POST[id]'");
		}
		header('location:'.$link.'&kategori='.$_GET['kategori']);
	break;
	
	//Menghapus data di database
	case "delete":
		$query 	= $mysqli->query("SELECT * FROM menu WHERE id_menu='$_GET[id]'");
		$data	= $query->fetch_array();
		$mysqli->query("DELETE FROM menu WHERE id_menu='$_GET[id]'");
		header('location:'.$link.'&kategori='.$data['kategori_menu']);
	break;
}
?>