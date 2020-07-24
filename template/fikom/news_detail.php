<?php
$folder_template = web_info('url') . '/' . folder_template();

$id = $_GET['id'];
$query = "SELECT * FROM artikel WHERE id_artikel = $id";

$result = $mysqli->query($query);

$detail_berita = $result->fetch_array(MYSQLI_ASSOC); //return array of data
$gambar = $detail_berita['gambar'];
$tanggal = $detail_berita['created_at'];

$judul = $detail_berita['judul'];
$isi = $detail_berita['isi'];

if ($lang->language == $default_language) {
	$judul = ($detail_berita['judul_terjemahan'] ?: $judul);
	$isi = ($detail_berita['isi_terjemahan'] ?: $isi);
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('template/meta_head.php'); ?>

<style>
	#home{
		background: linear-gradient(rgba(0, 0, 0, 0.719), rgba(0, 0, 0, 0.699)),
		url(/template/fikom/images/background/news.jpg);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: right;
	}

	.news_post_text a {
        display: inline;
        position: relative;
        color: inherit;
        border-bottom: solid 1px #ff4200;
        color:#a5a5a5;
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease;
    }

    .news_post_text a:hover {
        text-decoration: none;
        -webkit-font-smoothing: antialiased;
        -webkit-text-shadow: rgba(0, 0, 0, 0.01) 0 0 1px;
        text-shadow: rgba(0, 0, 0, 0.01) 0 0 1px;
        color: #ffffff;
        background: #ffa07f;
    }

    .news_post_text a:hover::after {
      opacity: 0.2;
	}
	
	.news_post_text ul {
		list-style: disc;
	}
</style>

<body>

	<div class="super_container">

		<?php include('template/header.php') ?>

		<div class="home" id="home">
			<?php include('template/particle.php'); ?>	
			<div class="home_content">
				<h1><?= $lang->t('News') ?></h1>
			</div>
		</div>

		<div class="news">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="news_post_container">
							<div class="news_post">
								<div class="news_post_image">
									<img src="<?= print_image($gambar); ?>">
								</div>
								<div class="news_post_top d-flex flex-column flex-sm-row">
									<div class="news_post_date_container">
										<div class="news_post_date d-flex flex-column align-items-center justify-content-center">
											<div><?= date('d', strtotime($tanggal)) ?></div>
											<div><?= print_tanggal($tanggal, "%b") ?></div>
										</div>
									</div>
									<div class="news_post_title_container">
										<div class="news_post_title">
											<a href="#"><?= $judul ?></a>
										</div>
									</div>
								</div>

								<div class="news_post_text">
									<?= $isi ?>
								</div>
							</div>

						</div>
					</div>
					<div class="col-lg-4">
						<div class="sidebar">
							<?php include("template/news_latest.php"); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include('template/footer.php'); ?>
	</div>

	<?php include('template/meta_footer.php'); ?>

</body>

</html>