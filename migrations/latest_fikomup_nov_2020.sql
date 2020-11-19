-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: db_fikomup
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `access_token`
--

DROP TABLE IF EXISTS `access_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(500) DEFAULT NULL,
  `expired` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_token`
--

LOCK TABLES `access_token` WRITE;
/*!40000 ALTER TABLE `access_token` DISABLE KEYS */;
INSERT INTO `access_token` VALUES (1,'IGQVJWUU5pMFJkdWJSZA1pwM01yNUZAkVzFOdDY3eUZAuVjVYS0lYdlotRUdzY2NRbGUycEZAvSlFBUC1MWl9yanZAtdF85bTJpYUJjRjk0V0xnSlNPb1RyNjJybjg4ZAVBoRmdBV3F4ektn','2020-05-26'),(2,'IGQVJXOFlzYmdGM3BIM2ZAPYUVGUVNLOVNSUHJJdDd5d2xpS1VCUjFLTi1fS0hPSW9Ea0tydGpIcTB0QzdQVUtzTkxfU0FZARUFpdlFCTXJVRVdWM1l4dDBZAR3FHcVR2YVRBX1NoTHJ3','2020-07-28'),(3,'IGQVJWbFhISm9ySUNBeEJRcU1hX0RmdkVEYlpId1hZAdXBOX3RwVW5GcDNUM0M5Y3kyWFhrSWNzX1J5bTNsZA3k5NEk1UUN4WVI4QTkxQU5HR1FLemVGR3JWanI0QklIekw1a3h0RUFn','2020-09-25'),(4,'IGQVJXOGFwQ1JIaG13RGtNYXBMa2NtWUdUR3lKNGpRdjdMMGFNZAWx3dThNc29VY1ZA4dFZA2b3ljcV9oNUZAWNzBpRllaSDJtY3ZAocTVVbG1YMHdRdDR0ajlUR29oS1ZAud1FjMzVQcXRB','2020-10-17'),(5,'IGQVJXMmU3MW1vVWRkaFYzQ2NpcHZAPNDY0SGc4QlJNZA1pMbHlxUC1vLVQwb0Iyamd2cFZAUeGFibUo1MVloNjV2YmUzS1BfTEtxQkF6TkppVThCNDdsZAUVXX04yWng5SlJsZAGJBMEZAn','2020-12-07'),(6,'','2020-10-08');
/*!40000 ALTER TABLE `access_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `achievement`
--

DROP TABLE IF EXISTS `achievement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `achievement` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_terjemahan` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `isi_terjemahan` text COLLATE latin1_general_ci NOT NULL,
  `lokasi` text COLLATE latin1_general_ci NOT NULL,
  `gambar` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `id_user` int(5) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achievement`
--

LOCK TABLES `achievement` WRITE;
/*!40000 ALTER TABLE `achievement` DISABLE KEYS */;
/*!40000 ALTER TABLE `achievement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_terjemahan` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `isi_terjemahan` text COLLATE latin1_general_ci NOT NULL,
  `lokasi` text COLLATE latin1_general_ci NOT NULL,
  `gambar` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `id_user` int(5) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity`
--

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumni`
--

DROP TABLE IF EXISTS `alumni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `tahun_kelulusan` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumni`
--

LOCK TABLES `alumni` WRITE;
/*!40000 ALTER TABLE `alumni` DISABLE KEYS */;
INSERT INTO `alumni` VALUES (2,'123456','Alumni','Komunikasi','2020-01-01','','',0,'2020-06-23 20:18:11',NULL);
/*!40000 ALTER TABLE `alumni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcement` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tipe` int(11) NOT NULL,
  `judul` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_terjemahan` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `isi_terjemahan` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `id_user` int(5) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcement`
--

LOCK TABLES `announcement` WRITE;
/*!40000 ALTER TABLE `announcement` DISABLE KEYS */;
INSERT INTO `announcement` VALUES (5,0,'Pengumuman Konseling','Pengumuman Konseling','pengumuman-konseling','','<p>Konseling mahasiswa FikomUP 2020 akan diadakan segera, untuk tanggal dan waktu bisa dilihat di dalam menu \"Jadwal\"</p>','','Senin','2020-07-06','11:39:53',1,'2020-07-06 11:39:47','2020-07-06 11:39:53'),(6,2,'Unit SJM','Unit SJM','unit-sjm','<p>Deskripsi Unit SJM</p>','<p>Deskripsi Unit SJM</p>','','Kamis','2020-07-09','20:03:06',1,'2020-07-09 20:03:06',NULL),(7,3,'Informasi 1','Informasi 1','informasi-1','<strong>PENDAFTARAN HARI KERJA</strong>\r\n<ol>\r\n<li>Senin s/d Jumat Pukul 08.00 - 16.00 WIB</li>\r\n</ol>\r\n<br /><strong>FASILITAS</strong>\r\n<ol>\r\n<li>Student Center dan Pusat Kegiatan Mahasiswa.</li>\r\n<li>Laboratorium Bahasa, Ruang Multimedia, dan Perpustakaan Lengkap.</li>\r\n<li>Tempat Ibadah.</li>\r\n<li>4 Level Bahasa Inggris LIA-UP.</li>\r\n<li>ATM Center.</li>\r\n<li>Bank BNI dan Bank Mandiri.</li>\r\n<li>Internet dan Hotspot Wifi.</li>\r\n<li>Sistem Informasi Akademik (online system).</li>\r\n<li>Poliklinik dan Apotek.</li>\r\n</ol>\r\n<br /><strong>PROGRAM BEASISWA</strong>\r\n<ol>\r\n<li>Peningkatan Prestasi Akademik (PPA).</li>\r\n<li>Bantuan Biaya Pendidikan Peningkatan Prestasi Akademik.</li>\r\n<li>Bantuan Biaya Pendidikan Bidikmisi.</li>\r\n<li>House of Indonesia (Beijing).</li>\r\n<li>Prestasi di Bidang IPTEK, Seni, Budaya, dan Olahraga.</li>\r\n</ol>','<strong>PENDAFTARAN HARI KERJA</strong>\r\n<ol>\r\n<li>Senin s/d Jumat Pukul 08.00 - 16.00 WIB</li>\r\n</ol>\r\n<br /><strong>FASILITAS</strong>\r\n<ol>\r\n<li>Student Center dan Pusat Kegiatan Mahasiswa.</li>\r\n<li>Laboratorium Bahasa, Ruang Multimedia, dan Perpustakaan Lengkap.</li>\r\n<li>Tempat Ibadah.</li>\r\n<li>4 Level Bahasa Inggris LIA-UP.</li>\r\n<li>ATM Center.</li>\r\n<li>Bank BNI dan Bank Mandiri.</li>\r\n<li>Internet dan Hotspot Wifi.</li>\r\n<li>Sistem Informasi Akademik (online system).</li>\r\n<li>Poliklinik dan Apotek.</li>\r\n</ol>\r\n<br /><strong>PROGRAM BEASISWA</strong>\r\n<ol>\r\n<li>Peningkatan Prestasi Akademik (PPA).</li>\r\n<li>Bantuan Biaya Pendidikan Peningkatan Prestasi Akademik.</li>\r\n<li>Bantuan Biaya Pendidikan Bidikmisi.</li>\r\n<li>House of Indonesia (Beijing).</li>\r\n<li>Prestasi di Bidang IPTEK, Seni, Budaya, dan Olahraga.</li>\r\n</ol>','','Kamis','2020-10-01','18:39:19',1,'2020-10-01 18:39:19',NULL),(8,4,'PMB Online','PMB Online','pmb-online','<a href=\"http://pmbonline.univpancasila.ac.id/\" target=\"_blank\" rel=\"noopener\">Klik Disini untuk pergi ke PMB Online</a>','<a href=\"http://pmbonline.univpancasila.ac.id/\" target=\"_blank\" rel=\"noopener\">Klik Disini untuk pergi ke PMB Online</a>','alur.jpg','Kamis','2020-10-01','18:39:45',1,'2020-10-01 18:39:45',NULL);
/*!40000 ALTER TABLE `announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artikel`
--

DROP TABLE IF EXISTS `artikel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artikel` (
  `id_artikel` int(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_terjemahan` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `isi_terjemahan` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `id_user` int(5) NOT NULL,
  `kategori` int(5) DEFAULT NULL,
  `hits` int(10) DEFAULT NULL,
  `headline` int(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_artikel`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artikel`
--

LOCK TABLES `artikel` WRITE;
/*!40000 ALTER TABLE `artikel` DISABLE KEYS */;
INSERT INTO `artikel` VALUES (7,'Korean Language Courses','Kursus Bahasa Korea','korean-language-courses','<p>Korean Language Courses</p>','<p>Kursus Bahasa Korea</p>','a3cd1b6d-e6f5-4108-a51f-d432e5f31ffd.jpg','Sabtu','2020-07-25','17:03:20',1,5,21,2,'2020-07-09 00:00:00','2020-07-25 17:03:20'),(8,'','Orbicom 2018','','','<p>Orbicom 2018</p>','0dc86984-5708-45e0-acb2-2271c10a5231.jpg','Sabtu','2020-07-25','17:03:00',1,5,40,2,'2020-07-23 00:00:00','2020-07-25 17:03:00'),(15,' Public Lecture About Youth Political Communication ','Kuliah Umum tentang Komunikasi Politik Anak Muda','-public-lecture-about-youth-political-communication-','<p>Raya Lenteng Agung Street, RT 5/RW 5, Lenteng Agung, Kec Jagakarsa, South Jakarta City ,&nbsp; Jakarta Capital 12630</p>','<p>Jln Raya Lenteng Agung, RT 5/RW 5, Lenteng Agung, Kec Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630</p>','Kuliah Umum tentang Komunikasi Politik Anak Muda-min.jpg','Sabtu','2020-07-25','17:03:12',1,5,0,2,'2020-07-09 00:00:00','2020-07-25 17:03:12'),(16,'E - Learning Training','Pelatihan E - Learning','e--learning-training','<p>Training for lecturers about e learning that will be&nbsp; implemented on Faculty of Communications Pancasila University</p>','<p>Pelatihan terhadap dosen dosen tentang penggunan E - Learning yang akan di implementasikan pada Fakultas Ilmu Komunikasi Universitas Pancasila</p>','Training_E-_Learning1.png','Sabtu','2020-07-25','17:03:17',1,5,0,1,'2020-07-09 00:00:00','2020-07-25 17:03:17');
/*!40000 ALTER TABLE `artikel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `semester` int(3) NOT NULL,
  `list` text COLLATE latin1_general_ci NOT NULL,
  `list_minor` text COLLATE latin1_general_ci NOT NULL,
  `list_peminatan` text COLLATE latin1_general_ci NOT NULL,
  `list_pilihan` text COLLATE latin1_general_ci NOT NULL,
  `id_user` int(5) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,1,'[{\"id\":\"71135008\",\"name\":\"Pendidikan Agama (Islam/Kristen/Hindu/Budha)\",\"sks\":\"3\"},{\"id\":\"07122504\",\"name\":\"Bahasa Inggris untuk Komunikasi I\",\"sks\":\"3\"},{\"id\":\"07153502\",\"name\":\"Kewarganegaraan\",\"sks\":\"3\"},{\"id\":\"07163503\",\"name\":\"Filsafat Pancasila\",\"sks\":\"3\"},{\"id\":\"07213512\",\"name\":\"Pengantar Ilmu Komunikasi\",\"sks\":\"3\"},{\"id\":\"72145068\",\"name\":\"Pengantar Ilmu Sosial\",\"sks\":\"3\"},{\"id\":\"72135069\",\"name\":\"Pengantar Teknologi Informasi dan Komunikasi (TIK)\",\"sks\":\"3\"},{\"id\":\"07433630\",\"name\":\"Desain Grafis\",\"sks\":\"3\"},{\"id\":\"07333522\",\"name\":\"Psikologi Komunikasi\",\"sks\":\"3\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]','{\"0\":{\"id\":\"\",\"name\":\"\",\"sks\":\"\"},\"2\":{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}}',1,'2020-07-06 21:40:29','2020-10-11 15:52:15'),(2,2,'[{\"id\":\"73235067\",\"name\":\"Bahasa Inggris untuk Komunikasi II\",\"sks\":\"3\"},{\"id\":\"74325070\",\"name\":\"Keterampilan Berpikir\",\"sks\":\"3\"},{\"id\":\"07323521\",\"name\":\"Etika dan Filsafat Komunikasi\",\"sks\":\"3\"},{\"id\":\"07223514\",\"name\":\"Teori Komunikasi\",\"sks\":\"3\"},{\"id\":\"07333523\",\"name\":\"Sosiologi Komunikasi\",\"sks\":\"3\"},{\"id\":\"07323520\",\"name\":\"Produksi Pesan\",\"sks\":\"3\"},{\"id\":\"07473643\",\"name\":\"Public Speaking\",\"sks\":\"3\"},{\"id\":\"07223515\",\"name\":\"Manajemen Pemasaran dalam Komunikasi\",\"sks\":\"3\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]',1,'2020-07-07 19:50:47','2020-09-19 10:45:25'),(3,3,'[{\"id\":\"07433857\",\"name\":\"Teori Komunikasi Massa\",\"sks\":\"3\"},{\"id\":\"07443631\",\"name\":\"Komunikasi Visual\",\"sks\":\"3\"},{\"id\":\"07223513\",\"name\":\"Komunikasi Global\",\"sks\":\"3\"},{\"id\":\"peminatan\",\"name\":\"Peminatan\",\"sks\":\"9\"},{\"id\":\"minor\",\"name\":\"Minor**\",\"sks\":\"3-6\"}]','[{\"id\":\"07213511\",\"name\":\"Pengantar Ilmu Ekonomi (FE)\",\"sks\":\"3\"},{\"id\":\"07663076\",\"name\":\"Pengantar Bisnis (FE)\",\"sks\":\"3\"},{\"id\":\"07653574\",\"name\":\"Psikologi Umum 1 (F.Psi)\",\"sks\":\"3\"},{\"id\":\"07653571\",\"name\":\"Produksi Animasi (FT)\",\"sks\":\"3\"},{\"id\":\"07652572\",\"name\":\"Pengantar Farmasi (F.Farmasi)\",\"sks\":\"2\"},{\"id\":\"07672581\",\"name\":\"Kode Etik Pemasaran Obat (F.Farmasi)\",\"sks\":\"2\"},{\"id\":\"07452098\",\"name\":\"Pariwisata Indonesia (F.Par)\",\"sks\":\"2\"}]','[{\"id\":\"07433629\",\"name\":\"Media, Budaya, dan Masyarakat (MS) \",\"sks\":\"3\"},{\"id\":\"07473644\",\"name\":\"Pemasaran Sosial (SC)\",\"sks\":\"3\"},{\"id\":\"76476174\",\"name\":\"Teknik Lobi dan Negosiasi (SC)\",\"sks\":\"3\"},{\"id\":\"07433746\",\"name\":\"Jurnalistik Multimedia (MJ)\",\"sks\":\"3\"},{\"id\":\"07473755\",\"name\":\"Jurnalistik Media Siar (MJ)\",\"sks\":\"3\"},{\"id\":\"72332025\",\"name\":\"Digital Sinematografi) karya berita (MJ)\",\"sks\":\"3\"},{\"id\":\"07333895\",\"name\":\"Studi Media & Komunikasi (MS)\",\"sks\":\"3\"},{\"id\":\"72333026\",\"name\":\"Digital Sinematografi*) karya Non berita (MS)\",\"sks\":\"3\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]',1,'2020-07-07 19:50:47','2020-09-19 10:45:28'),(4,4,'[{\"id\":\"07243517\",\"name\":\"Metodologi Penelitian Komunikasi I (Kuantitatif)\",\"sks\":\"3\"},{\"id\":\"07333524\",\"name\":\"Komunikasi Politilk\",\"sks\":\"3\"},{\"id\":\"07263019\",\"name\":\"Komunikasi untuk Perubahan Sosial\",\"sks\":\"3\"},{\"id\":\"07363527\",\"name\":\"Komunikasi Lintas Budaya\",\"sks\":\"3\"},{\"id\":\"peminatan\",\"name\":\"Peminatan *\",\"sks\":\"6\"},{\"id\":\"minor\",\"name\":\"Minor **\",\"sks\":\"4-6\"}]','[{\"id\":\"07642570\",\"name\":\"Pengantar Ekonomi Makro (FE)\",\"sks\":\"2\"},{\"id\":\"07663577\",\"name\":\"Psikologi Umum 2 (F.Psi)\",\"sks\":\"3\"},{\"id\":\"07672585\",\"name\":\"Psikologi Perilaku Seksual (F.Psi)\",\"sks\":\"2\"},{\"id\":\"07644569\",\"name\":\"Pengantar Hukum Indonesia (FH)\",\"sks\":\"4\"},{\"id\":\"07664583\",\"name\":\"Hukum Pidana (FH)\",\"sks\":\"4\"},{\"id\":\"07673579\",\"name\":\"Multimedia Berbasis Web (FT)\",\"sks\":\"3\"},{\"id\":\"07672584\",\"name\":\"Interaksi Manusia dan Komputer (FT)\",\"sks\":\"2\"},{\"id\":\"07652573\",\"name\":\"Ilmu Komunikasi Farmasi (F.Farmasi)\",\"sks\":\"2\"},{\"id\":\"07672580\",\"name\":\"UU dan Etika Kesehatan (F.Farmasi)\",\"sks\":\"2\"},{\"id\":\"74635100\",\"name\":\"Manajemen Perhotelan (F.Par)\",\"sks\":\"3\"},{\"id\":\"74635101\",\"name\":\"Mice and Event (F.Par)\",\"sks\":\"3\"}]','[{\"id\":\"07453633\",\"name\":\"Perencanaan Kreatif Periklanan (SC)\",\"sks\":\"3\"},{\"id\":\"07463638\",\"name\":\"Manajemen Periklanan (SC)\",\"sks\":\"3\"},{\"id\":\"73437075\",\"name\":\"Produksi Radio dan TV (MS)\",\"sks\":\"3\"},{\"id\":\"07463751\",\"name\":\"Jurnalistik Media Cetak (MJ)\",\"sks\":\"3\"},{\"id\":\"07473865\",\"name\":\"Media, Gender, dan Identitas\",\"sks\":\"3\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]',1,'2020-07-07 20:20:30','2020-09-19 10:45:30'),(5,5,'[{\"id\":\"07323521\",\"name\":\"Etika dan Filsafat Komunikasi\",\"sks\":\"3\"},{\"id\":\"72636073\",\"name\":\"Stakeholder Relations Management\",\"sks\":\"3\"},{\"id\":\"07163903\",\"name\":\"Kepancasilaan\",\"sks\":\"2\"},{\"id\":\"73236067\",\"name\":\"English for Academic Purposes\",\"sks\":\"2\"}]','[{\"id\":\"07213511\",\"name\":\"Pengantar Ilmu Ekonomi (FEB)\",\"sks\":\"3\"},{\"id\":\"07663576\",\"name\":\"Pengantar Bisnis (FEB)\",\"sks\":\"3\"},{\"id\":\"07653574\",\"name\":\"Psikologi Umum 1 (F.Psi)\",\"sks\":\"3\"},{\"id\":\"07653571\",\"name\":\"Produksi Animasi (FT)\",\"sks\":\"2\"},{\"id\":\"07652572\",\"name\":\"Pengantar Farmasi (F. Farmasi)\",\"sks\":\"2\"},{\"id\":\"7672681\",\"name\":\"Pengantar dan Distribusi (F. Farmasi)\",\"sks\":\"2\"},{\"id\":\"74636101\",\"name\":\"Pengantar Leisure, Rekreasi, & Pariwisata (F. Par)\",\"sks\":\"3\"},{\"id\":\"07452698\",\"name\":\"Perilaku Wisatawan (F.Par)\",\"sks\":\"2\"},{\"id\":\"07062275\",\"name\":\"Hukum Siber/ Cyber Law (FH)\",\"sks\":\"2\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]','[{\"id\":\"07473243\",\"name\":\"Teknik Presentasi\",\"sks\":\"2\"},{\"id\":\"07473244\",\"name\":\"Jajak Pendapat (Opinion Polling)\",\"sks\":\"2\"},{\"id\":\"07473245\",\"name\":\"Wawancara dan Reportase\",\"sks\":\"2\"},{\"id\":\"07442347\",\"name\":\"Fotografi\",\"sks\":\"2\"},{\"id\":\"07640932\",\"name\":\"Produksi Film\",\"sks\":\"2\"},{\"id\":\"07442731\",\"name\":\"Komunikasi Visual\",\"sks\":\"2\"},{\"id\":\"76472270\",\"name\":\"Manajemen Event\",\"sks\":\"2\"},{\"id\":\"76477174\",\"name\":\"Teknik Negosiasi\",\"sks\":\"2\"},{\"id\":\"07473247\",\"name\":\"Data Mining\",\"sks\":\"2\"},{\"id\":\"07453136\",\"name\":\"Copywriting\",\"sks\":\"2\"},{\"id\":\"07472857\",\"name\":\"Jurnalistik Data\",\"sks\":\"2\"},{\"id\":\"07472744\",\"name\":\"Public Relations Writing\",\"sks\":\"2\"},{\"id\":\"73236068\",\"name\":\"English for Academic Writing\",\"sks\":\"2\"},{\"id\":\"07674094\",\"name\":\"Produksi Konten Digital\",\"sks\":\"2\"}]',1,'2020-09-22 08:57:47','2020-09-22 09:14:29'),(6,6,'[{\"id\":\"7663082\",\"name\":\"Kewirausahaan\",\"sks\":\"2\"},{\"id\":\"7443632\",\"name\":\"Ekonomi Politik Media\",\"sks\":\"3\"},{\"id\":\"7473866\",\"name\":\"Media, Budaya, dan Masyarakat\",\"sks\":\"3\"}]','[{\"id\":\"7642570\",\"name\":\"Pengantar Ekonomi Makro (FE)\",\"sks\":\"2\"},{\"id\":\"7663577\",\"name\":\"Psikologi Umum 2 (F.Psi)\",\"sks\":\"3\"},{\"id\":\"7663583\",\"name\":\"Hukum  Pidana (FH)\",\"sks\":\"3\"},{\"id\":\"7673579\",\"name\":\"Multimedia Berbasis Web (FT)\",\"sks\":\"3\"},{\"id\":\"7672580\",\"name\":\"UU dan Etika Kesehatan  (F. Farmasi)\",\"sks\":\"2\"}]','[{\"id\":\"7463739\",\"name\":\"Manajemen Media (MS)\",\"sks\":\"3\"},{\"id\":\"7333995\",\"name\":\"Literasi Media (MS)\",\"sks\":\"3\"},{\"id\":\"72639102\",\"name\":\"Media dan Teks (MS)\",\"sks\":\"3\"},{\"id\":\"72537060\",\"name\":\"Manajemen Komunikasi (SC)\",\"sks\":\"3\"},{\"id\":\"7463640\",\"name\":\"Manajemen Merek (SC)\",\"sks\":\"3\"},{\"id\":\"7433629\",\"name\":\"Komunikasi Strategis (SC)\",\"sks\":\"3\"},{\"id\":\"7453859\",\"name\":\"Kajian Dampak Media (MJ)\",\"sks\":\"3\"},{\"id\":\"7454748\",\"name\":\"Penulisan Berita (MJ)\",\"sks\":\"3\"},{\"id\":\"7433746\",\"name\":\"Jurnalistik Multimedia (MJ)\",\"sks\":\"3\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]',1,'2020-10-07 20:02:13',NULL),(7,7,'[{\"id\":\"07483545\",\"name\":\"Kapita Selekta\",\"sks\":\"3\"},{\"id\":\"7573668\",\"name\":\"Magang dan Seminar\",\"sks\":\"3\"},{\"id\":\"7573868\",\"name\":\"Kuliah Kerja Nyata\",\"sks\":\"2\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]','[{\"id\":\"07473865\",\"name\":\"Media, Gender, dan Identitas (MS)\",\"sks\":\"3\"},{\"id\":\"7463862\",\"name\":\"Proyek Kajian Media (MS)\",\"sks\":\"3\"},{\"id\":\"07473642\",\"name\":\"Komunikasi Pemasaran Terpadu (SC)\",\"sks\":\"3\"},{\"id\":\"73736074\",\"name\":\"Proyek Komunikasi Strategis (SC)\",\"sks\":\"3\"},{\"id\":\"07463739\",\"name\":\"Manajemen Media (MJ)\",\"sks\":\"3\"},{\"id\":\"7463752\",\"name\":\"Proyek Jurnalistik Multimedia (MJ)\",\"sks\":\"3\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]',1,'2020-10-07 20:08:11',NULL),(8,8,'[{\"id\":\"7386028\",\"name\":\"Skripsi\",\"sks\":\"6\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]',1,'2020-10-07 20:08:40',NULL);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id_event` int(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_terjemahan` text COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `isi_terjemahan` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `map` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `lokasi` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `id_user` int(5) NOT NULL,
  `kategori` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,'','','Studi Kunjungan ke Media','','<p>Studi Kunjungan ke Media Kompas&nbsp;</p>','Studi_Kunjungan_ke_Media.jpg','106.795775, -6.211117','2019-05-20 17:00:00','Kompas',1,11,'2020-01-10 11:51:25','2020-07-25 17:02:51'),(2,'','','Latihan Keterampilan Manajemen Mahasiswa','','<p>Membangun&nbsp; Karakter Pemimpin Berkualitas dan Peka Terhadap Lingkungan Sosial</p>','IMG-3355.jpg','106.8331332711648, -6.339445000002712','2019-04-26 07:00:00','FIKom UP',1,8,'2020-01-15 22:15:06','2020-07-25 17:02:43');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility`
--

DROP TABLE IF EXISTS `facility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facility` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nama_terjemahan` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `isi_terjemahan` text COLLATE latin1_general_ci NOT NULL,
  `lokasi` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `id_user` int(5) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility`
--

LOCK TABLES `facility` WRITE;
/*!40000 ALTER TABLE `facility` DISABLE KEYS */;
/*!40000 ALTER TABLE `facility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `halaman`
--

DROP TABLE IF EXISTS `halaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `halaman`
--

LOCK TABLES `halaman` WRITE;
/*!40000 ALTER TABLE `halaman` DISABLE KEYS */;
INSERT INTO `halaman` VALUES (2,'About Us','about-us','<p>This is about us</p>',0,'2.jpg','Minggu','2016-06-12','08:09:16',1,0),(3,'Advertise','advertise','',0,'','Jumat','2016-01-22','14:32:18',1,0),(4,'FAQ','faq','',0,'','Jumat','2016-01-22','14:32:29',1,0),(9,'Galeri Foto','galeri-foto','',20,'','Jumat','2016-06-03','07:59:21',1,0),(10,'','','',0,'','Jumat','2016-06-03','07:59:21',1,0);
/*!40000 ALTER TABLE `halaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tipe` int(11) NOT NULL,
  `judul` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_terjemahan` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `isi_terjemahan` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `id_user` int(5) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (1,0,'Fakultas Ilmu Komunikasi Universitas Pancasila, atau yang dikenal dengan nama FIKom UP','Fakultas Ilmu Komunikasi Universitas Pancasila, atau yang dikenal dengan nama FIKom UP','fakultas-ilmu-komunikasi-universitas-pancasila-atau-yang-dikenal-dengan-nama-fikom-up','<ul>\r\n<li>Berdiri pada Tahun Akademik 2007/2008 (Tgl. 20 April 2007)</li>\r\n<li>Berdasarkan Ijin Penyelenggaraan yang dikeluarkan oleh Departemen Pendidikan Nasional, Direktorat Jendral Pendidikan Tinggi, Direktorat Pembinaan Akademik dan Kemahasiswaan, dengan Surat Keputusan Nomor 936/D/T/2007, tanggal 20 April 2007</li>\r\n<li>Perpanjangan Ulang Ijin Penyelenggaraan Nomor 3010/D/T/K-III/2009 tanggal 28 Juli 2009</li>\r\n<li>Terakreditasi A, berdasarkan Keputusan BAN-PT Nomor 2716/BAN-PT/Ak-XIV/S1/XI/2016 tanggal 24 November 2016&nbsp;tentang Status, Nilai, Peringkat dan Masa Berlaku Hasil Akreditasi Program Sarjana di Perguruan Tinggi</li>\r\n</ul>','<ul>\r\n<li>Berdiri pada Tahun Akademik 2007/2008 (Tgl. 20 April 2007)</li>\r\n<li>Berdasarkan Ijin Penyelenggaraan yang dikeluarkan oleh Departemen Pendidikan Nasional, Direktorat Jendral Pendidikan Tinggi, Direktorat Pembinaan Akademik dan Kemahasiswaan, dengan Surat Keputusan Nomor 936/D/T/2007, tanggal 20 April 2007</li>\r\n<li>Perpanjangan Ulang Ijin Penyelenggaraan Nomor 3010/D/T/K-III/2009 tanggal 28 Juli 2009</li>\r\n<li>Terakreditasi A, berdasarkan Keputusan BAN-PT Nomor 2716/BAN-PT/Ak-XIV/S1/XI/2016 tanggal 24 November 2016&nbsp;tentang Status, Nilai, Peringkat dan Masa Berlaku Hasil Akreditasi Program Sarjana di Perguruan Tinggi</li>\r\n</ul>','','Kamis','2020-10-01','18:09:07',1,'2020-10-01 18:09:07',NULL);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (5,'General','general'),(8,'University','university'),(9,'Communcation','communcation'),(10,'Webinar','webinar'),(11,'Partners','partners'),(12,'Technology','technology'),(13,'Entrepreneur','entrepreneur'),(14,'Business','business'),(17,'Penelitian','penelitian');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `komentar` (
  `id_komentar` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `komentar` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `id_artikel` int(10) NOT NULL,
  `dibaca` enum('N','Y') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `komentar`
--

LOCK TABLES `komentar` WRITE;
/*!40000 ALTER TABLE `komentar` DISABLE KEYS */;
/*!40000 ALTER TABLE `komentar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lab_tv`
--

DROP TABLE IF EXISTS `lab_tv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lab_tv` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_terjemahan` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `isi_terjemahan` text COLLATE latin1_general_ci NOT NULL,
  `video_type` int(1) NOT NULL,
  `youtube_link` varchar(750) COLLATE latin1_general_ci NOT NULL,
  `video` varchar(750) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `id_user` int(5) NOT NULL,
  `hits` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab_tv`
--

LOCK TABLES `lab_tv` WRITE;
/*!40000 ALTER TABLE `lab_tv` DISABLE KEYS */;
INSERT INTO `lab_tv` VALUES (4,'Test Video','Test Video','test-video','','<p>Ini Video untuk test</p>',0,'https://www.youtube.com/watch?v=9xwazD5SyVg','','',1,0,'2020-07-22 21:02:33','2020-11-16 21:29:25'),(5,'','TVUP','','<p>dadasasdads</p>','<p>djadahjdahjdsbja</p>',0,'www.youtube.com','','',1,0,'2020-09-28 15:04:29',NULL),(6,'','PKKKMB Fakultas Ilmu Komunikasi 2020 Hari 1','','','<h1 class=\"title style-scope ytd-video-primary-info-renderer\">PKKKMB Fakultas Ilmu Komunikasi 2020 Hari 1</h1>',0,'https://www.youtube.com/watch?v=S_BeOGK7LYA','','',1,0,'2020-10-07 20:42:10',NULL);
/*!40000 ALTER TABLE `lab_tv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecturer`
--

DROP TABLE IF EXISTS `lecturer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lecturer` (
  `id_lecturer` int(11) NOT NULL AUTO_INCREMENT,
  `npd` varchar(250) NOT NULL,
  `nidn` varchar(255) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `gelar` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `kepangkatan` varchar(255) NOT NULL,
  `bidang_kajian` varchar(255) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `peguruan_tinggi` varchar(255) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_lecturer`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecturer`
--

LOCK TABLES `lecturer` WRITE;
/*!40000 ALTER TABLE `lecturer` DISABLE KEYS */;
INSERT INTO `lecturer` VALUES (2,'7007211001','0323086905','ANNA AGUSTINA','M.Si., Ph.D.','Wanita','Lektor','','S3','Universiti Sains Malaysia','Dekan','annaagustina@univpancasila.ac.id','7007211001157915011716January2020.jpeg',1,NULL,'2020-02-23 16:14:33'),(3,'Halim','','AHMAD BADARI BURHAN','IR, MBA','PRIA','Asisten Ahli','Komunikasi Pembangunan','S2','Universitas Jayabaya','','ariburhan2007@gmail.com','1110230045150354938524August2017.jpeg',0,'2020-02-23 22:53:01','2020-06-08 05:54:58'),(4,'7007213006','0317097603','ALFITO DEANNOVA GINTINGS','M.Si','Pria','.','.','.','.','.','.','WhatsApp Image 2020-09-11 at 14-03-59.jpg',0,'2020-02-23 22:54:27','2020-10-07 20:09:50'),(5,'7014211001','0422016002','JUFRI ALKATIRI','DR. S.S, M.SI, MA','Pria','Lektor','','S3','Universitas Islam Jakarta','Kepala Laboratorium','alkatirijufri@yahoo.com','7014211001149811395522June2017.jpg',0,'2020-02-23 23:00:04',NULL),(6,'7008211004','0330037606','MARTRIANA PONIMIN SAID','M.Si','Wanita','Asisten Ahli','.','S2','Universitas Pancasila','Tidak Menjabat','martrianaps@yahoo.com','WhatsApp Image 2020-09-11 at 17-08-26.jpg',0,'2020-02-23 23:04:31','2020-10-07 20:16:11'),(7,'7017221001','0005046101','MASHADI SAID','Prof.Dr. M.Pd','Laki-laki','Guru Besar','Bahasa Inggris','S3','','Kepala Lembaga Bahasa Universitas Pancasila','mashadisaid77@gmail.com','',0,'2020-02-23 23:04:40','2020-06-08 05:52:38'),(8,'7014211003','0328048602','APRILYANTI PRATIWI','S.S, M.I.Kom.','Wanita','.','.','S2','Universitas Padjadjaran','Tidak Menjabat','aprilyanti.mikom@gmail.com','WhatsApp Image 2020-09-11 at 13-59-08.jpg',0,'2020-02-23 23:06:49','2020-10-07 20:10:51'),(9,'7015211001','0323096804','GEDE MOENANTO SOEKOWATI','S.I.Kom., M.I.Kom','Pria','Asisten Ahli','.','S2','.','Tidak Menjabat','moenanto@gmail.com','WhatsApp Image 2020-09-11 at 15-46-56.jpg',0,'2020-02-23 23:07:05','2020-10-07 20:15:52'),(10,'7008211002','0317077604','BENEDICTUS HELPRIS ESTASWARA','M.Si','Pria','Lektor','Strategic Communication','S2','Universitas Indonesia','Wakil Dekan','the.estaswara@yahoo.com','7008211002147728580524October2016.jpeg',0,'2020-02-23 23:07:32','2020-06-08 05:56:02'),(11,'7009211005','0307097902','CICI EKA ISWAHYUNINGTYAS','M.Soc.Sc.','Wanita','Asisten Ahli','Kajian Media','S2','Universiti Kebangsaan Malaysia','.','.','WhatsApp Image 2020-09-12 at 08-03-51.jpg',0,'2020-02-23 23:08:26','2020-10-07 20:13:09'),(12,'7013211002','0302028303','MUHAMMAD ROSIT','M.SI','Pria','.','.','S2','Universitas Indonesia','Wakil Dekan I','rositway@gmail.com','WhatsApp Image 2020-09-11 at 10-08-31.jpg',0,'2020-02-23 23:08:30','2020-10-07 20:16:35'),(13,'7012211002','0310028202','DIAH FEBRINA','M.Soc.Sc','Wanita','.','.','S2','Universiti Kebangsaan Malaysia','Tidak Menjabat','diah.febrina@gmail.com','WhatsApp Image 2020-09-11 at 14-33-21.jpg',0,'2020-02-23 23:09:16','2020-10-07 20:13:22'),(14,'7014211004','0317127904','NATHALIA PERDHANI SOEMANTRI','M.Si','Wanita','.','.','S2','.','.','.','WhatsApp Image 2020-09-12 at 12-48-40.jpg',0,'2020-02-23 23:09:33','2020-10-07 20:17:09'),(15,'7017211002','.','DONIE KADEWANDANA','S.Sos., M.IP','.','.','.','S2','.','.','.','WhatsApp Image 2020-09-14 at 02-35-34.jpg',0,'2020-02-23 23:09:35','2020-10-07 20:14:25'),(16,'7017211001','.','RETOR AW KALIGIS','Dr.','Pria','.','.','S3','.','.','.','WhatsApp Image 2020-09-11 at 14-00-23.jpg',0,'2020-02-23 23:10:05','2020-10-07 20:17:53'),(17,'7014211002','0302068601','FARIDHIAN ANSHARI','SS, MA','Pria','Asisten Ahli','.','S2','Universitas Gadjah Mada','Tidak Menjabat','faridhian@univpancasila.ac.id','Alfa1.jpg',0,'2020-02-23 23:10:08','2020-10-07 20:11:12'),(18,'7014211005','0325067907','RIRIT YUNIAR','Dr.','Wanita','.','.','S3','.','.','.','WhatsApp Image 2020-09-11 at 14-21-26.jpg',0,'2020-02-23 23:10:33','2020-10-07 20:18:33'),(19,'7008211003','0306107501','FITRIA ANGELIQA','M.Si','Wanita','Asisten Ahli','','S2','Universitas Indonesia','Wakil Dekan','ivy_angeliqa@yahoo.com','',0,'2020-02-23 23:11:00',NULL),(20,'7013211001','0307078702','GATI DWI YULIANA','M.SI','Wanita','','','S2','Universitas Indonesia','Tidak Menjabat','gati_dwiyuliana@yahoo.com','',0,'2020-02-23 23:11:34',NULL),(21,'7009230033','0330097407','RISMA KARTIKA','M.Si','Wanita','Lektor','','S2','Universitas Indonesia','Tidak Menjabat','rismakartika.up@gmail.com','7009230033149663877805June2017.jpeg',0,'2020-02-23 23:12:28',NULL),(22,'7015211004','0902128104','RIZA DARMA PUTRA','M.I.Kom','Pria','Asisten Ahli','.','S2','Universitas Hasanuddin','Tidak Menjabat','rizadarmaputra@gmail.com','Riza Darma Putra.png',0,'2020-02-23 23:13:55','2020-10-07 20:19:27'),(23,'7015211003','0313018801','SOFIA PRIMALISANTI DEVI','S.I.kom., M.Si','Wanita','.','.','S2','Universitas Indonesia','Tidak Menjabat','sofiaprimalisanti.devi@gmail.com','mba sofi.jpg',0,'2020-02-23 23:14:57','2020-10-07 20:19:45'),(24,'7010231001','.','TRIBUANA TUNGGA DEWI','M.Si','Wanita','.','.','S2','Universitas Indonesia','Tidak Menjabat','tribuana.suryokusumo@gmail.com','WhatsApp Image 2020-09-11 at 14-37-56.jpg',0,'2020-02-23 23:15:58','2020-10-07 20:22:34'),(25,'7012231001','0002048304','UMAR HALIM','M.Phil','Pria','Asisten Ahli','.','S2','Universiti Kebangsaan Malaysia','Wakil Dekan II','umarhalim@univpancasila.ac.id','WhatsApp Image 2020-09-11 at 12-45-13.jpg',0,'2020-02-23 23:17:10','2020-10-07 20:20:12');
/*!40000 ALTER TABLE `lecturer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `md_galeri_foto`
--

DROP TABLE IF EXISTS `md_galeri_foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `md_galeri_foto` (
  `id_galeri` int(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `md_galeri_foto`
--

LOCK TABLES `md_galeri_foto` WRITE;
/*!40000 ALTER TABLE `md_galeri_foto` DISABLE KEYS */;
INSERT INTO `md_galeri_foto` VALUES (1,'Kegiatan MOS','Xhoth009.jpg','2016-06-03'),(2,'Hewan Kurban','sapi.jpg','2016-06-03'),(3,'Lomba Robotik','_MG_5528.JPG','2016-06-03'),(4,'Lomba Web Design','IMG_4131.JPG','2016-06-03'),(5,'Foto Bersama Peserta Lomba','_MG_5579.JPG','2016-06-03'),(6,'Lomba Graphic Design','IMG_4146.JPG','2016-06-03');
/*!40000 ALTER TABLE `md_galeri_foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id_menu` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kategori_menu` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `jenis_link` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `induk` int(5) NOT NULL,
  `urut` int(5) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (6,'Contact','main','url','http://localhost/webdev-fikomup/contact',0,6),(5,'Partners','main','url','http://localhost/webdev-fikomup/partners',0,5),(1,'Home','main','url','http://localhost/webdev-fikomup',0,1),(4,'Event','main','url','http://localhost/webdev-fikomup/event',0,4),(3,'News','main','url','http://localhost/webdev-fikomup/news',0,3),(2,'About Us','main','url','http://localhost/webdev-fikomup/about_us',0,2);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modul`
--

DROP TABLE IF EXISTS `modul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modul` (
  `id_modul` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `menu` enum('N','Y') COLLATE latin1_general_ci NOT NULL,
  `konten` enum('N','Y') COLLATE latin1_general_ci NOT NULL,
  `widget` enum('N','Y') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modul`
--

LOCK TABLES `modul` WRITE;
/*!40000 ALTER TABLE `modul` DISABLE KEYS */;
INSERT INTO `modul` VALUES (20,'Galeri Foto','galeri_foto','Y','Y','N','N');
/*!40000 ALTER TABLE `modul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization`
--

DROP TABLE IF EXISTS `organization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `posisi` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization`
--

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
INSERT INTO `organization` VALUES (1,'Muhamad Rosit, M. SI','Wakil Dekan I',2,'WhatsApp Image 2020-09-11 at 10-08-31.jpg',0,'2020-06-15 19:31:25','2020-10-07 19:50:38'),(2,'Anna Agustina, Ph.D','Dekan',1,'7007211001157915011716January2020.jpeg',0,'2020-06-15 19:35:36','2020-06-24 15:16:51'),(3,'Umar Halim, M.Phil','Wakil dekan 2',2,'WhatsApp Image 2020-09-11 at 12-45-13.jpg',0,'2020-10-01 16:56:51','2020-10-07 19:50:46'),(5,'B. Helpris Estaswara, M. Si','Wakil Dekan III',4,'7008211002147728580524October2016.jpeg',0,'2020-10-07 12:12:25',NULL);
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partner`
--

DROP TABLE IF EXISTS `partner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner` (
  `id_partner` int(11) NOT NULL AUTO_INCREMENT,
  `nama_partner` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `deskripsi_terjemahan` text,
  `logo_partner` varchar(255) DEFAULT NULL,
  `gallery_partner` text,
  `id_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_partner`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partner`
--

LOCK TABLES `partner` WRITE;
/*!40000 ALTER TABLE `partner` DISABLE KEYS */;
INSERT INTO `partner` VALUES (1,'Orbicom (The International Network of UNESCO Chairs in Communication)','<p><strong>Jakarta, Kominfo</strong>&nbsp;&ndash; Menteri Komunikasi dan Informatika Rudiantara menerima kunjungan delegasi The International Network of UNESCO Chairs in Communication (ORBICOM) dalam Welcome Dinner di Ruang Roeslan Abdul Gani Kemkominfo, Kamis malam (04/05/2017). Dihadiri oleh sekitar 21 delegasi dari berbagai negara, Welcome Dinner ini merupakan salah satu rangkaian kegiatan Simposium Internasional dan Annual Meeting ke-6 ORBICOM yang dilaksanakan pada 04-07 Mei 2017</p>','','orbicom.png','IMG_0599-min.jpg,DSC00686-min.jpg,Backgrund-min.jpg',1,'2020-03-31 21:50:39','2020-06-08 06:02:09'),(2,'ISKI','<p>Eksistensi suatu lembaga atau organisasi akan terlihat dari aktivitasnya serta kemanfaatan</p>\r\n<p>bagi individu anggota dan kemaslahatan sosial. Ikatan Sarjana Komunikasi Indonesia (ISKI)</p>\r\n<p>yang lahir pada tanggal 12 Oktober 1983 atas jasa para pendiri tokoh-tokoh komunikasi</p>\r\n<p>Indonesia harus senantiasa berupaya hadir dan memberikan kemaslahatan tersebut.</p>\r\n<p>Sebagai sebuah komunitas harus berkolaborasi kuat dengan komponen lainnya yaitu,</p>\r\n<p>pemerintah, bisnis/industry, media, perguruan tinggi/akademisi dan masyarakat serta</p>\r\n<p>komunitas lainnya.</p>','','rsz_1rsz_2logo-new.png','img_20191014_121023_228.jpg',1,'2020-03-31 22:37:43','2020-06-02 16:07:40'),(3,'Unesco','<p>UNESCO is the United Nations Educational, Scientific and Cultural Organization. It seeks to build peace through international cooperation in Education, the Sciences and Culture. UNESCO\'s programmes contribute to the achievement of the Sustainable Development Goals defined in Agenda 2030, adopted by the UN General Assembly in 2015.</p>','','unesco-logo.png','54521961_665914277197926_8858797800972877824_o.jpg,54257145_665914320531255_5426348203882577920_o.jpg',1,'2020-03-31 22:44:56','2020-06-08 06:01:18'),(4,'Technische UniversitÃ¤t Ilmenau','','<p>The history of the TU Ilmenau is characterized by its training of engineers, particularly in the fields of electrical engineering and mechanical engineering. Today, engineering, sciences, economics, and media are the pillars of the university\'s education and research. The university is also bound to its scientific tradition in its future development. This tradition, along with the strong interdisciplinary connection to the economic and social sciences as well as to the natural sciences, determines the profile of the university. Its firm aim is to be counted among the best academic, technologically-oriented educational establishments. Modern forms of study and innovative courses are developed and supported by the university. The strong commitment of its staff and the sound education of the students, including professional supervision, receive high-level academic recognition.&nbsp;</p>','ilmenau.png','',1,'2020-10-07 20:39:16',NULL);
/*!40000 ALTER TABLE `partner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ppm`
--

DROP TABLE IF EXISTS `ppm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ppm` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_terjemahan` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `isi_terjemahan` text COLLATE latin1_general_ci NOT NULL,
  `tipe` int(1) NOT NULL,
  `gambar` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `id_user` int(5) NOT NULL,
  `kategori` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ppm`
--

LOCK TABLES `ppm` WRITE;
/*!40000 ALTER TABLE `ppm` DISABLE KEYS */;
INSERT INTO `ppm` VALUES (1,'Format Pelaporan Kegiatan Pengabdian Masyarakat','Format Pelaporan Kegiatan Pengabdian Masyarakat','format-pelaporan-kegiatan-pengabdian-masyarakat','<p>Format pelaporan kegiatan pengabdian masyarakat. Silahkan unduhÂ <a href=\"https://drive.google.com/open?id=1STu-MmYntBSvA6jfUfEXiZ7hG1wIYv_K\" target=\"_blank\">di sini</a></p>','<p>Format pelaporan kegiatan pengabdian masyarakat. Silahkan unduh&nbsp;<a href=\"https://drive.google.com/open?id=1STu-MmYntBSvA6jfUfEXiZ7hG1wIYv_K\" target=\"_blank\" rel=\"noopener\">di sini</a></p>',0,'handshake-3139227_960_720-960x480.jpg','Minggu','2020-10-11','15:52:00',1,14,'2020-07-23 00:00:00','2020-10-11 15:52:00'),(2,'Hibah Fakultas','Hibah Fakultas','hibah-fakultas','<p>Pedoman Hibah Penelitian Fakultas Ilmu Komunikasi&nbsp; unduh&nbsp;<a href=\"https://drive.google.com/open?id=1NwtoNOx30ZFrYPmcgm3FR5CItEaqFP8C\" target=\"_blank\" rel=\"noopener\">di sini</a></p>\r\n<p>Pedoman pengajuan proposal&nbsp; Hibah peneltian Unggulan fakultas klik&nbsp;<a href=\"http://lppmfikomunivpancasila.id/2018/02/10/usulan-penelitian/\" target=\"_blank\" rel=\"noopener\">di sini</a></p>\r\n<p>Pedoman Penulisan Laporan Akhir Penelitian Hibah Unggulan Fakultas. Klik<a href=\"https://drive.google.com/open?id=1GzlU99Ul5fp8uUO9TPlVrEQQoEak5nHS\" target=\"_blank\" rel=\"noopener\">&nbsp;di Sini</a></p>','<p>Pedoman Hibah Penelitian Fakultas Ilmu Komunikasi&nbsp; unduh&nbsp;<a href=\"https://drive.google.com/open?id=1NwtoNOx30ZFrYPmcgm3FR5CItEaqFP8C\" target=\"_blank\" rel=\"noopener\">di sini</a></p>\r\n<p>Pedoman pengajuan proposal&nbsp; Hibah peneltian Unggulan fakultas klik&nbsp;<a href=\"http://lppmfikomunivpancasila.id/2018/02/10/usulan-penelitian/\" target=\"_blank\" rel=\"noopener\">di sini</a></p>\r\n<p>Pedoman Penulisan Laporan Akhir Penelitian Hibah Unggulan Fakultas. Klik<a href=\"https://drive.google.com/open?id=1GzlU99Ul5fp8uUO9TPlVrEQQoEak5nHS\" target=\"_blank\" rel=\"noopener\">&nbsp;di Sini</a></p>',1,'fikomup_logo.png','Kamis','2020-07-23','13:10:50',1,18,'2020-07-23 00:00:00',NULL),(3,'Hibah Penelitian dan Publikasi Dosen & Mahasiswa 2019-2020','Hibah Penelitian dan Publikasi Dosen & Mahasiswa 2019-2020','hibah-penelitian-dan-publikasi-dosen--mahasiswa-20192020','<p>Fakultas Ilmu Komunikasi Universitas Pancasila membuka kesempatan kepada seluruh Dosen tetap Fikom UP untuk mengajukan proposal Hibah penelitian dan publikasi Dosen mahasiswa untuk tahun akademik 2019-2020. Adapun tata cara pendaftarannya yaitu:</p>\r\n<ol>\r\n<li>Bacalah terlebih dahulu Pedoman Pengusulan hibah Peneltian dan Publikasi Dosen Mahasiswa 2019.&nbsp;<a href=\"https://drive.google.com/open?id=1HqDkVPRhyoh5WSM9lvU1Zx5M1_TSiful\" target=\"_blank\" rel=\"noopener\">Klik Disini</a></li>\r\n<li>Proposal yang diunggah dalam bentuk pdf dengan ukuran file maksimal 10 MB</li>\r\n<li>File tersebut di beri nama : Proposal_Nama Dosen Pengusul_Hibah Penelitian dan publikasi_2019. Contoh : Proposal_Rudi_Hibah Penelitian dan publikasi_2019</li>\r\n<li>Selain proposal, pengusul juga wajib mengisi informasi pelaksanaan penelitian yang terdiri atas\r\n<ol>\r\n<li>Judul</li>\r\n<li>Nama Dosen pengusul</li>\r\n<li>Nama Mahasiswa yang diusulkan sebagai anggota</li>\r\n<li>Identitas Dosen pengusul</li>\r\n<li>Jumlah Total Biaya yang diusulkan</li>\r\n<li>Halaman Pengesahan yang telah ditandatangani oleh Dosen Peneliti dengan Kepala Unit PPM Fikom dan Dekan Fikom (cap Basah) halaman tersebut di scan dengan file scan dalam bentuk PDF maksimal 3 MB dan diberi nama : Proposal_nama dosen_hibah Penelitian dan publikasi 2019_halaman pengesahan. Contoh : Proposal_Rudi_hibah Penelitian dan publikasi 2019_halaman pengesahan</li>\r\n</ol>\r\n</li>\r\n<li>Proposal diunggah selambat-lambatnya 10 November 2019 melalui laman www.lppmfikomunivpancasila.id</li>\r\n<li>Berikut link pendaftaran Proposal.&nbsp;<a href=\"http://bit.ly/Hibah_penelitian_publikasi_2019\" target=\"_blank\" rel=\"noopener\">Klik Disini</a></li>\r\n<li>Alur hibah Penelitian dan Publikasi Dosen dan Mahasiswa 2019 2020&nbsp;<a href=\"https://drive.google.com/open?id=1Y5rnV64xxndTmpBydixBiRn898k6hoJJ\" target=\"_blank\" rel=\"noopener\">Klik Disini</a></li>\r\n</ol>','<p>Fakultas Ilmu Komunikasi Universitas Pancasila membuka kesempatan kepada seluruh Dosen tetap Fikom UP untuk mengajukan proposal Hibah penelitian dan publikasi Dosen mahasiswa untuk tahun akademik 2019-2020. Adapun tata cara pendaftarannya yaitu:</p>\r\n<ol>\r\n<li>Bacalah terlebih dahulu Pedoman Pengusulan hibah Peneltian dan Publikasi Dosen Mahasiswa 2019.&nbsp;<a href=\"https://drive.google.com/open?id=1HqDkVPRhyoh5WSM9lvU1Zx5M1_TSiful\" target=\"_blank\" rel=\"noopener\">Klik Disini</a></li>\r\n<li>Proposal yang diunggah dalam bentuk pdf dengan ukuran file maksimal 10 MB</li>\r\n<li>File tersebut di beri nama : Proposal_Nama Dosen Pengusul_Hibah Penelitian dan publikasi_2019. Contoh : Proposal_Rudi_Hibah Penelitian dan publikasi_2019</li>\r\n<li>Selain proposal, pengusul juga wajib mengisi informasi pelaksanaan penelitian yang terdiri atas\r\n<ol>\r\n<li>Judul</li>\r\n<li>Nama Dosen pengusul</li>\r\n<li>Nama Mahasiswa yang diusulkan sebagai anggota</li>\r\n<li>Identitas Dosen pengusul</li>\r\n<li>Jumlah Total Biaya yang diusulkan</li>\r\n<li>Halaman Pengesahan yang telah ditandatangani oleh Dosen Peneliti dengan Kepala Unit PPM Fikom dan Dekan Fikom (cap Basah) halaman tersebut di scan dengan file scan dalam bentuk PDF maksimal 3 MB dan diberi nama : Proposal_nama dosen_hibah Penelitian dan publikasi 2019_halaman pengesahan. Contoh : Proposal_Rudi_hibah Penelitian dan publikasi 2019_halaman pengesahan</li>\r\n</ol>\r\n</li>\r\n<li>Proposal diunggah selambat-lambatnya 10 November 2019 melalui laman www.lppmfikomunivpancasila.id</li>\r\n<li>Berikut link pendaftaran Proposal.&nbsp;<a href=\"http://bit.ly/Hibah_penelitian_publikasi_2019\" target=\"_blank\" rel=\"noopener\">Klik Disini</a></li>\r\n<li>Alur hibah Penelitian dan Publikasi Dosen dan Mahasiswa 2019 2020&nbsp;<a href=\"https://drive.google.com/open?id=1Y5rnV64xxndTmpBydixBiRn898k6hoJJ\" target=\"_blank\" rel=\"noopener\">Klik Disini</a></li>\r\n</ol>',1,'','Kamis','2020-07-23','12:58:19',1,18,'2020-07-23 00:00:00',NULL),(4,'Hibah DIKTI','Hibah DIKTI','hibah-dikti','<p>Ketentuan Umum Penelitian dan Pengabdian Masyarakat Hibah Kemenristekdikti</p>\r\n<p>Pelaksanaan program penelitian dan pengabdian kepada masyarakat harus mengacu pada standar penjaminan mutu penelitian dan pengabdian kepada masyarakat di perguruan tinggi sesuai dengan rambu-rambu yang telah ditetapkan. Berkenaan dengan hal tersebut, DRPM menetapkan ketentuan umum pelaksanaan program penelitian dan pengabdian kepada masyarakat yang diuraikan sebagai berikut.</p>\r\n<ol>\r\n<li>Ketua peneliti/pelaksana adalah dosen tetap perguruan tinggi yang mempunyai Nomor Induk Dosen Nasional (NIDN) atau Nomor Induk Dosen Khusus (NIDK) dari Kementerian Riset, Teknologi, dan Pendidikan Tinggi.</li>\r\n<li>Anggota peneliti/pelaksana adalah dosen yang mempunyai NIDN atau NIDK dan/atau bukan dosen yang harus dicantumkan dalam proposal.</li>\r\n<li>Proposal diusulkan melalui Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM), Lembaga Penelitian, Lembaga Pengabdian kepada Masyarakat atau sebutan lain yang sejenis tempat dosen tersebut bertugas sebagai dosen tetap dan selanjutnya dikirim ke DRPM dengan cara diunggah melalui Simlitabmas (<a href=\"http://simlitabmas.ristekdikti.go.id/\">http://simlitabmas.ristekdikti.go.id</a><a href=\"http://simlitabmas.ristekdikti.go.id/\">)</a>.</li>\r\n<li>Setiap dosen dapat mengusulkan dua proposal penelitian (satu proposal sebagai ketua dan satu proposal sebagai anggota atau dua proposal sebagai anggota pada skema yang berbeda) dan dua proposal pengabdian kepada masyarakat (satu proposal sebagai ketua dan satu proposal sebagai anggota atau dua proposal sebagai anggota pada skema yang berbeda). Khusus untuk dosen/peneliti yang memiliki H-Index lebih besar atau sama dengan 2 (&ge;2) yang didapatkan dari lembaga pengindeks internasional bereputasi, dapat mengajukan proposal penelitian hingga tidak lebih dari empat proposal (dua sebagai ketua dan dua sebagai anggota; atau satu sebagai ketua dan tiga sebagai anggota; atau empat sebagai anggota).</li>\r\n<li>Apabila penelitian atau pengabdian yang dihentikan sebelum waktunya akibat kelalaian peneliti/pelaksana atau terbukti memperoleh duplikasi pendanaan penelitian atau pengabdian atau mengusulkan kembali penelitian atau pengabdian kepada masyarakat yang telah didanai sebelumnya, maka ketua peneliti/pelaksana tersebut tidak diperkenankan mengusulkan penelitian atau pengabdian yang didanai oleh DRPM selama 2 tahun berturut-turut dan diwajibkan mengembalikan dana yang telah diterima ke kas negara.</li>\r\n<li>Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM), Lembaga Penelitian, Lembaga Pengabdian kepada Masyarakatatau sebutan lain yang sejenis diwajibkan untuk melakukan pengawasan internal atas semua kegiatan pengelolaan penelitian dan pengabdian dengan mengacu kepada sistem penjaminan mutu yang berlaku di masing-masing perguruan tinggi.</li>\r\n<li>Peneliti dan pelaksana pengabdian kepada masyarakat diwajibkan membuat Catatan Harian dalam melaksanakan penelitian atau pengabdian kepada masyarakat. Catatan Harian berisi catatan tentang pelaksanaan penelitian atau pengabdian kepada masyarakat sesuai dengan tahapan proses penelitian atau pengabdian kepada masyarakat.&nbsp;<strong>Catatan Harian diunggah ke Simlitabmas</strong>&nbsp;sebagai bagian dari kelengkapan dokumen pelaksanaan penelitian atau pengabdian kepada masyarakat. Peneliti dan pelaksana pengabdian kepada masyarakat juga diwajibkan membuat&nbsp;<em>Logbook</em>.&nbsp;<em>Logbook</em>&nbsp;berisi catatan detil tentang substansi penelitian atau pengabdian kepada masyarakat yang meliputi bahan, data, metode, analisis, hasil, dan lain-lain yang dianggap penting.&nbsp;<strong><em>Logbook</em>&nbsp;disimpan oleh peneliti atau pelaksana pengabdian kepada masyarakat yang dapat dijadikan bukti dalam pengajuan HKI</strong>.</li>\r\n<li>Peneliti atau pelaksana pengabdian kepada masyarakat yang tidak berhasil memenuhi luaran sesuai dengan target skema dapat dikenai sanksi.</li>\r\n<li>Pertanggungjawaban dana penelitian mengacu pada SBK tahun anggaran yang berlaku dan ditetapkan oleh Menteri Keuangan.</li>\r\n<li>Peneliti atau pelaksana pengabdian kepada masyarakat wajib mencantumkan&nbsp;<em>acknowledgement</em>&nbsp;yang menyebutkan sumber pendanaan (yaitu: Direktorat Riset dan Pengabdian Masyarakat &ndash; Direktorat Jenderal Penguatan Riset dan Pengembangan &ndash; Kementerian Riset, Teknologi, dan Pendidikan Tinggi Republik Indonesia) pada setiap bentuk luaran penelitian baik berupa publikasi ilmiah, makalah yang dipresentasikan, maupun poster.</li>\r\n</ol>\r\n<p>Panduan Pelaksanaan&nbsp; Penelitian dan Pengabdian Masyarakat Kemtrian Riset dan Pendidikan Tinggi Edisi XI dapat diunduh&nbsp;<a href=\"https://drive.google.com/open?id=1qZPVjL2-0f8_gpWn8bEHq82ndSOnG0cp\" target=\"_blank\" rel=\"noopener\">di sini</a></p>','<p>Ketentuan Umum Penelitian dan Pengabdian Masyarakat Hibah Kemenristekdikti</p>\r\n<p>Pelaksanaan program penelitian dan pengabdian kepada masyarakat harus mengacu pada standar penjaminan mutu penelitian dan pengabdian kepada masyarakat di perguruan tinggi sesuai dengan rambu-rambu yang telah ditetapkan. Berkenaan dengan hal tersebut, DRPM menetapkan ketentuan umum pelaksanaan program penelitian dan pengabdian kepada masyarakat yang diuraikan sebagai berikut.</p>\r\n<ol>\r\n<li>Ketua peneliti/pelaksana adalah dosen tetap perguruan tinggi yang mempunyai Nomor Induk Dosen Nasional (NIDN) atau Nomor Induk Dosen Khusus (NIDK) dari Kementerian Riset, Teknologi, dan Pendidikan Tinggi.</li>\r\n<li>Anggota peneliti/pelaksana adalah dosen yang mempunyai NIDN atau NIDK dan/atau bukan dosen yang harus dicantumkan dalam proposal.</li>\r\n<li>Proposal diusulkan melalui Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM), Lembaga Penelitian, Lembaga Pengabdian kepada Masyarakat atau sebutan lain yang sejenis tempat dosen tersebut bertugas sebagai dosen tetap dan selanjutnya dikirim ke DRPM dengan cara diunggah melalui Simlitabmas (<a href=\"http://simlitabmas.ristekdikti.go.id/\">http://simlitabmas.ristekdikti.go.id</a><a href=\"http://simlitabmas.ristekdikti.go.id/\">)</a>.</li>\r\n<li>Setiap dosen dapat mengusulkan dua proposal penelitian (satu proposal sebagai ketua dan satu proposal sebagai anggota atau dua proposal sebagai anggota pada skema yang berbeda) dan dua proposal pengabdian kepada masyarakat (satu proposal sebagai ketua dan satu proposal sebagai anggota atau dua proposal sebagai anggota pada skema yang berbeda). Khusus untuk dosen/peneliti yang memiliki H-Index lebih besar atau sama dengan 2 (&ge;2) yang didapatkan dari lembaga pengindeks internasional bereputasi, dapat mengajukan proposal penelitian hingga tidak lebih dari empat proposal (dua sebagai ketua dan dua sebagai anggota; atau satu sebagai ketua dan tiga sebagai anggota; atau empat sebagai anggota).</li>\r\n<li>Apabila penelitian atau pengabdian yang dihentikan sebelum waktunya akibat kelalaian peneliti/pelaksana atau terbukti memperoleh duplikasi pendanaan penelitian atau pengabdian atau mengusulkan kembali penelitian atau pengabdian kepada masyarakat yang telah didanai sebelumnya, maka ketua peneliti/pelaksana tersebut tidak diperkenankan mengusulkan penelitian atau pengabdian yang didanai oleh DRPM selama 2 tahun berturut-turut dan diwajibkan mengembalikan dana yang telah diterima ke kas negara.</li>\r\n<li>Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM), Lembaga Penelitian, Lembaga Pengabdian kepada Masyarakatatau sebutan lain yang sejenis diwajibkan untuk melakukan pengawasan internal atas semua kegiatan pengelolaan penelitian dan pengabdian dengan mengacu kepada sistem penjaminan mutu yang berlaku di masing-masing perguruan tinggi.</li>\r\n<li>Peneliti dan pelaksana pengabdian kepada masyarakat diwajibkan membuat Catatan Harian dalam melaksanakan penelitian atau pengabdian kepada masyarakat. Catatan Harian berisi catatan tentang pelaksanaan penelitian atau pengabdian kepada masyarakat sesuai dengan tahapan proses penelitian atau pengabdian kepada masyarakat.&nbsp;<strong>Catatan Harian diunggah ke Simlitabmas</strong>&nbsp;sebagai bagian dari kelengkapan dokumen pelaksanaan penelitian atau pengabdian kepada masyarakat. Peneliti dan pelaksana pengabdian kepada masyarakat juga diwajibkan membuat&nbsp;<em>Logbook</em>.&nbsp;<em>Logbook</em>&nbsp;berisi catatan detil tentang substansi penelitian atau pengabdian kepada masyarakat yang meliputi bahan, data, metode, analisis, hasil, dan lain-lain yang dianggap penting.&nbsp;<strong><em>Logbook</em>&nbsp;disimpan oleh peneliti atau pelaksana pengabdian kepada masyarakat yang dapat dijadikan bukti dalam pengajuan HKI</strong>.</li>\r\n<li>Peneliti atau pelaksana pengabdian kepada masyarakat yang tidak berhasil memenuhi luaran sesuai dengan target skema dapat dikenai sanksi.</li>\r\n<li>Pertanggungjawaban dana penelitian mengacu pada SBK tahun anggaran yang berlaku dan ditetapkan oleh Menteri Keuangan.</li>\r\n<li>Peneliti atau pelaksana pengabdian kepada masyarakat wajib mencantumkan&nbsp;<em>acknowledgement</em>&nbsp;yang menyebutkan sumber pendanaan (yaitu: Direktorat Riset dan Pengabdian Masyarakat &ndash; Direktorat Jenderal Penguatan Riset dan Pengembangan &ndash; Kementerian Riset, Teknologi, dan Pendidikan Tinggi Republik Indonesia) pada setiap bentuk luaran penelitian baik berupa publikasi ilmiah, makalah yang dipresentasikan, maupun poster.</li>\r\n</ol>\r\n<p>Panduan Pelaksanaan&nbsp; Penelitian dan Pengabdian Masyarakat Kemtrian Riset dan Pendidikan Tinggi Edisi XI dapat diunduh&nbsp;<a href=\"https://drive.google.com/open?id=1qZPVjL2-0f8_gpWn8bEHq82ndSOnG0cp\" target=\"_blank\" rel=\"noopener\">di sini</a></p>',1,'','Kamis','2020-07-23','12:58:53',1,18,'2020-07-23 00:00:00',NULL),(5,'Unggah Laporan Penelitian','Unggah Laporan Penelitian','unggah-laporan-penelitian','<p>Sebelum mengunggah laporan penelitian, pastikan anda telah membaca Pedoman penulisan Laporan penelitian unggulan Fakultas. Selamat mengunggah. Terima kasih</p>\r\n<ul>\r\n<li>Untuk Membaca Pedoman Penulisan Laporan Hibah unggulan fakultas Silahkan Klik&nbsp;<a href=\"https://drive.google.com/open?id=19g1fsW9R4mCXVx_GoudhxPfksNCyvOfH\">Di Sini</a></li>\r\n<li>Untuk mengunggah laporan penelitian unggulan fakultas silahkan klik<a href=\"https://goo.gl/forms/Q7MJGqJyrWwEiVir1\">&nbsp;Di Sini</a></li>\r\n</ul>','<p>Sebelum mengunggah laporan penelitian, pastikan anda telah membaca Pedoman penulisan Laporan penelitian unggulan Fakultas. Selamat mengunggah. Terima kasih</p>\r\n<ul>\r\n<li>Untuk Membaca Pedoman Penulisan Laporan Hibah unggulan fakultas Silahkan Klik&nbsp;<a href=\"https://drive.google.com/open?id=19g1fsW9R4mCXVx_GoudhxPfksNCyvOfH\">Di Sini</a></li>\r\n<li>Untuk mengunggah laporan penelitian unggulan fakultas silahkan klik<a href=\"https://goo.gl/forms/Q7MJGqJyrWwEiVir1\">&nbsp;Di Sini</a></li>\r\n</ul>',1,'Gunung-karangetan-dari-Melikunusa-1024x480.jpg','Kamis','2020-07-23','13:13:10',1,18,'2020-07-23 00:00:00',NULL);
/*!40000 ALTER TABLE `ppm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_terjemahan` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `isi_terjemahan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `gambar` text COLLATE latin1_general_ci,
  `attachment` text COLLATE latin1_general_ci,
  `id_user` int(5) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (4,'Jadwal Konseling 2020','Jadwal Konseling 2020','','<p>Jadwal bisa dilihat pada gambar</p>','2020-07-01','','','',0,'2020-07-06 11:41:44',NULL);
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `id_setting` int(5) NOT NULL AUTO_INCREMENT,
  `parameter` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nilai` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,'judul','Fakultas Ilmu Komunikasi - Universitas Pancasila'),(2,'deskripsi','Mendidik Siswa Berprestasi dan Berbudi Pekerti'),(3,'url','https://fikomup.com/'),(4,'ikon','favicon.png'),(5,'keyword','pendidikan, kampus, universitas, pancasila, fikomup'),(6,'folder','/'),(7,'homepage','0');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (2,'13256423','Mahasiswa Test','Komunikasi','',0,'2020-06-23 20:17:45',NULL),(3,'7014210055','rizal','Komunikasi','favicon.png',1,'2020-09-28 14:45:33','2020-11-16 21:29:03');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id_tag` int(5) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (5,'Movie','movie'),(8,'Entertainment','entertainment'),(9,'How To','how-to'),(10,'Health','health'),(11,'Science','science'),(12,'Technology','technology'),(13,'Relationship','relationship'),(14,'Business','business');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template`
--

DROP TABLE IF EXISTS `template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template` (
  `id_template` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_template`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template`
--

LOCK TABLES `template` WRITE;
/*!40000 ALTER TABLE `template` DISABLE KEYS */;
INSERT INTO `template` VALUES (1,'Web Sekolah','web_sekolah','N'),(2,'Fikom UP','fikom','Y');
/*!40000 ALTER TABLE `template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ukm`
--

DROP TABLE IF EXISTS `ukm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ukm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ukm`
--

LOCK TABLES `ukm` WRITE;
/*!40000 ALTER TABLE `ukm` DISABLE KEYS */;
INSERT INTO `ukm` VALUES (1,'CEC FIKOM PANCASILA','','cec_fikomup.jpg',0,'2020-06-15 20:26:12','2020-06-23 20:14:49'),(2,'KKM FUTSAL FIKOM UP','','futsal_fikomup.jpg',0,'2020-06-15 20:26:30','2020-06-15 20:26:56'),(6,'FIKOMUP BASKETBALL','','basket_fikomup.png',0,'2020-06-15 20:31:05',NULL),(7,'MUAYTHAI KOMUNIKASI','','muaythai_fikomup.jpg',0,'2020-06-15 20:31:13','2020-06-15 20:31:20'),(8,'ROHIS FIKOM UP','','rohis_fikomup.jpg',0,'2020-06-15 20:31:29',NULL),(9,'SERUNI FIKOM UP','','seruni_fikomup.jpg',1,'2020-06-15 20:31:46','2020-11-16 21:28:44'),(10,'CINEMA.KOM FIKOM UP','','cinemakom_fikomup.jpg',0,'2020-06-15 20:31:57',NULL);
/*!40000 ALTER TABLE `ukm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Administrator','rohi.abdulloh@gmail.com','admin','572231E973D18DB2BA58AF89BB5E8C67','admin'),(2,'Author','author@gmail.com','author','02bd92faa38aaa6cc0ea75e59937a1ef','author');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vision_mission`
--

DROP TABLE IF EXISTS `vision_mission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vision_mission` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tipe` int(11) NOT NULL,
  `judul` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_terjemahan` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `isi_terjemahan` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `id_user` int(5) NOT NULL,
  `kategori` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vision_mission`
--

LOCK TABLES `vision_mission` WRITE;
/*!40000 ALTER TABLE `vision_mission` DISABLE KEYS */;
INSERT INTO `vision_mission` VALUES (1,0,'','','','<ul>\r\n<li>Menyelenggarakan pendidikan dan pembelajaran komunikasi dalam jurnalistik multimedia, komunikasi strategis, dan kajian media berdasarkan rumusan sikap, pengetahuan, dan keterampilan umum sesuai dengan rumusan dalam</li>\r\n<li>Standar Nasional Pendidikan Tinggi (SNPT).&nbsp;</li>\r\n<li>Melakukan penelitian terkait keilmuan komunikasi dalam jurnalistik multimedia, komunikasi strategis, dan kajian media.&nbsp;</li>\r\n<li>Melakukan pengabdian kepada masyarakat terkait dengan bidang kajian komunikasi terapan dalam jurnalistik multimedia, komunikasi strategis, dan kajian media.</li>\r\n<li>Menciptakan suasana akademik yang kondusif, sehingga penyelenggaraan pengajaran dan pembelajaran, penelitian, dan pengabdian kepada masyarakat dalam bidang ilmu komunikasi berjalan dengan baik.&nbsp;</li>\r\n<li>Melakukan kerjasama dalam bidang ilmu komunikasi dengan lembaga, dalam dan luar negeri.</li>\r\n</ul>','<ul>\r\n<li>Menyelenggarakan pendidikan dan pembelajaran komunikasi dalam jurnalistik multimedia, komunikasi strategis, dan kajian media berdasarkan rumusan sikap, pengetahuan, dan keterampilan umum sesuai dengan rumusan dalam</li>\r\n<li>Standar Nasional Pendidikan Tinggi (SNPT).&nbsp;</li>\r\n<li>Melakukan penelitian terkait keilmuan komunikasi dalam jurnalistik multimedia, komunikasi strategis, dan kajian media.&nbsp;</li>\r\n<li>Melakukan pengabdian kepada masyarakat terkait dengan bidang kajian komunikasi terapan dalam jurnalistik multimedia, komunikasi strategis, dan kajian media.</li>\r\n<li>Menciptakan suasana akademik yang kondusif, sehingga penyelenggaraan pengajaran dan pembelajaran, penelitian, dan pengabdian kepada masyarakat dalam bidang ilmu komunikasi berjalan dengan baik.&nbsp;</li>\r\n<li>Melakukan kerjasama dalam bidang ilmu komunikasi dengan lembaga, dalam dan luar negeri.<br /><br /></li>\r\n</ul>','','Senin','2020-11-16','21:27:09',1,0,'2020-10-01 17:33:51','2020-11-16 21:27:09'),(2,1,'','','','Pada tahun 2019, program studi ilmu komunikasi menjadi unggul dan kompetitif dalam bidang jurnalistik multimedia, komunikasi strategis, dan kajian media berdasarkan Pancasila.','Pada tahun 2019, program studi ilmu komunikasi menjadi unggul dan kompetitif dalam bidang jurnalistik multimedia, komunikasi strategis, dan kajian media berdasarkan Pancasila.','','Senin','2020-11-16','21:27:02',1,0,'2020-10-01 17:34:00','2020-11-16 21:27:02');
/*!40000 ALTER TABLE `vision_mission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `widget`
--

DROP TABLE IF EXISTS `widget`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `widget` (
  `id_widget` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tipe` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `konten` text COLLATE latin1_general_ci NOT NULL,
  `posisi` int(2) NOT NULL,
  `urut` int(2) NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_widget`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `widget`
--

LOCK TABLES `widget` WRITE;
/*!40000 ALTER TABLE `widget` DISABLE KEYS */;
INSERT INTO `widget` VALUES (3,'Trending News','terbaru','',1,2,'Y'),(14,'Category','kategori','',1,3,'Y'),(13,'Popular News','populer','',1,1,'Y');
/*!40000 ALTER TABLE `widget` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-16 21:37:35
