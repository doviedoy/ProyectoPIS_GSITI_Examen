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
-- Table structure for table `RolProceso`
--

DROP TABLE IF EXISTS `RolProceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `RolProceso` (
  `IdRolProceso` int(11) NOT NULL AUTO_INCREMENT,
  `IdRol` int(11) NOT NULL,
  `IdProceso` int(11) NOT NULL,
  PRIMARY KEY (`IdRolProceso`),
  KEY `RelacionRol_idx` (`IdRol`),
  KEY `RelacionProceso_idx` (`IdProceso`),
  CONSTRAINT `RelacionProceso` FOREIGN KEY (`IdProceso`) REFERENCES `Proceso` (`IdProceso`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `RelacionRol` FOREIGN KEY (`IdRol`) REFERENCES `Rol` (`IdRol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RolProceso`
--

LOCK TABLES `RolProceso` WRITE;
/*!40000 ALTER TABLE `RolProceso` DISABLE KEYS */;
INSERT INTO `RolProceso` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(6,1,6),(7,1,7),(8,1,8),(9,1,9),(10,1,10),(11,1,11),(12,1,12),(13,1,13),(14,2,1),(15,2,2),(16,2,3),(17,2,4),(18,2,5),(19,2,6),(20,2,7),(21,2,8),(22,2,9),(23,2,10),(24,2,11),(25,2,12),(26,2,13),(27,3,1),(28,3,5),(29,3,9),(30,4,1),(31,4,5),(32,4,6),(33,3,2),(34,4,2),(35,4,7),(36,4,11),(37,4,8);
/*!40000 ALTER TABLE `RolProceso` ENABLE KEYS */;
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

-- Dump completed on 2020-08-11 17:52:45
