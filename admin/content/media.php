<?php
if(!defined("INDEX")) header('location: ../index.php');
if($_SESSION['leveluser']!="admin") header('location: index.php');

echo'<h3 class="page-header"><b>Media</b></h3>
	<iframe src="../plugin/filemanager/dialog.php" width="100%" height="70%" style="border: 0;"></iframe>';

?>