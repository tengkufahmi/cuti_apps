-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: srv68.niagahoster.com    Database: u3606008_cuti_apps
-- ------------------------------------------------------
-- Server version	5.5.5-10.6.16-MariaDB-cll-lve

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
  `id_jenis_cuti` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cuti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuti`
--

LOCK TABLES `cuti` WRITE;
/*!40000 ALTER TABLE `cuti` DISABLE KEYS */;
INSERT INTO `cuti` VALUES ('cuti-11a8e','ef56a77b9a5c9766b4d47e3a51c5b0de','2024-02-25','2024-02-22','0024-02-25',3,'IZIN','0',NULL,1),('cuti-165cd','ea1653ef395d9ca51f61dccdd18627ba','2024-01-21','2024-01-21','2024-01-30',1,'Sakit','0',NULL,2),('cuti-1a078','64450f40ac6bd33c60ce9adaffa4f954','2024-02-25','2024-02-24','2024-02-27',3,'Bepergian','0',NULL,1),('cuti-34bf1','53ff0008d9cc8394a53bcc1bb3d06fe6','2024-02-25','2024-02-25','2024-02-26',3,'Berpergian','0',NULL,1),('cuti-5a928','464c95c8afbc45f5aa6c36ccb61717e2','2024-02-25','2024-02-27','2024-02-29',2,'Acara Keluarga','0',NULL,1),('cuti-6a57d','daf27dd554cccbed387b8076f46220d6','2024-01-22','2024-01-23','2024-01-24',2,'Perjalanan','0',NULL,1),('cuti-77738','9c77a9b73e01dea293efa6236e7ff937','2024-02-25','2024-02-25','2024-02-28',2,'Tidak Masuk','0',NULL,1),('cuti-8bceb','e47a007490462d887ec33085e2ff1a60','2024-02-23','2024-02-23','2024-02-25',2,'izin (sakit)','0',NULL,2),('cuti-92778','ef56a77b9a5c9766b4d47e3a51c5b0de','2024-02-25','2024-02-26','2024-02-28',2,'Izin','0',NULL,1),('cuti-9af7d','c24f05e359b5abf5bfa0de9e68898b0f','2024-02-25','2024-02-26','2024-02-28',2,'Izin ( Rapat )','0',NULL,1),('cuti-9ec26','b2f4b69a7a3503a5cd5eac7b0b1811df','2024-02-25','2024-02-25','2024-02-27',2,'Izin ( Rapat )','0',NULL,1),('cuti-9ee7a','ea5f72c59bbb82d3f1054bb6de426ac2','2024-02-25','2024-02-25','2024-02-29',2,'Tidak Masuk','0',NULL,1),('cuti-b0828','e47a007490462d887ec33085e2ff1a60','2024-02-28','2024-02-28','2024-03-01',2,'Pulang kampung ','0',NULL,1),('cuti-b2792','e47a007490462d887ec33085e2ff1a60','2024-02-22','2024-02-22','2024-02-28',2,'Bepergian','0',NULL,1),('cuti-b4064','56c8715b63c261a4f9b60e14086f14d3','2024-01-21','2024-01-21','2024-01-24',3,'izin','0',NULL,1),('cuti-bf6a5','daf27dd554cccbed387b8076f46220d6','2024-01-21','2024-01-21','2024-01-24',2,'izin','1','2024-02-21',1),('cuti-c9109','64450f40ac6bd33c60ce9adaffa4f954','2024-02-25','2024-02-25','2024-02-28',2,'Izin (tidak masuk) ','0',NULL,1),('cuti-e016d','048ad344e0ad5d5a651b66d7e781e008','2024-02-25','2024-02-25','2024-02-26',3,'Berpergian ','0',NULL,1);
/*!40000 ALTER TABLE `cuti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_cuti`
--

DROP TABLE IF EXISTS `jenis_cuti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_cuti` (
  `id_jenis_cuti` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_cuti` varchar(100) DEFAULT NULL,
  `batasan_hari` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_cuti`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_cuti`
--

