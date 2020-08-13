-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: e11wl4mksauxgu1w.cbetxkdyhwsb.us-east-1.rds.amazonaws.com    Database: zkfh47neprwslko3
-- ------------------------------------------------------
-- Server version	5.7.23-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '';

--
-- Table structure for table `Jurado`
--

DROP TABLE IF EXISTS `Jurado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Jurado` (
  `IdJurado` int(11) NOT NULL AUTO_INCREMENT,
  `IdTesis` int(11) NOT NULL,
  `IdEstudiante` int(11) NOT NULL,
  `IdTipoJurado` int(11) NOT NULL,
  PRIMARY KEY (`IdJurado`),
  KEY `RelacionTesis_idx` (`IdTesis`),
  KEY `IdEstudiante_idx` (`IdEstudiante`),
  KEY `RelacionTipoJurado_idx` (`IdTipoJurado`),
  CONSTRAINT `RelacionEst` FOREIGN KEY (`IdEstudiante`) REFERENCES `Estudiante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `RelacionTes` FOREIGN KEY (`IdTesis`) REFERENCES `Tesis` (`IdTesis`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `RelacionTiJurado` FOREIGN KEY (`IdTipoJurado`) REFERENCES `TipoJurado` (`IdTipoJurado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Jurado`
--

LOCK TABLES `Jurado` WRITE;
/*!40000 ALTER TABLE `Jurado` DISABLE KEYS */;
INSERT INTO `Jurado` VALUES (1,7,9,1),(2,7,4,2),(3,8,4,1),(4,8,9,2),(7,10,4,1),(8,10,9,2),(9,10,8,3),(12,12,4,1),(13,12,9,2),(14,13,4,1),(15,15,9,2),(16,16,15,1),(17,17,14,2),(18,18,16,1),(19,19,16,1),(20,20,4,1),(22,22,2,1),(23,23,4,1),(24,24,4,1);
/*!40000 ALTER TABLE `Jurado` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-11 17:52:25
