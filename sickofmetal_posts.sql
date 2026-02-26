-- MySQL dump 10.13  Distrib 8.0.44, for Linux (x86_64)
--
-- Host: localhost    Database: sickofmetal
-- ------------------------------------------------------
-- Server version	8.0.43-0ubuntu0.24.04.1

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Entries','entries','Thoughts, notes & deeper takes. Things in relation to heavy metal culture and music.',NULL,'2025-07-28 23:53:01','2025-08-02 19:17:49'),(2,'MetAll','metall','Metal releases: music, movies, music gear, books, etc. If you can stream it, rent it, etc., it will be here.',NULL,'2025-07-28 23:53:01','2025-08-15 17:57:53'),(3,'Album Reviews','album-reviews','🤘',2,'2025-07-28 23:53:01','2025-08-02 19:22:50'),(4,'Highlights','highlights','Mainly about singles and one off songs 🔥🔥',2,'2025-07-28 23:53:01','2025-08-02 19:18:03'),(5,'Other Stuff','other-stuff','Off-topic, off the-subject-of-metal, miscellaneous topics 🤷‍♂️',2,'2025-07-28 23:53:01','2025-08-02 19:20:55'),(6,'Interviews','interviews','Got an album coming out? Reach out ',NULL,'2026-01-22 05:50:15','2026-01-22 05:50:15');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `channels`
--

