<?php
$folder_template = web_info('url') . '/' . folder_template();

//prepare the data to be displayed
$query = "SELECT * FROM artikel ORDER BY tanggal DESC LIMIT 4";

$result = $mysqli->query($query);
$detail_berita = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
    $detail_berita[$data['id_artikel']] = $data;
}
?>

<div class="sidebar_section">
    <div class="sidebar_section_title">
        <h3><?= $lang->t('Latest Posts') ?></h3>
    </div>

    <div class="latest_posts">

        <!-- Latest Post -->
        <?php foreach ($detail_berita as $berita) : ?>
            <?php 
                $judul = $berita['judul'];
                if ($lang->language == $default_language) {
                    $judul = ($berita['judul_terjemahan'] ?: $judul);
                }    
            ?>
            <div class="latest_post">
                <div class="latest_post_image">
                    <img src="<?= "/media/source/" . $berita['gambar'] ?>">
                </div>
                <div class="latest_post_title">
                    <a href="<?= "/news/id/{$berita['id_artikel']}/{$berita['judul_seo']}"; ?>"><?= $judul ?></a>
                </div>
                <div class="latest_post_meta">
                    <!-- <span class="latest_post_author"><a href="#">Admin</a></span>
                    <span>|</span> -->
                    <span class="latest_post_comments"><a href="#"><?= print_tanggal($berita['tanggal']) ?></a></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>