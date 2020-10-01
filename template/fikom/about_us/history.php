<?php

$data = $judul = $isi = null;
$currentRecordQuery = "SELECT * FROM history ORDER BY created_at LIMIT 1;";

$result = $mysqli->query($currentRecordQuery);

if ($result) {
	$data = $result->fetch_array(MYSQLI_ASSOC);
	
	$judul = $data['judul_terjemahan'];
	$isi = $data['isi_terjemahan'];
	
	if ($lang->language != $default_language) {
		$judul = ($data['judul'] ?: $judul);
		$isi = ($data['isi'] ?: $isi);
    }
    
    $firstLetter = '<span>' . substr($judul, 0, 1) . '</span>';
    $judul = substr_replace($judul, $firstLetter, 0, 1);
	
}
?>

<div class="news_post">
    <div class="news_post_quote">
        <p class="news_post_quote_text">
            <?= $judul ?>
        </p>
    </div>

    <div class="news_post_text">
        <?= $isi ?>
    </div>
</div>