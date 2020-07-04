<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config.js"></script>
<script type="text/javascript" src="js/select2.min.js"></script>
<script type="text/javascript" src="js/jquery.datetimepicker.full.min.js"></script>
<link href="css/select2.min.css" rel="stylesheet" />
<link href="css/jquery.datetimepicker.min.css" rel="stylesheet" />

<?php
if (!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=schedule_counseling";

switch ($show) {

        //Menampilkan data
    default:
        echo '<h3 class="page-header"><b>Daftar Jadwal</b>
				<a href="' . $link . '&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';

        buka_tabel(array("Judul", "Tanggal"));
        $no = 1;
        $id_user = $_SESSION['iduser'];

        if ($_SESSION['leveluser'] == "admin") $query = $mysqli->query("SELECT * FROM schedule ORDER BY tanggal DESC");
        else $query = $mysqli->query("SELECT * FROM schedule WHERE id_user='$id_user' ORDER BY tanggal DESC");
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
            $query = $mysqli->query("SELECT * FROM schedule WHERE id='$_GET[id]'");
            $data = $query->fetch_array();
            $aksi = "Edit";
        } else {
            $data = array("id" => "", "judul" => "", "tanggal" => "", "judul" => "", "judul_terjemahan" => "", "isi" => "", "isi_terjemahan" => "", "gambar" => "", "attachment" => "");
            $aksi = "Tambah";
        }

        if ($aksi == "Edit" and $_SESSION['leveluser'] != "admin" and $data['id_user'] != $_SESSION['iduser']) {
            header('location:' . $link);
        } else {
            echo '<h3 class="page-header"><b>' . $aksi . ' Pengumuman</b> </h3>';
            buka_form($link, $data['id'], strtolower($aksi));
			buat_textbox("Judul (Bahasa Indonesia)", "judul_terjemahan", $data['judul_terjemahan'], 10);
			buat_textbox("Judul (English)", "judul", $data['judul'], 10);
			buat_textarea("Isi (Bahasa Indonesia)", "isi_terjemahan", $data['isi_terjemahan'], "richtext");
            buat_textarea("Isi (English)", "isi", $data['isi'], "richtext");
			buat_textbox("Tanggal *", "tanggal", $data['tanggal'], 2, 'text', '', 'off');
			buat_imagepicker("Gambar Jadwal *", "gambar", $data['gambar'], 6);
            buat_imagepicker_multiple("Attachment", "attachment", $data['attachment'], 6);

            tutup_form($link);
        }
        break;

        //Menyisipkan atau mengedit data di database
    case "action":
        $judul = addslashes($_POST['judul']);
        $judul_terjemahan = addslashes($_POST['judul_terjemahan']);
        $isi = addslashes($_POST['isi']);
        $isi_terjemahan = addslashes($_POST['isi_terjemahan']);
		$tanggal = date('Y-m-d', strtotime($_POST['tanggal']));
		$attachment  = str_replace(['[' , ']' ,'"'], '', $_POST['attachment']);
		$user = $_SESSION['iduser'];
        
        if ($_POST['aksi'] == "tambah") {
            $mysqli->query("INSERT INTO schedule SET
				judul 		    = '$judul',
				judul_terjemahan= '$judul_terjemahan',
				isi			    = '$isi',
				isi_terjemahan  = '$isi_terjemahan',
				tanggal 		= '$tanggal',
				gambar 			= '$_POST[gambar]',
				attachment      = '$attachment',
				created_at      = now()
			");
        } elseif ($_POST['aksi'] == "edit") {
            $mysqli->query("UPDATE schedule SET
                    judul 		    = '$judul',
					judul_terjemahan= '$judul_terjemahan',
					isi			    = '$isi',
					isi_terjemahan  = '$isi_terjemahan',
					tanggal 		= '$tanggal',
					gambar 			= '$_POST[gambar]',
					attachment      = '$attachment',
					updated_at      = now()
				WHERE id='$_POST[id]'");
        }
        header('location:' . $link);
        break;

        //Menghapus data di database
    case "delete":
        $query     = $mysqli->query("SELECT * FROM schedule WHERE id='$_GET[id]'");
        $data    = $query->fetch_array();
        if ($_SESSION['leveluser'] == "admin" or $data['id_user'] == $_SESSION['iduser']) {
            $mysqli->query("DELETE FROM schedule WHERE id='$_GET[id]'");
        }
        header('location:' . $link);
        break;
}
?>

<script>
    $(document).ready(function() {
        $('[name="tanggal"]').datetimepicker({
            format:'d-M-Y',
			timepicker: false
        });
    });
</script>