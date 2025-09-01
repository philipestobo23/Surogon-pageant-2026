CREATE DATABASE  IF NOT EXISTS `surigay_2025` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `surigay_2025`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: surigay_2025
-- ------------------------------------------------------
-- Server version	8.0.36

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

--
-- Table structure for table `coronation`
--

DROP TABLE IF EXISTS `coronation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coronation` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contestant_number` int NOT NULL,
  `contestant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Judge1_swimsuit` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge1_swimsuit_ranking` int NOT NULL DEFAULT '0',
  `Judge2_swimsuit` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge2_swimsuit_ranking` int NOT NULL DEFAULT '0',
  `Judge3_swimsuit` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge3_swimsuit_ranking` int NOT NULL DEFAULT '0',
  `Judge4_swimsuit` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge4_swimsuit_ranking` int NOT NULL DEFAULT '0',
  `Judge5_swimsuit` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge5_swimsuit_ranking` int NOT NULL DEFAULT '0',
  `overall_ranking_swimsuit` int NOT NULL DEFAULT '0',
  `rank_swimsuit` int NOT NULL DEFAULT '0',
  `Judge1_gown` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge1_gown_ranking` int NOT NULL DEFAULT '0',
  `Judge2_gown` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge2_gown_ranking` int NOT NULL DEFAULT '0',
  `Judge3_gown` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge3_gown_ranking` int NOT NULL DEFAULT '0',
  `Judge4_gown` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge4_gown_ranking` int NOT NULL DEFAULT '0',
  `Judge5_gown` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge5_gown_ranking` int NOT NULL DEFAULT '0',
  `overall_ranking_gown` int NOT NULL DEFAULT '0',
  `rank_gown` int NOT NULL DEFAULT '0',
  `Judge1_question` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge1_question_ranking` int NOT NULL DEFAULT '0',
  `Judge2_question` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge2_question_ranking` int NOT NULL DEFAULT '0',
  `Judge3_question` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge3_question_ranking` int NOT NULL DEFAULT '0',
  `Judge4_question` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge4_question_ranking` int NOT NULL DEFAULT '0',
  `Judge5_question` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge5_question_ranking` int NOT NULL DEFAULT '0',
  `overall_ranking_question` int NOT NULL DEFAULT '0',
  `rank_question` int NOT NULL DEFAULT '0',
  `Judge1_production_wear` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge1_production_wear_ranking` int NOT NULL DEFAULT '0',
  `Judge2_production_wear` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge2_production_wear_ranking` int NOT NULL DEFAULT '0',
  `Judge3_production_wear` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge3_production_wear_ranking` int NOT NULL DEFAULT '0',
  `Judge4_production_wear` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge4_production_wear_ranking` int NOT NULL DEFAULT '0',
  `Judge5_production_wear` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge5_production_wear_ranking` int NOT NULL DEFAULT '0',
  `overall_ranking_production_wear` int NOT NULL DEFAULT '0',
  `rank_production_wear` int NOT NULL DEFAULT '0',
  `preliminary_ranking` int NOT NULL DEFAULT '0',
  `total_ranking` int NOT NULL DEFAULT '0',
  `overall_ranking` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coronation`
--

