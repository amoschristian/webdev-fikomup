<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config.js"></script>
<script type="text/javascript" src="js/select2.min.js"></script>
<link href="css/select2.min.css" rel="stylesheet" />


<?php
if (!defined("INDEX")) header('location: ../index.php');
$tipeCourse = 1;

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=announcement_course";

switch ($show) {

    //Menampilkan data
    default:
        echo '<h3 class="page-header"><b>Daftar Pengumuman</b>
				<a href="' . $link . '&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';

        buka_tabel(array("Judul Pengumuman", "Tanggal Posting"));
        $no = 1;
        $id_user = $_SESSION['iduser'];

        if ($_SESSION['leveluser'] == "admin") $query = $mysqli->query("SELECT * FROM announcement WHERE tipe = $tipeCourse ORDER BY tanggal DESC");
        else $query = $mysqli->query("SELECT * FROM announcement WHERE id_user='$id_user' AND tipe = $tipeCourse ORDER BY tanggal DESC");
        while ($data = $query->fetch_array()) {
			$tanggal = print_tanggal($data['tanggal']);
			
            isi_tabel($no, array($data['judul'], $tanggal), $link, $data['id']);
            $no++;
        }
        tutup_tabel();

        break;

        //Menampilkan form input dan edit data
    case "form":
        if (isset($_GET['id'])) {
            $query = $mysqli->query("SELECT * FROM announcement WHERE id='$_GET[id]'");
            $data = $query->fetch_array();
            $aksi = "Edit";
        } else {
            $data = array("id" => "", "judul" => "", "judul_terjemahan" => "", "isi" => "", "isi_terjemahan" => "", "gambar" => "");
            $aksi = "Tambah";
        }

        if ($aksi == "Edit" and $_SESSION['leveluser'] != "admin" and $data['id_user'] != $_SESSION['iduser']) {
            header('location:' . $link);
        } else {
            echo '<h3 class="page-header"><b>' . $aksi . ' Pengumuman</b> </h3>';
			buka_form($link, $data['id'], strtolower($aksi));
			buat_textbox("Judul Pengumuman (Bahasa Indonesia)", "judul_terjemahan", $data['judul_terjemahan'], 10);
			buat_textbox("Judul Pengumuman (English)", "judul", $data['judul'], 10);
			buat_textarea("Isi Pengumuman (Bahasa Indonesia)", "isi_terjemahan", $data['isi_terjemahan'], "richtext");
            buat_textarea("Isi Pengumuman (English)", "isi", $data['isi'], "richtext");
            buat_imagepicker("Gambar", "gambar", $data['gambar']);

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
        $tag = implode(",", $_POST['tag']);
        $user = $_SESSION['iduser'];
        
        if ($_POST['aksi'] == "tambah") {
            $mysqli->query("INSERT INTO announcement SET
				tipe			= $tipeCourse,
				judul 		    = '$judul',
				judul_seo 	    = '$judul_seo',
				judul_terjemahan= '$judul_terjemahan',
				isi			    = '$isi',
				isi_terjemahan  = '$isi_terjemahan',
				hari		    = '$hari_ini',
				tanggal		    = '$tanggal',
				jam			    = '$jam',
				id_user		    = '$user',
				tag			    = '$tag',
				kategori	    = '$_POST[kategori]',
				gambar 		    = '$_POST[gambar]',
                created_at      = now()
			");
        } elseif ($_POST['aksi'] == "edit") {
            $mysqli->query("UPDATE announcement SET
					judul 		    = '$judul',
					judul_seo 	    = '$judul_seo',
                    judul_terjemahan= '$judul_terjemahan',
					isi			    = '$isi',
                    isi_terjemahan  = '$isi_terjemahan',
					hari		    = '$hari_ini',
					tanggal		    = '$tanggal',
					jam			    = '$jam',
					id_user		    = '$user',
					tag			    = '$tag',
					kategori	    = '$_POST[kategori]',
					gambar 		    = '$_POST[gambar]',
                    updated_at      = now()
				WHERE id='$_POST[id]'");
        }
        header('location:' . $link);
        break;

        //Menghapus data di database
    case "delete":
        $query     = $mysqli->query("SELECT * FROM announcement WHERE id='$_GET[id]'");
        $data    = $query->fetch_array();
        if ($_SESSION['leveluser'] == "admin" or $data['id_user'] == $_SESSION['iduser']) {
            $mysqli->query("DELETE FROM announcement WHERE id='$_GET[id]'");
        }
        header('location:' . $link);
        break;
}
?>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>