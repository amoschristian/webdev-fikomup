<?php
$folder_template = web_info('url') . '/' . folder_template();

$id = $_GET['id'];
$query = "SELECT * FROM ppm WHERE id = $id";

$result = $mysqli->query($query);

$detail_pengabdian = $result->fetch_array(MYSQLI_ASSOC); //return array of data
$gambar = $detail_pengabdian['gambar'];
$tanggal = $detail_pengabdian['created_at'];

$judul = $detail_pengabdian['judul'];
$isi = $detail_pengabdian['isi'];

if ($lang->language == $default_language) {
	$judul = ($detail_pengabdian['judul_terjemahan'] ?: $judul);
	$isi = ($detail_pengabdian['isi_terjemahan'] ?: $isi);
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

		<!-- Header -->

		<?php include('template/header.php') ?>

		<!-- Home -->

		<div class="home" id="home">
			<?php include('template/particle.php'); ?>	
			<div class="home_content">
				<h1><?= $lang->t('Devotion') ?></h1>
			</div>
		</div>

		<!-- News -->

		<div class="news">
			<div class="container">
				<div class="row">

					<!-- News Post Column -->

					<div class="col-lg-12">

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

								<div class="news_post_text">
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
				</div>
			</div>
		</div>

		<!-- Footer -->

		<?php include('template/footer.php'); ?>

	</div>

	<?php include('template/meta_footer.php'); ?>

</body>

</html>