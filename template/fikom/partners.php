<?php
$folder_template = web_info('url') . '/' . folder_template();

$query = "SELECT * FROM partner ORDER BY id_partner ASC";
$detail_query = "SELECT * FROM partner WHERE id_partner = $halaman";

$result = $mysqli->query($detail_query);
$detail_partner = [];
$list_result = $mysqli->query($query);
$list_partner = [];

$multi_gambar = [];
$isi = '';

if ($result) {
    $partner_detail = $result->fetch_array(MYSQLI_ASSOC);
    $isi = $partner_detail['gallery_partner'];
    $multi_gambar = explode(",", $isi);
    $deskripsi = $partner_detail['deskripsi'];

    if ($lang->language != $default_language) {
        $deskripsi = ($partner_detail['deskripsi_terjemahan'] ?: $deskripsi);
    }
}

if ($list_result) {
    while ($list_data = $list_result->fetch_array(MYSQLI_ASSOC)){
        $list_partner[] = $list_data;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
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
    width:150px;
}

.img-media{
    height:300px;
    width:300px;
    object-fit:cover;
    padding-top:5px;
}

.text-p {
    font-size: 4rem;
    font-family: 'Libre Franklin', sans-serif;
    color: white; 
    text-align:center;
    background-color:#ff4e00;
    border-radius: 5px;   
}

.text-p2 {
    font-size: 4rem;
    font-family: 'Libre Franklin', sans-serif;
    color: #ff4e00;
    text-align:center;
    border-radius: 5px;
    
}

.col-bg {
    background-color:white;
    margin-bottom:10px;

}

.col-bg2 {
    background-color:white;
    margin-bottom:10px;
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
    padding-top: 10px;
    height: 142vh;
    background-color:#f1f1f1;
    padding-bottom:10px;
    border-radius: 5px;
}

.carous{
    padding-top:10px;
    height: 100vh;
    width: auto;
    padding-bottom:10px;
}
.desc-part{
    height:35vh;
    padding-left:10px;
    padding-right:10px;
    overflow: scroll;   
}
.text-desc p{
    font-size:2.05rem !important;
    color: black;
}

.partner-items {
    margin-bottom: 10px;
}
@media only screen and (max-width: 992px) {
  .text-p {
   width:100vw;
  }
  .gall{
      width:100vw;
  }
  .bor{
      width:100vw;
  }
  .desc-part{
      width:100vw;
  }
  .carous{
      width:100vw;
  }
}


.img-slide {
    object-fit: cover;
}

#home{
    background: linear-gradient(rgba(0, 0, 0, 0.719), rgba(0, 0, 0, 0.699)),
    url(/template/fikom/images/background/partners.jpg);
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
				<h1><?= $lang->t('Partners') ?></h1>
			</div>
		</div>

		<!-- News -->
		<div class="container part">
            <div class="col-md-4 col-bg">
            
                <div class="text-p">
                    <?= $lang->t('Our Partners') ?>
                </div>  
                <div class=" gall">
                <?php foreach ($list_partner as $partner) : ?>
                    <div class="partner-items">
                        <a href="/partners/<?= $partner['id_partner'] ?>"><img class="img-part"  src="<?= print_image($partner['logo_partner']);?>" alt=""></a>
                    </div>
                <?php endforeach; ?>
                </div> 
               
            </div>
        
            <div class="col-md-8 col-bg2">
                <div class="text-p2 bor">
                    <?= $lang->t('Description') ?>
                </div>
                <div class="desc-part">
                    <div class="text-desc"><?= $deskripsi ?></div>
                </div>

                <div class="text-p2 bor ">
                    <?= $lang->t('Gallery') ?>
                </div>
                    
                <div class="hero_slider_container carous">
				    <div class="hero_slider owl-carousel">

					<!-- Hero Slide -->
                    <?php foreach ($multi_gambar as $gambar) : ?>
					    <div class="hero_slide">
						    <div class="hero_slide_background img-slide" style="background-image:url(<?= print_image($gambar); ?>)"></div>
					    </div>
                    <?php endforeach; ?>
				    </div>
			    </div>
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