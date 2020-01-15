<?php
	$folder = web_info('url').'/'.$_FOLDER_MODUL;
?>
<link rel="stylesheet" type="text/css" href="<?= $folder; ?>/lightbox/css/jquery.lightbox-0.5.css">
<script type="text/javascript" src="<?= $folder; ?>/lightbox/js/jquery.lightbox-0.5.min.js"></script>
<script type="text/javascript">
	$(function(){
		$('#galeri a').lightBox({
			imageLoading:	'<?= $folder; ?>/lightbox/images/lightbox-ico-loading.gif',	
			imageBtnPrev:	'<?= $folder; ?>/lightbox/images/lightbox-btn-prev.gif',	
			imageBtnNext:	'<?= $folder; ?>/lightbox/images/lightbox-btn-next.gif',	
			imageBtnClose:	'<?= $folder; ?>/lightbox/images/lightbox-btn-close.gif',
			imageBlank:		'<?= $folder; ?>/lightbox/images/lightbox-blank.gif'
		});
	});
</script>

<?php
$batas = 10;
$hal 	= isset($_GET['hal']) ? $_GET['hal'] : 1;
$posisi = isset($_GET['hal']) ? ($hal-1) * $batas : 0;
	
$qgaleri = $mysqli->query("SELECT * FROM md_galeri_foto ORDER BY id_galeri DESC LIMIT $posisi,$batas");
$no = 1;

echo '<div id="galeri"><div class="row">';
while($rgaleri = $qgaleri->fetch_array()){
	$gambar_kecil = web_info('url')."/media/thumbs/".$rgaleri['gambar'];
	$gambar_besar = web_info('url')."/media/source/".$rgaleri['gambar'];
	echo '<div class="col-md-3 col-xs-6 text-center">
		<a href="'.$gambar_besar.'">
		<img src="'.$gambar_kecil.'" class="thumbnail">'.$rgaleri['judul'].'
		</a>
		</div>';
	if($no%4==0) echo '</div><br><div class="row">';
	$no++;
}

echo '</div></div><br>';
 
$qgaleri = $mysqli->query("SELECT * FROM md_galeri_foto");
$jmldata = $qgaleri->num_rows;
echo buat_paging("hal/$_GET[id]/1","/galeri_foto", $batas, $jmldata, $hal);
?>