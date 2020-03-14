<?php 
//prepare the data to be display news
$sentences = 1;

$headline_query = $mysqli->query("SELECT * FROM artikel WHERE headline = 1 LIMIT 1");
$headline_news = $headline_query->fetch_array();

$headline_isi = $headline_news['isi'];
$headline_judul = $headline_news['judul'];

$text_pendek =  implode('. ', array_slice(explode('.', strip_tags($headline_isi)), 0, $sentences)) . '.';

$headline_news['judul'] = $headline_judul;
$headline_news['desc'] = $text_pendek;

$sub_news = [];
$sub_news_query = $mysqli->query("SELECT * FROM artikel WHERE headline = 2  ORDER BY tanggal DESC LIMIT 3");

while ($data = $sub_news_query->fetch_array(MYSQLI_ASSOC)) {
    $sentences = 1;
    $isi = $data['isi'];
    $judul = $data['judul'];
    if ($lang->language != $default_language) {
        $isi = ($data['isi_terjemahan'] ?: $isi);
        $judul = ($data['judul_terjemahan'] ?: $judul);
    }
	$text_pendek =  implode('. ', array_slice(explode('.', strip_tags($isi)), 0, $sentences)) . '.';

    $sub_news[$data['id_artikel']] = $data;
    $sub_news[$data['id_artikel']]['judul'] = $judul;
	$sub_news[$data['id_artikel']]['desc'] = $text_pendek;
}

?>

<style>
	.headline {
		background: url(<?= "/media/source/" . $headline_news['gambar'] ?>);
		background-position: center center;
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>

<div class="popular page_section" id="headline">
    <div class="container">
        <!-- Headling -->
        <div class="col-sm-12" style="margin-top:20px">
            <div class="col-sm-8" style="padding:0">
                <div class="card mb-3">
                    <div class="row no-gutters headline">
                        <div class="col-md-6">
                            <div class="card-body-hd">
                                <div class="card-title"><a href="<?= "/news/id/{$headline_news['id_artikel']}/{$headline_news['judul_seo']}"; ?>"><?= $headline_news['judul']; ?></a></div>
                                <p class="card-text"><?= $headline_news['desc'] ?></p>
                                <div class="read-more-btn"><span><a href="<?= "/news/id/{$headline_news['id_artikel']}/{$headline_news['judul_seo']}"; ?>"><?= $lang->t('Read More') ?><i class="fas fa-arrow-right" style="margin-left:10px; color: transparent"></i></a></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media Feed -->
            <div class="col-sm-4 text-left" style="padding-left: 20px">
                <div class="ig-feed">
                    <h1><img src="https://cdn.discordapp.com/attachments/658904235609686033/682249668998070365/PngItem_323894.png" width="30px"></img><a href="https://www.instagram.com/fikomup" target="_blank" class="ig-link"> fikomup</a></h1>
                    <div class="ig-feed-box" id="instafeed">
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/instafeed.js/1.4.1/instafeed.min.js"></script>
                        <script src="https://matthewelsom.com/assets/js/libs/instafeed.min.js"></script>
                        <script>
                            var userFeed = new Instafeed({
                                target: 'instafeed',
                                get: 'user',
                                userId: '8987997106',
                                clientId: '924f677fa3854436947ab4372ffa688d',
                                accessToken: '8987997106.924f677.8555ecbd52584f41b9b22ec1a16dafb9',
                                resolution: 'thumbnail',
                                template: '<a href="{{link}}" target="_blank" id="{{id}}"><img src="{{image}}" /></a>',
                                sortBy: 'most-recent',
                                limit: 8,
                                links: false
                            });
                            userFeed.run();
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="row course_boxes">
                <?php if ($sub_news) : ?>
                    <?php foreach ($sub_news as $idx => $berita) : ?>
                        <!-- news -->
                        <div class="col-lg-4 course_box">
                            <div class="card">
                                <img class="card-img-top" src="<?= "/media/source/" . $berita['gambar'] ?>" alt="#">
                                <div class="card-body">
                                    <div class="card-title"><a href="<?= "/news/id/{$berita['id_artikel']}/{$berita['judul_seo']}"; ?>"><?= $berita['judul']; ?></a></div>
                                    <div class="card-text"><?= $berita['desc'] ?></div>
                                    <div class="price_box d-flex flex-row">
                                        <div class="read-more-btn"><span><a href="<?= "/news/id/{$berita['id_artikel']}/{$berita['judul_seo']}"; ?>"><?= $lang->t('Read More') ?><i class="fas fa-arrow-right" style="margin-left:10px; "></i></a></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>