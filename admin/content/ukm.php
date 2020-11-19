<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config.js"></script>
<script type="text/javascript" src="js/validate.js"></script>

<?php
if (!defined("INDEX")) header('location: ../index.php');

include "../library/function_image.php";

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=ukm";
switch ($show) {

        //Menampilkan data
    default:
        echo '<h3 class="page-header"><b>Daftar UKM</b>
				<a href="' . $link . '&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';

        buka_tabel(array("Foto","Nama","Link"));
        $no = 1;
        $id_user = $_SESSION['iduser'];

        if ($_SESSION['leveluser'] == "admin") $query = $mysqli->query("SELECT * FROM ukm ORDER BY nama ASC");
        else $query = $mysqli->query("SELECT * FROM ukm WHERE id_user='$id_user' ORDER BY nama ASC");
        while ($data = $query->fetch_array()) {
            $user = $mysqli->query("SELECT nama_lengkap FROM user where id_user='$data[id_user]'");
            $us = $user->fetch_array();
            $foto 	= '<img src="'.print_image($data['gambar']).'" width="100">';
            isi_tabel($no, array($foto, $data['nama'], $data['link']), $link, $data['id']);
            $no++;
        }
        tutup_tabel();

        break;

        //Menampilkan form input dan edit data
    case "form":
        if (isset($_GET['id'])) {
            $query     = $mysqli->query("SELECT * FROM ukm WHERE id='$_GET[id]'");
            $data    = $query->fetch_array();
            $aksi     = "Edit";
        } else {
            $data = array("id" => "", "nama" => "", "link" => "", "gambar" => "");
            $aksi     = "Tambah";
            
        }

        if ($aksi == "Edit" and $_SESSION['leveluser'] != "admin" and $data['id_user'] != $_SESSION['iduser']) {
            header('location:' . $link);
        } else {
            echo '<h3 class="page-header"><b>' . $aksi . ' UKM</b> </h3>';
            buka_form($link, $data['id'], strtolower($aksi));
            buat_textbox("Nama *", "nama", $data['nama'], 10, true);
            buat_textbox("Link", "link", $data['link'], 10);
            buat_imagepicker("Foto", "gambar", $data['gambar']);

            tutup_form($link);
        }
        break;

        // Menyisipkan atau mengedit data di database
    case "action":
        $nama                   = addslashes($_POST['nama']);
        $linkPost               = $_POST['link'];
        $user                   = $_SESSION['iduser'];
        
        try {
            mysqli_report(MYSQLI_REPORT_ALL);
            
            if ($_POST['aksi'] == "tambah") {
                $mysqli->query("INSERT INTO ukm SET
                    nama        = '$nama',
                    link        = '$linkPost',
                    gambar	    = '$_POST[gambar]',
                    id_user		= '$user',
                    created_at  = now()				
                ");
            } elseif ($_POST['aksi'] == "edit") {
                $query = "
                    UPDATE ukm SET
                    nama            = '$nama',
                    link            = '$linkPost',
                    gambar		    = '$_POST[gambar]',
                    id_user		    = '$user',
                    updated_at      = now()	
                    WHERE id='$_POST[id]'
                ";

                $mysqli->query($query);
            }
        } catch(Exception $e) {
            include_once "../plugin/logger/Logger.php";
            Logger::error('SQL Error', [$e->getMessage()]);
            Logger::error($e->getTraceAsString());
        } 
        mysqli_report(MYSQLI_REPORT_OFF);
        header('location:' . $link);
        break;

        // Menghapus data di database
    case "delete":
        $query     = $mysqli->query("SELECT * FROM ukm WHERE id='$_GET[id]'");
        $data    = $query->fetch_array();
        if ($_SESSION['leveluser'] == "admin" or $data['id_user'] == $_SESSION['iduser']) {
            $mysqli->query("DELETE FROM ukm WHERE id='$_GET[id]'");
        }
        header('location:' . $link);
        break;
}
?>