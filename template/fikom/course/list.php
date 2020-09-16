<?php 

include('ListHelper.php');

$counter = 1;

$mataKuliah = populateData($mysqli);
?>

<div class="news_post">
    <?php foreach($mataKuliah  as $label => $semester) : ?>
        <div class="news_post_text">
            <?php $counter = 1; ?>
            <table class="table table-responsive-sm">
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
                    <tbody>
                    <?php foreach($details as $id => $detail) : ?>
                        <tr>
                          <th scope="row"><?= $counter++ ?></th>
                          <td><?= (is_numeric($id) ? $id : '') ?></td>
                          <td><?= $detail[0] ?></td>
                          <td><?= $detail[1] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                <?php elseif ($section == 'peminatan' && !empty($details)): ?>
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col" colspan=4 align="center"><?= $lang->t('Mata Kuliah Peminatan *'); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($details as $id => $detail) : ?>
                        <tr>
                          <th scope="row"><?= $counter++ ?></th>
                          <td><?= (is_numeric($id) ? $id : '') ?></td>
                          <td><?= $detail[0] ?></td>
                          <td><?= $detail[1] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                <?php elseif ($section == 'minor' && !empty($details)): ?>
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col" colspan=4 align="center"><?= $lang->t('Mata Kuliah Minor **'); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($details as $id => $detail) : ?>
                        <tr>
                          <th scope="row"><?= $counter++ ?></th>
                          <td><?= (is_numeric($id) ? $id : '') ?></td>
                          <td><?= $detail[0] ?></td>
                          <td><?= $detail[1] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                <?php elseif ($section == 'pilihan' && !empty($details)): ?>
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col" colspan=4 align="center"><?= $lang->t('Mata Kuliah Pilihan **'); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($details as $id => $detail) : ?>
                        <tr>
                          <th scope="row"><?= $counter++ ?></th>
                          <td><?= (is_numeric($id) ? $id : '') ?></td>
                          <td><?= $detail[0] ?></td>
                          <td><?= $detail[1] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                <?php endif; ?>
            <?php endforeach; ?>
            </table>
        </div>
    <?php endforeach; ?>
</div>