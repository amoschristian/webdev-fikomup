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

<body>

	<div class="super_container">

		<!-- Header -->

		<?php include('template/header.php'); ?>

		<!-- Home -->

		<div class="home">

			<!-- Hero Slider -->
			<div class="hero_slider_container">
				<!-- Hero Slide -->
				<div class="hero_slide">
				<?php include('template/particle.php'); ?>			
					<div class="welcome">Welcome to <strong style="color: #FF4F00;">FIKom UP</strong></div>
					<!-- <div class="learn">Get More Informations</div> -->
					
					<!-- <button class="vd-yt" id="show-video"><i class="fa fa-play-circle" area-hidden="true"> &nbsp</i>video </button>
					<div class="mfp-hide mfp-hide-hidden" style="max-width: 75%; margin: 0 auto;">
					<div class="closer-bar"><span>X</span> </div>
					<iframe width="760" height="515" src="https://www.youtube.com/embed/39Ru65BLgP4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div> -->
				</div>
			</div>

			<div class="hero_boxes">
			<div class="hero_boxes_inner">
				<div class="container">
					<div class="row">
						<!-- <div class="col-lg-3 hero_box_col" style="text-align: -webkit-center;">
							<div class="hero_box flex-row align-items-center justify-content-start" style="background: #841b24;">
								<img src="<?= $folder_template . '/images/binoculars.svg' ?>" class="svg" alt="">
								<div class="hero_box_content">
									<h2 class="hero_box_title">Vision</h2>
									
								</div>
							</div>
						</div>

						<div class="col-lg-3 hero_box_col" style="text-align: -webkit-center;">
							<div class="hero_box flex-row align-items-center justify-content-start" style="background: #8f9622;">
								<img src="<?= $folder_template . '/images/earth-globe.svg' ?>" class="svg" alt="">
								<div class="hero_box_content">
									<h2 class="hero_box_title">Site Map</h2>
								
								</div>
							</div>
						</div>

						<div class="col-lg-3 hero_box_col" style="text-align: -webkit-center;">
							<div class="hero_box flex-row align-items-center justify-content-start" style="background: #8c7022">
								<img src="<?= $folder_template . '/images/books.svg' ?>" class="svg" alt="">
								<div class="hero_box_content">
									<h2 class="hero_box_title">Download</h2>
									
								</div>
							</div>
						</div>

						<div class="col-lg-3 hero_box_col" style="text-align: -webkit-center;">
							<div class="hero_box flex-row align-items-center justify-content-start" style="background: #531263">
								<img src="<?= $folder_template . '/images/professor.svg' ?>" class="svg" alt="">
								<div class="hero_box_content">
									<h2 class="hero_box_title">Course</h2>
									
								</div>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
		</div>

		<!-- Popular -->
		<div class="popular page_section">
			<div class="container">

			<!-- berita -->
				<div class="row course_boxes">
				<?php if ($detail_berita) : ?>
					<?php foreach ($detail_berita as $berita) : ?>
						<!-- news -->
						<div class="col-lg-4 course_box">
							<div class="card">
								<img class="card-img-top" src="<?= "/media/source/" . $berita['gambar'] ?>" alt="#">
								<div class="card-body text-center">
									<div class="card-title"><a href="#"><?= $berita['judul']; ?></a></div>
									<div class="card-text"><?= $berita['desc'] ?></div>
								</div>
								<div class="price_box d-flex flex-row align-items-center">
									<div class="course_author_image">
										<img src="<?= $folder_template . '/images/author.jpg' ?>" alt="#">
									</div>
									<div class="course_author_name">Michael Smith, <span>Author</span></div>
									<div class="course_price d-flex flex-column align-items-center justify-content-center"><span><a href="<?= "/news/id/{$berita['id_artikel']}/{$berita['judul_seo']}"; ?>">Read More</a></span></div>
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

		<div class="register page_section">
			<div class="container-fluid">
				<div class="row row-eq-height">
					<!-- Register -->

					<div class="register_section d-flex flex-column align-items-center justify-content-center">
						<div class="register_content text-center">
							<h1 class="register_title">Faculty of Communication Universitas Pancasila</h1>

							<div class="button button_1 register_button mx-auto trans_200"><a href="/about-us">Learn More</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- News -->

		<div class="news page_section">
				<div class="container">

				<div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>Publications</h1>
						</div>
					</div>
				</div>

				<div class="event_items">
						<?php if ($detail_berita) : ?>
							<?php foreach ($detail_berita as $berita) : ?>
								<!-- news -->
								<div class="col-lg-4 course_box">
									<div class="card">
										<img class="card-img-top" src="<?= "/media/source/" . $berita['gambar'] ?>" alt="#">
										<div class="card-body text-center">
											<div class="card-title"><a href="#"><?= $berita['judul']; ?></a></div>
											<div class="card-text"><?= $berita['desc'] ?></div>
										</div>
										<div class="price_box d-flex flex-row align-items-center">
											<div class="course_author_image">
												<img src="<?= $folder_template . '/images/author.jpg' ?>" alt="#">
											</div>
											<div class="course_author_name">Michael Smith, <span>Author</span></div>
											<div class="course_price d-flex flex-column align-items-center justify-content-center"><span><a href="<?= "/news/id/{$berita['id_artikel']}/{$berita['judul_seo']}"; ?>">Read More</a></span></div>
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

		<!-- Testimonials -->

		<div class="testimonials page_section">
			<!-- <div class="testimonials_background" style="background-image:url(images/testimonials_background.jpg)"></div> -->
			<div class="testimonials_background_container prlx_parent">
				<div class="testimonials_background prlx" style="background-image:url(<?= $folder_template . '/images/fik.JPG' ?>)"></div>
			</div>
			<div class="container">

				<div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>FIKom UP on Twitter</h1>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-10 offset-lg-1">

						<div class="testimonials_slider_container">

							<!-- Testimonials Slider -->
							<div class="owl-carousel owl-theme testimonials_slider">

								<!-- Testimonials Item -->
								<div class="owl-item">
									<div class="testimonials_item text-center">
										<div class="quote">“</div>
										<p class="testimonials_text">Visi kami: Pada tahun 2019, program studi ilmu komunikasi menjadi unggul dan kompetitif dalam bidang jurnalistik multimedia, komunikasi strategis, dan kajian media berdasarkan Pancasila.</p>
										<div class="testimonial_user">
											<div class="testimonial_image mx-auto">
												<img src="<?= $folder_template . '/images/bl.JPG' ?>" alt="">
											</div>
											<div class="testimonial_name">Admin</div>
											<div class="testimonial_title">2019-8-12</div>
										</div>
									</div>
								</div>

								<!-- Testimonials Item -->
								<div class="owl-item">
									<div class="testimonials_item text-center">
										<div class="quote">“</div>
										<p class="testimonials_text">Hey guys yuk datang ke open house kita di Jl. Srengseng Sawah, Jagakarsa, Jakarta Selatan, 12640</p>
										<div class="testimonial_user">
											<div class="testimonial_image mx-auto">
												<img src="<?= $folder_template . '/images/bl.JPG' ?>" alt="">
											</div>
											<div class="testimonial_name">Admin</div>
											<div class="testimonial_title">2019-4-24</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- Events -->

		<div class="events page_section">
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

		<!-- Partner -->

		<?php include('template/partner.php'); ?>

		<!-- Footer -->

		<?php include('template/footer.php'); ?>

	</div>

	<?php include('template/meta_footer.php'); ?>

<script>

// const toggleVideo = () => {
// 	document.querySelector('.mfp-hide')
// 	.classList.toggle('mfp-hide-hidden');
// };

// document.querySelector('#show-video')
// 	.addEventListener('click', toggleVideo);
	

</script>

</body>

</html>