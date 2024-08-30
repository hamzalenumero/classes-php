-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: classes
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs`
--

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` VALUES (20,'nicolas','$2y$10$4PSb5OfsiolYbM60JYBGIO/zFeLM1bCxUdO6tl9dK8RtgjjdPkehS','nicolas.degabriel@laplateforme.io','nicolas','degabriel'),(21,'alister','$2y$10$KlJmsFkzZuBy1L0mPsOcKuHUq0AwyyeG39zpRgH2ocUNBkXfYB49q','alistar@live.fr','alistar','crowley'),(22,'mikasa','$2y$10$1PB0pE2nEYSqWdAeQWpK6O3b7u7tj1VS4DDxnx.D7wPg3CErbOqgq','mikasa@laplateforme.io','mikasa','sukasa'),(24,'testeur','$2y$10$Zk4NIbcOG38XuutSPIMU1ew6uZMU89WBYkiAnLTHuYV3TQhhj4QCC','newemail@live.fr','youssef','gho'),(25,'youssef','$2y$10$6szXfHhOBBEfaW0qJBp3jO0sj1qBiNUv5lVArMp2kM/17snM7XWnq','youssef@live.fr','youssef','ghollamallah'),(26,'Albator','$2y$10$Vhs00Jo6Gku7SwVNWhw3Ve3G.dLWHB3KD7K.ISjX3mmHTHm4orpe6','albator@gmail.fr','albator','captain');
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-29 13:16:33
