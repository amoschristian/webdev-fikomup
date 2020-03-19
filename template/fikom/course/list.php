<?php 

include('ListHelper.php');

$counter = 1;

$semester4 = initSemester1();

$mataKuliah = [
  'Semester 1' => initSemester1(),
  'Semester 2' => initSemester2(),
  'Semester 3' => initSemester3(),
  'Semester 4' => initSemester4()
];

?>

<div class="news_post">
    <div class="news_post_text">
        <?php foreach($mataKuliah  as $label => $semester) : ?>
            <?php $counter = 1; ?>
            <table class="table" style="margin-bottom:50px">
            <h1><?= $label ?></h1>
            <?php foreach($semester as $section => $details): ?>
                <?php if($section == 'general'): ?>
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col"></th>
                        <th scope="col"><?= $lang->t('Kode MK'); ?></th>
                        <th scope="col"><?= $lang->t('Mata Kuliah'); ?></th>
                        <th scope="col"><?= $lang->t('SKS'); ?></th>
                      </tr>
                    </thead>
                    <?php foreach($details as $id => $detail) : ?>
                        <tr>
                          <th scope="row"><?= $counter++ ?></th>
                          <td><?= (is_numeric($id) ? $id : '') ?></td>
                          <td><?= $detail[0] ?></td>
                          <td><?= $detail[1] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php elseif ($section == 'peminatan' && !empty($details)): ?>
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col" colspan=4 align="center"><?= $lang->t('Mata Kuliah Peminatan *'); ?></th>
                      </tr>
                    </thead>
                    <?php foreach($details as $id => $detail) : ?>
                        <tr>
                          <th scope="row"><?= $counter++ ?></th>
                          <td><?= (is_numeric($id) ? $id : '') ?></td>
                          <td><?= $detail[0] ?></td>
                          <td><?= $detail[1] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php elseif ($section == 'minor' && !empty($details)): ?>
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col" colspan=4 align="center"><?= $lang->t('Mata Kuliah Minor **'); ?></th>
                      </tr>
                    </thead>
                    <?php foreach($details as $id => $detail) : ?>
                        <tr>
                          <th scope="row"><?= $counter++ ?></th>
                          <td><?= (is_numeric($id) ? $id : '') ?></td>
                          <td><?= $detail[0] ?></td>
                          <td><?= $detail[1] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            </table>
        <?php endforeach; ?>
    </div>
</div>