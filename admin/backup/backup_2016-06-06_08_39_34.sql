DROP TABLE IF EXISTS artikel;

CREATE TABLE `artikel` (
  `id_artikel` int(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `id_user` int(5) NOT NULL,
  `kategori` int(5) NOT NULL,
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `hits` int(10) NOT NULL,
  PRIMARY KEY (`id_artikel`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO artikel (`id_artikel`,`judul`,`judul_seo`,`isi`,`gambar`,`hari`,`tanggal`,`jam`,`id_user`,`kategori`,`tag`,`hits`) VALUES (20);
INSERT INTO artikel (`id_artikel`,`judul`,`judul_seo`,`isi`,`gambar`,`hari`,`tanggal`,`jam`,`id_user`,`kategori`,`tag`,`hits`) VALUES (32);
INSERT INTO artikel (`id_artikel`,`judul`,`judul_seo`,`isi`,`gambar`,`hari`,`tanggal`,`jam`,`id_user`,`kategori`,`tag`,`hits`) VALUES (136);
INSERT INTO artikel (`id_artikel`,`judul`,`judul_seo`,`isi`,`gambar`,`hari`,`tanggal`,`jam`,`id_user`,`kategori`,`tag`,`hits`) VALUES (1);
INSERT INTO artikel (`id_artikel`,`judul`,`judul_seo`,`isi`,`gambar`,`hari`,`tanggal`,`jam`,`id_user`,`kategori`,`tag`,`hits`) VALUES (88);
INSERT INTO artikel (`id_artikel`,`judul`,`judul_seo`,`isi`,`gambar`,`hari`,`tanggal`,`jam`,`id_user`,`kategori`,`tag`,`hits`) VALUES (0);



DROP TABLE IF EXISTS halaman;

CREATE TABLE `halaman` (
  `id_halaman` int(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `id_modul` int(5) NOT NULL,
  `gambar` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `id_user` int(5) NOT NULL,
  `hits` int(10) NOT NULL,
  PRIMARY KEY (`id_halaman`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO halaman (`id_halaman`,`judul`,`judul_seo`,`isi`,`id_modul`,`gambar`,`hari`,`tanggal`,`jam`,`id_user`,`hits`) VALUES (0);
INSERT INTO halaman (`id_halaman`,`judul`,`judul_seo`,`isi`,`id_modul`,`gambar`,`hari`,`tanggal`,`jam`,`id_user`,`hits`) VALUES (0);
INSERT INTO halaman (`id_halaman`,`judul`,`judul_seo`,`isi`,`id_modul`,`gambar`,`hari`,`tanggal`,`jam`,`id_user`,`hits`) VALUES (0);



DROP TABLE IF EXISTS kategori;

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO kategori (`id_kategori`,`kategori`,`kategori_seo`) VALUES (movie);
INSERT INTO kategori (`id_kategori`,`kategori`,`kategori_seo`) VALUES (entertainment);
INSERT INTO kategori (`id_kategori`,`kategori`,`kategori_seo`) VALUES (how-to);
INSERT INTO kategori (`id_kategori`,`kategori`,`kategori_seo`) VALUES (health);
INSERT INTO kategori (`id_kategori`,`kategori`,`kategori_seo`) VALUES (science);
INSERT INTO kategori (`id_kategori`,`kategori`,`kategori_seo`) VALUES (technology);
INSERT INTO kategori (`id_kategori`,`kategori`,`kategori_seo`) VALUES (relationship);
INSERT INTO kategori (`id_kategori`,`kategori`,`kategori_seo`) VALUES (business);



DROP TABLE IF EXISTS komentar;

CREATE TABLE `komentar` (
  `id_komentar` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `komentar` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `id_artikel` int(10) NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO komentar (`id_komentar`,`nama`,`email`,`komentar`,`tanggal`,`id_artikel`) VALUES (12);
INSERT INTO komentar (`id_komentar`,`nama`,`email`,`komentar`,`tanggal`,`id_artikel`) VALUES (5);
INSERT INTO komentar (`id_komentar`,`nama`,`email`,`komentar`,`tanggal`,`id_artikel`) VALUES (5);
INSERT INTO komentar (`id_komentar`,`nama`,`email`,`komentar`,`tanggal`,`id_artikel`) VALUES (6);
INSERT INTO komentar (`id_komentar`,`nama`,`email`,`komentar`,`tanggal`,`id_artikel`) VALUES (6);
INSERT INTO komentar (`id_komentar`,`nama`,`email`,`komentar`,`tanggal`,`id_artikel`) VALUES (7);
INSERT INTO komentar (`id_komentar`,`nama`,`email`,`komentar`,`tanggal`,`id_artikel`) VALUES (7);
INSERT INTO komentar (`id_komentar`,`nama`,`email`,`komentar`,`tanggal`,`id_artikel`) VALUES (11);



DROP TABLE IF EXISTS layout;

CREATE TABLE `layout` (
  `id_layout` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tipe` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `layout` int(2) NOT NULL,
  `kategori_1` int(5) NOT NULL,
  `kategori_2` int(5) NOT NULL,
  `halaman` int(5) NOT NULL,
  `batas` int(5) NOT NULL,
  `urut` int(2) NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_layout`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO layout (`id_layout`,`judul`,`tipe`,`layout`,`kategori_1`,`kategori_2`,`halaman`,`batas`,`urut`,`aktif`) VALUES (Y);
INSERT INTO layout (`id_layout`,`judul`,`tipe`,`layout`,`kategori_1`,`kategori_2`,`halaman`,`batas`,`urut`,`aktif`) VALUES (Y);



DROP TABLE IF EXISTS md_social;

CREATE TABLE `md_social` (
  `id_social` int(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `website` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `link` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_social`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO md_social (`id_social`,`judul`,`website`,`link`) VALUES ();
INSERT INTO md_social (`id_social`,`judul`,`website`,`link`) VALUES ();
INSERT INTO md_social (`id_social`,`judul`,`website`,`link`) VALUES ();
INSERT INTO md_social (`id_social`,`judul`,`website`,`link`) VALUES ();
INSERT INTO md_social (`id_social`,`judul`,`website`,`link`) VALUES ();
INSERT INTO md_social (`id_social`,`judul`,`website`,`link`) VALUES ();



DROP TABLE IF EXISTS menu;

CREATE TABLE `menu` (
  `id_menu` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kategori_menu` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `jenis_link` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `induk` int(5) NOT NULL,
  `urut` int(5) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (6);
INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (1);
INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (4);
INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (1);
INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (1);
INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (0);
INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (3);
INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (2);
INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (5);
INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (7);
INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (8);
INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (9);
INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (10);
INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (1);
INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (0);
INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (3);
INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (6);
INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (5);
INSERT INTO menu (`id_menu`,`judul`,`kategori_menu`,`jenis_link`,`link`,`induk`,`urut`) VALUES (4);



DROP TABLE IF EXISTS modul;

CREATE TABLE `modul` (
  `id_modul` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `menu` enum('N','Y') COLLATE latin1_general_ci NOT NULL,
  `konten` enum('N','Y') COLLATE latin1_general_ci NOT NULL,
  `sidebar` enum('N','Y') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO modul (`id_modul`,`judul`,`folder`,`menu`,`konten`,`sidebar`,`aktif`) VALUES (Y);
INSERT INTO modul (`id_modul`,`judul`,`folder`,`menu`,`konten`,`sidebar`,`aktif`) VALUES (Y);
INSERT INTO modul (`id_modul`,`judul`,`folder`,`menu`,`konten`,`sidebar`,`aktif`) VALUES (N);



DROP TABLE IF EXISTS setting;

CREATE TABLE `setting` (
  `id_setting` int(5) NOT NULL AUTO_INCREMENT,
  `parameter` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nilai` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO setting (`id_setting`,`parameter`,`nilai`) VALUES (maxNews);
INSERT INTO setting (`id_setting`,`parameter`,`nilai`) VALUES (Website berita terlengkap);
INSERT INTO setting (`id_setting`,`parameter`,`nilai`) VALUES (http://localhost/pixart);
INSERT INTO setting (`id_setting`,`parameter`,`nilai`) VALUES (oke/002.jpg);
INSERT INTO setting (`id_setting`,`parameter`,`nilai`) VALUES (business, movie, music, health);
INSERT INTO setting (`id_setting`,`parameter`,`nilai`) VALUES (/pixart);



DROP TABLE IF EXISTS sidebar;

CREATE TABLE `sidebar` (
  `id_sidebar` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tipe` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `konten` text COLLATE latin1_general_ci NOT NULL,
  `posisi` int(2) NOT NULL,
  `urut` int(2) NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_sidebar`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO sidebar (`id_sidebar`,`judul`,`tipe`,`konten`,`posisi`,`urut`,`aktif`) VALUES (Y);
INSERT INTO sidebar (`id_sidebar`,`judul`,`tipe`,`konten`,`posisi`,`urut`,`aktif`) VALUES (Y);
INSERT INTO sidebar (`id_sidebar`,`judul`,`tipe`,`konten`,`posisi`,`urut`,`aktif`) VALUES (Y);
INSERT INTO sidebar (`id_sidebar`,`judul`,`tipe`,`konten`,`posisi`,`urut`,`aktif`) VALUES (Y);
INSERT INTO sidebar (`id_sidebar`,`judul`,`tipe`,`konten`,`posisi`,`urut`,`aktif`) VALUES (Y);
INSERT INTO sidebar (`id_sidebar`,`judul`,`tipe`,`konten`,`posisi`,`urut`,`aktif`) VALUES (Y);
INSERT INTO sidebar (`id_sidebar`,`judul`,`tipe`,`konten`,`posisi`,`urut`,`aktif`) VALUES (Y);



DROP TABLE IF EXISTS tag;

CREATE TABLE `tag` (
  `id_tag` int(5) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO tag (`id_tag`,`tag`,`tag_seo`) VALUES (movie);
INSERT INTO tag (`id_tag`,`tag`,`tag_seo`) VALUES (entertainment);
INSERT INTO tag (`id_tag`,`tag`,`tag_seo`) VALUES (how-to);
INSERT INTO tag (`id_tag`,`tag`,`tag_seo`) VALUES (health);
INSERT INTO tag (`id_tag`,`tag`,`tag_seo`) VALUES (science);
INSERT INTO tag (`id_tag`,`tag`,`tag_seo`) VALUES (technology);
INSERT INTO tag (`id_tag`,`tag`,`tag_seo`) VALUES (relationship);
INSERT INTO tag (`id_tag`,`tag`,`tag_seo`) VALUES (business);



DROP TABLE IF EXISTS template;

CREATE TABLE `template` (
  `id_template` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_template`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO template (`id_template`,`judul`,`folder`,`aktif`) VALUES (N);
INSERT INTO template (`id_template`,`judul`,`folder`,`aktif`) VALUES (Y);



DROP TABLE IF EXISTS user;

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO user (`id_user`,`nama_lengkap`,`email`,`username`,`password`,`level`) VALUES (admin);
INSERT INTO user (`id_user`,`nama_lengkap`,`email`,`username`,`password`,`level`) VALUES (author);



