<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config_custom.js"></script>
<script type="text/javascript" src="js/validate.js"></script>

<?php
if (!defined("INDEX")) header('location: ../index.php');
$tipePmb = 4;

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=pmb_online";

switch ($show) {
    //Menampilkan data
    default:
        echo '<h3 class="page-header"><b>Daftar PMB Online</b>
				<a href="' . $link . '&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';

        buka_tabel(array("Judul PMB Online", "Tanggal Posting"));
        $no = 1;
        $id_user = $_SESSION['iduser'];

        if ($_SESSION['leveluser'] == "admin") $query = $mysqli->query("SELECT * FROM announcement WHERE tipe = $tipePmb ORDER BY created_at DESC");
        else $query = $mysqli->query("SELECT * FROM announcement WHERE id_user='$id_user' AND tipe = $tipePmb ORDER BY created_at DESC");
        while ($data = $query->fetch_array()) {
			$tanggal = print_tanggal($data['created_at']);
			
            isi_tabel($no, array($data['judul_terjemahan'], $tanggal), $link, $data['id']);
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
            echo '<h3 class="page-header"><b>' . $aksi . ' PMB Online</b> </h3>';
			buka_form($link, $data['id'], strtolower($aksi));
			buat_textbox("Judul PMB Online (Bahasa Indonesia) *", "judul_terjemahan", $data['judul_terjemahan'], 10, true);
			buat_textbox("Judul PMB Online (English)", "judul", $data['judul'], 10);
			buat_textarea("Isi PMB Online (Bahasa Indonesia) *", "isi_terjemahan", $data['isi_terjemahan'], "richtext", true);
            buat_textarea("Isi PMB Online (English)", "isi", $data['isi'], "richtext");
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
        $user = $_SESSION['iduser'];
        
        try {
            mysqli_report(MYSQLI_REPORT_ALL);

            if ($_POST['aksi'] == "tambah") {
                $mysqli->query("INSERT INTO announcement SET
                    tipe			= $tipePmb,
                    judul 		    = '$judul',
                    judul_seo 	    = '$judul_seo',
                    judul_terjemahan= '$judul_terjemahan',
                    isi			    = '$isi',
                    isi_terjemahan  = '$isi_terjemahan',
                    hari		    = '$hari_ini',
                    tanggal		    = '$tanggal',
                    jam			    = '$jam',
                    id_user		    = '$user',
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
                        gambar 		    = '$_POST[gambar]',
                        updated_at      = now()
                    WHERE id='$_POST[id]'");
            }
        } catch(Exception $e) {
            include_once "../plugin/logger/Logger.php";
            Logger::error('SQL Error', [$e->getMessage()]);
            Logger::error($e->getTraceAsString());
        } 
        mysqli_report(MYSQLI_REPORT_OFF);
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