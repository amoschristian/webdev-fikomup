<?php
if(!defined("INDEX")) header('location: ../index.php');
if($_SESSION['leveluser']!="admin") header('location: index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=backuprestore";
switch($show){

	//Menampilkan data
	default:
		echo'<h4 class="page-header"><b> Backup </b> </h4>';	
		echo'<div class="alert alert-info">Lakukan backup database secara teratur agar data website tetap aman!<br/><br/>
			<a href="'.$link.'&show=backup" class="btn btn-success"> <i class="glyphicon glyphicon-save"></i> Backup Database</a>
			</div>';
			
		echo'<h4 class="page-header"><b> Restore </b> </h4>';
		echo'<div class="alert alert-warning">Pastikan backup database terlebih dahulu sebelum melakukan restore!<br/><br/>
			<form method="post" action="'.$link.'&show=restore" enctype="multipart/form-data">
				<input type="file" name="filesql"> <br/>
				<button type="submit" class="btn btn-danger"> <i class="glyphicon glyphicon-open"></i> Restore Database</button>
			</form>
			</div>';
	break;
	case "backup":
		//1. Mendapatkan semua tabel
		$array_table = array();
		$data_table = $mysqli->query("SHOW TABLES"); 
		while($row = $data_table->fetch_array()) {
			$array_table[] = $row[0];
		}
		$data_table->free();

		$isi_file = "";
		foreach($array_table as $table){
		
			//2. Generate skrip sql untuk menghapus tabel
			$isi_file .= "DROP TABLE IF EXISTS ".$table.";";
					
			//3. Generate skrip sql untuk membuat tabel
			$str_create = $mysqli->query("SHOW CREATE TABLE ".$table);
			$row_create = $str_create->fetch_row();
			$isi_file.= "\n\n".$row_create[1].";\n\n";
			$str_create->free();

			//4. Cari data dari tabel
			$data = $mysqli->query("SELECT * FROM ".$table);
			$fields_info = $data->fetch_fields();

			//5. Dapatkan nama kolom (fields) dan nilainya (values)
			while($values = $data->fetch_assoc()) {
				$str_fields = '';
				$str_values = '';
				foreach ($fields_info as $field) {
					if($str_fields != '') $str_fields .= ',';
					$str_fields .= "`".$field->name."`";
			
					if($str_values != '') $str_values .= ',';
					$data_values = str_replace("'", "''", $values[$field->name]);
					$data_values = ereg_replace("\n", "\\n", $data_values);
					$str_values .= "'".$data_values."'";
				}
				

				//6. Generate skrip SQL untuk menyisipkan (insert) data
				$isi_file .= "INSERT INTO ".$table." (".$str_fields.") VALUES (".$str_values.");\n";
			}
			$isi_file .= "\n\n\n";
			$data->free();

		}
		
		//7. Membuat file sql pada folder backup dengan isi seperti variabel $isi_file
		$file = 'backup/backup_'.date('Y-m-d_h_i_s').'.sql';	
		$handle = fopen($file,'w+');
		fwrite($handle, $isi_file);
		fclose($handle);
		
		//8. Download file sql
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: private');
		header('Pragma: private');
		header('Content-Length: '.filesize($file));
		ob_clean();
		flush();
		readfile($file);
		exit;
	break;
	
	case "restore":
		$nama_file 		= $_FILES['filesql']['name'];
		$lokasi_file 	= $_FILES['filesql']['tmp_name'];
		
		$alamat_file 	= "backup/".$nama_file;		
		if(move_uploaded_file($lokasi_file , "backup/$nama_file")){
			$templine	= '';
			$lines		= file($alamat_file);

			foreach($lines as $line){
				if(substr($line, 0, 2) == '--' || $line == '') continue;
			 
				$templine .= $line;

				if(substr(trim($line), -1, 1) == ';'){
					$mysqli->query($templine) or die($mysql->error);
					$templine = '';
				}
			}
			echo '<script>
					window.alert("Database berhasil di-restore!");
					window.location.href = "'.$link.'";
				</script>';
		
		}else{
			echo '<script>
					window.alert("Restore database gagal!");
					window.location.href = "'.$link.'";
				</script>';
		}
	break;
}
?>