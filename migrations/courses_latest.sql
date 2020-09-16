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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,1,'[{\"id\":\"71135008\",\"name\":\"Pendidikan Agama (Islam/Kristen/Hindu/Budha)\",\"sks\":\"3\"},{\"id\":\"07122504\",\"name\":\"Bahasa Inggris untuk Komunikasi I\",\"sks\":\"3\"},{\"id\":\"07153502\",\"name\":\"Kewarganegaraan\",\"sks\":\"3\"},{\"id\":\"07163503\",\"name\":\"Filsafat Pancasila\",\"sks\":\"3\"},{\"id\":\"07213512\",\"name\":\"Pengantar Ilmu Komunikasi\",\"sks\":\"3\"},{\"id\":\"72145068\",\"name\":\"Pengantar Ilmu Sosial\",\"sks\":\"3\"},{\"id\":\"72135069\",\"name\":\"Pengantar Teknologi Informasi dan Komunikasi (TIK)\",\"sks\":\"3\"},{\"id\":\"07433630\",\"name\":\"Desain Grafis\",\"sks\":\"3\"},{\"id\":\"07333522\",\"name\":\"Psikologi Komunikasi\",\"sks\":\"3\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]','{\"0\":{\"id\":\"1\",\"name\":\"Test\",\"sks\":\"1\"},\"2\":{\"id\":\"2\",\"name\":\"Test 2\",\"sks\":\"2\"}}',1,'2020-07-06 21:40:29','2020-09-16 20:05:41'),(2,2,'[{\"id\":\"73235067\",\"name\":\"Bahasa Inggris untuk Komunikasi II\",\"sks\":\"3\"},{\"id\":\"74325070\",\"name\":\"Keterampilan Berpikir\",\"sks\":\"3\"},{\"id\":\"07323521\",\"name\":\"Etika dan Filsafat Komunikasi\",\"sks\":\"3\"},{\"id\":\"07223514\",\"name\":\"Teori Komunikasi\",\"sks\":\"3\"},{\"id\":\"07333523\",\"name\":\"Sosiologi Komunikasi\",\"sks\":\"3\"},{\"id\":\"07323520\",\"name\":\"Produksi Pesan\",\"sks\":\"3\"},{\"id\":\"07473643\",\"name\":\"Public Speaking\",\"sks\":\"3\"},{\"id\":\"07223515\",\"name\":\"Manajemen Pemasaran dalam Komunikasi\",\"sks\":\"3\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]',1,'2020-07-07 19:50:47','2020-09-16 20:11:49'),(3,3,'[{\"id\":\"07433857\",\"name\":\"Teori Komunikasi Massa\",\"sks\":\"3\"},{\"id\":\"07443631\",\"name\":\"Komunikasi Visual\",\"sks\":\"3\"},{\"id\":\"07223513\",\"name\":\"Komunikasi Global\",\"sks\":\"3\"},{\"id\":\"peminatan\",\"name\":\"Peminatan\",\"sks\":\"9\"},{\"id\":\"minor\",\"name\":\"Minor**\",\"sks\":\"3-6\"}]','[{\"id\":\"07213511\",\"name\":\"Pengantar Ilmu Ekonomi (FE)\",\"sks\":\"3\"},{\"id\":\"07663076\",\"name\":\"Pengantar Bisnis (FE)\",\"sks\":\"3\"},{\"id\":\"07653574\",\"name\":\"Psikologi Umum 1 (F.Psi)\",\"sks\":\"3\"},{\"id\":\"07653571\",\"name\":\"Produksi Animasi (FT)\",\"sks\":\"3\"},{\"id\":\"07652572\",\"name\":\"Pengantar Farmasi (F.Farmasi)\",\"sks\":\"2\"},{\"id\":\"07672581\",\"name\":\"Kode Etik Pemasaran Obat (F.Farmasi)\",\"sks\":\"2\"},{\"id\":\"07452098\",\"name\":\"Pariwisata Indonesia (F.Par)\",\"sks\":\"2\"}]','[{\"id\":\"07433629\",\"name\":\"Media, Budaya, dan Masyarakat (MS) \",\"sks\":\"3\"},{\"id\":\"07473644\",\"name\":\"Pemasaran Sosial (SC)\",\"sks\":\"3\"},{\"id\":\"76476174\",\"name\":\"Teknik Lobi dan Negosiasi (SC)\",\"sks\":\"3\"},{\"id\":\"07433746\",\"name\":\"Jurnalistik Multimedia (MJ)\",\"sks\":\"3\"},{\"id\":\"07473755\",\"name\":\"Jurnalistik Media Siar (MJ)\",\"sks\":\"3\"},{\"id\":\"72332025\",\"name\":\"Digital Sinematografi) karya berita (MJ)\",\"sks\":\"3\"},{\"id\":\"07333895\",\"name\":\"Studi Media & Komunikasi (MS)\",\"sks\":\"3\"},{\"id\":\"72333026\",\"name\":\"Digital Sinematografi*) karya Non berita (MS)\",\"sks\":\"3\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]',1,'2020-07-07 19:50:47','2020-09-16 20:11:54'),(4,4,'[{\"id\":\"07243517\",\"name\":\"Metodologi Penelitian Komunikasi I (Kuantitatif)\",\"sks\":\"3\"},{\"id\":\"07333524\",\"name\":\"Komunikasi Politilk\",\"sks\":\"3\"},{\"id\":\"07263019\",\"name\":\"Komunikasi untuk Perubahan Sosial\",\"sks\":\"3\"},{\"id\":\"07363527\",\"name\":\"Komunikasi Lintas Budaya\",\"sks\":\"3\"},{\"id\":\"peminatan\",\"name\":\"Peminatan *\",\"sks\":\"6\"},{\"id\":\"minor\",\"name\":\"Minor **\",\"sks\":\"4-6\"}]','[{\"id\":\"07642570\",\"name\":\"Pengantar Ekonomi Makro (FE)\",\"sks\":\"2\"},{\"id\":\"07663577\",\"name\":\"Psikologi Umum 2 (F.Psi)\",\"sks\":\"3\"},{\"id\":\"07672585\",\"name\":\"Psikologi Perilaku Seksual (F.Psi)\",\"sks\":\"2\"},{\"id\":\"07644569\",\"name\":\"Pengantar Hukum Indonesia (FH)\",\"sks\":\"4\"},{\"id\":\"07664583\",\"name\":\"Hukum Pidana (FH)\",\"sks\":\"4\"},{\"id\":\"07673579\",\"name\":\"Multimedia Berbasis Web (FT)\",\"sks\":\"3\"},{\"id\":\"07672584\",\"name\":\"Interaksi Manusia dan Komputer (FT)\",\"sks\":\"2\"},{\"id\":\"07652573\",\"name\":\"Ilmu Komunikasi Farmasi (F.Farmasi)\",\"sks\":\"2\"},{\"id\":\"07672580\",\"name\":\"UU dan Etika Kesehatan (F.Farmasi)\",\"sks\":\"2\"},{\"id\":\"74635100\",\"name\":\"Manajemen Perhotelan (F.Par)\",\"sks\":\"3\"},{\"id\":\"74635101\",\"name\":\"Mice and Event (F.Par)\",\"sks\":\"3\"}]','[{\"id\":\"07453633\",\"name\":\"Perencanaan Kreatif Periklanan (SC)\",\"sks\":\"3\"},{\"id\":\"07463638\",\"name\":\"Manajemen Periklanan (SC)\",\"sks\":\"3\"},{\"id\":\"73437075\",\"name\":\"Produksi Radio dan TV (MS)\",\"sks\":\"3\"},{\"id\":\"07463751\",\"name\":\"Jurnalistik Media Cetak (MJ)\",\"sks\":\"3\"},{\"id\":\"07473865\",\"name\":\"Media, Gender, dan Identitas\",\"sks\":\"3\"}]','[{\"id\":\"\",\"name\":\"\",\"sks\":\"\"}]',1,'2020-07-07 20:20:30','2020-09-16 20:11:57');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-16 20:16:10
