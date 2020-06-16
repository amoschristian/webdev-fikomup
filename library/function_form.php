<?php
function buka_form($link, $id, $aksi){
	echo'<form method="post" action="'.$link.'&show=action" class="form-horizontal" enctype="multipart/form-data">
			<input type="hidden" name="id" value="'.$id.'">
			<input type="hidden" name="aksi" value="'.$aksi.'">';
}

function buat_textbox($label, $nama, $nilai, $lebar='4', $tipe="text", $placeholder = ''){
	echo'<div class="form-group" id="'.$nama.'">
			<label for="'.$nama.'" class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-'.$lebar.'">
			  <input type="'.$tipe.'" class="form-control" name="'.$nama.'" value="'.$nilai.'" placeholder="'.$placeholder.'">
			</div>
		 </div>';
}

function buat_textarea($label, $nama, $nilai, $class=''){
	echo'<div class="form-group" id="'.$nama.'">
			<label for="'.$nama.'" class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-10">
			  <textarea class="form-control '.$class.'" rows="8" name="'.$nama.'">'.$nilai.'</textarea>
			</div>
		 </div>';
}

function buat_combobox($label, $nama, $list, $nilai, $lebar='4'){
	echo'<div class="form-group" id="'.$nama.'">
			<label for="'.$nama.'" class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-'.$lebar.'">
			  <select class="form-control" name="'.$nama.'">';
		foreach($list as $ls){
			$select = $ls['val']==$nilai ? 'selected' : '';
			echo'<option value='.$ls['val'].' '.$select.'>'.$ls['cap'].'</option>';
		}
	echo'	  </select>
			</div>
		 </div>';
}

function buat_checkbox($label, $nama, $list){
	echo'<div class="form-group" id="'.$nama.'">
			<label class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-10">';
		foreach($list as $ls){
			echo' <input type="checkbox" name="'.$nama.'[]" value="'.$ls['val'].'" '.$ls['check'].'> '.$ls['cap'];
		}
	echo'	</div>
		</div>';
}

function buat_radio($label, $nama, $list){
	echo'<div class="form-group" id="'.$nama.'">
			<label class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-10" style="padding-top:7px">';
		foreach($list as $ls){
			echo'<label  for="'.$nama.$ls['val'].'" id="label_'.$nama.$ls['val'].'" style="margin-right:10px"> 
					<input type="radio" name="'.$nama.'" id="'.$nama.$ls['val'].'" value="'.$ls['val'].'" '.$ls['check'].'> '.$ls['cap'].' 
				</label>';
		}
	echo'	</div>
		</div>';
}

function buat_imagepicker($label, $nama, $nilai, $lebar='4'){
?>
	<script>
		$(function(){
			$('#modal-<?php echo $nama; ?>').on('hidden.bs.modal', function (e) {
				var url = $('#<?php echo $nama; ?>').val();
				if(url != "") $('.tampil-<?php echo $nama; ?>').html('<img src="../media/thumbs/'+url+'" width="150" style="margin-bottom: 10px">');
			})
		});
	</script>
<?php
	echo'<div class="form-group imagepicker">
			<label for="'.$nama.'" class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-'.$lebar.'">
			<div class="tampil-'.$nama.'">';
		if($nilai != "") echo'<img src="../media/thumbs/'.$nilai.'" width="150" style="margin-bottom: 10px">';
	echo'	</div>
			<div class="input-group">
			  <input type="text" class="form-control input-'.$nama.'" id="'.$nama.'" name="'.$nama.'" value="'.$nilai.'" readonly>
			  <a data-toggle="modal" data-target="#modal-'.$nama.'" class="input-group-addon btn btn-primary pilih-'.$nama.'">...</a>
			</div>
			</div>
			<div class="modal fade" id="modal-'.$nama.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">File Manager</h4>
						</div>
						<div class="modal-body">
							<iframe src="../plugin/filemanager/dialog.php?type=1&field_id='.$nama.'&relative_url=1" width="100%" height="400" style="border: 0"></iframe>
						</div>
					</div>
				</div>
			</div>
		 </div>';
}