DROP TABLE IF EXISTS `channels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `channels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `channels_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `channels`
--

LOCK TABLES `channels` WRITE;
/*!40000 ALTER TABLE `channels` DISABLE KEYS */;
INSERT INTO `channels` VALUES (1,'Lists','lists','Top 5, 10, or 20 of your favorite metal-adjacent anything.',1,'2025-07-28 23:56:14','2025-07-28 23:56:14'),(2,'Metal Discussion','metal-discussion','Anything metal related.',1,'2025-07-29 18:05:43','2025-07-29 18:05:43');
/*!40000 ALTER TABLE `channels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `commentable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` bigint unsigned NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` bigint unsigned DEFAULT NULL,
  `comment_id` int unsigned DEFAULT NULL,
  `_lft` int unsigned NOT NULL DEFAULT '0',
  `_rgt` int unsigned NOT NULL DEFAULT '0',
  `parent_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`),
  KEY `comments__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'App\\Models\\Post',1,'asdf',1,1,NULL,1,2,NULL,'2025-07-29 00:28:17','2025-07-29 00:28:17'),(2,'App\\Models\\Post',1,'@eduardo ghjk',1,2,1,3,4,NULL,'2025-07-29 00:38:56','2025-07-29 00:38:56'),(5,'App\\Models\\Post',1,'sddfs',1,1,NULL,5,6,NULL,'2025-07-29 20:03:33','2025-07-29 20:03:33'),(6,'App\\Models\\Post',2,'fgfdfgdf',1,1,NULL,7,8,NULL,'2025-07-30 05:30:57','2025-07-30 05:30:57'),(7,'App\\Models\\Post',2,'Desde mi celular',1,2,NULL,9,10,NULL,'2025-08-02 19:27:40','2025-08-02 19:27:40'),(8,'App\\Models\\Post',3,'👍👍🔥🔥🔥',1,2,NULL,11,12,NULL,'2025-08-02 19:28:23','2025-08-02 19:28:23');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,'default','{\"uuid\":\"b6172792-ecc3-425b-a580-c15499c88f79\",\"displayName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"command\":\"O:58:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\\\":6:{s:14:\\\"\\u0000*\\u0000conversions\\\";O:52:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\ConversionCollection\\\":2:{s:8:\\\"\\u0000*\\u0000items\\\";a:2:{i:0;O:42:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Conversion\\\":11:{s:12:\\\"\\u0000*\\u0000fileNamer\\\";O:54:\\\"Spatie\\\\MediaLibrary\\\\Support\\\\FileNamer\\\\DefaultFileNamer\\\":0:{}s:28:\\\"\\u0000*\\u0000extractVideoFrameAtSecond\\\";d:0;s:16:\\\"\\u0000*\\u0000manipulations\\\";O:45:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Manipulations\\\":1:{s:16:\\\"\\u0000*\\u0000manipulations\\\";a:5:{s:8:\\\"optimize\\\";a:1:{i:0;O:36:\\\"Spatie\\\\ImageOptimizer\\\\OptimizerChain\\\":3:{s:13:\\\"\\u0000*\\u0000optimizers\\\";a:7:{i:0;O:42:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Jpegoptim\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m85\\\";i:1;s:7:\\\"--force\\\";i:2;s:11:\\\"--strip-all\\\";i:3;s:17:\\\"--all-progressive\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:9:\\\"jpegoptim\\\";}i:1;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Pngquant\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:7:\\\"--force\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"pngquant\\\";}i:2;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Optipng\\\":5:{s:7:\\\"options\\\";a:3:{i:0;s:3:\\\"-i0\\\";i:1;s:3:\\\"-o2\\\";i:2;s:6:\\\"-quiet\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"optipng\\\";}i:3;O:37:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Svgo\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:20:\\\"--disable=cleanupIDs\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:4:\\\"svgo\\\";}i:4;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Gifsicle\\\":5:{s:7:\\\"options\\\";a:2:{i:0;s:2:\\\"-b\\\";i:1;s:3:\\\"-O3\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"gifsicle\\\";}i:5;O:38:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Cwebp\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m 6\\\";i:1;s:8:\\\"-pass 10\\\";i:2;s:3:\\\"-mt\\\";i:3;s:5:\\\"-q 90\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:5:\\\"cwebp\\\";}i:6;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Avifenc\\\":6:{s:7:\\\"options\\\";a:8:{i:0;s:14:\\\"-a cq-level=23\\\";i:1;s:6:\\\"-j all\\\";i:2;s:7:\\\"--min 0\\\";i:3;s:8:\\\"--max 63\\\";i:4;s:12:\\\"--minalpha 0\\\";i:5;s:13:\\\"--maxalpha 63\\\";i:6;s:14:\\\"-a end-usage=q\\\";i:7;s:12:\\\"-a tune=ssim\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"avifenc\\\";s:16:\\\"decodeBinaryName\\\";s:7:\\\"avifdec\\\";}}s:9:\\\"\\u0000*\\u0000logger\\\";O:33:\\\"Spatie\\\\ImageOptimizer\\\\DummyLogger\\\":0:{}s:10:\\\"\\u0000*\\u0000timeout\\\";i:60;}}s:6:\\\"format\\\";a:1:{i:0;s:4:\\\"webp\\\";}s:5:\\\"width\\\";a:1:{i:0;i:100;}s:6:\\\"height\\\";a:1:{i:0;i:100;}s:7:\\\"sharpen\\\";a:1:{i:0;i:10;}}}s:23:\\\"\\u0000*\\u0000performOnCollections\\\";a:0:{}s:17:\\\"\\u0000*\\u0000performOnQueue\\\";b:1;s:26:\\\"\\u0000*\\u0000keepOriginalImageFormat\\\";b:0;s:27:\\\"\\u0000*\\u0000generateResponsiveImages\\\";b:0;s:18:\\\"\\u0000*\\u0000widthCalculator\\\";N;s:24:\\\"\\u0000*\\u0000loadingAttributeValue\\\";N;s:16:\\\"\\u0000*\\u0000pdfPageNumber\\\";i:1;s:7:\\\"\\u0000*\\u0000name\\\";s:5:\\\"thumb\\\";}i:1;O:42:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Conversion\\\":11:{s:12:\\\"\\u0000*\\u0000fileNamer\\\";O:54:\\\"Spatie\\\\MediaLibrary\\\\Support\\\\FileNamer\\\\DefaultFileNamer\\\":0:{}s:28:\\\"\\u0000*\\u0000extractVideoFrameAtSecond\\\";d:0;s:16:\\\"\\u0000*\\u0000manipulations\\\";O:45:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Manipulations\\\":1:{s:16:\\\"\\u0000*\\u0000manipulations\\\";a:4:{s:8:\\\"optimize\\\";a:1:{i:0;O:36:\\\"Spatie\\\\ImageOptimizer\\\\OptimizerChain\\\":3:{s:13:\\\"\\u0000*\\u0000optimizers\\\";a:7:{i:0;O:42:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Jpegoptim\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m85\\\";i:1;s:7:\\\"--force\\\";i:2;s:11:\\\"--strip-all\\\";i:3;s:17:\\\"--all-progressive\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:9:\\\"jpegoptim\\\";}i:1;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Pngquant\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:7:\\\"--force\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"pngquant\\\";}i:2;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Optipng\\\":5:{s:7:\\\"options\\\";a:3:{i:0;s:3:\\\"-i0\\\";i:1;s:3:\\\"-o2\\\";i:2;s:6:\\\"-quiet\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"optipng\\\";}i:3;O:37:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Svgo\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:20:\\\"--disable=cleanupIDs\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:4:\\\"svgo\\\";}i:4;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Gifsicle\\\":5:{s:7:\\\"options\\\";a:2:{i:0;s:2:\\\"-b\\\";i:1;s:3:\\\"-O3\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"gifsicle\\\";}i:5;O:38:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Cwebp\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m 6\\\";i:1;s:8:\\\"-pass 10\\\";i:2;s:3:\\\"-mt\\\";i:3;s:5:\\\"-q 90\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:5:\\\"cwebp\\\";}i:6;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Avifenc\\\":6:{s:7:\\\"options\\\";a:8:{i:0;s:14:\\\"-a cq-level=23\\\";i:1;s:6:\\\"-j all\\\";i:2;s:7:\\\"--min 0\\\";i:3;s:8:\\\"--max 63\\\";i:4;s:12:\\\"--minalpha 0\\\";i:5;s:13:\\\"--maxalpha 63\\\";i:6;s:14:\\\"-a end-usage=q\\\";i:7;s:12:\\\"-a tune=ssim\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"avifenc\\\";s:16:\\\"decodeBinaryName\\\";s:7:\\\"avifdec\\\";}}s:9:\\\"\\u0000*\\u0000logger\\\";O:33:\\\"Spatie\\\\ImageOptimizer\\\\DummyLogger\\\":0:{}s:10:\\\"\\u0000*\\u0000timeout\\\";i:60;}}s:6:\\\"format\\\";a:1:{i:0;s:4:\\\"webp\\\";}s:5:\\\"width\\\";a:1:{i:0;i:300;}s:6:\\\"height\\\";a:1:{i:0;i:300;}}}s:23:\\\"\\u0000*\\u0000performOnCollections\\\";a:0:{}s:17:\\\"\\u0000*\\u0000performOnQueue\\\";b:1;s:26:\\\"\\u0000*\\u0000keepOriginalImageFormat\\\";b:0;s:27:\\\"\\u0000*\\u0000generateResponsiveImages\\\";b:0;s:18:\\\"\\u0000*\\u0000widthCalculator\\\";N;s:24:\\\"\\u0000*\\u0000loadingAttributeValue\\\";N;s:16:\\\"\\u0000*\\u0000pdfPageNumber\\\";i:1;s:7:\\\"\\u0000*\\u0000name\\\";s:6:\\\"medium\\\";}}s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;}s:8:\\\"\\u0000*\\u0000media\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:49:\\\"Spatie\\\\MediaLibrary\\\\MediaCollections\\\\Models\\\\Media\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"\\u0000*\\u0000onlyMissing\\\";b:0;s:10:\\\"connection\\\";s:8:\\\"database\\\";s:5:\\\"queue\\\";s:0:\\\"\\\";s:11:\\\"afterCommit\\\";b:1;}\"},\"createdAt\":1755280712,\"illuminate:log:context\":{\"data\":[],\"hidden\":{\"nightwatch_trace_id\":\"s:36:\\\"21ded83f-e2be-44ef-8ad9-41b8b8c4d14d\\\";\",\"nightwatch_should_sample\":\"b:0;\"}},\"delay\":null}',0,NULL,1755280712,1755280712),(2,'default','{\"uuid\":\"5bebabfb-5b25-4613-bbb5-8c21d3c0f2a1\",\"displayName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\",\"command\":\"O:58:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Jobs\\\\PerformConversionsJob\\\":6:{s:14:\\\"\\u0000*\\u0000conversions\\\";O:52:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\ConversionCollection\\\":2:{s:8:\\\"\\u0000*\\u0000items\\\";a:2:{i:0;O:42:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Conversion\\\":11:{s:12:\\\"\\u0000*\\u0000fileNamer\\\";O:54:\\\"Spatie\\\\MediaLibrary\\\\Support\\\\FileNamer\\\\DefaultFileNamer\\\":0:{}s:28:\\\"\\u0000*\\u0000extractVideoFrameAtSecond\\\";d:0;s:16:\\\"\\u0000*\\u0000manipulations\\\";O:45:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Manipulations\\\":1:{s:16:\\\"\\u0000*\\u0000manipulations\\\";a:5:{s:8:\\\"optimize\\\";a:1:{i:0;O:36:\\\"Spatie\\\\ImageOptimizer\\\\OptimizerChain\\\":3:{s:13:\\\"\\u0000*\\u0000optimizers\\\";a:7:{i:0;O:42:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Jpegoptim\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m85\\\";i:1;s:7:\\\"--force\\\";i:2;s:11:\\\"--strip-all\\\";i:3;s:17:\\\"--all-progressive\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:9:\\\"jpegoptim\\\";}i:1;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Pngquant\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:7:\\\"--force\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"pngquant\\\";}i:2;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Optipng\\\":5:{s:7:\\\"options\\\";a:3:{i:0;s:3:\\\"-i0\\\";i:1;s:3:\\\"-o2\\\";i:2;s:6:\\\"-quiet\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"optipng\\\";}i:3;O:37:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Svgo\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:20:\\\"--disable=cleanupIDs\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:4:\\\"svgo\\\";}i:4;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Gifsicle\\\":5:{s:7:\\\"options\\\";a:2:{i:0;s:2:\\\"-b\\\";i:1;s:3:\\\"-O3\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"gifsicle\\\";}i:5;O:38:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Cwebp\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m 6\\\";i:1;s:8:\\\"-pass 10\\\";i:2;s:3:\\\"-mt\\\";i:3;s:5:\\\"-q 90\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:5:\\\"cwebp\\\";}i:6;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Avifenc\\\":6:{s:7:\\\"options\\\";a:8:{i:0;s:14:\\\"-a cq-level=23\\\";i:1;s:6:\\\"-j all\\\";i:2;s:7:\\\"--min 0\\\";i:3;s:8:\\\"--max 63\\\";i:4;s:12:\\\"--minalpha 0\\\";i:5;s:13:\\\"--maxalpha 63\\\";i:6;s:14:\\\"-a end-usage=q\\\";i:7;s:12:\\\"-a tune=ssim\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"avifenc\\\";s:16:\\\"decodeBinaryName\\\";s:7:\\\"avifdec\\\";}}s:9:\\\"\\u0000*\\u0000logger\\\";O:33:\\\"Spatie\\\\ImageOptimizer\\\\DummyLogger\\\":0:{}s:10:\\\"\\u0000*\\u0000timeout\\\";i:60;}}s:6:\\\"format\\\";a:1:{i:0;s:4:\\\"webp\\\";}s:5:\\\"width\\\";a:1:{i:0;i:100;}s:6:\\\"height\\\";a:1:{i:0;i:100;}s:7:\\\"sharpen\\\";a:1:{i:0;i:10;}}}s:23:\\\"\\u0000*\\u0000performOnCollections\\\";a:0:{}s:17:\\\"\\u0000*\\u0000performOnQueue\\\";b:1;s:26:\\\"\\u0000*\\u0000keepOriginalImageFormat\\\";b:0;s:27:\\\"\\u0000*\\u0000generateResponsiveImages\\\";b:0;s:18:\\\"\\u0000*\\u0000widthCalculator\\\";N;s:24:\\\"\\u0000*\\u0000loadingAttributeValue\\\";N;s:16:\\\"\\u0000*\\u0000pdfPageNumber\\\";i:1;s:7:\\\"\\u0000*\\u0000name\\\";s:5:\\\"thumb\\\";}i:1;O:42:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Conversion\\\":11:{s:12:\\\"\\u0000*\\u0000fileNamer\\\";O:54:\\\"Spatie\\\\MediaLibrary\\\\Support\\\\FileNamer\\\\DefaultFileNamer\\\":0:{}s:28:\\\"\\u0000*\\u0000extractVideoFrameAtSecond\\\";d:0;s:16:\\\"\\u0000*\\u0000manipulations\\\";O:45:\\\"Spatie\\\\MediaLibrary\\\\Conversions\\\\Manipulations\\\":1:{s:16:\\\"\\u0000*\\u0000manipulations\\\";a:4:{s:8:\\\"optimize\\\";a:1:{i:0;O:36:\\\"Spatie\\\\ImageOptimizer\\\\OptimizerChain\\\":3:{s:13:\\\"\\u0000*\\u0000optimizers\\\";a:7:{i:0;O:42:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Jpegoptim\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m85\\\";i:1;s:7:\\\"--force\\\";i:2;s:11:\\\"--strip-all\\\";i:3;s:17:\\\"--all-progressive\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:9:\\\"jpegoptim\\\";}i:1;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Pngquant\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:7:\\\"--force\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"pngquant\\\";}i:2;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Optipng\\\":5:{s:7:\\\"options\\\";a:3:{i:0;s:3:\\\"-i0\\\";i:1;s:3:\\\"-o2\\\";i:2;s:6:\\\"-quiet\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"optipng\\\";}i:3;O:37:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Svgo\\\":5:{s:7:\\\"options\\\";a:1:{i:0;s:20:\\\"--disable=cleanupIDs\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:4:\\\"svgo\\\";}i:4;O:41:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Gifsicle\\\":5:{s:7:\\\"options\\\";a:2:{i:0;s:2:\\\"-b\\\";i:1;s:3:\\\"-O3\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:8:\\\"gifsicle\\\";}i:5;O:38:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Cwebp\\\":5:{s:7:\\\"options\\\";a:4:{i:0;s:4:\\\"-m 6\\\";i:1;s:8:\\\"-pass 10\\\";i:2;s:3:\\\"-mt\\\";i:3;s:5:\\\"-q 90\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:5:\\\"cwebp\\\";}i:6;O:40:\\\"Spatie\\\\ImageOptimizer\\\\Optimizers\\\\Avifenc\\\":6:{s:7:\\\"options\\\";a:8:{i:0;s:14:\\\"-a cq-level=23\\\";i:1;s:6:\\\"-j all\\\";i:2;s:7:\\\"--min 0\\\";i:3;s:8:\\\"--max 63\\\";i:4;s:12:\\\"--minalpha 0\\\";i:5;s:13:\\\"--maxalpha 63\\\";i:6;s:14:\\\"-a end-usage=q\\\";i:7;s:12:\\\"-a tune=ssim\\\";}s:9:\\\"imagePath\\\";s:0:\\\"\\\";s:10:\\\"binaryPath\\\";s:0:\\\"\\\";s:7:\\\"tmpPath\\\";N;s:10:\\\"binaryName\\\";s:7:\\\"avifenc\\\";s:16:\\\"decodeBinaryName\\\";s:7:\\\"avifdec\\\";}}s:9:\\\"\\u0000*\\u0000logger\\\";O:33:\\\"Spatie\\\\ImageOptimizer\\\\DummyLogger\\\":0:{}s:10:\\\"\\u0000*\\u0000timeout\\\";i:60;}}s:6:\\\"format\\\";a:1:{i:0;s:4:\\\"webp\\\";}s:5:\\\"width\\\";a:1:{i:0;i:300;}s:6:\\\"height\\\";a:1:{i:0;i:300;}}}s:23:\\\"\\u0000*\\u0000performOnCollections\\\";a:0:{}s:17:\\\"\\u0000*\\u0000performOnQueue\\\";b:1;s:26:\\\"\\u0000*\\u0000keepOriginalImageFormat\\\";b:0;s:27:\\\"\\u0000*\\u0000generateResponsiveImages\\\";b:0;s:18:\\\"\\u0000*\\u0000widthCalculator\\\";N;s:24:\\\"\\u0000*\\u0000loadingAttributeValue\\\";N;s:16:\\\"\\u0000*\\u0000pdfPageNumber\\\";i:1;s:7:\\\"\\u0000*\\u0000name\\\";s:6:\\\"medium\\\";}}s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;}s:8:\\\"\\u0000*\\u0000media\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:49:\\\"Spatie\\\\MediaLibrary\\\\MediaCollections\\\\Models\\\\Media\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"\\u0000*\\u0000onlyMissing\\\";b:0;s:10:\\\"connection\\\";s:8:\\\"database\\\";s:5:\\\"queue\\\";s:0:\\\"\\\";s:11:\\\"afterCommit\\\";b:1;}\"},\"createdAt\":1760463110,\"nightwatch\":{\"job_id\":\"19a897b5-0785-4102-8d5d-7004b41dc758\"},\"illuminate:log:context\":{\"data\":[],\"hidden\":{\"nightwatch_trace_id\":\"s:36:\\\"13399829-24e7-4bd8-97b7-e1f381aac6e3\\\";\",\"nightwatch_should_sample\":\"b:1;\"}},\"delay\":null}',0,NULL,1760463110,1760463110);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `likeable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `likeable_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `likes_user_id_likeable_id_likeable_type_unique` (`user_id`,`likeable_id`,`likeable_type`),
  KEY `likes_likeable_type_likeable_id_index` (`likeable_type`,`likeable_id`),
  CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (1,1,'App\\Models\\Post',3,'2025-07-29 00:51:35','2025-07-29 00:51:35'),(2,1,'App\\Models\\Post',2,'2025-07-30 05:31:00','2025-07-30 05:31:00'),(3,2,'App\\Models\\Post',3,'2025-08-02 19:29:10','2025-08-02 19:29:10');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  KEY `media_order_column_index` (`order_column`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (1,'App\\Models\\Channel',1,'147087fa-0449-4175-868f-3caa822d17de','channel_sticker','thrash','01K19QEA4Y2DJTJYP6GKXMZ5JB.png','image/png','public','public',361160,'[]','[]','{\"lg_thumb\": true, \"sm_thumb\": true}','[]',1,'2025-07-28 23:56:14','2025-07-29 00:09:20'),(2,'App\\Models\\Post',1,'07538f7a-02ad-4024-b16a-ec50b990e705','thumbnails','abbath2-1550266748','01K19QSD3JZ58HDY0QZB0VZ3GX.jpg','image/jpeg','public','public',487191,'[]','[]','{\"lg_thumb\": true, \"md_thumb\": true, \"sm_thumb\": true, \"max_thumb\": true}','[]',1,'2025-07-29 00:02:18','2025-07-29 00:09:21'),(3,'App\\Models\\Channel',2,'b63303b7-4802-4224-9650-558513f005d5','channel_sticker','blackenedromantic','01K1BNS72BJ1FBRFTZTDW2MCJF.png','image/png','public','public',222304,'[]','[]','{\"lg_thumb\": true, \"sm_thumb\": true}','[]',1,'2025-07-29 18:05:43','2025-07-29 18:05:44'),(10,'App\\Models\\User',1,'396b36ac-3536-428b-8add-d87165d29d40','user_avatar','eduardo','01K7HWEFZ6EC0JND438K39W44A.jpg','image/jpeg','public','public',4580,'[]','[]','[]','[]',1,'2025-10-14 17:31:50','2025-10-14 17:31:50'),(11,'App\\Models\\Post',4,'7769db6e-7e5f-4287-a285-e206615c67bb','thumbnails','Screenshot 2025-08-02 132949','01K7HWKVTSHD8VPHEWJQY9D47X.webp','image/webp','public','public',60884,'[]','[]','{\"lg_thumb\": true, \"md_thumb\": true, \"sm_thumb\": true, \"max_thumb\": true}','[]',1,'2025-10-14 17:34:46','2025-10-14 17:34:46'),(12,'App\\Models\\Post',5,'408f2cfd-1eb9-4113-913a-b2c9ec057eb6','thumbnails','Nocturnal_Depression_Lord_Lokhraed_Nihil_Extreme_Metal_Fest_2010','01K7HX24K7X7FRPJBSKB4XYEK0.webp','image/webp','public','public',125946,'[]','[]','{\"lg_thumb\": true, \"md_thumb\": true, \"sm_thumb\": true, \"max_thumb\": true}','[]',1,'2025-10-14 17:42:33','2025-10-14 17:42:34'),(13,'App\\Models\\Post',6,'09d52b5d-2059-41db-9373-c975e49ed8cb','thumbnails','Immortal_band','01K7HX5QFS7Y9D4RGDJ96VVVRY.webp','image/webp','public','public',69378,'[]','[]','{\"lg_thumb\": true, \"md_thumb\": true, \"sm_thumb\": true, \"max_thumb\": true}','[]',1,'2025-10-14 17:44:31','2025-10-14 17:44:31'),(14,'App\\Models\\Post',7,'373045e2-38b1-4743-a880-8f39d84964e2','thumbnails','a2808982502_16','01K7HX7VP20283S6N02Z3RT5MY.webp','image/webp','public','public',42972,'[]','[]','{\"lg_thumb\": true, \"md_thumb\": true, \"sm_thumb\": true, \"max_thumb\": true}','[]',1,'2025-10-14 17:45:41','2025-10-14 17:45:41'),(15,'App\\Models\\Post',8,'b9c79013-6b22-4bc6-8ccd-53f34b84a24a','thumbnails','Coroner_@_Eindhoven_Metal_Meeting_093-1','01K7HXCXTX90C0YHJ9MQ947WW5.webp','image/webp','public','public',164014,'[]','[]','{\"lg_thumb\": true, \"md_thumb\": true, \"sm_thumb\": true, \"max_thumb\": true}','[]',1,'2025-10-14 17:48:27','2025-10-14 17:48:30'),(16,'App\\Models\\Post',9,'efd7b631-1c08-4db1-bcc2-d7d68bd21daf','thumbnails','ritual-black-metal','01KCVVS4DQ4Y687Z3X5DJC2T7A.webp','image/webp','public','public',682736,'[]','[]','{\"lg_thumb\": true, \"md_thumb\": true, \"sm_thumb\": true, \"max_thumb\": true}','[]',1,'2025-12-19 17:51:03','2025-12-19 17:51:05'),(17,'App\\Models\\Post',10,'d5b1ad7b-06e1-4b7b-8ba0-272d0785f4f9','thumbnails','hexicon','01KFJ4VXGX3GTMW24H52KD1DWT.webp','image/webp','public','public',178948,'[]','[]','{\"lg_thumb\": true, \"md_thumb\": true, \"sm_thumb\": true, \"max_thumb\": true}','[]',1,'2026-01-22 06:04:33','2026-01-22 06:04:33');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_02_26_014930_create_channels_table',1),(5,'2025_02_27_052139_create_categories_table',1),(6,'2025_02_27_055719_create_posts_table',1),(7,'2025_02_27_072157_create_permission_tables',1),(8,'2025_03_30_000145_create_media_table',1),(9,'2025_03_30_003334_create_tag_tables',1),(10,'2025_03_30_062511_create_likes_table',1),(11,'2025_04_19_182359_create_initial_roles_and_permissions',1),(12,'2025_05_28_193348_create_comments_table',1),(13,'2025_07_11_015641_create_notifications_table',1),(14,'2025_07_12_180715_create_reports_table',1),(15,'2025_07_31_153535_add_views_to_posts_table',2),(16,'2025_08_07_184615_create_post_series_table',3),(17,'2025_08_07_184638_add_post_series_id_to_posts_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (3,'App\\Models\\User',1),(1,'App\\Models\\User',2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES ('53c60b8e-8288-4068-8160-34364cf86274','App\\Notifications\\CommentModeration','App\\Models\\User',2,'{\"message\":\"Your comment on \\\"Nesciunt ex velit a\\\" was reinstated\",\"comment\":\"sfdfsd\",\"status\":\"approved\",\"url\":\"https:\\/\\/sickofmetal.net\\/channel\\/lists\\/nesciunt-ex-velit-a#comment-3\"}','2025-07-29 00:41:31','2025-07-29 00:39:45','2025-07-29 00:41:31'),('ed6a0d08-ac74-4b6e-a38d-f71337f66776','App\\Notifications\\PostComment','App\\Models\\User',2,'{\"message\":\"eduardo commented on your post: Nesciunt ex velit a\",\"url\":\"https:\\/\\/sickofmetal.net\\/channel\\/metal-discussion\\/nesciunt-ex-velit-a\"}','2025-07-30 05:31:23','2025-07-30 05:30:58','2025-07-30 05:31:23');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'view_posts','web','2025-07-28 18:53:01','2025-07-28 18:53:01'),(2,'view_featured_posts','web','2025-07-28 18:53:01','2025-07-28 18:53:01'),(3,'comment_posts','web','2025-07-28 18:53:01','2025-07-28 18:53:01'),(4,'like_posts','web','2025-07-28 18:53:01','2025-07-28 18:53:01'),(5,'create_posts','web','2025-07-28 18:53:01','2025-07-28 18:53:01'),(6,'edit_own_posts','web','2025-07-28 18:53:01','2025-07-28 18:53:01'),(7,'delete_own_posts','web','2025-07-28 18:53:01','2025-07-28 18:53:01'),(8,'feature_posts','web','2025-07-28 18:53:01','2025-07-28 18:53:01'),(9,'edit_any_post','web','2025-07-28 18:53:01','2025-07-28 18:53:01'),(10,'delete_any_post','web','2025-07-28 18:53:01','2025-07-28 18:53:01'),(11,'manage_categories','web','2025-07-28 18:53:01','2025-07-28 18:53:01');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_series`
--

DROP TABLE IF EXISTS `post_series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_series` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_series`
--

LOCK TABLES `post_series` WRITE;
/*!40000 ALTER TABLE `post_series` DISABLE KEYS */;
INSERT INTO `post_series` VALUES (2,'Premodern Heavy Metal','2025-12-19 17:52:09','2025-12-19 17:52:09');
/*!40000 ALTER TABLE `post_series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `original_user_id` bigint unsigned DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extract` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `post_template` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `views` bigint unsigned NOT NULL DEFAULT '0',
  `list_data_json` json DEFAULT NULL,
  `list_data_html` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category_id` bigint unsigned DEFAULT NULL,
  `channel_id` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `post_series_id` bigint unsigned DEFAULT NULL,
  `series_order` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  UNIQUE KEY `post_series_unique` (`post_series_id`,`series_order`),
  KEY `posts_user_id_foreign` (`user_id`),
  KEY `posts_original_user_id_foreign` (`original_user_id`),
  KEY `posts_category_id_foreign` (`category_id`),
  KEY `posts_channel_id_foreign` (`channel_id`),
  CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `posts_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE SET NULL,
  CONSTRAINT `posts_original_user_id_foreign` FOREIGN KEY (`original_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `posts_post_series_id_foreign` FOREIGN KEY (`post_series_id`) REFERENCES `post_series` (`id`) ON DELETE SET NULL,
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,NULL,'Post de prueba','post-de-prueba-deleted-1766165822','Quis accusantium sint pariatur Officiis et minima ut officia sint rerum dolorem ab eligendi culpa est sint temporibus','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><div data-youtube-video=\"true\" class=\"responsive\"><iframe src=\"https://www.youtube.com/embed/CwNYsMLWoug?controls=1\" width=\"1600\" height=\"900\" allowfullscreen=\"true\" allow=\"autoplay; fullscreen; picture-in-picture\" style=\"aspect-ratio:1600/900; width: 100%; height: auto;\"></iframe></div>',NULL,NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.','draft',0,'standard',2,NULL,NULL,5,NULL,'2025-12-19 17:37:02','2025-07-29 00:02:18','2025-12-19 17:37:02',NULL,NULL,NULL),(2,2,NULL,'Nesciunt ex velit a','nesciunt-ex-velit-a','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusm...','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>',NULL,NULL,'Nesciunt ex velit a','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis...','published',0,'post',76,NULL,NULL,NULL,2,NULL,'2025-07-29 00:39:32','2026-02-01 03:54:59','2025-07-29 18:06:15',NULL,NULL),(3,2,NULL,'3 bands you need to listen to RIGHT NOW!!!!','3-bands-you-need-to-listen-to-right-now','These bands, uh, I just listened to them and they\'re great!','',NULL,NULL,'3 bands you need to listen to RIGHT NOW!!!!','These bands, uh, I just listened to them and they\'re great!','published',0,'lists',69,'{\"intro\": \"These bands, uh, I just listened to them and they\'re great!\", \"items\": [{\"title\": \"Deathchant - Chariot\", \"resource\": {\"type\": \"doc\", \"content\": [{\"type\": \"youtube\", \"attrs\": {\"src\": \"https://www.youtube.com/embed/b2te1KSJhgM?controls=1\", \"start\": 0, \"style\": null, \"width\": 1600, \"height\": 900, \"controls\": true, \"nocookie\": false, \"responsive\": true, \"data-aspect-width\": \"16\", \"data-aspect-height\": \"9\"}}]}, \"description\": \"This track has some great energy, modern rock n roll, good vibes to party with the homies.\"}, {\"title\": \"The Zenith Passage - Datalysium\", \"resource\": {\"type\": \"doc\", \"content\": [{\"type\": \"youtube\", \"attrs\": {\"src\": \"https://www.youtube.com/embed/_NmyMmIRvNw?si=OUE0IX9ZeVJoafYc?controls=1\", \"start\": 0, \"style\": null, \"width\": 1600, \"height\": 900, \"controls\": true, \"nocookie\": false, \"responsive\": true, \"data-aspect-width\": \"16\", \"data-aspect-height\": \"9\"}}]}, \"description\": \"One of my favourite tech death albums. Incredible riffs.\\n\\nOne of the few that dares to dive into the existential dread of our pseudo-postmodernism era: a failed futurism where dreams died under the algorithmic fangs of capitalism.\"}, {\"title\": \"Gatecreeper - Deserted\", \"resource\": {\"type\": \"doc\", \"content\": [{\"type\": \"youtube\", \"attrs\": {\"src\": \"https://www.youtube.com/embed/RIDy8bGLyJM?controls=1\", \"start\": 0, \"style\": null, \"width\": 1600, \"height\": 900, \"controls\": true, \"nocookie\": false, \"responsive\": true, \"data-aspect-width\": \"16\", \"data-aspect-height\": \"9\"}}]}, \"description\": \"Shame on me for not \\\"discovering\\\" this band\'s insane catalogue before. This and \\\"Sonoran Depravation\\\" are a must listen if you\'re into death growls but still love that slow nasty shit!\"}], \"outro\": \"That\'s it basically. Great songs, great metal. From classic rock vibes to death! \"}','<div class=\'list-post\'><div class=\'intro\'>These bands, uh, I just listened to them and they&#039;re great!</div><div class=\'list-item\'><h3 class=\'resource-title\'>Deathchant - Chariot</h3><p class=\'resource-description\'>This track has some great energy, modern rock n roll, good vibes to party with the homies.</p><div class=\'resource-item\'><iframe src=\"https://www.youtube.com/embed/b2te1KSJhgM?controls=1\" style=\"\" width=\"100%\" height=\"400px\" frameborder=\"0\" allowfullscreen></iframe></div></div><div class=\'list-item\'><h3 class=\'resource-title\'>The Zenith Passage - Datalysium</h3><p class=\'resource-description\'>One of my favourite tech death albums. Incredible riffs.<br />\n<br />\nOne of the few that dares to dive into the existential dread of our pseudo-postmodernism era: a failed futurism where dreams died under the algorithmic fangs of capitalism.</p><div class=\'resource-item\'><iframe src=\"https://www.youtube.com/embed/_NmyMmIRvNw?si=OUE0IX9ZeVJoafYc?controls=1\" style=\"\" width=\"100%\" height=\"400px\" frameborder=\"0\" allowfullscreen></iframe></div></div><div class=\'list-item\'><h3 class=\'resource-title\'>Gatecreeper - Deserted</h3><p class=\'resource-description\'>Shame on me for not &quot;discovering&quot; this band&#039;s insane catalogue before. This and &quot;Sonoran Depravation&quot; are a must listen if you&#039;re into death growls but still love that slow nasty shit!</p><div class=\'resource-item\'><iframe src=\"https://www.youtube.com/embed/RIDy8bGLyJM?controls=1\" style=\"\" width=\"100%\" height=\"400px\" frameborder=\"0\" allowfullscreen></iframe></div></div><div class=\'outro\'>That&#039;s it basically. Great songs, great metal. From classic rock vibes to death! </div></div>',NULL,1,NULL,'2025-07-29 00:49:03','2026-02-01 05:42:17','2025-08-02 19:28:51',NULL,NULL),(4,1,NULL,'Technical-Melodic Metal: SPECIES Delivers an Intriguing New Outlook with \"The Essence\"','species-metal-band-the-essence','Species blends melody, technicality, and introspection in \"The Essence\"—hinting at far more than just another speed or thrash metal act.','<p>I really enjoyed the ironic but eloquent tones at the beginning of this video. The host of this talent show—or whatever he&#039;s meant to be, I guess presenter—plays a character with the aura of a circus ringleader who takes his job very seriously, mockingly reminding us of the importance of the &quot;ritual&quot; that&#039;s about to unfold.</p><p><br>Through this comical lens, we&#039;re introduced to a metal band that seems to pull from several corners of the genre. At times they sound technical, but there&#039;s also a punkish edge—enough to flirt with thrash or even technical death metal.</p><p><br>This blend of &quot;technical melodic&quot; flows through tightly crafted passages, balanced enough that nothing feels overdone. It&#039;s all part of a miniature sonic journey. (song&#039;s about 3 minutes) While the introspective crowd looks on, skeptical, their long faces seem like a symbol of lethargy—as if they&#039;re witnessing nothing really impactful, like expecting &quot;yet another band built on the same tired metal tropes.&quot;</p><p><br>All that to say: Species sounds like a genuinely intriguing band.</p><p><br>Judging by this single alone, without listening to anything else by them, I&#039;d say Species has the potential of being creative with their skillset, but more importantly, to shine as brightly as their Hawaiian shirts. They seem to understand how to blend melody with technicality and introspection—something that makes them much more than just another speed metal or thrash outfit.</p><p><br></p><div data-youtube-video=\"true\" class=\"responsive\"><iframe src=\"https://www.youtube.com/embed/djS0vmtLcRM?si=0cqEEX6gJuONG0OP?controls=1\" width=\"1600\" height=\"900\" allowfullscreen=\"true\" allow=\"autoplay; fullscreen; picture-in-picture\" style=\"aspect-ratio:1600/900; width: 100%; height: auto;\"></iframe></div>',NULL,NULL,'Technical-Melodic Metal: SPECIES \"The Essence\" Delivers an Intriguing New Outlook with \"The Essence\"','Species blends melody, technicality, and introspection in \"The Essence\"—hinting at far more than just another speed or thrash metal act.','published',0,'standard',70,NULL,NULL,4,NULL,NULL,'2025-08-02 20:32:02','2026-02-01 09:31:38','2025-08-02 20:51:20',NULL,NULL),(5,1,NULL,'Simon Reynolds\' \"The Future Shock Question\" black and death metal, the contra modernism of metal?','black-death-metal-modernism','On the topic of innovation and extreme metal subgenres, how often do we scout that rebellious player who rewrites the playbook?','<p><sup>Photo by Shadowgate, <a href=\"https://creativecommons.org/licenses/by/2.0/\" target=\"_blank\" hreflang=\"en\" data-as-button=\"false\">Creative Commons Attribution 2.0</a>, converted to WebP</sup></p><p><br><span style=\"mso-ansi-language:EN-US;\">After reading the <a href=\"https://futuromaniac.blogspot.com/2025/06/the-future-shock-question.html\" target=\"_blank\" hreflang=\"en\" data-as-button=\"false\">blog post</a>, I realized that—more than being wrong—I was perhaps clinging to a too romantic idea about musical innovation. I had always thought that what’s truly new in music had to come from unknown patterns, almost as if it appeared “out of nothingness.” That it had to challenge the classic ideas proposed by Venom, Iron Maiden, Metallica, Celtic Frost and others, with something as impactful as the rhythmic gallop of thrash or the blast beats of death metal.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">And for a long time, I believed that was innovation; a total rupture, sparked by the unexpected. In some ways, I still believe that. But aliens will probably land with a new sub-chirping sonic language before that happens.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">Nu metal, in my opinion, was one of those last real shakeups. It managed to piss off every so called “purists” by taking elements from hip-hop, jungle (techno subgenre), funk and embedded them into a heavy context, filled with rebellion and emotional distress. Korn, for example, brought psychological suffering to the center of the metal experience—something that probably wouldn’t have worked in another genre. Similarly—and this is something Reynolds talks about in his post—Timbaland fused techno grooves into hip-hop, creating a new language without inventing it from scratch.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">This is a strong point in favor of innovation and broadly illustrates a possible way for something new to emerge. The chaotic grooves of jungle—rooted in the &quot;Amen break&quot; and hip-hop—didn’t exist in metal, nor did they originated in techno. That&#039;s why, when combined with live drums and heavy syncopated riffs, they gave rise to a new musical language.</span></p><p><br></p><p><img src=\"/storage/images/0a8ca26d-7fc2-45bd-b833-9c0c33cc64a7.webp\" alt=\"Slipknot_@_Claremont_Showgrounds\" width=\"640\" height=\"963\" loading=\"lazy\"></p><p><sup>Photo by Stuart Sevastos, <a href=\"https://creativecommons.org/licenses/by/2.0/\" target=\"_blank\" hreflang=\"en\" data-as-button=\"false\">Creative Commons Attribution 2.0</a>, converted to WebP </sup></p><p><br><span style=\"mso-ansi-language:EN-US;\">So, if a new work has no ties to the past, are we still talking about innovation? But then, where could the future of metal come from if not from its own past? From out of nowhere? Or perhaps from increasingly clumsy reinterpretations—different, or disconnected entirely from heavy metal?</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">According to <a href=\"https://briefbookreviews.com/a-singular-modernity-essay-on-the-ontology-of-the-present-by-fredric-jameson/\" target=\"_blank\" hreflang=\"en\" data-as-button=\"false\">Fredric Jameson in A Singular Modernity</a> (2013), innovation arises when the past remains visible within the new work. This is similar to tracing over an old drawing with a new sheet of paper. The original lines are still visible beneath the new ones, even though they now form a different image. That tension—between what remains and what has changed—is what allows us to perceive it as something genuinely new.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">As Reynolds rightly says, those moments where innovation appears out of nowhere don’t happen often. And I think the example of Hendrix is exactly what happens in most cases; it was the push of blues and rock ‘n’ roll that gave way to the psychedelic rock of the 60s, which represented “the new” of that decade. So, if that’s how it happened with Jimi Hendrix—which I believe it did—it was also the case with Motörhead, Judas Priest, and Black Sabbath, where the clichés of the 50’s and psychedelic rock, were replaced by a “bastardized” current. The concrete jungle, mosh pits, worn jeans and leather jackets all replaced a hippie culture wrapped in social causes and anti-war ideals.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">But after going through the NWOBHM era and thrash, metal’s story seems to enter a cycle where the new becomes more and more like the old—just faster and more technical. This repetition of musical patterns doesn’t prevent change, but it does limit its ability to surprise.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">Between Black Sabbath and Venom there’s a progressive shift: Tony Iommi jazzy groove gives way to an increasing urgency for speed and intensity, as if chaos itself was the first ripple of a tidal wave to come. From Venom to Mayhem, that urgency is pushed to ideological and folkloric extremes. Was it really the beginning of something, or the source of metal’s most glorified clichés? Both. While injecting more energy, more chaos, and more theatrical control. Metal also introduced its own playbook—one that resists change when it comes to innovation.</span></p><p></p><div data-youtube-video=\"true\" class=\"responsive\"><iframe src=\"https://www.youtube.com/embed/2hadGUw2tpk?si=Eh-L2GeBdD5Wtkzi?controls=1\" width=\"1600\" height=\"900\" allowfullscreen=\"true\" allow=\"autoplay; fullscreen; picture-in-picture\" style=\"aspect-ratio:1600/900; width: 100%; height: auto;\"></iframe></div><p><span style=\"mso-ansi-language:EN-US;\">Personally, I would say that thrash metal might have been one of the last truly relevant creative expressions of the 80s, because from that point forward, what followed was more speed, a race to become the most morbid, satanic, with the most disturbing album art possible. A textbook formula that remains in effect.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">Even though I enjoy fast metal, and would lean towards technical death metal, I often find myself gravitating toward doomier, heavier, caveman-like riffs over extreme genres like black or death metal. Still, when talking about the rhythmic pattern required by thrash blitz and surgically precise palm muting, like in Sylosis, also means recognizing its limitations—the same ones it shares with death and black metal. Without blast beats there is no death metal, and without shrieking vocals there is no black. But isn’t that how musical styles work in music, by relying on recognizable elements? So then, to what extent can extreme metal innovate if it doesn’t challenge its own sonic and thematic values?</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">As long as the obsession with tradition is preserved, cliché will continue to reign.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">In an interview with Dead by Dawg, Jeff Becerra from Possessed rightly said that in the early days, copying other bands was considered “the lowest of the low.” That still holds true, but what if instead of becoming heroes, they became victims of their own creation? Because by taking the same foundations but pushing them to a more extreme conclusion, did they stop offering new concepts?</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">No. Of course death metal did bring new techniques for creating increasingly repulsive sounds. From the guttural way of singing to rhythmic structure, lyrical themes, and sonic density, there were changes. It’s true that Chuck Schuldiner was much more forward-thinking that probably the entire subgenre at that time. But saying the rest didn’t reinterpret what was already established might be too limiting: bands like Morbid Angel, Gorguts or later with The Zenith Passage have all proposed important stylistic shifts.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">Still, in my view, it’s hard to find something truly worthwhile in a sea of similar, maximalist bands. In that sense, death metal was both a breaking point and a consolidation; it innovated in the beginning but quickly crystalized into a formula that few dared to question.</span></p><p></p><div data-youtube-video=\"true\" class=\"responsive\"><iframe src=\"https://www.youtube.com/embed/YHvq9ktWUcY?si=LtZqqUa36V5xtVvI?controls=1\" width=\"1600\" height=\"900\" allowfullscreen=\"true\" allow=\"autoplay; fullscreen; picture-in-picture\" style=\"aspect-ratio:1600/900; width: 100%; height: auto;\"></iframe></div><p><br><span style=\"mso-ansi-language:EN-US;\">So, if there ever was a true quest to discover the future of metal, that search has become enclosed—mostly in well-known patterns; technicality, demon imagery, and morbid themes with decades of tradition. Far from breaking with the past, many of these expressions seem to intensify it to the point of exhaustion.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">This seems to illustrate what Vladimir Jankélévitch (which I luckily found after Simon Reynold’s post) warned about in <a href=\"https://press.princeton.edu/books/hardcover/9780691090474/music-and-the-ineffable\" target=\"_blank\" hreflang=\"en\" data-as-button=\"false\">Music and The Ineffable</a> (1961): a musician can be innovative without needing to invent something completely new. However, the modern obsession with technical novelty transforms music into a thing—an object measured by its speed, power, or complexity. Under this logic, progress stops being inspiration and turns into an endless competition; faster, stronger, darker. The new doesn’t emerge—it’s just the old being stretched out.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">It sounds crazy, but it’s not a lie to admit that the culture of elitism and “gatekeepism” becomes stronger the deeper you go into extreme subgenres. A source who knows the terrain of heavy metal far better than I could imagine—or even Vladimir, of course (we are not worthy)— is Cronos from Venom. In 2022 he was asked about Norwegian black metal:</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">“Definitely. It was so dark and so evil. It was the next generation. But it also created what I call the ‘black metal police’ — all these people going, ‘This band is black metal! This band isn’t!’ And I love this one: ‘Venom aren’t black metal!’ Ha ha! I just wish they’d come up with their own term, like Norse metal. That’s what I say to these guys: “You’ve stolen my term, but you’re not really black metal, because black metal is power metal, speed metal, thrash metal, death metal — all the metals together!’”</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">A very different concept from many others, where for Cronos, black metal meant a unification of all the subgenres of the time—before it became “the only valid representation.”</span></p>',NULL,NULL,'Is Metal Still Innovative? | Simon Reynolds and the Future Shock Question','How can subgenres like black and death metal innovate, when they are so inclined to repeat its own playbook?','published',0,'story',130,NULL,NULL,1,NULL,NULL,'2025-08-03 06:15:14','2026-02-01 15:48:29','2025-08-03 07:12:09',NULL,NULL),(6,1,NULL,'The Poseur Archetype According to Carl Jung, why black metal \"eliteness\" doesn\'t sit right with me.','posers-in-black-metal-carl-jung','How would Carl Jung describe what a poseur is? No hate, these are just my thoughts on black metal \"eliteness\" and its take on authenticity.','<p><sup>By Rockman - Own work, CC BY 3.0, <a href=\"https://commons.wikimedia.org/w/index.php?curid=10949334\">https://commons.wikimedia.org/w/index.php?curid=10949334</a></sup><br></p><p><span style=\"mso-ansi-language:EN-US;\">I may not win myself any new black metal friends with this, but please understand: I was never wired to become part of the herd—even when it comes to something as outcast as metal.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">In retrospect, maybe the “outcast” part is what I love most. Because deep down, I desire to be left alone.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">That, of course, brings more problems than perks. It makes it even clearer, at least to me, why I’ve never felt “comfortable” with the black metal mentality. Why I don’t see its icons as heroes or cherish the genre’s history and accomplishments.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">I actively seek ways to be more inclusive because by default I’m not that extrovert, and by default I’m not always in the mood to be talkative. But I choose to change my mind and act on it every time I can as a way to not be so enclosed with my own thoughts.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">But back to the real topic.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">This all started because someone posted a recreation of the “classic photo” of <a href=\"https://images.squarespace-cdn.com/content/v1/53cd477de4b0fa81a6994019/1405963974275-QTZVRIAAA33K3BKDXTDC/13_kvitrafnreaction.jpg?format=750w\" target=\"_blank\" data-as-button=\"false\">Kvitrafn at Kjellersmauet street</a>, taken by Pete Best for the book &quot;<a href=\"https://www.peterbeste.com/#/tnbm/\" target=\"_blank\" data-as-button=\"false\">True Norwegian Black Metal</a>&quot;. To be completely honest, I had no idea this photograph even existed. I just recently learned about its context—let alone its history—because, again, I don’t actively pay attention to black metal in that way. (That said, I’ve got a new piece coming soon that includes ritual black metal—so when a topic really intrigues me, I do make time to dive in with integrity.)</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">Yes, I do enjoy some black metal, but as you might’ve guessed, my interest is as casual as picking up a book about the history of baseball. There’s obviously a huge detachment. But that doesn’t mean I go around bad-mouthing it just because I can.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">For many people, black metal represents the only valid form of metal and extremity—and that’s okay. However, I don’t feel any kind of specialness when I listen to it.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">And the same logic applies when someone thinks Sleep Token or Ghost is metal. Sure, it’s metal “by association,” at best—but I don’t make it my business to hurt, defame, insult or belittle them for it.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">But one thing I do absolutely despise—so much that I find it intellectually laughable—is the eliteness of it all.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">That gatekeeping mentality.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">To me, it honestly feels like “reverse poseurism syndrome.” And it’s kind of hilarious. And that’s where Carl Jung comes in.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">He may have never listened to this kind of music, but somehow, he casually nailed the archetype. In <a href=\"https://en.wikipedia.org/wiki/Psychological_Types\" target=\"_blank\" data-as-button=\"false\">Psychological Types</a> he writes:</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">“The object assimilates the person, whereupon the personal character of the feeling, which constitutes its principal charm, is lost. Feeling then becomes cold, material, untrustworthy. It betrays a secret aim… instead, one scents a pose or affectation”.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">In other words, poseurism isn’t just about taste in music. It’s about sacrificing your personal experience for the sake of belonging. Adopting the aesthetics, the talking points, and the “correct” opinions, while repressing your own emotional response—just to gain approval.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">Funny enough, this ties into a quote <a href=\"https://sickofmetal.net/post/black-death-metal-modernism\" target=\"_blank\" hreflang=\"en\" data-as-button=\"false\">I shared in another post</a> about Vladimir Jankélévitch and what he writes in Music and the Ineffable (1961):</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">”Music stops being truly progressive when it becomes an object—measured by speed, power or complexity.”</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">And that’s what Carl Jung is getting at: When your outward expression is no longer authentic, it feels off. It smells fake. It is fake.</span></p><p><br>M<span style=\"mso-ansi-language:EN-US;\">aybe that’s why black metal “eliteness” makes me uncomfortable. Because the moment it demands loyalty to a set of behaviors or beliefs—or worse, to an image—it stops being music, and becomes a cult of identity.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">I’d rather stay alone than pretend I belong. What would you say counts as a poseur?</span></p>',NULL,NULL,'How would Carl Jung describe what a poseur is?','How would Carl Jung describe what a poseur is? No hate, these are just my thoughts on black metal \"elitness\" and its take on authenticity.','published',0,'standard',76,NULL,NULL,1,NULL,NULL,'2025-08-07 04:05:41','2026-02-01 04:51:28','2025-08-07 04:05:41',NULL,NULL),(7,1,NULL,'Methwitch: pushing extreme metal into uncharted territory—brutality and \"outer-space\" weirdness','methwitch-extreme-brutal-metal','This one man band dares to redefine extreme metal. Methwitch sits somewhere between brutal and \"outer-space.\"','<p><span style=\"mso-ansi-language:EN-US;\">If melodies were a luxury, and standard metal chord progressions or the usual metal tropes were rare commodities, Methwitch would be the gatekeeper—hoarding anything that remotely resembles “normal” in the world of extreme metal. Out of the 15 track-album on Indwell, the only track I found familiar was “Spiral”, and that’s because it’s one of the few with a “clean” chorus.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">Expect chaos: shrieking vocals—not in the black metal sense, but more like a deranged alien.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">Somewhere in “Teeth Like Nails”, there’s a timid, almost shy attempt at a melodic passage—death metal-ish. It’s not clean; just more riff-oriented.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">But enough about the “how” of its sound.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">The idea behind Indwell seems to be about sounding less familiar within an extreme metal context. There’s not a lot of common ground with other extreme bands, and it’s not because it goes harder or pushes the old idea of “extreme” deeper into another dimension, but because it’s simply unconventional; weird screeches, strange background noises, and experimentation lingering around.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">Overall, this isn’t just a clever mash-up of two subgenres—It fits within the deathcore spectrum, yet without the genre’s addiction to breakdowns and low gutturals.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">Released in April 2020, during the pandemic, Indwell is a solo project by Cameron McBride, who handled vocals, guitars, bass, and drum programming. He’s been making metal since 2014, and with Methwitch he <a href=\"https://www.metal-archives.com/bands/Methwitch/3540397896\" target=\"_blank\" hreflang=\"en\" data-as-button=\"false\">fuses the nastiest brutal death metal shit ever</a>, with perhaps deathcore, hardcore and some industrial metal elements.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">I remember asking on Threads about the weirdest metal album people had heard, and this was one of the recommendations—I remember thinking “Methwitch” sounded like a doom metal band but boy was I wrong. Other tracks worth checking out are: “Burn Victim”, “They Stare Back”, and “The Power of the Laser Beams”.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">This is Cameron’s <a href=\"https://www.metalcentre.com/2017/09/methwitch-interview-with-the-band/\" target=\"_blank\" hreflang=\"en\" data-as-button=\"false\">third Methwitch album</a> but beyond metal he’s explored projects <a href=\"https://www.reddit.com/r/Deathcore/comments/vgpdqw/what_are_everyones_thoughts_on_the_band_methwitch/\" target=\"_blank\" hreflang=\"en\" data-as-button=\"false\">far removed from extreme music</a>, ranging from hyperpop to surf-grunge, punk, black metal, straight edge, and more.</span></p><p><br></p><div data-youtube-video=\"true\" class=\"responsive\"><iframe src=\"https://www.youtube.com/embed/iKfPBWh8i0k?si=obUfKujN41UiV63F?controls=1\" width=\"1600\" height=\"900\" allowfullscreen=\"true\" allow=\"autoplay; fullscreen; picture-in-picture\" style=\"aspect-ratio:1600/900; width: 100%; height: auto;\"></iframe></div>',NULL,NULL,'Methwitch: pushing extreme metal into uncharted territory','A one-man project pushing extreme metal into uncharted territory—Methwitch fuses brutality, chaos, and “outer-space” weirdness into a singular sonic experience.','published',0,'standard',69,NULL,NULL,3,NULL,NULL,'2025-08-09 06:04:47','2026-01-31 22:01:59','2025-08-09 06:04:47',NULL,NULL),(8,1,NULL,'Predicting Coroner’s New Sound: Will \"Dissonance Theory\" Live Up to Expectations, or Surpass Them?','coroner-metal-2025-dissonance-theory','Coroner returns after 30 years. Based on their current setlists, one question remains: how will \"Dissonance Theory\" compare to their old catalogue? A continuation of Grin? Mental Vortex? Or something entirely new?','<p><sup>By Grywnn - Own work, CC BY-SA 4.0, <a href=\"https://commons.wikimedia.org/w/index.php?curid=66358802\">https://commons.wikimedia.org/w/index.php?curid=66358802</a></sup></p><p><br>&quot;<strong>Non omnis moriar</strong>&quot; means &quot;I will not fully die&quot;, or more literally, &quot;not all of me will perish&quot;.</p><p><br>That phrase marks the return of Coroner after 30 years, it&#039;s where the band is currently at. Their tour kicked off across the Americas and is now rolling through Europe. And, as you might&#039;ve heard by now, it&#039;s the arrival of their new album—an idea that started brewing around 2022—but now, all that&#039;s left is awaiting October 17, when &quot;Dissonance Theory&quot; drops.</p><p><br>If you want to stay up to date with the band, you can always check their <a href=\"https://coronerofficial.com/#news\" target=\"_blank\" hreflang=\"en\" data-as-button=\"false\">official site</a> or social media (or, hey, follow a metal blog like this one, wink wink). But if you&#039;re looking for a timeline, <a href=\"https://en.wikipedia.org/wiki/Dissonance_Theory_(album)\" target=\"_blank\" hreflang=\"en\" data-as-button=\"false\">Wikipedia&#039;s got you covered</a>, the article already covers the main points, who&#039;s left the band, who replaced who, when it all started, and more.</p><p><br>So rather than rehash that info, what really matters to me is: <strong>how the hell is this record going to sound?</strong> Back in 1993, &quot;<strong>Grin</strong>&quot; leaned away from thrash a bit, and carried that unmistakably 90s funky edge—layered with introspective lyrics and proggy twisted riff.</p><p><br>So, what happens now? Do they steer away from the experimental side? Do they bring back sharper thrash riffs? One thing&#039;s for sure: it&#039;s not going to be some bizarre trap-metal meets prog-tech-death mashup.</p><p><br>Right now, all we have is one official music video and a fan-shoot YouTube video of &quot;<strong>Sacrifical Lamb</strong>&quot; that lines up with Wikipedia&#039;s setlist. For fun, we can guess—and a guess informed by current setlist might get us close, but of course, it&#039;s not a confirmation.</p><p><br>If &quot;<strong>Grin</strong>&quot; (1993) marked Coroner&#039;s most experimental phase outside of thrash, then 2025 tells us something interesting.</p><p><br>According to <a href=\"https://www.setlist.fm/stats/albums/coroner-63d69e93.html?tour=2bdc6c02\" target=\"_blank\" hreflang=\"en\" data-as-button=\"false\">Setlist.fm</a>, the album they&#039;ve played the most in 2025, is &quot;Grin&quot;. That&#039;s interesting, though not necessarily conclusive—it&#039;s that the new record could carry the same experimental spirit that made &quot;Grin&quot; stand out. Those avant-garde detours and industrial grooves never felt like random add-ons—they were extensions of the same core ideas. Always intentional. And what I loved most was how their lyrics condemned without exaggeration... rare in metal.</p><p><br>At the same time, the <strong>second most played album </strong>this year has been &quot;<strong>Mental Vortex</strong>&quot; (1991), with setlist staples like &quot;<strong>Semtex Revolution</strong>&quot;, &quot;<a href=\"https://youtu.be/XDDw79qpqYQ?si=zj4v9E4soPaBwE-U\" target=\"_blank\" hreflang=\"en\" data-as-button=\"false\"><strong>Divine Step (Conspectu Mortis)</strong></a>&quot;, and &quot;<strong>Metamorphosis</strong>&quot;. That matters because &quot;Mental Vortex&quot; leaned heavier into thrash—still technical and complex, but sharper, faster, more ferocious. The fact that these songs remain central to their live sets suggests Coroner is not only revisiting their most adventurous side (Grin), but also reconnecting with their most aggressive.</p><p><br>And it&#039;s not just about &quot;Grin&quot; or &quot;<strong>Mental Vortex</strong>&quot;. If you look deeper into the setlist there&#039;s a clear thread:</p><ul><li><p>&quot;<strong>Grin</strong>&quot; dominates with tracks like &quot;<a href=\"https://youtu.be/ZAecqq6DSO0?si=mIRSq3oQr6JMSMor\" target=\"_blank\" hreflang=\"en\" data-as-button=\"false\">Internal Conflicts</a>&quot;, &quot;Serpent Moves&quot;, and &quot;Status: Still Thinking&quot;. These embody their groove-laden, experimental era.</p></li><li><p>&quot;<strong>Mental Vortex</strong>&quot; follows closely, bringing in songs like &quot;Divine Step&quot;—a thrash rager that&#039;s just as technical and ambitious as anything they&#039;ve ever written.</p></li><li><p>From &quot;<strong>No More Color</strong>&quot; (1989) we still hear &quot;Die by My Hand&quot; and &quot;Tunnel of Pain&quot;, while &quot;Punishment for Decadence&quot; is represented by the iconic &quot;Masked Jackal&quot;</p></li><li><p>And then there&#039;s &quot;<a href=\"https://youtu.be/h8PUZptJp7A?si=ql6-qQWATBHkgTKC\" target=\"_blank\" hreflang=\"en\" data-as-button=\"false\">Sacrificial Lamb</a>&quot; first played in 2022 making its way into current setlists and possibly the final mix?</p></li></ul><p><br></p><div data-youtube-video=\"true\" class=\"responsive\"><iframe src=\"https://www.youtube.com/embed/3O8PtResaY8?si=L_9SmDrhY7SIOpX2?controls=1\" width=\"1600\" height=\"900\" allowfullscreen=\"true\" allow=\"autoplay; fullscreen; picture-in-picture\" style=\"aspect-ratio:1600/900; width: 100%; height: auto;\"></iframe></div><p><br>So, what does this say about the new record? To me, it suggests a hybrid vision: they&#039;re revisiting both their experimental edge and their thrash roots, while keeping technical precision front and center. A song like &quot;Divine Step&quot; is the perfect clue—blistering thrash, yet intricate and forward-thinking of early hits like &quot;<strong>Masked Jackal</strong>&quot;.</p><p><br>And then there&#039;s the actual song they&#039;ve put out, &quot;<strong>Renewal</strong>&quot;. It&#039;s heavy, crushing, groove-packed—proof that Coroner isn&#039;t softening with age. If anything, it sounds like they&#039;re aiming to deliver a record that&#039;s both brutal and brainy.</p><p><br>In other words, if their setlists are a map, &quot;<strong>Dissonance Theory</strong>&quot; might not just be a continuation of &quot;Grin&quot;. It could be a collision where modern experimental Coroner meets sharped-thrash prog with a new aggression willing to experiment it all at once.</p>',NULL,NULL,'Predicting Coroner’s New Sound: Will Dissonance Theory Live Up to Expectations, or Surpass Them?','Coroner is back with a new album after 30 years. How will Dissonance Theory stack up against their classics? Will it echo Grin? Mental Vortex? Or fuse both into something fresh for progressive thrash metal?','published',1,'standard',58,NULL,NULL,4,NULL,NULL,'2025-08-19 19:05:21','2026-01-27 02:34:29','2025-08-19 19:25:51',NULL,NULL),(9,1,NULL,'The Premodern Obscurity of Heavy Metal: Ritual Black Metal pt. 1','premodern-heavy-metal-ritual-black-metal','When we talk about funeral doom, ritual black metal, and drone metal, they share a rejection of musicality and a fixation on the ethereal.','<p><img src=\"/storage/images/4dbd1d4c-f698-4015-a3a4-7cc7bfb464cf.webp\" alt=\"Sunn O))) at Supersonic\" title=\"Sunn O))) live\" width=\"640\" height=\"966\" loading=\"lazy\"></p><p><br>Greg Neate, CC BY 2.0 &lt;<a href=\"https://creativecommons.org/licenses/by/2.0\">https://creativecommons.org/licenses/by/2.0</a>&gt;, via Wikimedia Commons</p><p><br></p><p><span style=\"mso-ansi-language:EN-US;\">Anyone deep into metal knows this music is not suited for the general public, be it for the alienating fast paced that’s nowhere to be found in popular music, or this whole “pseudo-satanic” and violent imagery ever so present in metal. Personally, if I’m driving, with people in the car, I just turn down the volume or don’t even play metal at all. Because I choose to respect the common welfare.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">Well, this is exactly part of what I wanted to address in this post because theres layers of obscurity, even for metalheads. There’s music that isn’t part of the “usual” thrash, doom, death black genres that seems “experimental” for heavy metal standards. Part of it is because its not musical at all, and other times it’s because its way too snobby—for the wrong reasons, if you ask me.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">As it turns out there’s some metal where the aim is to connect with the ethereal, as a way to engage in “rituals”; this music I would without hesitation call it “satanic music.” But theres others where the frequencies are used to convey some kind of spaced out droney kingdom. I’m talking about ritual black metal, funeral doom and drone. These, rather than relying on shock theatrics—and musicality at times—channel mourning, longing and dark spirituality—to me they stand in a completely different category from the aforementioned genres. No rebellious energy or chaotic metal for the fun of it. This is serious “business”.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">Diggin deeper on other music forms, these forms of expressions—those that try to convey some ethereal meaning into the music—isn’t exclusive to metal. You’ll find the same kind of split in other genres. Techno, for example—there’s a similar contrast between the bright, loud, hyper-produced sound of DJ’s like deadmau5 and Skrillex, and the introspective, ceremonial, immersive subgenres that Simon Reynolds wrote about in <em>Futuremania.</em> In his book he<em> </em>compared them to a can of Monster, while pointing to a rising countercurrent—ambient techno, enveloping and almost ceremonial. Its aim wasn’t to stimulate, but to return to what music once was: a social ritual.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">In that sense, the ethereal side of metal is a pitch-black hell waiting to summon some entity nobody needs—as far as I’m concerned—but in a sense, it feels like a return to a premodern way of experiencing music. A time before speed, guitar solos, blast beats and modern social components—social media—had to be consumed and presented every 5 minutes.</span></p><div data-youtube-video=\"true\" class=\"responsive\"><iframe src=\"https://www.youtube.com/embed/uBmKrLKEjmw?si=XTV0gutum_GoRSAP?controls=1\" width=\"1600\" height=\"900\" allowfullscreen=\"true\" allow=\"autoplay; fullscreen; picture-in-picture\" style=\"aspect-ratio:1600/900; width: 100%; height: auto;\"></iframe></div><h2><br><br>Extreme metal as the Satanic Maximalist</h2><p><span style=\"mso-ansi-language:EN-US;\">Over time, metal has followed a progression—from raw energy to chaos, and eventually into the absurd </span>that pushes the human voice to sound like an animal. <span style=\"mso-ansi-language:EN-US;\">It’s a path that keeps drifting further away from anything “traditional” (and at times discernible) taking a turn that not even Cronos could’ve seen coming.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">At its peak, Venom has said they were in it for the shock factor wanting to provoke the press and the Church. While they were at it, they also ignited the imagination of a generation already consumed by consumerism so Venom’s idea of “heavy metal” already had a different reach from the usual band with ripped jeans, leather jackets and long hair; this wasn’t just about rock n roll it seemed, its saturated aesthetic was for a different breed already. And within that context, Venom gave the New Wave of British Heavy Metal its most satanic twist, crafting a mythology that still lingers in the cannon of heavy metal today.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">Looking at that short historical arc—and focusing specifically on black, death, thrash and grindcore—a recurring theme emerges: bands obsessed with speed, violent art, perhaps as a way to disapprove anything “mainstream”, and this growing fixation on the “devil”. </span></p><h2><br><br>Black Metal in the North: Origin, Conflict and Consecration</h2><p><span style=\"mso-ansi-language:EN-US;\">From what I could gather, the roots of black metal can be traced back to the anti-Christian sentiment of early pioneers like Venom, Bathory, Mercyful Fate, and Celtic Frost. But as a standalone movement, black metal truly took shape in the Nordic countries—especially in Norway, during what’s now known as the second wave in the early 1990s.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">What started as symbolic provocation quickly evolved into a sonic and philosophical cult.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">The Norwegian scene—with bands like Mayhem, Burzum, Darkthrone, Emperor and Immortal—laid the groundwork for what we now think of as black metal. Albums like “De Mysteriis Dom Sathanas” (Mayhem, 1994), “Filosofem” (Burzum, 1996) and “In the Nightside Eclipse” (Emperor, 1994, more than defining the genre’s sound, introduced an almost militant ethos of isolation, authenticity and anti-Christianity defiance.</span></p><p><br>If you speak Spanish, you might&#039;ve seen El Rubius, the spanish streamer, recalling what it was like to live in <a href=\"https://www.youtube.com/shorts/la-hbnffodc\" target=\"_blank\" rel=\"noopener noreferrer\" data-as-button=\"false\">Norway during the wave of church burnings</a> and the panic it triggered.</p><p><img src=\"/storage/images/e968e7bb-3902-4af7-8fde-567216bba072.webp\" alt=\"Impaled Nazarene\" title=\"Impaled Nazarene live\" width=\"400\" height=\"600\" loading=\"lazy\"></p><p></p><p><br>Verghityax, Copyrighted free use, via Wikimedia Commons</p><p><br><span style=\"mso-ansi-language:EN-US;\">In Finland, bands like Beherti and Impaled Nazarene took things even further—leaning into a more primitive, nihilistic approach. Meanwhile, in Sweden, first-wave icons like Bathory began shifting from speed metal into something more epic and pagan with albums like “Under the Sign of the Black Mark” (1987) and “Blood Fire Death” (1988).</span></p><p><br></p><p><span style=\"mso-ansi-language:EN-US;\">As streamer “El Rubius” recalls, this rise didn’t <a href=\"https://missmephistopheles.wordpress.com/2019/12/10/euronymous-and-varg-vikernes/\" target=\"_blank\" rel=\"noopener noreferrer\" data-as-button=\"false\">come without chaos</a>: churches were burned, <a href=\"https://rangeviewnews.org/25590/ame/murder-metal-mayhem-a-deep-dive-into-europes-most-notorious-band-part-one/\" target=\"_blank\" rel=\"noopener noreferrer\" data-as-button=\"false\">people were killed</a>, and a <a href=\"https://allthatsinteresting.com/varg-vikernes\" target=\"_blank\" rel=\"noopener noreferrer\" data-as-button=\"false\">self-destructive mystique</a> began to wrap itself around the genre—one that still lingers today.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">But beyond the scandal, black metal carved out an aesthetic and ideology where ritual, the occult and transgression became inseparable from the music itself.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">And this is where we’ll get into the other side of black metal. Where things tend to have an actual meaning and these aren’t just pagan or dark sentiments longing for some pre-historic past.</span></p><p><br>In this universe, the word &quot;ritual&quot; in black metal points to a deeper impulse—to restore something magical, liminal and communal to art. It&#039;s not longer just about sounding lo-fi or using demonic imagery to convey extremity. It&#039;s about channeling a presence, creating a space of passages, or invoking the sacred and the profane through sound. Over time, that aesthetic of rejection began to shift toward something more focused: a search for esoteric meaning.</p><p><br><span style=\"mso-ansi-language:EN-US;\">While the second wave often used Satan as a symbol of rebellion, many of these bands felt closer to romantic paganism or a pre-Christian nostalgia than to any form of actual devotional Satanism.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">By the 2000s, a new sub-movement started to form: Ritual Black Metal.</span></p><div data-youtube-video=\"true\" class=\"responsive\"><iframe src=\"https://www.youtube.com/embed/ihjaAUejrqA?si=bBvCn36Xexgbe3aW?controls=1\" width=\"1600\" height=\"900\" allowfullscreen=\"true\" allow=\"autoplay; fullscreen; picture-in-picture\" style=\"aspect-ratio:1600/900; width: 100%; height: auto;\"></iframe></div><p><span style=\"mso-ansi-language:EN-US;\">Here, music stops being just artistic expression—it becomes a magical tool, an initiatory process, even a devotional act.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">There’s no single doctrine behind it, but it often intersects with modern occult orders like <a href=\"https://en.wikipedia.org/wiki/Thomas_Karlsson\" target=\"_blank\" rel=\"noopener noreferrer\" data-as-button=\"false\">Dragon Rouge</a> or the <a href=\"https://en.wikipedia.org/wiki/Temple_of_the_Black_Light\" target=\"_blank\" rel=\"noopener noreferrer\" data-as-button=\"false\">Misanthropic Luciferian Order</a> (MLO). In these circles, ideas like chaos, death and darkness aren’t just lyrics—they’re spiritual forces meant to be embodied, invoked or passed through.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">This supports the idea that Ritual Black Metal isn’t for the listener—but for the initiate.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">At that point, black metal drifts away from being purely musical and becomes a practice of darkness. Festivals (Forlorn, Arosian Black Mass) start to resemble black masses. Bands like Watain, Saturnalia Temple and Ofermod, along with artist collectives like the Luciferian Flame Brotherhood, describe their albums as grimoires—tools, not just tracks—and see their work as part of a broader initiatory path.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">This descent into the occult pushes black metal toward a model that, in theory, rejects the socio-political structures of the music industry—record labels, mass marketing, the pursuit of an audience—yet remains paradoxically tied to them through underground economies and niche networks. The scene starts to orbit around a shared belief: to channel and express the chaotic energies of the anti-cosmic impulse. It becomes less about reaching listeners and more about enacting a ritualized vision—a path already walked by some of the genre’s most notorious figures.</span></p><p><img src=\"/storage/images/f8a87120-4f4a-4d55-a44d-a2bbef3713a3.webp\" alt=\"Jon N&ouml;dtveidt performing live\" title=\"Jon N&ouml;dtveidt\" width=\"920\" height=\"1301\" loading=\"lazy\"></p><p></p><p><br>Dissection_live_in_2005.jpg: Shadowgatederivative work: Elizabeth Bathory, CC BY 2.0 &lt;<a href=\"https://creativecommons.org/licenses/by/2.0\">https://creativecommons.org/licenses/by/2.0</a>&gt;, via Wikimedia Commons</p><p><br><span style=\"mso-ansi-language:EN-US;\">Even before his conviction as an accessory to murder in 1997, Jon Nödtveidt, frontman of Dissection, was already heading in that direction.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">While “Storm of the Light’s Bane” (1995) didn’t lean heavily into esoteric symbolism, his final album, “Reinkaos” (2006), marked a clear turn—it referenced the philosophy of the Misanthropic Luciferian Order directly and repeatedly. Shortly after the album’s release, Nödtveidt disbanded the group, played one final show, and then—in August of that same year— took his own life in what many have called a ritual act. He was found with a gunshot wound to the head, surrounded by candles, and an open grimoire in front of him—most likely the <em>Liber Azerate</em>, the central text of the MLO.</span></p><p></p><h2><br><br>The Divine Rendition of Chaos</h2><p><span style=\"mso-ansi-language:EN-US;\">There’s a unique band that adopts the aesthetic and sonic language of black metal, but redirects it toward an explicitly biblical, Orthodox devotion.</span></p><div data-youtube-video=\"true\" class=\"responsive\"><iframe src=\"https://www.youtube.com/embed/zHqG5Ll2bDo?si=NI9LubtTz1wKHUZu?controls=1\" width=\"1600\" height=\"900\" allowfullscreen=\"true\" allow=\"autoplay; fullscreen; picture-in-picture\" style=\"aspect-ratio:1600/900; width: 100%; height: auto;\"></iframe></div><p><br><span style=\"mso-ansi-language:EN-US;\">Far from being satirical or provocative, GOSPOD operates from a place of faith—borrowing black metal’s ritualistic atmosphere to express a form of radical Christian spirituality. What’s most intriguing is that the goal isn’t to “correct” black metal or oppose it. It’s through infiltrating the dark waves shaped by others over the years that GOSPOD shares his faith and breathes a new spirit into them.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">But this logic isn’t entirely new. In the 1990s, a Christian offshoot known as <strong>unblack metal </strong>emerged—adopting the sound, static and dark aura of black metal, but with an anti-Satanic, devotional message. It was a direct response to the symbolic occultism of the second wave.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">The Australian band Horde gained media attention by calling their sound “holy unblack metal” but Antestor had already laid the groundwork with “The Defeat of Satan” (1991) and “Martyrium” (1994), shifting from death/doom into a faith-based take on black metal.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">In 2023, GOSPOD caused a stir with the announcement of Pan—a work that moved away from Christian themes to explore the figure of the Greek deity. According to him, the decision was experimental, sparked by a personal alignment of symbols and dates, and not meant as a full break from theological imagery.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">Still, with the release of “Song of Solomon” in 2025, GOSPOD, returned to its spiritual core merging Orthodox scripture, byzantine-style chants, and shrieking black metal vocals. Rather than a contradiction, this oscillation between the Hellenic and the Christian reveals a living tension between ritual and metaphor.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">This kind of philosophical convergence positions metal as a symbolically available space—open to inversion, reinterpretation of values, and even displacement of symbolic character.</span></p><p><br><span style=\"mso-ansi-language:EN-US;\">Its plasticity allows chaos to become an offering, and the sacred to be distorted. Depending on the subgenre, intensity shifts. Sometimes, entering the world of extreme metal isn’t about speed—it’s about trance, repetition, and total presence.</span></p><p><br></p>',NULL,NULL,'Ritual Black Metal and the Premodern in Heavy Metal','An exploration of ritual black metal, funeral doom, and drone metal as forms of premodern, ethereal, and non-musical expression within heavy metal.','published',1,'story',57,NULL,NULL,1,NULL,NULL,'2025-12-19 17:51:03','2026-02-01 08:54:53','2025-12-26 23:02:45',2,1),(10,1,NULL,'Hexicon Interview: Raw, Intriguing Career','hexicon-interview-raw-intriguing-career','I reached out to these guys on Reddit and a few days later we cooked up an actual interview. Not bad, I\'d say, for my very first, haha! Hopefully there\'s more to come.','<p><strong>SickOfMetal</strong>: Let&#039;s start with the new single, &quot;Big Apple, 3AM.&quot; It runs on chuggy riffs and a mosh-ready tempo. What can you tell me about the energy or message on this track? And since you&#039;re based out of Pasadena, I&#039;m curious abut the local scene right now. What&#039;s it lke these days, and where do you see Hexicon fitting into it?</p><p><br><strong>Andrew Cox (drums): </strong>&quot;Big Apple, 3AM&quot; leans more into metallic hardcore than our previous releases. We were intentionally trying to keep it lean and mean, to do something a little different from our longer, proggier tracks.<br>Pasadena straddles the L.A. and Inland Empire/SGV scenes. There aren&#039;t a ton of shows in Pasadena specifically, because there are only really one or two small venues for metal, but we have put on a couple shows at the art space where Austin and I work, and are planning on doing more. We have also been building out a recording studio to hopefully help record some other bands in addition to our own. There are definitely some good bands around, and we are trying to support the scene.</p><p><br><strong>SOM: </strong>On &quot;Leave it All Behind&quot; (2022), some songs — like &quot;Black Rainbow&quot;, &quot;Nastrond&quot;, &quot;Coronation&quot; — felt layered and expansive, almost cinematic, reminding me of High on Fire but with more introspection. Then with &quot;Big Apple&quot; the approach is way more direct, and hardcore in its punch. How do you decide when a song should be more complex versus straight up? Was there maybe a riff, a lyric, or even something outside the band that set the direction of &quot;Big Apple&quot;? And since your sound moves between doom, thrash, and hardcore, are there certain tropes or clichés in metal you consciously try to avoid?</p><p><br><strong>Andrew: </strong>Thanks, yeah High on Fire is definitely a touchstone for us, and we can also get pretty moody and dynamic. On &quot;Leave it All Behind&quot; we were really swinging for the fences with song structures and changes. For &quot;Big Apple. 3AM&quot; we wanted to write something more immediate, and short, haha!<br>Our songs typically develop from jamming on riffs that Austin comes up with, and the structure comes pretty naturally from the feel of the song. We were talking about doing a 4 song EP based on the Ninja Turtles, so the title is from one of the levels in the Turtles in Time video game.<br>I don&#039;t know that there are any specific tropes we avoid, but I don&#039;t think we play any genre traditionally.</p><p><br><strong>SOM: </strong>Your backgrounds are pretty unique — Young&#039;s animation work on Metalocalypse and Vox Machina, Andrew&#039;s years at Hydra Head Records, Austin playing alongside bands like Helms Alee, Big Business and Old Man Gloom. How do those experiences shape Hexicon&#039;s music and vision today? Beyond that, what do you guys draw from — movies, books art? Is there a shared influence or concept that ties Hexicon together outside of music?</p><p><br><strong>Andrew: </strong>Our experiences tie into being metalheads/hardcore kids and giant nerds. Most of our music is pretty influenced by giant monsters and robots. We played Space Marine 2 together as a band.</p><p><br><strong>SOM:</strong> And finally, how do you guys see social media these days — as a tool, a distraction, or maybe both? It feels like the internet can be overwhelming, where everyone claims authority and only the loudest wins. In that kind of landscape, Hexicon feels like a rare discovery — still developing your sound but already showing real direction. What do you hope people find when they come across your music?</p><p><br><strong>Andrew: </strong>Social media seems to be a necessary evil for upcoming bands. I would love to not feel obligated to post constantly to goose the algorithm, and just release stuff more intentionally, and actually have people see it. It&#039;s crazy that the vast majority of our followers don&#039;t even see our posts. Social media is a sea of garbage that is just getting deeper with A.I. now. I hope people who find our music appreciate the work we put into it, and dig a little deeper into our releases.</p><p><br></p><div data-youtube-video=\"true\" class=\"responsive\"><iframe src=\"https://www.youtube.com/embed/sgwMRESHah8?si=IA3Z9v9vTOVpOYKg?controls=1\" width=\"1600\" height=\"900\" allowfullscreen=\"true\" allow=\"autoplay; fullscreen; picture-in-picture\" style=\"aspect-ratio:1600/900; width: 100%; height: auto;\"></iframe></div><p></p><p><br>More from Hexicon:</p><p><a href=\"http://hexiconband.com\">Bandcamp</a></p><p><a href=\"https://www.instagram.com/hexiconband/\">Instagram</a></p><p><a href=\"https://www.youtube.com/channel/UC01RsOIZL6_msytu7C-PcFQ\">Youtube</a></p><p><a href=\"https://tidal.com/browse/artist/4200795?u\">Music streaming</a></p>',NULL,NULL,'Hexicon Interview, Pasadena Metallic Hardcore','I got the audacity to ask these guys an interview and they happily accepted my request. This is my first one and it makes me feel like a \"true\" media outlet LOL','published',0,'standard',41,NULL,NULL,6,NULL,NULL,'2026-01-22 06:04:33','2026-01-30 15:38:09','2026-01-22 06:19:22',NULL,NULL);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reports` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `reportable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reportable_id` bigint unsigned DEFAULT NULL,
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reports_user_id_foreign` (`user_id`),
  KEY `reports_reportable_type_reportable_id_index` (`reportable_type`,`reportable_id`),
  CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(1,2),(2,2),(3,2),(4,2),(5,2),(6,2),(7,2),(8,2),(9,2),(1,3),(2,3),(3,3),(4,3),(5,3),(6,3),(7,3),(8,3),(9,3),(10,3),(11,3);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'member','web','2025-07-28 18:53:01','2025-07-28 18:53:01'),(2,'staff','web','2025-07-28 18:53:01','2025-07-28 18:53:01'),(3,'admin','web','2025-07-28 18:53:01','2025-07-28 18:53:01');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('1OpewM2Z1tjsmJdAJ3vnbUeCMb0N7hehpLYeAbh1',NULL,'195.178.110.68','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOHU3MDd3Tzl5OTBVZFE1cXJ5amVON1c2eFZ0QXphUThkNmhDNDRmVCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvc2V0dGluZ3MiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvc2V0dGluZ3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769985312),('1XmTDd2kMdjHLIISaAdp90Zn2Kg2uvsGFhdJl3GF',NULL,'178.156.215.180','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoieDUzUVhOQnhTR2ZlS3kzUXRMNjE4RHVOVUdWMjlQTmZJSWFudW1tQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0L2NoYW5uZWxzL21ldGFsLWRpc2N1c3Npb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769960909),('24DVeK6lqwIIacdy9Q1o3aPVstmLpBnXSYNQPOZA',NULL,'195.178.110.68','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTk55SFBEVFladVVlRWNoTnpYS0M3c09mbUl0YUdpSDBRYlFobTluSSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvc2V0dGluZ3MiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvc2V0dGluZ3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769985318),('4dtIbAxVOpM8atFkQCWlihk1Jw4pi3kWryeor8ts',NULL,'195.178.110.68','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoibXpCZExwaDZuSkNwWFVxbGNDTExSMUFoajkzWmtzOXR0VHluMnQ5RCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvc2V0dGluZ3MiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvc2V0dGluZ3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769985307),('4w1z3rHK95EdbwvACvEGLeTgy1T6drPRcREBnwCj',NULL,'34.177.100.148','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNzdPSWFzelUyWFBmcXdVRGdjSWtPRG9iMUlDbXlRMUZEOTl4TFZsRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769957719),('6Z2qlEbGyiUYak0dju5CKT87c9NZADM7c6Lf3WWj',NULL,'45.154.98.236','python-requests/2.32.4','YToyOntzOjY6Il90b2tlbiI7czo0MDoiQ3NEc05lbUttTzNUeHdyMWtuWFg5ZWgzcGxQODczNU4zR0xlVHFZVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769947009),('75we62E7fEutkiPDlxC1XJDWnx5c4vjrXNPYljc0',NULL,'173.252.79.6','facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3luOFBhU0pKa1F2dzdrM0tHSGp3QUlpd2FEb2tDRW1vdzY2cTlPeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTcyOiJodHRwczovL3NpY2tvZm1ldGFsLm5ldC8/ZmJjbGlkPUl3WlhoMGJnTmhaVzBDTVRFQWMzSjBZd1poY0hCZmFXUU1NalUyTWpneE1EUXdOVFU0QUFFZVNrTUUwbFUzdmVscWRJaVJLMndNa0I4UVF5bmRmMHhCTWJCOUE4aTVQR1I2X2hleVFPXy1VZXNBdHlrX2FlbV9zZjVtOGlpZUh4Ni1PLVhoVGVTdzl3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769973544),('7apxPpqBEXjvt33VwvbpkNajXB6U8BoYS7GESSPq',NULL,'195.178.110.68','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoic1BmMWNKeTZrOWQ4VzY0dEJWZjJlRXZKd0JSV2EwRm50eEJjQjlZWCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769985289),('8nX3TDVceLgbKl8SlG2NpCu3F4xEa4iVn4L3DnVk',NULL,'202.8.42.4','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSFlMcUpLVXVkZVE4aDBUbGVLQW53Mkd3dGVQbGFFTnVXSkFBRlFjRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Lz9qc29uPXRydWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769968316),('99WXqoW1hEPu09qDfQDZ6VnBNWkparNNbYhTnDPx',NULL,'51.68.107.161','Mozilla/5.0 (compatible; MJ12bot/v2.0.4; http://mj12bot.com/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoidTFpTjlEU1FRSGw5ak1WZXpCM3N5NUxoU2pEZ0xUYTF3UUFYdzBGZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769984669),('9kTniDdGIPcfY6AL3tZcbZ4vl6vDeQ1T8amApogP',NULL,'176.213.124.119','Mozilla/5.0 (X11; Linux i686 on x86_64; rv:48.0) Gecko/20100101 Firefox/48.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDZsbWpiWW5ONFFGa0pBQWFYUnR5SWVpNGJ5bmhyT3pkNlJNM3QweCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769969354),('9Vw5gysTSZHl0fS3fT45qbM2JTewisJyYbQwf3rb',NULL,'71.6.134.235','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2EyNFZXRUF1MURUVkluSkk2VnVCN3hOQkVkMjFHYk1RM3A1RnQwYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vc3RhZ2luZy5zaWNrb2ZtZXRhbC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769973164),('AArHaqSGxOrch549GqMOlZojbO3cnBtm2vwYwQLr',NULL,'194.164.107.5','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMmFoYmVBb3lST2pJaXU5dXdkVVFVQlZ6QnBJZnFFcFdEWmhzRWhWYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LnN0YWdlLnNpY2tvZm1ldGFsLm5ldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1769997768),('axkjnqYqj8KmmW9gaQTGlvQsg1R71lywkhPwhx4V',NULL,'31.13.127.1','facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFU1UnpoSVA1U3QxbDBJT1pKZHA5MTVoTHpiWVUwZVhEdDdYSkNUTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769979113),('AycWIfGYklEq3oo9Op6MUnwMXIBubcdiNxpaYROF',NULL,'198.186.131.58','Mozilla/5.0 (X11; Ubuntu; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2737.57 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUzdRUzl2NUVqZDlVVHJhakVubVUyczFiZEZleGN4ckdVNHByZHczOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vc2l0ZW1hcC5zaWNrb2ZtZXRhbC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769955518),('b5Zv5mjp9Jn9YJxqL3DMHtpe2NyqAkLICK6j9Pes',NULL,'195.178.110.68','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT01wSnJZWWtEdkJBTndOTUw4NGI4bEd2bmdrUW1sR3FDQUJKOThQNCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769985300),('bel9CfHTeGAkT7napbrnotdurm1DVp7J1ylM7loT',NULL,'195.178.110.68','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoibEc0UUtHRlJ2VjBmTjYxdjRWclpPSEdZZU5aYUhHa1NWalN1ZXFVNCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvc2V0dGluZ3MiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvc2V0dGluZ3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769985315),('BlIovdxfvAB957WGoqB5UnPdgWUmYAGipPJSofAn',NULL,'143.244.157.167','Mozilla/5.0 (X11; Linux x86_64; rv:142.0) Gecko/20100101 Firefox/142.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaDREelluUGlqajRrZG4yNnV4aElzWUtjMnVMbzZOdTJta0JtYmNKaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769981849),('BxzTa1kMNnrmhWNV50bBnYMwb2XHh8DH9yeflkni',NULL,'195.178.110.68','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM1FxQlhldVVOb3Z2bHpVS2szeE9oakFGTzE0WllCOEVGQjF2aEdmRyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvc2V0dGluZ3MiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvc2V0dGluZ3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769985308),('C4lvq9XpdVnsGguxDNUPnnaWgskrwXUrbkSP3ZA7',NULL,'192.36.136.8','Mozilla/5.0 (iPhone; CPU iPhone OS 17_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.3.1 Mobile/15E148 Safari/604','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVdqZ3d6QVpUY1h0V2pSWHJCVHMyT1JuMXVPSHpaQVZjbjRmdnlYeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769996887),('ChxKKAo7jnRwgs2SIELCBwEGFGh0mq477eR2DujD',NULL,'173.252.107.113','facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)','YTozOntzOjY6Il90b2tlbiI7czo0MDoib0RPVEtadElhMHA4anZ1YVhHdnc3Tm1DbkNXb3dzQlJMZkNEWTB2cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769973505),('ciMCTEpsxummle7qHGVQGLrw13tHKDm5T5PGPJ43',NULL,'5.161.53.169','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoia0ZSaTM0aWFVTkNJa2dnQlBxd2hENGVIMTg1V0x3bHZ2c09KZ29iZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjA6Imh0dHBzOi8vd3d3LnNpY2tvZm1ldGFsLm5ldC9wb3N0L2JsYWNrLWRlYXRoLW1ldGFsLW1vZGVybmlzbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1769960909),('dF4sX7Q565yAxS5l1FrFyESWOgqQUZRmEw1HdiNN',NULL,'173.252.87.21','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoicHhwYlN2eVI3WGJPY25QTE5XOHg0Y2YxQ0NHTzFmb0RxOUhucTlCdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTcyOiJodHRwczovL3NpY2tvZm1ldGFsLm5ldC8/ZmJjbGlkPUl3WlhoMGJnTmhaVzBDTVRFQWMzSjBZd1poY0hCZmFXUU1NalUyTWpneE1EUXdOVFU0QUFFZVNrTUUwbFUzdmVscWRJaVJLMndNa0I4UVF5bmRmMHhCTWJCOUE4aTVQR1I2X2hleVFPXy1VZXNBdHlrX2FlbV9zZjVtOGlpZUh4Ni1PLVhoVGVTdzl3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769973508),('f0ktjNItcTVaaSosOh6XudTB2tcayoH6CkYaFXiN',NULL,'195.178.110.68','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMHA3VnJ1MmdLWFlnZ0YxN3lIMFliVWhoYW13Wlh3RjgzNUVpbHdDcyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769985299),('FXln23o4hs2EqR8dRwOoyJ0Zb1a0mORMCsYkbV6b',NULL,'195.178.110.68','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVXAyVEtacmpwRG5CVUIxZzh3Vm5JeVA0dEJpQmZCcUQ4dm1kUHlFeiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvc2V0dGluZ3MiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvc2V0dGluZ3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769985314),('ggXnt659PBSk6Je8AMIaoc3eWh6QJ85ER0Gjux8F',NULL,'185.141.88.126','Mozilla/5.0 (Linux; U; Android 13; sk-sk; Xiaomi 11T Pro Build/TKQ1.220829.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/112.0.5615.136 Mobile Safari/537.36 XiaoMi/MiuiBrowser/14.4.0-g','YTozOntzOjY6Il90b2tlbiI7czo0MDoic3VqV2NZSW5DU0lBbHdsZndhdzZ6VXhEQnZ1RHBlcmZoWWNNT09LTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769999252),('giruekJzwX14C53VM8I9sq3pD5caqwPJD0ZZjx3D',NULL,'195.178.110.68','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZFUxMnN0dE9mRk5uRzUyaXplUW1sMzI3MFFLR1gxcTVROWtUM2ttVCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769985296),('gM75Q8KwUrIrQR0sibRKUkXLgQd3Q3oF5yBWrp6b',NULL,'14.215.163.132','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWDE1WGo5eEcyWW9Rb1JBRWZGMFg1QklFeDFhcFJjdFdPWWpHWTlaVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769974804),('gPT650k5wJ24ddYBYcObQ108YBaJZYpdf47yqML0',NULL,'178.156.213.252','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoic3VJRFE0a2RBbFAyQ2V6WlFXblZWSWpGeWF3ZFhxQlE1Y3dGV3p4dSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0L2NhdGVnb3J5L2FsYnVtLXJldmlld3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769960910),('GURRSzx8zU5qnJ8gCanwfRffR8kakMGPlc3Oq8j5',NULL,'43.159.143.187','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoib3FQaTRkbUxjaU44MHgzYjRFS0czY1o3U0h5bmRBa1VKSGlHSEh4NyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769951349),('hxDkyaeQXO0VaSLIrcEQQCOC7cUW533YDwtj2L0Y',NULL,'93.157.63.44','Python/3.11 aiohttp/3.11.11','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRjJrQmZJTVRoMloyZFhHb1ZUdUxwaExnb25NbHp1OWNKTDd4NjBkcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769954014),('jDEZgKg1ny0GZG6Bh4GAPZRJC7yWoRARGoqLJPlw',NULL,'2.58.56.55','Mozlila/5.0 (Linux; Android 7.0; SM-G892A Bulid/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/60.0.3112.107 Moblie Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRlJmV1BLM2NQR0pwb0Fmd0dXVFhza2dzdEtBRjhRZ3NkUFJCSmZwaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769961957),('JnodizjSoea65XruD9WFabritavrId4ggMDPvpxw',NULL,'43.164.197.209','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiS1N0NGM5ZlZDak54N200a3FOWm5sT0t2WHIwTWRpWEJGajl5aG80ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769976793),('Jy8SHbLb7A9OcObb5W8jYiFRWZrPt2GLPuercmit',NULL,'199.168.98.202','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3JCOGp5VHZFb0VIZUhad3RWbHNueWQ3TWxud3dBZkNES1RQVVU4diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0L2luZGV4LnBocD9wYXJhbXM9Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769994503),('LL2eU44qMFXudIJfyvqPCcKk5lbCYgYGztxclRT8',NULL,'195.178.110.68','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidGUxcTVKQWU4MUIyVlV2bjFWU3RHT3VlYjZiTkFCUDJGZkJYMERIcyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769985298),('lMvXF7SuIqF8g31sJ344R5WvsrdPuU5ChDIYZpGB',NULL,'176.97.123.28','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiejlsN3pYcVNLR2NlQWloUFlzQUF6b0VWOW1lTlV6OVNQdkpLQXl3ZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769948575),('lQR5vzdtSNW9VCwpvYm9kQoEVTkz4wb8i0C9yo73',NULL,'195.178.110.68','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWndYT01NWGpaOUxFZE5STVplRllaR1dpTU15ZkI2NTBqU0FFdjNlTCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769985291),('LrPwMwfjCTpsevS8a2eSgoCF4XRsfJuo4NSQMuRQ',NULL,'142.44.233.65','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoicUNoRUlvbFBPTFpuUXlFcnpMaEVEWFIxM3JsWkhlYmpNYmZNWkV4cSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0L2NhdGVnb3J5L2hpZ2hsaWdodHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769955119),('MVaObVXOm1iGDZubdSTQOr2emNZTwGXqDDmRmOgZ',NULL,'71.6.134.234','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYVNjZllqS2FUZjNQV0ZDU2ZoYUdCYnJxZWFjNmhBbm1abDlhaUZmeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769971108),('O3NstH9Z2RYiYtfYWud8DulJ0xTkv7hL8vzRzD7f',NULL,'173.252.79.20','facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)','YTozOntzOjY6Il90b2tlbiI7czo0MDoic3VDaXZYenYzY04zbWRqSlVRTDBPdlc4ejRHUjloVzZLUnVZUXBiUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769973505),('oB5qwmkxV0nUh7cgIvr5Z1Er2LtRFNhyZNFfzbiu',NULL,'176.213.124.119','Mozilla/5.0 (X11; Linux i686 on x86_64; rv:48.0) Gecko/20100101 Firefox/48.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoicEptTmhNNnlETkpWWm9ibUt3Q25xNEJRZGdBb2RERVBGZTFFc2t4WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769969379),('ow1XdWq4uUssjp2znf7umBRZX1AIK7MUoOGjDn0c',NULL,'64.89.163.4','Mozlila/5.0 (Linux; Android 7.0; SM-G892A Bulid/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/60.0.3112.107 Moblie Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiak5KZ2ZmN2hiNlZVQ2pGUlB2Vko4eWtMbjBRTGRUcm8xVmpMNGdNOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769952136),('pNA3E3RvsOabmIjmk3XwkjxzHe2ELhpOaB18nYld',NULL,'195.178.110.68','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMElkQ2RtQlVVQmxCRjJKaDd0QUZzdmU3MEd3OElYRFY1a3JxVnpjWSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvc2V0dGluZ3MiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvc2V0dGluZ3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769985310),('qI2IjVCIvad3YvQD2YHsVASBbncpzFnpyV7JGQ5R',NULL,'51.68.107.161','Mozilla/5.0 (compatible; MJ12bot/v2.0.4; http://mj12bot.com/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoia2dpZlRRUWhmTjZuaXp0Sng4Q2RMNTVoTWtET002OWIwb2M5U1FmcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LnNpY2tvZm1ldGFsLm5ldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1769984671),('SH3ekr9PAykkb6pV9aAvUjRs9biHzSRj5CWbwHLb',NULL,'162.62.213.187','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoieWEzVVI2Y0xLcXlzOFVkMzhXbEZ0M0o2MVdUS25yQzNBY1ZheTVBRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LnNpY2tvZm1ldGFsLm5ldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1769962433),('SidXXvxtmNnZb0AiQG2MhiIJKgS3kdFGcQNDro7s',NULL,'185.242.3.45','python-requests/2.32.4','YToyOntzOjY6Il90b2tlbiI7czo0MDoiYVE5UmttUVhqNEpMNG1nRExUS2w0ZHZDNEtpc1dYMlY1dm5KUFBIciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769957735),('SYm9z0fbxalvyzsykioJzMrT8Tcl6K0T3eata3yd',NULL,'195.178.110.68','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT2xwd29kWVRPc1RNOWJkOFRvVU5xOFBqQ0h1Q2hPRjdob0VaZEdvRiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvc2V0dGluZ3MiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvc2V0dGluZ3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769985316),('T8IW0pDbGzV0hBU828LiLyx3H1dbcZ58P800cMHe',NULL,'195.178.110.68','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTnNqWndQdWNQVnRsWUJQY01jRUlLNXdkR1hxYUlJNGxJYUJZUGdOSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHBzOi8vbWcuc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769985209),('TJJf5ztnEpMXq41cWzMxbYIOQieuTnP5a3JiUB4w',NULL,'213.35.97.64','Mozilla/5.0 (Android 13; Mobile; rv:117.0) Gecko/117.0 Firefox/117.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNnNITEhDY0dLN0FCRmFRRnlCWUxkWG1XY0tJd1dNOGVZbm5yVEhPciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cHM6Ly9zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO319',1769971804),('TtJ6joiO2p3icgZwidaPO7pBWOQLgzBdrilHwrkH',NULL,'195.178.110.68','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY3hCYThGT203SDVtQUFsa1JNV3NEZUNXQTZuSkd4bE5STEgzNnBHaCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvc2V0dGluZ3MiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvc2V0dGluZ3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769985311),('u92N8vQtA9agCyvQeOLU57U2KZEciqMmRGqxsg3O',NULL,'176.213.124.119','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2643.92 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoienhQVVNjYUtveU5SOHhCZ1k3TTZGWnFFRlFpcmRjOTAzZkhtTUNHZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769970367),('UAfbBeswpJhO35MO08ywY2UldnrxWhGh4nkkEbBw',NULL,'123.160.223.74','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVHJLREdUVDkxdXpmY3FYWVZEZXJoMW5RazBOMkVmZVVWNEY1MkNPaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769945896),('UH5VVB62q7Q3JrBeZeKaU8mbJJTIInpLdRi9hT4S',NULL,'195.178.110.68','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMUxoTGZHWVdmSDhlcTNxQ2lqcHBoQmE4UTViNkNqRkdudnRUbWY3MyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769985294),('wt6yaq2xjoesEavEikxrX4pXotVkTgKxssuQqZTm',NULL,'198.186.131.58','Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2744.63 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNk1vQ1BUaXEwenNLSHlucUFGTzc5QjJWQlNZR2NFOTZ3TWh1dmNCciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vbXRhLXN0cy5tZy5zaWNrb2ZtZXRhbC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769952151),('WzQiPH3jGa4pRAjkos0YLlnJxiqa5MEtaKspKnzS',NULL,'195.178.110.68','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNVhKMWtyMnBnNmt1TnRkUmZzQW1wcjU4Q2VQZTY4MUl5TFgyZU02MiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769985292),('xPqiCa94Q6q4NHzMXhkTSkDZOFmXPvq1omCnbAFZ',NULL,'198.186.131.58','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2866.96 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTk44QUNZUTVTendlSUFQTlh3b29FT2FnZ0xBbndEZjlNTHc1NlF2MCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vc3RhZ2luZy5zaWNrb2ZtZXRhbC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769955919),('y0Jug2FIjSFZ4jSNmZXNQEJVuFoIMIBgUk1JQo0z',NULL,'185.241.211.8','','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVgxYVB2ZzE4NkZ5SjBYZjNYZDFhTWVIQVVNeWJac0htUWxIdWkxayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769977030),('Y6BVWDtn6BeUeXEc9Lg1rjIXwY8muwQlLcn45tGe',NULL,'178.156.233.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoibUs2Vk5TS1c5Rnk3YUlMVDR0TzJxbW4yM1R1eHN5OTdvTm4yNmR2cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LnNpY2tvZm1ldGFsLm5ldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1769960910),('YIqF6JRkbcmhMJTT8yrwVIBZ0PFYKJAwzFeBzy70',NULL,'178.156.233.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZm5VaXFCZXdONGZQMk55V2VnTU84VFJwdzFtcmt1MnJKdUc5WEdWbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0L2NhdGVnb3J5L2hpZ2hsaWdodHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769960910),('YuYVIj7SYlXXQdFCoxpASXHnfaPo9uiJzAVhG8kf',NULL,'43.153.10.83','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWERRanpMODU5eHdHeU9Ka0xFYXVTSVJITEhLQlhaM2Y4c1M5aWZaQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LnNpY2tvZm1ldGFsLm5ldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1769988216),('yWPuNBIyq9lVfv8uBc6aDSMDzUJ9BlhJVcx0nGcD',NULL,'176.213.124.119','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2643.92 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDBsNEk4bml6SXNGM1JFeGZwMkEzaHBRMHdqQ3lYejRoT0FjZUJqRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769970352),('YxWz6JMk5y6ZnyQBNx5J8ReXHtqabXy8VG4aXilz',NULL,'72.11.155.223','Mozilla/5.0 (Macintosh; Intel Mac OS X 15_7_3) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.0 Safari/605.1.15','YTozOntzOjY6Il90b2tlbiI7czo0MDoibXZJcjhOVU9nMXpZQ3Q1NU96ZExQblJBNGtOVDI0Y044MkY1MjdFRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vaGVscC5zaWNrb2ZtZXRhbC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769977054),('ZalyfNLTD82NXTvSoOXnr8c3eYbaIpmd29UZNn0k',NULL,'195.178.110.68','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiakRQOVhXSFlwUDJVRHI1TWpMaERCQUhzeXJsSHpRY3g2amdUSDh5dyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9tZy5zaWNrb2ZtZXRhbC5uZXQvYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1769985295),('ZPiIOlM8QYw5UIT642yKrhIyrYbu2Rdrq7H8kZdj',NULL,'182.44.8.254','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMmREdmxwSHhEa1VGalFKMDM4eDY2S0JKNlExUGhORVZPcGswdEdpMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LnNpY2tvZm1ldGFsLm5ldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1769999433),('ZPz0qDAlRks4asTddKcCXGUokkbSRrpFrZsFHVrZ',NULL,'194.164.107.4','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUEJhZFhKOVhONDFrNTAxcXd5T0ZLR1VFdGFoMUhwZnNzQTJOM0FsYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHBzOi8vc3RhZ2Uuc2lja29mbWV0YWwubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1769990130);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taggables`
--

DROP TABLE IF EXISTS `taggables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taggables` (
  `tag_id` bigint unsigned NOT NULL,
  `taggable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `taggable_id` bigint unsigned NOT NULL,
  UNIQUE KEY `taggables_tag_id_taggable_id_taggable_type_unique` (`tag_id`,`taggable_id`,`taggable_type`),
  KEY `taggables_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`),
  CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taggables`
--

LOCK TABLES `taggables` WRITE;
/*!40000 ALTER TABLE `taggables` DISABLE KEYS */;
/*!40000 ALTER TABLE `taggables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` json NOT NULL,
  `slug` json NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_column` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `social_links` json DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'eduardo','wanted to redesign a blog but then found out i could so much more. thanks for tuning in!','{\"youtube\": \"https://www.youtube.com/@SickOfMetalNet\", \"bandcamp\": null, \"instagram\": \"https://www.instagram.com/sickofmetalnet/\"}','admin@sickofmetal.net','2025-07-28 23:47:38','$2y$12$lCWYuASpxKTvNYFXByo0fevtOdNSZgII4C3cDiurbdm4nFH62W8vy',NULL,NULL,'2025-07-28 23:47:38','2025-10-14 17:31:50'),(2,'testUser','the official “testing” account of the site','{\"youtube\": null, \"bandcamp\": null, \"instagram\": null}','eduardongua@hotmail.com','2025-07-29 00:38:23','$2y$12$zzLXl.HX6Lnng.zaMgoZ6ezC6tHsK1ivPihjGjAY/9v4j3Z1Wu24S',NULL,NULL,'2025-07-29 00:37:47','2025-08-02 19:26:03');
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

-- Dump completed on 2026-02-03  2:02:08
