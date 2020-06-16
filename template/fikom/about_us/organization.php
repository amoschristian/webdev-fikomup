<?php

$query = "SELECT * FROM organization ORDER BY posisi ASC";

$result = $mysqli->query($query);
$people = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
	$people[$data['id']] = $data;
}
?>
<link rel="stylesheet" href="../template/fikom/styles/custom.css">
<script src="../template/fikom/js/modal.js"></script>

<div class="news_post">
    <div class="row ">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th width=30% scope="col"><?= $lang->t('Photo') ?></th>
                    <th width=40% scope="col"><?= $lang->t('Name') ?></th>
                    <th width=30% scope="col"><?= $lang->t('Position') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($people as $person) : ?>
                    <tr>
                        <td><img src="<?= print_image($person['gambar']) ?>"  width=150px></td>
                        <td><b><?= ($person['nama']) ?: "" ?></b></td>
                        <td><?= ($person['jabatan']) ?: "" ?></td>
                    </tr>
                <?php endforeach; ?> 
            </tbody>
        </table>   
    </div>
</div>