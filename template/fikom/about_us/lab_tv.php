<?php

$tipeYoutube = 0;

$query = "SELECT * FROM lab_tv ORDER BY created_at DESC";

$result = $mysqli->query($query);
$detail_video = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($data['video_type'] == $tipeYoutube) {
        $youtubeId = '';
        if ($data['youtube_link']) {            
            preg_match("#([\/|\?|&]vi?[\/|=]|youtu\.be\/|embed\/)([a-zA-Z0-9_-]+)#", $data['youtube_link'], $matches);
            $youtubeId = end($matches);
        }
        $data['gambar'] = "https://img.youtube.com/vi/$youtubeId/mqdefault.jpg";
        $data['youtube_embed'] = "https://www.youtube.com/embed/$youtubeId";
    } else {
        $data['gambar'] = print_image($data['gambar']);
    }

    $isi = $data['isi_terjemahan'];
    $judul = $data['judul_terjemahan'];
    if ($lang->language != $default_language) {
        $isi = ($data['isi'] ?: $isi);
        $judul = ($data['judul'] ?: $judul);
    }

	$detail_video[$data['id']] = $data;
	$detail_video[$data['id']]['judul'] = $judul;
	$detail_video[$data['id']]['desc'] = $isi;
}
?>
<link rel="stylesheet" href="../template/fikom/styles/home_custom.css">
<link rel="stylesheet" href="../template/fikom/styles/custom.css">

<style>
    .card-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr); 
      width: 100%;
    }
    .card-grid-item {
      padding: 20px;
      font-size: 30px;
      text-align: center;
    }
    .card {
        height: 100%;
    }
    .card-title {
        margin-top: 10px;
    }
    .card-img-top {
        width: 315px;
    }
    .video-container { 
        position: relative; 
        padding-bottom: 56.25%; 
        padding-top: 30px; 
        height: 0; 
        overflow: hidden; 
        margin-bottom: 25px;
    }
    .video-container iframe, .video-container object, .video-container embed { 
        position: absolute; 
        top: 0; 
        left: 0;
        width: 100%; 
        height: 100%; 
    }
    .modal-body p {
        font-size: 22px !important;
        color: #1a1a1a;
    }

    @media only screen and (max-width: 1200px) {
        .card-img-top {
            width: 250px;
        }
    }

    @media only screen and (max-width: 767px) {
        .card-grid {
          display: grid;
          grid-template-columns: repeat(1, 1fr); 
          padding: 10px;
          width: 100%;
        }
        .card-img-top {
            width: 315px;
        }
    }

    @media only screen and (max-width: 767px) {
        .card-img-top {
            width: 250px;
        }
    }
</style>
<div class="news_post">
    <div class="card-grid">
    <?php foreach ($detail_video  as $video) : ?>
        <div class="card-grid-item">
            <div class="card" data-toggle="modal" data-target="#<?= $video['id'] ?>">
                <img class="card-img-top" src="<?= $video['gambar'] ?>" alt="#">
                <div class="card-body">
                    <div class="card-title"><a href="#"><?= $video['judul']; ?></a></div>
                </div>
            </div>
        </div>
        <div class="modal fade videoModal" id="<?= $video['id'] ?>" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style=>
                        <h2><?= $video['judul'] ?><h2>
                    </div>
                    <div class="modal-body" style="text-align:center">
                        <?php if($video['video_type'] == $tipeYoutube) : ?>
                            <div class="video-container">
                                <iframe id="ytplayer" type="text/html" width="640" height="360"
                                    src="<?= $video['youtube_embed'] ?>"
                                    frameborder="0"></iframe>
                            </div>
                        <?php else: ?>
                            <video width="100%" height="100%" controls>
                              <source src="<?= "/media/source/" . $video['video'] ?>">
                                Your browser does not support the video tag.
                            </video>
                        <?php endif; ?>
                        <h2 style="text-align:left"><?= $video['desc'] ?></h1>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.videoModal').on('hide.bs.modal', function(e) {    
            var $if = $(e.delegateTarget).find('iframe');
            var src = $if.attr("src");
            $if.attr("src", '/empty.html');
            $if.attr("src", src);
            $('video').trigger('pause');
        });
    });
</script>
    
  
