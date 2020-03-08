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
                		    <li class="about_menu_item <?= ($sub_page == 'elearning') ? 'active' : '' ?>"><a href="/course/elearning">E-Learning</a></li>
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