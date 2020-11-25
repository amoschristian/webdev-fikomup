<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config.js"></script>
<script type="text/javascript" src="js/validate.js"></script>

<?php
if (!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=research";
$tipePenelitian = 1;
switch ($show) {

        //Menampilkan data
    default:
        echo '<h3 class="page-header"><b>Daftar Penelitian</b>
				<a href="' . $link . '&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';

        buka_tabel(array("Judul Penelitian", "Kategori", "Tanggal Posting", ));
        $no = 1;
        $id_user = $_SESSION['iduser'];

        if ($_SESSION['leveluser'] == "admin") $query = $mysqli->query("SELECT * FROM ppm WHERE tipe=$tipePenelitian ORDER BY created_at DESC");
        else $query = $mysqli->query("SELECT * FROM ppm WHERE id_user='$id_user' AND tipe=$tipePenelitian ORDER BY created_at DESC");
        while ($data = $query->fetch_array()) {
            $kategori = $mysqli->query("SELECT * FROM kategori where id_kategori='$data[kategori]'");
            $kat = $kategori->fetch_array();

            $tanggal = print_tanggal($data['created_at']);

            isi_tabel($no, array($data['judul_terjemahan'], $kat['kategori'], $tanggal), $link, $data['id']);
            $no++;
        }
        tutup_tabel();

        break;

        //Menampilkan form input dan edit data
    case "form":
        if (isset($_GET['id'])) {
            $query = $mysqli->query("SELECT * FROM ppm WHERE id='$_GET[id]' and tipe=$tipePenelitian");
            $data = $query->fetch_array();
            $aksi = "Edit";
        } else {
            $data = array("id" => "", "judul" => "", "judul_terjemahan" => "", "isi" => "", "isi_terjemahan" => "", "gambar" => "", "kategori" => "");
            $aksi = "Tambah";
        }

        if ($aksi == "Edit" and $_SESSION['leveluser'] != "admin" and $data['id_user'] != $_SESSION['iduser']) {
            header('location:' . $link);
        } else {
            echo '<h3 class="page-header"><b>' . $aksi . ' Penelitian</b> </h3>';
			buka_form($link, $data['id'], strtolower($aksi));
			buat_textbox("Judul Penelitian (Bahasa Indonesia) *", "judul_terjemahan", $data['judul_terjemahan'], 10, true);
			buat_textbox("Judul Penelitian (English)", "judul", $data['judul'], 10);
			buat_textarea("Isi Penelitian (Bahasa Indonesia) *", "isi_terjemahan", $data['isi_terjemahan'], "richtext", true);
            buat_textarea("Isi Penelitian (English)", "isi", $data['isi'], "richtext");
            buat_imagepicker("Gambar", "gambar", $data['gambar']);

            $kategori = $mysqli->query("SELECT * FROM kategori");
            $list = array();
            while ($k = $kategori->fetch_array()) {
                $list[] = array('val' => $k['id_kategori'], 'cap' => $k['kategori']);
            }
            buat_combobox("Kategori", "kategori", $list, $data['kategori']);

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
        
        try {
            mysqli_report(MYSQLI_REPORT_ALL);
            if ($_POST['aksi'] == "tambah") {
                $mysqli->query("INSERT INTO ppm SET
                    judul 		    = '$judul',
                    judul_seo 	    = '$judul_seo',
                    judul_terjemahan= '$judul_terjemahan',
                    isi			    = '$isi',
                    isi_terjemahan  = '$isi_terjemahan',
                    hari		    = '$hari_ini',
                    tanggal		    = '$tanggal',
                    jam			    = '$jam',
                    tipe            = '$tipePenelitian',
                    id_user		    = '$user',
                    kategori	    = '$_POST[kategori]',
                    gambar 		    = '$_POST[gambar]',
                    created_at      = now()					
                ");
            } elseif ($_POST['aksi'] == "edit") {
                $mysqli->query("UPDATE ppm SET
                        judul 		    = '$judul',
                        judul_seo 	    = '$judul_seo',
                        judul_terjemahan= '$judul_terjemahan',
                        isi			    = '$isi',
                        isi_terjemahan  = '$isi_terjemahan',
                        hari		    = '$hari_ini',
                        tanggal		    = '$tanggal',
                        jam			    = '$jam',
                        tipe            = '$tipePenelitian',
                        id_user		    = '$user',
                        kategori	    = '$_POST[kategori]',
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
        $query     = $mysqli->query("SELECT * FROM ppm WHERE id ='$_GET[id]'");
        $data    = $query->fetch_array();
        if ($_SESSION['leveluser'] == "admin" or $data['id_user'] == $_SESSION['iduser']) {
            $mysqli->query("DELETE FROM ppm WHERE id ='$_GET[id]'");
        }
        header('location:' . $link);
        break;
}
?>