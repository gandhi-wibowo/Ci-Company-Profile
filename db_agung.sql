-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db_agung
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

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
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `image_id` varchar(30) NOT NULL,
  `image_content` varchar(30) NOT NULL,
  `image_name` varchar(30) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES ('IMG-161031-006','KEG-161030-003','1-20161031_015510.png'),('IMG-161031-007','KEG-161030-003','2-20161031_015510.png'),('IMG-161031-008','KEG-161030-003','3-20161031_015510.png'),('IMG-161031-009','KEG-161030-003','4-20161031_015510.png'),('IMG-161031-010','PRF-200892-001','0-20161031_101714.png'),('IMG-161031-011','PRF-200892-001','1-20161031_101714.png'),('IMG-161031-012','PRF-200892-001','2-20161031_101714.png'),('IMG-161031-013','PRF-200892-001','3-20161031_101714.png');
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kegiatan`
--

DROP TABLE IF EXISTS `kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kegiatan` (
  `kegiatan_id` varchar(30) NOT NULL,
  `kegiatan_judul` varchar(30) NOT NULL,
  `kegiatan_tanggal` datetime NOT NULL,
  `kegiatan_text` text NOT NULL,
  `kegiatan_publish` int(11) NOT NULL,
  PRIMARY KEY (`kegiatan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kegiatan`
--

LOCK TABLES `kegiatan` WRITE;
/*!40000 ALTER TABLE `kegiatan` DISABLE KEYS */;
INSERT INTO `kegiatan` VALUES ('KEG-161030-002','Kegiatan 2','2016-10-30 18:03:43','Lorem ipsum dolor sit amet, malis causae ea mei. Simul consequuntur nam ad, ne quo habeo fuisset. Magna ipsum lucilius has ne. An usu commodo laoreet molestiae, et solum debet malorum vis. Oratio sensibus argumentum quo ad, an eligendi',1),('KEG-161030-003','Kegiatan 3','2016-10-30 18:03:43','Lorem ipsum dolor sit amet, malis causae ea mei. Simul consequuntur nam ad, ne quo habeo fuisset. Magna ipsum lucilius has ne. An usu commodo laoreet molestiae, et solum debet malorum vis. Oratio sensibus argumentum quo ad, an eligendi',1);
/*!40000 ALTER TABLE `kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kontak`
--

DROP TABLE IF EXISTS `kontak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kontak` (
  `kontak_id` varchar(30) NOT NULL,
  `kontak_alamat` text NOT NULL,
  `kontak_hp` varchar(15) NOT NULL,
  `kontak_email` varchar(35) NOT NULL,
  PRIMARY KEY (`kontak_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kontak`
--

LOCK TABLES `kontak` WRITE;
/*!40000 ALTER TABLE `kontak` DISABLE KEYS */;
INSERT INTO `kontak` VALUES ('KON-200892-001','Jalan fajar\r\nGang musyawarah\r\nNo 3\r\nPos 28292\r\nSebrang masjid nurul huda','08238871098','email@email.comaja');
/*!40000 ALTER TABLE `kontak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profil` (
  `profil_id` varchar(30) NOT NULL,
  `profil_keterangan` text NOT NULL,
  PRIMARY KEY (`profil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil`
--

LOCK TABLES `profil` WRITE;
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
INSERT INTO `profil` VALUES ('PRF-200892-001','alasannya sering kali ku dengar');
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_login` varchar(30) NOT NULL,
  `user_password` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('USR-200892-001','Agung Jefrianto','admin','21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-19 17:46:37
