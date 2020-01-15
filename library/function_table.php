<?php
function buka_tabel($judul){
	echo'<div class="table-responsive">
		<table class="table-data table table-striped" width="100%">
		<thead>
			<tr>
				<th style="width: 10px">No</th>';
	foreach($judul as $jdl){
		echo '<th>'.$jdl.'</th>';
	}
				
	echo'		<th style="width: 60px">Aksi</th>
			</tr>
		</thead>
		<tbody>';
}

function isi_tabel($no, $data, $link, $id, $edit=true, $hapus=true){
	echo'<tr>
			<td valign="top">'.$no.'</td>';
	foreach($data as $dt){
		echo'<td valign="top">'.$dt.'</td>';
	}
	echo'<td valign="top">';
	if($edit){
		echo'<a href="'.$link.'&show=form&id='.$id.'" class="btn btn-primary btn-sm">
				<i class="glyphicon glyphicon-pencil"></i>
			</a> ';
	}
	if($hapus){
		echo'<a href="'.$link.'&show=delete&id='.$id.'" class="btn btn-danger btn-sm">
				<i class="glyphicon glyphicon-trash"></i>
			</a>';
	}
	echo'</td>
		</tr>';
}

function tutup_tabel(){
	echo'		</tbody>	
			</table>
		</div>';
}
?>
