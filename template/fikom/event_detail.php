<?php
$folder_template = web_info('url') . '/' . folder_template();

$id = $_GET['id'];
$query = "SELECT * FROM event WHERE id_event = $id";

$result = $mysqli->query($query);

$detail_event = $result->fetch_array(MYSQLI_ASSOC); //return array of data
$judul = $detail_event['judul'];
$gambar = $detail_event['gambar'];
$tanggal = $detail_event['tanggal'];
$isi = $detail_event['isi'];
$lokasi = $detail_event['lokasi'];

if ($lang->language != $default_language) {
	$judul = ($detail_event['judul_terjemahan'] ?: $judul);
	$isi = ($detail_event['isi_terjemahan'] ?: $isi);
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('template/meta_head.php'); ?>

<style>
	.news_post_meta {
		font-size: 20px;
		align-self: flex-end;
	}

	.news_post_title_container {
		display: flex;
		justify-content: space-between;
		flex-direction: column;
	}

	.event_date {
		margin-bottom: 0px;
	}

	.news_post_top {
		padding-bottom: 50px;
	}
</style>

<body>

	<div class="super_container">

		<!-- Header -->

		<?php include('template/header.php') ?>

		<!-- Home -->

		<div class="home">
			<?php include('template/particle.php'); ?>	
			<div class="home_content">
				<h1><?= $lang->t('Events') ?></h1>
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
									<img src="<?= print_image($gambar); ?>">
								</div>
								<div class="news_post_top d-flex flex-column flex-sm-row">
									<div class="news_post_date_container">
										<div class="event_date d-flex flex-column align-items-center justify-content-center">
											<div class="event_day"><?= date('d', strtotime($tanggal)) ?></div>
											<div class="event_month"><?= print_tanggal($tanggal, "%b") ?></div>
											<div class="event_year"><?= date('Y', strtotime($tanggal)) ?></div>
										</div>
									</div>
									<div class="news_post_title_container">
										<div class="news_post_title">
											<a href="#"><?= $judul ?></a>
										</div>
										<div class="news_post_meta">
											<i><?= $lang->t('Located At')?> <?= $lokasi ?></i>
										</div>
									</div>
								</div>

								<div class="news_post_text" style="text-indent: 30px; margin-top: 0px; margin-bottom:50px;">
									<?= $isi ?>
								</div>						
							</div>

						</div>
					</div>

					<!-- Sidebar Column -->

					<div class="col-lg-4">
						<div class="sidebar">
						
							<!-- Latest Posts -->

							<?php include("template/event_latest.php"); ?>

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