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
-- Table structure for table `Tesis`
--

DROP TABLE IF EXISTS `Tesis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Tesis` (
  `IdTesis` int(9) NOT NULL AUTO_INCREMENT,
  `IdEstudianteEscuela` int(9) DEFAULT NULL,
  `IdTipoTesis` int(9) DEFAULT NULL,
  `IdEstado` int(9) DEFAULT NULL,
  `IdDictamen` int(9) DEFAULT NULL,
  `TituloTesis` varchar(255) DEFAULT NULL,
  `RutaArchivo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IdTesis`),
  KEY `IdEstudianteEscuela_idx` (`IdEstudianteEscuela`),
  KEY `IdTipoTesis_idx` (`IdTipoTesis`),
  KEY `IdEstado_idx` (`IdEstado`),
  KEY `IdDictamen_idx` (`IdDictamen`),
  CONSTRAINT `IdDictamen` FOREIGN KEY (`IdDictamen`) REFERENCES `Dictamen` (`IdDictamen`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `IdEstado` FOREIGN KEY (`IdEstado`) REFERENCES `Estado` (`IdEstado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `IdEstudianteEscuela` FOREIGN KEY (`IdEstudianteEscuela`) REFERENCES `EstudianteEscuela` (`IdEstudianteEscuela`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `IdTipoTesis` FOREIGN KEY (`IdTipoTesis`) REFERENCES `TipoTesis` (`IdTipoTesis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tesis`
--

LOCK TABLES `Tesis` WRITE;
/*!40000 ALTER TABLE `Tesis` DISABLE KEYS */;
INSERT INTO `Tesis` VALUES (1,1,1,1,5,'Titulo1',NULL),(2,1,1,1,5,'Titulo13',NULL),(3,2,2,1,5,'Titulo2',NULL),(4,3,3,1,5,'Titulo3',NULL),(5,4,1,1,5,'Titulo4',NULL),(6,5,2,1,5,'Titulo5',NULL),(7,6,1,1,5,'Titulo6',NULL),(8,7,3,1,5,'Titulo7','Directorio1/tesis (14).pdf'),(10,9,2,1,5,'Titulo9',NULL),(12,11,1,1,5,'Titulo11',NULL),(13,12,1,1,5,'Titulo12',NULL),(14,14,1,1,5,'Titulo14',NULL),(15,15,1,1,5,'Titulo15',NULL),(16,16,1,1,5,'Titulo16',NULL),(17,17,1,1,5,'Titulo17',NULL),(18,17,1,1,5,'Titulo18',NULL),(19,17,3,1,5,'Titulo19',NULL),(20,11,2,1,5,'Tile543r22','Directorio75/PT_E_TR018_OviedoYauri (1).pdf'),(22,7,2,1,2,'MiTesis','Directorio1/pis.txt'),(23,23,1,1,5,'Trazbilidad en los Juegos Educativos','Directorio5/PT_E_TR018_OviedoYauri (1).pdf'),(24,24,3,1,6,'Tile543r332','Directorio4/Tendencias de ecommerce en 2020_OviedoYauri.pdf');
/*!40000 ALTER TABLE `Tesis` ENABLE KEYS */;
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

-- Dump completed on 2020-08-11 17:53:18