function buat_imagepicker_multiple($label, $nama, $nilai, $lebar='4'){
?>
	<script>
		$(function(){
			$('#modal-<?php echo $nama; ?>').on('hidden.bs.modal', function (e) {
				var url = $('#<?php echo $nama; ?>').val();
				if(url != "") $('.tampil-<?php echo $nama; ?>').html('<img src="../media/thumbs/'+url+'" width="150" style="margin-bottom: 10px">');
			})
		});
	</script>
<?php
	echo'<div class="form-group imagepicker">
			<label for="'.$nama.'" class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-'.$lebar.'">';
	echo'	<div class="input-group">
			  <input type="text" class="form-control input-'.$nama.'" id="'.$nama.'" name="'.$nama.'" value="'.$nilai.'" readonly>
			  <a data-toggle="modal" data-target="#modal-'.$nama.'" class="input-group-addon btn btn-primary pilih-'.$nama.'">...</a>
			</div>
			</div>
			<div class="modal fade" id="modal-'.$nama.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">File Manager</h4>
						</div>
						<div class="modal-body">
							<iframe src="../plugin/filemanager/dialog.php?type=1&field_id='.$nama.'&relative_url=1" width="100%" height="400" style="border: 0"></iframe>
						</div>
					</div>
				</div>
			</div>
		 </div>';
}

function tutup_form($link){
	echo'<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">
					<i class="glyphicon glyphicon-floppy-disk"></i> Simpan 
				</button>
				<a class="btn btn-warning" href="'.$link.'">
					<i class="glyphicon glyphicon-arrow-left"></i> Batal 
				</a>
			</div>
		</div>
	</form>';
}

function buat_select2($label, $nama, $list){
	echo "<div class='form-group' id='$nama'>
			<label class='col-sm-2 control-label'>$label</label>
			<div class='col-sm-4'>";
	echo "	<select class='js-example-basic-multiple' name='{$nama}[]' multiple='multiple' style='width:100%'>";

	foreach ($list as $option) {
		$value = $option['val'];
		$text = $option['cap'];
		$selected = $option['selected'];

		echo "<option value='$value' $selected>$text</option>";
	}

	echo '	</select>	
			</div>
		</div>';
}

function buat_map($label, $nama, $nilai, $token, $lebar='6', $tipe="text"){
	$coordinate = '106.833144, -6.339445'; //Universitas Pancasila

	if ($nilai) {
		$coordinate = $nilai;
	}
	echo'<div class="form-group" id="'.$nama.'">
			<label for="'.$nama.'" class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-'.$lebar.'">
			  <input id="mapbox_input_'.$nama.'" type="'.$tipe.'" class="form-control" name="'.$nama.'" value="'.$nilai.'" readonly style="margin-bottom:10px">
	';

	echo "
	<div class='map_container'>
		<div id='map'></div>
		<script>
			mapboxgl.accessToken = '$token';
			var map = new mapboxgl.Map({
				container: 'map',
				style: 'mapbox://styles/mapbox/streets-v11',
				center: [$coordinate],
				zoom: 16
			});

			var marker = new mapboxgl.Marker({
				draggable: true,
				color: '#f44f00',
			})
			.setLngLat([$coordinate])
			.addTo(map);

			marker.on('dragend', onDragEnd);

			var geoCoder = new MapboxGeocoder({
				accessToken: mapboxgl.accessToken,
				countries: 'id',
				marker: {
					color: '#f44f00',
					draggable: true
				},
				mapboxgl: mapboxgl
			})

			map.addControl(geoCoder);

			geoCoder.on('result', function(e) {
				marker.remove();
				var lang = e.result.center[0];
				var lat = e.result.center[1];
				var coordinate = lang + ', ' + lat;
				editCoordinate(coordinate);
				
				geoCoder.mapMarker.on('dragend', onDragEndGeoCoder);
			})
			
			function onDragEnd() {
				var lngLat = marker.getLngLat();
				var coordinate = lngLat.lng + ', ' + lngLat.lat;
				editCoordinate(coordinate);
			}

			function onDragEndGeoCoder() {
				var lngLat = geoCoder.mapMarker.getLngLat();
				var coordinate = lngLat.lng + ', ' + lngLat.lat;
				editCoordinate(coordinate);
			}

			function editCoordinate(val) {
				var selector = '#mapbox_input_$nama';
				$(selector).val(val);
			}

		</script>
	</div>
	";

	echo '</div>
		</div>';
}

?>
