<?php
//prepare the data to be display event
$query = "SELECT * FROM event ";
if (isset($_GET['tag'])) {
	$tag = $_GET['tag'];
	$query .= "WHERE tag LIKE '%$tag%' ";
}
$query .= "ORDER BY tanggal DESC LIMIT 3"; //show 10 per page

$result = $mysqli->query($query);
$detail_event = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
    $sentences = 2;
    $isi = $data['isi'];
    $judul = $data['judul'];
    if ($lang->language != $default_language) {
        $isi = ($data['isi_terjemahan'] ?: $isi);
        $judul = ($data['judul_terjemahan'] ?: $judul);
    }
	$text_pendek =  implode('. ', array_slice(explode('.', strip_tags($isi)), 0, $sentences)) . '.';

	$detail_event[$data['id_event']] = $data;
	$detail_event[$data['id_event']]['judul'] = $judul;
	$detail_event[$data['id_event']]['desc'] = $text_pendek;
}
?>

<div class="events page_section" id="events">
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1><?= $lang->t('Upcoming Events') ?></h1>
                </div>
            </div>
        </div>

        <div class="event_items">

            <!-- Event Item -->
            <?php if ($detail_event) : ?>
                <?php foreach ($detail_event as $event) : ?>
                    <div class="row event_item">
                        <div class="col">
                            <div class="row d-flex flex-row align-items-end">

                                <div class="col-lg-2 order-lg-1 order-2">
                                    <div class="event_date d-flex flex-column align-items-center justify-content-center">
                                        <div class="event_day"><?= date('d', strtotime($event['tanggal'])) ?></div>
                                        <div class="event_month"><?= print_tanggal($event['tanggal'], "%b") ?></div>
                                        <div class="event_year"><?= date('Y', strtotime($event['tanggal'])) ?></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 order-lg-2 order-3">
                                    <div class="event_content">
                                        <div class="event_name"><a class="trans_200" href="<?= "/event/id/{$event['id_event']}/{$event['judul_seo']}"; ?>"><?= $event['judul'] ?></a></div>
                                        <div class="event_location"><?= $event['lokasi'] ?></div>
                                        <p><?= $event['desc'] ?></p>
                                    </div>
                                </div>

                                <div class="col-lg-4 order-lg-3 order-1">
                                    <div class="event_image">
                                        <img src="<?= print_image($event['gambar']); ?>">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <h3>Events not found</h3>
            <?php endif; ?>
        </div>
    </div>
</div>