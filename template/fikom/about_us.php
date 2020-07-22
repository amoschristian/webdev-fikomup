<?php
$folder_template = web_info('url') . '/' . folder_template();

$menuArray = [
	'organization' => ['Organizations', 'history'],
	'vision_mission' => ['Vision & Mission', 'vision'],
	'resources' => ['Resources', 'lecturer'],
	'mobility' => ['Mobility', 'ukm'],
	'student_counseling' => ['Student Counseling', 'counseling'],
	'coverage_lab_tv' => ['Coverage and Lab TV', 'coverage'],
];

$subMenuArray = [
	'organization' => [
		['History', 'history'],
		['Organizations Structure', 'organization']
	],
	'vision_mission' => [
		['Vision', 'vision'],
		['Mission', 'mission']
	],
	'resources' => [
		['Lecturer', 'lecturer'],
		['Facility', 'facility'],
		['Alumni', 'alumni'],
		['Laboratorium', 'laboratorium'],
		['Unit SJM', 'sjm'],
		['Achievement', 'achievement']
	],
	'mobility' => [
		['UKM', 'ukm'],
		['Activity', 'activity'],
		['Student', 'student']
	],
	'student_counseling' => [
		['Announcement', 'announcement-counseling'],
		['Schedule', 'schedule-counseling']
	],
	'coverage_lab_tv' => [
		['Journal Coverage', 'coverage'],
		['Lab TV', 'lab-tv']
	]
];

?>

<!DOCTYPE html>
<html lang="en">

<?php include('template/meta_head.php'); ?>

<style>
	#home{
		background: linear-gradient(rgba(0, 0, 0, 0.719), rgba(0, 0, 0, 0.699)),
		url(/template/fikom/images/background/about_us.jpg);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: right;
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
				<h1><?= $lang->t('About Us') ?></h1>
			</div>
		</div>

		<!-- News -->
		<div class="container page_section">
			<div class="row">
				<div class="col-lg-4">
					<!-- Menu -->
			 		<div class="about_nav">
                		<ul class="about_menu">
							<?php foreach ($menuArray as $index => $menu): ?>
								<li class="about_menu_item"><a href="/about-us/<?= $menu[1] ?>"><?= $lang->t($menu[0]) ?></a></li>
								<?php foreach ($subMenuArray[$index] as $subMenu): ?>
									<li class="about_menu_item_sub <?= ($sub_page == str_replace('-', '_', $subMenu[1])) ? 'active' : '' ?>"><a href="/about-us/<?= $subMenu[1] ?>"><?= $lang->t($subMenu[0]) ?></a></li>
								<?php endforeach; ?>
							<?php endforeach; ?>
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