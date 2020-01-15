<?php
$folder_template = web_info('url') . '/' . folder_template();

$css_array = [
	"styles/bootstrap4/bootstrap.min.css",
	"plugins/fontawesome-free-5.0.1/css/fontawesome-all.css",
	"styles/contact_styles.css",
	"styles/contact_responsive.css",
];

$js_array = [
	"js/jquery-3.2.1.min.js",
	"styles/bootstrap4/popper.js",
	"styles/bootstrap4/bootstrap.min.js",
	"plugins/greensock/TweenMax.min.js",
	"plugins/greensock/TimelineMax.min.js",
	"plugins/scrollmagic/ScrollMagic.min.js",
	"plugins/greensock/animation.gsap.min.js",
	"plugins/greensock/ScrollToPlugin.min.js",
	"plugins/scrollTo/jquery.scrollTo.min.js",
	"https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA",
	"plugins/easing/easing.js",
	"js/contact_custom.js",

];


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Course - Contact</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Fikom UP">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
	foreach ($css_array as $css) {
		$css_link = $folder_template . '/' . $css;
		echo "<link rel='stylesheet' type='text/css' href='$css_link'>";
	}
	?>
</head>

<body>

	<div class="super_container">

		<!-- Header -->

		<?php include('template/header.php'); ?>

		<!-- Home -->

		<div class="home">
			<div class="home_background_container prlx_parent">
				<div class="home_background prlx" style="background-image:url(<?= $folder_template . '/images/contact_background.jpg' ?>)"></div>
			</div>
			<div class="home_content">
				<h1>Contact</h1>
			</div>
		</div>

		<!-- Contact -->

		<div class="contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">

						<!-- Contact Form -->
						<div class="contact_form">
							<div class="contact_title">Get in touch</div>

							<div class="contact_form_container">
								<form action="post">
									<input id="contact_form_name" class="input_field contact_form_name" type="text" placeholder="Name" required="required" data-error="Name is required.">
									<input id="contact_form_email" class="input_field contact_form_email" type="email" placeholder="E-mail" required="required" data-error="Valid email is required.">
									<textarea id="contact_form_message" class="text_field contact_form_message" name="message" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
									<button id="contact_send_btn" type="button" class="contact_send_btn trans_200" value="Submit">send message</button>
								</form>
							</div>
						</div>

					</div>

				</div>

				<!-- Google Map -->

				<div class="row">
					<div class="col">
						<div id="google_map">
							<div class="map_container">
								<div id="map"> <img style="width:100%;" src="<?= $folder_template . '/images/maps.jpg' ?>" /> </div>
							</div>
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