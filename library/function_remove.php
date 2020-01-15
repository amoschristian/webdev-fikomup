<?php
function hapus_folder($path) {
 	$files = glob($path . '/*');
	foreach ($files as $file) {
		is_dir($file) ? hapus_folder($file) : unlink($file);
	}
	rmdir($path);
 	return;
}
?>
