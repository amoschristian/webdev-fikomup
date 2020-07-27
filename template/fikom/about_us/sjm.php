<?php

$id = isset($_GET['id']) ? $_GET['id'] : 'latest';

$data = $judul = $isi = null;
$tipeSjm = 2;
$currentRecordQuery = "SELECT * FROM announcement WHERE id = $id AND tipe = $tipeSjm LIMIT 1;";

if ($id == 'latest') {
    $currentRecordQuery = "SELECT * FROM announcement WHERE tipe = $tipeSjm ORDER BY created_at LIMIT 1;";
}

$result = $mysqli->query($currentRecordQuery);

if ($result) {
	$data = $result->fetch_array(MYSQLI_ASSOC);

	$judul = $data['judul'];
	$gambar = $data['gambar'];
	$tanggal = $data['tanggal'];
	
	$judul = $data['judul_terjemahan'];
	$isi = $data['isi_terjemahan'];
	
	if ($lang->language != $default_language) {
		$judul = ($data['judul'] ?: $judul);
		$isi = ($data['isi'] ?: $isi);
	}
	
	$id = $data['id'];
}

$nextRecord = null;
$prevRecord = null;

//prepare the data to be displayed
$nextRecordQuery = "SELECT * FROM announcement WHERE id > $id AND tipe = $tipeSjm ORDER BY id ASC LIMIT 1;";
$nextRecordResult = $mysqli->query($nextRecordQuery);
if ($nextRecordResult) {
	$nextRecord = $nextRecordResult->fetch_array(MYSQLI_ASSOC);
}

$prevRecordQuery = "SELECT * FROM announcement WHERE id < $id AND tipe = $tipeSjm ORDER BY id DESC LIMIT 1;";
$prevRecordResult = $mysqli->query($prevRecordQuery);
if ($prevRecordResult) {
	$prevRecord = $prevRecordResult->fetch_array(MYSQLI_ASSOC);
}

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<style>
    .sjm_post {
        text-align: center;
    }

    .sjm_post_title {
        margin-top: 20px;
        font-size: 30px;
    }

    .sjm_post_text p {
        text-align: left;
        font-size: 20px !important;
    }

    .pager {
        margin-top: 100px;
    }

    .previous > a {
        background-color: #f44f00 !important;
        border: none !important;
    }

    .next > a {
        background-color: #f44f00 !important;
        border: none !important;
	}
	
	.pager {
		font-family: 'Libre Franklin', sans-serif;
	}
</style>

<?php if ($data): ?>

    <div class="container" style="margin-top:20px">
		<div class="row"
			<div class="col-lg-8"
				<div class="sjm_post_container">
					<div class="sjm_post" style="width: 100%">
						<div class="sjm_post_image">
							<img src="<?= print_image($gambar) ?>" style="width:100%">
						</div>
						<div class="sjm_post_top d-flex flex-column flex-sm-row">
							<div>
								<div class="sjm_post_title">
                                    <?= $judul ?>
								</div>
							</div>
                        </div>
						<div class="sjm_post_text">
							<?= $isi ?>
                        </div>
                        <ul class="pager">
							<?php if ($prevRecord) : ?>
								<li class="previous"><a href="<?="/about-us/sjm/id/{$prevRecord['id']}"; ?>"><i class="fas fa-arrow-left"></i> Prev</a></i></li>
							<?php endif; ?>
							<?php if ($nextRecord) : ?>
								<li class="next"><a href="<?="/about-us/sjm/id/{$nextRecord['id']}"; ?>">Next <i class="fas fa-arrow-right"></i></a></li>
							<?php endif; ?>
                        </ul>
                    </div
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>