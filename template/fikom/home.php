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
				<div class="hero_slider owl-carousel">

					<!-- Hero Slide -->
					<div class="hero_slide">
						<canvas id="canvas"></canvas>
						<div class="welcome">Welcome to <strong>FikomUP</strong></div>
						<div class="learn">Get More Informations</div>
						<div class="vd-yt">&#9664;video</div>
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

		<div class="register">

			<div class="container-fluid">

				<div class="row row-eq-height">


					<!-- Register -->

					<div class="register_section d-flex flex-column align-items-center justify-content-center">
						<div class="register_content text-center">
							<h1 class="register_title">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h1>

							<div class="button button_1 register_button mx-auto trans_200"><a href="#">Learn More</a></div>
						</div>
					</div>




				</div>
			</div>
		</div>

		<!-- News -->

		<div class="services page_section">

			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>News</h1>
						</div>
					</div>
				</div>
			</div>

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
							<h1>FikomUP on Twitter</h1>
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
										<p class="testimonials_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
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
										<p class="testimonials_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
										<div class="testimonial_user">
											<div class="testimonial_image mx-auto">
												<img src="<?= $folder_template . '/images/bl.JPG' ?>" alt="">
											</div>
											<div class="testimonial_name">Admin</div>
											<div class="testimonial_title">2019-4-24</div>
										</div>
									</div>
								</div>

								<!-- Testimonials Item -->
								<div class="owl-item">
									<div class="testimonials_item text-center">
										<div class="quote">“</div>
										<p class="testimonials_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
										<div class="testimonial_user">
											<div class="testimonial_image mx-auto">
												<img src="<?= $folder_template . '/images/bl.JPG' ?>" alt="">
											</div>
											<div class="testimonial_name">Admin</div>
											<div class="testimonial_title">2019-8-5</div>
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
	
var canvas = document.querySelector("#canvas"),
    ctx = canvas.getContext('2d');


canvas.width = window.innerWidth;
canvas.height = window.innerHeight;


var config = {
  particleNumber: 800,
  maxParticleSize: 10,
  maxSpeed: 40,
  colorVariation: 50
};


var colorPalette = {
    bg: {r:255,g:255,b:255,a:1},
    matter: [
      {r:36,g:18,b:42}, 
      {r:78,g:36,b:42}, 
      {r:252,g:178,b:96}, 
      {r:253,g:238,b:152} 
    ]
};


var particles = [],
    centerX = canvas.width / 2,
    centerY = canvas.height / 2,
    drawBg,


drawBg = function (ctx, color) {
    ctx.fillStyle = "rgb(" + color.r + "," + color.g + "," + color.b + ")";
    ctx.fillRect(0,0,canvas.width,canvas.height);
};


var Particle = function (x, y) {
    
    this.x = x || Math.round(Math.random() * canvas.width);
    
    this.y = y || Math.round(Math.random() * canvas.height);
    
    this.r = Math.ceil(Math.random() * config.maxParticleSize);
    
    this.c = colorVariation(colorPalette.matter[Math.floor(Math.random() * colorPalette.matter.length)],true );
    
    this.s = Math.pow(Math.ceil(Math.random() * config.maxSpeed), .7);
    
    this.d = Math.round(Math.random() * 360);
};


var colorVariation = function (color, returnString) {
    var r,g,b,a, variation;
    r = Math.round(((Math.random() * config.colorVariation) - (config.colorVariation/2)) + color.r);
    g = Math.round(((Math.random() * config.colorVariation) - (config.colorVariation/2)) + color.g);
    b = Math.round(((Math.random() * config.colorVariation) - (config.colorVariation/2)) + color.b);
    a = Math.random() + .5;
    if (returnString) {
        return "rgba(" + r + "," + g + "," + b + "," + a + ")";
    } else {
        return {r,g,b,a};
    }
};


var updateParticleModel = function (p) {
    var a = 180 - (p.d + 90); // find the 3rd angle
    p.d > 0 && p.d < 180 ? p.x += p.s * Math.sin(p.d) / Math.sin(p.s) : p.x -= p.s * Math.sin(p.d) / Math.sin(p.s);
    p.d > 90 && p.d < 270 ? p.y += p.s * Math.sin(a) / Math.sin(p.s) : p.y -= p.s * Math.sin(a) / Math.sin(p.s);
    return p;
};


var drawParticle = function (x, y, r, c) {
    ctx.beginPath();
    ctx.fillStyle = c;
    ctx.arc(x, y, r, 0, 2*Math.PI, false);
    ctx.fill();
    ctx.closePath();
};


var cleanUpArray = function () {
    particles = particles.filter((p) => { 
      return (p.x > -100 && p.y > -100); 
    });
};


var initParticles = function (numParticles, x, y) {
    for (let i = 0; i < numParticles; i++) {
        particles.push(new Particle(x, y));
    }
    particles.forEach((p) => {
        drawParticle(p.x, p.y, p.r, p.c);
    });
};


window.requestAnimFrame = (function() {
  return window.requestAnimationFrame ||
     window.webkitRequestAnimationFrame ||
     window.mozRequestAnimationFrame ||
     function(callback) {
        window.setTimeout(callback, 1000 / 60);
     };
})();



var frame = function () {
  
  drawBg(ctx, colorPalette.bg);
 
  particles.map((p) => {
    return updateParticleModel(p);
  });
  
  particles.forEach((p) => {
      drawParticle(p.x, p.y, p.r, p.c);
  });
  
  window.requestAnimFrame(frame);
};


document.body.addEventListener("click", function (event) {
    var x = event.clientX,
        y = event.clientY;
    cleanUpArray();
    initParticles(config.particleNumber, x, y);
});


frame();


initParticles(config.particleNumber);
</script>
</body>

</html>