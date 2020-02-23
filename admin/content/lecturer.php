<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config.js"></script>
<script type="text/javascript" src="js/select2.min.js"></script>
<script type="text/javascript" src="js/jquery.datetimepicker.full.min.js"></script>
<link href="css/select2.min.css" rel="stylesheet" />
<link href="css/jquery.datetimepicker.min.css" rel="stylesheet" />


<?php
if (!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=lecturer";
switch ($show) {

        //Menampilkan data
    default:
        echo '<h3 class="page-header"><b>Daftar Lecturer</b>
				<a href="' . $link . '&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';

        buka_tabel(array("Foto","Nama Dosen","Email"));
        $no = 1;
        $id_user = $_SESSION['iduser'];

        if ($_SESSION['leveluser'] == "admin") $query = $mysqli->query("SELECT * FROM lecturer ORDER BY id_lecturer DESC");
        else $query = $mysqli->query("SELECT * FROM lecturer WHERE id_user='$id_user' ORDER BY id_lecturer");
        while ($data = $query->fetch_array()) {
            $user = $mysqli->query("SELECT nama_lengkap FROM user where id_user='$data[id_user]'");
            $us = $user->fetch_array();
            $foto 	= '<img src="../media/source/'.$data['gambar'].'" width="100">';
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
            $data = array("id_lecturer" => "", "npd" => "", "nidn" => "", "gambar" => "", "nama_dosen" => "", "gelar" => "", "jenis_kelamin" => "", "agama" => "", "kepangkatan" => "", "pendidikan" => "", "peguruan_tinggi" => "", "jabatan" => "", "email" => "");
            $aksi     = "Tambah";
            
        }

        if ($aksi == "Edit" and $_SESSION['leveluser'] != "admin" and $data['id_user'] != $_SESSION['iduser']) {
            header('location:' . $link);
        } else {
            echo '<h3 class="page-header"><b>' . $aksi . ' Lecturer</b> </h3>';
            buka_form($link, $data['id_lecturer'], strtolower($aksi));
            buat_textbox("Nomor Pokok Dosen *", "npd", $data['npd'], 10);
            buat_textbox("N I D N *", "nidn", $data['nidn'], 10);
            buat_textbox("Nama Dosen *", "nama_dosen", $data['nama_dosen'], 10);
            buat_textbox("Gelar *", "gelar", $data['gelar'], 10);
            buat_textbox("Jenis Kelamin *", "jenis_kelamin", $data['jenis_kelamin'], 10);
            buat_textbox("Agama *", "agama", $data['agama'], 10);
            buat_textbox("Kepangkatan Akademik *", "kepangkatan", $data['kepangkatan'], 10);
            buat_textbox("Pendidikan Terakhir *", "pendidikan", $data['pendidikan'], 10);
            buat_textbox("Perguruan Tinggi Terakhir *", "peguruan_tinggi", $data['peguruan_tinggi'], 10);
            buat_textbox("Jabatan *", "jabatan", $data['jabatan'], 10);
            buat_textbox("Email *", "email", $data['email'], 10);
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
        $agama                  = addslashes($_POST['agama']);
        $kepangkatan            = addslashes($_POST['kepangkatan']);
        $pendidikan             = addslashes($_POST['pendidikan']);
        $peguruan_tinggi        = addslashes($_POST['peguruan_tinggi']);
        $jabatan                = addslashes($_POST['jabatan']);
        $email                  = addslashes($_POST['email']);
        $user                   = $_SESSION['iduser'];
        if ($_POST['aksi'] == "tambah") {
            $mysqli->query("INSERT INTO lecturer SET
				npd 		    = '$npd',
				nidn 	        = '$nidn',
				nama_dosen      = '$nama_dosen',
                gelar           = '$gelar',
                jenis_kelamin   = '$jenis_kelamin',
				agama   		= '$agama',
				kepangkatan		= '$kepangkatan',
				pendidikan  	= '$pendidikan',
                peguruan_tinggi = '$peguruan_tinggi',
                jabatan         = '$jabatan',
                email           = '$email',
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
				agama   		= '$agama',
				kepangkatan		= '$kepangkatan',
				pendidikan  	= '$pendidikan',
                peguruan_tinggi = '$peguruan_tinggi',
                jabatan         = '$jabatan',
                email           = '$email',
				gambar		    = '$_POST[gambar]',
                updated_at       = now()	
                WHERE id_lecturer='$_POST[id]'
            ";
            
            $mysqli->query($query);
        }
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

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();

        $('[name="tanggal"]').datetimepicker({
            inline: true,
        });

    });
</script>