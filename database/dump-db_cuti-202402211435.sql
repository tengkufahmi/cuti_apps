-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: db_cuti
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

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
-- Table structure for table `cuti`
--

DROP TABLE IF EXISTS `cuti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuti` (
  `id_cuti` varchar(30) NOT NULL,
  `id_user` varchar(256) NOT NULL,
  `tgl_diajukan` date NOT NULL,
  `mulai` date NOT NULL,
  `berakhir` date NOT NULL,
  `id_status_cuti` int(12) NOT NULL,
  `perihal_cuti` varchar(100) NOT NULL,
  `deleted` varchar(1) NOT NULL DEFAULT '0',
  `tgl_dihapus` date DEFAULT NULL,
  PRIMARY KEY (`id_cuti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuti`
--

LOCK TABLES `cuti` WRITE;
/*!40000 ALTER TABLE `cuti` DISABLE KEYS */;
INSERT INTO `cuti` VALUES ('cuti-165cd','ea1653ef395d9ca51f61dccdd18627ba','2024-01-21','2024-01-21','2024-01-30',1,'Sakit','0',NULL),('cuti-6a57d','daf27dd554cccbed387b8076f46220d6','2024-01-22','2024-01-23','2024-01-24',2,'Perjalanan','0',NULL),('cuti-b4064','56c8715b63c261a4f9b60e14086f14d3','2024-01-21','2024-01-21','2024-01-24',3,'izin','0',NULL),('cuti-bf6a5','daf27dd554cccbed387b8076f46220d6','2024-01-21','2024-01-21','2024-01-24',2,'izin','1','2024-02-21');
/*!40000 ALTER TABLE `cuti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_kelamin`
--

DROP TABLE IF EXISTS `jenis_kelamin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_kelamin` (
  `id_jenis_kelamin` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_kelamin` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jenis_kelamin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_kelamin`
--

LOCK TABLES `jenis_kelamin` WRITE;
/*!40000 ALTER TABLE `jenis_kelamin` DISABLE KEYS */;
INSERT INTO `jenis_kelamin` VALUES (1,'Laki-Laki'),(2,'Perempuan');
/*!40000 ALTER TABLE `jenis_kelamin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_cuti`
--

DROP TABLE IF EXISTS `status_cuti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_cuti` (
  `id_status_cuti` int(11) NOT NULL AUTO_INCREMENT,
  `status_cuti` varchar(50) NOT NULL,
  PRIMARY KEY (`id_status_cuti`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_cuti`
--

LOCK TABLES `status_cuti` WRITE;
/*!40000 ALTER TABLE `status_cuti` DISABLE KEYS */;
INSERT INTO `status_cuti` VALUES (1,'Menunggu Konfirmasi'),(2,'Izin Cuti Diterima'),(3,'Izin Cuti Ditolak');
/*!40000 ALTER TABLE `status_cuti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id_user` varchar(256) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_user_detail` varchar(256) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('daf27dd554cccbed387b8076f46220d6','karyawan','karyawan',2,'daf27dd554cccbed387b8076f46220d6'),('f6fdffe48c908deb0f4c3bd36c032e72','admin','admin',1,'f6fdffe48c908deb0f4c3bd36c032e72');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_detail`
--

DROP TABLE IF EXISTS `user_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_detail` (
  `id_user_detail` varchar(256) NOT NULL,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `id_jenis_kelamin` int(12) DEFAULT NULL,
  `no_telp` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  PRIMARY KEY (`id_user_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_detail`
--

LOCK TABLES `user_detail` WRITE;
/*!40000 ALTER TABLE `user_detail` DISABLE KEYS */;
INSERT INTO `user_detail` VALUES ('54ee609df6c96476cfe967a50af86545','Hidayat',1,'081256781298','Krastal'),('daf27dd554cccbed387b8076f46220d6','Joko Widodo',1,'089213425321','krajan'),('f6fdffe48c908deb0f4c3bd36c032e72',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_level`
--

DROP TABLE IF EXISTS `user_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL AUTO_INCREMENT,
  `user_level` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_level`
--

LOCK TABLES `user_level` WRITE;
/*!40000 ALTER TABLE `user_level` DISABLE KEYS */;
INSERT INTO `user_level` VALUES (1,'admin'),(2,'karyawan');
/*!40000 ALTER TABLE `user_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_cuti'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-21 14:35:05
