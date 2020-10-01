<?php

$id = isset($_GET['id']) ? $_GET['id'] : 'latest';

$data = $judul = $isi = null;
$tipeVisi = 1;
$query = "SELECT * FROM vision_mission WHERE tipe = $tipeVisi LIMIT 1;";

$result = $mysqli->query($query);

if ($result) {
	$data = $result->fetch_array(MYSQLI_ASSOC);

	$isi = $data['isi_terjemahan'];
	
	if ($lang->language != $default_language) {
		$isi = ($data['isi'] ?: $isi);
    }

    $firstLetter = '<span>' . substr($isi, 0, 1) . '</span>';
    $isi = substr_replace($isi, $firstLetter, 0, 1);
}
?>

<div class="news_post">
    <div class="news_post_quote">
        <p class="news_post_quote_text">
            <?= $isi ?>
        </p>
    </div>
</div>