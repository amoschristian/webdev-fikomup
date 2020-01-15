<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config.js"></script>
<script type="text/javascript" src="js/select2.min.js"></script>
<link href="css/select2.min.css" rel="stylesheet" />


<?php
if (!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=berita";
switch ($show) {

        //Menampilkan data
    default:
        echo '<h3 class="page-header"><b>Daftar Berita</b>
				<a href="' . $link . '&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';

        buka_tabel(array("Judul Berita", "Kategori", "User", "Tanggal Posting"));
        $no = 1;
        $id_user = $_SESSION['iduser'];

        if ($_SESSION['leveluser'] == "admin") $query = $mysqli->query("SELECT * FROM artikel ORDER BY id_artikel DESC");
        else $query = $mysqli->query("SELECT * FROM artikel WHERE id_user='$id_user' ORDER BY id_artikel");
        while ($data = $query->fetch_array()) {
            $user = $mysqli->query("SELECT nama_lengkap FROM user where id_user='$data[id_user]'");
            $us = $user->fetch_array();

            $kategori = $mysqli->query("SELECT * FROM kategori where id_kategori='$data[kategori]'");
            $kat = $kategori->fetch_array();

            $tanggal = print_tanggal($data['tanggal']);

            isi_tabel($no, array($data['judul'], $kat['kategori'], $us['nama_lengkap'], $tanggal), $link, $data['id_artikel']);
            $no++;
        }
        tutup_tabel();

        break;

        //Menampilkan form input dan edit data
    case "form":
        if (isset($_GET['id'])) {
            $query     = $mysqli->query("SELECT * FROM artikel WHERE id_artikel='$_GET[id]'");
            $data    = $query->fetch_array();
            $aksi     = "Edit";
        } else {
            $data = array("id_artikel" => "", "judul" => "", "isi" => "", "gambar" => "", "kategori" => "", "tag" => "");
            $aksi     = "Tambah";
        }

        if ($aksi == "Edit" and $_SESSION['leveluser'] != "admin" and $data['id_user'] != $_SESSION['iduser']) {
            header('location:' . $link);
        } else {
            echo '<h3 class="page-header"><b>' . $aksi . ' Berita</b> </h3>';
            buka_form($link, $data['id_artikel'], strtolower($aksi));
            buat_textbox("Judul Berita", "judul", $data['judul'], 10);
            buat_textarea("Isi Berita", "isi", $data['isi'], "richtext");
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
        $judul        = addslashes($_POST['judul']);
        $judul_seo     = convert_seo($_POST['judul']);
        $isi        = addslashes($_POST['isi']);
        $tag        = implode(",", $_POST['tag']);
        $user        = $_SESSION['iduser'];
        if ($_POST['aksi'] == "tambah") {
            $mysqli->query("INSERT INTO artikel SET
				judul 		= '$judul',
				judul_seo 	= '$judul_seo',
				isi			= '$isi',
				hari		= '$hari_ini',
				tanggal		= '$tanggal',
				jam			= '$jam',
				id_user		= '$user',
				tag			= '$tag',
				kategori	= '$_POST[kategori]',
				gambar 		= '$_POST[gambar]'				
			");
        } elseif ($_POST['aksi'] == "edit") {
            $mysqli->query("UPDATE artikel SET
					judul 		= '$judul',
					judul_seo 	= '$judul_seo',
					isi			= '$isi',
					hari		= '$hari_ini',
					tanggal		= '$tanggal',
					jam			= '$jam',
					id_user		= '$user',
					tag			= '$tag',
					kategori	= '$_POST[kategori]',
					gambar 		= '$_POST[gambar]'
				WHERE id_artikel='$_POST[id]'");
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