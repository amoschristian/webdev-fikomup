
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

<style>
.wa-button {
	width: 400px;
}
@media only screen and (max-width: 417px){
	.wa-button {
		width: 300px;
	}
}

.map_container {
	width: 100%;
	height: 50rem;
	overflow: hidden;
}

#home{
	background: linear-gradient(rgba(0, 0, 0, 0.719), rgba(0, 0, 0, 0.699)),
	url(/template/fikom/images/background/contact.jpg);
	background-size: cover;
	background-repeat: no-repeat;
	background-position: center;
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
				<h1><?= $lang->t('Contact') ?></h1>
			</div>
		</div>

		<!-- Contact -->

		<div class="contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">

						<!-- Email Form -->
						<div class="contact_form">
							<div class="contact_title"><?= $lang->t('Get in Touch with Us on') ?> Whatsapp</div>

							<div class="contact_form_container">
								<a href="https://wa.me/62217870451" target="_blank">
									<img class="wa-button" src="<?= $folder_template ?>/images/whatsapp_button.png">
									</img>
								</a>
							</div>
						</div>

						<!-- Email Form -->
						<div class="contact_form" style="margin-top: 100px">
							<div class="contact_title"><?= $lang->t('Get in Touch with Us on') ?> Email</div>

							<div class="contact_form_container">
								<form action="post" id="form">
									<select id="contact_form_type" class="input_field contact_form_name" name="type" type="text" required="required" data-error="Type is required.">
										<option value = "" disabled selected><?= $lang->t('Please Select a Type') ?></option>
										<option value = "inquiry"><?= $lang->t('Inquiry') ?></option>
										<option value = "feedback"><?= $lang->t('Feedback') ?></option>
									</select>
									<input id="contact_form_name" class="input_field contact_form_name" name="name" type="text" placeholder="<?= $lang->t('Name') ?>" required="required" data-error="Name is required.">
									<input id="contact_form_email" class="input_field contact_form_email" name="email" type="email" placeholder="E-mail" required="required" data-error="Valid email is required.">
									<textarea id="contact_form_message" class="text_field contact_form_message" name="message" placeholder="<?= $lang->t('Message') ?>" required="required" data-error="Please, write us a message."></textarea>
									<button id="contact_send_btn" type="submit" class="contact_send_btn trans_200" value="Submit"><?= $lang->t('send message') ?></button>
								</form>
							</div>
						</div>

					</div>

				</div>

				<!-- Google Map -->
				<script src='https://api.mapbox.com/mapbox-gl-js/v1.8.0/mapbox-gl.js'></script>
				<link href='https://api.mapbox.com/mapbox-gl-js/v1.8.0/mapbox-gl.css' rel='stylesheet' />

				<div class="row" style="margin-top: 100px">
					<div class="col">
						<div class="contact_title"><?= $lang->t('Find Us On') ?></div>

						<div class="map_container">
							<div id='map'></div>
							<script>
								mapboxgl.accessToken = '<?= $mapBoxToken ?>';
								var map = new mapboxgl.Map({
									container: 'map',
									style: 'mapbox://styles/mapbox/streets-v11',
									center: [106.833144, -6.339445],
									zoom: 16
								});

								var marker = new mapboxgl.Marker({
									color: '#f44f00'
								})
								.setLngLat([106.833144, -6.339445])
								.addTo(map);

								map.addControl(new mapboxgl.NavigationControl());
								map.addControl(new mapboxgl.FullscreenControl());
							</script>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

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
					var bgColor = '#5cb85c';
					var message = '<?= $lang->t('Message has been sent. Thank you for your inqury/feedback.') ?>';
					if (data != 'sent') {
						var bgColor = '#d9534f';
						var message = '<?= $lang->t('Message failed to send.') ?>';
					}	

					flash(message,{
						'bgColor' : bgColor,
						'ftColor' : 'white',
						'ftSize'  : '32px',
						'vPosition' : 'top',
						'hPosition' : 'right',
						'fadeIn' : 400,
						'fadeOut' : 400,
						'clickable' : true,
						'autohide' : true,
						'duration' : 4000
					});
				}	
			});
		}
	}
	
});
</script>