<?php
$folder_template = web_info('url') . '/' . folder_template();
?>


<!DOCTYPE html>
<html lang="en">

<?php include('template/meta_head.php'); ?>

<body>

	<div class="super_container">

		<!-- Header -->
		<?php include('template/header.php'); ?>

		<!-- Home -->
		<div class="home">
			<?php include('template/particle.php'); ?>
			<div class="home_content">
				<h1>About Us</h1>
			</div>
		</div>

		<!-- News -->
		<div class="container page_section">
			<div class="row">
				<div class="col-lg-4">
					<!-- Menu -->
			 		<div class="about_nav">
                		<ul class="about_menu">
                		    <li class="about_menu_item"><a href="/about-us/history">Organizations</a></li>
								<li class="about_menu_item_sub <?= ($sub_page == 'history') ? 'active' : '' ?>"><a href="/about-us/history">History</a></li>
								<li class="about_menu_item_sub <?= ($sub_page == 'organization') ? 'active' : '' ?>"><a href="/about-us/organization">Organizations Structure</a></li>
							<li class="about_menu_item"><a href="/about-us/vision">Vision & Mission</a></li>
								<li class="about_menu_item_sub <?= ($sub_page == 'vision') ? 'active' : '' ?>"><a href="/about-us/vision">Vision</a></li>
								<li class="about_menu_item_sub <?= ($sub_page == 'mission') ? 'active' : '' ?>"><a href="/about-us/mission">Mission</a></li>
							<li class="about_menu_item"><a href="/about-us/lecturer">Resources</a></li>
								<li class="about_menu_item_sub <?= ($sub_page == 'lecturer') ? 'active' : '' ?>"><a href="/about-us/lecturer">Lecturer</a></li>
								<li class="about_menu_item_sub"><a href="/about-us/facility">Facility</a></li>
								<li class="about_menu_item_sub"><a href="/about-us/alumni">Alumni</a></li>
							<li class="about_menu_item"><a href="/about-us/activity">Resources</a></li>
								<li class="about_menu_item_sub"><a href="/about-us/activity">Activity</a></li>
								<li class="about_menu_item_sub"><a href="/about-us/ukm">UKM</a></li>
                		</ul>
            		</div>
				</div>
				<div class="col-lg-8">
					<div class="news_post_container">
						<!-- About Container -->
						<div class="about-us-content">
							<div class="news_post">
								<?php 
								$sub_file = dirname(__FILE__)."/about_us/$sub_page.php";

								if (file_exists($sub_file)) {
									include($sub_file);
								}
								?>
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