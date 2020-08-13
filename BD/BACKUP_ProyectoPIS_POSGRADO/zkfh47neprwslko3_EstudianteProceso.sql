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
-- Table structure for table `EstudianteProceso`
--

DROP TABLE IF EXISTS `EstudianteProceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `EstudianteProceso` (
  `IdEstudianteProceso` int(11) NOT NULL AUTO_INCREMENT,
  `IdEstudiante` int(11) DEFAULT NULL,
  `IdProcesoActividad` int(11) DEFAULT NULL,
  `Permiso` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IdEstudianteProceso`),
  KEY `IdEstudiante_idx` (`IdEstudiante`),
  KEY `ProcesoActividad_idx` (`IdProcesoActividad`),
  CONSTRAINT `IdEstudiante` FOREIGN KEY (`IdEstudiante`) REFERENCES `Estudiante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ProcesoActividad` FOREIGN KEY (`IdProcesoActividad`) REFERENCES `ProcesoActividad` (`IdProcesoActividad`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=316 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EstudianteProceso`
--

LOCK TABLES `EstudianteProceso` WRITE;
/*!40000 ALTER TABLE `EstudianteProceso` DISABLE KEYS */;
INSERT INTO `EstudianteProceso` VALUES (1,1,1,1),(2,1,2,1),(3,1,3,1),(4,1,4,1),(5,1,5,1),(6,1,6,1),(7,1,7,1),(8,1,8,1),(9,1,9,1),(10,1,10,1),(11,1,11,1),(12,1,12,1),(13,1,13,1),(14,1,14,1),(15,1,15,1),(16,1,16,1),(17,1,17,1),(18,1,18,1),(19,1,19,1),(20,1,20,1),(21,1,21,1),(22,1,22,1),(23,1,23,1),(24,1,24,1),(25,1,25,1),(26,1,26,1),(27,1,27,1),(28,1,28,1),(29,1,29,1),(30,1,30,1),(31,1,31,1),(32,1,32,1),(33,1,33,1),(34,1,34,1),(35,1,35,1),(36,1,36,1),(37,1,37,1),(38,1,38,1),(39,1,39,1),(40,1,40,1),(41,1,41,1),(42,1,42,1),(43,1,43,1),(44,1,44,1),(45,1,45,1),(46,1,46,1),(47,1,47,1),(48,1,48,1),(49,1,49,1),(50,1,50,1),(51,1,51,1),(52,1,52,1),(53,1,53,1),(54,1,54,1),(55,1,55,1),(56,1,56,1),(57,1,57,1),(58,1,58,1),(59,1,59,1),(60,1,60,1),(61,1,61,1),(62,1,62,1),(63,2,1,1),(64,2,2,1),(65,2,3,1),(66,2,4,1),(67,2,5,1),(68,2,6,1),(69,2,7,1),(70,2,8,1),(71,2,9,1),(72,2,10,1),(73,2,11,1),(74,2,12,1),(75,2,13,1),(76,2,14,1),(77,2,15,1),(78,2,16,1),(79,2,17,1),(80,2,18,1),(81,2,19,1),(82,2,20,1),(83,2,21,1),(84,2,22,1),(85,2,23,1),(86,2,24,1),(87,2,25,1),(88,2,26,1),(89,2,27,1),(90,2,28,1),(91,2,29,1),(92,2,30,1),(93,2,31,1),(94,2,32,1),(95,2,33,1),(96,2,34,1),(97,2,35,1),(98,2,36,1),(99,2,37,1),(100,2,38,1),(101,2,39,1),(102,2,40,1),(103,2,41,1),(104,2,42,1),(105,2,43,1),(106,2,44,1),(107,2,45,1),(108,2,46,1),(109,2,47,1),(110,2,48,1),(111,2,49,1),(112,2,50,1),(113,2,51,1),(114,2,52,1),(115,2,53,1),(116,2,54,1),(117,2,55,1),(118,2,56,1),(119,2,57,1),(120,2,58,1),(121,2,59,1),(122,2,60,1),(123,2,61,1),(124,2,62,1),(125,3,1,1),(126,3,2,1),(127,3,3,1),(128,3,4,1),(129,3,5,1),(130,3,6,1),(131,3,7,1),(132,3,8,1),(133,3,9,1),(134,3,10,1),(135,3,11,1),(136,3,12,1),(137,3,13,1),(138,3,14,1),(139,3,15,1),(140,3,16,1),(141,3,17,1),(142,3,18,1),(143,3,19,1),(144,3,20,1),(145,3,21,1),(146,3,22,1),(147,3,23,1),(148,3,24,1),(149,3,25,1),(150,3,26,1),(151,3,27,1),(152,3,28,1),(153,3,29,1),(154,3,30,1),(155,3,31,1),(156,3,32,1),(157,3,33,1),(158,3,34,1),(159,3,35,1),(160,3,36,1),(161,3,37,1),(162,3,38,1),(163,3,39,1),(164,3,40,1),(165,3,41,1),(166,3,42,1),(167,3,43,1),(168,3,44,1),(169,3,45,1),(170,3,46,1),(171,3,47,1),(172,3,48,1),(173,3,49,1),(174,3,50,1),(175,3,51,1),(176,3,52,1),(177,3,53,1),(178,3,54,1),(179,3,55,1),(180,3,56,1),(181,3,57,1),(182,3,58,1),(183,3,59,1),(184,3,60,1),(185,3,61,1),(186,3,62,1),(187,4,6,1),(188,4,26,1),(189,4,42,1),(190,4,43,1),(191,4,10,1),(192,5,6,1),(193,5,26,1),(194,5,28,1),(195,5,10,1),(196,5,30,1),(197,5,50,1),(198,5,36,1),(199,6,6,1),(200,6,26,1),(201,6,28,1),(202,6,10,1),(203,6,30,1),(204,6,50,1),(205,6,36,1),(206,7,6,1),(207,7,26,1),(208,7,28,1),(209,7,10,1),(210,7,30,1),(211,7,50,1),(212,7,36,1),(213,8,6,1),(214,8,26,1),(215,8,42,1),(216,8,43,1),(217,8,28,1),(218,8,10,1),(219,8,30,1),(220,8,50,1),(221,8,36,1),(222,9,6,1),(223,9,26,1),(224,9,42,1),(225,9,43,1),(226,9,10,1),(227,10,6,1),(228,10,26,1),(229,10,42,1),(230,10,43,1),(231,10,10,1),(232,11,6,1),(233,11,26,1),(234,11,42,1),(235,11,43,1),(236,11,10,1),(237,12,6,1),(238,12,26,1),(239,12,42,1),(240,12,43,1),(241,12,10,1),(242,13,6,1),(243,13,26,1),(244,13,42,1),(245,13,43,1),(246,13,10,1);
/*!40000 ALTER TABLE `EstudianteProceso` ENABLE KEYS */;
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

-- Dump completed on 2020-08-11 17:53:22
