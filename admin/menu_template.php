<?php
$admin_author = array("admin", "author");
$admin = array("admin");
$author = array("author");

buat_menu("dashboard", "home", "Dashboard", $admin_author);

buka_dropdown("list-alt", "Kategori & Tag");
	buat_submenu("kategori", "Kategori");
	buat_submenu("tag", "Tag");
tutup_dropdown();

buat_menu("berita", "list-alt", "Publikasi", $admin_author);
buat_menu("event", "list-alt", "Acara", $admin_author);

buat_menu("lecturer", "picture", "Dosen", $admin_author);

buat_menu("partner", "picture", "Mitra", $admin_author);

buat_menu("media", "picture", "Media", $admin);

// buat_menu("user", "user", "User", $admin_author);

// buat_menu("modul", "tasks", "Modul");
// buka_dropdown("th-list", "Tampilan");
	// buat_submenu("template", "Template");
	// buat_submenu("menu", "Menu");
	// buat_submenu("widget", "Widget");
// tutup_dropdown();

// buat_menu("setting", "wrench", "Pengaturan");

buat_menu("instagram", "wrench", "Instagram");

// buat_menu("backuprestore", "floppy-save", "Backup dan Restore");

// $query = $mysqli->query("SELECT * FROM modul WHERE menu='Y' AND aktif='Y'");
// while($data = $query->fetch_array()){
// 	if(file_exists("../module/$data[folder]/menu.php")){
// 		include "../module/$data[folder]/menu.php";
// 	}
// }
