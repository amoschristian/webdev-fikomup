<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config.js"></script>
<script type="text/javascript" src="js/validate.js"></script>

<?php
if (!defined("INDEX")) header('location: ../index.php');

include "../library/function_image.php";

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=lecturer";
switch ($show) {

        //Menampilkan data
    default:
        echo '<h3 class="page-header"><b>Daftar Dosen</b>
				<a href="' . $link . '&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';

        buka_tabel(array("Foto","Nama Dosen","Email"));
        $no = 1;
        $id_user = $_SESSION['iduser'];

        if ($_SESSION['leveluser'] == "admin") $query = $mysqli->query("SELECT * FROM lecturer ORDER BY nama_dosen ASC");
        else $query = $mysqli->query("SELECT * FROM lecturer WHERE id_user='$id_user' ORDER BY nama_dosen ASC");
        while ($data = $query->fetch_array()) {
            $user = $mysqli->query("SELECT nama_lengkap FROM user where id_user='$data[id_user]'");
            $us = $user->fetch_array();
            $foto 	= '<img src="'.print_image($data['gambar']).'" width="100">';
            isi_tabel($no, array($foto, $data['nama_dosen'], $data['email']), $link, $data['id_lecturer']);
            $no++;
        }
        tutup_tabel();

        break;

        //Menampilkan form input dan edit data
    case "form":
        if (isset($_GET['id'])) {
            $query     = $mysqli->query("SELECT * FROM lecturer WHERE id_lecturer='$_GET[id]'");
            $data    = $query->fetch_array();
            $aksi     = "Edit";
        } else {
            $data = array("id_lecturer" => "", "npd" => "", "nidn" => "", "gambar" => "", "nama_dosen" => "", "gelar" => "", "jenis_kelamin" => "", "bidang_kajian" => "", "kepangkatan" => "", "pendidikan" => "", "peguruan_tinggi" => "", "jabatan" => "", "email" => "");
            $aksi     = "Tambah";
            
        }

        if ($aksi == "Edit" and $_SESSION['leveluser'] != "admin" and $data['id_user'] != $_SESSION['iduser']) {
            header('location:' . $link);
        } else {
            echo '<h3 class="page-header"><b>' . $aksi . ' Dosen</b> </h3>';
            buka_form($link, $data['id_lecturer'], strtolower($aksi));
            buat_textbox("Nomor Pokok Dosen *", "npd", $data['npd'], 10, true);
            buat_textbox("N I D N *", "nidn", $data['nidn'], 10, true);
            buat_textbox("Nama Dosen *", "nama_dosen", $data['nama_dosen'], 10, true);
            buat_textbox("Gelar *", "gelar", $data['gelar'], 10, true);
            buat_textbox("Jenis Kelamin *", "jenis_kelamin", $data['jenis_kelamin'], 10, true);
            buat_textbox("Bidang Kajian *", "bidang_kajian", $data['bidang_kajian'], 10, true);
            buat_textbox("Kepangkatan Akademik *", "kepangkatan", $data['kepangkatan'], 10, true);
            buat_textbox("Pendidikan Terakhir *", "pendidikan", $data['pendidikan'], 10, true);
            buat_textbox("Perguruan Tinggi Terakhir *", "peguruan_tinggi", $data['peguruan_tinggi'], 10, true);
            buat_textbox("Jabatan *", "jabatan", $data['jabatan'], 10, true);
            buat_textbox("Email *", "email", $data['email'], 10, true);
            buat_imagepicker("Foto", "gambar", $data['gambar']);

            
            tutup_form($link);
        }
        break;

        // Menyisipkan atau mengedit data di database
    case "action":
        $npd                    = addslashes($_POST['npd']);
        $nidn                   = addslashes($_POST['nidn']);
        $nama_dosen             = addslashes($_POST['nama_dosen']);
        $gelar                  = addslashes($_POST['gelar']);
        $jenis_kelamin          = addslashes($_POST['jenis_kelamin']);
        $bidang_kajian          = addslashes($_POST['bidang_kajian']);
        $kepangkatan            = addslashes($_POST['kepangkatan']);
        $pendidikan             = addslashes($_POST['pendidikan']);
        $peguruan_tinggi        = addslashes($_POST['peguruan_tinggi']);
        $jabatan                = addslashes($_POST['jabatan']);
        $email                  = addslashes($_POST['email']);
        $user                   = $_SESSION['iduser'];

        try {
            mysqli_report(MYSQLI_REPORT_ALL);

            if ($_POST['aksi'] == "tambah") {
                $mysqli->query("INSERT INTO lecturer SET
                    npd 		    = '$npd',
                    nidn 	        = '$nidn',
                    nama_dosen      = '$nama_dosen',
                    gelar           = '$gelar',
                    jenis_kelamin   = '$jenis_kelamin',
                    bidang_kajian   = '$bidang_kajian',
                    kepangkatan		= '$kepangkatan',
                    pendidikan  	= '$pendidikan',
                    peguruan_tinggi = '$peguruan_tinggi',
                    jabatan         = '$jabatan',
                    email           = '$email',
                    id_user		    = '$user',
                    gambar		    = '$_POST[gambar]',
                    created_at  = now()				
                ");
            } elseif ($_POST['aksi'] == "edit") {
                $query = "
                    UPDATE lecturer SET
                    npd 		    = '$npd',
                    nidn 	        = '$nidn',
                    nama_dosen      = '$nama_dosen',
                    gelar           = '$gelar',
                    jenis_kelamin   = '$jenis_kelamin',
                    bidang_kajian   = '$bidang_kajian',
                    kepangkatan		= '$kepangkatan',
                    pendidikan  	= '$pendidikan',
                    peguruan_tinggi = '$peguruan_tinggi',
                    jabatan         = '$jabatan',
                    email           = '$email',
                    gambar		    = '$_POST[gambar]',
                    id_user		    = '$user',
                    updated_at       = now()	
                    WHERE id_lecturer='$_POST[id]'
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
        $query     = $mysqli->query("SELECT * FROM lecturer WHERE id_lecturer='$_GET[id]'");
        $data    = $query->fetch_array();
        if ($_SESSION['leveluser'] == "admin" or $data['id_user'] == $_SESSION['iduser']) {
            $mysqli->query("DELETE FROM lecturer WHERE id_lecturer='$_GET[id]'");
        }
        header('location:' . $link);
        break;
}
?>