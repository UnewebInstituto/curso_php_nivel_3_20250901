-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: bd_carrito_henry
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agregar_carritos`
--

DROP TABLE IF EXISTS `agregar_carritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agregar_carritos` (
  `session_id` varchar(26) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agregar_carritos`
--

LOCK TABLES `agregar_carritos` WRITE;
/*!40000 ALTER TABLE `agregar_carritos` DISABLE KEYS */;
INSERT INTO `agregar_carritos` VALUES ('dlntqe7l6s4vrckbpur2mbbm40',2),('dlntqe7l6s4vrckbpur2mbbm40',1),('dlntqe7l6s4vrckbpur2mbbm40',3),('r35e60l4fn8gcqnbp8da5a2m2i',2),('r35e60l4fn8gcqnbp8da5a2m2i',2),('r35e60l4fn8gcqnbp8da5a2m2i',2),('r35e60l4fn8gcqnbp8da5a2m2i',3),('r35e60l4fn8gcqnbp8da5a2m2i',3),('6fcrabinqs7mpu1ch81rr5q53d',1),('6fcrabinqs7mpu1ch81rr5q53d',2),('6fcrabinqs7mpu1ch81rr5q53d',3),('6fcrabinqs7mpu1ch81rr5q53d',5),('6fcrabinqs7mpu1ch81rr5q53d',4),('6fcrabinqs7mpu1ch81rr5q53d',1);
/*!40000 ALTER TABLE `agregar_carritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compras` (
  `usuario_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(10) unsigned DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  KEY `usuario_id` (`usuario_id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES (2,1,1,'2025-09-10 10:28:45'),(2,2,2,'2025-09-10 10:28:45'),(2,3,2,'2025-09-10 10:28:45'),(2,5,1,'2025-09-10 10:28:45'),(2,1,2,'2025-09-10 10:54:20'),(2,5,3,'2025-09-10 10:54:20');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `nombre_archivo` text DEFAULT NULL,
  `precio` decimal(13,2) DEFAULT NULL,
  `existencia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Balón de basquet','Marca Spalding','./productos/1.jpg',50.00,6),(2,'Guante de uso genérico','Marca Spalding','./productos/2.jpg',75.00,12),(3,'Muñequera para damas','Marca Arena','./productos/3.jpg',30.00,3),(4,'Pesas','Pesas ligeras para calentamiento.','./productos/4.jpg',90.00,12),(5,'Balón de futbol','Marca Tamanaco Número 4','./productos/5.jpg',45.00,8);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `reporte_de_ventas`
--

DROP TABLE IF EXISTS `reporte_de_ventas`;
/*!50001 DROP VIEW IF EXISTS `reporte_de_ventas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `reporte_de_ventas` AS SELECT
 1 AS `nombre_apellido`,
  1 AS `cantidad`,
  1 AS `total`,
  1 AS `fecha_hora` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(10) DEFAULT NULL,
  `nombre_apellido` varchar(100) DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `clave` varchar(32) DEFAULT NULL,
  `tipo_usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`),
  UNIQUE KEY `correo_electronico` (`correo_electronico`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'V12345678','HENRY DUQUE','henry@uneweb.edu.ve','bb58fd8dcab41e78d93c98a3204d438c','ADMINISTRADOR'),(2,'V1234','Henry Duque','hduqueuneweb@gmail.com','d5df2f60445674b3127d6732805b1bc4','VISITANTE');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `reporte_de_ventas`
--

/*!50001 DROP VIEW IF EXISTS `reporte_de_ventas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `reporte_de_ventas` AS select `a`.`nombre_apellido` AS `nombre_apellido`,sum(`c`.`cantidad`) AS `cantidad`,sum(`c`.`cantidad` * `b`.`precio`) AS `total`,`c`.`fecha_hora` AS `fecha_hora` from ((`usuarios` `a` join `productos` `b`) join `compras` `c`) where `c`.`usuario_id` = `a`.`id` and `c`.`producto_id` = `b`.`id` group by `c`.`fecha_hora` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-10 11:05:16
