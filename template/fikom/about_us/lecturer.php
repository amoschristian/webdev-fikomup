<?php

$query = "SELECT * FROM lecturer ORDER BY nama_dosen ASC";

$result = $mysqli->query($query);
$detail_lecturer = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
	$detail_lecturer[$data['id_lecturer']] = $data;
}
?>
<link rel="stylesheet" href="../template/fikom/styles/custom.css">
<script src="../template/fikom/js/modal.js"></script>


    <div class="news_post">
        <div class="row ">
            <?php foreach ($detail_lecturer  as $lecturer) : ?>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="cont">
                        <img data-toggle="modal" data-target="#<?= $lecturer['id_lecturer'] ?>" class="lecturer-img" alt="" id="" src="<?= print_image($lecturer['gambar']); ?>">
                            <div class="overlay">
                                <div class="text"><?= $lecturer['nama_dosen'] ?></div>
                            </div>
                    </div>
                </div>
        <div class="modal fade" id="<?= $lecturer['id_lecturer'] ?>" role="dialog">
            <div class="modal-dialog">
        
        <!-- Modal content-->
            <div class="modal-content">
            
                <div class="modal-header">
                    <img  class="img-modal" alt="" id="" src="<?= print_image($lecturer['gambar']); ?>">
                </div>
                    <div class="modal-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td> <?= $lang->t('Lecturer Registration Number') ?> : <?= $lecturer['npd'] ?> </td>
                                </tr>
                                <tr>
                                    <td> <?= $lang->t('N I D N') ?> : <?= $lecturer['nidn'] ?></td>
                                </tr>
                                <tr>
                                    <td> <?= $lang->t('Title') ?> : <?= $lecturer['gelar'] ?></td>
                                </tr>
                                <tr>
                                    <td> <?= $lang->t('Gender') ?> : <?= $lecturer['jenis_kelamin'] ?></td>
                                </tr>
                                <tr>
                                    <td> <?= $lang->t('Field of Study') ?> : <?= $lecturer['bidang_kajian'] ?></td>
                                </tr>
                                <tr>
                                    <td> <?= $lang->t('Last Position') ?> : <?= $lecturer['kepangkatan'] ?></td>
                                </tr>
                                <tr>
                                    <td> <?= $lang->t('Last Education') ?> : <?= $lecturer['pendidikan'] ?></td>
                                </tr>
                                <tr>
                                    <td> <?= $lang->t('Last University') ?> : <?= $lecturer['peguruan_tinggi'] ?></td>
                                </tr>
                                <tr>
                                    <td> <?= $lang->t('Position') ?> : <?= $lecturer['jabatan'] ?></td>
                                </tr>
                                <tr>
                                    <td> <?= $lang->t('Email') ?> : <?= $lecturer['email'] ?></td>
                                </tr>      
                            </tbody>
                        </table>
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

    
  
