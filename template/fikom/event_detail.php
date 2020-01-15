<?php
$folder_template = web_info('url') . '/' . folder_template();

$css_array = [
	"styles/bootstrap4/bootstrap.min.css",
	"plugins/fontawesome-free-5.0.1/css/fontawesome-all.css",
	"styles/news_post_styles.css",
	"styles/news_post_responsive.css",
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
	"plugins/easing/easing.js",
	"js/news_post_custom.js",
];


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Course - News Post</title>
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
				<div class="home_background prlx" style="background-image:url(<?= $folder_template . '/images/news_background.jpg' ?>)"></div>
			</div>
			<div class="home_content">
				<h1>Event</h1>
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
									<img src="<?= $folder_template . '/images/news_1.jpg' ?>" alt="#">
								</div>
								<div class="news_post_top d-flex flex-column flex-sm-row">
									<div class="news_post_date_container">
										<div class="news_post_date d-flex flex-column align-items-center justify-content-center">
											<div>18</div>
											<div>dec</div>
										</div>
									</div>
									<div class="news_post_title_container">
										<div class="news_post_title">
											<a href="news_post.html">Why do you need a qualification?</a>
										</div>
										<div class="news_post_meta">
											<span class="news_post_author"><a href="#">By Christian Smith</a></span>
											<span>|</span>
											<span class="news_post_comments"><a href="#">3 Comments</a></span>
										</div>
									</div>
								</div>
								<div class="news_post_text">
									<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies venenatis. Suspendisse fermentum sodales lacus, lacinia gravida elit dapibus sed. Cras in lectus elit. Maecenas tempus nunc vitae mi egestas venenatis. Aliquam rhoncus, purus in vehicula porttitor, lacus ante consequat purus, id elementum enim purus nec enim. In sed odio rhoncus, tristique ipsum id, pharetra neque. </p>
								</div>

								<div class="news_post_quote">
									<p class="news_post_quote_text"><span>E</span>tiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies venena tis. Suspendisse fermentum sodales lacus, lacinia gravida elit.</p>
								</div>

								<p class="news_post_text" style="margin-top: 59px;">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies venenatis. Suspendisse fermentum sodales lacus, lacinia gravida elit dapibus sed. Cras in lectus elit. Maecenas tempus nunc vitae mi egestas venenatis. Aliquam rhoncus, purus in vehicula porttitor, lacus ante consequat purus, id elementum enim purus nec enim. In sed odio rhoncus, tristique ipsum id, pharetra neque. </p>
							</div>

						</div>

						<!-- Comments -->


						<!-- Leave Comment -->



					</div>

					<!-- Sidebar Column -->

					<div class="col-lg-4">
						<div class="sidebar">

							<div class="sidebar_section">
								<div class="sidebar_section_title">
									<h3>Tags</h3>
								</div>
								<div class="tags d-flex flex-row flex-wrap">
									<div class="tag"><a href="#">Course</a></div>
									<div class="tag"><a href="#">Design</a></div>
									<div class="tag"><a href="#">FAQ</a></div>
									<div class="tag"><a href="#">Teachers</a></div>
									<div class="tag"><a href="#">School</a></div>
									<div class="tag"><a href="#">Graduate</a></div>
								</div>
							</div>

							<!-- Latest Posts -->

							<div class="sidebar_section">
								<div class="sidebar_section_title">
									<h3>Latest posts</h3>
								</div>

								<div class="latest_posts">

									<!-- Latest Post -->
									<div class="latest_post">
										<div class="latest_post_image">
											<img src="<?= $folder_template . '/images/latest_1.jpg' ?>" alt="#">
										</div>
										<div class="latest_post_title"><a href="news_post.html">Why do you need a qualification?</a></div>
										<div class="latest_post_meta">
											<span class="latest_post_author"><a href="#">By Christian Smith</a></span>
											<span>|</span>
											<span class="latest_post_comments"><a href="#">3 Comments</a></span>
										</div>
									</div>

									<!-- Latest Post -->
									<div class="latest_post">
										<div class="latest_post_image">
											<img src="<?= $folder_template . '/images/latest_2.jpg' ?>" alt="#">
										</div>
										<div class="latest_post_title"><a href="news_post.html">Why do you need a qualification?</a></div>
										<div class="latest_post_meta">
											<span class="latest_post_author"><a href="#">By Christian Smith</a></span>
											<span>|</span>
											<span class="latest_post_comments"><a href="#">3 Comments</a></span>
										</div>
									</div>

									<!-- Latest Post -->
									<div class="latest_post">
										<div class="latest_post_image">
											<img src="<?= $folder_template . '/images/latest_3.jpg' ?>" alt="#">
										</div>
										<div class="latest_post_title"><a href="news_post.html">Why do you need a qualification?</a></div>
										<div class="latest_post_meta">
											<span class="latest_post_author"><a href="#">By Christian Smith</a></span>
											<span>|</span>
											<span class="latest_post_comments"><a href="#">3 Comments</a></span>
										</div>
									</div>

								</div>

							</div>

							<!-- Tags -->



						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->

		<footer class="footer">
			<div class="container">


				<!-- Footer Content -->

				<div class="footer_content">
					<div class="row">

						<!-- Footer Column - About -->
						<div class="col-lg-3 footer_col">

							<!-- Logo -->
							<div class="logo_container">
								<div class="logo">

									<span>Logo</span>
								</div>
							</div>

							<p class="footer_about_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum, tempor lacus.</p>

						</div>

						<!-- Footer Column - Menu -->

						<div class="col-lg-3 footer_col">
							<div class="footer_column_title">Menu</div>
							<div class="footer_column_content">
								<ul>
									<li class="footer_list_item"><a href="#">Home</a></li>
									<li class="footer_list_item"><a href="#">About Us</a></li>
									<li class="footer_list_item"><a href="courses.html">Courses</a></li>
									<li class="footer_list_item"><a href="news.html">News</a></li>
									<li class="footer_list_item"><a href="contact.html">Contact</a></li>
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
											<img src="../template/fikom/images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g">
										</div>
										Jl.ignum lorem bla bla
									</li>
									<li class="footer_contact_item">
										<div class="footer_contact_icon">
											<img src="../template/fikom/images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
										</div>
										0034 37483 2445 322
									</li>
									<li class="footer_contact_item">
										<div class="footer_contact_icon">
											<img src="../template/fikom/images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
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
							</script> FikomUp</a>
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