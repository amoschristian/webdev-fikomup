<?php

$query = "SELECT * FROM facility ORDER BY nama_terjemahan ASC";

$result = $mysqli->query($query);
$detail_facility = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
    $isi = $data['isi'];
    $nama = $data['nama'];
    if ($lang->language == $default_language) {
        $isi = ($data['isi_terjemahan'] ?: $isi);
        $nama = ($data['nama_terjemahan'] ?: $nama);
    }

    $detail_facility[$data['id']] = $data;
    $detail_facility[$data['id']]['nama'] = $nama;
    $detail_facility[$data['id']]['isi'] = $isi;
}
?>
<link rel="stylesheet" href="../template/fikom/styles/custom.css">

<style>
    .img-modal{
        width: 100%;
        height: auto;
    }
</style>

<div class="news_post">
    <div class="row ">
        <?php foreach ($detail_facility as $facility) : ?>
            <div class="col-lg-3 col-md-4 col-6">
                <div class="cont">
                    <img data-toggle="modal" data-target="#<?= $facility['id'] ?>" class="lecturer-img" alt="" id="" src="<?= print_image($facility['gambar']); ?>">
                        <div class="overlay">
                            <div class="text"><?= $facility['nama'] ?></div>
                        </div>
                </div>
            </div>
        <div class="modal fade" id="<?= $facility['id'] ?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <img  class="img-modal" alt="" id="" src="<?= print_image($facility['gambar']); ?>">
                </div>
                    <div class="modal-body">
                        <h2><?= $facility['nama'] ?></h2>
                        <h3 style="margin-bottom:2rem; font-style:italic"><?= $facility['lokasi'] ?></h3>
                        <span><?= $facility['isi'] ?></span>
                    </div>
            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?> 
    </div>
</div>

    
  
