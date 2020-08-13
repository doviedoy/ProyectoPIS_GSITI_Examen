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
-- Table structure for table `ProcesoActividad`
--

DROP TABLE IF EXISTS `ProcesoActividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ProcesoActividad` (
  `IdProcesoActividad` int(11) NOT NULL AUTO_INCREMENT,
  `IdProceso` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdProcesoActividad`),
  KEY `IdProceso_idx` (`IdProceso`),
  CONSTRAINT `IdProceso` FOREIGN KEY (`IdProceso`) REFERENCES `Proceso` (`IdProceso`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProcesoActividad`
--

LOCK TABLES `ProcesoActividad` WRITE;
/*!40000 ALTER TABLE `ProcesoActividad` DISABLE KEYS */;
INSERT INTO `ProcesoActividad` VALUES (1,1,'bandejadeentrada.crear'),(2,1,'bandejadeentrada.editar'),(3,1,'bandejadeentrada.buscar'),(4,1,'bandejadeentrada.ver'),(5,1,'bandejadeentrada.eliminar'),(6,1,'bandejadeentrada.listar'),(7,1,'bandejadeentrada.Operador'),(8,1,'bandejadeentrada.Estudiante'),(9,1,'bandejadeentrada.Docente'),(10,2,'gestordeescuelas.listar'),(11,2,'gestordeescuelas.eliminar'),(12,2,'gestordeescuelas.crear'),(13,2,'gestordeescuelas.buscar'),(14,2,'gestordeescuelas.ver'),(15,2,'gestordeescuelas.editar'),(16,3,'mantenimientoderoles.listar'),(17,3,'mantenimientoderoles.crear'),(18,3,'mantenimientoderolesProceso.ver'),(19,3,'mantenimientoderolesProcesoActividad.ver'),(20,3,'mantenimientoderoles.eliminar'),(21,3,'mantenimientoderolesProcesoActividad.editar'),(22,4,'gestordeprocesos.listar'),(23,4,'gestordeprocesos.crear'),(24,4,'gestordeprocesosactividad.listar'),(25,4,'gestordeprocesosactividad.crear'),(26,5,'mantenimientodeprogramas.crear'),(27,5,'mantenimientodeprogramas.eliminar'),(28,6,'mantenimientodetesis.crear'),(29,6,'mantenimientodetesis.eliminar'),(30,7,'gestordetipodetesis.listar'),(31,7,'gestordetipodetesis.ver'),(32,7,'gestordetipodetesis.eliminar'),(33,7,'gestordetipodetesis.buscar'),(34,7,'gestordetipodetesis.editar'),(35,7,'gestordetipodetesis.crear'),(36,8,'mantenimientodedictamenes.listar'),(37,8,'mantenimientodedictamenes.ver'),(38,8,'mantenimientodedictamenes.eliminar'),(39,8,'mantenimientodedictamenes.buscar'),(40,8,'mantenimientodedictamenes.editar'),(41,8,'mantenimientodedictamenes.crear'),(42,9,'mantenimientodeobservacion.crear'),(43,9,'mantenimientodeobservacion.eliminar'),(44,10,'gestordefacultades.ver'),(45,10,'gestordefacultades.listar'),(46,10,'gestordefacultades.eliminar'),(47,10,'gestordefacultades.crear'),(48,10,'gestordefacultades.editar'),(49,10,'gestordefacultades.buscar'),(50,11,'gestordeestadodetesis.listar'),(51,11,'gestordeestadodetesis.ver'),(52,11,'gestordeestadodetesis.crear'),(53,11,'gestordeestadodetesis.eliminar'),(54,11,'gestordeestadodetesis.buscar'),(55,11,'gestordeestadodetesis.editar'),(56,12,'gestordetipodedocumento.crear'),(57,12,'gestordetipodedocumento.eliminar'),(58,12,'gestordetipodedocumento.ver'),(59,13,'gestordetipodejurado.crear'),(60,13,'gestordetipodejurado.eliminar'),(61,13,'gestordetipodejurado.ver'),(62,13,'gestordetipodejurado.listar');
/*!40000 ALTER TABLE `ProcesoActividad` ENABLE KEYS */;
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

-- Dump completed on 2020-08-11 17:53:05
