<?php
$folder_template = web_info('url') . '/' . folder_template();

$menuArray = [
	'elearning' => ['E-Learning', 'elearning'],
	'courses' => ['Courses', 'announcement']
];

$subMenuArray = [
	'courses' => [
		['Announcement', 'announcement'],
		['Courses List', 'list']
	]
];
?>

<!DOCTYPE html>
<html lang="en">

<?php include('template/meta_head.php'); ?>

<style>
	#home{
		background: linear-gradient(rgba(0, 0, 0, 0.719), rgba(0, 0, 0, 0.699)),
		url(/template/fikom/images/background/courses.jpg);
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
				<h1><?= $lang->t('Courses') ?></h1>
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
								<li class="about_menu_item"><a href="/course/<?= $menu[1] ?>"><?= $lang->t($menu[0]) ?></a></li>
								<?php if (isset($subMenuArray[$index])) : ?>
									<?php foreach ($subMenuArray[$index] as $subMenu): ?>
										<li class="about_menu_item_sub <?= ($sub_page == str_replace('-', '_', $subMenu[1])) ? 'active' : '' ?>"><a href="/course/<?= $subMenu[1] ?>"><?= $lang->t($subMenu[0]) ?></a></li>
									<?php endforeach; ?>
								<?php endif; ?>
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
								$sub_file = dirname(__FILE__)."/course/$sub_page.php";

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