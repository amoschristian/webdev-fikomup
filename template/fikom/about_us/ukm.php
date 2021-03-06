<?php

$query = "SELECT * FROM ukm ORDER BY nama ASC";

$result = $mysqli->query($query);
$detail_ukm = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
	$detail_ukm[$data['id']] = $data;
}

?>
<link rel="stylesheet" href="../template/fikom/styles/custom.css">

<style>
.card {
    width: 100%;
    height: 200px;
    margin-bottom: 50px;
}

.card-body {
    border: none;
    height: 100%;
    text-align:center;
    padding:0;
}

.card-text {
    position: absolute;
    bottom: 0px;
    width: 100%;
    font-size: 18px;
    background: linear-gradient(rgba(0, 0, 0, 0.719), rgba(0, 0, 0, 0.699));
}
</style>


<div class="news_post">
    <div class="row ">
        <?php foreach ($detail_ukm as $ukm) : ?>
            <div class="col-lg-4 col-md-4 col-6">
                <div class="card" style="
                    background:url(<?= print_image($ukm['gambar'])?>);
                    background-position: center center;
                    background-repeat: no-repeat;
                    background-size: cover;
                ">
                  <div class="card-body">
                    <div class="card-text"><?= strtoupper($ukm['nama']) ?></div>
                  </div>
                </div>
            </div>
        <?php endforeach; ?> 
    </div>
</div>

    
  
