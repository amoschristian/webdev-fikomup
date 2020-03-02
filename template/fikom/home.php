<?php
$folder_template = web_info('url') . '/' . folder_template();

//prepare the data to be display news
$query = "SELECT * FROM artikel ";
if (isset($_GET['tag'])) {
	$tag = $_GET['tag'];
	$query .= "WHERE tag LIKE '%$tag%' ";
}
$query .= "ORDER BY tanggal DESC LIMIT 3"; //show 10 per page

$result = $mysqli->query($query);
$detail_berita = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
	$sentences = 1;
	$text_pendek =  implode('. ', array_slice(explode('.', strip_tags($data['isi'])), 0, $sentences)) . '.';

	$detail_berita[$data['id_artikel']] = $data;
	$detail_berita[$data['id_artikel']]['desc'] = $text_pendek;
}

$berita_pertama = reset($detail_berita); //use for headline
$detail_berita_headline = $detail_berita;
unset($detail_berita_headline[$berita_pertama['id_artikel']]);

//prepare the data to be display event
$query = "SELECT * FROM event ";
if (isset($_GET['tag'])) {
	$tag = $_GET['tag'];
	$query .= "WHERE tag LIKE '%$tag%' ";
}
$query .= "ORDER BY tanggal DESC LIMIT 3"; //show 10 per page

$result = $mysqli->query($query);
$detail_event = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
	$sentences = 2;
	$text_pendek =  implode('. ', array_slice(explode('.', strip_tags($data['isi'])), 0, $sentences)) . '.';

	$detail_event[$data['id_event']] = $data;
	$detail_event[$data['id_event']]['desc'] = $text_pendek;
}

$json_config = $folder_template . "/plugins/particlesjs/assets/config.json";
?>

<!DOCTYPE html>
<html lang="en">


<?php
include('template/meta_head.php');
?>

<link rel='stylesheet' type='text/css' href='<?= $folder_template . '/styles/home_custom.css' ?>'>