LOCK TABLES `coronation` WRITE;
/*!40000 ALTER TABLE `coronation` DISABLE KEYS */;
INSERT INTO `coronation` VALUES (1,1,'Ricky E. Enoya','Municipality Of General Luna',9.0,1,10.0,1,9.0,1,7.0,4,9.0,2,9,2,9.8,2,10.0,1,10.0,1,8.0,4,9.0,2,10,2,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,9.0,4,9.5,2,8.0,5,8.0,2,8.5,5,18,3,4,11,2,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(2,2,'Alexis Calang Torralba','Municipality Of Sison',7.0,10,6.0,15,5.0,15,5.0,12,7.0,14,66,17,7.6,16,6.0,19,6.0,9,6.0,10,8.0,9,63,14,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,6.0,18,6.0,20,6.0,14,5.0,17,8.0,6,75,19,12,62,16,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(3,3,'Keana Saavedra','Municipality Of Placer',8.5,7,10.0,1,9.0,1,8.0,3,8.5,4,16,4,9.4,5,9.8,3,9.0,2,9.0,2,9.0,2,14,3,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,8.5,7,10.0,1,8.0,5,7.0,7,8.0,6,26,5,6,18,4,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(4,4,'Paw G. Lopez','Brgy. San Juan',6.5,13,7.0,11,6.0,9,5.0,12,7.0,14,59,13,8.5,13,8.0,9,6.0,9,6.0,10,7.0,14,55,12,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,7.6,12,7.0,13,5.0,18,5.0,17,8.0,6,66,14,17,56,15,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(5,5,'Gel F. Doringuez','Brgy. San Juan',6.0,18,6.0,15,5.0,15,5.0,12,6.0,18,78,18,7.0,19,6.5,17,5.0,16,6.0,10,7.0,14,76,19,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,6.1,17,8.0,10,7.0,9,5.0,17,7.0,15,68,15,19,71,18,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(6,6,'Dods Taylor','Poblacion 2. General Luna',6.8,11,8.0,6,6.0,9,5.0,12,7.5,12,50,11,7.1,18,7.0,13,5.0,16,5.0,19,8.0,9,75,18,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,9.2,3,9.0,6,7.0,9,10.0,1,10.0,1,20,4,15,48,12,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(7,7,'Martin C. Dela Cruz','Surigao City',6.1,17,7.0,11,6.0,9,5.0,12,7.0,14,63,16,7.2,17,7.0,13,5.0,16,5.0,19,8.0,9,74,17,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,6.0,18,8.5,8,5.0,18,6.0,12,7.0,15,71,18,14,65,17,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(8,8,'Rhon C. Lopez','Hikdop Island',6.0,18,5.5,19,5.0,15,5.0,12,6.0,18,82,19,6.8,20,6.5,17,6.0,9,6.0,10,7.0,14,70,16,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,6.0,18,6.5,18,5.0,18,5.0,17,7.0,15,86,20,16,71,18,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(9,9,'Edvirt Ignalig Naldoza','Municipality Of Bacuag',8.9,2,6.0,15,6.0,9,6.0,8,8.0,7,41,9,8.5,13,8.0,9,6.0,9,6.0,10,7.0,14,55,12,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,8.4,8,7.0,13,7.0,9,6.0,12,7.0,15,57,13,5,39,10,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(10,10,'Danielle Jade Carbonilla','Brgy. Nonoc',8.5,7,8.0,6,8.0,3,7.0,4,8.5,4,24,6,8.8,9,9.0,6,8.0,4,7.0,6,8.5,6,31,6,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,9.5,2,9.0,6,9.0,1,6.0,12,8.0,6,27,6,1,19,6,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(11,11,'Jess Plaza Merle','Municipality Of Dapa',8.9,2,9.0,5,7.0,5,9.0,1,9.0,2,15,3,9.2,6,9.5,4,6.0,9,9.0,2,9.0,2,23,5,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,8.7,6,9.5,2,9.0,1,8.0,2,9.0,3,14,2,7,17,3,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(12,12,'Jhunel Mosquite','Municipality Of Bacuag',8.9,2,10.0,1,8.0,3,9.0,1,10.0,1,8,1,9.8,2,10.0,1,8.0,4,10.0,1,10.0,1,9,1,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,10.0,1,9.5,2,8.0,5,8.0,2,10.0,1,11,1,3,6,1,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(13,13,'Marj Villacencio','Municipality Of Anao Oan',6.0,18,5.5,19,5.0,15,5.0,12,6.0,18,82,19,8.0,15,6.0,19,5.0,16,6.0,10,6.0,20,80,20,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,6.8,16,7.0,13,6.0,14,6.0,12,7.0,15,70,17,20,76,20,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(14,14,'Lance churchill Lipio','Municipality Of Del Carmen',6.3,15,6.0,15,5.0,15,6.0,8,8.0,7,60,14,8.6,12,7.0,13,5.0,16,6.0,10,7.0,14,65,15,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,7.2,15,6.5,18,6.0,14,7.0,7,7.0,15,69,16,10,55,14,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(15,15,'Miah Kim Sajulga','Surigao - Gay Intellect Society Of Placer',8.8,5,8.0,6,5.0,15,7.0,4,8.0,7,37,7,10.0,1,8.5,7,6.0,9,7.0,6,8.0,9,32,7,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,8.0,9,8.0,10,7.0,9,8.0,2,8.0,6,36,9,13,36,8,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(16,16,'Gellan Paster','Municipality Of Tagana-an',8.5,7,7.0,11,6.0,9,5.0,12,7.5,12,51,12,9.1,7,7.8,12,7.0,7,6.0,10,8.0,9,45,10,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,7.8,11,7.0,13,7.0,9,6.0,12,8.0,6,51,12,11,45,11,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(17,17,'Raymart Jay Paramo','Municipality Of Mainit',6.8,11,8.0,6,7.0,5,6.0,8,8.0,7,37,7,8.8,9,8.0,9,6.0,9,7.0,6,8.5,6,39,9,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,7.5,14,8.5,8,6.0,14,8.0,2,8.0,6,44,11,9,36,8,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(18,18,'Philisha Lumamba','Municipality Of Claver',6.5,13,8.0,6,6.0,9,6.0,8,8.0,7,43,10,8.7,11,8.5,7,7.0,7,7.0,6,9.0,2,33,8,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,7.6,12,9.5,2,9.0,1,7.0,7,8.0,6,28,7,8,33,7,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(19,19,'Diane Echin','Municipality Of Sison',6.3,15,7.0,11,7.0,5,5.0,12,6.5,17,60,14,9.0,8,7.0,13,8.0,4,6.0,10,7.0,14,49,11,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,8.0,9,7.0,13,9.0,1,7.0,7,8.0,6,36,9,18,52,13,'2025-08-29 02:40:37','2025-08-29 08:11:29'),(20,20,'Divvy Potter','Brgy. Luna, Surigao City',8.7,6,10.0,1,7.0,5,7.0,4,8.5,4,20,5,9.5,4,9.5,4,9.0,2,8.0,4,8.5,6,20,4,0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,9.0,4,8.0,10,8.0,5,7.0,7,9.0,3,29,8,1,18,4,'2025-08-29 02:40:37','2025-08-29 08:11:29');
/*!40000 ALTER TABLE `coronation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finals`
--

DROP TABLE IF EXISTS `finals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `finals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contestant_number` int NOT NULL,
  `contestant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Judge1_final` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge1_final_ranking` int NOT NULL DEFAULT '0',
  `Judge2_final` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge2_final_ranking` int NOT NULL DEFAULT '0',
  `Judge3_final` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge3_final_ranking` int NOT NULL DEFAULT '0',
  `Judge4_final` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge4_final_ranking` int NOT NULL DEFAULT '0',
  `Judge5_final` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge5_final_ranking` int NOT NULL DEFAULT '0',
  `overall_ranking_final` int NOT NULL DEFAULT '0',
  `rank_final` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finals`
--

LOCK TABLES `finals` WRITE;
/*!40000 ALTER TABLE `finals` DISABLE KEYS */;
INSERT INTO `finals` VALUES (1,12,'Jhunel Mosquite','Municipality Of Bacuag',7.0,4,8.0,3,4.0,4,10.0,1,10.0,1,13,3,'2025-08-29 07:57:11','2025-08-29 08:14:51'),(2,20,'Divvy Potter','Brgy. Luna, Surigao City',8.0,2,9.0,1,8.0,2,9.0,2,9.0,2,9,1,'2025-08-29 07:57:11','2025-08-29 08:14:51'),(3,11,'Jess Plaza Merle','Municipality Of Dapa',6.0,5,6.0,4,5.0,3,6.0,4,8.5,3,19,4,'2025-08-29 07:57:11','2025-08-29 08:14:51'),(4,18,'Philisha Lumamba','Municipality Of Claver',7.5,3,5.5,5,4.0,4,6.0,4,6.0,5,21,5,'2025-08-29 07:57:11','2025-08-29 08:14:51'),(5,1,'Ricky E. Enoya','Municipality Of General Luna',10.0,1,9.0,1,9.0,1,8.0,3,8.0,4,10,2,'2025-08-29 07:57:11','2025-08-29 08:14:51');
/*!40000 ALTER TABLE `finals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2024_02_26_072113_create_table_for_preliminary',1),(7,'2024_02_26_072113_create_table_for_prodcution',1),(8,'2024_02_27_082307_create_table_for_coronation',1),(9,'2024_02_28_025756_create_tables_for_final',1),(10,'2025_08_29_022100_create_top10s_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preliminary_event`
--

DROP TABLE IF EXISTS `preliminary_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `preliminary_event` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contestant_number` int NOT NULL,
  `contestant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photogeneic` int NOT NULL DEFAULT '0',
  `production_number` int NOT NULL DEFAULT '0',
  `white_collection` int NOT NULL DEFAULT '0',
  `runway_challenge` int NOT NULL DEFAULT '0',
  `attendance` int NOT NULL DEFAULT '0',
  `interview` int NOT NULL DEFAULT '0',
  `talent` int NOT NULL DEFAULT '0',
  `advocacy_video` int NOT NULL DEFAULT '0',
  `peoples_choice` int NOT NULL DEFAULT '0',
  `production_wear` int NOT NULL DEFAULT '0',
  `total_ranking` int NOT NULL DEFAULT '0',
  `rank` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preliminary_event`
--

LOCK TABLES `preliminary_event` WRITE;
/*!40000 ALTER TABLE `preliminary_event` DISABLE KEYS */;
INSERT INTO `preliminary_event` VALUES (1,1,'Ricky E. Enoya','Municipality Of General Luna',2,2,5,1,5,13,12,1,7,2,50,4,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(2,2,'Alexis Calang Torralba','Municipality Of Sison',12,4,15,17,4,18,3,2,15,2,92,12,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(3,3,'Keana Saavedra','Municipality Of Placer',7,3,11,6,4,2,8,7,13,2,63,6,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(4,4,'Paw G. Lopez','Brgy. San Juan',16,5,14,8,4,15,18,18,10,2,110,17,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(5,5,'Gel F. Doringuez','Brgy. San Juan',15,5,18,18,3,8,14,15,20,2,118,19,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(6,6,'Dods Taylor','Poblacion 2. General Luna',13,14,10,6,3,17,17,4,12,2,98,15,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(7,7,'Martin C. Dela Cruz','Surigao City',19,5,6,20,7,4,15,10,9,2,97,14,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(8,8,'Rhon C. Lopez','Hikdop Island',11,3,12,8,1,19,20,18,13,2,107,16,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(9,9,'Edvirt Ignalig Naldoza','Municipality Of Bacuag',10,1,13,5,1,1,7,17,4,2,61,5,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(10,10,'Danielle Jade Carbonilla','Brgy. Nonoc',1,2,1,3,2,11,1,10,3,2,36,1,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(11,11,'Jess Plaza Merle','Municipality Of Dapa',9,6,9,5,5,3,13,6,7,2,65,7,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(12,12,'Jhunel Mosquite','Municipality Of Bacuag',4,2,2,7,3,5,9,4,5,2,43,3,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(13,13,'Marj Villacencio','Municipality Of Anao Oan',20,7,19,16,7,14,4,16,18,2,123,20,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(14,14,'Lance churchill Lipio','Municipality Of Del Carmen',8,6,8,7,5,10,16,7,15,2,84,10,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(15,15,'Miah Kim Sajulga','Surigao - Gay Intellect Society Of Placer',6,7,16,15,0,12,19,10,6,2,93,13,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(16,16,'Gellan Paster','Municipality Of Tagana-an',16,6,7,9,7,7,2,19,15,2,90,11,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(17,17,'Raymart Jay Paramo','Municipality Of Mainit',5,4,20,4,6,20,6,10,2,2,79,9,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(18,18,'Philisha Lumamba','Municipality Of Claver',14,1,5,11,6,9,11,2,10,2,71,8,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(19,19,'Diane Echin','Municipality Of Sison',19,3,17,19,3,16,5,20,9,2,113,18,'2025-08-29 02:40:37','2025-08-29 08:01:58'),(20,20,'Divvy Potter','Brgy. Luna, Surigao City',3,1,4,2,1,6,10,7,1,1,36,1,'2025-08-29 02:40:37','2025-08-29 08:01:58');
/*!40000 ALTER TABLE `preliminary_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `production_event`
--

DROP TABLE IF EXISTS `production_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `production_event` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contestant_number` int NOT NULL,
  `contestant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Judge1` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge1_ranking` int NOT NULL DEFAULT '0',
  `Judge2` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge2_ranking` int NOT NULL DEFAULT '0',
  `Judge3` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge3_ranking` int NOT NULL DEFAULT '0',
  `Judge4` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge4_ranking` int NOT NULL DEFAULT '0',
  `Judge5` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge5_ranking` int NOT NULL DEFAULT '0',
  `total_ranking` int NOT NULL DEFAULT '0',
  `overall_ranking` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `production_event`
--

LOCK TABLES `production_event` WRITE;
/*!40000 ALTER TABLE `production_event` DISABLE KEYS */;
INSERT INTO `production_event` VALUES (1,1,'Ricky E. Enoya','Municipality Of General Luna',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(2,2,'Alexis Calang Torralba','Municipality Of Sison',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(3,3,'Keana Saavedra','Municipality Of Placer',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(4,4,'Paw G. Lopez','Brgy. San Juan',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(5,5,'Gel F. Doringuez','Brgy. San Juan',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(6,6,'Dods Taylor','Poblacion 2. General Luna',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(7,7,'Martin C. Dela Cruz','Surigao City',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(8,8,'Rhon C. Lopez','Hikdop Island',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(9,9,'Edvirt Ignalig Naldoza','Municipality Of Bacuag',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(10,10,'Danielle Jade Carbonilla','Brgy. Nonoc',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(11,11,'Jess Plaza Merle','Municipality Of Dapa',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(12,12,'Jhunel Mosquite','Municipality Of Bacuag',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(13,13,'Marj Villacencio','Municipality Of Anao Oan',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(14,14,'Lance churchill Lipio','Municipality Of Del Carmen',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(15,15,'Miah Kim Sajulga','Surigao - Gay Intellect Society Of Placer',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(16,16,'Gellan Paster','Municipality Of Tagana-an',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(17,17,'Raymart Jay Paramo','Municipality Of Mainit',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(18,18,'Philisha Lumamba','Municipality Of Claver',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(19,19,'Diane Echin','Municipality Of Sison',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(20,20,'Divvy Potter','Brgy. Luna, Surigao City',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2025-08-29 02:40:36','2025-08-29 02:40:36');
/*!40000 ALTER TABLE `production_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `top10s`
--

DROP TABLE IF EXISTS `top10s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `top10s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contestant_number` int NOT NULL,
  `contestant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Judge1_question` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge1_question_ranking` int NOT NULL DEFAULT '0',
  `Judge2_question` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge2_question_ranking` int NOT NULL DEFAULT '0',
  `Judge3_question` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge3_question_ranking` int NOT NULL DEFAULT '0',
  `Judge4_question` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge4_question_ranking` int NOT NULL DEFAULT '0',
  `Judge5_question` decimal(3,1) NOT NULL DEFAULT '0.0',
  `Judge5_question_ranking` int NOT NULL DEFAULT '0',
  `overall_ranking_question` int NOT NULL DEFAULT '0',
  `rank_question` int NOT NULL DEFAULT '0',
  `total_ranking` int NOT NULL DEFAULT '0',
  `overall_ranking` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `top10s`
--

LOCK TABLES `top10s` WRITE;
/*!40000 ALTER TABLE `top10s` DISABLE KEYS */;
INSERT INTO `top10s` VALUES (1,9,'Edvirt Ignalig Naldoza','Municipality Of Bacuag',7.0,6,7.5,7,5.0,9,6.5,8,6.5,9,39,7,0,0,'2025-08-29 07:31:54','2025-08-29 08:12:23'),(2,17,'Raymart Jay Paramo','Municipality Of Mainit',6.0,7,7.0,9,6.0,7,6.5,8,7.0,8,39,7,0,0,'2025-08-29 07:31:54','2025-08-29 08:12:23'),(3,15,'Miah Kim Sajulga','Surigao - Gay Intellect Society Of Placer',8.0,5,7.5,7,6.0,7,6.0,10,6.0,10,39,7,0,0,'2025-08-29 07:31:54','2025-08-29 08:12:23'),(4,18,'Philisha Lumamba','Municipality Of Claver',9.0,3,8.0,6,7.0,6,8.0,5,8.5,3,23,5,0,0,'2025-08-29 07:31:54','2025-08-29 08:12:23'),(5,10,'Danielle Jade Carbonilla','Brgy. Nonoc',6.0,7,6.0,10,4.0,10,7.0,6,7.5,7,40,10,0,0,'2025-08-29 07:31:54','2025-08-29 08:12:23'),(6,20,'Divvy Potter','Brgy. Luna, Surigao City',10.0,1,10.0,1,9.0,1,9.0,2,9.0,2,7,1,0,0,'2025-08-29 07:31:54','2025-08-29 08:12:23'),(7,3,'Keana Saavedra','Municipality Of Placer',6.0,7,9.0,4,8.0,3,7.0,6,8.0,6,26,6,0,0,'2025-08-29 07:31:54','2025-08-29 08:12:23'),(8,11,'Jess Plaza Merle','Municipality Of Dapa',6.0,7,8.5,5,8.0,3,9.0,2,8.5,3,20,4,0,0,'2025-08-29 07:31:54','2025-08-29 08:12:23'),(9,1,'Ricky E. Enoya','Municipality Of General Luna',9.0,3,10.0,1,9.0,1,9.0,2,8.5,3,10,3,0,0,'2025-08-29 07:31:54','2025-08-29 08:12:23'),(10,12,'Jhunel Mosquite','Municipality Of Bacuag',10.0,1,10.0,1,8.0,3,10.0,1,10.0,1,7,1,0,0,'2025-08-29 07:31:54','2025-08-29 08:12:23');
/*!40000 ALTER TABLE `top10s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `RealName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'admin','admin@gmail.com',NULL,'$2y$12$Esj2POgFDykY4857o9MJjOU5KLEEUFofMJ6/eRJOii1eYvtcUJprW',NULL,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(2,'Lars Pacheco','Judge1','judge1@gmail.com',NULL,'$2y$12$H1jtqya8Qtp0qwPo5vVUEemyqUYNUKUphjQsh9jxIGRTCJo8dQbYa',NULL,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(3,'Mico Angelo Teng','Judge2','judge2@gmail.com',NULL,'$2y$12$vSD4/Id.KoByOSZSomrVzezvGem3mT1dZsPm74VdGgvRe93QQyUam',NULL,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(4,'Carmi David','Judge3','judge3@gmail.com',NULL,'$2y$12$LTRFRX1FYeoDZkibBfpEcO7KRLTqFOSULthXtJhEEQ8uyUYSqjwje',NULL,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(5,'Mr. Kenneth Cruz','Judge4','judge4@gmail.com',NULL,'$2y$12$Tskv/Ue6R0FOXaUxutloIOT1Ty8UwIrH1ZelbXLWbcIbJ2F.8gb1a',NULL,'2025-08-29 02:40:37','2025-08-29 02:40:37'),(6,'Mikay Bautista','Judge5','judge5@gmail.com',NULL,'$2y$12$/3I9HNQqAu0snmqqwRyobOtmnAIsbCiDrET7pj/.xZzQZkzevyN02',NULL,'2025-08-29 02:40:37','2025-08-29 02:40:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-01  9:19:40
