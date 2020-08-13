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
-- Table structure for table `EstudianteEscuela`
--

DROP TABLE IF EXISTS `EstudianteEscuela`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `EstudianteEscuela` (
  `IdEstudianteEscuela` int(11) NOT NULL AUTO_INCREMENT,
  `IdEscuela` int(11) NOT NULL,
  `IdEstudiante` int(11) NOT NULL,
  PRIMARY KEY (`IdEstudianteEscuela`),
  KEY `RelacionEscuela_idx` (`IdEscuela`),
  KEY `RelacionEstudiante_idx` (`IdEstudiante`),
  CONSTRAINT `RelacionEscuela` FOREIGN KEY (`IdEscuela`) REFERENCES `Escuela` (`idEscuela`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `RelacionEstudiante` FOREIGN KEY (`IdEstudiante`) REFERENCES `Estudiante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EstudianteEscuela`
--

LOCK TABLES `EstudianteEscuela` WRITE;
/*!40000 ALTER TABLE `EstudianteEscuela` DISABLE KEYS */;
INSERT INTO `EstudianteEscuela` VALUES (1,1,2),(2,37,2),(3,1,3),(4,3,3),(5,1,4),(6,70,4),(7,1,5),(9,1,6),(11,75,6),(12,1,7),(13,1,8),(14,72,8),(15,1,9),(16,73,9),(17,54,10),(19,4,6),(21,7,6),(23,5,5),(24,4,5),(25,17,5);
/*!40000 ALTER TABLE `EstudianteEscuela` ENABLE KEYS */;
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

-- Dump completed on 2020-08-11 17:52:41
