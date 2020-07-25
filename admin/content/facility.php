<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config.js"></script>
<script type="text/javascript" src="js/select2.min.js"></script>
<script type="text/javascript" src="js/jquery.datetimepicker.full.min.js"></script>
<link href="css/select2.min.css" rel="stylesheet" />
<link href="css/jquery.datetimepicker.min.css" rel="stylesheet" />


<?php
if (!defined("INDEX")) header('location: ../index.php');

include "../library/function_image.php";

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=facility";
switch ($show) {

        //Menampilkan data
    default:
        echo '<h3 class="page-header"><b>Daftar Fasilitas</b>
				<a href="' . $link . '&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';

        buka_tabel(array("Foto","Nama Fasilitas","Lokasi"));
        $no = 1;
        $id_user = $_SESSION['iduser'];

        if ($_SESSION['leveluser'] == "admin") $query = $mysqli->query("SELECT * FROM facility ORDER BY nama_terjemahan ASC");
        else $query = $mysqli->query("SELECT * FROM facility WHERE id_user='$id_user' ORDER BY nama_terjemahan ASC");
        while ($data = $query->fetch_array()) {
            $foto 	= '<img src="'.print_image($data['gambar']).'" width="100">';
            isi_tabel($no, array($foto, $data['nama_terjemahan'], $data['lokasi']), $link, $data['id']);
            $no++;
        }
        tutup_tabel();

        break;

        //Menampilkan form input dan edit data
    case "form":
        if (isset($_GET['id'])) {
            $query     = $mysqli->query("SELECT * FROM facility WHERE id='$_GET[id]'");
            $data    = $query->fetch_array();
            $aksi     = "Edit";
        } else {
            $data = array("id" => "", "gambar" => "", "nama" => "", "nama_terjemahan" => "", "isi" => "", "isi_terjemahan" => "", "lokasi" => "");
            $aksi     = "Tambah";
            
        }

        if ($aksi == "Edit" and $_SESSION['leveluser'] != "admin" and $data['id_user'] != $_SESSION['iduser']) {
            header('location:' . $link);
        } else {
            echo '<h3 class="page-header"><b>' . $aksi . ' Fasilitas</b> </h3>';
            buka_form($link, $data['id'], strtolower($aksi));
            buat_textbox("Nama Fasilitas (Bahasa Indonesia) *", "nama_terjemahan", $data['nama_terjemahan'], 10, true);
            buat_textbox("Nama Fasilitas (English)", "nama", $data['nama'], 10);
            buat_textbox("Lokasi *", "lokasi", $data['lokasi'], 10, true);
            buat_textarea("Deskripsi (Bahasa Indonesia)", "isi_terjemahan", $data['isi_terjemahan'], "richtext");
            buat_textarea("Deskripsi (English)", "isi", $data['isi'], "richtext");
            buat_imagepicker("Foto", "gambar", $data['gambar']);

            tutup_form($link);
        }
        break;

        // Menyisipkan atau mengedit data di database
    case "action":
        $nama               = addslashes($_POST['nama']);
        $nama_terjemahan    = addslashes($_POST['nama_terjemahan']);
        $lokasi             = addslashes($_POST['lokasi']);
        $isi                = addslashes($_POST['isi']);
        $isi_terjemahan     = addslashes($_POST['isi_terjemahan']);
        $user       = $_SESSION['iduser'];
        if ($_POST['aksi'] == "tambah") {
            $mysqli->query("INSERT INTO facility SET
				nama 		    = '$nama',
				nama_terjemahan = '$nama_terjemahan',
                lokasi          = '$lokasi',
                isi             = '$isi',
                isi_terjemahan  = '$isi_terjemahan',
				gambar		    = '$_POST[gambar]',
                created_at  = now()				
			");
        } elseif ($_POST['aksi'] == "edit") {
            $query = "
                UPDATE facility SET
                nama 		    = '$nama',
                nama_terjemahan = '$nama_terjemahan',
                lokasi          = '$lokasi',
                isi             = '$isi',
                isi_terjemahan  = '$isi_terjemahan',
                gambar		    = '$_POST[gambar]',
                updated_at       = now()	
                WHERE id='$_POST[id]'
            ";
            
            $mysqli->query($query);
        }
        header('location:' . $link);
       
        break;

        // Menghapus data di database
    case "delete":
        $query     = $mysqli->query("SELECT * FROM facility WHERE id='$_GET[id]'");
        $data    = $query->fetch_array();
        if ($_SESSION['leveluser'] == "admin" or $data['id_user'] == $_SESSION['iduser']) {
            $mysqli->query("DELETE FROM facility WHERE id='$_GET[id]'");
        }
        header('location:' . $link);
        break;
}
?>