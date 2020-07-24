<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config.js"></script>
<script type="text/javascript" src="js/select2.min.js"></script>
<link href="css/select2.min.css" rel="stylesheet" />

<?php
if (!defined("INDEX")) header('location: ../index.php');
$tipeCourse = 1;

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=list_course";

switch ($show) {

    //Menampilkan data
    default:
        echo '<h3 class="page-header"><b>Daftar Pengumuman</b>
				<a href="' . $link . '&show=form" class="btn btn-primary btn-sm pull-right top-button">
					<i class="glyphicon glyphicon-plus-sign"></i> Tambah
				</a>
			</h3>';

        buka_tabel(array("Semester"));
        $no = 1;
        $id_user = $_SESSION['iduser'];

        if ($_SESSION['leveluser'] == "admin") $query = $mysqli->query("SELECT * FROM courses ORDER BY semester ASC");
        else $query = $mysqli->query("SELECT * FROM courses WHERE id_user='$id_user' ORDER BY semester ASC");
        while ($data = $query->fetch_array()) {		
			$semester = 'Semester ' . $data['semester'];	
            isi_tabel($no, array($semester), $link, $data['id']);
            $no++;
        }
        tutup_tabel();

        break;

        //Menampilkan form input dan edit data
    case "form":
        if (isset($_GET['id'])) {
            $query = $mysqli->query("SELECT * FROM courses WHERE id='$_GET[id]'");
            $data = $query->fetch_array();
            $aksi = "Edit";
        } else {
            $data = array("id" => "", "semester" => "", "list" => "", "list_minor" => "", "list_peminatan" => "");
            $aksi = "Tambah";
        }

        if ($aksi == "Edit" and $_SESSION['leveluser'] != "admin" and $data['id_user'] != $_SESSION['iduser']) {
            header('location:' . $link);
        } else {
            echo '<h3 class="page-header"><b>' . $aksi . ' Semester</b> </h3>';
            buka_form($link, $data['id'], strtolower($aksi));
			buat_textbox("Semester *", "semester", $data['semester'], 2, true, 'number', 'Mohon masukan angka bulat');
			buat_input_table_course("Mata Kuliah Wajib", "list", $data['list'], 8);
			buat_input_table_course("Mata Kuliah Minor", "list_minor", $data['list_minor'], 8);
			buat_input_table_course("Mata Kuliah Peminatan", "list_peminatan", $data['list_peminatan'], 8);
			echo '<br>';
            tutup_form($link);
        }
        break;

        //Menyisipkan atau mengedit data di database
	case "action":
        $semester = $_POST['semester'];
        $list = json_encode($_POST['list']);
        $list_minor = json_encode($_POST['list_minor']);
        $list_peminatan = json_encode($_POST['list_peminatan']);
        $user = $_SESSION['iduser'];
        
        if ($_POST['aksi'] == "tambah") {
            $mysqli->query("INSERT INTO courses SET
				semester		= $semester,
				list		    = '$list',
				list_minor		= '$list_minor',
				list_peminatan	= '$list_peminatan',
				id_user		    = '$user',
                created_at      = now()
			");
        } elseif ($_POST['aksi'] == "edit") {
            $mysqli->query("UPDATE courses SET
					semester		= $semester,
					list		    = '$list',
					list_minor		= '$list_minor',
					list_peminatan	= '$list_peminatan',
                    updated_at      = now()
				WHERE id='$_POST[id]'");
        }
        header('location:' . $link);
        break;

        //Menghapus data di database
    case "delete":
        $query     = $mysqli->query("SELECT * FROM courses WHERE id='$_GET[id]'");
        $data    = $query->fetch_array();
        if ($_SESSION['leveluser'] == "admin" or $data['id_user'] == $_SESSION['iduser']) {
            $mysqli->query("DELETE FROM courses WHERE id='$_GET[id]'");
        }
        header('location:' . $link);
        break;
}
?>

<script>
	$(document).ready(function() {
		$(".add-more").off().on("click", function() {
			var id = $(this).attr('id');
			var counter = $(this).attr('data-counter');
			var table = $('table[id='+id+'] tbody');

			var newIndex = parseInt(counter) + 1;
			var newElement = `
				<tr id=${newIndex}>
					<td class='text-center'><input type='text' class='form-control' autocomplete='off' name='${id}[${newIndex}][id]' value='' size='20'></td>
					<td class='text-center'><input type='text' class='form-control' autocomplete='off' name='${id}[${newIndex}][name]' value='' size='20'></td>
					<td class='text-center'><input type='text' class='form-control' autocomplete='off' name='${id}[${newIndex}][sks]' value='' size='20'></td>
					<td class='text-center'><button type='button' class='btn btn-danger remove' id=${id} data-index=${newIndex}>-</button></td>
				</tr>
			`;

			table.append(newElement);
			$(this).attr('data-counter', newIndex);
		});
	});

	$(document).on('click','.remove',function(){
		var id = $(this).attr('id');
		var index = $(this).data('index');
		var table = $('table[id='+id+'] tbody');
		var rowCount = table.find('tr').length;
		var row = table.find('tr[id='+index+']');

		if (rowCount > 1) {
			row.remove();
		}
	});
</script>