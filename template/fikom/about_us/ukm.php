<?php

$query = "SELECT * FROM lecturer ORDER BY nama_dosen ASC";

$result = $mysqli->query($query);
$detail_lecturer = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
	$detail_lecturer[$data['id_lecturer']] = $data;
}

$ukmArray = [
    ['CEC FIKOM Pancasila', 'cec_fikomup.jpeg'],
    ['KKM Futsal FIKom UP', 'futsal_fikomup.jpeg'],
    ['FikomUP Basketball', 'basket_fikomup.png'],
    ['Muaythai Komunikasi', 'muaythai_fikomup.jpeg'],
    ['Rohis Fikom UP', 'rohis_fikomup.jpg'],
    ['SERUNI FIKOM UP', 'seruni_fikomup.jpg'],
    ['Cinema.Kom Fikom UP', 'cinemakom_fikomup.jpg']
];

?>
<link rel="stylesheet" href="../template/fikom/styles/custom.css">
<script src="../template/fikom/js/modal.js"></script>

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
        <?php foreach ($ukmArray  as $ukm) : ?>
            <div class="col-lg-4 col-md-4 col-6">
                <div class="card" style="
                    background:url(<?= "/template/fikom/images/ukm/" . $ukm['1'] ?>);
                    background-position: center center;
                    background-repeat: no-repeat;
                    background-size: cover;
                ">
                  <div class="card-body">
                    <div class="card-text"><?= strtoupper($ukm[0]) ?></div>
                  </div>
                </div>
            </div>
        <?php endforeach; ?> 
    </div>
</div>

    
  
