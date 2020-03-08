<?php
$folder_template = web_info('url') . '/' . folder_template();
$limit = 10;

//prepare the data to be displayed
$query = "SELECT * FROM artikel ";
if (isset($_GET['tag'])) {
	$tag = $_GET['tag'];
	$query .= "WHERE tag LIKE '%$tag%' ";
}
$query .= "ORDER BY tanggal DESC";

$countResult = $mysqli->query($query);
$countPage = mysqli_num_rows($countResult);
$countPage = ceil($countPage / $limit);

$startOffset = ($halaman - 1) * $limit;

$query .= " LIMIT $startOffset,$limit";  //show 10 per page

$result = $mysqli->query($query);
$detail_berita = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
	$sentences = 2;
	$isi = $data['isi'];
	$judul = $data['judul'];
	if ($lang->language != $default_language) {
		$isi = ($data['isi_terjemahan'] ?: $isi);
		$judul = ($data['judul_terjemahan'] ?: $judul);
	}
	$text_pendek =  implode('. ', array_slice(explode('.', strip_tags($isi)), 0, $sentences)) . '.';

	$detail_berita[$data['id_artikel']] = $data;
	$detail_berita[$data['id_artikel']]['judul'] = $judul;
	$detail_berita[$data['id_artikel']]['desc'] = $text_pendek;
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('template/meta_head.php'); ?>

<link rel='stylesheet' type='text/css' href='<?= $folder_template . '/styles/news_custom.css' ?>'>

<body>

	<div class="super_container">

		<!-- Header -->

		<?php include('template/header.php') ?>

		<!-- Home -->

		<div class="home">
			<?php include('template/particle.php'); ?>
			<div class="home_content">
				<h1><?= $lang->t('Publications') ?></h1>
			</div>
		</div>

		<!-- News -->

		<div class="news">
			<div class="container">
				<div class="row">

					<!-- News Column -->

					<div class="col-lg-8">

						<div class="news_posts">

							<?php if ($detail_berita) : ?>
								<?php foreach ($detail_berita as $berita) : ?>
									<!-- News Post -->
									<div class="news_post">
										<div class="news_post_top d-flex flex-column flex-sm-row">
											<div class="news_post_date_container">
												<div class="col-lg-2 order-lg-1 order-2" style="padding-left:0">
													<div class="event_date d-flex flex-column align-items-center justify-content-center">
														<div class="event_day" style="font-size: 28px"><?= date('d', strtotime($berita['tanggal'])) ?></div>
														<div class="event_month" style="font-size: 14px"><?= print_tanggal($berita['tanggal'], "%b") ?></div>
													</div>
												</div>
											</div>
											<div class="news_post_title_container">
												<div class="news_post_title">
													<a href="<?= "/news/id/{$berita['id_artikel']}/{$berita['judul_seo']}"; ?>"><?= $berita['judul'] ?></a>
												</div>

											</div>
										</div>
										<div class="news_post_image">
											<img src="<?= "/media/source/" . $berita['gambar'] ?>">
										</div>
										<div class="news_post_text">
											<p><?= $berita['desc'] ?></p>
										</div>
										<div class="read-more-btn"><span><a href="<?= "/news/id/{$berita['id_artikel']}/{$berita['judul_seo']}"; ?>"><?= $lang->t('Read More') ?><i class="fas fa-arrow-right" style="margin-left:10px; color: transparent""></i></a></span></div>
									</div>
								<?php endforeach; ?>

								<!-- Page Nav -->
								<div class="news_page_nav">
									<ul>
								<?php for ($i = 0; $i < $countPage; $i++) : ?>
										<li class="<?= ($i+1 == $halaman ? "active" : ""); ?> text-center trans_200"><a href="/news/<?= $i+1; ?>"><?=  sprintf("%02d", $i+1); ?></a></li>
								<?php endfor; ?>
									</ul>
								</div>
							<?php else : ?>
								<h3>News not found</h3>
							<?php endif; ?>

						</div>

					</div>

					<!-- Sidebar Column -->
								
					<div class="col-lg-4">
						<div class="sidebar">

							<!-- Tags -->

							<?php include("template/tags.php"); ?>

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