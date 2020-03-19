<?php
$folder_template = web_info('url') . '/' . folder_template();

$json_config = $folder_template . "/plugins/particlesjs/assets/config.json";
?>

<!DOCTYPE html>
<html lang="en">


<?php
include('template/meta_head.php');
?>

<link rel='stylesheet' type='text/css' href='<?= $folder_template . '/styles/home_custom.css' ?>'>

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
					<div class="welcome"><?= $lang->t('Welcome to') ?> <strong style="color: #FF4F00;">FIKom UP</strong></div>
					<?php include('template/arbor.php'); ?>	
				</div>
			</div>
		</div>	

		<!-- Headline -->
		<?php include('template/headline_home.php'); ?>
	
		<!-- Register -->
		<div class="register page_section" id="about_us" style="padding: 0">
			<div class="container-fluid">
				<div class="row row-eq-height">
					<!-- Register -->

					<div id="social_media" class="register_section parallax-window custom d-flex flex-column align-items-center justify-content-center" data-natural-height="900" data-bleed="10" data-parallax="scroll" data-src="/template/fikom/images/background/1-min.jpg">
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
		<?php include('template/news_home.php'); ?>

		<!-- Register -->
		<div class="register page_section" id="about_us" style="padding: 0">
			<div class="container-fluid">
				<div class="row row-eq-height">
					<!-- Register -->
					<div class="register_section parallax-window custom d-flex flex-column align-items-center justify-content-center" data-natural-height="900" data-bleed="10" data-parallax="scroll" data-src="/template/fikom/images/background/5-min.jpg">
						<div class="register_content text-center">
							<h1 class="register_title"><?= $lang->t('Faculty of Communication') ?> <?= $lang->t('Universitas Pancasila') ?></h1>

							<div class="button button_1 register_button mx-auto trans_200"><a href="/about-us"><?= $lang->t('Learn More') ?></a></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Events -->
		<?php include('template/events_home.php'); ?>

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