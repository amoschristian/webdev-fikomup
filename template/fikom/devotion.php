<?php
$folder_template = web_info('url') . '/' . folder_template();
$limit = 10;
$tipePengabdian = 0;

//prepare the data to be displayed
$query = "SELECT * FROM ppm WHERE tipe = $tipePengabdian ";
if (isset($_GET['tag'])) {
	$tag = $_GET['tag'];
	$query .= "AND tag LIKE '%$tag%' ";
}
$query .= "ORDER BY tanggal DESC";

$result = $mysqli->query($query);
$countPage = mysqli_num_rows($result);
$countPage = ceil($countPage / $limit);

$startOffset = ($halaman - 1) * $limit;

$query .= " LIMIT $startOffset,$limit";  //show 10 per page

$detail_pengabdian = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
	$sentences = 2;
	$isi = $data['isi'];
	$judul = $data['judul'];
	if ($lang->language == $default_language) {
		$isi = ($data['isi_terjemahan'] ?: $isi);
		$judul = ($data['judul_terjemahan'] ?: $judul);
	}
	$text_pendek =  implode('. ', array_slice(explode('.', strip_tags($isi)), 0, $sentences)) . '.';

	$detail_pengabdian[$data['id']] = $data;
	$detail_pengabdian[$data['id']]['judul'] = $judul;
	$detail_pengabdian[$data['id']]['desc'] = $text_pendek;
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('template/meta_head.php'); ?>

<link rel='stylesheet' type='text/css' href='<?= $folder_template . '/styles/news_custom.css' ?>'>

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

		<?php include('template/header.php') ?>

		<div class="home" id="home">
			<?php include('template/particle.php'); ?>
			<div class="home_content">
				<h1><?= $lang->t('Devotion') ?></h1>
			</div>
		</div>

		<div class="news">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="news_posts">
							<?php if ($detail_pengabdian) : ?>
								<?php foreach ($detail_pengabdian as $berita) : ?>
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
													<a href="<?= "/devotion/id/{$berita['id']}/{$berita['judul_seo']}"; ?>"><?= $berita['judul'] ?></a>
												</div>

											</div>
										</div>
										<div class="news_post_image">
											<img src="<?= "/media/source/" . $berita['gambar'] ?>">
										</div>
										<div class="news_post_text">
											<p><?= $berita['desc'] ?></p>
										</div>
										<div class="read-more-btn"><span><a href="<?= "/devotion/id/{$berita['id']}/{$berita['judul_seo']}"; ?>"><?= $lang->t('Read More') ?><i class="fas fa-arrow-right" style="margin-left:10px; color: transparent""></i></a></span></div>
									</div>
								<?php endforeach; ?>

								<div class="news_page_nav">
									<ul>
								<?php for ($i = 0; $i < $countPage; $i++) : ?>
										<li class="<?= ($i+1 == $halaman ? "active" : ""); ?> text-center trans_200"><a href="/devotion/<?= $i+1; ?>"><?=  sprintf("%02d", $i+1); ?></a></li>
								<?php endfor; ?>
									</ul>
								</div>
							<?php else : ?>
								<h3><?= $lang->t('Devotion') ?> <?= $lang->t('not found') ?></h3>
							<?php endif; ?>

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