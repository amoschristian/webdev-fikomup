<?php
$folder_template = web_info('url') . '/' . folder_template();
?>


<!DOCTYPE html>
<html lang="en">

<?php include('template/meta_head.php'); ?>

<style>
	#home{
		background: linear-gradient(rgba(0, 0, 0, 0.719), rgba(0, 0, 0, 0.699)),
		url(/template/fikom/images/background/world_map.png);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: right;
	}

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
		<div class="home" id="home">
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
                		    <li class="about_menu_item"><a href="/admission"><?= $lang->t('Admissions') ?></a></li>
								<li class="about_menu_item_sub"><a href="/admission/information"><?= $lang->t('Information') ?></a></li>
								<li class="about_menu_item_sub"><a href="/admission/pmb"><?= $lang->t('PMB Online') ?></a></li>
							<li class="about_menu_item"><a href="/course"><?= $lang->t('Courses') ?></a></li>
								<li class="about_menu_item_sub"><a href="/course/elearning"><?= $lang->t('E-Learning') ?></a></li>
								<li class="about_menu_item_sub"><a href="/course/announcement"><?= $lang->t('Courses') ?></a></li>
									<li class="about_menu_item_sub_2"><a href="/course/announcement"><?= $lang->t('Announcement') ?></a></li>
									<li class="about_menu_item_sub_2"><a href="/course/list"><?= $lang->t('Courses List') ?></a></li>
							<li class="about_menu_item"><a href="/event"><?= $lang->t('Events') ?></a></li>
							<li class="about_menu_item"><a href="/news"><?= $lang->t('Publications') ?></a></li>
							<li class="about_menu_item"><a href="/about_us"><?= $lang->t('About Us') ?></a></li>
								<li class="about_menu_item_sub"><a href="/about-us/history"><?= $lang->t('Organizations') ?></a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/history"><?= $lang->t('History') ?></a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/organization"><?= $lang->t('Organizations Structure') ?></a></li>
								<li class="about_menu_item_sub"><a href="/about-us/vision"><?= $lang->t('Vision & Mission') ?></a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/vision"><?= $lang->t('Vision') ?></a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/mission"><?= $lang->t('Mission') ?></a></li>
								<li class="about_menu_item_sub"><a href="/about-us/lecturer"><?= $lang->t('Resources') ?></a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/lecturer"><?= $lang->t('Lecturer') ?></a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/facility"><?= $lang->t('Facility') ?></a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/alumni"><?= $lang->t('Alumni') ?></a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/laboratorium"><?= $lang->t('Laboratorium') ?></a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/coverage"><?= $lang->t('Journal Coverage') ?></a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/sjm"><?= $lang->t('Unit SJM') ?></a></li>
								<li class="about_menu_item_sub"><a href="/about-us/activity"><?= $lang->t('Mobility') ?></a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/ukm"><?= $lang->t('UKM') ?></a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/activity"><?= $lang->t('Activity') ?></a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/student"><?= $lang->t('Student') ?></a></li>
								<li class="about_menu_item_sub"><a href="/about-us/activity"><?= $lang->t('Student Counseling') ?></a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/announcement-counseling"><?= $lang->t('Announcement') ?></a></li>
									<li class="about_menu_item_sub_2"><a href="/about-us/schedule-counseling"><?= $lang->t('Schedule') ?></a></li>
							<li class="about_menu_item"><a href="/about_us"><?= $lang->t('Partners') ?></a></li>
							<li class="about_menu_item"><a href="/contact"><?= $lang->t('Contact') ?></a></li>
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