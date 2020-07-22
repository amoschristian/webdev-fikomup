<?php
$folder_template = web_info('url') . '/' . folder_template();
?>

<link rel='stylesheet' type='text/css' href='<?= $folder_template . '/styles/header_custom.css' ?>'>
<link rel='stylesheet' type='text/css' href='<?= $folder_template . '/styles/responsive.css' ?>'>

<header class="header d-flex flex-row">
	<div class="header_content d-flex flex-row align-items-center">
		<!-- Logo -->
		<div class="logo_container">
			<div class="logo">
				<a href="/"><img src="<?= $folder_template . '/images/logo_fikomup.png' ?>" alt="logo/brand"></a>
			</div>

		</div>
		<div class="menus" id="header">
			<div class="des_container" id="menu_name">
				<span><?= $lang->t('Faculty of Communication') ?></span>
				<span><?= $lang->t('Universitas Pancasila') ?></span>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container nav_menus">
				<div class="main_nav">
					<ul class="main_nav_list list_menu">
						<li class="main_nav_item dropdown <?= ($module == 'admission' ? "active" : "") ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $lang->t('Admissions') ?></a>
							<ul class="dropdown-menu">
								<li> <a href="/admission/information"><?= $lang->t('Information') ?></a></li>
								<li> <a href="/admission/pmb"><?= $lang->t('PMB Online') ?></a></li>
							</ul>
						</li>
						<li class="main_nav_item dropdown <?= ($module == 'course' ? "active" : "") ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $lang->t('Courses') ?></a>
							<ul class="dropdown-menu">
								<li> <a href="/course/elearning"><?= $lang->t('E-Learning') ?></a></li>
								<li> <a href="/course/announcement"><?= $lang->t('Courses List') ?></a></li>
							</ul>
						</li>
						<li class="main_nav_item <?= ($module == 'event' ? "active" : "") ?>"><a href="/event"><?= $lang->t('Events') ?></a></li>
						<li class="main_nav_item <?= ($module == 'news' ? "active" : "") ?>"><a href="/news"><?= $lang->t('News') ?></a></li>
						<li class="main_nav_item dropdown <?= ($module == 'about_us' ? "active" : "") ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $lang->t('About Us') ?></a>
							<ul class="dropdown-menu">
								<li> <a href="/about-us/history"><?= $lang->t('Organizations') ?></a></li>
								<li> <a href="/about-us/vision"><?= $lang->t('Vision & Mission') ?></a></li>
								<li> <a href="/about-us/lecturer"><?= $lang->t('Resources') ?></a></li>
								<li> <a href="/about-us/ukm"><?= $lang->t('Mobility') ?></a></li>
								<li> <a href="/about-us/announcement-counseling"><?= $lang->t('Student Counseling') ?></a></li>
								<li> <a href="/about-us/coverage"><?= $lang->t('Coverage and Lab TV') ?></a></li>
							</ul>
						</li>
						<li class="main_nav_item <?= ($module == 'partners' ? "active" : "") ?>"><a href="/partners"><?= $lang->t('Partners') ?></a></li>
						<li class="main_nav_item <?= ($module == 'contact' ? "active" : "") ?>"><a href="/contact"><?= $lang->t('Contact') ?></a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>


	<!-- Hamburger -->
	<div class="hamburger_container">
		<i class="fas fa-bars trans_200"></i>
	</div>

</header>

<div class="menu_container menu_mm">

	<!-- Menu Close Button -->
	<div class="menu_close_container">
		<div class="menu_close"></div>
	</div>

	<!-- Menu Items -->
	<div class="menu_inner menu_mm">
		<div class="menu menu_mm">
			<ul class="menu_list menu_mm">
				<li class="menu_item menu_mm"><a href="/admission"><?= $lang->t('Admissions') ?></a></li>
				<li class="menu_item menu_mm dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $lang->t('Courses') ?></a>
					<ul class="dropdown-menu">
						<li> <a href="/course/elearning"><?= $lang->t('E-Learning') ?></a></li>
						<li> <a href="/course/list"><?= $lang->t('Courses List') ?></a></li>
					</ul>
				</li>
				<li class="menu_item menu_mm"><a href="/event"><?= $lang->t('Events') ?></a></li>
				<li class="menu_item menu_mm"><a href="/news"><?= $lang->t('News') ?></a></li>
				<li class="menu_item menu_mm dropdown <?= ($module == 'about_us' ? "active" : "") ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $lang->t('About Us') ?></a>
					<ul class="dropdown-menu">
						<li> <a href="/about-us/history"><?= $lang->t('Organizations') ?></a></li>
						<li> <a href="/about-us/vision"><?= $lang->t('Vision & Mission') ?></a></li>
						<li> <a href="/about-us/lecturer"><?= $lang->t('Resources') ?></a></li>
						<li> <a href="/about-us/ukm"><?= $lang->t('Mobility') ?></a></li>
						<li> <a href="/about-us/announcement-counseling"><?= $lang->t('Student Counseling') ?></a></li>
						<li> <a href="/about-us/coverage"><?= $lang->t('Coverage and Lab TV') ?></a></li>
					</ul>
				</li>
				<li class="menu_item menu_mm"><a href="/partners"><?= $lang->t('Partners') ?></a></li>
				<li class="menu_item menu_mm"><a href="/contact"><?= $lang->t('Contact') ?></a></li>
			</ul>

			<div class="menu_copyright menu_mm">FIKom UP</div>
		</div>

	</div>
</div>

<style>
	.main_nav_list>.active>a {
		color: #f44f00
	}
</style>

<script>
	window.onscroll = function() {
		myScroll();
		myMenu();
	};

	function myScroll() {
		if (
			document.body.scrollTop > 100 ||
			document.documentElement.scrollTop > 100
		) {
			document.getElementById('header').className =
				'menus__scroll ';
		} else {
			document.getElementById('header').className = 'menus ';
		}
	}

	function myMenu() {
		if (
			document.body.scrollTop > 100 ||
			document.documentElement.scrollTop > 100
		) {
			document.getElementById('menu_name').className =
				'des_container_scroll ';
		} else {
			document.getElementById('menu_name').className = 'des_container ';
		}
	}

	$(document).ready(function() {
		// Add smooth scrolling to all links
		$('a').on('click', function(event) {
			// Make sure this.hash has a value before overriding default behavior
			if (this.hash !== '') {
				// Prevent default anchor click behavior
				event.preventDefault();

				// Store hash
				var hash = this.hash;

				// Using jQuery's animate() method to add smooth page scroll
				// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
				$('html, body').animate({
						scrollTop: $(hash).offset().top,
					},
					800,
					function() {
						// Add hash (#) to URL when done scrolling (default click behavior)
						window.location.hash = hash;
					}
				);
			} // End if
		});
	});
</script>