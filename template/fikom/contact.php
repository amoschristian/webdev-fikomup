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
								<form action="post" id="form">
									<select id="contact_form_type" class="input_field contact_form_name" name="type" type="text" required="required" data-error="Type is required.">
										<option value = "" disabled selected>Please Select a Type</option>
										<option value = "inquiry">Inquiry</option>
										<option value = "feedback">Feedback</option>
									</select>
									<input id="contact_form_name" class="input_field contact_form_name" name="name" type="text" placeholder="Name" required="required" data-error="Name is required.">
									<input id="contact_form_email" class="input_field contact_form_email" name="email" type="email" placeholder="E-mail" required="required" data-error="Valid email is required.">
									<textarea id="contact_form_message" class="text_field contact_form_message" name="message" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
									<button id="contact_send_btn" type="submit" class="contact_send_btn trans_200" value="Submit">send message</button>
								</form>
							</div>
						</div>

					</div>

				</div>

				<!-- Google Map -->

				<div class="row" style="margin-top: 100px">
					<div class="col">
						<div class="contact_title">Find Us On</div>

						<div id="google_map" style="margin-top: 20px">
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

<script>
$('#contact_send_btn').off().on('click', function(e){
	var form = $('#form').serializeArray();

	if (form.length == 4) {
		if (form[0].value && form[1].value && form[2].value && form[3].value) {
			e.preventDefault();

			$.ajax({
				type: "POST",
				url: "email.php",
				data: form, 
				success: function(data){
					console.log(data); 
				}
			});
		}
	}
	
});
</script>