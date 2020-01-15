<?php
function unzip_file($filename, $source,  $target){
	$target_path = $target.$filename; 
	move_uploaded_file($source, $target_path);
	$zip = new ZipArchive();
	$x = $zip->open($target_path);
	if ($x === true) {
		$zip->extractTo($target);
		$zip->close();
	
		unlink($target_path);
	}
}
?>
