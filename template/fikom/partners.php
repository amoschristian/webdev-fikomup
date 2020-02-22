<?php
$folder_template = web_info('url') . '/' . folder_template();
?>


<!DOCTYPE html>
<html lang="en">
<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<link href ="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel = "stylesheet" crossorigin="anonymous">
<script src = "https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js" crossorigin="anonymous"></script>



<?php include('template/meta_head.php'); ?>

<style>
.part{
    margin:0;
    padding:0;
    padding-top:20px;
    max-width:100%;

}

.part2{
    margin:0;
    padding:0;
    padding-top:20px;
    max-width:100%;
    margin-bottom:10px;

}

.img-part {
    height:50px;
    width:200px;
}

.img-media{
    height:300px;
    width:300px;
    object-fit:cover;
    padding-top:5px;
}

.text-p {
    font-size: 4rem;
    font-family: 'Alfa Slab One', cursive;
    color: white; 
    text-align:center;   
}

.text-p2 {
    font-size: 4rem;
    font-family: 'Alfa Slab One', cursive;
    color: #ff4e00;
    text-align:center;
}

.col-bg {
    background-color:#ff4e00;
}

.col-bg2 {
    background-color:white;
}

.col-bg21 {
    background-color:white;
    height:100vh;
    overflow: scroll;
   
}

.bor {
    
    border-width: 1px;
    border-style: solid;
   
}



.gall{
    text-align:center;
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
				<h1>Partner</h1>
			</div>
		</div>

		<!-- News -->
		<div class="container part">
			
                <div class="col-md-4 col-bg">
                    <div class="text-p">
                        Our Partners
                    </div>      
                </div>
                <div class="col-md-8 col-bg2">
                    <div class="text-p2 bor ">
                        Gallery
                    </div>      
                </div>
           
        </div>
        
        <div class="container part2">
            <div class="col-md-4 gall">
                <img class="img-part" src="<?= $folder_template . '/images/orbicom.png' ?>" alt="">
            </div>
            <div class="col-md-8 col-bg21">
                <div class="">
                    <a href = "<?= $folder_template . '/images/img-part/Backgrund.JPG' ?>" data-toggle = "lightbox" data-gallery="gallery">
                    <img class="img-media imggallery" src="<?= $folder_template . '/images/img-part/Backgrund.JPG' ?>" alt="">
				    </a>
                    <img class="img-media" src="<?= $folder_template . '/images/img-part/Backgrund.JPG' ?>" alt="">
                    <img class="img-media" src="<?= $folder_template . '/images/img-part/DSC00686.JPG' ?>" alt="">
                    <img class="img-media" src="<?= $folder_template . '/images/img-part/IMG_0599.JPG' ?>" alt="">
                    <img class="img-media" src="<?= $folder_template . '/images/img-part/Inagurasi Pendirian COSDEV-ORBICOM  (Unesco Chair on Communication).JPG' ?>" alt="">
                    <img class="img-media" src="<?= $folder_template . '/images/img-part/Ketua Pembina YPPUP memberikan Cenderamata kepada Frank La Rue (Assistent Director, UNESCO).JPG' ?>" alt="">
                    <img class="img-media" src="<?= $folder_template . '/images/img-part/Ketua Pembina YPPUP menyambut Tun Mahathir Mohamad (Mantan PM Malaysia).JPG' ?>" alt="">
                    <img class="img-media" src="<?= $folder_template . '/images/img-part/Pimpinan Fikom UP (COSDEV) dengan Presiden dan Secretary General ORBICOM di University of Lima, Peru (Mei 2018)..jpeg' ?>" alt="">
                    <img class="img-media" src="<?= $folder_template . '/images/img-part/Prof. Dr. Wahono Sumaryono, Apr (Rektor Universitas Pancasila) mendampingi Prof. Dr. Betrand Cabodace (Director, ORBICOM), berdiskusi dengan Menteri Komunikasi dan Informasi RI (Rudiantara)..JPG' ?>" alt="">
                    <img class="img-media" src="<?= $folder_template . '/images/img-part/Welcome Dinner bersama Menteri Komunikasi dan Informatika RI.JPG' ?>" alt="">
                    <img class="img-media" src="<?= $folder_template . '/images/img-part/0dc86984-5708-45e0-acb2-2271c10a5231.jpg' ?>" alt="">
                </div>      
             </div>
        </div>
        
           

		<!-- Footer -->
		<?php include('template/footer.php'); ?>

	</div>
	<?php include('template/meta_footer.php'); ?>
    <script>
		$(document).on("click", '[data-toggle="lightbox"]', function(event) {
		  event.preventDefault();
		  $(this).ekkoLightbox();
		});
	</script>

</body>

</html>