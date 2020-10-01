<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config_custom.js"></script>
<script type="text/javascript" src="js/validate.js"></script>

<?php
if (!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=vision_mission";

switch ($show) {

        //Menampilkan data
    default:
        echo '<h3 class="page-header"><b>Visi dan Misi</b>
				<a href="' . $link . '&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';

        buka_tabel(array("Jenis Data", "Tanggal Posting"));
        $no = 1;
        $id_user = $_SESSION['iduser'];

        if ($_SESSION['leveluser'] == "admin") $query = $mysqli->query("SELECT * FROM vision_mission ORDER BY created_at DESC");
        else $query = $mysqli->query("SELECT * FROM vision_mission WHERE id_user='$id_user' ORDER BY created_at DESC");
        while ($data = $query->fetch_array()) {
            $tanggal = print_tanggal($data['created_at']);

            $dataType = ($data['tipe'] == 1 ? 'Visi' : 'Misi');
            isi_tabel($no, array($dataType, $tanggal), $link, $data['id'], true, false);
            $no++;
        }
        tutup_tabel();

        break;

        //Menampilkan form input dan edit data
    case "form":
        if (isset($_GET['id'])) {
            $query = $mysqli->query("SELECT * FROM vision_mission WHERE id='$_GET[id]'");
            $data = $query->fetch_array();
            $aksi = "Edit";
        } else {
            $data = array("id" => "", "judul" => "", "judul_terjemahan" => "", "isi" => "", "isi_terjemahan" => "", "gambar" => "", "kategori" => "");
            $aksi = "Tambah";
        }

        if ($aksi == "Edit" and $_SESSION['leveluser'] != "admin" and $data['id_user'] != $_SESSION['iduser']) {
            header('location:' . $link);
        } else {
            $dataType = ($data['tipe'] == 1 ? 'Visi' : 'Misi');
            echo '<h3 class="page-header"><b>' . $aksi . ' ' . $dataType . ' </b> </h3>';
			buka_form($link, $data['id'], strtolower($aksi));
			buat_textarea("Isi ". $dataType ." (Bahasa Indonesia) *", "isi_terjemahan", $data['isi_terjemahan'], "richtext", true);
            buat_textarea("Isi ". $dataType ." (English)", "isi", $data['isi'], "richtext");

            tutup_form($link);
        }
        break;

        //Menyisipkan atau mengedit data di database
    case "action":
        $isi = addslashes($_POST['isi']);
        $isi_terjemahan = addslashes($_POST['isi_terjemahan']);
        $user = $_SESSION['iduser'];
        
        if ($_POST['aksi'] == "tambah") {
            $mysqli->query("INSERT INTO vision_mission SET
				isi			    = '$isi',
				isi_terjemahan  = '$isi_terjemahan',
				hari		    = '$hari_ini',
				tanggal		    = '$tanggal',
				jam			    = '$jam',
				id_user		    = '$user',
                created_at      = now()
			");
        } elseif ($_POST['aksi'] == "edit") {
            $mysqli->query("UPDATE vision_mission SET
					isi			    = '$isi',
                    isi_terjemahan  = '$isi_terjemahan',
					hari		    = '$hari_ini',
					tanggal		    = '$tanggal',
					jam			    = '$jam',
					id_user		    = '$user',
                    updated_at      = now()
				WHERE id='$_POST[id]'");
        }
        header('location:' . $link);
        break;

        //Menghapus data di database
    case "delete":
        $query     = $mysqli->query("SELECT * FROM vision_mission WHERE id='$_GET[id]'");
        $data    = $query->fetch_array();
        if ($_SESSION['leveluser'] == "admin" or $data['id_user'] == $_SESSION['iduser']) {
            $mysqli->query("DELETE FROM vision_mission WHERE id='$_GET[id]'");
        }
        header('location:' . $link);
        break;
}
?>