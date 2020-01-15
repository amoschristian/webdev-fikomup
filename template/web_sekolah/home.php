<?php template_header(); ?>

<section id="slideshow" class="hidden-xs">
	<div  class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="carousel" class="carousel slide">
					<div class="carousel-inner">
<?php
	$folder_template = web_info('url').'/'.folder_template();
	for($i=1; $i<=3; $i++){
		echo '<div class="item';
		if($i==1) echo ' active';
		echo '">
				<img src="'.$folder_template.'/images/'.$i.'.jpg" width="100%">
			</div>';
	}
?>		
					</div>
					
					<a class="left carousel-control" href="#carousel"  data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section><br>

<section class="container content">
	<div class="row">
		<div class="col-md-8 main">
		
<?php
if(web_info('homepage')==0){
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
	template_artikel($template_artikel, 5, 400);
}else{
	$template_halaman = 
	'<h3 class="page-header">{judul}</h3>
	 {gambar}<br><br>
	 <div class="konten-halaman">{konten}</div>';
	template_halaman($template_halaman, web_info('homepage'));
}
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
	