<?php
if(!defined("INDEX")) header('location: index.php');
//Membuat fungsi buat_tombol
function buat_tombol($name, $icon, $link, $warna, $label){
	global $mysqli;
	$query = $mysqli->query("select * from $name");
	$jml_data = $query->num_rows;
	echo'<div class="col-md-4 col-xs-6"><a href="'.$link.'">
			<div class="panel panel-'.$warna.' dashboard-panel">
				<div class="panel-heading">
					<i class="glyphicon glyphicon-'.$icon.'"></i>
					<span class="pull-right">'.$jml_data.'</span>					
				</div>
				<div class="panel-body">'.$label.'</div>
			</div>
		</a></div>';
}

?>
<br>
<div class="row">
<?php
	//Memanggil fungsi buat_tombol untuk membuat 4 tombol
	buat_tombol("artikel", "list-alt", "?content=berita", "danger", "berita");
	buat_tombol("event", "list-alt", "?content=event", "success", "acara");
	buat_tombol("lecturer", "list-alt", "?content=lecturer", "info", "dosen");
?>
</div>


<div class="row">
	<div class="col-md-12">
<?php
	//Membuat fungsi dapatkan_nilai untuk membaca pengaturan website
	function dapatkan_nilai($parameter){
		global $mysqli;
		$query 	= $mysqli->query("SELECT * FROM setting WHERE parameter='$parameter'");
		$data	= $query->fetch_array();
		return $data['nilai'];
	}
	
	//Menentukan tampilan homepage sesuai angka pada parameter homepage
	$homepage = dapatkan_nilai("homepage");
	if($homepage == 0){
		$str_homepage = "Artikel Terbaru";
	}else{
		$queryhal = $mysqli->query("SELECT * FROM halaman WHERE id_halaman='$homepage'");
		$datahal = $queryhal->fetch_array();
		$str_homepage = $datahal['judul'];
	}
	
	//Menampilkan pengaturan website pada tabel
?>
	<table class="table table-striped">
		<thead><tr><th colspan="2"><h3><b>Identitas Website</b></h3></th></tr></thead>
		<tbody>
		<tr><td><b>Judul Website</b></td>	<td>: <?=  dapatkan_nilai("judul"); ?></td></tr>
		<tr><td><b>URL Website</b></td>		<td>: <?=  dapatkan_nilai("url"); ?></td></tr>
		<tr><td><b>Folder</b></td>			<td>: <?=  dapatkan_nilai("folder"); ?></td></tr>
		<tr><td><b>Ikon</b></td>			<td>: <img src="../media/thumbs/<?=  dapatkan_nilai("ikon"); ?>" width="60"></td></tr>
		<tr><td><b>Keyword</b></td>			<td>: <?=  dapatkan_nilai("keyword"); ?></td></tr>
		<tr><td><b>Homepage</b></td>		<td>: <?=  $str_homepage; ?></td></tr>
		</tbody>
	</table>

	</div>
</div>