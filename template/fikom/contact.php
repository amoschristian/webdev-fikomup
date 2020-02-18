<?php
$folder_template = web_info('url') . '/' . folder_template();

?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php
	include('template/meta_head.php');
	?>
</head>

<body>

	<div class="super_container">

		<!-- Header -->

		<?php include('template/header.php'); ?>

		<!-- Home -->

		<div class="home">
			<?php include('template/particle.php'); ?>
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