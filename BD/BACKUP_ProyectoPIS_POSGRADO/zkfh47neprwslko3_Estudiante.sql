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
-- Table structure for table `Estudiante`
--

DROP TABLE IF EXISTS `Estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Estudiante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) DEFAULT NULL,
  `idDNITipo` int(11) DEFAULT NULL,
  `DNI` varchar(20) DEFAULT NULL,
  `Correo` varchar(40) DEFAULT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `password` varchar(256) NOT NULL,
  `Operador` tinyint(1) NOT NULL DEFAULT '0',
  `Estudiante` tinyint(1) NOT NULL DEFAULT '0',
  `Docente` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `IdDNITipo_idx` (`idDNITipo`),
  CONSTRAINT `IdDNITipo` FOREIGN KEY (`idDNITipo`) REFERENCES `DNITipo` (`IdDNITipo`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Estudiante`
--

LOCK TABLES `Estudiante` WRITE;
/*!40000 ALTER TABLE `Estudiante` DISABLE KEYS */;
INSERT INTO `Estudiante` VALUES (1,'admnistrador',1,'11223344','administrador_582020@unsa.edu.pe','009580011','calle admnistrador','$2y$12$3JgVvUgXQbovc0KmL.qK/uJLTOX4DQsYA3S1msb2DvDXDhWmWMHfm',1,0,0),(2,'Diego Oviedo Yauri',1,'72126234','doviedoy@unsa.edu.pe','152874582','calle prueba1','$2y$10$j.lpI8cSzaE3nw6.aqDsmO7vaI9jCPIWlD8QjVT.YRMiFPney2xwu',1,1,1),(3,'Angel Choquehuanca Peraltilla',1,'11111111','achoquehuancaper@unsa.edu.pe','258475964','calle prueba2','$2y$10$d2hpwzjdJa5V63iVOyDkkeSiZZrzW6pSxVchTo3LI49SXc8uShoM.',1,0,0),(4,'Brigitte Vicla Quico',1,'22222222','bvilcaq@unsa.edu.pe','658457125','calle prueba 3','$2y$10$oBoPe2IeOUSeP/gi//Uh6eSaHPqPdKAmVI6.j6h07oLN11FquXQ1W',0,0,1),(5,'Audrey Tacca Barrantes',1,'33333333','ctacca@unsa.edu.pe','158215478','calle prueba 4','$2y$10$f0.cf793uboP78/xdGY8bOfMrNXW9qoef0jqZQU.TN2Qcg6T9A6l2',0,1,0),(6,'Diego Maraza Itomacedo',1,'44444444','dmaraza@unsa.edu.pe','158215479','calle prueba 5','$2y$10$nZrK.Kw41sZ9c.2ZG6oCp.4htZn/DTHu5e1TaxZw9W/nmROcHeNby',0,1,0),(7,'Waldir Ortiz Mamani',1,'55555555','wortizma@unsa.edu.pe','881514490','calle prueba6','$2y$10$M0YKHGogHEpOqjDerYN/zuPSrAhvV/d/Fs9HFiuJZs85fo4mAjuyy',0,1,0),(8,'Vicky Quispe Humalla',1,'66666666','vquispehu@unsa.edu.pe','659432929','calle prueba7','$2y$10$qYAHxR4aD0CYbJ6XrKmzVeivbM/oVwLMLu9Os/ldy4BKhvcC8b.7a',0,1,1),(9,'Rolando Leon Mamani',1,'77777777','rleonmam@unsa.edu.pe','589969458','calle prueba8','$2y$10$5a56o59GbRAr/S/6SvIQTOAL/XFjoNJF3kYr129l2rv19v9H/QM0W',0,0,1),(10,'Prueba Excel 1',1,'45721244','pruebaexcel1@gmail.com','759739109','calle prueba1','$2y$10$a3JUkfw7Xmbv1OCqTMffQ.ivuCuC/RXTM/gFXWyboTZFLLOVlenvy',0,0,1),(11,'Prueba Excel 2',1,'43622177','pruebaexcel2@gmail.com','258475964','calle prueba2','$2y$10$VXlIf4F4A7IasEKuLlZnce22XGrhSAg2yAkqkcv6vGk4knCJKyJPS',0,0,1),(12,'Prueba Excel 3',1,'47523211','pruebaexcel3@gmail.com','658457125','calle prueba 3','$2y$10$sN7mp1wZldHn10wBhJeO9e.NisZmYZP0oU0Pz6IH5tb12cimmZ7gC',0,0,1),(13,'Prueba Excel 4',1,'15824488','pruebaexcel4@gmail.com','158215478','calle prueba 4','$2y$10$mwVbezT/CMwp0CeA73mj5.H7Wx4KZdeWjpfFsUagNjPNrA9MQ2oQa',0,0,1),(14,'Prueba Excel 5',1,'16825467','pruebaexcel5@gmail.com','158215479','calle prueba 5','$2y$10$GC2kQX6nU57qxKlgzVtlVOH9iO4m2E95YhLqaJ7Rnp1QV8wl.KTbe',1,0,1),(15,'Prueba Excel 6',1,'34414418','pruebaexcel6@gmail.com','881514490','calle prueba6','$2y$10$msXEswEW/OY87mPVKx.Cfu2VvOFhE04fR23w1eWvQkUxqjjCB/VJq',1,1,1),(16,'Prueba Excel 7',1,'95145834','pruebaexcel7@gmail.com','659432929','calle prueba7','$2y$10$LkCGwycQupGvIgTl.rxtkeDAi5T/dI0prLyZKc1uyUQG6YxHasgl2',1,0,0);
/*!40000 ALTER TABLE `Estudiante` ENABLE KEYS */;
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

-- Dump completed on 2020-08-11 17:52:29
