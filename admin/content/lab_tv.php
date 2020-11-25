<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config.js"></script>
<script type="text/javascript" src="js/validate.js"></script>

<?php
if(!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=lab_tv";
$tipeYoutube = 0;
$tipeLocal = 1;

$video_type_const = [
    0 => [
        'val' => 0,
        'check' => 'checked',
        'cap' => 'Youtube'
    ],
    1 => [
        'val' => 1,
        'check' => '',
        'cap' => 'Local Data'
    ],
];

switch($show){

	//Menampilkan data
	default:
		echo '<h3 class="page-header"><b>Daftar Video Lab TV</b>
				<a href="'.$link.'&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';
		
		buka_tabel(array("Judul Video", "Tipe", "Link", "Tanggal Posting"));
		$no = 1;
		$id_user = $_SESSION['iduser'];
		
		if($_SESSION['leveluser']=="admin") $query = $mysqli->query("SELECT * FROM lab_tv ORDER BY id DESC");
		else $query = $mysqli->query("SELECT * FROM lab_tv WHERE id_user='$id_user' ORDER BY id");
		while($data = $query->fetch_array()){					
			$tanggal = print_tanggal($data['created_at']);
			$tipe = 'Youtube Link';
			if ($data['video_type'] == $tipeLocal) {
				$tipe = 'Local Data';
			}

			$youtube_link = '';
			if ($data['video']) {

			}
			
			isi_tabel($no, array($data['judul_terjemahan'], $tipe, $youtube_link, $tanggal), $link, $data['id']);
			$no++;
		} 
		tutup_tabel();
		
		break;
	
	//Menampilkan form input dan edit data
	case "form":
		$video_type_list = $video_type_const; //NEVER CHANGE CONSTANT ARRAY
		if(isset($_GET['id'])){
			$query 	= $mysqli->query("SELECT * FROM lab_tv WHERE id='$_GET[id]'");
			$data	= $query->fetch_array();
			$aksi 	= "Edit";
		}else{
			$data = array("id"=>"", "judul"=>"", "judul_terjemahan" => "", "isi" =>"", "isi_terjemahan" => "", "video_type" => "", "video" => "", "gambar" => "", "youtube_link" => "");
			$aksi 	= "Tambah";
		}
		
		if($aksi=="Edit" and $_SESSION['leveluser']!="admin" and $data['id_user']!=$_SESSION['iduser']){
			header('location:'.$link);
		}else{
			if ($data['video_type']) {
                $video_type_list[$data['video_type']]['check'] = 'checked'; 
			}
			
			echo '<h3 class="page-header"><b>' . $aksi . ' Video</b> </h3>';
			buka_form($link, $data['id'], strtolower($aksi));
			buat_textbox("Judul Video (Bahasa Indonesia) *", "judul_terjemahan", $data['judul_terjemahan'], 10, true);
			buat_textbox("Judul Video (English)", "judul", $data['judul'], 10);
			buat_radio("Tipe Video", "video_type", $video_type_list);
			buat_textbox("Link Youtube", "youtube_link", $data['youtube_link'], 10);
			buat_imagepicker("Upload Video", "video", $data['video'], 4, false);
			buat_notes("video", "Supported format: MP4, WEBM");
			buat_imagepicker("Video Thumbnail", "gambar", $data['gambar']);
			buat_textarea("Isi Video (Bahasa Indonesia)", "isi_terjemahan", $data['isi_terjemahan'], "richtext");
            buat_textarea("Isi Video (English)", "isi", $data['isi'], "richtext");
            tutup_form($link);
		}
		break;	
	
	//Menyisipkan atau mengedit data di database
	case "action":
		$judul = addslashes($_POST['judul']);
        $judul_seo = convert_seo($_POST['judul']);
        $judul_terjemahan = addslashes($_POST['judul_terjemahan']);
        $isi = addslashes($_POST['isi']);
		$isi_terjemahan = addslashes($_POST['isi_terjemahan']);
		$youtube_link = $_POST['youtube_link'];
		$video = $_POST['video'];
		$video_type = $_POST['video_type'];
		$user = $_SESSION['iduser'];
		
		try {
			mysqli_report(MYSQLI_REPORT_ALL);

			if ($_POST['aksi'] == "tambah") {
				$mysqli->query("INSERT INTO lab_tv SET
					judul 		    = '$judul',
					judul_seo 	    = '$judul_seo',
					judul_terjemahan= '$judul_terjemahan',
					isi			    = '$isi',
					isi_terjemahan  = '$isi_terjemahan',
					id_user		    = '$user',
					youtube_link	= '$youtube_link',
					video			= '$video',
					video_type		= '$video_type',
					gambar 		    = '$_POST[gambar]',
					created_at		= now()		
				");
			} elseif ($_POST['aksi'] == "edit") {
				$mysqli->query("UPDATE lab_tv SET
						judul 		    = '$judul',
						judul_seo 	    = '$judul_seo',
						judul_terjemahan= '$judul_terjemahan',
						isi			    = '$isi',
						isi_terjemahan  = '$isi_terjemahan',
						id_user		    = '$user',
						youtube_link	= '$youtube_link',
						video			= '$video',
						video_type		= '$video_type',
						gambar 		    = '$_POST[gambar]',
						updated_at		= now()
					WHERE id ='$_POST[id]'");
			}
		} catch(Exception $e) {
			include_once "../plugin/logger/Logger.php";
			Logger::error('SQL Error', [$e->getMessage()]);
			Logger::error($e->getTraceAsString());
		} 
		mysqli_report(MYSQLI_REPORT_OFF);
		header('location:'.$link);
		break;
	
	//Menghapus data di database
	case "delete":
		$query 	= $mysqli->query("SELECT * FROM lab_tv WHERE id ='$_GET[id]'");
		$data	= $query->fetch_array();
		if($_SESSION['leveluser']=="admin" or $data['id_user']==$_SESSION['iduser']){
			$mysqli->query("DELETE FROM lab_tv WHERE id ='$_GET[id]'");
		}
		header('location:'.$link);
		break;
}
?>

<script>
    $(document).ready(function() {	
		$("input[name='video_type']").on("change", function(){
			showUploadField();
		});

		function showUploadField() {
			$('#imagepicker-video').hide();
			$('#imagepicker-gambar').hide();
			$('#youtube_link').hide();
			$('#notes-video').hide();

			var value = $("input[name='video_type']:checked").val();
			if (value == 0) { //Youtube
				$('#youtube_link').show();
			} else { //Local Data
				$('#imagepicker-video').show();
				$('#imagepicker-gambar').show();
				$('#notes-video').show();
			}
		}

		showUploadField();
	});
	
</script>