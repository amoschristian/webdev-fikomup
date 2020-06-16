<?php

$query = "SELECT * FROM alumni ORDER BY nama ASC";

$result = $mysqli->query($query);
$alumni = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
	$alumni[$data['id']] = $data;
}
?>
<link rel="stylesheet" href="../template/fikom/styles/custom.css">
<script src="../template/fikom/js/modal.js"></script>

<div class="news_post">
    <div class="row ">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th width=25% scope="col"><?= $lang->t('Photo') ?></th>
                    <th width=25% scope="col"><?= $lang->t('Name') ?></th>
                    <th width=15% scope="col"><?= $lang->t('Student ID') ?></th>
                    <th width=10% scope="col"><?= $lang->t('Major') ?></th>
                    <th width=25% scope="col"><?= $lang->t('Graduated Year') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alumni as $student) : ?>
                    <tr>
                        <td><img src="<?= print_image($student['gambar']) ?>"  width=150px></td>
                        <td><b><?= ($student['nama']) ?: "" ?></b></td>
                        <td><?= ($student['nim']) ?: "" ?></td>
                        <td><?= ($student['jurusan']) ?: "" ?></td>
                        <td><?= ($student['tahun_kelulusan'] ? date('Y', strtotime($student['tahun_kelulusan']))  : "") ?></td>
                    </tr>
                <?php endforeach; ?> 
            </tbody>
        </table>   
    </div>
</div>