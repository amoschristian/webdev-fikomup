DROP TABLE IF EXISTS artikel;

;

INSERT INTO artikel (`id_artikel`,`judul`,`judul_seo`,`isi`,`gambar`,`hari`,`tanggal`,`jam`,`id_user`,`kategori`,`tag`,`hits`) VALUES (20);
INSERT INTO artikel (`id_artikel`,`judul`,`judul_seo`,`isi`,`gambar`,`hari`,`tanggal`,`jam`,`id_user`,`kategori`,`tag`,`hits`) VALUES (32);
INSERT INTO artikel (`id_artikel`,`judul`,`judul_seo`,`isi`,`gambar`,`hari`,`tanggal`,`jam`,`id_user`,`kategori`,`tag`,`hits`) VALUES (136);
INSERT INTO artikel (`id_artikel`,`judul`,`judul_seo`,`isi`,`gambar`,`hari`,`tanggal`,`jam`,`id_user`,`kategori`,`tag`,`hits`) VALUES (1);
INSERT INTO artikel (`id_artikel`,`judul`,`judul_seo`,`isi`,`gambar`,`hari`,`tanggal`,`jam`,`id_user`,`kategori`,`tag`,`hits`) VALUES (88);
INSERT INTO artikel (`id_artikel`,`judul`,`judul_seo`,`isi`,`gambar`,`hari`,`tanggal`,`jam`,`id_user`,`kategori`,`tag`,`hits`) VALUES (0);



DROP TABLE IF EXISTS halaman;

;

INSERT INTO halaman (`id_halaman`,`judul`,`judul_seo`,`isi`,`id_modul`,`gambar`,`hari`,`tanggal`,`jam`,`id_user`,`hits`) VALUES (0);
INSERT INTO halaman (`id_halaman`,`judul`,`judul_seo`,`isi`,`id_modul`,`gambar`,`hari`,`tanggal`,`jam`,`id_user`,`hits`) VALUES (0);
INSERT INTO halaman (`id_halaman`,`judul`,`judul_seo`,`isi`,`id_modul`,`gambar`,`hari`,`tanggal`,`jam`,`id_user`,`hits`) VALUES (0);



DROP TABLE IF EXISTS kategori;

;

INSERT INTO kategori (`id_kategori`,`kategori`,`kategori_seo`) VALUES (movie);
INSERT INTO kategori (`id_kategori`,`kategori`,`kategori_seo`) VALUES (entertainment);
INSERT INTO kategori (`id_kategori`,`kategori`,`kategori_seo`) VALUES (how-to);
INSERT INTO kategori (`id_kategori`,`kategori`,`kategori_seo`) VALUES (health);
INSERT INTO kategori (`id_kategori`,`kategori`,`kategori_seo`) VALUES (science);
INSERT INTO kategori (`id_kategori`,`kategori`,`kategori_seo`) VALUES (technology);
INSERT INTO kategori (`id_kategori`,`kategori`,`kategori_seo`) VALUES (relationship);
INSERT INTO kategori (`id_kategori`,`kategori`,`kategori_seo`) VALUES (business);



DROP TABLE IF EXISTS komentar;

;

INSERT INTO komentar (`id_komentar`,`nama`,`email`,`komentar`,`tanggal`,`id_artikel`) VALUES (12);
INSERT INTO komentar (`id_komentar`,`nama`,`email`,`komentar`,`tanggal`,`id_artikel`) VALUES (5);
INSERT INTO komentar (`id_komentar`,`nama`,`email`,`komentar`,`tanggal`,`id_artikel`) VALUES (5);
INSERT INTO komentar (`id_komentar`,`nama`,`email`,`komentar`,`tanggal`,`id_artikel`) VALUES (6);
INSERT INTO komentar (`id_komentar`,`nama`,`email`,`komentar`,`tanggal`,`id_artikel`) VALUES (6);
INSERT INTO komentar (`id_komentar`,`nama`,`email`,`komentar`,`tanggal`,`id_artikel`) VALUES (7);
INSERT INTO komentar (`id_komentar`,`nama`,`email`,`komentar`,`tanggal`,`id_artikel`) VALUES (7);
INSERT INTO komentar (`id_komentar`,`nama`,`email`,`komentar`,`tanggal`,`id_artikel`) VALUES (11);



DROP TABLE IF EXISTS layout;

;

INSERT INTO layout (`id_layout`,`judul`,`tipe`,`layout`,`kategori_1`,`kategori_2`,`halaman`,`batas`,`urut`,`aktif`) VALUES (Y);
INSERT INTO layout (`id_layout`,`judul`,`tipe`,`layout`,`kategori_1`,`kategori_2`,`halaman`,`batas`,`urut`,`aktif`) VALUES (Y);



