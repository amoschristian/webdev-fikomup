<?php

$id = isset($_GET['id']) ? $_GET['id'] : 'latest';

$data = $judul = $isi = null;
$tipeMisi = 0;
$query = "SELECT * FROM vision_mission WHERE tipe = $tipeMisi LIMIT 1;";

$result = $mysqli->query($query);

if ($result) {
	$data = $result->fetch_array(MYSQLI_ASSOC);

	$isi = $data['isi_terjemahan'];
	
	if ($lang->language != $default_language) {
		$isi = ($data['isi'] ?: $isi);
    }
}
?>

<div class="news_post">
    <div class="news_post_text">
        <p>
            <?= $isi ?>
        </p>
    </div>
</div>