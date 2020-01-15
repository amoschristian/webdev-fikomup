<?php template_header(); ?>

<section class="container">
	<div class="row">
		<div class="col-md-8 main">
		
<?php
$template_artikel = 
'<div class="row artikel">
	<div class="col-md-4">
		<img src="{gambar}">
	</div>
	<div class="col-md-8">
		<h3 class="judul"><a href="{link}">{judul}</a></h3>
		<small class="text-muted">{meta}</small>
		<div class="konten-artikel">{konten} ... <a href="{link}">More>></a></div>
	</div>
</div><hr>';
template_kategori($template_artikel);
?>

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
	