DROP TABLE IF EXISTS md_social;

;

INSERT INTO md_social (`id_social`,`judul`,`website`,`link`) VALUES ();
INSERT INTO md_social (`id_social`,`judul`,`website`,`link`) VALUES ();
INSERT INTO md_social (`id_social`,`judul`,`website`,`link`) VALUES ();
INSERT INTO md_social (`id_social`,`judul`,`website`,`link`) VALUES ();
INSERT INTO md_social (`id_social`,`judul`,`website`,`link`) VALUES ();
INSERT INTO md_social (`id_social`,`judul`,`website`,`link`) VALUES ();



DROP TABLE IF EXISTS menu;

;

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

;

INSERT INTO modul (`id_modul`,`judul`,`folder`,`menu`,`konten`,`sidebar`,`aktif`) VALUES (Y);
INSERT INTO modul (`id_modul`,`judul`,`folder`,`menu`,`konten`,`sidebar`,`aktif`) VALUES (Y);
INSERT INTO modul (`id_modul`,`judul`,`folder`,`menu`,`konten`,`sidebar`,`aktif`) VALUES (N);



DROP TABLE IF EXISTS setting;

;

INSERT INTO setting (`id_setting`,`parameter`,`nilai`) VALUES (maxNews);
INSERT INTO setting (`id_setting`,`parameter`,`nilai`) VALUES (Website berita terlengkap);
INSERT INTO setting (`id_setting`,`parameter`,`nilai`) VALUES (http://localhost/pixart);
INSERT INTO setting (`id_setting`,`parameter`,`nilai`) VALUES (oke/002.jpg);
INSERT INTO setting (`id_setting`,`parameter`,`nilai`) VALUES (business, movie, music, health);
INSERT INTO setting (`id_setting`,`parameter`,`nilai`) VALUES (/pixart);



DROP TABLE IF EXISTS sidebar;

;

INSERT INTO sidebar (`id_sidebar`,`judul`,`tipe`,`konten`,`posisi`,`urut`,`aktif`) VALUES (Y);
INSERT INTO sidebar (`id_sidebar`,`judul`,`tipe`,`konten`,`posisi`,`urut`,`aktif`) VALUES (Y);
INSERT INTO sidebar (`id_sidebar`,`judul`,`tipe`,`konten`,`posisi`,`urut`,`aktif`) VALUES (Y);
INSERT INTO sidebar (`id_sidebar`,`judul`,`tipe`,`konten`,`posisi`,`urut`,`aktif`) VALUES (Y);
INSERT INTO sidebar (`id_sidebar`,`judul`,`tipe`,`konten`,`posisi`,`urut`,`aktif`) VALUES (Y);
INSERT INTO sidebar (`id_sidebar`,`judul`,`tipe`,`konten`,`posisi`,`urut`,`aktif`) VALUES (Y);
INSERT INTO sidebar (`id_sidebar`,`judul`,`tipe`,`konten`,`posisi`,`urut`,`aktif`) VALUES (Y);



DROP TABLE IF EXISTS tag;

;

INSERT INTO tag (`id_tag`,`tag`,`tag_seo`) VALUES (movie);
INSERT INTO tag (`id_tag`,`tag`,`tag_seo`) VALUES (entertainment);
INSERT INTO tag (`id_tag`,`tag`,`tag_seo`) VALUES (how-to);
INSERT INTO tag (`id_tag`,`tag`,`tag_seo`) VALUES (health);
INSERT INTO tag (`id_tag`,`tag`,`tag_seo`) VALUES (science);
INSERT INTO tag (`id_tag`,`tag`,`tag_seo`) VALUES (technology);
INSERT INTO tag (`id_tag`,`tag`,`tag_seo`) VALUES (relationship);
INSERT INTO tag (`id_tag`,`tag`,`tag_seo`) VALUES (business);



DROP TABLE IF EXISTS template;

;

INSERT INTO template (`id_template`,`judul`,`folder`,`aktif`) VALUES (N);
INSERT INTO template (`id_template`,`judul`,`folder`,`aktif`) VALUES (Y);



DROP TABLE IF EXISTS user;

;

INSERT INTO user (`id_user`,`nama_lengkap`,`email`,`username`,`password`,`level`) VALUES (admin);
INSERT INTO user (`id_user`,`nama_lengkap`,`email`,`username`,`password`,`level`) VALUES (author);



