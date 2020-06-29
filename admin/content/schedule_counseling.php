<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config.js"></script>
<script type="text/javascript" src="js/select2.min.js"></script>
<script type="text/javascript" src="js/jquery.datetimepicker.full.min.js"></script>
<link href="css/select2.min.css" rel="stylesheet" />
<link href="css/jquery.datetimepicker.min.css" rel="stylesheet" />

<?php
if (!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=schedule_counseling";

switch ($show) {

        //Menampilkan data
    default:
        echo '<h3 class="page-header"><b>Daftar Jadwal</b>
				<a href="' . $link . '&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';

        buka_tabel(array("Nama", "Hari", "Jam Mulai", "Jam Selesai"));
        $no = 1;
        $id_user = $_SESSION['iduser'];

        if ($_SESSION['leveluser'] == "admin") $query = $mysqli->query("SELECT * FROM schedule ORDER BY hari DESC");
        else $query = $mysqli->query("SELECT * FROM schedule WHERE id_user='$id_user' ORDER BY hari DESC");
        while ($data = $query->fetch_array()) {
            $hari = print_tanggal($data['hari']);

            isi_tabel($no, array($data['nama'], $hari, $data['jam_mulai'], $data['jam_selesai']), $link, $data['id']);
            $no++;
        }
        tutup_tabel();

        break;

        //Menampilkan form input dan edit data
    case "form":
        if (isset($_GET['id'])) {
            $query = $mysqli->query("SELECT * FROM schedule WHERE id='$_GET[id]'");
            $data = $query->fetch_array();
            $aksi = "Edit";
        } else {
            $data = array("id" => "", "nama" => "", "hari" => "", "jam_mulai" => "", "jam_selesai" => "");
            $aksi = "Tambah";
        }

        if ($aksi == "Edit" and $_SESSION['leveluser'] != "admin" and $data['id_user'] != $_SESSION['iduser']) {
            header('location:' . $link);
        } else {
            echo '<h3 class="page-header"><b>' . $aksi . ' Pengumuman</b> </h3>';
            buka_form($link, $data['id'], strtolower($aksi));
            buat_textbox("Nama", "nama", $data['nama'], 6);
            buat_textbox("Hari *", "hari", $data['hari'], 2);
            buat_textbox("Jam Mulai *", "jam_mulai", $data['jam_mulai'], 2);
            buat_textbox("Jam Selesai *", "jam_selesai", $data['jam_selesai'], 2);

            tutup_form($link);
        }
        break;

        //Menyisipkan atau mengedit data di database
    case "action":
        $nama = addslashes($_POST['nama']);
        $hari = date('Y-m-d', strtotime($_POST['hari']));
        $jam_mulai = $_POST['jam_mulai'];
        $jam_selesai = $_POST['jam_selesai'];
        $user = $_SESSION['iduser'];
        
        if ($_POST['aksi'] == "tambah") {
            $mysqli->query("INSERT INTO schedule SET
				nama 		    = '$nama',
				hari 		    = '$hari',
				jam_mulai 	    = '$jam_mulai',
				jam_selesai     = '$jam_selesai'
			");
        } elseif ($_POST['aksi'] == "edit") {
            $mysqli->query("UPDATE schedule SET
                    nama 		    = '$nama',
					hari 		    = '$hari',
				    jam_mulai 	    = '$jam_mulai',
				    jam_selesai     = '$jam_selesai'
				WHERE id='$_POST[id]'");
        }
        header('location:' . $link);
        break;

        //Menghapus data di database
    case "delete":
        $query     = $mysqli->query("SELECT * FROM schedule WHERE id='$_GET[id]'");
        $data    = $query->fetch_array();
        if ($_SESSION['leveluser'] == "admin" or $data['id_user'] == $_SESSION['iduser']) {
            $mysqli->query("DELETE FROM schedule WHERE id='$_GET[id]'");
        }
        header('location:' . $link);
        break;
}
?>

<script>
    $(document).ready(function() {
        $('[name="hari"]').datetimepicker({
            format:'d-m-Y',
            timepicker: false
        });

        $('[name="jam_mulai"]').datetimepicker({
	        datepicker: false,
            format:'H:i'
        });

        $('[name="jam_selesai"]').datetimepicker({
	        datepicker:false,
            format:'H:i'
        });
    });
</script>