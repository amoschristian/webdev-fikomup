<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config.js"></script>
<script type="text/javascript" src="js/select2.min.js"></script>
<script type="text/javascript" src="js/jquery.datetimepicker.full.min.js"></script>
<link href="css/select2.min.css" rel="stylesheet" />
<link href="css/jquery.datetimepicker.min.css" rel="stylesheet" />
<script src='https://api.mapbox.com/mapbox-gl-js/v1.8.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.8.0/mapbox-gl.css' rel='stylesheet' />
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.css" type="text/css"/>

<style>
#map {
    width: 100%;
    height: calc(100% + 30px);
}

.map_container {
    width: 100%;
    height: 50%;
    overflow: hidden;
}
</style>

<?php
if (!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=event";
switch ($show) {

        //Menampilkan data
    default:
        echo '<h3 class="page-header"><b>Daftar Event</b>
				<a href="' . $link . '&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';

        buka_tabel(array("Judul Event", "Kategori", "User", "Tanggal Posting"));
        $no = 1;
        $id_user = $_SESSION['iduser'];

        if ($_SESSION['leveluser'] == "admin") $query = $mysqli->query("SELECT * FROM event ORDER BY id_event DESC");
        else $query = $mysqli->query("SELECT * FROM event WHERE id_user='$id_user' ORDER BY id_event");
        while ($data = $query->fetch_array()) {
            $user = $mysqli->query("SELECT nama_lengkap FROM user where id_user='$data[id_user]'");
            $us = $user->fetch_array();

            $kategori = $mysqli->query("SELECT * FROM kategori where id_kategori='$data[kategori]'");
            $kat = $kategori->fetch_array();

            $tanggal = print_tanggal($data['created_at']);

            isi_tabel($no, array($data['judul'], $kat['kategori'], $us['nama_lengkap'], $tanggal), $link, $data['id_event']);
            $no++;
        }
        tutup_tabel();

        break;

        //Menampilkan form input dan edit data
    case "form":
        if (isset($_GET['id'])) {
            $query     = $mysqli->query("SELECT * FROM event WHERE id_event='$_GET[id]'");
            $data    = $query->fetch_array();
            $aksi     = "Edit";
        } else {
            $data = array("id_event" => "", "judul" => "", "judul_terjemahan" => "", "isi" => "", "isi_terjemahan" => "", "gambar" => "", "map" => "", "tanggal" => "", "lokasi" => "", "kategori" => "", "tag" => "");
            $aksi     = "Tambah";
        }

        if ($aksi == "Edit" and $_SESSION['leveluser'] != "admin" and $data['id_user'] != $_SESSION['iduser']) {
            header('location:' . $link);
        } else {
            echo '<h3 class="page-header"><b>' . $aksi . ' Event</b> </h3>';
            buka_form($link, $data['id_event'], strtolower($aksi));
            buat_textbox("Judul Event *", "judul", $data['judul'], 10);
            buat_textbox("Judul Event (Terjemahan) *", "judul_terjemahan", $data['judul_terjemahan'], 10);
            buat_textbox("Tanggal Event *", "tanggal", $data['tanggal'], 10);
            buat_textbox("Lokasi *", "lokasi", $data['lokasi'], 10);
            buat_map("Peta", "peta", $data['map'], $mapBoxToken);
            buat_textarea("Deskripsi Event *", "isi", $data['isi'], "richtext");
            buat_textarea("Deskripsi Event (Terjemahan) *", "isi_terjemahan", $data['isi_terjemahan'], "richtext");
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
        $judul              = addslashes($_POST['judul']);
        $judul_terjemahan   = addslashes($_POST['judul_terjemahan']);
        $judul_seo          = convert_seo($_POST['judul']);
        $isi                = addslashes($_POST['isi']);
        $isi_terjemahan     = addslashes($_POST['isi_terjemahan']);
        $lokasi             = addslashes($_POST['lokasi']);
        $tanggal            = date('Y-m-d H:i:s', strtotime($_POST['tanggal']));
        $tag                = (isset($_POST['tag']) && $_POST['tag']) ? implode(",", $_POST['tag']) : '';
        $user               = $_SESSION['iduser'];
        if ($_POST['aksi'] == "tambah") {
            $mysqli->query("INSERT INTO event SET
				judul 		     = '$judul',
				judul_terjemahan = '$judul_terjemahan',
				judul_seo 	     = '$judul_seo',
				isi			     = '$isi',
				isi_terjemahan	 = '$isi_terjemahan',
                tanggal          = '$tanggal',
                lokasi           = '$lokasi',
				id_user		     = '$user',
				tag			     = '$tag',
                map              = '$_POST[peta]',
				kategori	     = '$_POST[kategori]',
				gambar 		     = '$_POST[gambar]',
                created_at       = now()				
			");
        } elseif ($_POST['aksi'] == "edit") {
            $query = "
                UPDATE event SET
					judul 		     = '$judul',
				    judul_terjemahan = '$judul_terjemahan',
				    judul_seo 	     = '$judul_seo',
				    isi			     = '$isi',
				    isi_terjemahan	 = '$isi_terjemahan',
                    tanggal          = '$tanggal',
                    lokasi           = '$lokasi',
					id_user		     = '$user',
                    tag			     = '$tag',
                    map              = '$_POST[peta]',
					kategori	     = '$_POST[kategori]',
					gambar 		     = '$_POST[gambar]',
                    updated_at       = now()		
                WHERE id_event='$_POST[id]'
            ";

            $mysqli->query($query);
        }
        header('location:' . $link);
        break;

        //Menghapus data di database
    case "delete":
        $query     = $mysqli->query("SELECT * FROM event WHERE id_event='$_GET[id]'");
        $data    = $query->fetch_array();
        if ($_SESSION['leveluser'] == "admin" or $data['id_user'] == $_SESSION['iduser']) {
            $mysqli->query("DELETE FROM event WHERE id_event='$_GET[id]'");
        }
        header('location:' . $link);
        break;
}
?>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();

        $('[name="tanggal"]').datetimepicker({});

    });
</script>