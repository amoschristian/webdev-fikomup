<?php
$folder_template = web_info('url') . '/' . folder_template();

$id = $_GET['id'];
$query = "SELECT * FROM artikel WHERE id_artikel = $id";

$result = $mysqli->query($query);

$detail_berita = $result->fetch_array(MYSQLI_ASSOC); //return array of data
$gambar = $detail_berita['gambar'];
$tanggal = $detail_berita['tanggal'];

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
</style>

<body>

	<div class="super_container">

		<!-- Header -->

		<?php include('template/header.php') ?>

		<!-- Home -->

		<div class="home" id="home">
			<?php include('template/particle.php'); ?>	
			<div class="home_content">
				<h1><?= $lang->t('Publications') ?></h1>
			</div>
		</div>

		<!-- News -->

		<div class="news">
			<div class="container">
				<div class="row">

					<!-- News Post Column -->

					<div class="col-lg-8">

						<div class="news_post_container">
							<!-- News Post -->
							<div class="news_post">
								<div class="news_post_image">
									<img src="<?= "/media/source/$gambar" ?>">
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
										<div class="news_post_meta">
											<!-- <span class="news_post_author"><a href="#">By Christian Smith</a></span>
											<span>|</span>
											<span class="news_post_comments"><a href="#">3 Comments</a></span> -->
										</div>
									</div>
								</div>

								<div class="news_post_text" style="text-indent: 30px;">
									<?= $isi ?>
								</div>

								<!-- <div class="news_post_quote">
									<p class="news_post_quote_text"><span>E</span>tiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies venena tis. Suspendisse fermentum sodales lacus, lacinia gravida elit.</p>
								</div> -->
							</div>

						</div>

						<!-- Comments -->


						<!-- Leave Comment -->
					</div>

					<!-- Sidebar Column -->

					<div class="col-lg-4">
						<div class="sidebar">

							<!-- Latest Posts -->

							<?php include("template/news_latest.php"); ?>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->

		<?php include('template/footer.php'); ?>

	</div>

	<?php include('template/meta_footer.php'); ?>

</body>

</html>