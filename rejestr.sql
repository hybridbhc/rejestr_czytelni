-- MySQL dump 10.11
--
-- Host: localhost    Database: rejestr
-- ------------------------------------------------------
-- Server version	5.0.45-community-nt

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
-- Table structure for table `czytelnik`
--

DROP TABLE IF EXISTS `czytelnik`;
CREATE TABLE `czytelnik` (
  `id_czytelnika` int(3) NOT NULL auto_increment,
  `imie` varchar(20) NOT NULL,
  `nazwisko` varchar(35) NOT NULL,
  `klasa` varchar(2) NOT NULL,
  `haslo` varchar(10) NOT NULL,
  PRIMARY KEY  (`id_czytelnika`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin2;

--
-- Dumping data for table `czytelnik`
--

LOCK TABLES `czytelnik` WRITE;
/*!40000 ALTER TABLE `czytelnik` DISABLE KEYS */;
INSERT INTO `czytelnik` VALUES (1,'Szymon','Zaniewski','6e','technol'),(2,'Dawid','Budziński','6e','kupa'),(3,'Kry','Kry','4d','hyb'),(4,'Ani','Kry','4b','222'),(5,'Karol','Rosiński','6c','kalin');
/*!40000 ALTER TABLE `czytelnik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wizyta`
--

DROP TABLE IF EXISTS `wizyta`;
CREATE TABLE `wizyta` (
  `id_wizyty` int(5) NOT NULL auto_increment,
  `imie_czyt` varchar(20) NOT NULL,
  `nazwisko_czyt` varchar(35) NOT NULL,
  `klasa_czyt` varchar(2) NOT NULL,
  `data` date NOT NULL,
  `godzina` time NOT NULL,
  `nr_stanowiska` varchar(1) NOT NULL,
  PRIMARY KEY  (`id_wizyty`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin2;

--
-- Dumping data for table `wizyta`
--

LOCK TABLES `wizyta` WRITE;
/*!40000 ALTER TABLE `wizyta` DISABLE KEYS */;
INSERT INTO `wizyta` VALUES (1,'','','','2011-12-19','11:10:06','1'),(2,'','','','2011-12-19','11:11:25','1'),(3,'','','','2011-12-19','11:17:17','1'),(4,'','','','2011-12-19','11:17:17','1'),(5,'','','','2011-12-19','11:18:13','1'),(6,'','','','2011-12-19','11:18:13','1'),(7,'','','','2011-12-19','11:18:18','1'),(8,'','','','2011-12-19','11:18:18','1'),(9,'','','','2011-12-19','11:29:16','1'),(10,'','','','2011-12-19','11:30:59','1'),(11,'','','','2011-12-19','11:36:13','1'),(12,'','','','2011-12-19','11:36:56','1'),(13,'','','','2011-12-19','11:37:04','1'),(14,'Szymon','Zaniewski','6d','2011-12-19','11:37:18','1'),(15,'','','','2011-12-19','11:40:33','1'),(16,'','','','2011-12-19','11:40:45','1'),(17,'Szymon','Zaniewski','6e','2011-12-19','11:40:57','1'),(18,'','','','2011-12-19','11:43:13','1'),(19,'','','','2011-12-19','11:43:51','1'),(20,'Dawid','Budziński','6e','2011-12-19','11:43:58','1'),(21,'Dawid','Budziński','6e','2011-12-19','11:48:42','1'),(22,'','','','2011-12-19','11:49:45','1'),(23,'','','','2011-12-19','11:50:28','1'),(24,'','','','2011-12-19','12:34:40','1'),(25,'','','','2011-12-19','12:34:48','1'),(26,'','','','2011-12-19','12:34:56','1'),(27,'','','','2011-12-19','12:38:27','1'),(28,'','','','2011-12-19','12:38:33','1'),(29,'','','','2011-12-19','12:38:38','1'),(30,'Ani','Kry','4b','2011-12-19','12:40:47','1'),(31,'Kry','Kry','4d','2011-12-19','12:40:55','1'),(32,'Ani','Kry','4b','2011-12-19','12:46:43','1'),(33,'Ani','Kry','4b','2011-12-19','12:46:44','1'),(34,'Dawid','Budziński','6e','2011-12-19','12:46:45','1'),(35,'Dawid','Budziński','6e','2011-12-19','12:46:46','1'),(36,'Dawid','Budziński','6e','2011-12-19','12:46:48','1'),(37,'Kry','Kry','4d','2011-12-19','12:46:49','1'),(38,'Szymon','Zaniewski','6e','2011-12-19','12:46:50','1'),(39,'Kry','Kry','4d','2011-12-19','12:46:57','1'),(40,'Dawid','Budziński','6e','2011-12-19','12:46:58','1'),(41,'Szymon','Zaniewski','6e','2011-12-19','12:49:11','1'),(42,'Szymon','Zaniewski','6e','2011-12-19','13:01:10','1'),(43,'','','','2011-12-19','13:01:12','1'),(44,'Szymon','Zaniewski','6e','2011-12-19','13:01:13','1'),(45,'Dawid','Budziński','6e','2011-12-19','13:01:14','1'),(46,'Kry','Kry','4d','2011-12-19','13:01:15','1'),(47,'Ani','Kry','4b','2011-12-19','13:01:15','1'),(48,'Ani','Kry','4b','2011-12-19','13:03:42','1'),(49,'Ani','Kry','4b','2011-12-19','13:03:43','1'),(50,'','','','2011-12-19','13:09:19','1'),(51,'','','','2011-12-19','13:09:46','1'),(52,'','','','2011-12-19','13:09:52','1'),(53,'','','','2011-12-19','13:09:53','1'),(54,'','','','2011-12-19','13:10:21','1'),(55,'','','','2011-12-19','13:11:09','1'),(56,'','','','2011-12-19','13:14:16','1'),(57,'','','','2011-12-19','13:15:40','1'),(58,'','','','2011-12-19','13:18:01','1'),(59,'','','','2011-12-19','13:18:19','1'),(60,'','','','2011-12-19','13:18:48','1'),(61,'','','','2011-12-19','13:18:50','1'),(62,'','','','2011-12-19','13:19:05','1'),(63,'Karol','Rosiński','6c','2011-12-20','08:35:26','1'),(64,'','','','2011-12-21','10:30:10','1'),(65,'','','','2011-12-21','10:30:10','1'),(66,'','','','2011-12-21','10:30:10','1'),(67,'','','','2011-12-21','10:30:11','1'),(68,'','','','2011-12-21','10:30:20','1'),(69,'','','','2011-12-21','10:30:20','1'),(70,'','','','2011-12-21','10:30:20','1'),(71,'','','','2011-12-21','10:30:28','1'),(72,'','','','2011-12-21','10:30:28','1'),(73,'','','','2011-12-21','10:30:28','1'),(74,'','','','2011-12-21','10:30:35','1'),(75,'','','','2011-12-21','10:30:35','1'),(76,'','','','2011-12-21','10:30:35','1'),(77,'','','','2011-12-21','10:30:43','1'),(78,'','','','2011-12-21','10:30:43','1'),(79,'','','','2011-12-21','10:30:43','1');
/*!40000 ALTER TABLE `wizyta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-12-21 12:52:00
