<?php
$admin_author = array("admin", "author");
$admin = array("admin");
$author = array("author");

buat_menu("dashboard", "home", "Dashboard", $admin_author);

buka_dropdown("th-list", "Penerimaan");
	buat_submenu("admission_info", "Informasi");
	buat_submenu("pmb_online", "PMB Online");
tutup_dropdown();

buka_dropdown("th-list", "Tentang");
	buat_submenu("history", "Sejarah");
	buat_submenu("vision_mission", "Visi dan Misi");
	buat_submenu("organization", "Struktur Organisasi");
	buat_submenu("lecturer", "Dosen");
	buat_submenu("facility", "Fasilitas");
	buat_submenu("alumni", "Alumni");
	buat_submenu("sjm", "Unit SJM");
	buat_submenu("achievement", "Ruang Prestasi");
	buat_submenu("ukm", "UKM");
	buat_submenu("activity", "Aktifitas");
	buat_submenu("student", "Mahasiswa");
	buat_submenu("lab_tv", "Lab TV");
tutup_dropdown();

buka_dropdown("th-list", "Konseling Mahasiswa");
	buat_submenu("announcement_counseling", "Pengumuman");
	buat_submenu("schedule_counseling", "Jadwal");
tutup_dropdown();

buka_dropdown("th-list", "Informasi Akademik");
	buat_submenu("announcement_course", "Pengumuman");
	buat_submenu("list_course", "Daftar Mata Kuliah");
tutup_dropdown();

buka_dropdown("th-list", "LPPM");
	buat_submenu("devotion", "Pengabdian");
	buat_submenu("research", "Penelitian");
tutup_dropdown();

buat_menu("berita", "list-alt", "Berita", $admin_author);
buat_menu("event", "list-alt", "Acara", $admin_author);

buat_menu("partner", "list-alt", "Mitra", $admin_author);

buat_menu("kategori", "list-alt", "Kategori", $admin_author);

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
