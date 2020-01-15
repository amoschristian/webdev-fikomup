<?php template_header(); ?>

<section class="container">
	<div class="row">
		<div class="col-md-8 main">
		<h1>Halaman Tidak Ditemukan</h1>
		<p>Halaman yang Anda cari tidak ditemukan. Silahkan cari artikel yang Anda inginkan pada form berikut!</p>

<?php form_pencarian(); ?>

		</div>
		<div class="col-md-4 sidebar">
			<div class="widget">
<?php 
$judul = '<h4 class="judul">{judul}</h4>';
$awal_konten = '<div class="konten">';
$akhir_konten = '</div>';
template_widget($judul, $awal_konten, $akhir_konten); 
?>
			</div>
		</div>
	</div>
</section>
<?php template_footer(); ?>
	