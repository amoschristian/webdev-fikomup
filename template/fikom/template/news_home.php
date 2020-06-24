<?php
//prepare the data to be display news
$query = "SELECT * FROM artikel ";
if (isset($_GET['tag'])) {
	$tag = $_GET['tag'];
	$query .= "WHERE tag LIKE '%$tag%' ";
}
$query .= "ORDER BY tanggal DESC LIMIT 3"; //show 10 per page

$result = $mysqli->query($query);
$detail_berita = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
    $sentences = 1;
    $isi = $data['isi'];
    $judul = $data['judul'];
    if ($lang->language == $default_language) {
        $isi = ($data['isi_terjemahan'] ?: $isi);
        $judul = ($data['judul_terjemahan'] ?: $judul);
    }
	$text_pendek =  implode('. ', array_slice(explode('.', strip_tags($isi)), 0, $sentences)) . '.';

    $detail_berita[$data['id_artikel']] = $data;
    $detail_berita[$data['id_artikel']]['judul'] = $judul;
	$detail_berita[$data['id_artikel']]['desc'] = $text_pendek;
}

$berita_pertama = reset($detail_berita); //use for headline
$detail_berita_headline = $detail_berita;
unset($detail_berita_headline[$berita_pertama['id_artikel']]);
?>

<div class="news page_section pub-back" id="publications"> 
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center" >
                    <h1 style="color:white;"><?= $lang->t('Publications') ?></h1>
                </div>
            </div>
        </div>
        <div class="row course_boxes">
            <?php if ($detail_berita) : ?>
                <?php foreach ($detail_berita as $berita) : ?>
                    <!-- news -->
                    <div class="col-lg-4 course_box">
                        <div class="card">
                            <img class="card-img-top" src="<?= "/media/source/" . $berita['gambar'] ?>" alt="#">
                            <div class="card-body">
                                <div class="card-title"><a href="#"><?= $berita['judul']; ?></a></div>
                                <div class="card-text"><?= $berita['desc'] ?></div>
                                <div class="price_box d-flex flex-row">
                                    <div class="read-more-btn"><span><a href="<?= "/news/id/{$berita['id_artikel']}/{$berita['judul_seo']}"; ?>"><?= $lang->t('Read More') ?><i class="fas fa-arrow-right" style="margin-left:10px; "></i></a></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <h3>News not found</h3>
            <?php endif; ?>
        </div>
    </div>
</div>