LOCK TABLES `jenis_cuti` WRITE;
/*!40000 ALTER TABLE `jenis_cuti` DISABLE KEYS */;
INSERT INTO `jenis_cuti` VALUES (1,'Cuti Bepergian','3'),(2,'Cuti Sakit','7'),(3,'Cuti Penting','30'),(4,'Cuti Hamil','120');
/*!40000 ALTER TABLE `jenis_cuti` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('048ad344e0ad5d5a651b66d7e781e008','SUBHAN HARYONO','SUBHAN HARYONO',2,'048ad344e0ad5d5a651b66d7e781e008'),('124f697e826c62fb50321eecff6e444f','FEFTAMAS ARIFANDI','FEFTAMAS ARIFANDI',2,'124f697e826c62fb50321eecff6e444f'),('2585f445c1861c6de3e03d27ba79f724','SULISTIYO WARDONO','SULISTIYO WARDONO',2,'2585f445c1861c6de3e03d27ba79f724'),('3b8fefaf809eaa3936cbb21c88a45fbd','SARIFATUL IMANA','SARIFATUL IMANA',2,'3b8fefaf809eaa3936cbb21c88a45fbd'),('464c95c8afbc45f5aa6c36ccb61717e2','RASIDI IMRON','RASIDI IMRON',2,'464c95c8afbc45f5aa6c36ccb61717e2'),('4869f79a42ae6f7f37dc9dac51136fd2','ABDUL WAHID','ABDUL WAHID',2,'4869f79a42ae6f7f37dc9dac51136fd2'),('53ff0008d9cc8394a53bcc1bb3d06fe6','NURUL TRIYADI','NURUL TRIYADI',2,'53ff0008d9cc8394a53bcc1bb3d06fe6'),('64450f40ac6bd33c60ce9adaffa4f954','MALIK FAJAR','MALIK FAJAR',2,'64450f40ac6bd33c60ce9adaffa4f954'),('6ca0b56c3e0e27b9d09d4f26ab37b7f8','FILIA HANIFA SUSANTI','FILIA HANIFA SUSANTI',2,'6ca0b56c3e0e27b9d09d4f26ab37b7f8'),('717e383343995ffe3ac78603c5996364','MISTAHAR','MISTAHAR',2,'717e383343995ffe3ac78603c5996364'),('76700c04553953ce596244fa8732441b','RUSLI','RUSLI',2,'76700c04553953ce596244fa8732441b'),('8500fef334b4209825cb52a6107011ce','reza','rezafm16',1,'8500fef334b4209825cb52a6107011ce'),('9c77a9b73e01dea293efa6236e7ff937','LUKMAN HAKIM','LUKMAN HAKIM',2,'9c77a9b73e01dea293efa6236e7ff937'),('9ff4adc1cb09c0580f6717f049088be7','BUKHORI','BUKHORI',2,'9ff4adc1cb09c0580f6717f049088be7'),('a5cd52a426f56a1c35b00d50ff3c8879','operator','operator',1,'a5cd52a426f56a1c35b00d50ff3c8879'),('b2f4b69a7a3503a5cd5eac7b0b1811df','MUHAMMAD FATHONI','MUHAMMAD FATHONI',2,'b2f4b69a7a3503a5cd5eac7b0b1811df'),('c24f05e359b5abf5bfa0de9e68898b0f','MUSAWIR','MUSAWIR',2,'c24f05e359b5abf5bfa0de9e68898b0f'),('cf602046afcb4187198f7aad3ab7a478','HASANTOSO','HASANTOSO',2,'cf602046afcb4187198f7aad3ab7a478'),('e47a007490462d887ec33085e2ff1a60','Hidayat','Hidayat',2,'e47a007490462d887ec33085e2ff1a60'),('ea5f72c59bbb82d3f1054bb6de426ac2','SAIFUL HADI','SAIFUL HADI',2,'ea5f72c59bbb82d3f1054bb6de426ac2'),('ef56a77b9a5c9766b4d47e3a51c5b0de','MUBTADI','MUBTADI',2,'ef56a77b9a5c9766b4d47e3a51c5b0de'),('f6fdffe48c908deb0f4c3bd36c032e72','admin','admin',1,'f6fdffe48c908deb0f4c3bd36c032e72');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_detail`
--

LOCK TABLES `user_detail` WRITE;
/*!40000 ALTER TABLE `user_detail` DISABLE KEYS */;
INSERT INTO `user_detail` VALUES ('048ad344e0ad5d5a651b66d7e781e008','SUBHAN HARYONO',1,'0','0'),('124f697e826c62fb50321eecff6e444f','FEFTAMAS ARIFANDI',1,'082139205253','Kp. Krajan'),('2585f445c1861c6de3e03d27ba79f724','SULISTIYO WARDONO',1,'085330097630','Kp. Krastal'),('3b8fefaf809eaa3936cbb21c88a45fbd','SARIFATUL IMANA',2,'082244259494','Kp. Krajan'),('464c95c8afbc45f5aa6c36ccb61717e2','RASIDI IMRON',1,'085334849027','Kp. Dauh'),('4869f79a42ae6f7f37dc9dac51136fd2','ABDUL WAHID',1,'082338012960','Kp. Setimbo'),('53ff0008d9cc8394a53bcc1bb3d06fe6','NURUL TRIYADI',1,'0','0'),('54ee609df6c96476cfe967a50af86545','Hidayat',1,'081256781298','Krastal'),('64450f40ac6bd33c60ce9adaffa4f954','MALIK FAJAR',1,'085220598864','Kp. Krastal'),('6ca0b56c3e0e27b9d09d4f26ab37b7f8','FILIA HANIFA SUSANTI',2,'0','0'),('717e383343995ffe3ac78603c5996364','MISTAHAR',1,'085221224360','Kp. Secangan'),('76700c04553953ce596244fa8732441b','RUSLI',1,'085330160647','Kp. Nogosromo'),('8500fef334b4209825cb52a6107011ce',NULL,NULL,NULL,NULL),('9c77a9b73e01dea293efa6236e7ff937','LUKMAN HAKIM',1,'082330521581','Kp. Dauh'),('9ff4adc1cb09c0580f6717f049088be7','BUKHORI',1,'085204868015','Kp. Secangan'),('a5cd52a426f56a1c35b00d50ff3c8879',NULL,NULL,NULL,NULL),('b2f4b69a7a3503a5cd5eac7b0b1811df','MUHAMMAD FATHONI',1,'082338565616','Kp. Setimbo'),('c24f05e359b5abf5bfa0de9e68898b0f','MUSAWIR',1,'081330829288','Kp. Setimbo'),('cf602046afcb4187198f7aad3ab7a478','HASANTOSO',1,'085336011163','Kp. Krajan'),('e47a007490462d887ec33085e2ff1a60','Nurul Hidayatullah',1,'081249381057','Kp. Krajan'),('ea5f72c59bbb82d3f1054bb6de426ac2','SAIFUL HADI',1,'085330235050','Kp. Krajan'),('ef56a77b9a5c9766b4d47e3a51c5b0de','MUBTADI',1,'082245454440','Kp. Manding'),('f6fdffe48c908deb0f4c3bd36c032e72',NULL,NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
-- Dumping routines for database 'u3606008_cuti_apps'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-28 22:07:40
