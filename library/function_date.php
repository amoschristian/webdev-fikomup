<?php
function print_tanggal($tgl, $format = null){

	if ($format) {
		return strftime($format, strtotime($tgl)); //function bisa support translate module
	}

	return strftime("%d %B %Y", strtotime($tgl)); //function bisa support translate module	 
}
?>
