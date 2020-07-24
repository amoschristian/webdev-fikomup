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
$link = "?content=alumni";
switch ($show) {

        //Menampilkan data
    default:
        echo '<h3 class="page-header"><b>Daftar Alumni</b>
				<a href="' . $link . '&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';

        buka_tabel(array("Foto","Nama","NIM","Jurusan","Tahun Kelulusan"));
        $no = 1;
        $id_user = $_SESSION['iduser'];

        if ($_SESSION['leveluser'] == "admin") $query = $mysqli->query("SELECT * FROM alumni ORDER BY nama ASC");
        else $query = $mysqli->query("SELECT * FROM alumni WHERE id_user='$id_user' ORDER BY nama ASC");
        while ($data = $query->fetch_array()) {
            $user = $mysqli->query("SELECT nama_lengkap FROM user where id_user='$data[id_user]'");
            $us = $user->fetch_array();
            $foto 	= '<img src="'.print_image($data['gambar']).'" width="100">';
            isi_tabel($no, array($foto, $data['nama'], $data['nim'], $data['jurusan'], date('Y', strtotime($data['tahun_kelulusan']))), $link, $data['id']);
            $no++;
        }
        tutup_tabel();

        break;

        //Menampilkan form input dan edit data
    case "form":
        if (isset($_GET['id'])) {
            $query     = $mysqli->query("SELECT * FROM alumni WHERE id='$_GET[id]'");
            $data    = $query->fetch_array();
            $aksi     = "Edit";
        } else {
            $data = array("id" => "", "nama" => "", "nim" => "", "jurusan" => "", "tahun_kelulusan"=> "", "gambar" => "");
            $aksi     = "Tambah";
            
        }

        if ($aksi == "Edit" and $_SESSION['leveluser'] != "admin" and $data['id_user'] != $_SESSION['iduser']) {
            header('location:' . $link);
        } else {
            echo '<h3 class="page-header"><b>' . $aksi . ' Personel</b> </h3>';
            buka_form($link, $data['id'], strtolower($aksi));
            buat_textbox("Nama *", "nama", $data['nama'], 10, true);
            buat_textbox("NIM *", "nim", $data['nim'], 10, true);
            buat_textbox("Jurusan *", "jurusan", $data['jurusan'], 10, true);
            buat_textbox("Tahun Kelulusan *", "tahun_kelulusan", intval($data['tahun_kelulusan']), 10, true, 'number');
            buat_imagepicker("Foto", "gambar", $data['gambar']);

            tutup_form($link);
        }
        break;

        // Menyisipkan atau mengedit data di database
    case "action":
        $nama                   = addslashes($_POST['nama']);
        $nim                    = $_POST['nim'];
        $jurusan                = addslashes($_POST['jurusan']);
        $tahun_kelulusan        = $_POST['tahun_kelulusan'] . '-01-01';
        $user                   = $_SESSION['iduser'];
        if ($_POST['aksi'] == "tambah") {
            $mysqli->query("INSERT INTO alumni SET
				nama            = '$nama',
                nim             = '$nim',
                jurusan         = '$jurusan',
                tahun_kelulusan = '$tahun_kelulusan',
				gambar	        = '$_POST[gambar]',
                created_at      = now()				
			");
        } elseif ($_POST['aksi'] == "edit") {
            $query = "
                UPDATE alumni SET
                nama            = '$nama',
                nim             = '$nim',
                jurusan         = '$jurusan',
                tahun_kelulusan = '$tahun_kelulusan',
				gambar		    = '$_POST[gambar]',
                updated_at      = now()	
                WHERE id='$_POST[id]'
            ";
            
            $mysqli->query($query);
        }
        header('location:' . $link);
       
        break;

        // Menghapus data di database
    case "delete":
        $query     = $mysqli->query("SELECT * FROM alumni WHERE id='$_GET[id]'");
        $data    = $query->fetch_array();
        if ($_SESSION['leveluser'] == "admin" or $data['id_user'] == $_SESSION['iduser']) {
            $mysqli->query("DELETE FROM alumni WHERE id='$_GET[id]'");
        }
        header('location:' . $link);
        break;
}
?>