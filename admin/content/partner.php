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
$link = "?content=partner";
switch ($show) {

        //Menampilkan data
    default:
        echo '<h3 class="page-header"><b>Daftar Mitra</b>
				<a href="' . $link . '&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';

        buka_tabel(array("Foto","Nama Mitra"));
        $no = 1;
        $id_user = $_SESSION['iduser'];

        if ($_SESSION['leveluser'] == "admin") $query = $mysqli->query("SELECT * FROM partner ORDER BY nama_partner ASC");
        else $query = $mysqli->query("SELECT * FROM partner WHERE id_user='$id_user' ORDER BY nama_partner ASC");
        while ($data = $query->fetch_array()) {
            $user = $mysqli->query("SELECT nama_lengkap FROM user where id_user='$data[id_user]'");
            $us = $user->fetch_array();
            $foto 	= '<img src="../media/thumbs/'.$data['logo_partner'].'" width="100">';
            isi_tabel($no, array($foto, $data['nama_partner']), $link, $data['id_partner']);
            $no++;
        }
        tutup_tabel();

        break;

        //Menampilkan form input dan edit data
    case "form":
        if (isset($_GET['id'])) {
            $query     = $mysqli->query("SELECT * FROM partner WHERE id_partner='$_GET[id]'");
            $data    = $query->fetch_array();
            $aksi     = "Edit";
        } else {
            $data = array("id_partner" => "", "nama_partner" => "", "deskripsi" => "", "deskripsi_terjemahan" => "", "logo_partner" => "", "gallery_partner" => "");
            $aksi     = "Tambah";
            
        }

        if ($aksi == "Edit" and $_SESSION['leveluser'] != "admin" and $data['id_user'] != $_SESSION['iduser']) {
            header('location:' . $link);
        } else {
            echo '<h3 class="page-header"><b>' . $aksi . ' Mitra</b> </h3>';
            buka_form($link, $data['id_partner'], strtolower($aksi));
            buat_textbox("Nama Mitra *", "nama_partner", $data['nama_partner'], 10);
            buat_textarea("Deskripsi (English)*", "deskripsi", $data['deskripsi'], "richtext");
            buat_textarea("Deskripsi (Bahasa Indonesia) *", "deskripsi_terjemahan", $data['deskripsi_terjemahan'], "richtext");
            buat_imagepicker("Logo Mitra *", "logo_partner", $data['logo_partner'], 10);
            buat_imagepicker_multiple("Gallery Mitra *", "gallery_partner", $data['gallery_partner'], 10);
            tutup_form($link);
        }
        break;

        // Menyisipkan atau mengedit data di database
    case "action":
        $gallery_partner        = $_POST['gallery_partner'];
        $nama_partner           = addslashes($_POST['nama_partner']);
        $deskripsi              = addslashes($_POST['deskripsi']);
        $deskripsi_terjemahan   = addslashes($_POST['deskripsi_terjemahan']);
        $user                   = $_SESSION['iduser'];
        $isi                    = str_replace(['[' , ']' ,'"'], '', $gallery_partner);
        if ($_POST['aksi'] == "tambah") {
            $query="INSERT INTO partner SET
				nama_partner            = '$nama_partner',
                deskripsi               = '$deskripsi',
                deskripsi_terjemahan    = '$deskripsi_terjemahan',
				logo_partner            = '$_POST[logo_partner]',
                gallery_partner         = '$isi',
                id_user		            = '$user',
                created_at              = now()			
            ";
            $mysqli->query($query);
        } elseif ($_POST['aksi'] == "edit") {
            $query = "
                UPDATE partner SET
                nama_partner            = '$nama_partner',
                deskripsi               = '$deskripsi',
                deskripsi_terjemahan    = '$deskripsi_terjemahan',
                logo_partner 	        = '$_POST[logo_partner]',
                gallery_partner         = '$isi',
                id_user		            = '$user',
                updated_at              = now()	
                WHERE id_partner='$_POST[id]'
            ";
            $mysqli->query($query);
        }
        header('location:' . $link);
       
        break;

        // Menghapus data di database
    case "delete":
        $query     = $mysqli->query("SELECT * FROM partner WHERE id_partner='$_GET[id]'");
        $data    = $query->fetch_array();
        if ($_SESSION['leveluser'] == "admin" or $data['id_user'] == $_SESSION['iduser']) {
            $mysqli->query("DELETE FROM partner WHERE id_partner='$_GET[id]'");
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