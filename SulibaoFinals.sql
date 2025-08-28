CREATE DATABASE  IF NOT EXISTS `sulibao` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sulibao`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: sulibao
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
  `total_ranking` int NOT NULL DEFAULT '0',
  `overall_ranking` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coronation`
--

LOCK TABLES `coronation` WRITE;
/*!40000 ALTER TABLE `coronation` DISABLE KEYS */;
INSERT INTO `coronation` VALUES (1,3,'Elijah Ballado','Municipality of Gigaquit',7.0,8,7.0,8,8.0,4,8.0,4,6.0,6,30,8,7.0,10,7.0,6,9.0,4,8.0,4,6.0,9,33,9,6.0,10,6.0,10,7.0,8,9.0,4,5.0,11,43,10,27,11,'2024-06-28 02:11:38','2024-06-28 07:21:37'),(2,15,'Dendu John Duhaylungsod','Municipality of  Placer',9.0,3,8.0,2,7.0,8,8.0,4,5.0,9,26,7,9.9,1,9.2,1,7.0,8,7.0,8,7.0,4,22,4,10.0,1,9.0,1,8.0,4,10.0,1,7.0,3,10,1,12,3,'2024-06-28 02:11:38','2024-06-28 07:21:37'),(3,16,'Andrei Lanrel Geraldino','Municipality of Tagana-an',9.5,2,8.0,2,10.0,1,7.0,6,5.0,9,20,4,8.5,7,7.0,6,10.0,1,8.0,4,7.0,4,22,4,7.0,8,6.5,9,10.0,1,6.0,11,7.0,3,32,9,17,5,'2024-06-28 02:11:38','2024-06-28 07:21:37'),(4,4,'Rash Morales','Municipality of Bacuag',8.0,5,9.0,1,10.0,1,10.0,1,10.0,1,9,1,8.3,8,9.0,2,10.0,1,10.0,1,9.0,2,14,2,6.3,9,7.0,8,9.0,2,10.0,1,8.0,2,22,5,8,2,'2024-06-28 02:11:38','2024-06-28 07:21:37'),(5,6,'Ethan Neo Mula','Municipality of Tubod',8.0,5,6.0,9,7.0,8,6.0,7,7.0,2,31,9,9.0,2,6.8,10,6.0,10,6.0,10,5.0,11,43,10,8.0,5,7.5,6,7.0,8,9.0,4,7.0,3,26,7,26,10,'2024-06-28 02:11:38','2024-06-28 07:21:37'),(6,10,'Zelyan Matthew Tibay','Surigao City',10.0,1,8.0,2,8.0,4,9.0,2,6.0,6,15,3,8.8,4,8.6,3,8.0,5,10.0,1,10.0,1,14,2,7.5,7,8.0,3,9.0,2,10.0,1,10.0,1,14,2,7,1,'2024-06-28 02:11:38','2024-06-28 07:21:37'),(7,12,'Carlo Patrick Raagas','Municipality of  Sison',8.0,5,8.0,2,8.0,4,5.0,10,7.0,2,23,5,8.7,5,7.0,6,7.0,8,8.0,4,7.0,4,27,7,7.9,6,7.5,6,8.0,4,9.0,4,7.0,3,23,6,18,6,'2024-06-28 02:11:38','2024-06-28 07:21:37'),(8,5,'Jhonny Bayang Galgo','Municipality of Gigaquit',7.0,8,5.0,11,7.0,8,5.0,10,5.0,9,46,11,7.9,9,5.0,11,6.0,10,6.0,10,6.0,9,49,11,9.8,3,8.8,2,8.0,4,9.0,4,7.0,3,16,3,25,9,'2024-06-28 02:11:38','2024-06-28 07:21:37'),(9,8,'Jerick Bayang','Municipality of Claver',7.0,8,8.0,2,8.0,4,6.0,7,7.0,2,23,5,7.0,10,7.0,6,8.0,5,7.0,8,8.0,3,32,8,8.9,4,7.6,5,7.0,8,7.0,9,7.0,3,29,8,21,8,'2024-06-28 02:11:38','2024-06-28 07:21:37'),(10,20,'Jm Dela Peña','Municipality of  Mainit',9.0,3,8.0,2,10.0,1,9.0,2,7.0,2,10,2,8.9,3,8.0,4,10.0,1,10.0,1,7.0,4,13,1,5.0,11,5.0,11,8.0,4,7.0,9,6.0,10,45,11,14,4,'2024-06-28 02:11:38','2024-06-28 07:21:37'),(11,17,'Kenneth Tirso Leopoldo','Municipality of  Alegria',7.0,8,6.0,9,7.0,8,6.0,7,6.0,6,38,10,8.6,6,7.7,5,8.0,5,8.0,4,7.0,4,24,6,10.0,1,8.0,3,7.0,8,9.0,4,7.0,3,19,4,20,7,'2024-06-28 02:11:38','2024-06-28 07:21:37');
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
INSERT INTO `finals` VALUES (1,10,'Zelyan Matthew Tibay','Surigao City',9.0,3,8.0,3,8.0,5,8.0,3,7.0,3,17,3,'2024-06-28 06:50:15','2024-06-28 07:39:17'),(2,4,'Rash Morales','Municipality of Bacuag',9.8,1,9.8,1,10.0,1,10.0,1,9.0,1,5,1,'2024-06-28 06:50:15','2024-06-28 07:39:17'),(3,15,'Dendu John Duhaylungsod','Municipality of  Placer',9.4,2,9.0,2,9.0,4,9.0,2,8.0,2,12,2,'2024-06-28 06:50:15','2024-06-28 07:39:17'),(4,20,'Jm Dela Peña','Municipality of  Mainit',6.0,5,7.9,4,10.0,1,7.8,4,6.0,4,18,4,'2024-06-28 06:50:15','2024-06-28 07:39:17'),(5,16,'Andrei Lanrel Geraldino','Municipality of Tagana-an',7.5,4,7.8,5,10.0,1,7.7,5,5.0,5,20,5,'2024-06-28 06:50:15','2024-06-28 07:39:17');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2024_02_26_072113_create_table_for_preliminary',1),(7,'2024_02_26_072113_create_table_for_prodcution',1),(8,'2024_02_27_082307_create_table_for_coronation',1),(9,'2024_02_28_025756_create_tables_for_final',1);
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
  `photogenic` int NOT NULL DEFAULT '0',
  `advocacy` int NOT NULL DEFAULT '0',
  `talent` int NOT NULL DEFAULT '0',
  `friendship` int NOT NULL DEFAULT '0',
  `production_number` int NOT NULL DEFAULT '0',
  `modernized_barong` int NOT NULL DEFAULT '0',
  `production_wear` int NOT NULL DEFAULT '0',
  `eloquent` int NOT NULL DEFAULT '0',
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
INSERT INTO `preliminary_event` VALUES (1,1,'Andrei Jake Jardenil','Brgy. Washington, Surigao City',15,6,19,5,19,15,17,2,98,16,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(2,2,'Christopher Poblete','Brgy. Washington, Surigao City',10,7,20,5,9,1,20,2,74,12,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(3,3,'Elijah Ballado','Municipality of Gigaquit',2,19,2,9,6,10,5,2,55,6,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(4,4,'Rash Morales','Municipality of Bacuag',3,14,8,9,12,2,7,2,57,7,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(5,5,'Jhonny Bayang Galgo','Municipality of Gigaquit',12,3,10,9,14,13,4,2,67,11,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(6,6,'Ethan Neo Mula','Municipality of Tubod',11,4,6,9,1,3,11,1,46,3,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(7,7,'Joel Obligado','Municipality of Del Carmen',18,10,15,9,16,18,18,2,106,18,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(8,8,'Jerick Bayang','Municipality of Claver',13,11,10,3,10,5,12,2,66,10,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(9,9,'Duke Jastin Jara','Brgy. Lisondra, Surigao City',4,13,7,9,13,14,13,2,75,13,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(10,10,'Zelyan Matthew Tibay','Surigao City',14,15,5,5,1,12,3,2,57,7,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(11,11,'Jessie Anahao','Municipality Of Placer',15,12,16,9,5,20,15,2,94,15,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(12,12,'Carlo Patrick Raagas','Municipality of  Sison',6,2,9,9,8,6,4,2,46,3,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(13,13,'Ryle Bisnar','Municipality of  Placer',19,17,12,9,9,17,16,2,101,17,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(14,14,'Jayson Lopez','Surigao City',7,16,13,9,15,11,2,2,75,13,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(15,15,'Dendu John Duhaylungsod','Municipality of  Placer',7,9,1,1,1,7,1,2,29,1,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(16,16,'Andrei Lanrel Geraldino','Municipality of Tagana-an',9,8,4,9,7,4,10,2,53,5,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(17,17,'Kenneth Tirso Leopoldo','Municipality of  Alegria',5,1,14,9,17,7,7,2,62,9,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(18,18,'John Paul Cabajes','Brgy. Taft, Surigao City',20,18,17,1,18,18,19,2,113,20,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(19,19,'Mark Vincent Arocha','Municipality of  San Francisco',17,20,18,5,14,16,19,2,111,19,'2024-06-28 02:11:38','2024-06-28 06:53:51'),(20,20,'Jm Dela Peña','Municipality of  Mainit',1,5,2,3,11,9,6,2,39,2,'2024-06-28 02:11:38','2024-06-28 06:53:51');
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
INSERT INTO `production_event` VALUES (1,1,'Andrei Jake Jardenil','Brgy. Washington, Surigao City',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(2,2,'Christopher Poblete','Brgy. Washington, Surigao City',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(3,3,'Elijah Ballado','Municipality of Gigaquit',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(4,4,'Rash Morales','Municipality of Bacuag',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(5,5,'Jhonny Bayang Galgo','Municipality of Gigaquit',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(6,6,'Ethan Neo Mula','Municipality of Tubod',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(7,7,'Joel Obligado III','Municipality of Del Carmen',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(8,8,'Jerick Bayang','Municipality of Claver',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(9,9,'Duke Jastin Jara','Brgy. Lisondra, Surigao City',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(10,10,'Zelyan Matthew Tibay','Surigao City',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(11,11,'Jessie Anahao','Municipality Of Placer',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(12,12,'Carlo Patrick Raagas','Municipality of  Sison',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(13,13,'Ryle Bisnar','Municipality of  Placer',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(14,14,'Jayson Lopez','Surigao City',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(15,15,'Dendu John Duhaylungsod','Municipality of  Placer',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(16,16,'Andrei Lanrel Geraldino','Municipality of Tagana-an',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(17,17,'Kenneth Tirso Leopoldo','Municipality of  Alegria',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(18,18,'John Paul Cabajes','Brgy. Taft, Surigao City',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(19,19,'Mark Vincent Arocha','Municipality of  San Francisco',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36'),(20,20,'Jm Dela Peña','Municipality of  Mainit',0.0,0,0.0,0,0.0,0,0.0,0,0.0,0,0,0,'2024-06-28 02:11:36','2024-06-28 02:11:36');
/*!40000 ALTER TABLE `production_event` ENABLE KEYS */;
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
INSERT INTO `users` VALUES (1,NULL,'admin','admin@gmail.com',NULL,'$2y$12$17od2TOm3qhRtlowzpOA4OtxFXCce2bWn7Zg3SG/6t9fg0dia.1iK','JhX9Bc64iwuhVrgTsOzVDLeqZIry0gW493jG3qTQplI8rIP33cNZ0pLhqJ2t','2024-06-28 02:11:37','2024-06-28 02:11:37'),(2,'Rodniel John Soriano','Judge1','judge1@gmail.com',NULL,'$2y$12$CqHGMKXyh8PcKXpv2hK7u.9e8lm6a6R6Xq./nn0ncyro33T2W9ihS',NULL,'2024-06-28 02:11:37','2024-06-28 02:11:37'),(3,'Frank Joshua R. Guiripon','Judge2','judge2@gmail.com',NULL,'$2y$12$6Jpd1sNR4nTSJmtKfscpIeXTIa3JTmt8obJqolwO.wVeqcoSYbz1e',NULL,'2024-06-28 02:11:37','2024-06-28 02:11:37'),(4,'Alfredo Paolo Dumlao Vargas III','Judge3','judge3@gmail.com',NULL,'$2y$12$IrXwb//XQHXLFntU87.W4eay7SsmgaL7FzStB4KC7ATInQUXvA01O',NULL,'2024-06-28 02:11:37','2024-06-28 02:11:37'),(5,'Arnel Calugay','Judge4','judge4@gmail.com',NULL,'$2y$12$uvO2tfjalxUioJzzunnZ0eEez/n0bOcDWyPzXADnE7Sfp/cijH9jK',NULL,'2024-06-28 02:11:37','2024-06-28 02:11:37'),(6,'Professor Childe Libertad','Judge5','judge5@gmail.com',NULL,'$2y$12$Cthh2baltvNgqFhhGBJfMuXqrdTp14iANNrlKvcbiYtDbBMeimnMu',NULL,'2024-06-28 02:11:38','2024-06-28 02:11:38');
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

-- Dump completed on 2024-07-01 10:23:14
