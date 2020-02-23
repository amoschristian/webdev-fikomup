<?php
$folder_template = web_info('url') . '/' . folder_template();
?>


<!DOCTYPE html>
<html lang="en">

<?php include('template/meta_head.php'); ?>

<style>
	.about_menu_item_sub {
		margin-left: 5%;
	}

	.about_menu_item_sub_2 {
		margin-left: 9%;
	}

	.about_menu_item_sub a {
		font-size: 16px;
		color: #1a1a1a;
	}

	.about_menu_item_sub_2 a {
		font-size: 16px;
		color: #1a1a1a;
	}

	a:hover {
		color: #f44f00;
		text-decoration: underline;
	}
</style>

<body>

	<div class="super_container">

		<!-- Header -->
		<?php include('template/header.php'); ?>

		<!-- Home -->
		<div class="home">
			<?php include('template/particle.php'); ?>
			<div class="home_content">
				<h1>Sitemap</h1>
			</div>
		</div>

		<!-- News -->
		<div class="container page_section">
			<div class="row">
				<div class="col-lg-12">
					<!-- Menu -->
			 		<div class="about_nav">
                		<ul class="about_menu">
                		    <li class="about_menu_item"><a href="/admission">Admission</a></li>
								<li class="about_menu_item_sub"><a href="/admission/information">Information</a></li>
								<li class="about_menu_item_sub"><a href="/admission/pmb">PMB Online</a></li>
							<li class="about_menu_item"><a href="/course">Course</a></li>
								<li class="about_menu_item_sub"><a href="/course/elearning">E-Learning</a></li>
							<li class="about_menu_item"><a href="/event">Events</a></li>
							<li class="about_menu_item"><a href="/news">Publications</a></li>
							<li class="about_menu_item"><a href="/about_us">About Us</a></li>
								<li class="about_menu_item_sub"><a href="/about-us/history">Organizations</a></li>
									<li class="about_menu_item_sub_2 <?= ($sub_page == 'history') ? 'active' : '' ?>"><a href="/about-us/history">History</a></li>
									<li class="about_menu_item_sub_2 <?= ($sub_page == 'organization') ? 'active' : '' ?>"><a href="/about-us/organization">Organizations Structure</a></li>
								<li class="about_menu_item_sub"><a href="/about-us/vision">Vision & Mission</a></li>
									<li class="about_menu_item_sub_2 <?= ($sub_page == 'vision') ? 'active' : '' ?>"><a href="/about-us/vision">Vision</a></li>
									<li class="about_menu_item_sub_2 <?= ($sub_page == 'mission') ? 'active' : '' ?>"><a href="/about-us/mission">Mission</a></li>
								<li class="about_menu_item_sub"><a href="/about-us/lecturer">Resources</a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/lecturer">Lecturer</a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/facility">Facility</a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/alumni">Alumni</a></li>
								<li class="about_menu_item_sub"><a href="/about-us/activity">Resources</a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/activity">Activity</a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/ukm">UKM</a></li>
							<li class="about_menu_item"><a href="/about_us">Partner</a></li>
							<li class="about_menu_item"><a href="/contact">Contact</a></li>

                		</ul>
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