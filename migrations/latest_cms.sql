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
  `kategori` int(5) NOT NULL,
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `hits` int(10) NOT NULL,
  `headline` int(1) DEFAULT NULL,
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
INSERT INTO `history` VALUES (1,0,'Fakultas Ilmu Komunikasi Universitas Pancasila, atau yang dikenal dengan nama FIKom UP','Fakultas Ilmu Komunikasi Universitas Pancasila, atau yang dikenal dengan nama FIKom UP','fakultas-ilmu-komunikasi-universitas-pancasila-atau-yang-dikenal-dengan-nama-fikom-up','<ul>\r\n<li>Berdiri pada Tahun Akademik 2007/2008 (Tgl. 20 April 2007)</li>\r\n<li>Berdasarkan Ijin Penyelenggaraan yang dikeluarkan oleh Departemen Pendidikan Nasional, Direktorat Jendral Pendidikan Tinggi, Direktorat Pembinaan Akademik dan Kemahasiswaan, dengan Surat Keputusan Nomor 936/D/T/2007, tanggal 20 April 2007</li>\r\n<li>Perpanjangan Ulang Ijin Penyelenggaraan Nomor 3010/D/T/K-III/2009 tanggal 28 Juli 2009</li>\r\n<li>Terakreditasi A, berdasarkan Keputusan BAN-PT Nomor 2716/BAN-PT/Ak-XIV/S1/XI/2016 tanggal 24 November 2016&nbsp;tentang Status, Nilai, Peringkat dan Masa Berlaku Hasil Akreditasi Program Sarjana di Perguruan Tinggi</li>\r\n</ul>','<ul>\r\n<li>Berdiri pada Tahun Akademik 2007/2008 (Tgl. 20 April 2007)</li>\r\n<li>Berdasarkan Ijin Penyelenggaraan yang dikeluarkan oleh Departemen Pendidikan Nasional, Direktorat Jendral Pendidikan Tinggi, Direktorat Pembinaan Akademik dan Kemahasiswaan, dengan Surat Keputusan Nomor 936/D/T/2007, tanggal 20 April 2007</li>\r\n<li>Perpanjangan Ulang Ijin Penyelenggaraan Nomor 3010/D/T/K-III/2009 tanggal 28 Juli 2009</li>\r\n<li>Terakreditasi A, berdasarkan Keputusan BAN-PT Nomor 2716/BAN-PT/Ak-XIV/S1/XI/2016 tanggal 24 November 2016&nbsp;tentang Status, Nilai, Peringkat dan Masa Berlaku Hasil Akreditasi Program Sarjana di Perguruan Tinggi</li>\r\n</ul>','','Kamis','2020-10-01','18:09:07',1,0,'',0,NULL,'2020-10-01 18:09:07',NULL);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
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
  `gambar` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `id_user` int(5) NOT NULL,
  `kategori` int(5) NOT NULL,
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `hits` int(10) NOT NULL,
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
INSERT INTO `vision_mission` VALUES (1,0,'','','','<ul>\r\n<li>Menyelenggarakan pendidikan dan pembelajaran komunikasi dalam jurnalistik multimedia, komunikasi strategis, dan kajian media berdasarkan rumusan sikap, pengetahuan, dan keterampilan umum sesuai dengan rumusan dalam</li>\r\n<li>Standar Nasional Pendidikan Tinggi (SNPT).&nbsp;</li>\r\n<li>Melakukan penelitian terkait keilmuan komunikasi dalam jurnalistik multimedia, komunikasi strategis, dan kajian media.&nbsp;</li>\r\n<li>Melakukan pengabdian kepada masyarakat terkait dengan bidang kajian komunikasi terapan dalam jurnalistik multimedia, komunikasi strategis, dan kajian media.</li>\r\n<li>Menciptakan suasana akademik yang kondusif, sehingga penyelenggaraan pengajaran dan pembelajaran, penelitian, dan pengabdian kepada masyarakat dalam bidang ilmu komunikasi berjalan dengan baik.&nbsp;</li>\r\n<li>Melakukan kerjasama dalam bidang ilmu komunikasi dengan lembaga, dalam dan luar negeri.</li>\r\n</ul>','<ul>\r\n<li>Menyelenggarakan pendidikan dan pembelajaran komunikasi dalam jurnalistik multimedia, komunikasi strategis, dan kajian media berdasarkan rumusan sikap, pengetahuan, dan keterampilan umum sesuai dengan rumusan dalam</li>\r\n<li>Standar Nasional Pendidikan Tinggi (SNPT).&nbsp;</li>\r\n<li>Melakukan penelitian terkait keilmuan komunikasi dalam jurnalistik multimedia, komunikasi strategis, dan kajian media.&nbsp;</li>\r\n<li>Melakukan pengabdian kepada masyarakat terkait dengan bidang kajian komunikasi terapan dalam jurnalistik multimedia, komunikasi strategis, dan kajian media.</li>\r\n<li>Menciptakan suasana akademik yang kondusif, sehingga penyelenggaraan pengajaran dan pembelajaran, penelitian, dan pengabdian kepada masyarakat dalam bidang ilmu komunikasi berjalan dengan baik.&nbsp;</li>\r\n<li>Melakukan kerjasama dalam bidang ilmu komunikasi dengan lembaga, dalam dan luar negeri.<br /><br /></li>\r\n</ul>','','Kamis','2020-10-01','17:59:43',1,0,'',0,'2020-10-01 17:33:51','2020-10-01 17:59:43'),(2,1,'','','','Pada tahun 2019, program studi ilmu komunikasi menjadi unggul dan kompetitif dalam bidang jurnalistik multimedia, komunikasi strategis, dan kajian media berdasarkan Pancasila.','Pada tahun 2019, program studi ilmu komunikasi menjadi unggul dan kompetitif dalam bidang jurnalistik multimedia, komunikasi strategis, dan kajian media berdasarkan Pancasila.','','Kamis','2020-10-01','18:01:16',1,0,'',0,'2020-10-01 17:34:00','2020-10-01 18:01:16');
/*!40000 ALTER TABLE `vision_mission` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-01 18:35:06
