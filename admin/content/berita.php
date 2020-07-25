<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config.js"></script>
<script type="text/javascript" src="js/validate.js"></script>

<?php
if (!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=berita";

$headline_list_const = [
    0 => [
        'val' => 0,
        'check' => 'checked',
        'cap' => 'Tidak'
    ],
    1 => [
        'val' => 1,
        'check' => '',
        'cap' => 'Utama'
    ],
    2 => [
        'val' => 2,
        'check' => '',
        'cap' => 'Penunjang'
    ],
];

switch ($show) {

        //Menampilkan data
    default:
        echo '<h3 class="page-header"><b>Daftar Berita</b>
				<a href="' . $link . '&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';

        buka_tabel(array("Judul Berita", "Kategori", "Headline", "Tanggal Posting", ));
        $no = 1;
        $id_user = $_SESSION['iduser'];

        if ($_SESSION['leveluser'] == "admin") $query = $mysqli->query("SELECT * FROM artikel ORDER BY created_at DESC");
        else $query = $mysqli->query("SELECT * FROM artikel WHERE id_user='$id_user' ORDER BY created_at DESC");
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

            $tanggal = print_tanggal($data['created_at']);

            isi_tabel($no, array($data['judul_terjemahan'], $kat['kategori'], $headline, $tanggal), $link, $data['id_artikel']);
            $no++;
        }
        tutup_tabel();

        break;

        //Menampilkan form input dan edit data
    case "form":
        $headline_list = $headline_list_const; //NEVER CHANGE CONSTANT ARRAY
        if (isset($_GET['id'])) {
            $query = $mysqli->query("SELECT * FROM artikel WHERE id_artikel='$_GET[id]'");
            $data = $query->fetch_array();
            $aksi = "Edit";
            if ($data['headline']) {
                $headline_list[$data['headline']]['check'] = 'checked'; 
            }
        } else {
            $data = array("id_artikel" => "", "judul" => "", "judul_terjemahan" => "", "isi" => "", "isi_terjemahan" => "", "gambar" => "", "kategori" => "");
            $aksi = "Tambah";
        }

        if ($aksi == "Edit" and $_SESSION['leveluser'] != "admin" and $data['id_user'] != $_SESSION['iduser']) {
            header('location:' . $link);
        } else {
            echo '<h3 class="page-header"><b>' . $aksi . ' Berita</b> </h3>';
			buka_form($link, $data['id_artikel'], strtolower($aksi));
			buat_textbox("Judul Berita (Bahasa Indonesia) *", "judul_terjemahan", $data['judul_terjemahan'], 10, true);
			buat_textbox("Judul Berita (English)", "judul", $data['judul'], 10);
			buat_textarea("Isi Berita (Bahasa Indonesia) *", "isi_terjemahan", $data['isi_terjemahan'], "richtext", true);
            buat_textarea("Isi Berita (English)", "isi", $data['isi'], "richtext");
            buat_radio("Tampilkan di Headline", "headline", $headline_list);
            buat_imagepicker("Gambar", "gambar", $data['gambar']);

            $kategori = $mysqli->query("SELECT * FROM kategori");
            $list = array();
            while ($k = $kategori->fetch_array()) {
                $list[] = array('val' => $k['id_kategori'], 'cap' => $k['kategori']);
            }
            buat_combobox("Kategori", "kategori", $list, $data['kategori']);
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
        $user = $_SESSION['iduser'];

        if ($headline == 1) { //berita utama
            //remove other headline
            $remove_main_headline_query = 'UPDATE artikel SET headline = null WHERE headline = 1';
            $mysqli->query($remove_main_headline_query);
        } elseif ($headline == 2) { //berita penunjang
            $checking_query = 'SELECT * FROM artikel WHERE headline = 2 ORDER BY created_at ASC';
            $result = $mysqli->query($checking_query);

            $countResult = mysqli_num_rows($result);
            if ($countResult > 2) { //if got more than 2 then remove one to be replaced with current one
                while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                    $remove_last_headline_query = "UPDATE artikel SET headline = null WHERE id_artikel = {$data['id_artikel']}";
                    $mysqli->query($remove_last_headline_query);
                    break;
                }
            }
        }
        
        if ($_POST['aksi'] == "tambah") {
            $mysqli->query("INSERT INTO artikel SET
				judul 		    = '$judul',
				judul_seo 	    = '$judul_seo',
				judul_terjemahan= '$judul_terjemahan',
				isi			    = '$isi',
				isi_terjemahan  = '$isi_terjemahan',
				hari		    = '$hari_ini',
				tanggal		    = '$tanggal',
				jam			    = '$jam',
				id_user		    = '$user',
				headline        = '$headline',
				kategori	    = '$_POST[kategori]',
				gambar 		    = '$_POST[gambar]',
                created_at      = now()			
			");
        } elseif ($_POST['aksi'] == "edit") {
            $mysqli->query("UPDATE artikel SET
					judul 		    = '$judul',
					judul_seo 	    = '$judul_seo',
                    judul_terjemahan= '$judul_terjemahan',
					isi			    = '$isi',
                    isi_terjemahan  = '$isi_terjemahan',
					hari		    = '$hari_ini',
					tanggal		    = '$tanggal',
					jam			    = '$jam',
					id_user		    = '$user',
                    headline        = '$headline',
					kategori	    = '$_POST[kategori]',
					gambar 		    = '$_POST[gambar]',
                    updated_at      = now()
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