<?php
$folder_template = web_info('url') . '/' . folder_template();

//prepare the data to be displayed
$query = "SELECT * FROM event ORDER BY tanggal DESC LIMIT 4";

$result = $mysqli->query($query);
$detail_event = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
    $sentences = 2;
    $text_pendek =  implode('. ', array_slice(explode('.', strip_tags($data['isi'])), 0, $sentences)) . '.';

    $detail_event[$data['id_event']] = $data;
    $detail_event[$data['id_event']]['desc'] = $text_pendek;
}
?>

<div class="sidebar_section">
    <div class="sidebar_section_title">
        <h3><?= $lang->t('Latest Events') ?></h3>
    </div>

    <div class="latest_posts">
        <!-- Latest Post -->
        <?php foreach ($detail_event as $event) : ?>
            <?php 
                $judul = $event['judul'];
                if ($lang->language != $default_language) {
                    $judul = ($event['judul_terjemahan'] ?: $judul);
                }    
            ?>
            <div class="latest_post">
                <div class="latest_post_image">
                    <img src="<?= "/media/source/" . $event['gambar'] ?>">
                </div>
                <div class="latest_post_title">
                    <a href="<?= "/news/id/{$event['id_artikel']}/{$event['judul_seo']}"; ?>"><?= $judul ?></a>
                </div>
                <div class="latest_post_meta">
                    <!-- <span class="latest_post_author"><a href="#">Admin</a></span>
                    <span>|</span> -->
                    <span class="latest_post_comments"><a href="#"><?= print_tanggal($event['tanggal']) ?></a></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>