<style>
	.headline {
		background: url(<?= "/media/source/" . $berita_pertama['gambar'] ?>);
		background-position: center center;
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>

</script

<body>

	<div class="super_container">

		<!-- Header -->

		<?php include('template/header.php'); ?>

		<!-- Home -->

		<div class="home" id="home">
			<!-- Hero Slider -->
			<div class="hero_slider_container">
				<!-- Hero Slide -->
				<div class="hero_slide">
				<?php include('template/particle.php'); ?>			
					<div class="welcome">Welcome to <strong style="color: #FF4F00;">FIKom UP</strong></div>
					<?php include('template/arbor.php'); ?>	
					<!-- <div class="learn">Get More Informations</div> -->
				</div>
			</div>
		</div>	

		<!-- Headline -->
		<div class="popular page_section" id="headline">
			<div class="container">
				<!-- <div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>Headline</h1>
						</div>
					</div>
				</div> -->
				<!-- Headling -->
				<div class="col-sm-12" style="margin-top:20px">
					<div class="col-sm-8" style="padding:0">
						<div class="card mb-3">
							<div class="row no-gutters headline">
								<div class="col-md-6">
									<div class="card-body-hd">
										<div class="card-title"><a href="<?= "/news/id/{$berita_pertama['id_artikel']}/{$berita_pertama['judul_seo']}"; ?>"><?= $berita_pertama['judul']; ?></a></div>
										<p class="card-text"><?= $berita_pertama['desc'] ?></p>
										<div class="read-more-btn"><span><a href="<?= "/news/id/{$berita_pertama['id_artikel']}/{$berita_pertama['judul_seo']}"; ?>">Read More<i class="fas fa-arrow-right" style="margin-left:10px; color: transparent"></i></a></span></div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Social Media Feed -->
					<div class="col-sm-4 text-left" style="padding-left: 20px">
						<div class="ig-feed">
							<h1><img src="https://cdn.discordapp.com/attachments/658904235609686033/682249668998070365/PngItem_323894.png" width="30px"></img><a href="https://www.instagram.com/fikomup" target="_blank" class="ig-link"> fikomup</a></h1>
							<div class="ig-feed-box" id="instafeed">
								<script src="https://cdnjs.cloudflare.com/ajax/libs/instafeed.js/1.4.1/instafeed.min.js"></script>
								<script src="https://matthewelsom.com/assets/js/libs/instafeed.min.js"></script>
								<script>
									var userFeed = new Instafeed({
										target: 'instafeed',
										get: 'user',
										userId: '8987997106',
										clientId: '924f677fa3854436947ab4372ffa688d',
										accessToken: '8987997106.924f677.8555ecbd52584f41b9b22ec1a16dafb9',
										resolution: 'thumbnail',
										template: '<a href="{{link}}" target="_blank" id="{{id}}"><img src="{{image}}" /></a>',
										sortBy: 'most-recent',
										limit: 8,
										links: false
									});
									userFeed.run();
								</script>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-12">
					<div class="row course_boxes">
						<?php if ($detail_berita) : ?>
							<?php foreach ($detail_berita as $idx => $berita) : ?>
								<!-- news -->
								<div class="col-lg-4 course_box">
									<div class="card">
										<img class="card-img-top" src="<?= "/media/source/" . $berita['gambar'] ?>" alt="#">
										<div class="card-body">
											<div class="card-title"><a href="<?= "/news/id/{$berita['id_artikel']}/{$berita['judul_seo']}"; ?>"><?= $berita['judul']; ?></a></div>
											<div class="card-text"><?= $berita['desc'] ?></div>
											<div class="price_box d-flex flex-row">
												<div class="read-more-btn"><span><a href="<?= "/news/id/{$berita['id_artikel']}/{$berita['judul_seo']}"; ?>">Read More<i class="fas fa-arrow-right" style="margin-left:10px; "></i></a></span></div>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						<?php else : ?>
							<h3>News not found</h3>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<!-- Register -->

		<div class="register page_section" id="about_us" style="padding: 0">
			<div class="container-fluid">
				<div class="row row-eq-height">
					<!-- Register -->

					<div class="register_section d-flex flex-column align-items-center justify-content-center">
						<div class="register_content text-center">
							<a href="#" target="_blank">
								<img class="fb-button" src="<?= $folder_template . "/images/find-us-on-facebook-logo-png-4.png" ?>"></img>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- News -->
		<div class="news page_section pub-back" id="publications"> 
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section_title text-center" >
							<h1 style="color:white;">Publications</h1>
						</div>
					</div>
				</div>
				<div class="row course_boxes">
					<?php if ($detail_berita) : ?>
						<?php foreach ($detail_berita as $berita) : ?>
							<!-- news -->
							<div class="col-lg-4 course_box">
								<div class="card">
									<img class="card-img-top" src="<?= "/media/source/" . $berita['gambar'] ?>" alt="#">
									<div class="card-body">
										<div class="card-title"><a href="#"><?= $berita['judul']; ?></a></div>
										<div class="card-text"><?= $berita['desc'] ?></div>
										<div class="price_box d-flex flex-row">
											<div class="read-more-btn"><span><a href="<?= "/news/id/{$berita['id_artikel']}/{$berita['judul_seo']}"; ?>">Read More<i class="fas fa-arrow-right" style="margin-left:10px; "></i></a></span></div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else : ?>
						<h3>News not found</h3>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<!-- Register -->

		<div class="register page_section" id="about_us" style="padding: 0">
			<div class="container-fluid">
				<div class="row row-eq-height">
					<!-- Register -->

					<div class="register_section custom d-flex flex-column align-items-center justify-content-center">
						<div class="register_content text-center">
							<h1 class="register_title">Faculty of Communication Universitas Pancasila</h1>

							<div class="button button_1 register_button mx-auto trans_200"><a href="/about-us">Learn More</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Events -->
		<div class="events page_section" id="events">
			<div class="container">

				<div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>Upcoming Events</h1>
						</div>
					</div>
				</div>

				<div class="event_items">

					<!-- Event Item -->
					<?php if ($detail_event) : ?>
						<?php foreach ($detail_event as $event) : ?>
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
												<p><?= $event['isi'] ?></p>
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
					<?php else : ?>
						<h3><?= $title_head ?> not found</h3>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<!-- Footer -->

		<?php include('template/footer.php'); ?>

	</div>

	<?php include('template/meta_footer.php'); ?>
</body>

<script>
$(document).ready(function(){
	// Add smooth scrolling to all links
	$("a").on('click', function(event) {
		// Make sure this.hash has a value before overriding default behavior
		if (this.hash !== "") {
			// Prevent default anchor click behavior
			event.preventDefault();
			// Store hash
			var hash = this.hash;
			// Using jQuery's animate() method to add smooth page scroll
			// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
			$('html, body').animate({
				scrollTop: $(hash).offset().top
			}, 800, function(){
				// Add hash (#) to URL when done scrolling (default click behavior)
				window.location.hash = hash;
			});
		} // End if
	});
});
</script>

</html>