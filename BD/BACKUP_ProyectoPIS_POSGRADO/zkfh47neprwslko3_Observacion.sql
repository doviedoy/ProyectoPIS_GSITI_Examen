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
-- Table structure for table `Observacion`
--

DROP TABLE IF EXISTS `Observacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Observacion` (
  `IdObservacion` int(11) NOT NULL AUTO_INCREMENT,
  `IdTesis` int(11) NOT NULL,
  `IdJurado` int(11) NOT NULL,
  `TipoObservacion` tinyint(1) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Correccion` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdObservacion`),
  KEY `RelaTesis_idx` (`IdTesis`),
  KEY `RelaJurado_idx` (`IdJurado`),
  CONSTRAINT `RelajJurado` FOREIGN KEY (`IdJurado`) REFERENCES `Jurado` (`IdJurado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `RelatTesis` FOREIGN KEY (`IdTesis`) REFERENCES `Tesis` (`IdTesis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Observacion`
--

LOCK TABLES `Observacion` WRITE;
/*!40000 ALTER TABLE `Observacion` DISABLE KEYS */;
INSERT INTO `Observacion` VALUES (1,7,1,1,'prueba observacion1','2020-06-01 00:00:00',0),(2,7,2,2,'prueba observacion2','2020-06-01 00:00:01',0),(4,8,4,2,'prueba observacion4','2020-06-01 00:00:03',0),(7,10,7,1,'prueba observacion7','2020-06-01 00:00:06',0),(8,10,8,2,'prueba observacion8','2020-06-01 00:00:07',0),(9,10,9,1,'prueba observacion9','2020-06-01 00:00:08',0),(12,12,12,1,'prueba observacion12','2020-06-01 00:00:11',0),(13,13,1,1,'prueba observacion13','2020-06-01 00:00:12',0),(14,14,13,1,'prueba observacion14','2020-06-01 00:00:13',0),(15,15,14,2,'prueba observacion15','2020-06-01 00:00:14',0),(16,16,16,1,'prueba observacion16','2020-06-01 00:00:15',0),(17,16,17,1,'prueba observacion17','2020-06-01 00:00:16',0),(18,17,17,2,'prueba observacion18','2020-06-01 00:00:17',0),(19,18,18,1,'prueba observacion19','2020-06-01 00:00:18',0),(21,8,3,0,'Definir mejor la hipótesis','2020-09-11 15:54:13',0),(22,23,23,0,'Definir la problemática','2020-08-11 16:05:18',0);
/*!40000 ALTER TABLE `Observacion` ENABLE KEYS */;
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

-- Dump completed on 2020-08-11 17:52:33
