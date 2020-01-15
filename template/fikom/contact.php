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

		<header class="header d-flex flex-row">
			<div class="header_content d-flex flex-row align-items-center">
				<!-- Logo -->
				<div class="logo_container">
					<div class="logo">

						<span style="color:orange;">Logo</span>
					</div>
				</div>

				<!-- Main Navigation -->
				<nav class="main_nav_container">
					<div class="main_nav">
						<ul class="main_nav_list">
							<li class="main_nav_item"><a href="/">Home</a></li>
							<li class="main_nav_item"><a href="/about-us">About Us</a></li>
							<li class="main_nav_item"><a href="/event">Event</a></li>
							<li class="main_nav_item"><a href="/news">News</a></li>
							<li class="main_nav_item"><a href="/contact">Contact</a></li>
						</ul>
					</div>
				</nav>
			</div>


			<!-- Hamburger -->
			<div class="hamburger_container">
				<i class="fas fa-bars trans_200"></i>
			</div>

		</header>

		<!-- Menu -->
		<div class="menu_container menu_mm">

			<!-- Menu Close Button -->
			<div class="menu_close_container">
				<div class="menu_close"></div>
			</div>

			<!-- Menu Items -->
			<div class="menu_inner menu_mm">
				<div class="menu menu_mm">
					<ul class="menu_list menu_mm">
						<li class="menu_item menu_mm"><a href="/">Home</a></li>
						<li class="menu_item menu_mm"><a href="/about-us">About Us</a></li>
						<li class="menu_item menu_mm"><a href="/event">Event</a></li>
						<li class="menu_item menu_mm"><a href="/news">News</a></li>
						<li class="menu_item menu_mm"><a href="/contact">Contact</a></li>
					</ul>

					<!-- Menu Social -->

					<div class="menu_social_container menu_mm">
						<ul class="menu_social menu_mm">
							<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
							<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
							<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
							<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
						</ul>
					</div>

					
				</div>

			</div>

		</div>

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
					<div class="col-lg-8">

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

					<div class="col-lg-4">
						<div class="about">
							<div class="about_title">Join Courses</div>
							<p class="about_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies. Etiam eu purus nec eros varius luctus.</p>

							<div class="contact_info">
								<ul>
									<li class="contact_info_item">
										<div class="contact_info_icon">
											<img src="<?= $folder_template . '/images/placeholder.svg' ?>" alt="#">
										</div>
										Blvd Libertad, 34 m05200 Arévalo
									</li>
									<li class="contact_info_item">
										<div class="contact_info_icon">
											<img src="<?= $folder_template . '/images/smartphone.svg' ?>" alt="#">
										</div>
										0034 37483 2445 322
									</li>
									<li class="contact_info_item">
										<div class="contact_info_icon">
											<img src="<?= $folder_template . '/images/envelope.svg' ?>" alt="#">
										</div>hello@company.com
									</li>
								</ul>
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

		<footer class="footer">
			<div class="container">

				<!-- Newsletter -->


				<!-- Footer Content -->

				<div class="footer_content">
					<div class="row">

						<!-- Footer Column - About -->
						<div class="col-lg-3 footer_col">

							<!-- Logo -->
							<div class="logo_container">
								<div class="logo">
									<img src="images/logo.png" alt="">
									<span>course</span>
								</div>
							</div>

							<p class="footer_about_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum, tempor lacus.</p>

						</div>

						<!-- Footer Column - Menu -->

						<div class="col-lg-3 footer_col">
							<div class="footer_column_title">Menu</div>
							<div class="footer_column_content">
								<ul>
									<li class="footer_list_item"><a href="index.html">Home</a></li>
									<li class="footer_list_item"><a href="#">About Us</a></li>
									<li class="footer_list_item"><a href="courses.html">Courses</a></li>
									<li class="footer_list_item"><a href="news.html">News</a></li>
									<li class="footer_list_item"><a href="#">Contact</a></li>
								</ul>
							</div>
						</div>

						<!-- Footer Column - Usefull Links -->

						<div class="col-lg-3 footer_col">
							<div class="footer_column_title">Usefull Links</div>
							<div class="footer_column_content">
								<ul>
									<li class="footer_list_item"><a href="#">Testimonials</a></li>
									<li class="footer_list_item"><a href="#">FAQ</a></li>
									<li class="footer_list_item"><a href="#">Community</a></li>
									<li class="footer_list_item"><a href="#">Campus Pictures</a></li>
									<li class="footer_list_item"><a href="#">Tuitions</a></li>
								</ul>
							</div>
						</div>

						<!-- Footer Column - Contact -->

						<div class="col-lg-3 footer_col">
							<div class="footer_column_title">Contact</div>
							<div class="footer_column_content">
								<ul>
									<li class="footer_contact_item">
										<div class="footer_contact_icon">
											<img src="images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g">
										</div>
										Blvd Libertad, 34 m05200 Arévalo
									</li>
									<li class="footer_contact_item">
										<div class="footer_contact_icon">
											<img src="images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
										</div>
										0034 37483 2445 322
									</li>
									<li class="footer_contact_item">
										<div class="footer_contact_icon">
											<img src="images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
										</div>hello@company.com
									</li>
								</ul>
							</div>
						</div>

					</div>
				</div>

				<!-- Footer Copyright -->

				<div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
					<div class="footer_copyright">
						<span>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
					</div>
					<div class="footer_social ml-sm-auto">
						<ul class="menu_social">
							<li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
							<li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
							<li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
							<li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
						</ul>
					</div>
				</div>

			</div>
		</footer>

	</div>
	<?php
	foreach ($js_array as $js) {
		$js_link = $folder_template . '/' . $js;
		echo "<script src='$js_link'></script>";
	}
	?>


</body>

</html>