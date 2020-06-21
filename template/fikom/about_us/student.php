<?php

$query = "SELECT * FROM student ORDER BY nama ASC";

$result = $mysqli->query($query);
$students = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
	$students[$data['id']] = $data;
}
?>
<link rel="stylesheet" href="../template/fikom/styles/custom.css">

<div class="news_post">
    <div class="row ">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th width=30% scope="col"><?= $lang->t('Photo') ?></th>
                    <th width=30% scope="col"><?= $lang->t('Name') ?></th>
                    <th width=20% scope="col"><?= $lang->t('Student ID') ?></th>
                    <th width=20% scope="col"><?= $lang->t('Major') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student) : ?>
                    <tr>
                        <td><img src="<?= print_image($student['gambar']) ?>"  width=150px></td>
                        <td><b><?= ($student['nama']) ?: "" ?></b></td>
                        <td><?= ($student['nim']) ?: "" ?></td>
                        <td><?= ($student['jurusan']) ?: "" ?></td>
                    </tr>
                <?php endforeach; ?> 
            </tbody>
        </table>   
    </div>
</div>