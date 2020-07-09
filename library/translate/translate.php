<?php

function buildTranslateNavbar() {
    return [
        'Home' => 'Beranda',
        'Admissions' => 'Penerimaan',
        'Courses' => 'Mata Kuliah',
        'Events' => 'Acara',
        'News' => 'Berita',
        'About Us' => 'Tentang',
        'Partners' => 'Mitra',
        'Contact' => 'Kontak',
    ];
}

function buildTranslateFooter() {
    return [
        'Menu' => 'Menu',
        'Contact' => 'Kontak',
        'Language' => 'Bahasa'
    ];
}

function buildTranslateGlobal() {
    return [
        'Read More' => 'Baca Selengkapnya',
        'Learn More' => 'Pelajari Selengkapnya',
        'View More' => 'Lihat Selengkapnya',
        'Get in touch' => 'Hubungi Kami',
        'Faculty of Communication' => 'Fakultas Ilmu Komunikasi',
        'Universitas Pancasila' => 'Universitas Pancasila',
    ];
}

function buildTranslateHome() {
    return [
        'Sitemap' => 'Peta Situs',
        'Welcome to' => 'Selamat Datang di',
        'Upcoming Events' => 'Acara Mendatang',
        'Headline' => 'Berita Utama',
        'Social Media' => 'Media Sosial',
        'Our Partners' => 'Mitra Kami'       
    ];
}

function buildTranslateLatest() {
    return [
        'Latest Posts' => 'Berita Terbaru',
        'Tags' => 'Tags'
    ];
}

function buildTranslateEvent() {
    return [
        'Located At' => 'Berlokasi di',
        'Latest Events' => 'Acara Terbaru',
    ];
}

function buildTranslateAdmission() {
    return [
        'Information' => 'Informasi',
        'PMB Online' => 'PMB Online',
        'C' => 'K',
        'lick Here to go to' => 'lik Disini untuk pergi ke'
    ];
}

function buildTranslateContact() {
    return [
        'Get in Touch with Us on' => 'Hubungi Kami di',
        'Find Us On' => 'Temukan Kami di',
        'send message' => 'Kirim Pesan',
        'Please Select a Type' => 'Silakan Pilih Jenis',
        'Inquiry' => 'Pertanyaan',
        'Feedback' => 'Feedback',
        'Name' => 'Nama',
        'Message' => 'Pesan',
    ];
}

function buildTranslatePartners() {
    return [
        'Description' => 'Deskripsi',
        'Gallery' => 'Galeri',
    ];
}

function buildTranslateAboutUs() {
    return [
        'Organizations' => 'Organisasi',
        'History' => 'Sejarah',
        'Organizations Structure' => 'Struktur Organisasi',
        'Vision & Mission' => 'Visi & Misi',
        'Vision' => 'Visi',
        'Mission' => 'Misi',
        'Resources' => 'Sumber Daya',
        'Lecturer' => 'Dosen',
        'Facility' => 'Fasilitas',
        'Alumni' => 'Alumni',
        'Activity' => 'Aktifitas',
        'UKM' => 'UKM',
        'Mobility' => 'Mobilitas',
        'Student' => 'Mahasiswa',
		'Student Counseling' => 'Konseling Mahasiswa',
		'Announcement' => 'Pengumuman',
		'Schedule' => 'Jadwal',
		'Attachment' => 'Lampiran'
    ];
}

function buildTranslateLecturer() {
    return [
        'Lecturer Registration Number' => 'Nomor Pokok Dosen',
        'N I D N' => 'N I D N',
        'Title' => 'Gelar',
        'Gender' => 'Jenis Kelamin',
        'Field of Study' => 'Bidang Kajian',
        'Last Position' => 'Kepangkatan Terakhir',
        'Last Education' => 'Pendidikan Terakhir',
        'Last University' => 'Nama Perguruan Tinggi Terakhir',
        'Position' => 'Jabatan',
        'Email' => 'Email',
    ];
}

function buildTranslateTables() {
    return [
        'Photo' => 'Foto',
        'Student ID' => 'NIM',
        'Major' => 'Jurusan',
        'Graduated Year' => 'Tahun Kelulusan'
    ];
}

function buildTranslateCourses() {
    return [
        'Courses List' => 'Daftar Mata Kuliah'
    ];
}

function buildTranslateArray() {
    return array_merge(
        buildTranslateGlobal(),
        buildTranslateNavbar(),
        buildTranslateFooter(),
        buildTranslateHome(),
        buildTranslateLatest(),
        buildTranslateEvent(),
        buildTranslateAdmission(),
        buildTranslateContact(),
        buildTranslatePartners(),
        buildTranslateAboutUs(),
        buildTranslateLecturer(),
        buildTranslateTables(),
        buildTranslateCourses()
    );
}
