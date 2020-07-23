<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config.js"></script>
<script type="text/javascript" src="js/select2.min.js"></script>
<link href="css/select2.min.css" rel="stylesheet" />


<?php
if (!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=devotion";
$tipePengabdian = 0;
switch ($show) {

        //Menampilkan data
    default:
        echo '<h3 class="page-header"><b>Daftar Pengabdian</b>
				<a href="' . $link . '&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';

        buka_tabel(array("Judul Pengabdian", "Kategori", "Tanggal Posting", ));
        $no = 1;
        $id_user = $_SESSION['iduser'];

        if ($_SESSION['leveluser'] == "admin") $query = $mysqli->query("SELECT * FROM ppm WHERE tipe=$tipePengabdian ORDER BY tanggal DESC");
        else $query = $mysqli->query("SELECT * FROM ppm WHERE id_user='$id_user' AND tipe=$tipePengabdian ORDER BY tanggal DESC");
        while ($data = $query->fetch_array()) {
            $kategori = $mysqli->query("SELECT * FROM kategori where id_kategori='$data[kategori]'");
            $kat = $kategori->fetch_array();

            $headline = '';
            if ($data['headline']) {
                $headline = $headline_list_const[$data['headline']]['cap'];
                if ($data['headline'] == 1) { //main headline
                    $headline = '<b>' . $headline . '</b>';
                }
            }

            $tanggal = print_tanggal($data['tanggal']);

            isi_tabel($no, array($data['judul_terjemahan'], $kat['kategori'], $tanggal), $link, $data['id']);
            $no++;
        }
        tutup_tabel();

        break;

        //Menampilkan form input dan edit data
    case "form":
        if (isset($_GET['id'])) {
            $query = $mysqli->query("SELECT * FROM ppm WHERE id='$_GET[id]' and tipe=$tipePengabdian");
            $data = $query->fetch_array();
            $aksi = "Edit";
        } else {
            $data = array("id" => "", "judul" => "", "judul_terjemahan" => "", "isi" => "", "isi_terjemahan" => "", "gambar" => "", "kategori" => "", "tag" => "");
            $aksi = "Tambah";
        }

        if ($aksi == "Edit" and $_SESSION['leveluser'] != "admin" and $data['id_user'] != $_SESSION['iduser']) {
            header('location:' . $link);
        } else {
            echo '<h3 class="page-header"><b>' . $aksi . ' Pengabdian</b> </h3>';
			buka_form($link, $data['id'], strtolower($aksi));
			buat_textbox("Judul Pengabdian (Bahasa Indonesia)", "judul_terjemahan", $data['judul_terjemahan'], 10);
			buat_textbox("Judul Pengabdian (English)", "judul", $data['judul'], 10);
			buat_textarea("Isi Pengabdian (Bahasa Indonesia)", "isi_terjemahan", $data['isi_terjemahan'], "richtext");
            buat_textarea("Isi Pengabdian (English)", "isi", $data['isi'], "richtext");
            buat_imagepicker("Gambar", "gambar", $data['gambar']);

            $kategori = $mysqli->query("SELECT * FROM kategori");
            $list = array();
            while ($k = $kategori->fetch_array()) {
                $list[] = array('val' => $k['id_kategori'], 'cap' => $k['kategori']);
            }
            buat_combobox("Kategori", "kategori", $list, $data['kategori']);

            $tag = $mysqli->query("SELECT * FROM tag");
            $arr_tag = explode(",", $data['tag']);
            $list = array();
            while ($t = $tag->fetch_array()) {
                $select = (array_search($t['tag_seo'], $arr_tag) === false) ? "" : "selected";
                $list[] = array("val" => $t['tag_seo'], "cap" => $t['tag'], "selected" => $select);
            }
            buat_select2("Tag", "tag", $list);
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
        $headline = $_POST['headline'];
        $tag = implode(",", $_POST['tag']);
        $user = $_SESSION['iduser'];
        
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
                tipe            = '$tipePengabdian',
				id_user		    = '$user',
				tag			    = '$tag',
				headline        = '$headline',
				kategori	    = '$_POST[kategori]',
				gambar 		    = '$_POST[gambar]'				
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
                    tipe            = '$tipePengabdian',
					id_user		    = '$user',
					tag			    = '$tag',
                    headline        = '$headline',
					kategori	    = '$_POST[kategori]',
					gambar 		    = '$_POST[gambar]'
				WHERE id='$_POST[id]'");
        }
        header('location:' . $link);
        break;

        //Menghapus data di database
    case "delete":
        $query     = $mysqli->query("SELECT * FROM artikel WHERE id_artikel='$_GET[id]'");
        $data    = $query->fetch_array();
        if ($_SESSION['leveluser'] == "admin" or $data['id_user'] == $_SESSION['iduser']) {
            $mysqli->query("DELETE FROM artikel WHERE id_artikel='$_GET[id]'");
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