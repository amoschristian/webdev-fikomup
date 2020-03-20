<?php
$folder_template = web_info('url') . '/' . folder_template();
$limit = 10;

//prepare the data to be displayed
$query = "SELECT * FROM event ";
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
$detail_event = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
	$sentences = 2;
	$isi = $data['isi'];
	$judul = $data['judul'];
	if ($lang->language != $default_language) {
		$isi = ($data['isi_terjemahan'] ?: $isi);
		$judul = ($data['judul_terjemahan'] ?: $judul);
	}
	$text_pendek =  implode('. ', array_slice(explode('.', strip_tags($isi)), 0, $sentences)) . '.';

	$detail_event[$data['id_event']] = $data;
	$detail_event[$data['id_event']]['judul'] = $judul;
	$detail_event[$data['id_event']]['desc'] = $text_pendek;
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('template/meta_head.php'); ?>

<style>
	#home{
		background: linear-gradient(rgba(0, 0, 0, 0.719), rgba(0, 0, 0, 0.699)),
		url(/template/fikom/images/background/event.png);
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
				<h1><?= $lang->t('Events') ?></h1>
			</div>
		</div>

		<!-- News -->

		<div class="events page_section">
			<div class="container">

				<div class="event_items">


					<?php if ($detail_event) : ?>
						<?php foreach ($detail_event as $event) : ?>
							<!-- Event Item -->
							<div class="row event_item">
								<div class="col">
									<div class="row d-flex flex-row align-items-end">

										<div class="col-lg-2 order-lg-1 order-2">
											<div class="event_date d-flex flex-column align-items-center justify-content-center">
												<div class="event_day"><?= date('d', strtotime($event['tanggal'])) ?></div>
												<div class="event_month"><?= print_tanggal($event['tanggal'], "%b") ?></div>
												<div class="event_year"><?= date('Y', strtotime($event['tanggal'])) ?></div>
											</div>
										</div>

										<div class="col-lg-6 order-lg-2 order-3">
											<div class="event_content">
												<div class="event_name"><a class="trans_200" href="<?= "/event/id/{$event['id_event']}/{$event['judul_seo']}"; ?>"><?= $event['judul'] ?></a></div>
												<div class="event_location"><?= $event['lokasi'] ?></div>
												<p><?= $event['desc'] ?></p>
											</div>
										</div>

										<div class="col-lg-4 order-lg-3 order-1">
											<div class="event_image">
												<img src="<?= print_image($event['gambar']); ?>">
											</div>
										</div>

									</div>
								</div>
							</div>
						<?php endforeach; ?>

						<!-- Page Nav -->
						<div class="news_page_nav">
							<ul>
							<?php for ($i = 0; $i < $countPage; $i++) : ?>
								<li class="<?= ($i+1 == $halaman ? "active" : ""); ?> text-center trans_200"><a href="/event/<?= $i+1; ?>"><?=  sprintf("%02d", $i+1); ?></a></li>
							<?php endfor; ?>
							</ul>
						</div>

					<?php else : ?>
						<h3>Event not found</h3>
					<?php endif; ?>

				</div>

			</div>
		</div>

		<!-- Footer -->

		<?php include('template/footer.php'); ?>

	</div>

	<?php include('template/meta_footer.php'); ?>

</body>

</html>